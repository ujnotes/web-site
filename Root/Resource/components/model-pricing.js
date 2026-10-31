(function (global) {
    'use strict';
    function isDate(value) {
        return typeof value === 'string' && /^\d{4}-\d{2}-\d{2}$/.test(value) &&
            !isNaN(Date.parse(value)) && new Date(value).toISOString().slice(0, 10) === value;
    }
    function sourceURL(value) {
        try { return new URL(value).protocol === 'https:'; } catch (_) { return false; }
    }
    function validatePrice(price) {
        if (price === null || price === undefined) return;
        if (price.currency !== 'USD' || price.unit !== 'per_1m_tokens' ||
            !sourceURL(price.source_url) || !isDate(price.checked_on)) throw new Error('Invalid price provenance');
        ['input', 'output'].forEach(function (key) {
            if (price[key] !== null && (typeof price[key] !== 'number' || !Number.isFinite(price[key]) || price[key] < 0)) throw new Error('Invalid rate');
        });
        ['effective_from', 'effective_until'].forEach(function (key) {
            if (price[key] != null && !isDate(price[key])) throw new Error('Invalid effective date');
        });
        if (price.effective_from && price.effective_until && price.effective_from > price.effective_until) throw new Error('Reversed price dates');
    }
    function validate(data) {
        if (!data || data.schema_version !== 1 || !isDate(data.updated_on) || !Array.isArray(data.models)) throw new Error('Invalid model catalogue');
        var ids = new Set();
        data.models.forEach(function (model) {
            if (!model.id || ids.has(model.id) || typeof model.name !== 'string' || !model.name ||
                typeof model.provider !== 'string' || !model.provider ||
                !['current', 'retired', 'to_be_released'].includes(model.status)) throw new Error('Invalid model');
            ids.add(model.id);
            ['lifecycle_source_url', 'announcement_source_url', 'usage_source_url'].forEach(function (key) {
                if (model[key] != null && !sourceURL(model[key])) throw new Error('Invalid model source');
            });
            ['retired_on', 'release_on', 'shutdown_on', 'lifecycle_checked_on', 'announcement_checked_on', 'usage_checked_on'].forEach(function (key) {
                if (model[key] != null && !isDate(model[key])) throw new Error('Invalid lifecycle date');
            });
            validatePrice(model.standard); validatePrice(model.batch);
            (model.scheduled_prices || []).forEach(function (price) {
                validatePrice(price);
                if (!isDate(price.effective_from) || !['standard', 'batch'].includes(price.service_tier)) throw new Error('Invalid scheduled rate');
            });
            (model.context_tiers || []).forEach(function (tier) {
                var threshold = tier.prompt_tokens_min_inclusive ?? tier.prompt_tokens_min_exclusive;
                if (!Number.isFinite(threshold) || threshold < 0) throw new Error('Invalid context tier');
                validatePrice(tier.standard); validatePrice(tier.batch);
            });
        });
        return data;
    }
    function contextApplies(tier, tokens) {
        return tier.prompt_tokens_min_inclusive != null ? tokens >= tier.prompt_tokens_min_inclusive : tokens > tier.prompt_tokens_min_exclusive;
    }
    function priceFor(model, tier, date, inputTokens) {
        var price = model[tier] || null;
        var candidates = (model.context_tiers || []).filter(function (context) {
            return contextApplies(context, inputTokens);
        }).sort(function (a, b) { return (b.prompt_tokens_min_inclusive ?? b.prompt_tokens_min_exclusive) - (a.prompt_tokens_min_inclusive ?? a.prompt_tokens_min_exclusive); });
        if (candidates.length) price = candidates[0][tier] || null;
        (model.scheduled_prices || []).filter(function (scheduled) {
            return scheduled.service_tier === tier && scheduled.effective_from <= date &&
                (scheduled.prompt_tokens_min_exclusive == null || inputTokens > scheduled.prompt_tokens_min_exclusive);
        }).sort(function (a, b) { return a.effective_from.localeCompare(b.effective_from); }).forEach(function (scheduled) { price = scheduled; });
        if (!price || (price.effective_from && price.effective_from > date) ||
            (price.effective_until && price.effective_until < date)) return null;
        return price;
    }
    function estimate(model, state) {
        if (model.status !== 'current') return null;
        var price = priceFor(model, state.tier, state.date, state.input);
        if (!price || price.input === null || price.output === null) return null;
        var perRequest = (state.input * price.input + state.output * price.output) / 1000000;
        var total = perRequest * state.requests;
        return Number.isFinite(total) ? {price: price, perRequest: perRequest, total: total} : null;
    }
    function validateExchangeRate(record, quote) {
        if (!record || record.base !== 'USD' || record.quote !== quote || !isDate(record.date) || typeof record.rate !== 'number' || !Number.isFinite(record.rate) || record.rate <= 0) throw new Error('Invalid exchange rate');
        return record;
    }
    function compareModels(a, b, key, direction, estimates) {
        var sign = direction === 'asc' ? 1 : -1;
        if (key === 'name' || key === 'provider') {
            return sign * a[key].localeCompare(b[key]) || a.name.localeCompare(b.name);
        }
        var x = estimates.get(a.id), y = estimates.get(b.id);
        var av = key === 'cost' ? x?.total : x?.price[key];
        var bv = key === 'cost' ? y?.total : y?.price[key];
        // Unknown values stay last in either direction; zero remains a price.
        if (av == null || bv == null) return av == null && bv == null ? a.name.localeCompare(b.name) : av == null ? 1 : -1;
        return sign * (av - bv) || a.name.localeCompare(b.name);
    }
    var api = {validate: validate, priceFor: priceFor, estimate: estimate, compareModels: compareModels, validateExchangeRate: validateExchangeRate};
    if (typeof module !== 'undefined' && module.exports) { module.exports = api; return; }

    global.UjnotesComponents.register('model-pricing', async function (root, context) {
        var lang = root.closest('[lang]')?.getAttribute('lang') || document.documentElement.lang;
        var hi = /^hi\b/.test(lang);
        var t = function (en, hindi) { return hi ? hindi : en; };
        var url = root.dataset.source;
        if (!/^\/resource\/data\/[a-z0-9_/-]+\.json$/.test(url || '')) throw new Error('Invalid data URL');
        var response = await fetch(url, {signal: context.signal, cache: 'no-cache'});
        if (!response.ok) throw new Error('Price data unavailable');
        var data = validate(await response.json());
        if (context.signal.aborted) return;
        var defaults = data.workload || {};
        var numberFormat = new Intl.NumberFormat(hi ? 'hi-IN' : 'en-IN', {maximumFractionDigits: 6});
        function money(value) {
            var factor = currency.value === 'USD' ? 1 : Number(fx.value);
            if (!Number.isFinite(factor) || factor <= 0) return '—';
            var amount = value * factor;
            var formatter = new Intl.NumberFormat(hi ? 'hi-IN' : 'en-IN', {style: 'currency', currency: currency.value, maximumFractionDigits: 6});
            return amount > 0 && amount < 0.000001 ? '<' + formatter.format(0.000001) : formatter.format(amount);
        }
        var providerName = function (name) { return name === 'openai' ? 'OpenAI' : name === 'xai' ? 'xAI' : name === 'openrouter' ? 'OpenRouter' : name.charAt(0).toUpperCase() + name.slice(1); };
        var displayDate = function (value) { return value ? new Intl.DateTimeFormat(hi ? 'hi-IN' : 'en-GB', {day: 'numeric', month: 'short', year: 'numeric', timeZone: 'UTC'}).format(new Date(value)) : t('Not announced', 'घोषित नहीं'); };
        function el(tag, text, className) {
            var node = document.createElement(tag);
            if (text !== undefined) node.textContent = text;
            if (className) node.className = className;
            return node;
        }
        function sourceLink(label, url) {
            var a = el('a', label); a.href = url; a.target = '_blank'; a.rel = 'noopener noreferrer'; return a;
        }
        root.classList.add('model-pricing'); root.replaceChildren();
        var top = el('div', undefined, 'mp-heading');
        var heading = el('div');
        heading.append(el('h2', t('Model prices', 'मॉडल की कीमतें')));
        var download = sourceLink(t('Download price data ↗', 'मूल्य डेटा डाउनलोड करें ↗'), url);
        download.setAttribute('download', 'model-pricing.json'); top.append(heading, download); root.append(top);
        var form = el('form', undefined, 'mp-controls');
        form.addEventListener('submit', function (event) { event.preventDefault(); }, {signal: context.signal});
        var modelSelect = select(t('Calculator model', 'कैलकुलेटर का मॉडल'), data.models.filter(function (model) { return model.status === 'current'; }).map(function (model) { return [model.id, model.name + ' — ' + providerName(model.provider)]; }));
        if (data.workload?.model_id && data.models.some(function (m) { return m.id === data.workload.model_id && m.status === 'current'; })) modelSelect.value = data.workload.model_id;
        function field(label, type, value, options) {
            var wrapper = el('label', undefined, 'mp-field'); wrapper.append(el('span', label));
            var input = el('input'); input.type = type; input.value = value;
            Object.entries(options || {}).forEach(function (pair) { input.setAttribute(pair[0], pair[1]); });
            wrapper.append(input); form.append(wrapper); return input;
        }
        var requests = field(t('Requests', 'अनुरोध'), 'number', defaults.requests ?? 10000, {min: '0', max: '1000000000000', step: '1', required: ''});
        var input = field(t('Input tokens / request', 'इनपुट टोकन / अनुरोध'), 'number', defaults.input_tokens_per_request ?? 1000, {min: '0', max: '10000000', step: '1', required: ''});
        var output = field(t('Billable output tokens / request', 'बिल योग्य आउटपुट टोकन / अनुरोध'), 'number', defaults.output_tokens_per_request ?? 200, {min: '0', max: '10000000', step: '1', required: ''});
        function select(label, options) {
            var wrapper = el('label', undefined, 'mp-field'); wrapper.append(el('span', label));
            var node = el('select'); options.forEach(function (item) { var opt = el('option', item[1]); opt.value = item[0]; node.append(opt); });
            wrapper.append(node); form.append(wrapper); return node;
        }
        var tier = select(t('Service tier', 'सेवा प्रकार'), [['standard', t('Standard', 'मानक')], ['batch', t('Batch', 'बैच')]]);
        var today = new Date();
        var localDate = [today.getFullYear(), String(today.getMonth() + 1).padStart(2, '0'), String(today.getDate()).padStart(2, '0')].join('-');
        var date = field(t('Estimate date', 'अनुमान की तारीख'), 'date', localDate < data.updated_on ? data.updated_on : localDate, {required: '', min: data.updated_on});
        var currency = select(t('Currency', 'मुद्रा'), [['USD', 'USD — US Dollar'], ['INR', 'INR — Indian Rupee'], ['NPR', 'NPR — Nepalese Rupee'], ['EUR', 'EUR — Euro'], ['GBP', 'GBP — Pound Sterling'], ['JPY', 'JPY — Japanese Yen'], ['AUD', 'AUD — Australian Dollar'], ['CAD', 'CAD — Canadian Dollar']]);
        var fx = field(t('Exchange rate', 'विनिमय दर'), 'number', '', {min: '0.000001', max: '1000000', step: 'any', placeholder: t('Your exchange rate', 'आपकी विनिमय दर')});
        var fxWrapper = fx.parentElement;
        fxWrapper.hidden = true;
        root.append(form);
        var fxNote = el('p', t('Provider prices are in USD.', 'प्रदाता की दरें USD में हैं.'), 'mp-note');
        fxNote.setAttribute('aria-live', 'polite');
        var fxMode = 'base', fxRequest = 0, fxAbort = null, fxCache = new Map();
        function rateNote(record) {
            fxNote.replaceChildren(document.createTextNode('1 USD = ' + numberFormat.format(record.rate) + ' ' + record.quote + ' · '), sourceLink('Frankfurter', 'https://frankfurter.dev/'), document.createTextNode(' · ' + displayDate(record.date) + t(' · Daily reference rate; bank fees and tax excluded.', ' · दैनिक संदर्भ दर; बैंक शुल्क और कर शामिल नहीं हैं.')));
        }
        async function loadRate() {
            var ticket = ++fxRequest, quote = currency.value;
            if (fxAbort) fxAbort.abort();
            var converted = currency.value !== 'USD';
            fxWrapper.hidden = !converted; fx.disabled = !converted; fx.required = converted;
            fx.value = '';
            fxWrapper.querySelector('span').textContent = '1 USD = ' + currency.value;
            if (!converted) { fxMode = 'base'; fxNote.textContent = t('Provider prices are in USD.', 'प्रदाता की दरें USD में हैं.'); render(); return; }
            fxMode = 'loading'; fxNote.textContent = t('Loading the latest reference exchange rate… You can also enter your own rate.', 'नवीनतम संदर्भ विनिमय दर लोड हो रही है… आप अपनी दर भी भर सकते हैं.'); render();
            if (fxCache.has(quote)) { var cached = fxCache.get(quote); fx.value = cached.rate; fxMode = 'auto'; rateNote(cached); render(); return; }
            fxAbort = new AbortController();
            var abort = fxAbort, timeout = setTimeout(function () { abort.abort(); }, 10000);
            try {
                var result = await fetch('https://api.frankfurter.dev/v2/rate/USD/' + quote, {signal: abort.signal, referrerPolicy: 'no-referrer'});
                if (!result.ok) throw new Error('Rate unavailable');
                var record = validateExchangeRate(await result.json(), quote);
                if (ticket !== fxRequest || context.signal.aborted) return;
                fxCache.set(quote, record); fx.value = record.rate; fxMode = 'auto'; rateNote(record); render();
            } catch (_) {
                if (ticket !== fxRequest || context.signal.aborted) return;
                fxMode = 'manual'; fxNote.textContent = t('The exchange-rate service is unavailable. Enter a rate manually to convert prices.', 'विनिमय दर सेवा उपलब्ध नहीं है। कीमतें बदलने के लिए दर स्वयं भरें.'); render();
            } finally { clearTimeout(timeout); }
        }
        currency.addEventListener('change', loadRate, {signal: context.signal});
        fx.addEventListener('input', function () {
            fxRequest++; if (fxAbort) fxAbort.abort(); fxMode = 'manual';
            fxNote.textContent = t('Manual exchange rate. Bank fees and tax are excluded.', 'स्वयं भरी गई विनिमय दर। बैंक शुल्क और कर शामिल नहीं हैं.');
        }, {signal: context.signal});
        context.signal.addEventListener('abort', function () { fxRequest++; if (fxAbort) fxAbort.abort(); }, {once: true});
        fx.disabled = true;
        root.append(fxNote);
        var filters = el('div', undefined, 'mp-filters');
        var searchLabel = el('label', undefined, 'mp-field'); searchLabel.append(el('span', t('Find a model', 'मॉडल खोजें')));
        var search = el('input'); search.type = 'search'; search.placeholder = t('Search models or providers…', 'मॉडल या प्रदाता खोजें…'); searchLabel.append(search); filters.append(searchLabel);
        function filterSelect(label, values) {
            var wrapper = el('label', undefined, 'mp-field'); wrapper.append(el('span', label)); var node = el('select');
            values.forEach(function (item) { var opt = el('option', item[1]); opt.value = item[0]; node.append(opt); });
            wrapper.append(node); filters.append(wrapper); return node;
        }
        var sort = filterSelect(t('Sort by column', 'कॉलम के अनुसार क्रम'), [['cost', t('Estimated total', 'अनुमानित कुल')], ['input', t('Input price', 'इनपुट दर')], ['output', t('Output price', 'आउटपुट दर')], ['name', t('Model name', 'मॉडल का नाम')], ['provider', t('Provider', 'प्रदाता')]]);
        var direction = filterSelect(t('Order', 'क्रम की दिशा'), [['desc', t('Descending ↓', 'घटता क्रम ↓')], ['asc', t('Ascending ↑', 'बढ़ता क्रम ↑')]]);
        var providers = el('fieldset', undefined, 'mp-providers');
        providers.append(el('legend', t('Model providers', 'मॉडल प्रदाता')));
        var providerButtons = Array.from(new Set(data.models.map(function (m) { return m.provider; }))).sort().map(function (name) {
            var button = el('button', providerName(name), 'mp-provider-toggle');
            button.type = 'button'; button.dataset.provider = name; button.setAttribute('aria-pressed', 'true');
            button.addEventListener('click', function () { button.setAttribute('aria-pressed', button.getAttribute('aria-pressed') === 'true' ? 'false' : 'true'); render(); }, {signal: context.signal});
            providers.append(button); return button;
        });
        filters.append(providers);
        root.append(filters);
        var feedback = el('p', '', 'mp-feedback'); feedback.setAttribute('role', 'status'); root.append(feedback);
        var summary = el('div', undefined, 'mp-summary'); summary.setAttribute('aria-live', 'polite'); root.append(summary);
        var sections = el('div', undefined, 'mp-sections'); root.append(sections);
        var unitNote = el('p', '', 'mp-note'); root.append(unitNote);
        var toolbar = el('div', undefined, 'mp-controls mp-table-options');
        toolbar.append(currency.parentElement, tier.parentElement, date.parentElement, fxWrapper);
        var chart = el('section', undefined, 'mp-chart');
        chart.append(el('h3', t('Graphical comparison', 'चित्रात्मक तुलना')));
        var metricLabel = el('label', undefined, 'mp-field'); metricLabel.append(el('span', t('Compare', 'तुलना का आधार')));
        var metric = el('select');
        [['cost', t('Estimated total', 'अनुमानित कुल')], ['input', t('Input price / million tokens', 'इनपुट दर / दस लाख टोकन')], ['output', t('Output price / million tokens', 'आउटपुट दर / दस लाख टोकन')]].forEach(function (entry) { var option = el('option', entry[1]); option.value = entry[0]; metric.append(option); });
        metricLabel.append(metric); chart.append(metricLabel);
        var bars = el('div', undefined, 'mp-bars'); chart.append(bars);
        metric.addEventListener('change', function () { render(); }, {signal: context.signal});
        var calculator = el('section', undefined, 'mp-calculator');
        calculator.append(el('h3', t('Cost calculator', 'लागत कैलकुलेटर')), el('p', t('Select a model in the table or chart, then adjust the token budget below.', 'तालिका या चार्ट में मॉडल चुनें, फिर नीचे टोकन बजट बदलें.'), 'mp-note'), form, summary);
        var tableArea = el('div', undefined, 'mp-table-area');
        tableArea.append(filters, feedback, sections);
        root.replaceChildren(top, toolbar, fxNote, tableArea, unitNote, chart, calculator);
        function chooseModel(event) {
            if (event.target.closest('a')) return;
            var row = event.target.closest('[data-model-id]');
            if (!row || !data.models.some(function (m) { return m.id === row.dataset.modelId && m.status === 'current'; })) return;
            modelSelect.value = row.dataset.modelId; render();
            calculator.scrollIntoView({behavior: matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth', block: 'start'});
        }
        sections.addEventListener('click', chooseModel, {signal: context.signal});
        bars.addEventListener('click', chooseModel, {signal: context.signal});

        function state() {
            var numeric = [requests, input, output, fx];
            var valid = numeric.every(function (node) { return node.checkValidity(); }) && date.checkValidity() && isDate(date.value);
            return valid ? {requests: Number(requests.value), input: Number(input.value), output: Number(output.value), tier: tier.value, date: date.value} : null;
        }
        function render() {
            var s = state();
            feedback.textContent = s ? '' : currency.value !== 'USD' && !fx.checkValidity() ? (fxMode === 'loading' ? t('Loading exchange rate for ', 'विनिमय दर लोड हो रही है: ') : t('Enter a positive exchange rate to display prices in ', 'कीमतें दिखाने के लिए धनात्मक विनिमय दर भरें: ')) + currency.value : t('Enter valid non-negative token counts and requests, a date on or after the data snapshot, and a positive exchange rate if used.', 'मान्य अनुरोध व टोकन संख्या, डेटा की तारीख या उसके बाद की तारीख और वैकल्पिक धनात्मक विनिमय दर भरें.');
            unitNote.textContent = t('Prices per 1 million tokens · ', 'दरें प्रति 10 लाख टोकन · ') + currency.value + t(' · Checked dates are shown per source. Equal token counts do not mean equal quality or tokenisation. Estimates exclude cache, storage, tools, tax and retries. Confirm context limits and account access with the provider.', ' · हर स्रोत के साथ जाँच की तारीख है। समान टोकन का अर्थ समान गुणवत्ता या टोकन-विभाजन नहीं है। कैश, स्टोरेज, टूल, कर और दोबारा किए गए अनुरोध शामिल नहीं हैं। संदर्भ सीमा और खाते की पहुँच प्रदाता से जाँचें.');
            summary.replaceChildren(); sections.replaceChildren();
            var query = search.value.trim().toLowerCase();
            var enabledProviders = new Set(providerButtons.filter(function (button) { return button.getAttribute('aria-pressed') === 'true'; }).map(function (button) { return button.dataset.provider; }));
            var filtered = data.models.filter(function (m) { return enabledProviders.has(m.provider) && (m.name + ' ' + m.provider).toLowerCase().includes(query); });
            var estimates = new Map(filtered.map(function (m) { return [m.id, s ? estimate(m, s) : null]; }));
            var selected = data.models.find(function (m) { return m.id === modelSelect.value; });
            var selectedEstimate = s && selected ? estimate(selected, s) : null;
            if (selectedEstimate) {
                var best = selectedEstimate;
                var a = el('div'); a.append(el('span', t('ESTIMATED TOTAL', 'अनुमानित कुल'), 'mp-eyebrow'), el('strong', money(best.total), 'mp-total'), el('span', selected.name));
                var b = el('div'); b.append(el('span', t('YOUR WORKLOAD', 'आपका काम'), 'mp-eyebrow'), el('strong', numberFormat.format(s.requests), 'mp-total'), el('span', t('requests · ', 'अनुरोध · ') + numberFormat.format(s.requests * (s.input + s.output)) + t(' tokens', ' टोकन')));
                var c = el('div'); c.append(el('span', t('COST PER REQUEST', 'प्रति अनुरोध लागत'), 'mp-eyebrow'), el('strong', money(best.perRequest), 'mp-snapshot'), el('span', selected.usage_fit?.[hi ? 'hi' : 'en'] || ''));
                summary.append(a, b, c);
            } else {
                summary.append(el('p', t('No verified estimate for the selected model, service tier or inputs.', 'चुने गए मॉडल, सेवा प्रकार या इनपुट के लिए सत्यापित अनुमान उपलब्ध नहीं है.'), 'mp-note'));
            }
            [['current', t('Current models', 'वर्तमान मॉडल')], ['retired', t('Retired models', 'सेवानिवृत्त मॉडल')], ['to_be_released', t('To be released models', 'आगामी मॉडल')]].forEach(function (group) {
                var models = filtered.filter(function (m) { return m.status === group[0]; });
                if (group[0] !== 'current' && !models.length) return;
                models.sort(function (a, b) {
                    return compareModels(a, b, sort.value, direction.value, estimates);
                });
                var section = el('section', undefined, 'mp-section');
                var h = el('h3', group[1]); h.append(el('span', String(models.length), 'mp-count')); section.append(h);
                if (!models.length) {
                    section.append(el('p', t('No models match these filters.', 'इन फ़िल्टर से कोई मॉडल नहीं मिला.'), 'mp-empty'));
                    sections.append(section); return;
                }
                var scroller = el('div', undefined, 'mp-table-scroll'); scroller.tabIndex = 0; scroller.setAttribute('role', 'region'); scroller.setAttribute('aria-label', group[1]);
                var table = el('table'); var caption = el('caption', group[1] + ' — ' + currency.value + t(' per 1 million tokens', ' प्रति 10 लाख टोकन')); caption.className = 'mp-sr-only'; table.append(caption);
                var head = el('thead'), hr = el('tr');
                var titles = [t('Model / conditions', 'मॉडल / शर्तें'), t('Suggested use', 'सुझाया गया उपयोग'), t('Input', 'इनपुट'), t('Output', 'आउटपुट'), t('Estimated total', 'अनुमानित कुल'), t('Source / checked', 'स्रोत / जाँच')];
                titles.forEach(function (title) { var th = el('th', title); th.scope = 'col'; hr.append(th); }); head.append(hr); table.append(head);
                var body = el('tbody');
                models.forEach(function (model) {
                    var result = estimates.get(model.id);
                    var price = s ? priceFor(model, s.tier, s.date, s.input) : null;
                    var tr = el('tr');
                    var name = el('th'); name.scope = 'row';
                    var nameLine = el('div', undefined, 'mp-name-line');
                    if (model.status === 'current') {
                        tr.dataset.modelId = model.id;
                        var pick = el('button', model.name, 'mp-model-pick'); pick.type = 'button';
                        pick.setAttribute('aria-pressed', String(model.id === modelSelect.value));
                        nameLine.append(pick); if (model.id === modelSelect.value) tr.className = 'mp-selected';
                    } else nameLine.append(el('strong', model.name));
                    nameLine.append(el('span', providerName(model.provider), 'mp-provider')); name.append(nameLine);
                    var longPrompt = s && model.context_tiers?.some(function (tier) { return contextApplies(tier, s.input); });
                    if (model.scope && !longPrompt) name.append(el('small', model.scope, 'mp-condition'));
                    if (model.status === 'retired') name.append(el('small', t('Retired: ', 'सेवानिवृत्त: ') + displayDate(model.retired_on), 'mp-condition'));
                    if (model.shutdown_on) name.append(el('small', t('Shutdown: ', 'बंद होने की तारीख: ') + displayDate(model.shutdown_on), 'mp-condition'));
                    if (model.status === 'to_be_released') name.append(el('small', t('Release: ', 'जारी होने की तारीख: ') + displayDate(model.release_on), 'mp-condition'));
                    if (longPrompt) name.append(el('small', t('Long-prompt rate applied', 'लंबे प्रॉम्प्ट की दर लागू'), 'mp-condition'));
                    var next = (model.scheduled_prices || []).filter(function (p) { return s && p.service_tier === s.tier && p.effective_from > s.date; }).sort(function (a,b) { return a.effective_from.localeCompare(b.effective_from); })[0];
                    if (next) name.append(el('small', money(next.input) + ' / ' + money(next.output) + t(' from ', ' से ') + displayDate(next.effective_from), 'mp-condition'));
                    tr.append(name);
                    tr.append(el('td', model.usage_fit ? (model.usage_fit[hi ? 'hi' : 'en'] || model.usage_fit.en) : '—', 'mp-use'));
                    ['input', 'output'].forEach(function (key) { tr.append(el('td', price && price[key] !== null && s ? money(price[key]) : '—', 'mp-number')); });
                    var total = el('td', undefined, 'mp-number');
                    if (result) {
                        total.append(el('strong', money(result.total)), el('small', money(result.perRequest) + t(' / request', ' / अनुरोध')));
                    } else total.textContent = model.status === 'retired' ? t('Archived', 'संग्रहीत') : model.status === 'to_be_released' ? t('Not available', 'उपलब्ध नहीं') : t('Not estimated', 'अनुमान उपलब्ध नहीं');
                    tr.append(total);
                    var source = el('td', undefined, 'mp-source');
                    var provenance = price || model.standard || model.batch;
                    var sourceURL = provenance?.source_url || model.lifecycle_source_url || model.announcement_source_url;
                    var checked = provenance?.checked_on || model.lifecycle_checked_on || model.announcement_checked_on;
                    if (sourceURL) source.append(sourceLink(t('Official source ↗', 'आधिकारिक स्रोत ↗'), sourceURL));
                    if (checked) source.append(el('small', displayDate(checked)));
                    if (model.usage_source_url) source.append(sourceLink(t('Model guide ↗', 'मॉडल विवरण ↗'), model.usage_source_url));
                    if (price?.effective_until) source.append(el('small', t('Valid through ', 'मान्य: ') + displayDate(price.effective_until)));
                    if (!price && model.status === 'current') source.append(el('small', t('No verified rate for this tier/date', 'इस प्रकार/तारीख की सत्यापित दर नहीं')));
                    tr.append(source); body.append(tr);
                });
                table.append(body); scroller.append(table); section.append(scroller); sections.append(section);
            });
            bars.replaceChildren();
            var chartModels = filtered.filter(function (m) { return estimates.get(m.id); }).sort(function (a, b) { return compareModels(a, b, metric.value, 'desc', estimates); });
            var chartValue = function (m) { var value = estimates.get(m.id); return metric.value === 'cost' ? value.total : value.price[metric.value]; };
            var maximum = Math.max(0, ...chartModels.map(chartValue));
            var breakdownMaximum = metric.value === 'cost' ? maximum : Math.max(0, ...chartModels.flatMap(function (m) { var p = estimates.get(m.id).price; return [p.input, p.output]; }));
            if (!chartModels.length) bars.append(el('p', t('No priced models match the current filters and inputs.', 'वर्तमान फ़िल्टर और इनपुट के लिए कीमत वाले मॉडल नहीं मिले.'), 'mp-empty'));
            chartModels.forEach(function (m) {
                var value = chartValue(m), button = el('button', undefined, 'mp-bar-row');
                button.type = 'button'; button.dataset.modelId = m.id; button.setAttribute('aria-pressed', String(m.id === modelSelect.value));
                var line = el('span', undefined, 'mp-bar-label'); line.append(el('span', m.name + ' · ' + providerName(m.provider)), el('strong', money(value)));
                var track = el('span', undefined, 'mp-bar-track'), fill = el('span', undefined, 'mp-bar-fill');
                fill.style.width = (maximum ? value / maximum * 100 : 0) + '%'; track.append(fill); button.append(line, track);
                var breakdown = estimates.get(m.id), inputCost, outputCost;
                if (metric.value === 'cost') { inputCost = s.requests * s.input * breakdown.price.input / 1000000; outputCost = s.requests * s.output * breakdown.price.output / 1000000; }
                else { inputCost = breakdown.price.input; outputCost = breakdown.price.output; }
                var scale = breakdownMaximum;
                [[t('Input','इनपुट'), inputCost, 'mp-input'], [t('Output','आउटपुट'), outputCost, 'mp-output']].forEach(function (part) {
                    var sub = el('span', undefined, 'mp-subbar'); var label = el('span', part[0] + ' · ' + money(part[1]), 'mp-sub-label');
                    var subtrack = el('span', undefined, 'mp-bar-track'); var subfill = el('span', undefined, 'mp-bar-fill ' + part[2]);
                    subfill.style.width = (scale ? part[1] / scale * 100 : 0) + '%'; subtrack.append(subfill); sub.append(label, subtrack); button.append(sub);
                });
                bars.append(button);
            });
        }
        var pending;
        function update() { clearTimeout(pending); pending = setTimeout(render, 120); }
        [form, toolbar, filters].forEach(function (node) { node.addEventListener('input', update, {signal: context.signal}); node.addEventListener('change', update, {signal: context.signal}); });
        render();
        return function () { clearTimeout(pending); fxRequest++; if (fxAbort) fxAbort.abort(); };
    });
}(typeof window === 'undefined' ? globalThis : window));
