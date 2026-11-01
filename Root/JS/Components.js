/* Site-owned browser components. Works on full loads and Cutie AJAX swaps. */
(function () {
    'use strict';
    if (window.UjnotesComponents) return;
    var factories = new Map(), scripts = new Map(), instances = new Map();
    function localAsset(path, extension) {
        return new RegExp('^/resource/components/[a-z0-9-]+\\.' + extension + '$').test(path || '');
    }
    function loadScript(path) {
        if (!scripts.has(path)) {
            scripts.set(path, new Promise(function (resolve, reject) {
                var script = document.createElement('script');
                script.src = path + '?v=20261101-design';
                script.onload = resolve;
                script.onerror = function () { script.remove(); scripts.delete(path); reject(new Error('Component could not load')); };
                document.head.appendChild(script);
            }));
        }
        return scripts.get(path);
    }
    async function mount(root) {
        var controller = new AbortController();
        var instance = {controller: controller, cleanup: null};
        instances.set(root, instance);
        try {
            var name = root.dataset.component;
            var script = root.dataset.componentScript, style = root.dataset.componentStyle;
            if (!localAsset(script, 'js') || !localAsset(style, 'css')) throw new Error('Unknown component assets');
            if (!Array.from(document.querySelectorAll('link[data-component-style]')).some(function (link) { return link.getAttribute('href').split('?')[0] === style; })) {
                var link = document.createElement('link');
                link.rel = 'stylesheet'; link.href = style + '?v=20261101-design'; link.dataset.componentStyle = name;
                document.head.appendChild(link);
            }
            await loadScript(script);
            if (controller.signal.aborted || !root.isConnected) return;
            if (!factories.has(name)) throw new Error('Component did not register');
            var cleanup = await factories.get(name)(root, {signal: controller.signal});
            if (controller.signal.aborted) { if (typeof cleanup === 'function') cleanup(); }
            else instance.cleanup = cleanup;
        } catch (error) {
            if (controller.signal.aborted) return;
            root.replaceChildren();
            var message = document.createElement('p');
            message.setAttribute('role', 'alert');
            var hindi = /^hi\b/.test(root.lang || document.documentElement.lang);
            message.textContent = hindi ? 'तुलना लोड नहीं हो सकी। कृपया फिर से प्रयास करें।' : 'The interactive comparison could not load. Please try again.';
            var retry = document.createElement('button');
            retry.type = 'button'; retry.textContent = hindi ? 'फिर से प्रयास करें' : 'Retry';
            retry.addEventListener('click', function () {
                controller.abort(); instances.delete(root); mount(root);
            }, {signal: controller.signal});
            root.append(message, retry);
        }
    }
    function scan() {
        instances.forEach(function (instance, root) {
            if (!root.isConnected) {
                instance.controller.abort();
                if (typeof instance.cleanup === 'function') instance.cleanup();
                instances.delete(root);
            }
        });
        document.querySelectorAll('[data-component]').forEach(function (root) {
            if (!instances.has(root)) mount(root);
        });
    }
    window.UjnotesComponents = {
        register: function (name, factory) { factories.set(name, factory); },
        scan: scan
    };
    function start() {
        new MutationObserver(scan).observe(document.body, {childList: true, subtree: true});
        scan();
    }
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', start, {once: true});
    else start();
}());
