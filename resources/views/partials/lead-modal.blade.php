<!-- LANDING PAGE LEAD CAPTURE & GOOGLE AUTH POPUP MODAL -->
<div class="lead-modal-backdrop" id="lead-modal" aria-hidden="true" role="dialog" aria-modal="true">
    <div class="lead-modal-card">
        <button type="button" class="btn-close-lead-modal" id="lead-modal-close" aria-label="Close modal">&times;</button>
        
        <!-- INITIAL FORM VIEW -->
        <div id="lead-form-state">
            <div class="lead-modal-badge">✦ Tapstick Club Perks</div>
            <h3 class="lead-modal-title">Get 10% Off Your First Drop</h3>
            <p class="lead-modal-subtitle">
                Join 25,000+ sticker heads. Claim your instant 10% coupon code &amp; get early access to secret drops.
            </p>

            <!-- 1. GOOGLE AUTH OPTION -->
            <button type="button" class="btn-google-auth" id="btn-google-auth">
                <svg width="20" height="20" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                </svg>
                <span>Continue with Google</span>
            </button>

            <!-- 2. DIVIDER -->
            <div class="lead-modal-divider">
                <span>OR USE MOBILE &amp; GOOGLE MAIL</span>
            </div>

            <!-- 3. QUICK FORM -->
            <form id="lead-capture-form" action="{{ route('lead.capture') }}" method="POST">
                @csrf
                <div class="lead-input-group">
                    <label for="lead_email">Google Mail (Gmail) *</label>
                    <input type="email" id="lead_email" name="email" placeholder="alex@gmail.com" required autocomplete="email">
                </div>

                <div class="lead-input-group">
                    <label for="lead_phone">Mobile Number (WhatsApp) *</label>
                    <div class="phone-input-wrap">
                        <span class="phone-prefix">+91</span>
                        <input type="tel" id="lead_phone" name="phone" placeholder="98765 43210" maxlength="12" required autocomplete="tel">
                    </div>
                </div>

                <div class="lead-input-group">
                    <label for="lead_name">Your Name (Optional)</label>
                    <input type="text" id="lead_name" name="name" placeholder="e.g. Rohit" autocomplete="name">
                </div>

                <button type="submit" class="btn btn-primary lead-btn-submit" id="lead-submit-btn">
                    <span>⚡ Claim 10% Off Now</span>
                </button>
            </form>

            <div class="lead-modal-footer-tip">
                🔒 We respect your privacy. No spam ever, only fresh drops &amp; offers.
            </div>
        </div>

        <!-- SUCCESS STATE -->
        <div id="lead-success-state" style="display: none; text-align: center;">
            <div class="celebration-badge">🎉</div>
            <div class="lead-modal-badge" style="background:#86EFAC;">✦ Welcome to the Club</div>
            <h3 class="lead-modal-title" style="margin-bottom: 8px;">YOU'RE ON THE VIP LIST!</h3>
            <p class="lead-modal-subtitle" style="margin-bottom: 16px;">
                Use this discount coupon code at checkout for an instant 10% OFF:
            </p>

            <div class="coupon-box" id="coupon-box-copy" title="Click to copy discount code">
                <span class="coupon-code">TAPSTICK10</span>
                <span class="coupon-copy-tip" id="coupon-copy-feedback">Click to Copy Code 📋</span>
            </div>

            <p style="font-size: 0.85rem; color: #475569; font-weight: 700; margin-bottom: 20px;">
                ✅ Code pre-saved! Your cart will automatically apply your 10% discount.
            </p>

            <button type="button" class="btn btn-primary" id="btn-lead-start-shopping" style="width: 100%; border-radius: var(--radius-pill); padding: 13px;">
                🚀 Start Exploring Stickers
            </button>
        </div>
    </div>
</div>

<!-- FLOATING TRIGGER BUTTON (Always available so user can reopen anytime) -->
<button type="button" class="floating-lead-trigger" id="floating-lead-trigger" aria-label="Claim 10% Off">
    <span class="floating-gift">🎁</span>
    <span>10% Off &amp; VIP</span>
</button>

