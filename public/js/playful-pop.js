/**
 * Tapstick Playful Pop Interaction Engine
 * Lightweight, performant Vanilla JavaScript
 * Respects prefers-reduced-motion
 */

(function () {
    'use strict';

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // 1. LIGHTWEIGHT CANVAS CONFETTI BURST
    const canvas = document.createElement('canvas');
    canvas.id = 'confetti-canvas';
    canvas.style.position = 'fixed';
    canvas.style.inset = '0';
    canvas.style.width = '100vw';
    canvas.style.height = '100vh';
    canvas.style.pointerEvents = 'none';
    canvas.style.zIndex = '99999';
    document.body.appendChild(canvas);

    const ctx = canvas.getContext('2d');
    let particles = [];
    let animationFrame = null;

    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();

    const confettiColors = ['#FFE600', '#FF334B', '#2563EB', '#FF80BF', '#10B981', '#18181B'];

    function createConfetti(x, y, count = 36) {
        if (prefersReducedMotion) return;
        for (let i = 0; i < count; i++) {
            const angle = (Math.PI * 2 * i) / count + (Math.random() - 0.5);
            const speed = 4 + Math.random() * 8;
            particles.push({
                x: x,
                y: y,
                vx: Math.cos(angle) * speed,
                vy: Math.sin(angle) * speed - 3,
                size: 6 + Math.random() * 8,
                color: confettiColors[Math.floor(Math.random() * confettiColors.length)],
                rotation: Math.random() * 360,
                rotationSpeed: (Math.random() - 0.5) * 12,
                alpha: 1,
                decay: 0.015 + Math.random() * 0.02,
                shape: Math.random() > 0.5 ? 'rect' : 'circle'
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
            p.vy += 0.25; // gravity
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

    // Trigger confetti on any element with data-confetti or .trigger-confetti or .btn-pop-primary
    document.addEventListener('click', function (e) {
        const target = e.target.closest('[data-confetti], .trigger-confetti, .btn-pop-primary, .btn-add-pop-cart');
        if (target) {
            const rect = target.getBoundingClientRect();
            const x = rect.left + rect.width / 2;
            const y = rect.top + rect.height / 2;
            createConfetti(x, y, 40);
        }
    });

    // 2. MAGNETIC BUTTON HOVER EFFECT
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

    // 3. CURSOR-FOLLOWING HERO DEPTH / PARALLAX
    if (!prefersReducedMotion && window.innerWidth > 900) {
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
                    const moveX = currentX * depth * 24;
                    const moveY = currentY * depth * 24;
                    layer.style.transform = `translate3d(${moveX}px, ${moveY}px, 0) rotate(${rotate + currentX * 2}deg)`;
                });

                requestAnimationFrame(renderParallax);
            }
            renderParallax();
        }
    }

    // 4. ANIMATED STICKER MASCOT EYE TRACKING
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

    // 5. SCROLL-TRIGGERED ENTRANCE REVEAL (INTERSECTION OBSERVER)
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
            threshold: 0.12,
            rootMargin: '0px 0px -40px 0px'
        });

        revealElements.forEach(el => observer.observe(el));
    }

    // 6. CARD 3D TILT EFFECT
    if (!prefersReducedMotion && window.innerWidth > 768) {
        const tiltCards = document.querySelectorAll('.product-pop-card');
        tiltCards.forEach(card => {
            card.addEventListener('mousemove', function (e) {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                const cx = rect.width / 2;
                const cy = rect.height / 2;
                const rotX = ((y - cy) / cy) * -6;
                const rotY = ((x - cx) / cx) * 6;
                card.style.transform = `perspective(800px) rotateX(${rotX}deg) rotateY(${rotY}deg) translateY(-8px)`;
            });

            card.addEventListener('mouseleave', function () {
                card.style.transform = '';
            });
        });
    }

    // Expose utility globally
    window.TapstickPop = {
        burst: createConfetti
    };
})();
