/**
 * ==========================================================================
 * TABSTICK LIGHTNING-FAST CART DRAWER CONTROLLER
 * Handles AJAX cart mutations, slide-over animations, and dynamic thresholds
 * ==========================================================================
 */

(function () {
    'use strict';

    // Global state
    let isDrawerOpen = false;

    // Helper: CSRF Token
    function getCsrfToken() {
        const meta = document.querySelector('meta[name="csrf-token"]');
        return meta ? meta.getAttribute('content') : '';
    }

    // Helper: Format Currency (INR)
    function formatINR(amount) {
        return '₹' + Number(amount || 0).toLocaleString('en-IN', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    // 1. Open Cart Drawer
    window.openCartDrawer = function () {
        const drawer = document.getElementById('cart-drawer');
        const backdrop = document.getElementById('cart-drawer-backdrop');
        if (!drawer || !backdrop) return;

        drawer.classList.add('is-open');
        backdrop.classList.add('is-open');
        document.body.classList.add('cart-drawer-active');
        drawer.setAttribute('aria-hidden', 'false');
        backdrop.setAttribute('aria-hidden', 'false');
        isDrawerOpen = true;
    };

    // 2. Close Cart Drawer
    window.closeCartDrawer = function () {
        const drawer = document.getElementById('cart-drawer');
        const backdrop = document.getElementById('cart-drawer-backdrop');
        if (!drawer || !backdrop) return;

        drawer.classList.remove('is-open');
        backdrop.classList.remove('is-open');
        document.body.classList.remove('cart-drawer-active');
        drawer.setAttribute('aria-hidden', 'true');
        backdrop.setAttribute('aria-hidden', 'true');
        isDrawerOpen = false;
    };

    // 3. Update Drawer UI from JSON payload
    window.updateCartDrawerUI = function (data) {
        if (!data) return;

        // A. Update items body
        const body = document.getElementById('cart-drawer-body');
        if (body && data.html) {
            body.innerHTML = data.html;
        }

        // B. Update header badge & labels
        const countLabel = document.getElementById('cart-drawer-count-label');
        const count = data.count !== undefined ? data.count : 0;
        if (countLabel) {
            countLabel.textContent = count === 1 ? '1 STICKER' : count + ' STICKERS';
        }

        // Update all badge counters across the page (header + mobile bottom bar)
        document.querySelectorAll('.cart-badge-count').forEach(el => {
            el.textContent = count;
        });

        // Update header subtotal text
        document.querySelectorAll('.cart-subtotal-text').forEach(el => {
            el.textContent = 'Rs. ' + Number(data.subtotal || 0).toFixed(2);
        });

        // C. Update drawer subtotal
        const subtotalVal = document.getElementById('drawer-subtotal-val');
        if (subtotalVal) {
            subtotalVal.textContent = data.subtotal_formatted || formatINR(data.subtotal);
        }

        // D. Update Goal & Progress Bar
        const minOrder = data.min_order_amount || 100;
        const subtotal = Number(data.subtotal || 0);
        const freeShip = 499;
        const isMinReached = data.min_order_reached !== undefined ? data.min_order_reached : (subtotal >= minOrder);
        const minDiff = Math.max(0, minOrder - subtotal);
        const freeDiff = Math.max(0, freeShip - subtotal);
        const freeProgress = subtotal > 0 ? Math.min(100, Math.round((subtotal / freeShip) * 100)) : 0;
        const minProgress = subtotal > 0 ? Math.min(100, Math.round((subtotal / minOrder) * 100)) : 0;

        const goalMessage = document.getElementById('drawer-goal-message');
        if (goalMessage) {
            if (subtotal === 0) {
                goalMessage.innerHTML = 'Add stickers to unlock <strong>Free Delivery</strong> &amp; Checkout!';
            } else if (!isMinReached) {
                goalMessage.innerHTML = `Add <strong>${formatINR(minDiff)}</strong> more to reach <strong>₹100 min order</strong>`;
            } else if (subtotal < freeShip) {
                goalMessage.innerHTML = `🎉 Min order reached! Add <strong>${formatINR(freeDiff)}</strong> for <strong>FREE Shipping</strong>`;
            } else {
                goalMessage.innerHTML = '🚀 You\'ve unlocked <strong>FREE Pan-India Shipping!</strong>';
            }
        }

        const goalProgressFill = document.getElementById('drawer-goal-progress-fill');
        if (goalProgressFill) {
            const pct = subtotal >= freeShip ? 100 : (isMinReached ? Math.max(15, freeProgress) : Math.max(8, minProgress));
            goalProgressFill.style.width = pct + '%';
        }

        // E. Update Checkout / Min Order Action Button
        const checkoutWrap = document.getElementById('drawer-checkout-wrap');
        if (checkoutWrap) {
            if (!isMinReached || subtotal === 0) {
                const diffAmount = subtotal === 0 ? formatINR(minOrder) : formatINR(minDiff);
                checkoutWrap.innerHTML = `
                    <button type="button" class="btn-drawer-min-order" id="btn-drawer-checkout-action" onclick="closeCartDrawer(); window.location.href='/#shop';">
                        <span>${diffAmount} MORE TO CHECKOUT</span>
                    </button>
                `;
            } else {
                checkoutWrap.innerHTML = `
                    <a href="/checkout" class="btn-drawer-checkout" id="btn-drawer-checkout-action">
                        <span>PROCEED TO CHECKOUT ➔</span>
                    </a>
                `;
            }
        }
    };

    // 4. Update Item Quantity in Drawer
    window.updateDrawerQty = function (productId, newQty) {
        if (newQty <= 0) {
            window.removeDrawerItem(productId);
            return;
        }

        const itemRow = document.getElementById('drawer-item-' + productId);
        if (itemRow) itemRow.style.opacity = '0.6';

        fetch('/cart/' + productId, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': getCsrfToken(),
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ quantity: newQty })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                window.updateCartDrawerUI(data);
            }
        })
        .catch(err => {
            console.error('Cart quantity update error:', err);
            if (itemRow) itemRow.style.opacity = '1';
        });
    };

    // 5. Remove Item from Drawer
    window.removeDrawerItem = function (productId) {
        const itemRow = document.getElementById('drawer-item-' + productId);
        if (itemRow) {
            itemRow.classList.add('is-removing');
        }

        fetch('/cart/' + productId, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': getCsrfToken(),
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                setTimeout(() => {
                    window.updateCartDrawerUI(data);
                }, 200);
            }
        })
        .catch(err => {
            console.error('Cart remove error:', err);
            if (itemRow) itemRow.classList.remove('is-removing');
        });
    };

    // 6. Handle Coupon Submission
    window.handleDrawerCoupon = function (e) {
        e.preventDefault();
        const input = document.getElementById('drawer-coupon-input');
        const btn = document.getElementById('drawer-coupon-btn');
        const feedback = document.getElementById('drawer-coupon-feedback');
        if (!input) return;

        const code = input.value.trim();
        if (btn) btn.textContent = '...';

        fetch('/cart/coupon', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': getCsrfToken(),
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ code: code })
        })
        .then(res => res.json())
        .then(data => {
            if (btn) btn.textContent = 'APPLY';
            if (feedback) {
                feedback.style.display = 'block';
                if (data.success) {
                    feedback.className = 'drawer-coupon-feedback success';
                    feedback.textContent = data.message || 'Coupon applied!';
                    window.updateCartDrawerUI(data);
                } else {
                    feedback.className = 'drawer-coupon-feedback error';
                    feedback.textContent = data.message || 'Invalid coupon code';
                }
            }
        })
        .catch(err => {
            if (btn) btn.textContent = 'APPLY';
            if (feedback) {
                feedback.style.display = 'block';
                feedback.className = 'drawer-coupon-feedback error';
                feedback.textContent = 'Failed to apply coupon. Try again.';
            }
        });
    };

    // 7. Intercept All Add-to-Cart Submissions across the site
    function bindAddToCartForms() {
        document.querySelectorAll('form[action*="/cart"]').forEach(form => {
            if (form.dataset.cartDrawerBound === 'true') return;
            // Don't intercept if method is not POST to /cart/{id}
            const action = form.getAttribute('action') || '';
            const method = (form.getAttribute('method') || '').toUpperCase();
            if (method !== 'POST' || !action.match(/\/cart\/\d+/)) return;

            form.dataset.cartDrawerBound = 'true';

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                if (form.dataset.cartDrawerSubmitting === 'true') return;
                form.dataset.cartDrawerSubmitting = 'true';

                const submitBtn = form.querySelector('button[type="submit"]');
                const origText = submitBtn ? submitBtn.innerHTML : '';
                
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.classList.add('is-adding');
                    submitBtn.innerHTML = '<span>Added! ✓</span>';
                }

                const formData = new FormData(form);

                fetch(action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(res => {
                    if (!res.ok) throw new Error('Add to cart failed');
                    return res.json();
                })
                .then(data => {
                    form.dataset.cartDrawerSubmitting = 'false';
                    if (submitBtn) {
                        setTimeout(() => {
                            submitBtn.disabled = false;
                            submitBtn.classList.remove('is-adding');
                            submitBtn.innerHTML = origText;
                        }, 1200);
                    }

                    if (data && data.success) {
                        window.updateCartDrawerUI(data);
                        window.openCartDrawer();
                    }
                })
                .catch(err => {
                    console.error('AJAX add to cart failed:', err);
                    form.dataset.cartDrawerSubmitting = 'false';
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = origText;
                    }
                    // Fallback to normal form submit if fetch fails
                    form.submit();
                });
            }, true);
        });
    }

    // 8. Intercept Header Cart Pill & Mobile Bottom Bar Cart Icon
    function bindCartTriggers() {
        // Desktop Cart Pill
        document.querySelectorAll('.header-cart-pill').forEach(btn => {
            btn.addEventListener('click', function (e) {
                if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey || e.button !== 0) return;
                // If user is not already on dedicated /cart page, open slide drawer
                if (!window.location.pathname.startsWith('/cart')) {
                    e.preventDefault();
                    window.openCartDrawer();
                }
            });
        });

        // Mobile Bottom Bar Cart Item
        document.querySelectorAll('.bottom-bar-item.cart-item').forEach(btn => {
            btn.addEventListener('click', function (e) {
                if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey || e.button !== 0) return;
                if (!window.location.pathname.startsWith('/cart')) {
                    e.preventDefault();
                    window.openCartDrawer();
                }
            });
        });
    }

    // 9. Initialize Everything on DOMContentLoaded & Re-observe dynamic cards
    document.addEventListener('DOMContentLoaded', function () {
        bindAddToCartForms();
        bindCartTriggers();

        // Keyboard listener for Escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && isDrawerOpen) {
                window.closeCartDrawer();
            }
        });

        // Observer for dynamically loaded items (e.g. infinite scroll or AI chat cards)
        const observer = new MutationObserver(function () {
            bindAddToCartForms();
        });
        observer.observe(document.body, { childList: true, subtree: true });
    });

})();
