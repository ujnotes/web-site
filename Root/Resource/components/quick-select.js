(function () {
    'use strict';

    const maxLength = 16;
    const maxActions = 500;

    function validArray(values) {
        return Array.isArray(values) && values.length >= 2 && values.length <= maxLength &&
            values.every(value => Number.isSafeInteger(value) && Math.abs(value) <= 999);
    }

    function parseArray(input) {
        const trimmed = input.trim();
        const raw = trimmed.startsWith('[') && trimmed.endsWith(']') ? trimmed.slice(1, -1).trim() : trimmed;
        if (!/^[+-]?\d+(?:(?:\s*,\s*|\s+)[+-]?\d+)*$/.test(raw)) return null;
        const values = raw.split(/\s*,\s*|\s+/).map(Number);
        return validArray(values) ? values : null;
    }

    function start(values, k) {
        return {values: values.slice(), k, low: 0, high: values.length - 1, lt: 0, scan: 0, gt: values.length - 1,
            pivot: null, compared: false, comparison: 0, done: false, found: null, marks: []};
    }

    function available(state, action) {
        if (state.done) return false;
        if (state.pivot === null) return action === 'choose';
        if (state.scan > state.gt) return action === 'narrow';
        if (action === 'compare') return !state.compared;
        if (!state.compared) return false;
        return (action === 'less' && state.comparison < 0) ||
            (action === 'greater' && state.comparison > 0) ||
            (action === 'equal' && state.comparison === 0);
    }

    function apply(state, action) {
        if (!available(state, action)) return null;
        const next = {...state, values: state.values.slice(), marks: []};
        let detail = {};
        switch (action) {
        case 'choose':
            next.pivot = state.values[Math.floor((state.low + state.high) / 2)];
            next.lt = state.low;
            next.scan = state.low;
            next.gt = state.high;
            next.compared = false;
            detail = {pivot: next.pivot};
            break;
        case 'compare': {
            const value = state.values[state.scan];
            next.comparison = value < state.pivot ? -1 : value > state.pivot ? 1 : 0;
            next.compared = true;
            next.marks = [state.scan];
            detail = {value, pivot: state.pivot, index: state.scan};
            break;
        }
        case 'less': {
            const a = state.lt;
            const b = state.scan;
            [next.values[a], next.values[b]] = [next.values[b], next.values[a]];
            next.lt++;
            next.scan++;
            next.compared = false;
            next.marks = [...new Set([a, b])];
            detail = {a, b, left: state.values[a], right: state.values[b]};
            break;
        }
        case 'greater': {
            const a = state.scan;
            const b = state.gt;
            [next.values[a], next.values[b]] = [next.values[b], next.values[a]];
            next.gt--;
            next.compared = false;
            next.marks = [...new Set([a, b])];
            detail = {a, b, left: state.values[a], right: state.values[b]};
            break;
        }
        case 'equal':
            next.scan++;
            next.compared = false;
            next.marks = [state.scan];
            detail = {value: state.values[state.scan], pivot: state.pivot, index: state.scan};
            break;
        case 'narrow':
            if (state.k >= state.lt && state.k <= state.gt) {
                next.found = state.values[state.k];
                next.done = true;
                next.pivot = null;
                detail = {found: next.found};
            } else {
                if (state.k < state.lt) next.high = state.lt - 1;
                else next.low = state.gt + 1;
                next.pivot = null;
                next.compared = false;
                next.lt = next.low;
                next.scan = next.low;
                next.gt = next.high;
                detail = {low: next.low, high: next.high};
            }
            break;
        }
        return {action, state: next, detail};
    }

    function trace(values, k) {
        const rows = [{action: 'start', state: start(values, k), detail: {}}];
        const current = () => rows[rows.length - 1].state;
        const record = action => rows.push(apply(current(), action));
        while (!current().done) {
            if (current().pivot === null) record('choose');
            while (current().scan <= current().gt) {
                record('compare');
                const comparison = current().comparison;
                record(comparison < 0 ? 'less' : comparison > 0 ? 'greater' : 'equal');
            }
            record('narrow');
        }
        return rows;
    }

    if (typeof module !== 'undefined' && module.exports) {
        module.exports = {parseArray, start, apply, trace};
        return;
    }

    window.UjnotesComponents.register('quick-select', async function (root, {signal}) {
        const hi = /^hi\b/.test(root.lang);
        const t = (en, hindi) => hi ? hindi : en;
        const response = await fetch(root.dataset.source, {signal});
        if (!response.ok) throw new Error('Quickselect examples unavailable');
        const {examples} = await response.json();
        if (!Array.isArray(examples) || examples.length !== 3 ||
            !examples.every(example => typeof example.en === 'string' && typeof example.hi === 'string' &&
                validArray(example.values) && Number.isInteger(example.k) && example.k >= 0 && example.k < example.values.length)) {
            throw new Error('Invalid Quickselect examples');
        }
        if (signal.aborted) return;

        function el(tag, className, ...children) {
            const node = document.createElement(tag);
            if (className) node.className = className;
            node.append(...children);
            return node;
        }

        function button(label, callback, className = '', ariaLabel = label) {
            const node = el('button', className, label);
            node.type = 'button';
            node.setAttribute('aria-label', ariaLabel);
            node.addEventListener('click', callback, {signal});
            return node;
        }

        const labels = {
            choose: t('Choose pivot', 'पिवट चुनें'), compare: t('Compare', 'तुलना करें'),
            less: t('Move left', 'बाईं ओर रखें'), greater: t('Move right', 'दाईं ओर रखें'),
            equal: t('Keep equal', 'बराबर रखें'), narrow: t('Keep this range', 'यह सीमा रखें')
        };
        const number = value => el('code', 'qsel-number', String(value));
        const index = value => el('code', 'qsel-index', String(value));
        const rangeText = state => `${state.low}…${state.high}`;
        let idSequence = 0;
        const unique = value => `${value}-${idSequence++}`;

        function describe(row) {
            const {action, state, detail} = row;
            switch (action) {
            case 'start': return [t('Ready to select rank ', 'चयन के लिए क्रम स्थान '), String(state.k + 1), '.'];
            case 'choose': return [t('Choose the middle-position value ', 'बीच वाले स्थान का मान पिवट चुनें '), number(detail.pivot), t(' as pivot for this range.', '।')];
            case 'compare': return [t('Compare ', 'तुलना करें '), number(detail.value), t(' with pivot ', ' और पिवट '), number(detail.pivot), '.'];
            case 'less': return [t('Swap positions ', 'स्थान बदलें '), index(detail.a), ' ↔ ', index(detail.b), t('; move the smaller value to the left region.', '। छोटे मान को बाएँ हिस्से में रखें।')];
            case 'greater': return [t('Swap positions ', 'स्थान बदलें '), index(detail.a), ' ↔ ', index(detail.b), t('; move the larger value to the right region.', '। बड़े मान को दाएँ हिस्से में रखें।')];
            case 'equal': return [t('Keep ', 'रखें '), number(detail.value), t(' in the middle region and scan the next value.', ' को बीच वाले हिस्से में और अगला मान जाँचें।')];
            case 'narrow': return detail.found !== undefined
                ? [t('The requested rank is in the equal region. The answer is ', 'माँगा गया क्रम स्थान बराबर वाले हिस्से में है। उत्तर है '), number(detail.found), '.']
                : [t('Keep only the range ', 'केवल यह सीमा रखें '), index(detail.low), '…', index(detail.high), t(' and choose a new pivot.', ' और नया पिवट चुनें।')];
            default: return [state.done ? t('Selection complete.', 'चयन पूरा हुआ।') : t('Continue the partition.', 'विभाजन आगे बढ़ाएँ।')];
            }
        }

        function board(row, full = true) {
            const {state, action} = row;
            const values = state.values.map((value, position) => {
                const inRange = !state.done && position >= state.low && position <= state.high;
                const isPivot = state.pivot !== null && value === state.pivot && inRange;
                const marked = row.state.marks?.includes(position);
                const swapping = action === 'less' || action === 'greater';
                const role = marked && swapping ? 'qsel-swap' :
                    marked ? 'qsel-scan' : isPivot ? 'qsel-pivot' : '';
                const tile = el('span', `qsel-tile${isPivot ? ' qsel-pivot' : ''}${state.done && position === state.k ? ' qsel-selected' : ''}`,
                    el('span', 'qsel-position', String(position)),
                    el('span', `qsel-value ${role}`, String(value)),
                    el('span', 'qsel-mark', [position === state.lt ? 'lt' : '', position === state.scan ? 'scan' : '', position === state.gt ? 'gt' : ''].filter(Boolean).join(' · ') || '\u00a0'));
                if (!full) tile.classList.add('qsel-compact');
                tile.setAttribute('aria-label', `${value}, ${t('index', 'इंडेक्स')} ${position}${isPivot ? ', '+t('pivot', 'पिवट') : ''}`);
                return tile;
            });
            return el('div', full ? 'qsel-board' : 'qsel-row', ...values);
        }

        function table(rows, caption, selected = -1, mismatch = -1) {
            const headings = [t('Step', 'चरण'), t('Array after action', 'क्रिया के बाद सूची'), 'lt / scan / gt', t('Action', 'क्रिया')];
            const body = rows.map((row, n) => {
                const step = el('th', '', String(n + 1));
                step.scope = 'row';
                const state = row.state;
                const indices = state.pivot === null ? '–' : `${state.lt} / ${state.scan} / ${state.gt}`;
                return el('tr', n === mismatch ? 'qsel-mismatch' : n === selected ? 'qsel-selected-row' : '',
                    step, el('td', '', board(row, false)), el('td', 'qsel-indices', indices),
                    el('td', '', ...describe(row)));
            });
            const header = el('tr', '', ...headings.map(label => {
                const cell = el('th', '', label);
                cell.scope = 'col';
                return cell;
            }));
            const tableNode = el('table', '', el('caption', '', caption), el('thead', '', header), el('tbody', '', ...body));
            const wrap = el('div', 'qsel-table-wrap', tableNode);
            return wrap;
        }

        const tabBar = el('div', 'qsel-tabs');
        const examplePanel = el('section', 'qsel-panel');
        const scratchPanel = el('section', 'qsel-panel');
        const tabPanels = [examplePanel, scratchPanel];
        const tabButtons = [];
        [t('Worked examples', 'हल किए गए उदाहरण'), t('Scratch pad', 'अपना अभ्यास')].forEach((label, i) => {
            const node = button(label, () => setTab(i));
            node.id = unique(`qsel-tab-${i}`);
            node.setAttribute('role', 'tab');
            node.setAttribute('aria-controls', unique(`qsel-panel-${i}`));
            node.tabIndex = i === 0 ? 0 : -1;
            node.setAttribute('aria-selected', String(i === 0));
            tabPanels[i].id = node.getAttribute('aria-controls');
            tabPanels[i].setAttribute('role', 'tabpanel');
            tabPanels[i].setAttribute('aria-labelledby', node.id);
            node.addEventListener('keydown', event => {
                if (!['ArrowLeft', 'ArrowRight', 'Home', 'End'].includes(event.key)) return;
                event.preventDefault();
                const active = event.key === 'Home' ? 0 : event.key === 'End' ? 1 : 1 - i;
                setTab(active);
                tabButtons[active].focus();
            }, {signal});
            tabBar.append(node);
            tabButtons.push(node);
        });
        function setTab(active) {
            tabPanels.forEach((panel, i) => {
                panel.hidden = i !== active;
                tabButtons[i].tabIndex = i === active ? 0 : -1;
                tabButtons[i].setAttribute('aria-selected', String(i === active));
            });
        }

        let selectedExample = 0;
        let reference = trace(examples[0].values, examples[0].k);
        let referenceStep = 0;
        const exampleName = el('strong', 'qsel-example-name');
        const prevExample = button('←', () => { selectedExample = (selectedExample + examples.length - 1) % examples.length; resetExample(); }, 'qsel-arrow', t('Previous example', 'पिछला उदाहरण'));
        const nextExample = button('→', () => { selectedExample = (selectedExample + 1) % examples.length; resetExample(); }, 'qsel-arrow', t('Next example', 'अगला उदाहरण'));
        const exampleNav = el('div', 'qsel-example-nav', prevExample, exampleName, nextExample);
        const exampleBoard = el('div', 'qsel-board-wrap');
        const reason = el('p', 'qsel-explanation');
        const stepLabel = el('span', 'qsel-muted');
        const previousStep = button(t('Previous step', 'पिछला चरण'), () => { referenceStep--; renderExample(); });
        const nextStep = button(t('Next step', 'अगला चरण'), () => { referenceStep++; renderExample(); });
        const stepNav = el('div', 'qsel-controls qsel-step-nav', previousStep, stepLabel, nextStep);
        const allSteps = el('details', 'qsel-details');
        allSteps.append(el('summary', '', t('Show all reference steps', 'सभी संदर्भ चरण दिखाएँ')));
        const tableSlot = el('div', 'qsel-table-slot');
        allSteps.append(tableSlot);
        examplePanel.append(exampleNav, exampleBoard, reason, stepNav, allSteps,
            button(t('Try this example in the scratch pad', 'इस उदाहरण को अभ्यास क्षेत्र में करें'), () => {
                const item = examples[selectedExample];
                valuesInput.value = item.values.join(', ');
                rankInput.value = String(item.k + 1);
                resetAttempt(item.values, item.k);
                setTab(1);
                tabButtons[1].focus();
            }, 'qsel-try'));

        function renderExample() {
            const item = examples[selectedExample];
            const row = reference[referenceStep];
            exampleName.textContent = `${selectedExample + 1} / ${examples.length} · ${item[hi ? 'hi' : 'en']}`;
            exampleBoard.replaceChildren(board(row));
            reason.replaceChildren(...describe(row));
            stepLabel.textContent = t(`Step ${referenceStep + 1} of ${reference.length}`, `चरण ${referenceStep + 1} / ${reference.length}`);
            previousStep.disabled = referenceStep === 0;
            nextStep.disabled = referenceStep === reference.length - 1;
            if (allSteps.open) {
                tableSlot.replaceChildren(table(reference, t('Reference run', 'संदर्भ क्रम'), referenceStep));
            }
        }
        allSteps.addEventListener('toggle', () => {
            if (allSteps.open) tableSlot.replaceChildren(table(reference, t('Reference run', 'संदर्भ क्रम'), referenceStep));
        }, {signal});
        function resetExample() {
            const item = examples[selectedExample];
            reference = trace(item.values, item.k);
            referenceStep = 0;
            allSteps.open = false;
            tableSlot.replaceChildren();
            renderExample();
        }

        const valuesInput = document.createElement('input');
        valuesInput.type = 'text';
        valuesInput.autocomplete = 'off';
        valuesInput.value = examples[0].values.join(', ');
        valuesInput.setAttribute('aria-label', t('Values, comma-separated integers', 'मान, अल्पविराम से अलग पूर्णांक'));
        const rankInput = document.createElement('input');
        rankInput.type = 'number';
        rankInput.min = '1';
        rankInput.value = String(examples[0].k + 1);
        rankInput.setAttribute('aria-label', t('Rank, counting from one', 'क्रम स्थान, एक से गिनें'));
        const error = el('p', 'qsel-error');
        error.hidden = true;
        const form = el('form', 'qsel-input');
        const valuesLabel = el('label', '', t('Array values', 'सूची के मान'), valuesInput);
        const rankLabel = el('label', '', t('Rank to find', 'ढूँढ़ने का क्रम स्थान'), rankInput);
        const loadButton = button(t('Load array', 'सूची लाएँ'), () => {}, 'qsel-primary');
        loadButton.type = 'submit';
        form.append(valuesLabel, rankLabel, loadButton);
        form.addEventListener('submit', event => {
            event.preventDefault();
            const values = parseArray(valuesInput.value);
            const rank = Number(rankInput.value);
            if (!values || !Number.isInteger(rank) || rank < 1 || rank > values.length) {
                error.hidden = false;
                error.textContent = t(`Enter ${2}–${maxLength} integers (each from -999 to 999) and a rank from 1 to the array length.`,
                    `${2}–${maxLength} पूर्णांक (-999 से 999 तक) और सूची की लंबाई के भीतर क्रम स्थान दें।`);
                valuesInput.setAttribute('aria-invalid', String(!values));
                rankInput.setAttribute('aria-invalid', String(!Number.isInteger(rank) || rank < 1 || rank > (values?.length || 0)));
                return;
            }
            valuesInput.removeAttribute('aria-invalid');
            rankInput.removeAttribute('aria-invalid');
            resetAttempt(values, rank - 1);
        }, {signal});
        const practiceBoard = el('div', 'qsel-board-wrap');
        const practiceStatus = el('p', 'qsel-status', t('Load a list, then follow each partition step.', 'सूची लाएँ, फिर विभाजन का हर चरण करें।'));
        const actionButtons = {};
        const actionNav = el('div', 'qsel-controls qsel-action-nav');
        ['choose', 'compare', 'less', 'equal', 'greater', 'narrow'].forEach(action => {
            actionButtons[action] = button(labels[action], () => makeAction(action));
            actionNav.append(actionButtons[action]);
        });
        const undo = button(t('Undo', 'पूर्ववत करें'), () => { if (attempt.length > 1) attempt.pop(); renderPractice(); });
        const reset = button(t('Restart', 'फिर शुरू करें'), () => resetAttempt(currentValues, currentK));
        const reveal = button(t('Compare with reference', 'संदर्भ से तुलना करें'), () => { revealed = !revealed; renderPractice(); }, '', t('Compare your actions with the reference', 'अपने चरणों की संदर्भ से तुलना करें'));
        const practiceControls = el('div', 'qsel-controls qsel-practice-nav', undo, reset, reveal);
        const comparison = el('p', 'qsel-feedback');
        comparison.hidden = true;
        const ownSteps = el('div', 'qsel-table-slot');
        const referenceSteps = el('div', 'qsel-table-slot');
        scratchPanel.append(form, error, practiceBoard, practiceStatus, actionNav, practiceControls, comparison, ownSteps, referenceSteps);

        let currentValues = examples[0].values.slice();
        let currentK = examples[0].k;
        let answer = trace(currentValues, currentK);
        let attempt = [{action: 'start', state: start(currentValues, currentK), detail: {}}];
        let revealed = false;
        function makeAction(action) {
            const row = apply(attempt[attempt.length - 1].state, action);
            if (row && attempt.length < maxActions) attempt.push(row);
            renderPractice();
        }
        function resetAttempt(values, k) {
            currentValues = values.slice();
            currentK = k;
            answer = trace(currentValues, currentK);
            attempt = [{action: 'start', state: start(values, k), detail: {}}];
            revealed = false;
            error.hidden = true;
            comparison.hidden = true;
            renderPractice();
        }
        function renderPractice() {
            const row = attempt[attempt.length - 1];
            const state = row.state;
            practiceBoard.replaceChildren(board(row));
            const context = state.done ? t(`Selected value: ${state.found}.`, `चुना गया मान: ${state.found}।`) :
                state.pivot === null ? t(`Choose a pivot for range ${rangeText(state)}.`, `सीमा ${rangeText(state)} के लिए पिवट चुनें।`) :
                    t(`Rank ${state.k + 1} · range ${rangeText(state)} · lt ${state.lt} · scan ${state.scan} · gt ${state.gt} · pivot ${state.pivot}`,
                        `क्रम ${state.k + 1} · सीमा ${rangeText(state)} · lt ${state.lt} · जाँच ${state.scan} · gt ${state.gt} · पिवट ${state.pivot}`);
            practiceStatus.textContent = context;
            if (attempt.length >= maxActions) practiceStatus.textContent += ' · ' + t('Restart to continue.', 'जारी रखने के लिए फिर से शुरू करें।');
            Object.keys(actionButtons).forEach(action => {
                actionButtons[action].disabled = attempt.length >= maxActions || !available(state, action);
            });
            undo.disabled = attempt.length <= 1;
            reveal.setAttribute('aria-expanded', String(revealed));
            let mismatch = -1;
            if (revealed) {
                mismatch = attempt.findIndex((entry, n) => entry.action !== answer[n]?.action);
                comparison.hidden = false;
                comparison.textContent = mismatch >= 0
                    ? t(`The first different action is step ${mismatch + 1}.`, `पहली अलग क्रिया चरण ${mismatch + 1} पर है।`)
                    : attempt.length === answer.length
                        ? t('Every action matches the reference.', 'सभी क्रियाएँ संदर्भ से मेल खाती हैं।')
                        : t(`Your first ${attempt.length} steps match. Continue to compare the rest.`, `पहले ${attempt.length} चरण मेल खाते हैं। बाकी की तुलना के लिए आगे बढ़ें।`);
            } else comparison.hidden = true;
            ownSteps.replaceChildren(table(attempt, t('Your steps', 'आपके चरण'), mismatch < 0 ? attempt.length - 1 : -1, mismatch));
            if (revealed) {
                const expected = mismatch < 0 ? Math.min(attempt.length, answer.length - 1) : -1;
                referenceSteps.replaceChildren(table(answer, t('Reference steps', 'संदर्भ चरण'), expected, mismatch));
            } else referenceSteps.replaceChildren();
        }

        root.classList.add('quick-select-tool');
        root.replaceChildren(tabBar, ...tabPanels);
        setTab(0);
        renderExample();
        renderPractice();
    });
}());
