(function (window, document) {
    'use strict';
    if (window.tabstickMeta || !window.tabstickMetaPixelId) return;

    // Official Meta Pixel asynchronous loader; reuse an existing fbq queue.
    !function(f,b,e,v,n,t,s) {
        if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s);
    }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');

    window.fbq('init', window.tabstickMetaPixelId);
    window.tabstickMeta = {
        track: function (name, data, eventId) {
            try {
                if (eventId) {
                    const key = 'tabstick:meta:' + window.tabstickMetaPixelId + ':' + eventId;
                    try {
                        if (window.localStorage.getItem(key)) return;
                        window.localStorage.setItem(key, '1');
                    } catch (_) { /* Server also suppresses repeat purchases. */ }
                    window.fbq('track', name, data, { eventID: eventId });
                } else {
                    window.fbq('track', name, data || {});
                }
            } catch (_) { /* Analytics must never interrupt shopping. */ }
        }
    };
    window.tabstickMeta.track('PageView');
})(window, document);
