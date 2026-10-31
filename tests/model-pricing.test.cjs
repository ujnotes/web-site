const test = require('node:test');
const assert = require('node:assert/strict');
const pricing = require('../root/Resource/components/model-pricing.js');
const data = require('../root/Resource/data/model-pricing.json');
const state = {requests: 10000, input: 1000, output: 200, tier: 'standard', date: '2026-10-31'};
const model = id => data.models.find(m => m.id === id);

test('catalogue validates and example preserves explicit batch rates', () => {
    pricing.validate(data);
    assert.equal(pricing.estimate(model('gemini-3.5-flash-lite'), state).total, 8);
    assert.equal(pricing.estimate(model('gemini-3.5-flash-lite'), {...state, tier:'batch'}).total, 4);
    const custom = {...model('gemini-3.5-flash-lite'), batch: {...model('gemini-3.5-flash-lite').batch, input: 0, output: 1}};
    assert.equal(pricing.estimate(custom, {...state, tier:'batch'}).total, 2);
});
test('scheduled rates switch exactly on effective dates', () => {
    const flash = model('gemini-3.8-flash');
    assert.equal(pricing.estimate(flash, {...state,date:'2026-12-31'}).total, 15);
    assert.equal(pricing.estimate(flash, {...state,date:'2027-01-01'}).total, 30);
    assert.equal(pricing.estimate(flash, {...state,date:'2027-01-01',tier:'batch'}).total, 15);
    assert.equal(pricing.estimate(model('gemini-4-argon'), {...state,date:'2026-12-01'}).total, 80);
});
test('long-context boundary selects whole-request tier', () => {
    const haiku = model('claude-haiku-5-5');
    assert.equal(pricing.priceFor(haiku,'standard',state.date,100000).input, .1);
    assert.equal(pricing.priceFor(haiku,'standard',state.date,100001).input, .5);
    assert.equal(pricing.priceFor(haiku,'batch',state.date,100001).output, 1.25);
});
test('unknown, retired, expired and unreleased models cannot appear free', () => {
    const base = model('gemini-3.5-flash-lite');
    for(const changes of [{status:'retired'},{status:'to_be_released'},{standard:null},{standard:{...base.standard,input:null}},{standard:{...base.standard,effective_until:'2026-10-30'}}]) {
        assert.equal(pricing.estimate({...base,...changes},state),null);
    }
    assert.equal(pricing.estimate({...base,standard:{...base.standard,input:0,output:0}},state).total,0);
});
test('invalid rates and provenance are rejected', () => {
    for(const change of [{input:-1},{input:'0.3'},{checked_on:'2026-02-30'},{source_url:'javascript:alert(1)'}]) {
        const copy = structuredClone(data); Object.assign(copy.models[0].standard,change);
        assert.throws(() => pricing.validate(copy));
    }
});
