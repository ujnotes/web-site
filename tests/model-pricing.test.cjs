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

test('sort columns support both directions and keep unknown prices last', () => {
    const a = {id:'a',name:'Alpha',provider:'google',family:'gemini'};
    const b = {id:'b',name:'Beta',provider:'anthropic',family:'claude'};
    const unknown = {id:'unknown',name:'Unknown',provider:'openai',family:'gpt'};
    const estimates = new Map([['a',{total:0,price:{input:0,output:2}}],['b',{total:10,price:{input:4,output:1}}]]);
    const sorted = (key, direction) => [unknown,a,b].sort((x,y)=>pricing.compareModels(x,y,key,direction,estimates)).map(m=>m.id);
    assert.deepEqual(sorted('cost','desc'),['b','a','unknown']);
    assert.deepEqual(sorted('cost','asc'),['a','b','unknown']);
    assert.deepEqual(sorted('output','desc'),['a','b','unknown']);
    assert.deepEqual(sorted('input','desc'),['b','a','unknown']);
    assert.deepEqual(sorted('name','desc'),['unknown','b','a']);
    assert.deepEqual(sorted('provider','asc'),['b','a','unknown']);
    assert.deepEqual(sorted('family','asc'),['b','a','unknown']);
    assert.deepEqual(sorted('family','desc'),['unknown','a','b']);
});

test('model family is required and distinct from selling provider', () => {
    for (const m of data.models) {
        assert.ok(typeof m.family === 'string' && m.family.length > 0, `Model ${m.id} missing family`);
    }
    const copy = structuredClone(data);
    delete copy.models[0].family;
    assert.throws(() => pricing.validate(copy));

    const directSol = model('gpt-6.1-sol');
    const routedSol = model('gpt-6.1-sol@openrouter-azure-eu');
    assert.equal(directSol.family, 'gpt');
    assert.equal(routedSol.family, 'gpt');
    assert.equal(directSol.provider, 'openai');
    assert.equal(routedSol.provider, 'openrouter');
    assert.notEqual(directSol.provider, routedSol.provider);
});

test('Grok keeps its 20 percent batch discount and inclusive context boundary', () => {
    const grok = model('grok-4.7');
    assert.equal(pricing.priceFor(grok,'standard',state.date,199999).input,2);
    assert.equal(pricing.priceFor(grok,'standard',state.date,200000).input,4);
    assert.equal(pricing.priceFor(grok,'batch',state.date,199999).output,4.8);
    assert.equal(pricing.priceFor(grok,'batch',state.date,200000).output,9.6);
    assert.ok(Math.abs(pricing.estimate(grok,{...state,tier:'batch'}).total-25.6)<1e-10);
});

test('exchange rates require the requested pair, date and positive numeric rate', () => {
    const record = {base:'USD',quote:'INR',date:'2026-10-31',rate:95.11};
    assert.equal(pricing.validateExchangeRate(record,'INR'),record);
    for(const change of [{rate:0},{rate:-1},{rate:'95.11'},{quote:'EUR'},{base:'GBP'},{date:'2026-02-30'}]) {
        assert.throws(()=>pricing.validateExchangeRate({...record,...change},'INR'));
    }
});
