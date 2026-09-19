<!-- LANDING PAGE LEAD CAPTURE POPUP MODAL -->
<div class="lead-modal-backdrop" id="lead-modal" aria-hidden="true" role="dialog" aria-modal="true">
    <div class="lead-modal-card">
        <button type="button" class="btn-close-lead-modal" id="lead-modal-close" aria-label="Close modal">&times;</button>
        
        <!-- INITIAL FORM VIEW -->
        <div id="lead-form-state">
            <div class="lead-modal-badge">✦ Tapstick Club Perks</div>
            <h3 class="lead-modal-title">Get 10% Off Your First Drop</h3>
            <p class="lead-modal-subtitle">
                Join 25,000+ sticker heads. Enter your mobile &amp; email below to claim your instant 10% coupon code.
            </p>

            <!-- NORMAL FORM -->
            <form id="lead-capture-form" action="{{ route('lead.capture') }}" method="POST">
                @csrf
                <input type="hidden" name="auth_provider" value="web_form">

                <div class="lead-input-group">
                    <label for="lead_name">Your Name *</label>
                    <input type="text" id="lead_name" name="name" placeholder="e.g. Rohan Sharma" required autocomplete="name">
                </div>

                <div class="lead-input-group">
                    <label for="lead_phone">Mobile Number (WhatsApp) *</label>
                    <div class="phone-input-wrap">
                        <span class="phone-prefix">+91</span>
                        <input type="tel" id="lead_phone" name="phone" placeholder="98765 43210" maxlength="10" pattern="[0-9]{10}" required autocomplete="tel">
                    </div>
                </div>

                <div class="lead-input-group">
                    <label for="lead_email">Email Address *</label>
                    <input type="email" id="lead_email" name="email" placeholder="rohan@example.com" required autocomplete="email">
                </div>

                <button type="submit" class="btn btn-primary lead-btn-submit" id="lead-submit-btn">
                    <span>⚡ Claim 10% Off Now</span>
                </button>
            </form>

            <div class="lead-modal-footer-tip">
                🔒 We respect your privacy. No spam ever, only fresh drops &amp; discount alerts.
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

    window.openLeadModal = openModal;
    window.closeLeadModal = closeModal;

    const bottomBarVip = document.getElementById('bottom-bar-vip-btn');
    if (bottomBarVip) {
        bottomBarVip.addEventListener('click', function(e) {
            e.preventDefault();
            openModal();
        });
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
            const name = nameInput?.value.trim();
            const phone = phoneInput?.value.trim();
            const email = emailInput?.value.trim();

            if (!name) {
                alert('Please enter your name.');
                nameInput?.focus();
                return;
            }

            if (!phone || phone.length < 10) {
                alert('Please enter a valid 10-digit mobile number.');
                phoneInput?.focus();
                return;
            }

            if (!email) {
                alert('Please enter your email address.');
                emailInput?.focus();
                return;
            }

            submitLead({
                name: name,
                phone: phone,
                email: email,
                auth_provider: 'web_form'
            });
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