<!-- POPUP MODAL JAVASCRIPT LOGIC -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('lead-modal');
    const closeBtn = document.getElementById('lead-modal-close');
    const floatingBtn = document.getElementById('floating-lead-trigger');
    const form = document.getElementById('lead-capture-form');
    const formState = document.getElementById('lead-form-state');
    const successState = document.getElementById('lead-success-state');
    const googleBtn = document.getElementById('btn-google-auth');
    const couponBox = document.getElementById('coupon-box-copy');
    const couponFeedback = document.getElementById('coupon-copy-feedback');
    const startShoppingBtn = document.getElementById('btn-lead-start-shopping');
    const emailInput = document.getElementById('lead_email');
    const phoneInput = document.getElementById('lead_phone');
    const nameInput = document.getElementById('lead_name');
    const submitBtn = document.getElementById('lead-submit-btn');

    function openModal() {
        if (!modal) return;
        modal.classList.add('active');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        if (!modal) return;
        modal.classList.remove('active');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    // Auto-open on landing page after 1.8 seconds if user hasn't already dismissed or joined in this session
    const hasJoined = localStorage.getItem('tapstick_vip_joined') === 'true';
    const hasDismissedSession = sessionStorage.getItem('tapstick_lead_dismissed') === 'true';
    
    if (!hasJoined && !hasDismissedSession) {
        setTimeout(function() {
            if (modal && !modal.classList.contains('active')) {
                openModal();
            }
        }, 1800);
    }

    // Floating Button click opens modal
    if (floatingBtn) {
        floatingBtn.addEventListener('click', function(e) {
            e.preventDefault();
            openModal();
        });
    }

    // Close button click
    if (closeBtn) {
        closeBtn.addEventListener('click', function(e) {
            e.preventDefault();
            sessionStorage.setItem('tapstick_lead_dismissed', 'true');
            closeModal();
        });
    }

    // Backdrop click outside card closes modal
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                sessionStorage.setItem('tapstick_lead_dismissed', 'true');
                closeModal();
            }
        });
    }

    // Escape key closes modal
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal && modal.classList.contains('active')) {
            sessionStorage.setItem('tapstick_lead_dismissed', 'true');
            closeModal();
        }
    });

    // Links with #club or data-open-lead-modal open modal
    document.querySelectorAll('a[href*="#club"], [data-open-lead-modal]').forEach(function(el) {
        el.addEventListener('click', function(e) {
            openModal();
        });
    });

    // Submit handler via AJAX
    function submitLead(data) {
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span>Saving...</span>';
        }

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        fetch("{{ route('lead.capture') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken || '',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify(data)
        })
        .then(function(res) {
            return res.json();
        })
        .then(function(result) {
            if (result.success) {
                localStorage.setItem('tapstick_vip_joined', 'true');
                formState.style.display = 'none';
                successState.style.display = 'block';
                if (floatingBtn) {
                    floatingBtn.innerHTML = '<span class="floating-gift">✅</span><span>VIP Member</span>';
                }
            } else {
                alert(result.message || 'Something went wrong. Please check your email and phone.');
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = '<span>⚡ Claim 10% Off Now</span>';
                }
            }
        })
        .catch(function(err) {
            console.error('Lead capture error:', err);
            form.submit();
        });
    }

    // Form submission
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = emailInput?.value.trim();
            const phone = phoneInput?.value.trim();
            const name = nameInput?.value.trim();

            if (!email) {
                alert('Please enter your Google Mail / Email address.');
                emailInput?.focus();
                return;
            }

            submitLead({
                email: email,
                phone: phone,
                name: name,
                auth_provider: 'mobile_email'
            });
        });
    }

    // Google Auth Button Click
    if (googleBtn) {
        googleBtn.addEventListener('click', function() {
            const currentEmail = emailInput?.value.trim();
            if (currentEmail && currentEmail.includes('@')) {
                submitLead({
                    email: currentEmail,
                    phone: phoneInput?.value.trim() || null,
                    name: nameInput?.value.trim() || 'Google User',
                    auth_provider: 'google'
                });
            } else {
                const userEmail = prompt('Enter your Google / Gmail account:');
                if (userEmail && userEmail.trim().includes('@')) {
                    const userName = userEmail.split('@')[0].replace(/[._-]/g, ' ');
                    submitLead({
                        email: userEmail.trim(),
                        name: userName.charAt(0).toUpperCase() + userName.slice(1),
                        phone: phoneInput?.value.trim() || null,
                        auth_provider: 'google'
                    });
                }
            }
        });
    }

    // Click to copy coupon code
    if (couponBox) {
        couponBox.addEventListener('click', function() {
            navigator.clipboard.writeText('TAPSTICK10').then(function() {
                couponFeedback.textContent = 'COPIED TO CLIPBOARD! 🎉';
                couponFeedback.style.color = '#15803d';
                setTimeout(function() {
                    couponFeedback.textContent = 'Click to Copy Code 📋';
                    couponFeedback.style.color = '';
                }, 3000);
            }).catch(function() {
                couponFeedback.textContent = 'Use Code: TAPSTICK10';
            });
        });
    }

    // Start shopping button inside success state
    if (startShoppingBtn) {
        startShoppingBtn.addEventListener('click', function() {
            closeModal();
            const shopSection = document.getElementById('shop');
            if (shopSection) {
                shopSection.scrollIntoView({ behavior: 'smooth' });
            } else {
                window.location.href = "{{ route('home') }}#shop";
            }
        });
    }
});
</script>
