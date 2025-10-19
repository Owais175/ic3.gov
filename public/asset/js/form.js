const maxSubjects = 10, maxTransactions = 10;
const maxStep = Symbol('maxStep'), setStep = Symbol('setStep'), currentStep = Symbol('currentStep');
const targetStep = Symbol('targetStep'), validateStep = Symbol('validateStep'), setStepInvalid = Symbol('setStepInvalid');
const template = Symbol('template'), subsectorMap = Symbol('subsectorMap'), subsectors = Symbol('subsectors'), actions = Symbol('actions');

// Modal setup
document.querySelectorAll('.modal-bootstrap-hidden').forEach(x => x.classList.remove('display-none'));

const showPrompt = (text, ...callbacks) => {
    document.querySelectorAll('#promptModalDescription').forEach(x => x.textContent = text);
    const a = document.querySelector('#promptModal .prompt-button--confirm');
    callbacks.filter(x => 'function' === typeof (x)).forEach(x => a?.[actions].push(x));
    document.getElementById('prompt')?.dispatchEvent(new Event('click', { bubbles: true }));
};

const remapItem = (item, placeholder, sub) => {
    const placeNum = placeholder - 1;
    const subNum = sub - 1;
    const oldId = `_${placeNum}_`, newId = `_${subNum}_`;
    item.dataset.index = item.dataset.index.replace(placeholder, sub);
    item.querySelectorAll('.usa-accordion__button').forEach(x => {
        x.setAttribute('aria-controls', x.getAttribute('aria-controls').replace(placeNum, subNum));
        const text = x.querySelector('div');
        text.textContent = text.textContent.replace(`#${placeholder}`, `#${sub}`);
    });
    item.querySelectorAll('button[value]').forEach(x => x.value = subNum);
    item.querySelectorAll('.usa-accordion__content').forEach(x => x.id = x.id.replace(placeNum, subNum));
    item.querySelectorAll('label').forEach(x => x.htmlFor = x.htmlFor.replace(oldId, newId));
    item.querySelectorAll('input,select').forEach(x => {
        x.setAttribute('aria-errormessage', x.getAttribute('aria-errormessage').replace(oldId, newId));
        x.id = x.id.replace(oldId, newId);
        x.name = x.name.replace(`[${placeNum}]`, `[${subNum}]`);
        Object.keys(x.dataset).filter(y => y.startsWith('val')).forEach(y => x.dataset[y] = x.dataset[y].replace(`#${placeholder}`, `#${sub}`));
    });
    item.querySelectorAll('.val-error').forEach(x => x.id = x.id.replace(oldId, newId));
    item.querySelectorAll('fieldset[id]').forEach(x => x.id = x.id.replace(oldId, newId));
    item.querySelectorAll('fieldset[data-target]').forEach(x => x.dataset.target = x.dataset.target.replace(oldId, newId));
    return item;
};

const removeItem = (className, actionName, maxItems, e) => {
    e.preventDefault();
    const rm = e.target.closest('[data-index]');
    const rmIdx = Number.parseInt(rm.dataset.index);
    showPrompt(`Do you want to remove ${actionName} #${rmIdx}?`, ((classSel, action, max, target, index) => {
        target.remove();
        let items = [...document.querySelectorAll(`${classSel} [data-index]`)];
        if (0 === items.length) {
            document.querySelector(`[formaction^="Add${action}"]`).dispatchEvent(new Event('click'));
        } else {
            items = items.filter(y => index < Number.parseInt(y.dataset.index));
            items.forEach(x => {
                const oldNum = Number.parseInt(x.dataset.index);
                remapItem(x, oldNum, oldNum - 1);
            });
        }
        const add = document.querySelector(`[formaction^="Add${action}"]`);
        if (add) {
            add.disabled = max <= items.length;
        }
    }).bind(null, className, actionName, maxItems, rm, rmIdx));
};

const generateHelpLink = (modalId, label) => {
    if (!(modalId && label)) {
        return;
    }
    const svgNS = 'http://www.w3.org/2000/svg';
    const use = document.createElementNS(svgNS, 'use');
    use.setAttribute('href', 'img/sprite.svg#help');
    const svg = document.createElementNS(svgNS, 'svg');
    svg.classList.add('usa-icon');
    svg.setAttribute('aria-hidden', 'true');
    svg.setAttribute('focusable', 'false');
    svg.setAttribute('role', 'img');
    svg.appendChild(use);
    const a = Object.assign(document.createElement('a'), { className: 'ic3-open-modal', href: '#' });
    a.setAttribute('aria-controls', modalId);
    a.setAttribute('aria-label', label);
    a.setAttribute('role', 'button');
    a.append(svg);
    return a;
};

