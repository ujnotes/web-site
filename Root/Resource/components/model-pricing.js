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
                typeof model.family !== 'string' || !model.family ||
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
        if (key === 'name' || key === 'provider' || key === 'family') {
            var av = a[key] || '', bv = b[key] || '';
            return sign * av.localeCompare(bv) || a.name.localeCompare(b.name);
        }
        var x = estimates.get(a.id), y = estimates.get(b.id);
        var av = key === 'cost' ? x?.total : x?.price?.[key];
        var bv = key === 'cost' ? y?.total : y?.price?.[key];
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
        var familyName = function (name) {
            if (!name) return '';
            if (name === 'gpt') return 'GPT';
            return name.charAt(0).toUpperCase() + name.slice(1);
        };
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
        var heading = el('div', undefined, 'mp-heading-text');
        heading.append(el('h2', t('Model prices', 'मॉडल की कीमतें')));
        heading.prepend(el('span', t('API PRICE EXPLORER', 'API मूल्य तुलना'), 'mp-eyebrow'));
        heading.append(el('p', t('Compare rates. Find the right fit for your workload.', 'दरें तुलना करें। अपने काम के लिए उपयुक्त मॉडल चुनें।'), 'mp-note'));
        var download = sourceLink(t('Download price data ↗', 'मूल्य डेटा डाउनलोड करें ↗'), url);
        download.setAttribute('download', 'model-pricing.json');
        download.title = t('Download price data', 'मूल्य डेटा डाउनलोड करें'); download.setAttribute('aria-label', download.title); download.textContent = t('↓ Download data', '↓ डेटा डाउनलोड करें'); download.className = 'mp-download';

        var headerControls = el('div', undefined, 'mp-header-controls');
        var searchLabel = el('label', undefined, 'mp-header-field mp-search-wrapper');
        var search = el('input', undefined, 'mp-search-input');
        search.type = 'search';
        search.placeholder = t('Search models, families, providers…', 'मॉडल, परिवार, प्रदाता खोजें…');
        search.setAttribute('aria-label', t('Search models, families or providers', 'मॉडल, परिवार या प्रदाता खोजें'));
        searchLabel.append(search);

        var currentSortKey = 'input';
        var currentSortDirection = 'asc';
        var sortWrapper = el('label', undefined, 'mp-header-field mp-sort-wrapper');
        var sortSelect = el('select', undefined, 'mp-sort-select');
        sortSelect.setAttribute('aria-label', t('Sort models by column and direction', 'मॉडल क्रमबद्ध करें'));
        var sortOptions = [
            ['cost:asc', t('Total cost (Lowest first) ↑', 'कुल लागत (कम से अधिक) ↑')],
            ['cost:desc', t('Total cost (Highest first) ↓', 'कुल लागत (अधिक से कम) ↓')],
            ['input:asc', t('Input price (Lowest first) ↑', 'इनपुट दर (कम से अधिक) ↑')],
            ['input:desc', t('Input price (Highest first) ↓', 'इनपुट दर (अधिक से कम) ↓')],
            ['output:asc', t('Output price (Lowest first) ↑', 'आउटपुट दर (कम से अधिक) ↑')],
            ['output:desc', t('Output price (Highest first) ↓', 'आउटपुट दर (अधिक से कम) ↓')],
            ['name:asc', t('Model name (A–Z)', 'मॉडल नाम (A–Z)')],
            ['name:desc', t('Model name (Z–A)', 'मॉडल नाम (Z–A)')],
            ['family:asc', t('Model family (A–Z)', 'मॉडल परिवार (A–Z)')],
            ['provider:asc', t('Provider (A–Z)', 'प्रदाता (A–Z)')]
        ];
        sortOptions.forEach(function (item) {
            var opt = el('option', item[1]); opt.value = item[0]; sortSelect.append(opt);
        });
        sortWrapper.append(sortSelect);
        sortSelect.addEventListener('change', function () {
            var parts = sortSelect.value.split(':');
            currentSortKey = parts[0];
            currentSortDirection = parts[1];
            render();
        }, {signal: context.signal});

        searchLabel.hidden = false;
        headerControls.append(download);
        top.append(heading, headerControls);
        root.append(top);

        var form = el('form', undefined, 'mp-controls');
        form.addEventListener('submit', function (event) { event.preventDefault(); }, {signal: context.signal});
        var modelSelect = select(t('Calculator model', 'कैलकुलेटर का मॉडल'), data.models.filter(function (model) { return model.status === 'current'; }).map(function (model) { return [model.id, model.name + ' — ' + providerName(model.provider) + ' (' + familyName(model.family) + ')']; }));
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
        [requests, input, output].forEach(function (box) {
            var slider = el('input'); slider.type = 'range'; slider.min = '0'; slider.max = box === requests ? '100000' : '10000'; slider.step = '1'; slider.value = Math.min(Number(box.value), Number(slider.max));
            slider.setAttribute('aria-label', box.parentElement.querySelector('span').textContent + ' slider'); box.parentElement.insertBefore(slider, box);
            slider.addEventListener('input', function () { box.value = slider.value; box.dispatchEvent(new Event('input', {bubbles:true})); }, {signal:context.signal});
            box.addEventListener('input', function () { slider.value = Math.min(Number(box.value), Number(slider.max)); }, {signal:context.signal});
        });
        function select(label, options) {
            var wrapper = el('label', undefined, 'mp-field'); wrapper.append(el('span', label));
            var node = el('select'); options.forEach(function (item) { var opt = el('option', item[1]); opt.value = item[0]; node.append(opt); });
            wrapper.append(node); form.append(wrapper); return node;
        }
        var tier = select(t('Service tier', 'सेवा प्रकार'), [['standard', t('Standard', 'मानक')], ['batch', t('Batch', 'बैच')]]);
        var tierToggle = el('div', undefined, 'mp-tier-toggle'); tierToggle.setAttribute('role','group'); tierToggle.setAttribute('aria-label',t('Service tier','सेवा प्रकार'));
        Array.from(tier.options).forEach(function(option) { var b = el('button', option.textContent); b.type='button'; b.setAttribute('aria-pressed', String(option.value===tier.value)); b.addEventListener('click', function(){ tier.value=option.value; Array.from(tierToggle.children).forEach(function(x){x.setAttribute('aria-pressed',String(x===b));}); tier.dispatchEvent(new Event('change',{bubbles:true})); }, {signal:context.signal}); tierToggle.append(b); });
        tier.hidden=true; tier.parentElement.append(tierToggle);
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

        var filterBar = el('div', undefined, 'mp-filter-bar');
        var familyFieldset = el('fieldset', undefined, 'mp-filter-group mp-families');
        familyFieldset.append(el('legend', t('Model family', 'मॉडल परिवार')));
        var allFamilies = Array.from(new Set(data.models.map(function (m) { return m.family; }))).sort();
        var familyButtons = allFamilies.map(function (fam) {
            var button = el('button', familyName(fam), 'mp-filter-toggle mp-family-toggle');
            button.type = 'button'; button.dataset.family = fam; button.setAttribute('aria-pressed', 'true');
            button.addEventListener('click', function () { button.setAttribute('aria-pressed', button.getAttribute('aria-pressed') === 'true' ? 'false' : 'true'); render(); }, {signal: context.signal});
            button.addEventListener('dblclick', function () { familyButtons.forEach(function(x){x.setAttribute('aria-pressed',String(x===button));}); render(); }, {signal:context.signal});
            familyFieldset.append(button); return button;
        });

        var providerFieldset = el('fieldset', undefined, 'mp-filter-group mp-providers');
        providerFieldset.append(el('legend', t('Provider', 'प्रदाता')));
        var resellerFieldset = el('fieldset', undefined, 'mp-filter-group mp-resellers'); resellerFieldset.append(el('legend', t('Reseller', 'पुनर्विक्रेता')));
        var allProviders = Array.from(new Set(data.models.map(function (m) { return m.provider; }))).sort();
        var providerButtons = allProviders.map(function (name) {
            var button = el('button', providerName(name), 'mp-filter-toggle mp-provider-toggle');
            button.type = 'button'; button.dataset.provider = name; button.setAttribute('aria-pressed', 'true');
            button.addEventListener('click', function () { button.setAttribute('aria-pressed', button.getAttribute('aria-pressed') === 'true' ? 'false' : 'true'); render(); }, {signal: context.signal});
            button.addEventListener('dblclick', function () { providerButtons.forEach(function(x){x.setAttribute('aria-pressed',String(x===button));}); render(); }, {signal:context.signal});
            (name === 'openrouter' ? resellerFieldset : providerFieldset).append(button); return button;
        });
        filterBar.append(providerFieldset, familyFieldset, resellerFieldset);
        var resetFilters = el('button', t('Reset filters', 'फ़िल्टर रीसेट करें'), 'mp-reset'); resetFilters.type = 'button';
        resetFilters.addEventListener('click', function () {
            search.value = '';
            familyButtons.concat(providerButtons).forEach(function (button) { button.setAttribute('aria-pressed', 'true'); });
            render();
        }, {signal: context.signal});
        var searchToolbar = el('div', undefined, 'mp-search-toolbar');
        searchToolbar.append(searchLabel, sortWrapper, resetFilters);

        var feedback = el('p', '', 'mp-feedback'); feedback.setAttribute('role', 'status'); root.append(feedback);
        var summary = el('div', undefined, 'mp-summary'); summary.setAttribute('aria-live', 'polite'); root.append(summary);
        var sections = el('div', undefined, 'mp-sections'); root.append(sections);
        var unitNote = el('p', '', 'mp-note'); root.append(unitNote);
        var toolbar = el('div', undefined, 'mp-controls mp-table-options');
        toolbar.append(currency.parentElement, tier.parentElement, date.parentElement, fxWrapper);
        var chart = el('section', undefined, 'mp-chart');
        chart.append(el('h3', t('Graphical comparison', 'चित्रात्मक तुलना')));
        var metricLabel = el('div', undefined, 'mp-field'); metricLabel.append(el('span', t('Compare', 'तुलना का आधार')));
        var metric = el('select');
        [['input', t('Input', 'इनपुट')], ['output', t('Output', 'आउटपुट')], ['cost', t('Estimated total', 'अनुमानित कुल')]].forEach(function (entry) { var option = el('option', entry[1]); option.value = entry[0]; metric.append(option); });
        metric.hidden = true;
        var metricOptions = el('div', undefined, 'mp-tier-toggle mp-metric-toggle'); metricOptions.setAttribute('role','group'); metricOptions.setAttribute('aria-label',t('Compare','तुलना का आधार'));
        Array.from(metric.options).forEach(function(option) {
            var choice = el('button', option.textContent); choice.type = 'button'; choice.dataset.metric=option.value; choice.setAttribute('aria-pressed',String(option.value===metric.value));
            choice.addEventListener('click', function() { metric.value = option.value; syncMetric(); render(); }, {signal: context.signal});
            metricOptions.append(choice);
        });
        metricLabel.append(metric, metricOptions); chart.append(metricLabel);
        chart.append(el('p', t('Bar length shows the selected measure; colours show the input and output share of total cost or combined rates.', 'बार की लंबाई चुना माप दिखाती है; रंग कुल लागत या संयुक्त दरों में इनपुट और आउटपुट का हिस्सा दिखाते हैं।'), 'mp-note'));
        var bars = el('div', undefined, 'mp-bars'); chart.append(bars);
        metric.addEventListener('change', function () { render(); }, {signal: context.signal});
        var calculator = el('section', undefined, 'mp-calculator');
        var calculatorEnabled=false;
        var calculatorToggle=el('button',t('Enable calculator','कैलकुलेटर चालू करें'),'mp-calculator-toggle'); calculatorToggle.type='button'; calculatorToggle.setAttribute('aria-pressed','false');
        var calculatorBody=el('div',undefined,'mp-calculator-body'); calculatorBody.hidden=true;
        calculatorBody.append(el('p', t('Select a model in the table or chart, then adjust the token budget below.', 'तालिका या चार्ट में मॉडल चुनें, फिर नीचे टोकन बजट बदलें.'), 'mp-note'), form, summary);
        calculator.append(el('h3', t('Cost calculator', 'लागत कैलकुलेटर')), calculatorToggle, calculatorBody);
        function syncMetric(){ Array.from(metricOptions.children).forEach(function(button){button.hidden=button.dataset.metric==='cost'&&!calculatorEnabled;button.setAttribute('aria-pressed',String(button.dataset.metric===metric.value));}); }
        function enableCalculator(enabled){calculatorEnabled=enabled;calculatorBody.hidden=!enabled;calculatorToggle.setAttribute('aria-pressed',String(enabled));calculatorToggle.textContent=enabled?t('Disable calculator','कैलकुलेटर बंद करें'):t('Enable calculator','कैलकुलेटर चालू करें');if(!enabled&&metric.value==='cost')metric.value='input';if(!enabled&&currentSortKey==='cost')currentSortKey='input';syncMetric();render();}
        calculatorToggle.addEventListener('click',function(){enableCalculator(!calculatorEnabled);},{signal:context.signal});
        var calculatorHeading = el('div', undefined, 'mp-panel-heading');
        calculatorHeading.append(calculator.querySelector('h3'), calculatorToggle);
        calculator.prepend(calculatorHeading);
        syncMetric();
        var tableArea = el('div', undefined, 'mp-table-area');
        tableArea.append(searchToolbar, filterBar, feedback, sections);
        root.replaceChildren(top, toolbar, fxNote, tableArea, unitNote, calculator, chart);
        function chooseModel(event) {
            if (event.target.closest('a')) return;
            var row = event.target.closest('[data-model-id]');
            if (!row || !data.models.some(function (m) { return m.id === row.dataset.modelId && m.status === 'current'; })) return;
            modelSelect.value = row.dataset.modelId; if(!calculatorEnabled) enableCalculator(true); else render();
            calculator.scrollIntoView({behavior: matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth', block: 'start'});
        }
        sections.addEventListener('click', chooseModel, {signal: context.signal});
        bars.addEventListener('click', chooseModel, {signal: context.signal});

        function state() {
            var numeric = calculatorEnabled ? [requests, input, output, fx] : [fx];
            var valid = numeric.every(function (node) { return node.checkValidity(); }) && date.checkValidity() && isDate(date.value);
            return valid ? {requests: calculatorEnabled ? Number(requests.value) : 1, input: calculatorEnabled ? Number(input.value) : 0, output: calculatorEnabled ? Number(output.value) : 0, tier: tier.value, date: date.value} : null;
        }
        function render() {
            sortSelect.querySelector('option[value="cost:asc"]').hidden = !calculatorEnabled;
            sortSelect.querySelector('option[value="cost:desc"]').hidden = !calculatorEnabled;
            sortSelect.value = currentSortKey + ':' + currentSortDirection;
            var searchFocused=document.activeElement===search, caret=searchFocused?search.selectionStart:null;
            var s = state();
            feedback.textContent = s ? '' : currency.value !== 'USD' && !fx.checkValidity() ? (fxMode === 'loading' ? t('Loading exchange rate for ', 'विनिमय दर लोड हो रही है: ') : t('Enter a positive exchange rate to display prices in ', 'कीमतें दिखाने के लिए धनात्मक विनिमय दर भरें: ')) + currency.value : t('Enter valid non-negative token counts and requests, a date on or after the data snapshot, and a positive exchange rate if used.', 'मान्य अनुरोध व टोकन संख्या, डेटा की तारीख या उसके बाद की तारीख और वैकल्पिक धनात्मक विनिमय दर भरें.');
            unitNote.textContent = t('Prices per 1 million tokens · ', 'दरें प्रति 10 लाख टोकन · ') + currency.value + t(' · Checked dates are shown per source. Equal token counts do not mean equal quality or tokenisation. Estimates exclude cache, storage, tools, tax and retries. Confirm context limits and account access with the provider.', ' · हर स्रोत के साथ जाँच की तारीख है। समान टोकन का अर्थ समान गुणवत्ता या टोकन-विभाजन नहीं है। कैश, स्टोरेज, टूल, कर और दोबारा किए गए अनुरोध शामिल नहीं हैं। संदर्भ सीमा और खाते की पहुँच प्रदाता से जाँचें.');
            summary.replaceChildren(); sections.replaceChildren();
            var query = search.value.trim().toLowerCase();
            var enabledFamilies = new Set(familyButtons.filter(function (button) { return button.getAttribute('aria-pressed') === 'true'; }).map(function (button) { return button.dataset.family; }));
            var enabledProviders = new Set(providerButtons.filter(function (button) { return button.getAttribute('aria-pressed') === 'true'; }).map(function (button) { return button.dataset.provider; }));
            var filtered = data.models.filter(function (m) {
                if (!enabledFamilies.has(m.family) || !enabledProviders.has(m.provider)) return false;
                if (!query) return true;
                var haystack = (m.name + ' ' + m.provider + ' ' + providerName(m.provider) + ' ' + (m.family || '') + ' ' + familyName(m.family) + ' ' + (m.scope || '')).toLowerCase();
                return haystack.includes(query);
            });
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
                    return compareModels(a, b, currentSortKey, currentSortDirection, estimates);
                });
                var section = el('section', undefined, 'mp-section');
                var h = el('h3', group[1]); h.append(el('span', String(models.length), 'mp-count')); section.append(h);
                var scroller = el('div', undefined, 'mp-table-scroll'); scroller.tabIndex = 0; scroller.setAttribute('role', 'region'); scroller.setAttribute('aria-label', group[1]);
                var table = el('table'); var caption = el('caption', group[1] + ' — ' + currency.value + t(' per 1 million tokens', ' प्रति 10 लाख टोकन')); caption.className = 'mp-sr-only'; table.append(caption);
                var head = el('thead'), hr = el('tr');
                var sortableCols = [
                    {key: 'name', title: t('Model / conditions', 'मॉडल / शर्तें')},
                    {key: 'input', title: t('Input', 'इनपुट')},
                    {key: 'output', title: t('Output', 'आउटपुट')},
                    ...(calculatorEnabled ? [{key: 'cost', title: t('Estimated total', 'अनुमानित कुल')}] : []),
                    {key: null, title: t('Suggested use', 'सुझाया गया उपयोग')},
                    {key: null, title: t('Price', 'मूल्य')},
                    {key: null, title: t('Guide', 'विवरण')}
                ];
                sortableCols.forEach(function (col) {
                    var th = el('th'); th.scope = 'col';
                    if (col.key) {
                        var btn = el('button', undefined, 'mp-th-sort'); btn.type = 'button';
                        var textSpan = el('span', col.title);
                        var arrowSpan = el('span', undefined, 'mp-sort-arrow');
                        if (currentSortKey === col.key) {
                            th.setAttribute('aria-sort', currentSortDirection === 'asc' ? 'ascending' : 'descending');
                            btn.classList.add('mp-th-sorted');
                            arrowSpan.textContent = currentSortDirection === 'asc' ? ' ▲' : ' ▼';
                        } else {
                            th.setAttribute('aria-sort', 'none');
                            arrowSpan.textContent = ' ↕';
                        }
                        btn.append(textSpan, arrowSpan);
                        btn.addEventListener('click', function () {
                            if (currentSortKey === col.key) {
                                currentSortDirection = currentSortDirection === 'asc' ? 'desc' : 'asc';
                            } else {
                                currentSortKey = col.key;
                                currentSortDirection = 'asc';
                            }
                            var optVal = currentSortKey + ':' + currentSortDirection;
                            if (sortSelect.querySelector('option[value="' + optVal + '"]')) {
                                sortSelect.value = optVal;
                            }
                            render();
                        }, {signal: context.signal});
                        th.append(btn);
                    } else {
                        th.textContent = col.title;
                    }
                    hr.append(th);
                });
                head.append(hr); table.append(head);
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

                    var badges = el('div', undefined, 'mp-badges');
                    var famBadge = el('span', familyName(model.family), 'mp-badge mp-badge-family');
                    famBadge.title = t('Model family: ', 'मॉडल परिवार: ') + familyName(model.family);
                    var provLabel = (model.provider === 'openrouter' ? t('via ', 'मार्ग: ') : '') + providerName(model.provider);
                    var provBadge = el('span', provLabel, 'mp-badge mp-badge-provider');
                    provBadge.title = t('Selling provider: ', 'विक्रेता प्रदाता: ') + providerName(model.provider);
                    badges.append(famBadge, provBadge);
                    nameLine.append(badges);
                    name.append(nameLine);

                    var longPrompt = s && model.context_tiers?.some(function (tier) { return contextApplies(tier, s.input); });
                    if (model.scope && !longPrompt) name.append(el('small', model.scope, 'mp-condition'));
                    if (model.status === 'retired') name.append(el('small', t('Retired: ', 'सेवानिवृत्त: ') + displayDate(model.retired_on), 'mp-condition'));
                    if (model.shutdown_on) name.append(el('small', t('Shutdown: ', 'बंद होने की तारीख: ') + displayDate(model.shutdown_on), 'mp-condition'));
                    if (model.status === 'to_be_released') name.append(el('small', t('Release: ', 'जारी होने की तारीख: ') + displayDate(model.release_on), 'mp-condition'));
                    if (longPrompt) name.append(el('small', t('Long-prompt rate applied', 'लंबे प्रॉम्प्ट की दर लागू'), 'mp-condition'));
                    var next = (model.scheduled_prices || []).filter(function (p) { return s && p.service_tier === s.tier && p.effective_from > s.date; }).sort(function (a,b) { return a.effective_from.localeCompare(b.effective_from); })[0];
                    if (next) name.append(el('small', money(next.input) + ' / ' + money(next.output) + t(' from ', ' से ') + displayDate(next.effective_from), 'mp-condition'));
                    name.title=Array.from(name.querySelectorAll('.mp-condition')).map(function(n){return n.textContent;}).join(' · ');
                    tr.append(name);
                    ['input', 'output'].forEach(function (key) { tr.append(el('td', price && price[key] !== null && s ? money(price[key]) : '—', 'mp-number')); });
                    var total = el('td', undefined, 'mp-number');
                    if (result) {
                        total.append(el('strong', money(result.total)), el('small', money(result.perRequest) + t(' / request', ' / अनुरोध')));
                    } else total.textContent = model.status === 'retired' ? t('Archived', 'संग्रहीत') : model.status === 'to_be_released' ? t('Not available', 'उपलब्ध नहीं') : t('Not estimated', 'अनुमान उपलब्ध नहीं');
                    if(calculatorEnabled) tr.append(total);
                    tr.append(el('td', model.usage_fit ? (model.usage_fit[hi ? 'hi' : 'en'] || model.usage_fit.en) : '—', 'mp-use'));
                    var source = el('td', undefined, 'mp-source');
                    var provenance = price || model.standard || model.batch;
                    var sourceURL = provenance?.source_url || model.lifecycle_source_url || model.announcement_source_url;
                    var checked = provenance?.checked_on || model.lifecycle_checked_on || model.announcement_checked_on;
                    if (sourceURL) { var link=sourceLink('↗',sourceURL); link.title=t('Official price source; checked ','आधिकारिक मूल्य स्रोत; जाँच ')+(checked?displayDate(checked):''); link.setAttribute('aria-label',link.title); source.append(link); }
                    var guide=el('td',undefined,'mp-source'); if(model.usage_source_url){var guideLink=sourceLink('ⓘ',model.usage_source_url);guideLink.title=t('Model guide','मॉडल विवरण');guideLink.setAttribute('aria-label',guideLink.title);guide.append(guideLink);}
                    tr.append(source,guide); body.append(tr);
                });
                if(!models.length){var empty=el('tr');var emptyCell=el('td',t('No models match these filters.','इन फ़िल्टर से कोई मॉडल नहीं मिला.'),'mp-empty');emptyCell.colSpan=calculatorEnabled?7:6;empty.append(emptyCell);body.append(empty);}
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
                var line = el('span', undefined, 'mp-bar-label'); line.append(el('span', m.name + ' · ' + providerName(m.provider) + ' (' + familyName(m.family) + ')'), el('strong', money(value)));
                var track = el('span', undefined, 'mp-bar-track'), fill = el('span', undefined, 'mp-bar-fill');
                fill.style.width = (maximum ? value / maximum * 100 : 0) + '%'; track.append(fill); button.append(line, track);
                var breakdown = estimates.get(m.id), inputCost, outputCost;
                if (metric.value === 'cost') { inputCost = s.requests * s.input * breakdown.price.input / 1000000; outputCost = s.requests * s.output * breakdown.price.output / 1000000; }
                else { inputCost = breakdown.price.input; outputCost = breakdown.price.output; }
                var totalParts = inputCost + outputCost; fill.replaceChildren(); fill.classList.add('mp-stacked');
                var parts = [[t('Input','इनपुट'),inputCost,'mp-input'],[t('Output','आउटपुट'),outputCost,'mp-output']];
                parts.forEach(function(part){ var segment=el('span',undefined,'mp-bar-segment '+part[2]); segment.style.width=(totalParts?part[1]/totalParts*100:0)+'%'; segment.title=part[0]+' · '+money(part[1]); fill.append(segment); });
                var breakdownLabel = el('span', undefined, 'mp-bar-breakdown');
                parts.forEach(function(part){var label=el('span',undefined,'mp-breakdown-item');label.append(el('i',undefined,part[2]),document.createTextNode(part[0]+' '+money(part[1])));breakdownLabel.append(label);});
                button.append(breakdownLabel);
                button.setAttribute('aria-label',m.name+' · '+providerName(m.provider)+'; '+t('Input','इनपुट')+' '+money(inputCost)+'; '+t('Output','आउटपुट')+' '+money(outputCost));
                bars.append(button);
            });
            if(searchFocused && search.isConnected){search.focus();search.setSelectionRange(caret,caret);}
        }
        var pending;
        function update() { clearTimeout(pending); pending = setTimeout(render, 120); }
        [form, toolbar, search, sortSelect, filterBar].forEach(function (node) { if (node) { node.addEventListener('input', update, {signal: context.signal}); node.addEventListener('change', update, {signal: context.signal}); } });
        render();
        return function () { clearTimeout(pending); fxRequest++; if (fxAbort) fxAbort.abort(); };
    });
}(typeof window === 'undefined' ? globalThis : window));
