/**
 * Tapstick Interactive Animated Sticker Universe Engine
 * Pure Vanilla JavaScript • High Performance GPU Motion
 * Web Audio API Tactile Sound • Canvas Confetti • Parallax Physics
 * Respects prefers-reduced-motion
 */

(function () {
    'use strict';

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // ==========================================================================
    // 1. WEB AUDIO API: SYNTHETIC PEEL & POP SOUNDS (NO AUTOPLAY, ZERO ASSET OVERHEAD)
    // ==========================================================================
    let audioCtx = null;
    let soundEnabled = true;
    let userHasInteracted = false;

    function initAudio() {
        if (!audioCtx && (window.AudioContext || window.webkitAudioContext)) {
            const AudioContext = window.AudioContext || window.webkitAudioContext;
            audioCtx = new AudioContext();
        }
        if (audioCtx && audioCtx.state === 'suspended') {
            audioCtx.resume();
        }
        userHasInteracted = true;
    }

    // Play tactile vinyl peel sound
    function playPeelSound() {
        if (!soundEnabled || !userHasInteracted || !audioCtx || prefersReducedMotion) return;
        try {
            const osc = audioCtx.createOscillator();
            const gain = audioCtx.createGain();
            const filter = audioCtx.createBiquadFilter();

            osc.type = 'triangle';
            osc.frequency.setValueAtTime(420, audioCtx.currentTime);
            osc.frequency.exponentialRampToValueAtTime(140, audioCtx.currentTime + 0.08);

            filter.type = 'lowpass';
            filter.frequency.setValueAtTime(2400, audioCtx.currentTime);

            gain.gain.setValueAtTime(0.08, audioCtx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + 0.08);

            osc.connect(filter);
            filter.connect(gain);
            gain.connect(audioCtx.destination);

            osc.start();
            osc.stop(audioCtx.currentTime + 0.08);
        } catch (e) {
            // Audio fail silent
        }
    }

    // Play sticker pop / slap sound
    function playPopSound() {
        if (!soundEnabled || !userHasInteracted || !audioCtx || prefersReducedMotion) return;
        try {
            const osc = audioCtx.createOscillator();
            const gain = audioCtx.createGain();

            osc.type = 'sine';
            osc.frequency.setValueAtTime(180, audioCtx.currentTime);
            osc.frequency.exponentialRampToValueAtTime(680, audioCtx.currentTime + 0.06);

            gain.gain.setValueAtTime(0.12, audioCtx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + 0.07);

            osc.connect(gain);
            gain.connect(audioCtx.destination);

            osc.start();
            osc.stop(audioCtx.currentTime + 0.07);
        } catch (e) {
            // Audio fail silent
        }
    }

    // Activate audio on first user click or tap anywhere
    window.addEventListener('pointerdown', initAudio, { once: true });
    window.addEventListener('keydown', initAudio, { once: true });

    // ==========================================================================
    // 2. STICKER UNIVERSE PAGE TRANSITIONS & ENTRANCE LOADER (EVERY PAGE CHANGE)
    // ==========================================================================
    const peelLoader = document.getElementById('sticker-peel-loader');
    const peelTextSpan = document.getElementById('peel-loader-text') || (peelLoader ? peelLoader.querySelector('.peel-loading-chip span') : null);

    function runEntrancePeel() {
        if (!peelLoader) return;
        if (prefersReducedMotion) {
            peelLoader.style.display = 'none';
            return;
        }

        peelLoader.classList.remove('page-transition-exit');
        peelLoader.classList.remove('peeling');
        peelLoader.classList.remove('done');
        peelLoader.style.display = 'flex';

        // Fast, punchy entrance peel-reveal on EVERY page load
        setTimeout(() => {
            peelLoader.classList.add('peeling');
            playPopSound();
            createConfetti(window.innerWidth / 2, window.innerHeight / 2, 36);

            setTimeout(() => {
                peelLoader.classList.add('done');
                document.body.style.overflow = '';
            }, 550);
        }, 220);
    }

    if (peelLoader) {
        runEntrancePeel();
    }

    // Handle BFCache (browser Back/Forward navigation)
    window.addEventListener('pageshow', function (e) {
        if (peelLoader) {
            runEntrancePeel();
        }
    });

    // Page exit transition trigger helper
    function triggerPageExit(targetUrl, customMessage) {
        if (!peelLoader || prefersReducedMotion) {
            if (targetUrl) window.location.href = targetUrl;
            return;
        }

        if (peelTextSpan && customMessage) {
            peelTextSpan.textContent = customMessage;
        }

        peelLoader.classList.remove('done');
        peelLoader.classList.remove('peeling');
        peelLoader.classList.add('page-transition-exit');
        playPeelSound();

        if (targetUrl) {
            const safetyTimeout = setTimeout(() => {
                window.location.href = targetUrl;
            }, 900);

            setTimeout(() => {
                clearTimeout(safetyTimeout);
                window.location.href = targetUrl;
            }, 260);
        }
    }

    // Intercept internal navigation link clicks for animated page transitions
    document.addEventListener('click', function (e) {
        const link = e.target.closest('a');
        if (!link) return;

        // Skip if modifier keys held (Cmd+Click, Ctrl+Click for new tab)
        if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;

        const rawHref = link.getAttribute('href');
        if (!rawHref) return;

        // Skip in-page hash anchors (#shop, #why) on the same current page
        if (rawHref.startsWith('#')) return;

        // Skip external protocols
        if (rawHref.startsWith('mailto:') || rawHref.startsWith('tel:') || rawHref.startsWith('javascript:')) return;

        // Skip new tab or file downloads
        if (link.target === '_blank' || link.hasAttribute('download')) return;

        try {
            const currentUrl = new URL(window.location.href);
            const nextUrl = new URL(link.href, window.location.origin);

            // Only animate same origin
            if (nextUrl.origin !== currentUrl.origin) return;

            // If navigating to the same path & search with a hash (e.g. /#shop while on /)
            if (nextUrl.pathname === currentUrl.pathname && nextUrl.search === currentUrl.search) {
                return;
            }

            // Context-sensitive sticker universe loading text
            let message = '✦ UNBOXING NEXT DROP ✦';
            if (nextUrl.pathname.includes('/cart')) {
                message = '✦ ROLLING TO YOUR CART ✦';
            } else if (nextUrl.pathname.includes('/checkout')) {
                message = '✦ SECURING YOUR PACK ✦';
            } else if (nextUrl.pathname.includes('/products/')) {
                message = '✦ INSPECTING VINYL DECAL ✦';
            } else if (nextUrl.pathname === '/') {
                message = '✦ BACK TO TAPSTICK HQ ✦';
            }

            e.preventDefault();
            triggerPageExit(nextUrl.href, message);
        } catch (err) {
            // Let default browser navigation occur
        }
    });

    // Handle form submissions that trigger page change (checkout, cart updates)
    document.addEventListener('submit', function (e) {
        const form = e.target;
        if (!form || form.id === 'lead-capture-form' || form.target === '_blank') return;
        if (form.classList.contains('pop-add-cart-form')) return; // handled with flying sticker

        if (peelLoader && !prefersReducedMotion && !form.dataset.submitting) {
            form.dataset.submitting = 'true';
            let message = '✦ PACKING YOUR DROP ✦';
            if (form.action && form.action.includes('checkout')) {
                message = '✦ PROCESSING YOUR ORDER ✦';
            } else if (form.action && form.action.includes('cart')) {
                message = '✦ UPDATING STICKER BAG ✦';
            }

            triggerPageExit(null, message);
        }
    });

    // ==========================================================================
    // 3. CANVAS CONFETTI & SPARKLE ENGINE
    // ==========================================================================
    let canvas = document.getElementById('confetti-canvas');
    if (!canvas) {
        canvas = document.createElement('canvas');
        canvas.id = 'confetti-canvas';
        canvas.style.position = 'fixed';
        canvas.style.inset = '0';
        canvas.style.width = '100vw';
        canvas.style.height = '100vh';
        canvas.style.pointerEvents = 'none';
        canvas.style.zIndex = '99999';
        document.body.appendChild(canvas);
    }

    const ctx = canvas.getContext('2d');
    let particles = [];
    let animationFrame = null;

    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();

    const confettiColors = ['#FFE600', '#FF334B', '#2563EB', '#FF80BF', '#10B981', '#18181B', '#FFFFFF'];

    function createConfetti(x, y, count = 36) {
        if (prefersReducedMotion) return;
        for (let i = 0; i < count; i++) {
            const angle = (Math.PI * 2 * i) / count + (Math.random() - 0.5);
            const speed = 4 + Math.random() * 8;
            particles.push({
                x: x,
                y: y,
                vx: Math.cos(angle) * speed,
                vy: Math.sin(angle) * speed - 3.5,
                size: 7 + Math.random() * 8,
                color: confettiColors[Math.floor(Math.random() * confettiColors.length)],
                rotation: Math.random() * 360,
                rotationSpeed: (Math.random() - 0.5) * 14,
                alpha: 1,
                decay: 0.014 + Math.random() * 0.018,
                shape: Math.random() > 0.4 ? 'rect' : 'star'
            });
        }
        if (!animationFrame) {
            updateConfetti();
        }
    }

    function updateConfetti() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles = particles.filter(p => p.alpha > 0);

        for (let p of particles) {
            p.x += p.vx;
            p.y += p.vy;
            p.vy += 0.28; // gravity
            p.rotation += p.rotationSpeed;
            p.alpha -= p.decay;

            ctx.save();
            ctx.globalAlpha = Math.max(0, p.alpha);
            ctx.translate(p.x, p.y);
            ctx.rotate((p.rotation * Math.PI) / 180);
            ctx.fillStyle = p.color;

            if (p.shape === 'rect') {
                ctx.fillRect(-p.size / 2, -p.size / 2, p.size, p.size * 0.6);
            } else {
                // Little star sparkle
                ctx.beginPath();
                ctx.arc(0, 0, p.size / 2, 0, Math.PI * 2);
                ctx.fill();
            }
            ctx.restore();
        }

        if (particles.length > 0) {
            animationFrame = requestAnimationFrame(updateConfetti);
        } else {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            animationFrame = null;
        }
    }

    // Trigger confetti on any interactive CTA
    document.addEventListener('click', function (e) {
        const target = e.target.closest('[data-confetti], .trigger-confetti, .btn-pop-primary');
        if (target) {
            const rect = target.getBoundingClientRect();
            const x = rect.left + rect.width / 2;
            const y = rect.top + rect.height / 2;
            createConfetti(x, y, 42);
            playPopSound();
        }
    });

    // ==========================================================================
    // 4. FLYING STICKER TO CART ANIMATION WITH PAGE TRANSITION
    // ==========================================================================
    document.addEventListener('submit', function (e) {
        const form = e.target.closest('.pop-add-cart-form');
        if (!form) return;

        if (form.dataset.submitting === 'true') return;

        const card = form.closest('.product-pop-card') || document;
        const img = card ? card.querySelector('.pop-card-sticker-img, .product-hero-image img, img') : null;
        const bottomBarCart = document.querySelector('.bottom-bar-item.cart-item');
        const headerCart = document.querySelector('.header-cart-pill');
        const cartTarget = (window.innerWidth <= 768 && bottomBarCart) ? bottomBarCart : (headerCart || bottomBarCart);

        if (img && cartTarget && !prefersReducedMotion) {
            e.preventDefault();
            form.dataset.submitting = 'true';

            const imgRect = img.getBoundingClientRect();
            const cartRect = cartTarget.getBoundingClientRect();

            const flyingSticker = img.cloneNode(true);
            flyingSticker.className = 'flying-sticker-clone';
            flyingSticker.style.position = 'fixed';
            flyingSticker.style.left = `${imgRect.left}px`;
            flyingSticker.style.top = `${imgRect.top}px`;
            flyingSticker.style.width = `${imgRect.width}px`;
            flyingSticker.style.height = `${imgRect.height}px`;
            flyingSticker.style.zIndex = '99999';
            flyingSticker.style.pointerEvents = 'none';
            flyingSticker.style.borderRadius = '16px';
            flyingSticker.style.border = '3px solid #18181B';
            flyingSticker.style.boxShadow = '6px 6px 0 #18181B';
            flyingSticker.style.transition = 'all 0.5s cubic-bezier(0.16, 1, 0.3, 1)';
            document.body.appendChild(flyingSticker);

            playPeelSound();

            requestAnimationFrame(() => {
                const targetX = cartRect.left + cartRect.width / 2 - imgRect.width / 4;
                const targetY = cartRect.top + cartRect.height / 2 - imgRect.height / 4;
                flyingSticker.style.transform = `translate(${targetX - imgRect.left}px, ${targetY - imgRect.top}px) scale(0.25) rotate(720deg)`;
                flyingSticker.style.opacity = '0.3';
            });

            setTimeout(() => {
                flyingSticker.remove();
                playPopSound();
                cartTarget.classList.add('cart-bounce-pop');
                createConfetti(cartRect.left + cartRect.width / 2, cartRect.top + cartRect.height / 2, 20);

                setTimeout(() => {
                    triggerPageExit(null, '✦ ADDING TO YOUR CART ✦');
                    setTimeout(() => {
                        form.submit();
                    }, 220);
                }, 150);
            }, 500);
        }
    });

    // ==========================================================================
    // 5. CURSOR-BASED 3D TILT & HERO PARALLAX
    // ==========================================================================
    if (!prefersReducedMotion && window.innerWidth > 768) {
        // Hero 3D depth
        const heroSection = document.querySelector('.hero-pop-section');
        const parallaxLayers = document.querySelectorAll('[data-parallax-depth]');

        if (heroSection && parallaxLayers.length > 0) {
            let mouseX = 0, mouseY = 0;
            let currentX = 0, currentY = 0;

            window.addEventListener('mousemove', function (e) {
                const centerX = window.innerWidth / 2;
                const centerY = window.innerHeight / 2;
                mouseX = (e.clientX - centerX) / centerX;
                mouseY = (e.clientY - centerY) / centerY;
            });

            function renderParallax() {
                currentX += (mouseX - currentX) * 0.08;
                currentY += (mouseY - currentY) * 0.08;

                parallaxLayers.forEach(layer => {
                    const depth = parseFloat(layer.getAttribute('data-parallax-depth') || 1);
                    const rotate = parseFloat(layer.getAttribute('data-base-rotate') || 0);
                    const moveX = currentX * depth * 28;
                    const moveY = currentY * depth * 28;
                    layer.style.transform = `translate3d(${moveX}px, ${moveY}px, 0) rotate(${rotate + currentX * 3}deg)`;
                });

                requestAnimationFrame(renderParallax);
            }
            renderParallax();
        }

        // Product Cards 3D Tilt
        window.initCardInteractions = function (card) {
            if (!card || card._popInit) return;
            card._popInit = true;

            if (!prefersReducedMotion && window.innerWidth > 768) {
                card.addEventListener('mousemove', function (e) {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    const cx = rect.width / 2;
                    const cy = rect.height / 2;
                    const rotX = ((y - cy) / cy) * -7;
                    const rotY = ((x - cx) / cx) * 7;
                    card.style.transform = `perspective(800px) rotateX(${rotX}deg) rotateY(${rotY}deg) translateY(-8px)`;
                });

                card.addEventListener('mouseleave', function () {
                    card.style.transform = '';
                });

                card.addEventListener('mouseenter', playPeelSound);
            }
        };

        document.querySelectorAll('.product-pop-card').forEach(window.initCardInteractions);
    }

    // ==========================================================================
    // 6. MAGNETIC BUTTONS
    // ==========================================================================
    if (!prefersReducedMotion && window.innerWidth > 768) {
        const magneticElements = document.querySelectorAll('.btn-magnetic, .btn-pop-primary, .btn-pop-secondary, .floating-lead-trigger');
        magneticElements.forEach(el => {
            el.addEventListener('mousemove', function (e) {
                const rect = el.getBoundingClientRect();
                const x = e.clientX - (rect.left + rect.width / 2);
                const y = e.clientY - (rect.top + rect.height / 2);
                el.style.transform = `translate(${x * 0.22}px, ${y * 0.22}px)`;
            });
            el.addEventListener('mouseleave', function () {
                el.style.transform = 'translate(0px, 0px)';
                el.style.transition = 'transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1)';
                setTimeout(() => {
                    el.style.transition = '';
                }, 400);
            });
        });
    }

    // ==========================================================================
    // 7. STICKER MASCOT EYE TRACKING
    // ==========================================================================
    const mascotEyes = document.querySelectorAll('.mascot-pupil');
    if (mascotEyes.length > 0 && !prefersReducedMotion) {
        window.addEventListener('mousemove', function (e) {
            mascotEyes.forEach(pupil => {
                const rect = pupil.getBoundingClientRect();
                const eyeCenterX = rect.left + rect.width / 2;
                const eyeCenterY = rect.top + rect.height / 2;
                const angle = Math.atan2(e.clientY - eyeCenterY, e.clientX - eyeCenterX);
                const distance = Math.min(5, Math.hypot(e.clientX - eyeCenterX, e.clientY - eyeCenterY) / 30);
                const px = Math.cos(angle) * distance;
                const py = Math.sin(angle) * distance;
                pupil.style.transform = `translate(${px}px, ${py}px)`;
            });
        });
    }

    // ==========================================================================
    // 8. SCROLL REVEALS & ACTIVE NAVBAR SHRINK
    // ==========================================================================
    const siteHeader = document.querySelector('.site-header');
    window.addEventListener('scroll', function () {
        if (siteHeader) {
            if (window.scrollY > 40) {
                siteHeader.classList.add('is-scrolled');
            } else {
                siteHeader.classList.remove('is-scrolled');
            }
        }
    }, { passive: true });

    if ('IntersectionObserver' in window) {
        const revealElements = document.querySelectorAll('.reveal-on-scroll');
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    obs.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -40px 0px'
        });

        revealElements.forEach(el => observer.observe(el));
    }

    // ==========================================================================
    // 9. SOUND TOGGLE BUTTON IN NAVBAR
    // ==========================================================================
    const soundToggleBtn = document.getElementById('sound-toggle-btn');
    if (soundToggleBtn) {
        soundToggleBtn.addEventListener('click', function (e) {
            e.preventDefault();
            soundEnabled = !soundEnabled;
            soundToggleBtn.textContent = soundEnabled ? '🔊 SFX: ON' : '🔇 SFX: OFF';
            soundToggleBtn.classList.toggle('muted', !soundEnabled);
            if (soundEnabled) {
                initAudio();
                playPopSound();
            }
        });
    }

    // ==========================================================================
    // 10. INTERACTIVE DRAGGABLE STICKER WALL (CLUB SECTION)
    // ==========================================================================
    const dragStickers = document.querySelectorAll('.draggable-sticker');
    dragStickers.forEach(sticker => {
        let isDragging = false;
        let startX, startY, initLeft, initTop;

        sticker.addEventListener('pointerdown', function (e) {
            if (prefersReducedMotion) return;
            isDragging = true;
            sticker.setPointerCapture(e.pointerId);
            sticker.classList.add('dragging');
            playPeelSound();

            startX = e.clientX;
            startY = e.clientY;

            const rect = sticker.getBoundingClientRect();
            initLeft = rect.left;
            initTop = rect.top;
        });

        sticker.addEventListener('pointermove', function (e) {
            if (!isDragging) return;
            const dx = e.clientX - startX;
            const dy = e.clientY - startY;
            sticker.style.transform = `translate(${dx}px, ${dy}px) scale(1.1) rotate(6deg)`;
        });

        const endDrag = function (e) {
            if (!isDragging) return;
            isDragging = false;
            sticker.classList.remove('dragging');
            sticker.style.transition = 'transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1)';
            sticker.style.transform = '';
            playPopSound();
            setTimeout(() => {
                sticker.style.transition = '';
            }, 400);
        };

        sticker.addEventListener('pointerup', endDrag);
        sticker.addEventListener('pointercancel', endDrag);
    });

    // ==========================================================================
    // 11. MOBILE FULL-SCREEN ANIMATED MENU & STICKY BOTTOM BAR
    // ==========================================================================
    const mobileMenuOpenBtn = document.getElementById('btn-open-mobile-menu');
    const mobileMenuCloseBtn = document.getElementById('btn-close-mobile-menu');
    const mobileMenuDrawer = document.getElementById('mobile-sticker-drawer');
    const bottomBarMenuBtn = document.getElementById('bottom-bar-menu-btn');
    const bottomBarVipBtn = document.getElementById('bottom-bar-vip-btn');
    const bottomBarSearchBtn = document.getElementById('bottom-bar-search-btn');

    function openMobileDrawer() {
        if (!mobileMenuDrawer) return;
        mobileMenuDrawer.classList.add('is-active');
        document.body.style.overflow = 'hidden';
        playPeelSound();
    }

    function closeMobileDrawer() {
        if (!mobileMenuDrawer) return;
        mobileMenuDrawer.classList.remove('is-active');
        document.body.style.overflow = '';
        playPopSound();
    }

    if (mobileMenuOpenBtn) {
        mobileMenuOpenBtn.addEventListener('click', openMobileDrawer);
    }

    if (mobileMenuCloseBtn) {
        mobileMenuCloseBtn.addEventListener('click', closeMobileDrawer);
    }

    if (bottomBarMenuBtn && mobileMenuDrawer) {
        bottomBarMenuBtn.addEventListener('click', function () {
            if (mobileMenuDrawer.classList.contains('is-active')) {
                closeMobileDrawer();
            } else {
                openMobileDrawer();
            }
        });
    }

    if (bottomBarVipBtn) {
        bottomBarVipBtn.addEventListener('click', function (e) {
            e.preventDefault();
            playPeelSound();
            const modal = document.getElementById('lead-modal');
            if (typeof window.openLeadModal === 'function') {
                window.openLeadModal();
            } else if (modal) {
                modal.classList.add('active');
                modal.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';
            } else {
                document.getElementById('floating-lead-trigger')?.click();
            }
        });
    }

    if (bottomBarSearchBtn) {
        bottomBarSearchBtn.addEventListener('click', function (e) {
            e.preventDefault();
            playPopSound();
            const shopSection = document.getElementById('shop');
            if (shopSection) {
                shopSection.scrollIntoView({ behavior: 'smooth' });
            } else {
                window.location.href = '/#shop';
            }
        });
    }

    // Close mobile drawer when clicking any link inside it
    if (mobileMenuDrawer) {
        mobileMenuDrawer.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', function () {
                closeMobileDrawer();
            });
        });
    }

    // ==========================================================================
    // 12. HIGH-PERFORMANCE INFINITE SCROLL & DYNAMIC CATALOG FILTER
    // ==========================================================================
    const productsGrid = document.getElementById('products-pop-grid');
    if (productsGrid) {
        const sentinel = document.getElementById('products-scroll-sentinel');
        const searchInput = document.getElementById('products-search-input');
        const searchClearBtn = document.getElementById('products-search-clear');
        const categoryTabs = document.querySelectorAll('#pop-category-tabs .pop-filter-pill');
        const lazyLoader = document.getElementById('products-lazy-loader');
        const loadMoreWrap = document.getElementById('products-load-more-wrap');
        const loadMoreBtn = document.getElementById('btn-load-more-drops');
        const remainingSpan = document.getElementById('load-more-remaining-count');
        const endBanner = document.getElementById('products-end-banner');
        const shownCountSpan = document.getElementById('current-shown-count');
        const totalCountSpan = document.getElementById('total-matching-count');

        let currentCategory = 'all';
        let currentSearch = '';
        let currentPage = 1;
        let hasNextPage = true;
        let isLoading = false;
        let searchDebounceTimer = null;
        let abortController = null;

        function updateCounts(shown, total) {
            if (shownCountSpan) shownCountSpan.textContent = shown.toLocaleString();
            if (totalCountSpan) totalCountSpan.textContent = total.toLocaleString();
            if (remainingSpan) remainingSpan.textContent = Math.max(0, total - shown).toLocaleString();
        }

        async function fetchProducts(page, append) {
            if (isLoading) return;
            isLoading = true;

            if (abortController) {
                abortController.abort();
            }
            abortController = new AbortController();

            if (lazyLoader) lazyLoader.classList.add('is-loading');

            const params = new URLSearchParams({
                page: page,
                category: currentCategory,
                search: currentSearch
            });

            try {
                const response = await fetch(`/api/products?${params.toString()}`, {
                    signal: abortController.signal,
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (!response.ok) throw new Error('Network error');
                const data = await response.json();

                if (!append) {
                    productsGrid.innerHTML = '';
                }

                if (data.html && data.html.trim() !== '') {
                    productsGrid.insertAdjacentHTML('beforeend', data.html);
                    if (window.initCardInteractions) {
                        productsGrid.querySelectorAll('.product-pop-card').forEach(window.initCardInteractions);
                    }
                } else if (!append) {
                    productsGrid.innerHTML = `
                        <div class="products-empty-state" id="products-empty-message">
                            <span style="font-size:3rem;">🔍</span>
                            <h3>No matching stickers found!</h3>
                            <p>Try searching for a different keyword or explore another category.</p>
                        </div>
                    `;
                }

                currentPage = data.current_page;
                hasNextPage = data.has_more;

                const currentCards = productsGrid.querySelectorAll('.product-pop-card').length;
                updateCounts(currentCards, data.total);

                if (loadMoreWrap) {
                    loadMoreWrap.style.display = hasNextPage ? 'flex' : 'none';
                }

                if (endBanner) {
                    if (!hasNextPage && currentCards > 0) {
                        endBanner.classList.add('is-visible');
                    } else {
                        endBanner.classList.remove('is-visible');
                    }
                }
            } catch (err) {
                if (err.name !== 'AbortError') {
                    console.error('Failed to load products:', err);
                }
            } finally {
                isLoading = false;
                if (lazyLoader) lazyLoader.classList.remove('is-loading');
            }
        }

        // IntersectionObserver for Infinite Scroll
        if ('IntersectionObserver' in window && sentinel) {
            const scrollObserver = new IntersectionObserver((entries) => {
                const entry = entries[0];
                if (entry && entry.isIntersecting && hasNextPage && !isLoading) {
                    fetchProducts(currentPage + 1, true);
                }
            }, {
                rootMargin: '400px 0px',
                threshold: 0.01
            });
            scrollObserver.observe(sentinel);
        }

        // Category Tab Buttons
        categoryTabs.forEach(btn => {
            btn.addEventListener('click', function () {
                const cat = this.getAttribute('data-category');
                if (cat === currentCategory) return;

                categoryTabs.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                currentCategory = cat;
                currentPage = 1;
                playPeelSound();
                createConfetti(this.getBoundingClientRect().left + this.offsetWidth / 2, this.getBoundingClientRect().top + this.offsetHeight / 2, 16);
                fetchProducts(1, false);
            });
        });

        // Search Input with 300ms Debounce
        if (searchInput) {
            searchInput.addEventListener('input', function () {
                const val = this.value.trim();
                if (searchClearBtn) {
                    searchClearBtn.style.display = val ? 'flex' : 'none';
                }

                clearTimeout(searchDebounceTimer);
                searchDebounceTimer = setTimeout(() => {
                    currentSearch = val;
                    currentPage = 1;
                    fetchProducts(1, false);
                }, 300);
            });
        }

        // Clear Search Button
        if (searchClearBtn && searchInput) {
            searchClearBtn.addEventListener('click', function () {
                searchInput.value = '';
                this.style.display = 'none';
                currentSearch = '';
                currentPage = 1;
                searchInput.focus();
                playPopSound();
                fetchProducts(1, false);
            });
        }

        // Manual Load More Button
        if (loadMoreBtn) {
            loadMoreBtn.addEventListener('click', function () {
                if (hasNextPage && !isLoading) {
                    playPopSound();
                    createConfetti(this.getBoundingClientRect().left + this.offsetWidth / 2, this.getBoundingClientRect().top + this.offsetHeight / 2, 20);
                    fetchProducts(currentPage + 1, true);
                }
            });
        }
    }

    // Expose utilities globally
    window.TapstickPop = {
        burst: createConfetti,
        playPop: playPopSound,
        playPeel: playPeelSound
    };
})();