document.querySelectorAll('.transaction-type').forEach(x => {
    const t = x.closest('[data-index]');
    [{ sel: `label[for="${x.id}"]`, target: 'beforeend', param: ['tTypeDef', 'Get definitions of transaction types'] },
    { sel: '.route-num', target: 'afterend', param: ['tRoutingNumDef', 'Get the definition of routing number'] },
    { sel: '.swift-num', target: 'afterend', param: ['tSwiftDef', 'Get the definition of SWIFT Code'] },
    { sel: '.transaction-account-num', target: 'afterend', param: ['p2pAccountIdDef', 'Get help with the definition of P2P account identifier'] },
    { sel: '.cc-type', target: 'afterend', param: ['cryptoCurrencyTypeDef', 'Get help with the definition of type of cryptocurrency'] },
    { sel: '.txn-hash', target: 'afterend', param: ['txnHashDef', 'Get help with the definition of type of transaction ID or hash'] },
    { sel: '.cc-atm', target: 'afterend', param: ['cryptoCurrencyAtmDef', 'Get help with the definition of cryptocurrency ATM/kiosk name'] },
    { sel: '.cc-atm-add', target: 'afterend', param: ['cryptoCurrencyAtmAddressDef', 'Get help with the definition of cryptocurrency ATM/kiosk address'] },
    { sel: '.cc-orig-wallet', target: 'afterend', param: ['cryptoCurrencyOrigAddressDef', 'Get help with the definition of cryptocurrency originating wallet address'] },
    { sel: '.cc-recip-wallet', target: 'afterend', param: ['cryptoCurrencyRecipAddressDef', 'Get help with the definition of cryptocurrency recipient wallet address'] },
    { sel: '.gift-card-type', target: 'afterend', param: ['giftCardTypeDef', 'Get help with the definition of Prepaid/Gift Card Type'] }
    ].forEach(y => t.querySelectorAll(y.sel).forEach(z => { z.insertAdjacentElement(y.target, generateHelpLink(...y.param)); z.classList.add('margin-right-05'); }));
    const d = Object.assign(document.createElement('details'), { className: 'transaction--disabled-fields margin-top-1' });
    d.appendChild(Object.assign(document.createElement('summary'), { textContent: 'Non-applicable fields (click to view)' }));
    let hr = Object.assign(document.createElement('hr'), { className: 'opacity-0 transaction--disabled-fields__separator' });
    hr.dataset.ordinal = '1';
    d.appendChild(hr);
    hr = hr.cloneNode();
    hr.dataset.ordinal = '1000';
    d.appendChild(hr);
    d.dataset.ordinal = '99999';
    t.querySelector('fieldset:last-of-type')?.insertAdjacentElement('afterend', d);
});

const openModal = e => {
    const target = document.getElementById(`${e.target?.getAttribute('aria-controls') || e.target.closest('[aria-controls]')?.getAttribute('aria-controls')}Open`);
    if (target) {
        e.preventDefault();
        e.stopPropagation();
        target.dispatchEvent(new Event('click'));
    }
};

const blurFieldset = e => {
    const newVal = e.target.value || e.target.querySelector(':checked')?.value;
    const target = document.getElementById(e.currentTarget.dataset.target);
    if (target) {
        target.disabled = (e.currentTarget.dataset.targetValue || 'true') !== newVal;
    }
};

