const { test } = require('node:test');
const assert = require('node:assert/strict');
const fs = require('node:fs');
const vm = require('node:vm');

const source = fs.readFileSync('public/js/meta-pixel.js', 'utf8');
function browser(storageBlocked = false) {
    const storage = new Map();
    const scripts = [];
    const window = {
        tabstickMetaPixelId: '1631769315356742',
        localStorage: {
            getItem(key) { if (storageBlocked) throw Error('blocked'); return storage.get(key); },
            setItem(key, value) { if (storageBlocked) throw Error('blocked'); storage.set(key, value); }
        }
    };
    const document = {
        createElement: () => ({}),
        getElementsByTagName: () => [{ parentNode: { insertBefore: script => scripts.push(script) } }]
    };
    const context = vm.createContext({ window, document });
    vm.runInContext(source, context);
    return { window, scripts, context, calls: () => window.fbq.queue.map(args => Array.from(args)) };
}

test('official loader initializes specified pixel and PageView once', () => {
    const b = browser();
    vm.runInContext(source, b.context);
    assert.equal(b.scripts.length, 1);
    assert.equal(b.scripts[0].src, 'https://connect.facebook.net/en_US/fbevents.js');
    assert.equal(b.calls()[0][0], 'init');
    assert.equal(b.calls()[0][1], '1631769315356742');
    assert.equal(b.calls().filter(call => call[1] === 'PageView').length, 1);
});

test('commerce parameters survive and repeated Purchase event ID is suppressed', () => {
    const b = browser();
    const data = { value: 299, currency: 'INR', contents: [{ id: '3', quantity: 2, item_price: 125 }] };
    for (const event of ['ViewContent', 'AddToCart', 'InitiateCheckout']) b.window.tabstickMeta.track(event, data);
    b.window.tabstickMeta.track('Purchase', data, 'purchase-TS-TEST');
    b.window.tabstickMeta.track('Purchase', data, 'purchase-TS-TEST');
    const purchases = b.calls().filter(call => call[1] === 'Purchase');
    assert.equal(purchases.length, 1);
    assert.equal(purchases[0][2], data);
    assert.equal(purchases[0][3].eventID, 'purchase-TS-TEST');
    assert.equal(b.calls().length, 6);
});

test('storage and analytics failures never escape into shopping callbacks', () => {
    const b = browser(true);
    assert.doesNotThrow(() => b.window.tabstickMeta.track('Purchase', { value: 299 }, 'purchase-TS-TEST'));
    assert.equal(b.calls().at(-1)[1], 'Purchase');
    b.window.fbq = () => { throw Error('analytics unavailable'); };
    assert.doesNotThrow(() => b.window.tabstickMeta.track('AddToCart', {}));
});
