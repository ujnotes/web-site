(function () {
    'use strict';

    const maxLength = 12;
    const maxActions = 400;

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

    function start(values) {
        return {values: values.slice(), low: 0, high: values.length - 1, i: 0, j: 0,
            pending: [], fixed: [], placed: false, compared: false, done: false};
    }

    function available(state, action) {
        if (state.done) return false;
        if (state.placed) return action === 'next';
        const scanning = state.j < state.high;
        switch (action) {
        case 'compare': return scanning && !state.compared;
        case 'swap': case 'advance-i': return scanning && state.i <= state.j;
        case 'advance-j': return scanning;
        case 'place': return !scanning;
        default: return false;
        }
    }

    function apply(state, action) {
        if (!available(state, action)) return null;
        const {i, j, low, high} = state;
        const pivot = state.values[high];
        const value = state.values[j];
        const atBoundary = state.values[i];
        const next = {...state, values: state.values.slice()};
        let marks = [];
        switch (action) {
        case 'compare':
            next.compared = true;
            marks = [j];
            break;
        case 'swap':
            [next.values[i], next.values[j]] = [value, atBoundary];
            marks = [i, j];
            break;
        case 'advance-i':
            next.i++;
            break;
        case 'advance-j':
            next.j++;
            next.compared = false;
            break;
        case 'place': {
            [next.values[i], next.values[high]] = [pivot, atBoundary];
            const left = [low, i - 1];
            const right = [i + 1, high];
            const remaining = [left, right].filter(([a, b]) => a < b);
            next.pending = [...remaining, ...state.pending];
            next.fixed = [...state.fixed, i];
            next.placed = true;
            marks = [i, high];
            break;
        }
        case 'next':
            if (state.pending.length) {
                const [[first, last], ...pending] = state.pending;
                Object.assign(next, {low: first, high: last, i: first, j: first, pending,
                    placed: false, compared: false});
            } else {
                next.done = true;
            }
            break;
        }
        return {action, state: next, marks, i, j, pivot, value, atBoundary, high};
    }

    function trace(values) {
        const rows = [{action: 'start', state: start(values), marks: []}];
        const current = () => rows[rows.length - 1].state;
        const record = action => rows.push(apply(current(), action));
        while (!current().done) {
            while (current().j < current().high) {
                const {values: array, j, high} = current();
                record('compare');
                if (array[j] < array[high]) {
                    record('swap');
                    record('advance-i');
                }
                record('advance-j');
            }
            record('place');
            record('next');
        }
        return rows;
    }

    if (typeof module !== 'undefined' && module.exports) {
        module.exports = {parseArray, start, apply, trace};
        return;
    }

    window.UjnotesComponents.register('quick-sort', async function (root, {signal}) {
        const hi = /^hi\b/.test(root.lang);
        const t = (en, hindi) => hi ? hindi : en;
        const response = await fetch(root.dataset.source, {signal});
        if (!response.ok) throw new Error('Quick Sort examples unavailable');
        const {examples} = await response.json();
        if (!Array.isArray(examples) || !examples.length ||
            !examples.every(example => typeof example.en === 'string' &&
                typeof example.hi === 'string' && validArray(example.values))) {
            throw new Error('Invalid Quick Sort examples');
        }
        if (signal.aborted) return;

        function el(tag, className, ...children) {
            const node = document.createElement(tag);
            if (className) node.className = className;
            node.append(...children);
            return node;
        }

        function button(label, callback, className = '') {
            const node = el('button', className, label);
            node.type = 'button';
            node.addEventListener('click', callback, {signal});
            return node;
        }

        const chip = (value, role = '') => el('code', `qs-number ${role && 'qs-' + role}`, String(value));
        const index = value => chip(value, 'index');
        const range = ({low, high}) => `${low}…${high}`;
        const join = (...items) => items;

        function describe(row) {
            const {action, state, i, j, pivot, value, atBoundary} = row;
            const activePivot = () => chip(state.values[state.high], 'pivot');
            switch (action) {
            case 'start':
                return [
                    join(t('Choose pivot ', 'पिवट चुनें '), activePivot()),
                    join(t('The last value in the current range is the pivot. i and j start at ', 'वर्तमान हिस्से का अंतिम मान पिवट है। i और j यहाँ शुरू होते हैं: '), index(state.low), '.')
                ];
            case 'compare':
                return [
                    join(chip(value, 'scan'), value < pivot ? ' < ' : value === pivot ? ' = ' : ' > ', chip(pivot, 'pivot')),
                    join(value < pivot ? t('The scanned value belongs in the smaller region.', 'जाँचा गया मान छोटे मानों के हिस्से में जाएगा।') :
                        t('The scanned value stays outside the smaller region.', 'जाँचा गया मान छोटे मानों के हिस्से से बाहर रहेगा।'))
                ];
            case 'swap':
                return [
                    join(t('Swap ', 'बदलें '), chip(atBoundary, 'swap'), ' ↔ ', chip(value, 'swap')),
                    join(i === j ? t('Same index. The array stays as it is.', 'इंडेक्स एक ही है। सूची वैसी ही रहती है।') :
                        t('Move the scanned value into the slot at i.', 'जाँचे गए मान को i की जगह पर रखें।'))
                ];
            case 'advance-i':
                return [join('i → ', index(state.i)), join(t('Move the boundary for smaller values one place forward.', 'छोटे मानों की सीमा एक जगह आगे बढ़ाएँ।'))];
            case 'advance-j':
                return [join('j → ', index(state.j)), join(t('Move to the next value. When j reaches the pivot, the scan is finished.', 'अगले मान पर जाएँ। j पिवट तक पहुँचे तो जाँच पूरी है।'))];
            case 'place':
                return [
                    join(t('Place pivot ', 'पिवट रखें '), chip(pivot, 'pivot'), ' → ', index(i)),
                    join(t('The scan is finished. Swap the pivot with the value at i ', 'जाँच पूरी है। पिवट और i के मान की अदला-बदली करें '), '(', chip(atBoundary, 'swap'), ').')
                ];
            default:
                return state.done ? [join(t('Finish', 'समाप्त')), join(t('No ranges with two or more values remain.', 'दो या अधिक मान वाला कोई हिस्सा बाकी नहीं है।'))] :
                    [join(t('Choose pivot ', 'पिवट चुनें '), activePivot()),
                        join(t('Continue with the next range ', 'अगले हिस्से पर जाएँ '), index(range(state)), '.')];
            }
        }

        function tiles(row, full) {
            const {state, marks, action} = row;
            return el('div', full ? 'qs-array qs-board' : 'qs-array',
                ...state.values.map((value, position) => {
                    const pivot = !state.done && position === (state.placed ? state.i : state.high);
                    const involved = marks.includes(position);
                    const indicators = [];
                    if (pivot) indicators.push(t('pivot', 'पिवट'));
                    if (!state.placed && !state.done && position === state.i) indicators.push('i');
                    if (!state.placed && !state.done && position === state.j) indicators.push('j');
                    const number = chip(value, pivot ? 'pivot' : involved && action !== 'compare' ? 'swap' :
                        involved || (!state.placed && !state.done && position === state.j) ? 'scan' : '');
                    const fixed = state.fixed.includes(position);
                    if (fixed) number.classList.add('qs-fixed');
                    if (full) return el('span', 'qs-slot', el('span', 'qs-position', String(position)), number,
                        el('span', 'qs-marker', indicators.join(' · ') || '\u00a0'));
                    if (indicators.length) number.setAttribute('aria-label', `${value} (${indicators.join(', ')})`);
                    return number;
                }));
        }

        function table(rows, caption, selected = -1, mismatch = -1) {
            const headings = [t('Step', 'चरण'), t('Array', 'सूची'), 'i / j', t('Action', 'क्रिया'), t('Reason', 'कारण')];
            const body = rows.map((row, n) => {
                const [action, reason] = describe(row);
                const {state} = row;
                const stepNumber = el('th', '', String(n + 1));
                stepNumber.scope = 'row';
                return el('tr', n === mismatch ? 'qs-mismatch' : n === selected ? 'qs-selected' : '',
                    stepNumber, el('td', '', tiles(row, false)),
                    el('td', 'qs-indices', state.done ? '–' : `${state.i} / ${state.j}`),
                    el('td', '', ...action), el('td', '', ...reason));
            });
            const columns = el('tr', '', ...headings.map(label => {
                const node = el('th', '', label);
                node.scope = 'col';
                return node;
            }));
            const scroll = el('div', 'qs-table-wrap',
                el('table', '', el('caption', '', caption), el('thead', '', columns), el('tbody', '', ...body)));
            scroll.tabIndex = 0;
            scroll.setAttribute('aria-label', caption);
            return scroll;
        }

        function showCurrentRow(view) {
            const row = view.querySelector('.qs-mismatch, .qs-selected');
            if (row) {
                const top = row.getBoundingClientRect().top - view.getBoundingClientRect().top;
                view.scrollTop += Math.max(0, top - view.clientHeight / 2);
            }
        }

        let selected = 0;
        let worked = trace(examples[0].values);
        let step = 0;
        let attempt = [worked[0]];
        let answer = [];
        let revealed = false;

        const exampleName = el('strong', '');
        const setExample = delta => {
            selected = (selected + delta + examples.length) % examples.length;
            worked = trace(examples[selected].values);
            step = 0;
            renderExample();
        };
        function arrow(glyph, label, action) {
            const node = button(glyph, action, 'qs-arrow');
            node.setAttribute('aria-label', label);
            node.title = label;
            return node;
        }
        const prevExample = arrow('←', t('Previous example', 'पिछला उदाहरण'), () => setExample(-1));
        const nextExample = arrow('→', t('Next example', 'अगला उदाहरण'), () => setExample(1));
        const exampleBoard = el('div', '');
        const stepName = el('span', 'qs-muted');
        const stepReason = el('div', 'qs-explanation');
        stepReason.setAttribute('aria-live', 'polite');
        const prev = button(t('Previous step', 'पिछला चरण'), () => { step--; renderExample(false); });
        const next = button(t('Next step', 'अगला चरण'), () => { step++; renderExample(false); }, 'qs-primary');
        const allRows = el('details', 'qs-trace', el('summary', '', t('Full dry run', 'सभी चरण')));
        const exampleTable = el('div', '');
        allRows.append(exampleTable);
        const example = el('div', 'qs-panel',
            el('div', 'qs-example-nav', prevExample, exampleName, nextExample),
            exampleBoard, stepReason, el('div', 'qs-controls qs-step-nav', prev, stepName, next), allRows);

        const input = el('input', '');
        input.type = 'text';
        input.maxLength = 100;
        input.spellcheck = false;
        input.autocomplete = 'off';
        input.value = examples[0].values.join(', ');
        const error = el('p', 'qs-error');
        error.setAttribute('role', 'alert');
        error.hidden = true;
        const form = el('form', 'qs-input',
            el('label', '', t('Your array', 'आपकी सूची'), input));
        const submit = el('button', 'qs-primary', t('Start with this array', 'इस सूची से शुरू करें'));
        submit.type = 'submit';
        form.append(submit);
        form.addEventListener('submit', event => {
            event.preventDefault();
            const values = parseArray(input.value);
            error.hidden = Boolean(values);
            if (!values) {
                error.textContent = t('Enter 2 to 12 integers from −999 to 999, separated by commas or spaces.',
                    '−999 से 999 तक के 2 से 12 पूर्णांक लिखें। उन्हें अल्पविराम या खाली जगह से अलग करें।');
                input.setAttribute('aria-invalid', 'true');
                return;
            }
            input.removeAttribute('aria-invalid');
            resetAttempt(values);
        }, {signal});
        const practiceBoard = el('div', '');
        const practiceStatus = el('p', 'qs-explanation');
        practiceStatus.setAttribute('aria-live', 'polite');
        const controls = el('div', 'qs-controls');
        const labels = {
            compare: t('Compare j with pivot', 'j की पिवट से तुलना करें'),
            swap: t('Swap i ↔ j', 'i ↔ j बदलें'),
            'advance-i': t('Move i +1', 'i एक आगे'),
            'advance-j': t('Move j +1', 'j एक आगे'),
            place: t('Swap i ↔ pivot', 'i ↔ पिवट बदलें'),
            next: t('Next range', 'अगला हिस्सा')
        };
        const moveButtons = Object.entries(labels).map(([action, label]) => {
            const node = button(label, () => {
                if (attempt.length >= maxActions) return;
                const row = apply(attempt.at(-1).state, action);
                if (!row) return;
                attempt.push(row);
                renderPractice();
            });
            controls.append(node);
            return [action, node];
        });
        const undo = button(t('Undo', 'पूर्ववत करें'), () => {
            if (attempt.length > 1) attempt.pop();
            renderPractice();
        });
        const restart = button(t('Restart', 'फिर से शुरू करें'), () => resetAttempt(attempt[0].state.values));
        const reveal = button(t('Compare with reference', 'सही चरणों से तुलना करें'), () => {
            revealed = !revealed;
            renderPractice();
        }, 'qs-primary');
        const comparison = el('p', 'qs-feedback');
        comparison.setAttribute('aria-live', 'polite');
        const attempts = el('div', 'qs-results');
        const scratch = el('div', 'qs-panel', form, error, practiceBoard, practiceStatus, controls,
            el('div', 'qs-controls qs-practice-nav', undo, restart, reveal), comparison, attempts);

        const tabs = el('div', 'qs-tabs');
        tabs.setAttribute('role', 'tablist');
        tabs.setAttribute('aria-label', t('Dry run views', 'अभ्यास के भाग'));
        const panels = [example, scratch];
        const prefix = 'qs-' + Math.random().toString(36).slice(2);
        const tabsList = [t('Worked examples', 'हल किए गए उदाहरण'), t('Scratch pad', 'अपना अभ्यास')].map((label, i) => {
            const node = button(label, () => setTab(i));
            node.id = `${prefix}-tab-${i}`;
            node.setAttribute('role', 'tab');
            panels[i].id = `${prefix}-panel-${i}`;
            panels[i].setAttribute('role', 'tabpanel');
            panels[i].setAttribute('aria-labelledby', node.id);
            node.setAttribute('aria-controls', panels[i].id);
            node.addEventListener('keydown', event => {
                if (!['ArrowLeft', 'ArrowRight', 'Home', 'End'].includes(event.key)) return;
                event.preventDefault();
                setTab(event.key === 'Home' ? 0 : event.key === 'End' ? 1 : 1 - i);
                tabsList.find(tab => tab.tabIndex === 0).focus();
            }, {signal});
            tabs.append(node);
            return node;
        });
        example.append(button(t('Try this array yourself', 'इस सूची का खुद अभ्यास करें'), () => {
            input.value = examples[selected].values.join(', ');
            resetAttempt(examples[selected].values);
            setTab(1);
            tabsList[1].focus();
        }, 'qs-try'));

        function setTab(active) {
            panels.forEach((panel, i) => {
                panel.hidden = i !== active;
                tabsList[i].tabIndex = i === active ? 0 : -1;
                tabsList[i].setAttribute('aria-selected', String(i === active));
            });
        }

        function renderExample(refreshTable = true) {
            exampleName.textContent = `${selected + 1} / ${examples.length} · ${examples[selected][hi ? 'hi' : 'en']}`;
            const row = worked[step];
            const [action, reason] = describe(row);
            exampleBoard.replaceChildren(tiles(row, true));
            stepReason.replaceChildren(el('strong', '', ...action), el('p', '', ...reason));
            stepName.textContent = t(`Step ${step + 1} of ${worked.length}`, `चरण ${step + 1} / ${worked.length}`);
            prev.disabled = step === 0;
            next.disabled = step === worked.length - 1;
            if (refreshTable || allRows.open) {
                const view = table(worked, t('Reference dry run', 'सही चरण'), step);
                exampleTable.replaceChildren(view);
                if (allRows.open) showCurrentRow(view);
            }
        }
        allRows.addEventListener('toggle', () => { if (allRows.open) renderExample(); }, {signal});

        function resetAttempt(values) {
            answer = trace(values);
            attempt = [answer[0]];
            revealed = false;
            error.hidden = true;
            input.removeAttribute('aria-invalid');
            renderPractice();
        }

        function renderPractice() {
            const row = attempt.at(-1);
            const {state} = row;
            practiceBoard.replaceChildren(tiles(row, true));
            practiceStatus.replaceChildren(
                state.done ? t('Run complete. Compare your steps with the reference.', 'अभ्यास पूरा हुआ। अपने चरणों की तुलना करें।') :
                    state.placed ? t('Pivot placed. Continue to the next range or finish if there are none left.',
                        'पिवट रख दिया गया है। अगले हिस्से पर जाएँ, या कोई हिस्सा बाकी न हो तो समाप्त करें।') :
                        t('Active indices ', 'वर्तमान इंडेक्स '),
                ...(state.done || state.placed ? [] : [index(range(state)), ' · i = ', index(state.i), ' · j = ', index(state.j)])
            );
            if (attempt.length >= maxActions) practiceStatus.append(' ', t('Undo a step or restart to continue.', 'आगे बढ़ने के लिए कोई चरण पूर्ववत करें या फिर से शुरू करें।'));
            if (row.action === 'compare') {
                const [action] = describe(row);
                practiceStatus.append(' · ', ...action);
            }
            moveButtons.forEach(([action, node]) => {
                node.disabled = attempt.length >= maxActions || !available(state, action);
                if (action === 'next') node.textContent = state.pending.length ? labels.next : t('Finish', 'समाप्त करें');
            });
            undo.disabled = attempt.length === 1;
            reveal.textContent = revealed ? t('Hide reference', 'सही चरण छिपाएँ') : t('Compare with reference', 'सही चरणों से तुलना करें');
            reveal.setAttribute('aria-expanded', String(revealed));
            let mismatch = -1;
            comparison.hidden = !revealed;
            if (revealed) {
                mismatch = attempt.findIndex((row, n) => row.action !== answer[n]?.action);
                comparison.textContent = mismatch >= 0
                    ? t(`The first different action is at step ${mismatch + 1}. Compare the two rows below.`,
                        `पहली अलग क्रिया चरण ${mismatch + 1} पर है। नीचे दोनों पंक्तियों की तुलना करें।`)
                    : attempt.length === answer.length
                        ? t('Every step matches the reference.', 'हर चरण सही क्रम से मेल खाता है।')
                        : t(`Your first ${attempt.length} steps match. The reference shows what comes next.`,
                            `आपके पहले ${attempt.length} चरण मेल खाते हैं। आगे के चरण नीचे देखें।`);
            }
            const ownView = table(attempt, t('Your dry run', 'आपके चरण'), mismatch < 0 ? attempt.length - 1 : -1, mismatch);
            attempts.replaceChildren(ownView);
            showCurrentRow(ownView);
            if (revealed) {
                const expectedStep = mismatch < 0 ? Math.min(attempt.length, answer.length - 1) : -1;
                const referenceView = table(answer, t('Reference dry run', 'सही चरण'), expectedStep, mismatch);
                attempts.append(referenceView);
                showCurrentRow(referenceView);
            }
        }

        root.classList.add('quick-sort-tool');
        root.replaceChildren(tabs, example, scratch);
        setTab(0);
        renderExample();
        resetAttempt(examples[0].values);
    });
}());