const setupItems = (className, actionName, toggleFunction, maxItems) => {
    const nodes = [...document.querySelectorAll(className)];
    nodes.forEach(x => {
        x.querySelectorAll('input,select').forEach(y => Object.keys(y.dataset).filter(z => z.startsWith('val')).forEach(z => y.dataset[z] = y.dataset[z].replace('#TNUM', `#${y.closest('[data-index]').dataset.index}`)));
        x[template] = x.querySelector('[data-index="1"]').cloneNode(true);
        x[template].querySelectorAll('input,select').forEach(y => {
            if (y instanceof HTMLInputElement) {
                if ('radio' === y.type) {
                    y.checked = false;
                } else {
                    y.value = '';
                }
            } else {
                y.selectedIndex = 0;
            }
        });
        x[template].querySelectorAll('.val-error').forEach(y => y.textContent = '');
        x.querySelector(`[formaction^="Add${actionName}"]`)?.addEventListener('click', e => {
            e.preventDefault();
            e.stopPropagation();
            const items = [...document.querySelectorAll(`${className} [data-index]`)];
            let itemLength = items.length;
            if (maxItems > itemLength) {
                const newIndex = items.reduce((y, z) => Math.max(y, Number.parseInt(z.dataset.index)), 0) + 1;
                items.filter(y => y.querySelector('.usa-accordion__content:not([hidden])')).forEach(y => y?.querySelector('.usa-accordion__button')?.dispatchEvent(new Event('click', { bubbles: true })));
                const newItem = remapItem(document.querySelector(className)[template].cloneNode(true), 1, newIndex);
                newItem.querySelector(`[formaction^="Remove${actionName}"]`)?.addEventListener('click', removeItem.bind(null, className, actionName, maxItems));
                const btn = newItem.querySelector('.usa-accordion__button');
                btn?.addEventListener('click', e => toggleFunction(e.target), { passive: true });
                newItem.querySelectorAll('fieldset[data-target]').forEach(y => {
                    y.addEventListener('change', blurFieldset, { passive: true });
                    y.dispatchEvent(new Event('change'));
                });
                newItem.querySelectorAll('.ic3-open-modal').forEach(y => {
                    y.addEventListener('click', openModal);
                    y.addEventListener('keydown', e => { if ('Enter' === e.key) { openModal(e); } });
                });
                e.target.parentElement.insertAdjacentElement('beforebegin', newItem);
                btn?.dispatchEvent(new Event('click', { bubbles: true }));
                newItem.scrollIntoView(true);
                itemLength += 1;
            }
            e.target.disabled = maxItems <= itemLength;
        });
        x.querySelectorAll(`[formaction^="Remove${actionName}"]`).forEach(x => x.addEventListener('click', removeItem.bind(null, className, actionName, maxItems)));
        x.querySelectorAll('.ic3-open-modal').forEach(y => {
            y.addEventListener('click', openModal);
            y.addEventListener('keydown', e => { if ('Enter' === e.key) { openModal(e); } });
        });
        const accordions = [...x.querySelectorAll('[data-index] .usa-accordion__button')];
        accordions.forEach(y => {
            y.addEventListener('click', e => toggleFunction(e.target), { passive: true });
            if ('true' === y.getAttribute('aria-expanded')) {
                y.dispatchEvent(new Event('click', { bubbles: true }));
            }
        });
        accordions.pop()?.dispatchEvent(new Event('click', { bubbles: true }));
    });
    return nodes;
};

