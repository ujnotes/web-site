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
        var providerName = function (name) {
            return name === 'openai' ? 'OpenAI' : name === 'xai' ? 'xAI' : name === 'openrouter' ? 'OpenRouter' : name.charAt(0).toUpperCase() + name.slice(1);
        };
        var displayDate = function (value) {
            return value ? new Intl.DateTimeFormat(hi ? 'hi-IN' : 'en-GB', {day: 'numeric', month: 'short', year: 'numeric', timeZone: 'UTC'}).format(new Date(value)) : t('Not announced', 'घोषित नहीं');
        };

        function el(tag, text, className) {
            var node = document.createElement(tag);
            if (text !== undefined) node.textContent = text;
            if (className) node.className = className;
            return node;
        }
        function sourceLink(label, url) {
            var a = el('a', label); a.href = url; a.target = '_blank'; a.rel = 'noopener noreferrer'; return a;
        }
        function icon(name) {
            var paths = {
                table: 'M3 3h18v18H3z M3 9h18 M9 9v12 M3 15h18',
                chart: 'M4 3v17h17 M8 16v-5 M13 16V6 M18 16V9',
                calculator: 'M6 3h12v18H6z M9 7h6 M9 11h.01 M15 11h.01 M9 15h.01 M15 15h.01 M9 18h.01 M15 18h.01',
                expand: 'M8 3H3v5 M16 3h5v5 M3 16v5h5 M21 16v5h-5',
                collapse: 'M3 8h5V3 M16 3v5h5 M8 21v-5H3 M21 16h-5v5',
                calendar: 'M4 5h16v16H4z M8 3v4 M16 3v4 M4 10h16 M8 14h2 M14 14h2 M8 17h2',
                search: 'm21 21-4.35-4.35 M19 11a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z',
                filter: 'M4 6h16 M7 12h10 M10 18h4',
                chat: 'M4 4h16v12H9l-5 4z M8 8h8 M8 12h5',
                document: 'M5 3h9l5 5v13H5z M14 3v5h5 M8 12h8 M8 16h6',
                agent: 'M8 3H3v5h5z M21 3h-5v5h5z M9 16h6v5H9z M5 8v4h14V8 M12 12v4',
                volume: 'M13 2 4 14h7l-1 8 10-13h-7z'
            };
            var svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
            svg.setAttribute('viewBox', '0 0 24 24'); svg.setAttribute('fill', 'none');
            svg.setAttribute('stroke', 'currentColor'); svg.setAttribute('stroke-width', '1.7');
            svg.setAttribute('stroke-linecap', 'round'); svg.setAttribute('stroke-linejoin', 'round');
            svg.setAttribute('aria-hidden', 'true'); svg.setAttribute('focusable', 'false'); svg.classList.add('mp-ui-icon');
            var path = document.createElementNS('http://www.w3.org/2000/svg', 'path'); path.setAttribute('d', paths[name]); svg.append(path);
            return svg;
        }

        root.classList.add('model-pricing');
        var disclaimer = root.querySelector('.mp-disclaimer');
        if (!disclaimer && root.previousElementSibling?.tagName === 'P') disclaimer = root.previousElementSibling;
        if (disclaimer) disclaimer.classList.add('mp-disclaimer');
        root.replaceChildren();

        // 1. Header & Title Area
        var top = el('div', undefined, 'mp-heading');
        var heading = el('div', undefined, 'mp-heading-text');
        var h2 = el('h2', t('Compare rates. Plan your spend.', 'दरें तुलना करें। खर्च की योजना बनाएँ।'));
        var subtitle = el('p', t('Explore API prices by model and provider, then estimate your own workload.', 'मॉडल और प्रदाता की API दरें देखें, फिर अपने काम की लागत का अनुमान लगाएँ।'));
        heading.append(h2, subtitle);

        var download = sourceLink(t('↓ Download data', '↓ डेटा डाउनलोड करें'), url);
        download.setAttribute('download', 'model-pricing.json');
        download.title = t('Download complete price dataset', 'संपूर्ण मूल्य डेटासेट डाउनलोड करें');
        download.setAttribute('aria-label', download.title);
        download.className = 'mp-download';
        top.append(heading);

        // 2. Primary Options Toolbar (Card)
        var toolbarCard = el('div', undefined, 'mp-toolbar-card');
        var toolbar = el('div', undefined, 'mp-table-options');

        function fieldWrapper(label, inputNode) {
            var wrapper = el('label', undefined, 'mp-field');
            wrapper.append(el('span', label), inputNode);
            return wrapper;
        }

        var currencySelect = el('select', undefined, 'mp-select');
        [
            ['USD', '$ USD — US Dollar'],
            ['INR', '₹ INR — Indian Rupee'],
            ['EUR', '€ EUR — Euro'],
            ['GBP', '£ GBP — British Pound'],
            ['JPY', '¥ JPY — Japanese Yen'],
            ['NPR', 'रू NPR — Nepalese Rupee'],
            ['CAD', '$ CAD — Canadian Dollar'],
            ['AUD', '$ AUD — Australian Dollar']
        ].forEach(function (pair) {
            var opt = el('option', pair[1]); opt.value = pair[0]; currencySelect.append(opt);
        });
        var currency = currencySelect;

        var tierSelect = el('select');
        [['standard', t('Standard', 'मानक')], ['batch', t('Batch', 'बैच')]].forEach(function (p) {
            var opt = el('option', p[1]); opt.value = p[0]; tierSelect.append(opt);
        });
        tierSelect.hidden = true;
        var tier = tierSelect;
        var tierToggle = el('div', undefined, 'mp-tier-toggle');
        tierToggle.setAttribute('role', 'group');
        tierToggle.setAttribute('aria-label', t('Service tier', 'सेवा प्रकार'));
        Array.from(tierSelect.options).forEach(function (option) {
            var b = el('button', option.textContent);
            b.type = 'button';
            b.setAttribute('aria-pressed', String(option.value === tierSelect.value));
            b.addEventListener('click', function () {
                tierSelect.value = option.value;
                Array.from(tierToggle.children).forEach(function (x) { x.setAttribute('aria-pressed', String(x === b)); });
                tierSelect.dispatchEvent(new Event('change', {bubbles: true}));
            }, {signal: context.signal});
            tierToggle.append(b);
        });

        var today = new Date();
        var localDate = [today.getFullYear(), String(today.getMonth() + 1).padStart(2, '0'), String(today.getDate()).padStart(2, '0')].join('-');
        var dateInput = el('input');
        dateInput.type = 'date';
        dateInput.value = localDate < data.updated_on ? data.updated_on : localDate;
        dateInput.required = true;
        dateInput.min = data.updated_on;
        var date = dateInput;
        var defaultDate = date.value;
        var dateControl = el('details', undefined, 'mp-date-control');
        var dateButton = el('summary', undefined, 'mp-date-button'); dateButton.append(icon('calendar'));
        dateButton.setAttribute('aria-label', t('Price date', 'मूल्य तारीख'));
        var datePanel = el('div', undefined, 'mp-date-panel');
        var resetDate = el('button', t('Reset to today', 'आज पर रीसेट करें'), 'mp-date-reset'); resetDate.type = 'button';
        resetDate.addEventListener('click', function () { date.value = defaultDate; dateControl.open = false; render(); }, {signal:context.signal});
        dateInput.addEventListener('change', function () { if (date.checkValidity()) dateControl.open = false; }, {signal:context.signal});
        datePanel.append(fieldWrapper(t('Estimate date', 'अनुमान की तारीख'), dateInput), resetDate);
        dateControl.append(dateButton, datePanel);
        document.addEventListener('click', function (event) { if (!dateControl.contains(event.target)) dateControl.open = false; }, {signal:context.signal});
        dateControl.addEventListener('keydown', function (event) { if (event.key === 'Escape') { dateControl.open = false; dateButton.focus(); } }, {signal:context.signal});

        var fxInput = el('input');
        fxInput.type = 'number';
        fxInput.min = '0.000001';
        fxInput.max = '1000000';
        fxInput.step = 'any';
        fxInput.placeholder = t('Enter exchange rate', 'विनिमय दर भरें');
        var fx = fxInput;
        var fxWrapper = fieldWrapper(t('Exchange rate', 'विनिमय दर'), fxInput);
        fxWrapper.hidden = true;

        var currencyField = fieldWrapper(t('Currency', 'मुद्रा'), currencySelect); currencyField.classList.add('mp-currency-field');
        currencyField.append(el('span', undefined, 'mp-currency-caret'));
        var tierField = fieldWrapper(t('Service tier', 'सेवा प्रकार'), tierToggle); tierField.classList.add('mp-tier-field');
        toolbar.append(currencyField, tierField, dateControl, fxWrapper);

        var fxStatus = el('div', undefined, 'mp-fx-status');
        fxStatus.tabIndex = 0;
        fxStatus.setAttribute('aria-live', 'polite');
        function setFxStatus(text) {
            fxStatus.textContent = text;
            fxStatus.dataset.tooltip = text;
            fxStatus.setAttribute('aria-label', text);
        }
        setFxStatus(t('Provider list rates are officially billed in USD.', 'प्रदाता दरें आधिकारिक रूप से USD में हैं.'));
        currencyField.append(fxStatus);
        toolbarCard.append(toolbar);

        var fxMode = 'base', fxRequest = 0, fxAbort = null, fxCache = new Map();
        function rateNote(record) {
            var note = '1 USD = ' + numberFormat.format(record.rate) + ' ' + record.quote + ' · Frankfurter · ' + displayDate(record.date) + t(' · Daily reference rate (taxes & bank charges excluded).', ' · दैनिक संदर्भ दर (कर व बैंक शुल्क शामिल नहीं).');
            fxStatus.replaceChildren(
                document.createTextNode('1 USD = ' + numberFormat.format(record.rate) + ' ' + record.quote + ' · '),
                sourceLink('Frankfurter', 'https://frankfurter.dev/'),
                document.createTextNode(' · ' + displayDate(record.date) + t(' · Daily reference rate (taxes & bank charges excluded).', ' · दैनिक संदर्भ दर (कर व बैंक शुल्क शामिल नहीं).'))
            );
            fxStatus.dataset.tooltip = note;
            fxStatus.setAttribute('aria-label', note);
        }
        async function loadRate() {
            var ticket = ++fxRequest, quote = currency.value;
            if (fxAbort) fxAbort.abort();
            var converted = currency.value !== 'USD';
            fxWrapper.hidden = !converted; fx.disabled = !converted; fx.required = converted;
            fx.value = '';
            fxWrapper.querySelector('span').textContent = '1 USD = ' + currency.value;
            if (!converted) {
                fxMode = 'base';
                setFxStatus(t('Provider list rates are officially billed in USD.', 'प्रदाता दरें आधिकारिक रूप से USD में हैं.'));
                render();
                return;
            }
            fxMode = 'loading';
            setFxStatus(t('Fetching live reference exchange rate from Frankfurter… You may also enter a custom rate.', 'नवीनतम संदर्भ विनिमय दर लोड हो रही है… आप स्वयं भी दर भर सकते हैं.'));
            render();
            if (fxCache.has(quote)) {
                var cached = fxCache.get(quote);
                fx.value = cached.rate;
                fxMode = 'auto';
                rateNote(cached);
                render();
                return;
            }
            fxAbort = new AbortController();
            var abort = fxAbort, timeout = setTimeout(function () { abort.abort(); }, 10000);
            try {
                var result = await fetch('https://api.frankfurter.dev/v2/rate/USD/' + quote, {signal: abort.signal, referrerPolicy: 'no-referrer'});
                if (!result.ok) throw new Error('Rate unavailable');
                var record = validateExchangeRate(await result.json(), quote);
                if (ticket !== fxRequest || context.signal.aborted) return;
                fxCache.set(quote, record);
                fx.value = record.rate;
                fxMode = 'auto';
                rateNote(record);
                render();
            } catch (_) {
                if (ticket !== fxRequest || context.signal.aborted) return;
                fxMode = 'manual';
                setFxStatus(t('Exchange-rate service unavailable. Please enter a manual rate above.', 'विनिमय दर सेवा उपलब्ध नहीं है। कृपया ऊपर दर स्वयं भरें।'));
                render();
            } finally { clearTimeout(timeout); }
        }
        currency.addEventListener('change', loadRate, {signal: context.signal});
        fx.addEventListener('input', function () {
            fxRequest++; if (fxAbort) fxAbort.abort(); fxMode = 'manual';
            setFxStatus(t('Manual exchange rate applied. Bank fees and taxes excluded.', 'स्वयं भरी गई विनिमय दर लागू। बैंक शुल्क व कर शामिल नहीं।'));
        }, {signal: context.signal});
        context.signal.addEventListener('abort', function () { fxRequest++; if (fxAbort) fxAbort.abort(); }, {once: true});
        fx.disabled = true;

        // 3. Search & Filter Toolbar
        var searchWrapper = el('div', undefined, 'mp-search-wrapper mp-table-header-search');
        var searchToggle = el('button', undefined, 'mp-search-toggle');
        searchToggle.type = 'button';
        searchToggle.setAttribute('aria-label', t('Search models, families or providers', 'मॉडल, परिवार या प्रदाता खोजें'));
        searchToggle.title = searchToggle.getAttribute('aria-label');
        searchToggle.setAttribute('aria-expanded', 'false');
        searchToggle.append(icon('search'));
        var search = el('input', undefined, 'mp-search-input');
        search.type = 'search';
        search.placeholder = t('Search models, families, providers…', 'मॉडल, परिवार, प्रदाता खोजें…');
        search.setAttribute('aria-label', t('Search models, families or providers', 'मॉडल, परिवार या प्रदाता खोजें'));
        var searchClear = el('button', '×', 'mp-search-clear');
        searchClear.type = 'button';
        searchClear.title = t('Clear search', 'खोज साफ़ करें');
        searchClear.setAttribute('aria-label', searchClear.title);
        searchClear.hidden = true;
        searchClear.addEventListener('click', function () {
            search.value = '';
            searchClear.hidden = true;
            search.focus();
            render();
        }, {signal: context.signal});
        search.addEventListener('input', function () {
            searchClear.hidden = !search.value;
        }, {signal: context.signal});
        searchToggle.addEventListener('click', function () {
            var open = !searchWrapper.classList.contains('mp-search-open');
            searchWrapper.classList.toggle('mp-search-open', open);
            searchToggle.setAttribute('aria-expanded', String(open));
            if (open) search.focus();
        }, {signal: context.signal});
        search.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && !search.value) {
                searchWrapper.classList.remove('mp-search-open');
                searchToggle.setAttribute('aria-expanded', 'false');
                searchToggle.focus();
            }
        }, {signal: context.signal});
        searchWrapper.append(searchToggle, search, searchClear);

        var currentSortKey = 'input';
        var currentSortDirection = 'asc';
        // Filter Bar (Chips)
        var filterBar = el('div', undefined, 'mp-filter-bar');
        var familyFieldset = el('fieldset', undefined, 'mp-filter-group mp-families');
        familyFieldset.append(el('legend', t('Model family', 'मॉडल परिवार')));
        var allFamilies = Array.from(new Set(data.models.map(function (m) { return m.family; }))).sort();
        var familyButtons = allFamilies.map(function (fam) {
            var button = el('button', undefined, 'mp-filter-toggle mp-family-toggle mp-fam-' + fam);
            button.type = 'button';
            button.dataset.family = fam;
            button.setAttribute('aria-pressed', 'true');
            button.title = t('Click to toggle, double-click to isolate', 'टॉगल करने के लिए क्लिक करें, केवल इसे चुनने के लिए डबल-क्लिक करें');
            var indicator = el('span', undefined, 'mp-chip-indicator');
            var label = el('span', familyName(fam));
            button.append(indicator, label);
            button.addEventListener('click', function () {
                button.setAttribute('aria-pressed', button.getAttribute('aria-pressed') === 'true' ? 'false' : 'true');
                render();
            }, {signal: context.signal});
            button.addEventListener('dblclick', function () {
                familyButtons.forEach(function (x) { x.setAttribute('aria-pressed', String(x === button)); });
                render();
            }, {signal: context.signal});
            familyFieldset.append(button);
            return button;
        });

        var providerFieldset = el('fieldset', undefined, 'mp-filter-group mp-providers');
        providerFieldset.append(el('legend', t('Selling provider', 'विक्रेता प्रदाता')));
        var resellerFieldset = el('fieldset', undefined, 'mp-filter-group mp-resellers');
        resellerFieldset.append(el('legend', t('Reseller / Router', 'पुनर्विक्रेता / रूटर')));
        var allProviders = Array.from(new Set(data.models.map(function (m) { return m.provider; }))).sort();
        var providerButtons = allProviders.map(function (name) {
            var button = el('button', undefined, 'mp-filter-toggle mp-provider-toggle mp-prov-' + name);
            button.type = 'button';
            button.dataset.provider = name;
            button.setAttribute('aria-pressed', 'true');
            button.title = t('Click to toggle, double-click to isolate', 'टॉगल करने के लिए क्लिक करें, केवल इसे चुनने के लिए डबल-क्लिक करें');
            var indicator = el('span', undefined, 'mp-chip-indicator');
            var label = el('span', providerName(name));
            button.append(indicator, label);
            button.addEventListener('click', function () {
                button.setAttribute('aria-pressed', button.getAttribute('aria-pressed') === 'true' ? 'false' : 'true');
                render();
            }, {signal: context.signal});
            button.addEventListener('dblclick', function () {
                providerButtons.forEach(function (x) { x.setAttribute('aria-pressed', String(x === button)); });
                render();
            }, {signal: context.signal});
            (name === 'openrouter' ? resellerFieldset : providerFieldset).append(button);
            return button;
        });
        function addGroupRestore(fieldset, buttons, label) {
            var restore = el('button', '×', 'mp-filter-restore');
            restore.type = 'button';
            restore.title = t('Restore all ', 'सभी पुनर्स्थापित करें ') + label;
            restore.setAttribute('aria-label', restore.title);
            restore.addEventListener('click', function () {
                buttons.forEach(function (button) { button.setAttribute('aria-pressed', 'true'); });
                render();
            }, {signal: context.signal});
            fieldset.append(restore);
            return restore;
        }
        var providerRestore = addGroupRestore(providerFieldset, providerButtons.filter(function (button) { return button.dataset.provider !== 'openrouter'; }), t('selling providers', 'विक्रेता प्रदाता'));
        var familyRestore = addGroupRestore(familyFieldset, familyButtons, t('model families', 'मॉडल परिवार'));
        var resellerRestore = addGroupRestore(resellerFieldset, providerButtons.filter(function (button) { return button.dataset.provider === 'openrouter'; }), t('resellers and routers', 'पुनर्विक्रेता और रूटर'));
        filterBar.append(providerFieldset, familyFieldset, resellerFieldset);
        var filterDetails = el('details', undefined, 'mp-filter-details');
        var filterSummary = el('summary', undefined, 'mp-filter-summary');
        var filterStatus = el('span', '', 'mp-filter-status');
        filterSummary.append(icon('filter'), el('span', t('Filter models', 'मॉडल फ़िल्टर करें')), filterStatus);
        filterDetails.append(filterSummary, filterBar);

        var feedback = el('div', undefined, 'mp-feedback');
        feedback.setAttribute('role', 'status');

        var sections = el('div', undefined, 'mp-sections');
        var tableArea = el('div', undefined, 'mp-table-area');
        tableArea.append(sections);

        var unitNote = el('p', '', 'mp-note mp-unit-note');

        // 4. Cost Calculator Section
        var calculator = el('section', undefined, 'mp-calculator');
        var calculatorEnabled = false;
        var calculatorToggle = el('button', t('Open calculator', 'कैलकुलेटर खोलें'), 'mp-calculator-toggle');
        calculatorToggle.type = 'button';
        calculatorToggle.setAttribute('aria-pressed', 'false');

        var calculatorHeading = el('div', undefined, 'mp-panel-heading');
        var calcTitle = el('h3', t('Estimate your workload', 'अपने कार्यभार का अनुमान लगाएँ'));
        calculatorHeading.append(calcTitle, calculatorToggle);

        var calculatorBody = el('div', undefined, 'mp-calculator-body');
        calculatorBody.hidden = true;
        calculatorBody.id = 'mp-calculator-body-' + (hi ? 'hi' : 'en');
        calculatorToggle.setAttribute('aria-controls', calculatorBody.id);
        calculatorToggle.setAttribute('aria-expanded', 'false');

        // Presets
        var presetsWrapper = el('div', undefined, 'mp-presets-wrapper');
        presetsWrapper.append(el('div', t('Quick Workload Presets:', 'त्वरित कार्यभार प्रीसेट:'), 'mp-presets-label'));
        var presetsContainer = el('div', undefined, 'mp-presets');
        var presetConfigs = [
            { name: t('Chatbot', 'चैटबॉट'), sub: '1K in · 300 out · 10K req', req: 10000, inT: 1000, outT: 300 },
            { name: t('Document Q&A', 'दस्तावेज़ प्रश्नोत्तर'), sub: '15K in · 800 out · 2K req', req: 2000, inT: 15000, outT: 800 },
            { name: t('Agent Loop', 'एजेंट लूप'), sub: '6K in · 2K out · 5K req', req: 5000, inT: 6000, outT: 2000 },
            { name: t('High Volume API', 'उच्च मात्रा API'), sub: '500 in · 100 out · 100K req', req: 100000, inT: 500, outT: 100 }
        ];

        var calcForm = el('form', undefined, 'mp-calculator-form');
        calcForm.addEventListener('submit', function (e) { e.preventDefault(); }, {signal: context.signal});

        var modelSelectLabel = el('label', undefined, 'mp-field mp-calc-model-row');
        modelSelectLabel.append(el('span', t('Target Model (click any table row or chart bar to change)', 'लक्षित मॉडल (बदलने के लिए किसी तालिका पंक्ति या चार्ट बार पर क्लिक करें)')));
        var modelSelect = el('select', undefined, 'mp-select');
        data.models.filter(function (m) { return m.status === 'current'; }).forEach(function (m) {
            var opt = el('option', m.name + ' — ' + providerName(m.provider) + ' (' + familyName(m.family) + ')');
            opt.value = m.id;
            modelSelect.append(opt);
        });
        if (data.workload?.model_id && data.models.some(function (m) { return m.id === data.workload.model_id && m.status === 'current'; })) {
            modelSelect.value = data.workload.model_id;
        }
        modelSelectLabel.append(modelSelect);
        modelSelectLabel.append(el('span', undefined, 'mp-calc-model-caret'));
        calcForm.append(modelSelectLabel);

        var calcGrid = el('div', undefined, 'mp-calc-grid');

        function createSliderField(labelText, defaultValue, maxSlider, step) {
            var card = el('div', undefined, 'mp-slider-card');
            var header = el('div', undefined, 'mp-slider-header');
            var label = el('label', labelText);
            var valDisplay = el('span', numberFormat.format(defaultValue), 'mp-slider-val');
            header.append(label, valDisplay);

            var slider = el('input');
            slider.type = 'range';
            slider.min = '0';
            slider.max = String(maxSlider);
            slider.step = String(step || 1);
            slider.value = Math.min(Number(defaultValue), maxSlider);
            slider.setAttribute('aria-label', labelText + ' slider');

            var box = el('input');
            box.type = 'number';
            box.value = defaultValue;
            box.min = '0';
            box.max = '1000000000000';
            box.step = '1';
            box.required = true;
            box.setAttribute('aria-label', labelText);

            slider.addEventListener('input', function () {
                box.value = slider.value;
                valDisplay.textContent = numberFormat.format(slider.value);
                box.dispatchEvent(new Event('input', {bubbles: true}));
            }, {signal: context.signal});

            box.addEventListener('input', function () {
                slider.value = Math.min(Number(box.value) || 0, maxSlider);
                valDisplay.textContent = numberFormat.format(Number(box.value) || 0);
            }, {signal: context.signal});

            card.append(header, slider, box);
            calcGrid.append(card);
            return {box: box, slider: slider, display: valDisplay};
        }

        var reqField = createSliderField(t('Total Requests', 'कुल अनुरोध'), defaults.requests ?? 10000, 100000, 100);
        var inField = createSliderField(t('Input Tokens / Request', 'इनपुट टोकन / अनुरोध'), defaults.input_tokens_per_request ?? 1000, 32000, 50);
        var outField = createSliderField(t('Billable Output Tokens / Request', 'बिल योग्य आउटपुट टोकन / अनुरोध'), defaults.output_tokens_per_request ?? 200, 8000, 25);

        var requests = reqField.box;
        var input = inField.box;
        var output = outField.box;

        presetConfigs.forEach(function (conf, index) {
            var btn = el('button', undefined, 'mp-preset-btn');
            btn.type = 'button';
            var presetText = el('span', undefined, 'mp-preset-text');
            presetText.append(el('strong', conf.name), el('span', conf.sub));
            btn.append(icon(['chat', 'document', 'agent', 'volume'][index]), presetText);
            btn.addEventListener('click', function () {
                requests.value = conf.req; reqField.slider.value = Math.min(conf.req, 100000); reqField.display.textContent = numberFormat.format(conf.req);
                input.value = conf.inT; inField.slider.value = Math.min(conf.inT, 32000); inField.display.textContent = numberFormat.format(conf.inT);
                output.value = conf.outT; outField.slider.value = Math.min(conf.outT, 8000); outField.display.textContent = numberFormat.format(conf.outT);
                render();
            }, {signal: context.signal});
            presetsContainer.append(btn);
        });
        presetsWrapper.append(presetsContainer);

        calcForm.append(calcGrid);
        var summary = el('div', undefined, 'mp-summary');
        summary.setAttribute('aria-live', 'polite');

        calculatorBody.append(presetsWrapper, calcForm, summary);
        calculator.append(calculatorHeading, calculatorBody);

        function enableCalculator(enabled) {
            calculatorEnabled = enabled;
            calculatorBody.hidden = !enabled;
            calculatorToggle.setAttribute('aria-pressed', String(enabled));
            calculatorToggle.setAttribute('aria-expanded', String(enabled));
            calculatorToggle.textContent = enabled ? t('Close calculator', 'कैलकुलेटर बंद करें') : t('Open calculator', 'कैलकुलेटर खोलें');
            if (!enabled && metric.value === 'cost') metric.value = 'input';
            if (!enabled && currentSortKey === 'cost') currentSortKey = 'input';
            syncMetric();
            render();
        }
        calculatorToggle.addEventListener('click', function () {
            enableCalculator(!calculatorEnabled);
        }, {signal: context.signal});

        // 5. Graphical Comparison Chart Section
        var chart = el('section', undefined, 'mp-chart');
        var chartHeader = el('div', undefined, 'mp-chart-header');
        chartHeader.append(el('h3', t('Graphical Comparison', 'चित्रात्मक तुलना')));

        var metric = el('select');
        [['input', t('Input rate ($/1M)', 'इनपुट दर')], ['output', t('Output rate ($/1M)', 'आउटपुट दर')], ['typical', t('Typical mix', 'सामान्य मिश्रण')], ['cost', t('Est. cost', 'अनुमानित लागत')]].forEach(function (entry) {
            var option = el('option', entry[1]); option.value = entry[0]; metric.append(option);
        });
        metric.hidden = true;

        var metricOptions = el('div', undefined, 'mp-tier-toggle mp-metric-toggle');
        metricOptions.setAttribute('role', 'group');
        metricOptions.setAttribute('aria-label', t('Chart Metric', 'चार्ट मीट्रिक'));
        Array.from(metric.options).forEach(function (option) {
            var choice = el('button', option.textContent);
            choice.type = 'button';
            choice.dataset.metric = option.value;
            if (option.value === 'typical') choice.title = t('Typical mix: 3 input tokens (75%) and 1 output token (25%).', 'सामान्य मिश्रण: 3 इनपुट टोकन (75%) और 1 आउटपुट टोकन (25%)।');
            choice.setAttribute('aria-pressed', String(option.value === metric.value));
            choice.addEventListener('click', function () {
                metric.value = option.value;
                syncMetric();
                render();
            }, {signal: context.signal});
            metricOptions.append(choice);
        });
        chartHeader.append(metricOptions);
        chart.append(chartHeader);
        var chartUnits = el('p', '', 'mp-note'); chart.append(chartUnits);

        var chartLegend = el('div', undefined, 'mp-chart-legend');
        var inLegend = el('div', undefined, 'mp-legend-item');
        inLegend.append(el('span', undefined, 'mp-legend-swatch mp-swatch-input'), el('span', t('Input share', 'इनपुट हिस्सा')));
        var outLegend = el('div', undefined, 'mp-legend-item');
        outLegend.append(el('span', undefined, 'mp-legend-swatch mp-swatch-output'), el('span', t('Output share', 'आउटपुट हिस्सा')));
        chartLegend.append(inLegend, outLegend);

        var bars = el('div', undefined, 'mp-bars');
        chart.append(bars, chartLegend);

        function syncMetric() {
            Array.from(metricOptions.children).forEach(function (button) {
                button.hidden = button.dataset.metric === 'cost' && !calculatorEnabled;
                button.setAttribute('aria-pressed', String(button.dataset.metric === metric.value));
            });
        }
        syncMetric();

        var commonControls = el('div', undefined, 'mp-common-controls');
        commonControls.append(toolbarCard, filterDetails, feedback);
        var tabList = el('div', undefined, 'mp-tabs');
        tabList.setAttribute('role', 'tablist');
        tabList.setAttribute('aria-label', t('Pricing views', 'मूल्य दृश्य'));
        function downloadFooter() {
            var footer = el('div', undefined, 'mp-download-footer');
            footer.append(download.cloneNode(true));
            return footer;
        }
        var tablePanel = el('div', undefined, 'mp-view-panel'); tablePanel.append(tableArea, downloadFooter());
        var chartPanel = el('div', undefined, 'mp-view-panel'); chartPanel.append(chart, downloadFooter());
        var calculatorPanel = el('div', undefined, 'mp-view-panel'); calculatorPanel.append(calculator);
        calculatorToggle.hidden = true;
        var views = [
            {key:'table', label:t('Table', 'तालिका'), panel:tablePanel},
            {key:'chart', label:t('Chart', 'चार्ट'), panel:chartPanel},
            {key:'calculator', label:t('Calculator', 'कैलकुलेटर'), panel:calculatorPanel}
        ];
        var activeView = 'table';
        function selectView(key, focusTab) {
            activeView = key;
            views.forEach(function (view) {
                var active = view.key === key;
                view.panel.hidden = !active;
                view.tab.setAttribute('aria-selected', String(active));
                view.tab.tabIndex = active ? 0 : -1;
                if (active && focusTab) view.tab.focus();
            });
            filterDetails.hidden = key === 'calculator';
            if (key === 'calculator' && !calculatorEnabled) enableCalculator(true);
        }
        views.forEach(function (view, index) {
            var id = 'mp-' + (hi ? 'hi' : 'en') + '-' + view.key;
            var tab = el('button', undefined, 'mp-tab'); tab.type = 'button';
            tab.append(icon(view.key)); tab.setAttribute('aria-label', view.label); tab.title = view.label;
            tab.id = id + '-tab'; tab.setAttribute('role', 'tab'); tab.setAttribute('aria-controls', id + '-panel');
            view.panel.id = id + '-panel'; view.panel.setAttribute('role', 'tabpanel');
            view.panel.setAttribute('aria-labelledby', tab.id); view.panel.tabIndex = 0;
            view.tab = tab;
            tab.addEventListener('click', function () { selectView(view.key, false); }, {signal:context.signal});
            tab.addEventListener('keydown', function (event) {
                var next = event.key === 'ArrowRight' ? (index + 1) % views.length : event.key === 'ArrowLeft' ? (index + views.length - 1) % views.length : event.key === 'Home' ? 0 : event.key === 'End' ? views.length - 1 : null;
                if (next !== null) { event.preventDefault(); selectView(views[next].key, true); }
            }, {signal:context.signal});
            tabList.append(tab);
        });
        var tooltipLayer = el('div', undefined, 'mp-tooltip-layer');
        var notePositioners = new Map(), dismissedNoteId = null;
        function hideModelNotes() { Array.from(tooltipLayer.children).forEach(function (note) { note.hidden = true; }); }
        global.addEventListener('scroll', function () {
            hideModelNotes();
            var focusedNote = document.activeElement?.getAttribute('aria-describedby');
            if (focusedNote !== dismissedNoteId && notePositioners.has(focusedNote)) notePositioners.get(focusedNote)();
        }, {capture:true, signal:context.signal});
        root.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') { dismissedNoteId = document.activeElement?.getAttribute('aria-describedby'); hideModelNotes(); }
        }, {signal:context.signal});
        root.replaceChildren(top);
        if (disclaimer) root.append(disclaimer);
        root.append(tabList, commonControls, tablePanel, chartPanel, calculatorPanel, unitNote, tooltipLayer);
        selectView('table', false);
        var archiveOpen = false;
        var expandedTables = new Set();

        function chooseModel(event) {
            if (event.target.closest('a')) return;
            var row = event.target.closest('[data-model-id]');
            if (!row || !data.models.some(function (m) { return m.id === row.dataset.modelId && m.status === 'current'; })) return;
            modelSelect.value = row.dataset.modelId;
            selectView('calculator', false);
            render();
            modelSelect.focus({preventScroll:true});
        }
        sections.addEventListener('click', chooseModel, {signal: context.signal});
        bars.addEventListener('click', chooseModel, {signal: context.signal});

        function state() {
            var numeric = calculatorEnabled ? [requests, input, output, fx] : [fx];
            var valid = numeric.every(function (node) { return node.checkValidity(); }) && date.checkValidity() && isDate(date.value);
            return valid ? {
                requests: calculatorEnabled ? Number(requests.value) : 1,
                input: calculatorEnabled ? Number(input.value) : 0,
                output: calculatorEnabled ? Number(output.value) : 0,
                tier: tier.value,
                date: date.value
            } : null;
        }

        function render() {
            var customDate = isDate(date.value) && date.value !== defaultDate;
            dateControl.classList.toggle('mp-date-active', customDate);
            dateButton.title = t('Price date: ', 'मूल्य तारीख: ') + displayDate(date.value);
            dateButton.setAttribute('aria-label', t('Price date: ', 'मूल्य तारीख: ') + displayDate(date.value) + (customDate ? t(' (active)', ' (सक्रिय)') : ''));
            chartUnits.textContent = metric.value === 'cost' ? t('Estimated workload cost · ', 'अनुमानित कार्यभार लागत · ') + currency.value : metric.value === 'typical' ? t('Typical 3:1 input-to-output mix · ', 'सामान्य 3:1 इनपुट-आउटपुट मिश्रण · ') + currency.value + t(' per 1 million tokens · shared scale across all models', ' प्रति 10 लाख टोकन · सभी मॉडल एक ही पैमाने पर') : currency.value + t(' per 1 million tokens · shared scale across all models', ' प्रति 10 लाख टोकन · सभी मॉडल एक ही पैमाने पर');
            inLegend.hidden = metric.value === 'output'; outLegend.hidden = metric.value === 'input';
            inLegend.lastChild.textContent = (metric.value === 'cost' || metric.value === 'typical') ? t('Input share', 'इनपुट हिस्सा') : t('Input rate', 'इनपुट दर');
            outLegend.lastChild.textContent = (metric.value === 'cost' || metric.value === 'typical') ? t('Output share', 'आउटपुट हिस्सा') : t('Output rate', 'आउटपुट दर');
            Array.from(metricOptions.children).forEach(function (button) {
                button.textContent = button.dataset.metric === 'input' ? t('Input rate', 'इनपुट दर') : button.dataset.metric === 'output' ? t('Output rate', 'आउटपुट दर') : button.dataset.metric === 'typical' ? t('Typical mix', 'सामान्य मिश्रण') : t('Est. cost', 'अनुमानित लागत');
            });
            var searchFocused = document.activeElement === search;
            var caret = searchFocused ? search.selectionStart : null;
            var s = state();

            if (!s) {
                feedback.textContent = currency.value !== 'USD' && !fx.checkValidity()
                    ? (fxMode === 'loading' ? t('Loading exchange rate for ', 'विनिमय दर लोड हो रही है: ') : t('Enter a positive exchange rate to display prices in ', 'कीमतें दिखाने के लिए धनात्मक विनिमय दर भरें: ')) + currency.value
                    : t('Enter valid non-negative token counts and requests, a date on or after the data snapshot, and a positive exchange rate if used.', 'मान्य अनुरोध व टोकन संख्या, डेटा की तारीख या उसके बाद की तारीख और वैकल्पिक धनात्मक विनिमय दर भरें।');
            } else {
                feedback.textContent = '';
            }

            unitNote.textContent = t('Rates shown per 1 million tokens · ', 'दरें प्रति 10 लाख टोकन · ') + currency.value + t(' · Checked dates are recorded per source. Equal token counts do not mean equal quality or tokenisation. Estimates exclude cache, storage, tools, tax and retries. Confirm context limits and account access with the provider.', ' · हर स्रोत के साथ जाँच की तारीख दर्ज है। समान टोकन का अर्थ समान गुणवत्ता या टोकन-विभाजन नहीं है। कैश, स्टोरेज, टूल, कर और पुनः प्रयास शामिल नहीं हैं। संदर्भ सीमा और खाते की पहुँच प्रदाता से जाँचें।');

            summary.replaceChildren();
            sections.replaceChildren();
            tooltipLayer.replaceChildren();
            notePositioners.clear();

            var query = search.value.trim().toLowerCase();
            var enabledFamilies = new Set(familyButtons.filter(function (button) { return button.getAttribute('aria-pressed') === 'true'; }).map(function (button) { return button.dataset.family; }));
            var enabledProviders = new Set(providerButtons.filter(function (button) { return button.getAttribute('aria-pressed') === 'true'; }).map(function (button) { return button.dataset.provider; }));
            [[providerRestore, providerButtons.filter(function (button) { return button.dataset.provider !== 'openrouter'; })], [familyRestore, familyButtons], [resellerRestore, providerButtons.filter(function (button) { return button.dataset.provider === 'openrouter'; })]].forEach(function (group) {
                var inactive = group[1].some(function (button) { return button.getAttribute('aria-pressed') !== 'true'; });
                group[0].disabled = !inactive;
                group[0].hidden = !inactive;
            });
            var filterCount = familyButtons.length - enabledFamilies.size + providerButtons.length - enabledProviders.size;
            filterStatus.textContent = filterCount ? filterCount + t(' excluded', ' बाहर') : t('All providers & families', 'सभी प्रदाता और परिवार');

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
                var totalCard = el('div', undefined, 'mp-kpi-card mp-kpi-hero');
                totalCard.append(
                    el('span', t('ESTIMATED TOTAL COST', 'अनुमानित कुल लागत'), 'mp-kpi-title'),
                    el('strong', money(best.total), 'mp-total'),
                    el('span', selected.name + ' · ' + providerName(selected.provider), 'mp-kpi-desc')
                );

                var volumeCard = el('div', undefined, 'mp-kpi-card');
                var totalTokens = s.requests * (s.input + s.output);
                var tokensMillion = totalTokens >= 1000000 ? (totalTokens / 1000000).toFixed(2) + 'M' : numberFormat.format(totalTokens);
                volumeCard.append(
                    el('span', t('REQUESTS', 'अनुरोध'), 'mp-kpi-title'),
                    el('strong', numberFormat.format(s.requests), 'mp-snapshot'),
                    el('span', numberFormat.format(s.requests) + t(' req · ', ' अनुरोध · ') + tokensMillion + t(' tokens', ' टोकन'), 'mp-kpi-desc')
                );

                var unitCard = el('div', undefined, 'mp-kpi-card');
                unitCard.append(
                    el('span', t('COST PER REQUEST', 'प्रति अनुरोध लागत'), 'mp-kpi-title'),
                    el('strong', money(best.perRequest) + t(' / req', ' / अनुरोध'), 'mp-snapshot'),
                    el('span', selected.usage_fit?.[hi ? 'hi' : 'en'] || selected.scope || '', 'mp-kpi-desc')
                );

                summary.append(totalCard, volumeCard, unitCard);
            } else {
                summary.append(el('p', t('No verified estimate for the selected model, service tier or inputs.', 'चुने गए मॉडल, सेवा प्रकार या इनपुट के लिए सत्यापित अनुमान उपलब्ध नहीं है।'), 'mp-note'));
            }

            // Tables for Current, Retired, To-be-released
            [
                ['current', t('Current Models', 'वर्तमान मॉडल')],
                ['retired', t('Retired Models', 'सेवानिवृत्त मॉडल')],
                ['to_be_released', t('Upcoming Models', 'आगामी मॉडल')]
            ].forEach(function (group) {
                var models = filtered.filter(function (m) { return m.status === group[0]; });
                if (group[0] !== 'current' && !models.length) return;

                models.sort(function (a, b) {
                    return compareModels(a, b, currentSortKey, currentSortDirection, estimates);
                });

                var isArchive = group[0] === 'retired';
                var section = el(isArchive ? 'details' : 'section', undefined, 'mp-section' + (isArchive ? ' mp-archive' : ''));
                if (isArchive) {
                    section.open = archiveOpen;
                    section.addEventListener('toggle', function () { if (section.isConnected) archiveOpen = section.open; }, {signal:context.signal});
                }
                var h = el(isArchive ? 'summary' : 'h3', group[1]);
                h.append(el('span', String(models.length), 'mp-count'));
                if (group[0] === 'current') h.append(el('span', currency.value + t(' / 1M tokens', ' / 10 लाख टोकन'), 'mp-section-meta'));
                section.append(h);

                var scroller = el('div', undefined, 'mp-table-scroll');
                scroller.tabIndex = 0;
                scroller.setAttribute('role', 'region');
                scroller.setAttribute('aria-label', group[1]);
                scroller.id = 'mp-table-' + (hi ? 'hi' : 'en') + '-' + group[0];
                scroller.classList.toggle('mp-table-expanded', expandedTables.has(group[0]));
                if (!isArchive) {
                    var expandButton = el('button', undefined, 'mp-expand-table'); expandButton.type = 'button';
                    expandButton.setAttribute('aria-controls', scroller.id);
                    function syncExpansion() {
                        var expanded = expandedTables.has(group[0]);
                        scroller.classList.toggle('mp-table-expanded', expanded);
                        expandButton.setAttribute('aria-expanded', String(expanded));
                        expandButton.title = expanded ? t('Collapse table', 'तालिका छोटी करें') : t('Expand full table', 'पूरी तालिका फैलाएँ');
                        expandButton.setAttribute('aria-label', expandButton.title);
                        expandButton.replaceChildren(icon(expanded ? 'collapse' : 'expand'));
                    }
                    expandButton.addEventListener('click', function () {
                        if (expandedTables.has(group[0])) expandedTables.delete(group[0]); else expandedTables.add(group[0]);
                        syncExpansion();
                    }, {signal:context.signal});
                    syncExpansion(); h.append(expandButton);
                }

                var table = el('table');
                var caption = el('caption', group[1] + ' — ' + currency.value + t(' per 1 million tokens', ' प्रति 10 लाख टोकन'));
                caption.className = 'mp-sr-only';
                table.append(caption);

                var head = el('thead'), hr = el('tr');
                var sortableCols = [
                    {key: 'name', title: t('Model / Family', 'मॉडल / परिवार')},
                    {key: 'input', title: t('Input Rate', 'इनपुट दर')},
                    {key: 'output', title: t('Output Rate', 'आउटपुट दर')},
                    ...(calculatorEnabled ? [{key: 'cost', title: t('Estimated Total', 'अनुमानित कुल')}] : []),
                    {key: null, title: t('Suggested Fit', 'उपयुक्त उपयोग')},
                    {key: null, title: t('Price', 'स्रोत')},
                    {key: null, title: t('Guide', 'विवरण')}
                ];

                sortableCols.forEach(function (col) {
                    var th = el('th');
                    th.scope = 'col';
                    if (col.key) {
                        var btn = el('button', undefined, 'mp-th-sort');
                        btn.type = 'button';
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
                            render();
                        }, {signal: context.signal});
                        th.append(btn);
                        if (col.key === 'name' && group[0] === 'current') th.append(searchWrapper);
                    } else {
                        th.textContent = col.title;
                    }
                    hr.append(th);
                });
                head.append(hr);
                table.append(head);

                var body = el('tbody');
                models.forEach(function (model) {
                    var result = estimates.get(model.id);
                    var price = s ? priceFor(model, s.tier, s.date, s.input) : null;
                    var tr = el('tr');
                    var name = el('th');
                    name.scope = 'row';
                    var nameLine = el('div', undefined, 'mp-name-line');

                    if (model.status === 'current') {
                        tr.dataset.modelId = model.id;
                        var pick = el('button', model.name, 'mp-model-pick');
                        pick.type = 'button';
                        pick.setAttribute('aria-pressed', String(calculatorEnabled && model.id === modelSelect.value));
                        nameLine.append(pick);
                        if (calculatorEnabled && model.id === modelSelect.value) tr.className = 'mp-selected';
                    } else {
                        nameLine.append(el('strong', model.name));
                    }

                    var badges = el('div', undefined, 'mp-badges');
                    var famBadge = el('span', familyName(model.family), 'mp-badge mp-badge-family mp-fam-' + model.family);
                    famBadge.title = t('Model family: ', 'मॉडल परिवार: ') + familyName(model.family);

                    var provLabel = (model.provider === 'openrouter' ? t('via ', 'मार्ग: ') : '') + providerName(model.provider);
                    var provBadge = el('span', provLabel, 'mp-badge mp-badge-provider mp-prov-' + model.provider);
                    provBadge.title = t('Selling provider: ', 'विक्रेता प्रदाता: ') + providerName(model.provider);

                    badges.append(famBadge, provBadge);
                    nameLine.append(badges);
                    name.append(nameLine);

                    // Conditions are available on hover and keyboard focus.
                    var conditions = el('div', undefined, 'mp-conditions');
                    var longPrompt = s && model.context_tiers?.some(function (tier) { return contextApplies(tier, s.input); });
                    if (longPrompt) {
                        conditions.append(el('span', '' + t('Long-prompt tier active', 'लंबा प्रॉम्प्ट दर लागू'), 'mp-condition-tag mp-cond-warn'));
                    }
                    if (model.scope && !longPrompt) {
                        conditions.append(el('span', model.scope, 'mp-condition-tag'));
                    }
                    if (model.status === 'retired') {
                        conditions.append(el('span', t('Retired: ', 'सेवानिवृत्त: ') + displayDate(model.retired_on), 'mp-condition-tag'));
                    }
                    if (model.shutdown_on) {
                        conditions.append(el('span', t('Shutdown: ', 'बंद होने की तारीख: ') + displayDate(model.shutdown_on), 'mp-condition-tag mp-cond-warn'));
                    }
                    if (model.status === 'to_be_released') {
                        conditions.append(el('span', t('Release: ', 'जारी होने की तारीख: ') + displayDate(model.release_on), 'mp-condition-tag'));
                    }
                    var next = (model.scheduled_prices || []).filter(function (p) {
                        return s && p.service_tier === s.tier && p.effective_from > s.date;
                    }).sort(function (a, b) { return a.effective_from.localeCompare(b.effective_from); })[0];
                    if (next) {
                        conditions.append(el('span', money(next.input) + ' / ' + money(next.output) + t(' from ', ' से ') + displayDate(next.effective_from), 'mp-condition-tag'));
                    }
                    if (conditions.children.length) {
                        conditions.classList.add('mp-model-tooltip');
                        conditions.id = 'mp-notes-' + (hi ? 'hi' : 'en') + '-' + model.id;
                        conditions.setAttribute('role', 'tooltip');
                        var noteTrigger = nameLine.querySelector('.mp-model-pick') || nameLine.querySelector('strong');
                        noteTrigger.setAttribute('aria-describedby', conditions.id);
                        if (model.status !== 'current') noteTrigger.tabIndex = 0;
                        conditions.hidden = true;
                        tooltipLayer.append(conditions);
                        function showNotes() {
                            dismissedNoteId = null;
                            hideModelNotes(); conditions.hidden = false;
                            var rect = name.getBoundingClientRect();
                            conditions.style.left = Math.max(12, Math.min(rect.left, global.innerWidth - conditions.offsetWidth - 12)) + 'px';
                            conditions.style.top = (rect.bottom + conditions.offsetHeight + 8 > global.innerHeight ? Math.max(12, rect.top - conditions.offsetHeight - 8) : rect.bottom + 8) + 'px';
                        }
                        notePositioners.set(conditions.id, showNotes);
                        name.addEventListener('pointerenter', showNotes, {signal:context.signal});
                        name.addEventListener('pointerleave', function () { conditions.hidden = true; }, {signal:context.signal});
                        name.addEventListener('focusin', showNotes, {signal:context.signal});
                        name.addEventListener('focusout', function () { conditions.hidden = true; }, {signal:context.signal});
                    }

                    tr.append(name);

                    // Input & Output Rate Cells
                    ['input', 'output'].forEach(function (key) {
                        var td = el('td', undefined, 'mp-number');
                        if (price && price[key] !== null && s) {
                            td.append(document.createTextNode(money(price[key])), el('span', '/1M', 'mp-unit'));
                        } else {
                            td.textContent = '—';
                        }
                        tr.append(td);
                    });

                    // Total Cost Cell (when calculator is active)
                    if (calculatorEnabled) {
                        var totalCell = el('td', undefined, 'mp-total-cell');
                        if (result) {
                            totalCell.append(
                                el('strong', money(result.total)),
                                el('small', money(result.perRequest) + t(' / req', ' / अनुरोध'))
                            );
                        } else {
                            totalCell.textContent = model.status === 'retired'
                                ? t('Archived', 'संग्रहीत')
                                : model.status === 'to_be_released'
                                ? t('Not available', 'उपलब्ध नहीं')
                                : t('Not estimated', 'अनुमान उपलब्ध नहीं');
                        }
                        tr.append(totalCell);
                    }

                    // Suggested Fit
                    tr.append(el('td', model.usage_fit ? (model.usage_fit[hi ? 'hi' : 'en'] || model.usage_fit.en) : '—', 'mp-use'));

                    // Price Source & Guide Links
                    var sourceCell = el('td', undefined, 'mp-source');
                    var provenance = price || model.standard || model.batch;
                    var sURL = provenance?.source_url || model.lifecycle_source_url || model.announcement_source_url;
                    var checked = provenance?.checked_on || model.lifecycle_checked_on || model.announcement_checked_on;
                    if (sURL) {
                        var link = sourceLink('↗', sURL);
                        link.className = 'mp-icon-link';
                        link.title = t('Official price source; checked ', 'आधिकारिक मूल्य स्रोत; जाँच ') + (checked ? displayDate(checked) : '');
                        link.setAttribute('aria-label', link.title);
                        sourceCell.append(link);
                    }

                    var guideCell = el('td', undefined, 'mp-source');
                    if (model.usage_source_url) {
                        var guideLink = sourceLink('ⓘ', model.usage_source_url);
                        guideLink.className = 'mp-icon-link';
                        guideLink.title = t('Model guide', 'मॉडल विवरण');
                        guideLink.setAttribute('aria-label', guideLink.title);
                        guideCell.append(guideLink);
                    }

                    tr.append(sourceCell, guideCell);
                    body.append(tr);
                });

                if (!models.length) {
                    var emptyRow = el('tr');
                    var emptyCell = el('td', undefined, 'mp-empty');
                    emptyCell.colSpan = calculatorEnabled ? 7 : 6;
                    emptyCell.append(
                        el('p', t('No models match the active filters and search query.', 'सक्रिय फ़िल्टर और खोज के अनुसार कोई मॉडल नहीं मिला।')),
                        el('button', t('Reset all filters', 'सभी फ़िल्टर रीसेट करें'), 'mp-reset mp-empty-reset')
                    );
                    emptyCell.querySelector('button').addEventListener('click', function () {
                        search.value = '';
                        searchClear.hidden = true;
                        familyButtons.concat(providerButtons).forEach(function (button) { button.setAttribute('aria-pressed', 'true'); });
                        render();
                    }, {signal: context.signal});
                    emptyRow.append(emptyCell);
                    body.append(emptyRow);
                }

                table.append(body);
                scroller.append(table);
                section.append(scroller);
                sections.append(section);
            });

            // Graphical Bars
            bars.replaceChildren();
            var chartValue = function (m) {
                var value = estimates.get(m.id);
                return metric.value === 'cost' ? value.total : metric.value === 'typical' ? (value.price.input * 0.75) + (value.price.output * 0.25) : value.price[metric.value];
            };
            var chartModels = filtered.filter(function (m) { return estimates.get(m.id); }).sort(function (a, b) {
                return chartValue(b) - chartValue(a) || a.name.localeCompare(b.name);
            });
            var maximum = Math.max(0, ...chartModels.map(chartValue));

            if (!chartModels.length) {
                bars.append(el('p', t('No priced models match the current filters and inputs.', 'वर्तमान फ़िल्टर और इनपुट के लिए कीमत वाले मॉडल नहीं मिले।'), 'mp-empty'));
            }

            chartModels.forEach(function (m) {
                var value = chartValue(m);
                var button = el('button', undefined, 'mp-bar-row');
                button.type = 'button';
                button.dataset.modelId = m.id;
                button.setAttribute('aria-pressed', String(calculatorEnabled && m.id === modelSelect.value));

                var line = el('span', undefined, 'mp-bar-label');
                var nameSpan = el('span', m.name + ' · ' + providerName(m.provider), 'mp-bar-name');
                var valStrong = el('strong', money(value));
                line.append(nameSpan, valStrong);

                var track = el('span', undefined, 'mp-bar-track');
                var fill = el('span', undefined, 'mp-bar-fill');
                fill.style.width = (maximum ? (value / maximum) * 100 : 0) + '%';

                var breakdown = estimates.get(m.id);
                var inputCost, outputCost;
                if (metric.value === 'cost') {
                    inputCost = (s.requests * s.input * breakdown.price.input) / 1000000;
                    outputCost = (s.requests * s.output * breakdown.price.output) / 1000000;
                } else if (metric.value === 'typical') {
                    inputCost = breakdown.price.input * 0.75;
                    outputCost = breakdown.price.output * 0.25;
                } else {
                    inputCost = breakdown.price.input;
                    outputCost = breakdown.price.output;
                }

                var totalParts = inputCost + outputCost;
                var inputPercent = metric.value === 'input' ? 100 : metric.value === 'output' ? 0 : totalParts > 0 ? (inputCost / totalParts) * 100 : 0;
                var outputPercent = metric.value === 'output' ? 100 : metric.value === 'input' ? 0 : totalParts > 0 ? (outputCost / totalParts) * 100 : 0;

                var inSeg = el('span', undefined, 'mp-bar-segment mp-input');
                inSeg.style.width = inputPercent + '%';
                inSeg.title = t('Input: ', 'इनपुट: ') + money(inputCost);

                var outSeg = el('span', undefined, 'mp-bar-segment mp-output');
                outSeg.style.width = outputPercent + '%';
                outSeg.title = t('Output: ', 'आउटपुट: ') + money(outputCost);

                fill.append(inSeg, outSeg);
                track.append(fill);
                button.append(line, track);

                var breakdownLabel = el('span', undefined, 'mp-bar-breakdown');
                var item1 = el('span', undefined, 'mp-breakdown-item');
                item1.append(el('i', undefined, 'mp-input'), document.createTextNode(t('Input: ', 'इनपुट: ') + money(inputCost)));
                var item2 = el('span', undefined, 'mp-breakdown-item');
                item2.append(el('i', undefined, 'mp-output'), document.createTextNode(t('Output: ', 'आउटपुट: ') + money(outputCost)));
                breakdownLabel.append(item1, item2);
                button.append(breakdownLabel);

                button.setAttribute('aria-label', m.name + ' · ' + providerName(m.provider) + '; ' + t('Input: ', 'इनपुट: ') + money(inputCost) + '; ' + t('Output: ', 'आउटपुट: ') + money(outputCost));
                bars.append(button);
            });

            if (searchFocused && search.isConnected) {
                search.focus();
                search.setSelectionRange(caret, caret);
            }
        }

        var pending;
        function update() { clearTimeout(pending); pending = setTimeout(render, 120); }

        [calcForm, toolbar, search, filterBar].forEach(function (node) {
            if (node) {
                node.addEventListener('input', update, {signal: context.signal});
                node.addEventListener('change', update, {signal: context.signal});
            }
        });

        render();
        return function () { clearTimeout(pending); fxRequest++; if (fxAbort) fxAbort.abort(); };
    });
}(typeof window === 'undefined' ? globalThis : window));