const toggleTransactionHeader = transaction => {
    const target = transaction.closest('[data-index]');
    if (target.querySelector('.usa-accordion__content[hidden]')) {
        target.querySelectorAll('time,data').forEach(x => x.remove());
    } else {
        const date = target.querySelector('.transaction-date:enabled')?.valueAsDate;
        if (date) {
            transaction.appendChild(Object.assign(document.createElement('time'), { dateTime: date.toISOString(), textContent: date.toLocaleDateString('en-US', { timeZone: 'UTC' }) }));
        } else {
            target.querySelectorAll('time').forEach(x => x.remove());
        }
        const amount = target.querySelector('.amount:enabled')?.valueAsNumber;
        if (amount) {
            transaction.appendChild(Object.assign(document.createElement('data'), { value: amount, textContent: new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD', maximumFractionDigits: 2, minimumFractionDigits: 2 }).format(amount) }));
        } else {
            target.querySelectorAll('data').forEach(x => x.remove());
        }
    }
    return transaction;
};

const transactionTypeSetup = e => {
    const type = Number.parseInt(e.target.value);
    const transaction = e.target.closest('[id^="transaction"]');
    transaction?.querySelectorAll('fieldset.fieldset-contingent').forEach(x => {
        let disabled = isNaN(type) || !(x.classList.contains('tall') || x.classList.contains(`t${type}`));
        if (!disabled && x.id.endsWith('StateFields')) {
            const country = document.querySelector(`[data-target="${x.id}"]`);
            if (country) {
                if (country.disabled) {
                    disabled = true;
                } else if (country.dataset.targetValue) {
                    disabled = country.dataset.targetValue !== country.querySelector('select, input')?.value;
                }
            }
        }
        x.disabled = disabled;
    });
    const specialTags = Object.freeze(['BUTTON', 'HR', 'FIELDSET', 'DETAILS']);
    const dis = transaction.querySelector('.transaction--disabled-fields');
    [...transaction.querySelectorAll(':scope [data-ordinal]')]
        .map(y => { const yOrd = parseFloat(y.dataset.ordinal); return { tag: y, sort: isNaN(yOrd) ? 0 : yOrd }; })
        .sort((a, b) => { const c = a.sort - b.sort; return 0 === c ? (a.tag.textContent < b.tag.textContent ? -1 : 1) : c; })
        .forEach(y => {
            const isState = y.tag.classList.contains('state');
            const target = isState ? y.tag.closest('[id^="transaction"]').querySelector(`[data-target=${y.tag.id}]`) : (specialTags.includes(y.tag.tagName) ? y.tag : y.tag.closest('fieldset'));
            ((target.classList.contains('transaction--disabled-fields__separator') || (target.disabled ?? false)) ? dis : transaction).appendChild(isState ? y.tag : target);
        });
    transaction?.querySelectorAll('.content-contingent').forEach(x => x.classList.toggle('display-none', !x.classList.contains(`t${type}`)));
};

const toggleSubjectHeader = subject => {
    const target = subject.closest('[data-index]');
    if (target.querySelector('.usa-accordion__content[hidden]')) {
        target.querySelectorAll('data').forEach(x => x.remove());
    } else {
        const sid = target.querySelector('[name$=".Name"]')?.value || target.querySelector('[name$=".BusinessName"]')?.value || target.querySelector('[name$=".Website"]')?.value || target.querySelector('[name$=".Email"]')?.value || target.querySelector('[name$=".Phone"]')?.value || target.querySelector('[name$=".IPAddress"]')?.value;
        if (sid) {
            subject.appendChild(Object.assign(document.createElement('data'), { value: sid, textContent: sid }));
        }
    }
    return subject;
};

// Prompt Modal Setup
document.querySelectorAll('#promptModal').forEach(x => {
    x.querySelectorAll('.prompt-button--confirm').forEach(y => {
        y.addEventListener('click', e => {
            if (e.target[actions]) {
                e.target[actions].forEach(z => z());
                e.target[actions] = [];
            }
        }, { passive: true });
        y[actions] = [];
    });
    x.querySelectorAll('.prompt-button--cancel').forEach(y => y.addEventListener('click', e => {
        const confirmBtn = e.target.closest('ul').querySelector('.prompt-button--confirm');
        if (confirmBtn && confirmBtn[actions]) {
            confirmBtn[actions] = [];
        }
    }, { passive: true }));
});

// Step Indicator Setup
document.querySelectorAll('#complaintStep').forEach(x => {
    const steps = [...x.querySelectorAll('.usa-step-indicator__segment[data-step-num]')];
    steps.forEach(y => y.setAttribute('tabindex', '0'));
    x.classList.add('event-enabled');
    x[maxStep] = steps.map(x => Number.parseInt(x.dataset.stepNum)).reduce((x, y) => Math.max(x, y), 1);

    // FIX: setStepInvalid function properly define karein
    x[setStepInvalid] = function (isInvalid, stepNum) {
        const step = this.querySelector(`.usa-step-indicator__segment[data-step-num="${stepNum || this[currentStep]}"]`);
        step?.classList.toggle('usa-step-indicator__segment--error', isInvalid);
        if (step) {
            const sr = step.querySelector('.usa-sr-only:not(.text)');
            if (isInvalid) {
                if (sr) {
                    sr.textContent = ' error';
                } else {
                    step.querySelector('.usa-sr-only.text')?.appendChild(Object.assign(document.createElement('span'), { textContent: ' error', className: 'usa-sr-only' }));
                }
            } else {
                if (sr) {
                    if (step.classList.contains('usa-step-indicator__segment--complete')) {
                        sr.textContent = ' completed';
                    } else {
                        sr.remove();
                    }
                }
            }
        }
    };

    x[setStep] = num => {
        if (1 > num || num > x[maxStep]) {
            return;
        }

        steps.forEach(step => {
            const cmp = Number.parseInt(step.dataset.stepNum) - num;
            if (0 > cmp) {
                step.classList.remove('usa-step-indicator__segment--current');
                step.classList.add('usa-step-indicator__segment--complete');
                const text = step.querySelector('.usa-sr-only.text');
                if (text && !(step.classList.contains('usa-step-indicator__segment--error') || text?.querySelector('.usa-sr-only'))) {
                    text.appendChild(Object.assign(document.createElement('span'), { textContent: ' completed', className: 'usa-sr-only' }));
                }
                step.ariaCurrent = 'false';
            } else {
                if (!step.classList.contains('usa-step-indicator__segment--error')) {
                    step.querySelector('.usa-sr-only:not(.text)')?.remove();
                }
                if (0 === cmp) {
                    step.classList.remove('usa-step-indicator__segment--complete');
                    step.classList.add('usa-step-indicator__segment--current');
                    step.ariaCurrent = 'step';
                } else {
                    step.classList.remove('usa-step-indicator__segment--complete', 'usa-step-indicator__segment--current');
                    step.ariaCurrent = 'false';
                }
            }
        });
        document.dispatchEvent(new CustomEvent('stepchange', { detail: { step: num, prev: x[currentStep] }, cancelable: true }));
        x[currentStep] = num;
    };

    const handler = e => {
        const step = Number.parseInt(e.target.dataset.stepNum);
        if (!isNaN(step)) {
            e.preventDefault();
            e.stopPropagation();
            e.currentTarget[setStep](step);
            document.getElementById('complaintStep').scrollIntoView(true, { behavior: 'instant' });
        }
    };
    x.addEventListener('click', handler);
    x.addEventListener('keydown', e => { if ('Enter' === e.key) { handler(e); } });
    x.querySelectorAll('.usa-step-indicator__segment-label').forEach(y => {
        y.insertAdjacentElement('afterend', Object.assign(y.cloneNode(true), { tabindex: -1, className: 'usa-sr-only text' }));
        y.setAttribute('inert', 'inert');
        y.querySelector('.usa-sr-only')?.remove();
    });
});

// Event Listeners
document.addEventListener('stepchange', e => {
    if (4 !== e.detail.prev) {
        return;
    }
    let collision = false;
    document.querySelectorAll('.subjects [data-field-type]').forEach(x => {
        const val = document.querySelector(`#step2 [data-field-type="${x.dataset.fieldType}"]`)?.value;
        if (val && val.toLowerCase() === x.value.toLowerCase()) {
            collision = true;
        }
    });
    const match = document.getElementById('subjectMatch');
    if (!collision) {
        match?.remove();
    } else if (!match) {
        e.preventDefault();
        const subjectMatch = Object.assign(document.createElement('div'), { id: 'subjectMatch', className: 'usa-alert usa-alert--warning usa-alert--slim margin-bottom-3' });
        const body = Object.assign(document.createElement('div'), { className: 'usa-alert__body' });
        subjectMatch.appendChild(body);
        body.appendChild(Object.assign(document.createElement('p'), { className: 'margin-0 usa-alert__text', textContent: 'One or more subjects you specified has an email address or phone number that matches the complainant. While this may be the case, this is often a sign that there is an error with your submission. Please verify that the subjects are the people or businesses alleged to cause the incident described in the complaint. This message will not stop you again from proceeding with your submission.' }));
        document.querySelector('#step4 .step-buttons').insertAdjacentElement('beforebegin', subjectMatch);
        subjectMatch.scrollIntoView(true, { behavior: 'instant' });
    }
});

document.addEventListener('stepchange', e => {
    if (e.defaultPrevented) {
        return;
    }
    document.querySelectorAll('.form-step[data-step-num]').forEach(x => {
        const hidden = Number.parseInt(x.dataset.stepNum) !== e.detail.step;
        x.classList.toggle('display-none', hidden);
        x.ariaHidden = hidden;
    });
    document.getElementById('complaintStep')?.scrollIntoView(true, { behavior: 'instant' });
}, { passive: true });

// Form Steps Setup
document.querySelectorAll('.form-step[data-step-num]').forEach(x => {
    const stepNum = Number.parseInt(x.dataset.stepNum);
    const container = Object.assign(document.createElement('div'), { className: 'step-buttons' });
    if (1 !== stepNum) {
        container.appendChild(Object.assign(document.createElement('button'), { type: 'button', className: 'usa-button prev', [targetStep]: stepNum - 1, textContent: `Previous (step ${stepNum - 1})` }));
    }
    container.appendChild(Object.assign(document.createElement('div'), { textContent: '\xa0', ariaHidden: true }));
    if (stepNum !== document.getElementById('complaintStep')[maxStep]) {
        const next = Object.assign(document.createElement('button'), { type: 'button', className: 'usa-button next', [targetStep]: stepNum + 1, textContent: `Next (step ${stepNum + 1})` });
        container.appendChild(next);
    }
    x.appendChild(container);

    // FIX: validateStep function properly define karein
    x[validateStep] = function () {
        const isInvalid = ![...this.querySelectorAll('[aria-errormessage]:enabled')].every(y => y.checkValidity());
        const stepIndicator = document.getElementById('complaintStep');
        if (stepIndicator && stepIndicator[setStepInvalid]) {
            stepIndicator[setStepInvalid](isInvalid, Number.parseInt(this.dataset.stepNum));
        }

        if (isInvalid) {
            this.querySelectorAll('[aria-errormessage]:enabled:invalid').forEach(y => {
                const err = document.getElementById(y.getAttribute('aria-errormessage'));
                if (!y.validity || y.validity.valid || !err) {
                    return;
                }

                if (y.validity.valueMissing) {
                    if (y.dataset.valRequiredIfInput && 'true' !== y.dataset.valRequiredIfAllowempty) {
                        const ifTar = document.querySelector(`[name='${y.dataset.valRequiredIfInput}']`);
                        if (ifTar && !(null === ifTar.value || undefined === ifTar.value) && 'true' === ifTar.value.trim()) {
                            err.textContent = y.dataset.valRequiredIf;
                        }
                    } else if (y.dataset.valRequiredWhenInput && 'true' !== y.dataset.valRequiredWhenAllowempty) {
                        const whenTar = document.querySelector(`[name='${y.dataset.valRequiredWhenInput}']`);
                        if (whenTar && !(null === whenTar.value || undefined === whenTar.value)) {
                            let result = true;
                            switch (y.dataset.valRequiredWhenOp) {
                                case 'ieq':
                                    result = whenTar.value.trim().toLowerCase() === y.dataset.valRequiredWhenTarget.toLowerCase();
                                    break;
                                case 'eq':
                                    result = whenTar.value.trim() === y.dataset.valRequiredWhenTarget;
                                    break;
                                case 'ine':
                                    result = whenTar.value.trim().toLowerCase() !== y.dataset.valRequiredWhenTarget.toLowerCase();
                                    break;
                                case 'ne':
                                    result = whenTar.value.trim() !== y.dataset.valRequiredWhenTarget;
                                    break;
                                case 'gt':
                                    result = whenTar.dataset.valRequiredWhenTarget < y.value;
                                    break;
                                case 'ge':
                                    result = whenTar.dataset.valRequiredWhenTarget <= y.value;
                                    break;
                                case 'lt':
                                    result = whenTar.dataset.valRequiredWhenTarget > y.value;
                                    break;
                                case 'le':
                                    result = whenTar.dataset.valRequiredWhenTarget >= y.value;
                                    break;
                            }
                            if (result) {
                                err.textContent = y.dataset.valRequiredWhen;
                            }
                        }
                    } else {
                        if (y.dataset.valRequired) {
                            err.textContent = y.dataset.valRequired;
                        }
                    }
                } else if (y.dataset.valLength && y.validity.tooLong) {
                    err.textContent = y.dataset.valLength;
                } else if (y.dataset.valEmailaddress && y.validity.typeMismatch) {
                    err.textContent = y.dataset.valEmailaddress;
                } else if (y.dataset.valRegex && y.validity.patternMismatch) {
                    err.textContent = y.dataset.valRegex;
                } else if (y.dataset.valRange && (y.validity.rangeUnderflow || y.validity.rangeOverflow)) {
                    err.textContent = y.dataset.valRange;
                } else if (y.dataset.valIpaddress && y.validity.patternMismatch) {
                    err.textContent = y.dataset.valIpaddress;
                }

                const accErr = y.closest('[data-index]');
                if (accErr && !accErr.classList.contains('usa-accordion__error')) {
                    accErr.classList.add('usa-accordion__error');
                    accErr.querySelector('.usa-accordion__button div')?.insertAdjacentElement('beforeend', Object.assign(document.createElement('span'), { className: 'usa-sr-only', textContent: ' error' }));
                }
            });
        }

        this.querySelectorAll('.usa-accordion__error[data-index]').forEach(y => {
            const hasErr = y.querySelector('[aria-errormessage]:enabled:invalid');
            if (!hasErr) {
                y.classList.remove('usa-accordion__error');
                y.querySelector('.usa-accordion__button div span')?.remove();
            }
        });

        [...this.querySelectorAll('.usa-accordion__error[data-index]')].slice(0, 1).forEach(y => {
            const btn = y.querySelector('.usa-accordion__button');
            if ('true' !== btn.ariaExpanded) {
                btn.dispatchEvent(new Event('click', { bubbles: true }));
            }
        });

        this.querySelectorAll('[aria-errormessage]:valid,[aria-errormessage]:disabled').forEach(y => {
            const err = document.getElementById(y.getAttribute('aria-errormessage'));
            if (err) {
                err.textContent = null;
            }
        });

        return this.querySelector('[aria-errormessage][id]:enabled:invalid')?.id;
    };
});

// Step buttons event listeners
document.querySelectorAll('.step-buttons :is(.prev, .next)').forEach(x => {
    x.addEventListener('click', e => {
        e.preventDefault();
        e.stopPropagation();
        const stepElement = e.currentTarget.closest('.form-step[data-step-num]');
        if (stepElement && stepElement[validateStep]) {
            const err = stepElement[validateStep]();
            if (e.currentTarget.classList.contains('prev') || !err) {
                const stepIndicator = document.getElementById('complaintStep');
                if (stepIndicator && stepIndicator[setStep]) {
                    stepIndicator[setStep](e.currentTarget[targetStep]);
                }
            }
            if (err) {
                document.getElementById(err)?.scrollIntoView(true, { behavior: 'instant' });
            }
        }
    });
});

// Additional setup
document.querySelectorAll('fieldset[data-target]').forEach(x => {
    x.addEventListener('change', blurFieldset, { passive: true });
    x.dispatchEvent(new Event('change'));
});

document.querySelectorAll('#contactInfo legend').forEach(x =>
    x.insertAdjacentElement('afterend', Object.assign(document.createElement('aside'), { className: "text-italic", textContent: 'If you are the one affected by this incident, the information below will be transferred to the Complainant section.' })));

document.addEventListener('stepchange', e => {
    if (!(2 === e.detail.step && document.querySelector('.is-victim [value="true"]:checked'))) {
        return;
    }
    document.querySelectorAll('#contactInfo input').forEach(x => {
        const datacopy = document.querySelector(`#step2 [data-field-type="${x.dataset.fieldType}"]`);
        if (datacopy && !datacopy.value) {
            datacopy.value = x.value;
        }
    });
}, { passive: true });

// Setup transactions and subjects
setupItems('.transactions', 'Transaction', toggleTransactionHeader, maxTransactions).forEach(x => {
    x.querySelectorAll('.transaction-type').forEach(y => {
        y.addEventListener('change', transactionTypeSetup, { passive: true });
        y.dispatchEvent(new Event('change', { bubbles: true }));
    });
    x.querySelector('[formaction^="AddTransaction"]')?.addEventListener('click', e => {
        [...e.target.closest('.transactions')?.querySelectorAll('[id^="transaction"]:last-of-type') ?? []]?.pop()?.querySelectorAll('.transaction-type').forEach(y => {
            y.addEventListener('change', transactionTypeSetup, { passive: true });
            y.dispatchEvent(new Event('change', { bubbles: true }));
        });
    }, { passive: true });
});

setupItems('.subjects', 'Subject', toggleSubjectHeader, maxSubjects);

// Subsector mapping
document.querySelectorAll('#infSub').forEach(x => {
    const target = document.querySelector('#inf select');
    if (!target) {
        return;
    }
    target[subsectorMap] = Object.assign(new Map(), { [subsectors]: x.querySelector('select') });
    const selVal = target[subsectorMap][subsectors].value;
    x.querySelectorAll('optgroup').forEach(y => {
        const opts = [...y.querySelectorAll(':scope > option')].filter(z => '0' !== z.value);
        if (0 < opts.length) {
            target[subsectorMap].set(y.label, opts.map(z => Object.assign(z, { selected: false })));
        }
        if ([...target.selectedOptions].shift()?.text === y.label) {
            const sel = y.closest('select');
            opts.forEach(z => sel.appendChild(z));
        }
        y.remove();
    });
    target[subsectorMap][subsectors].value = selVal;
    target.addEventListener('change', e => {
        const subs = e.target[subsectorMap][subsectors], hasSubs = e.target[subsectorMap].get([...e.target.selectedOptions].shift()?.text);
        subs.closest('.fieldset-contingent').disabled = undefined === hasSubs;
        if (hasSubs && !hasSubs.some(y => y.value === subs.value)) {
            subs.querySelectorAll('option:not([value="0"]').forEach(y => y.remove());
            hasSubs.forEach(y => subs.appendChild(y));
        }
    }, { passive: true });
    target.dispatchEvent(new Event('change'));
});

// Initialize step from URL hash
document.querySelectorAll('#complaintStep').forEach(x => {
    const initialStep = Number.parseInt(document.location.hash.match(/step(\d+)/)?.[1]) || 1;
    if (x[setStep]) {
        x[setStep](initialStep);
    }
});

if (!document.location.hash) {
    document.body.scrollIntoView(true, { behavior: 'instant' });
}

// ================================
// AJAX FORM SUBMISSION CODE
// ================================
const displayValidationErrors = (errors) => {
    console.log('Displaying validation errors:', errors);

    // Clear previous errors
    document.querySelectorAll('.usa-input--error').forEach(el => {
        el.classList.remove('usa-input--error');
    });
    document.querySelectorAll('.val-error').forEach(error => {
        error.textContent = '';
    });

    // Field name mapping for Laravel dot notation to HTML name attributes
    const fieldMapping = {
        'IsVictim': 'IsVictim',
        'Complainant.Name': 'Complainant.Name',
        'Complainant.Phone': 'Complainant.Phone',
        'Complainant.Email': 'Complainant.Email',
        'Victim.Name': 'Victim.Name',
        'Victim.Address1': 'Victim.Address1',
        'Victim.City': 'Victim.City',
        'Victim.Country': 'Victim.Country',
        'Victim.State': 'Victim.State',
        'Victim.ZipCode': 'Victim.ZipCode',
        'Victim.Phone': 'Victim.Phone',
        'Victim.Email': 'Victim.Email',
        'Victim.BusinessName': 'Victim.BusinessName',
        'Victim.BusinessImpacted': 'Victim.BusinessImpacted',
        'MoneySent': 'MoneySent',
        'ReportedLoss': 'ReportedLoss',
        'IncidentDescription': 'IncidentDescription',
        'DigitalSignature': 'DigitalSignature',
        'g-recaptcha-response': 'g-recaptcha-response'
    };

    let firstErrorElement = null;

    // Process each error
    Object.keys(errors).forEach(errorKey => {
        console.log('Processing error key:', errorKey);

        let fieldName = fieldMapping[errorKey];

        // Handle array fields (Transactions, Subjects)
        if (!fieldName && errorKey.includes('Transactions')) {
            const match = errorKey.match(/Transactions\.(\d+)\.(\w+)/);
            if (match) {
                fieldName = `Transactions[${match[1]}].${match[2]}`;
            }
        }

        if (!fieldName && errorKey.includes('Subjects')) {
            const match = errorKey.match(/Subjects\.(\d+)\.(\w+)/);
            if (match) {
                fieldName = `Subjects[${match[1]}].${match[2]}`;
            }
        }

        if (fieldName) {
            console.log('Looking for field:', fieldName);

            // Find the input element
            let inputElement = document.querySelector(`[name="${fieldName}"]`);

            // For radio buttons, find the container
            if (!inputElement && fieldName.includes('IsVictim') || fieldName.includes('MoneySent')) {
                const radioContainer = document.querySelector(`[name="${fieldName}"]`)?.closest('fieldset');
                if (radioContainer) {
                    inputElement = radioContainer;
                }
            }

            if (inputElement) {
                console.log('Found element for:', fieldName);

                // Add error class
                inputElement.classList.add('usa-input--error');

                // Find or create error message element
                let errorElement = document.getElementById(`${fieldName}_error`);
                if (!errorElement) {
                    // Try to find by aria-errormessage
                    const errorId = inputElement.getAttribute('aria-errormessage');
                    if (errorId) {
                        errorElement = document.getElementById(errorId);
                    }
                }

                if (errorElement) {
                    errorElement.textContent = errors[errorKey][0];
                    errorElement.style.display = 'block';
                }

                // Set first error for scrolling
                if (!firstErrorElement) {
                    firstErrorElement = inputElement;
                }
            } else {
                console.log('Element not found for:', fieldName);
            }
        }
    });

    // Scroll to first error
    if (firstErrorElement) {
        firstErrorElement.scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });
        firstErrorElement.focus();
    }
};