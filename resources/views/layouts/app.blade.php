<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Tapstick - India's freshest pop sticker brand. 5000+ waterproof vinyl stickers for laptops, bikes, bottles & cars.">
    <title>@yield('title', 'Tapstick | Express Your Story — Premium Vinyl Stickers & Skins')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;700;800;900&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <!-- 1. TOP ANNOUNCEMENT BAR WITH LIVE COUNTDOWN -->
    <div class="announcement-bar">
        <div class="announcement-content">
            <span class="announcement-tag">🔥 DROP SALE</span>
            <span class="announcement-text-hide-mobile">Limited Release Ends In:</span>
            <div class="timer-wrap">
                <span class="timer-box" id="timer-days">01</span> <span class="timer-label">D</span>
                <span class="timer-box" id="timer-hours">09</span> <span class="timer-label">H</span>
                <span class="timer-box" id="timer-mins">39</span> <span class="timer-label">M</span>
                <span class="timer-box" id="timer-secs">37</span> <span class="timer-label">S</span>
            </div>
            <span class="announcement-perk">• FREE SHIPPING OVER ₹499 • 100% WATERPROOF</span>
        </div>
    </div>

    <!-- 2. TAPSTICK PLAYFUL POP HEADER -->
    <header class="site-header">
        <div class="container header-inner">
            <div class="brand-wrap">
                <a href="{{ route('home') }}" class="brand-link" aria-label="Tapstick Home">
                    <div class="brand-logo-badge">
                        <svg width="28" height="28" viewBox="0 0 32 32" fill="none">
                            <rect x="2" y="2" width="28" height="28" rx="8" fill="#FFE600" stroke="#18181B" stroke-width="2"/>
                            <path d="M7 10H25M7 16H21M7 22H15" stroke="#18181B" stroke-width="3" stroke-linecap="round"/>
                            <circle cx="23" cy="21" r="3.5" fill="#FF334B" stroke="#18181B" stroke-width="1.5"/>
                            <path d="M23 19V23M21 21H25" stroke="#FFFFFF" stroke-width="1.2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="brand-text-lockup">
                        <span class="brand-main">TAP<span class="brand-accent">STICK</span></span>
                        <span class="brand-sub">STUDIO ✦</span>
                    </div>
                </a>
            </div>

            <nav class="main-nav">
                <a href="{{ route('home') }}#shop" class="nav-item">Stickers &amp; Decals</a>
                <a href="{{ route('home') }}#shop" class="nav-item highlight">Mystery Packs</a>
                <a href="{{ route('home') }}#club" class="nav-item club-pill">Tapstick Club ✦</a>
                <a href="{{ route('home') }}#why" class="nav-item">Why Tapstick</a>
                <a href="{{ route('home') }}#author" class="nav-item">Our Story</a>
            </nav>

            <div class="header-actions">
                <div class="customer-support-pill">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <div>
                        <span style="font-size:0.68rem;display:block;color:#64748b;font-weight:700;">Help / WhatsApp</span>
                        <a href="mailto:hello@tapstick.in" style="color:#0f172a;font-weight:700;">hello@tapstick.in</a>
                    </div>
                </div>

                <a href="{{ route('home') }}#shop" class="action-icon-btn" aria-label="Search Catalog" title="Search Stickers">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </a>

                <a href="{{ route('admin.dashboard') }}" class="action-icon-btn" aria-label="Account / Admin" title="Staff Dashboard">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </a>

                <a href="{{ route('cart.index') }}" class="header-cart-pill" aria-label="View Cart">
                    <div class="cart-icon-wrap">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span class="cart-badge-count">{{ $headerCartCount ?? 0 }}</span>
                    </div>
                    <span class="cart-pill-text">Cart: <strong class="cart-subtotal-text">Rs. {{ number_format($headerCartSubtotal ?? 0, 2) }}</strong></span>
                </a>
            </div>
        </div>

        <!-- Mobile Horizontal Navigation Bar -->
        <div class="mobile-nav-scroller">
            <div class="mobile-nav-inner">
                <a href="{{ route('home') }}#shop" class="mobile-nav-chip active">All Stickers</a>
                <a href="{{ route('home') }}#shop" class="mobile-nav-chip">Memes</a>
                <a href="{{ route('home') }}#shop" class="mobile-nav-chip">Mystery Packs</a>
                <a href="{{ route('home') }}#club" class="mobile-nav-chip highlight">Tapstick Club ✦</a>
                <a href="{{ route('home') }}#why" class="mobile-nav-chip">Why Us</a>
                <a href="{{ route('home') }}#author" class="mobile-nav-chip">Story</a>
            </div>
        </div>
    </header>

    @if(session('success'))
        <div class="container"><div class="alert success">{{ session('success') }}</div></div>
    @endif
    @if(session('error'))
        <div class="container"><div class="alert error">{{ session('error') }}</div></div>
    @endif
    @if(isset($errors) && $errors->any())
        <div class="container"><div class="alert error"><strong>Please fix:</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div></div>
    @endif

    <main>
        @yield('content')
    </main>

    <!-- 8. PLAYFUL POP FOOTER -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <div class="brand-wrap" style="margin-bottom:16px;">
                        <div class="brand-logo-badge">
                            <svg width="26" height="26" viewBox="0 0 32 32" fill="none">
                                <rect x="2" y="2" width="28" height="28" rx="8" fill="#FFE600" stroke="#18181B" stroke-width="2"/>
                                <path d="M7 10H25M7 16H21M7 22H15" stroke="#18181B" stroke-width="3" stroke-linecap="round"/>
                                <circle cx="23" cy="21" r="3.5" fill="#FF334B" stroke="#18181B" stroke-width="1.5"/>
                            </svg>
                        </div>
                        <span class="brand-main" style="color:#0f172a;">TAP<span class="brand-accent">STICK</span></span>
                    </div>
                    <p style="color:#475569;font-size:0.92rem;line-height:1.6;max-width:320px;">
                        India's creative sticker studio. 5000+ waterproof die-cut vinyl stickers built for laptops, bottles, bikes, and everyday carry.
                    </p>
                    <div class="footer-badges-row">
                        <span class="badge-pill badge-yellow">★ 4.8/5 Verified</span>
                        <span class="badge-pill badge-blue">10 Lakh+ Delivered</span>
                        <span class="badge-pill badge-red">100% Vinyl</span>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Collections</h4>
                    <ul>
                        <li><a href="{{ route('home') }}#shop">Bestseller Stickers</a></li>
                        <li><a href="{{ route('home') }}#shop">Laptop &amp; Mac Decals</a></li>
                        <li><a href="{{ route('home') }}#shop">Bumper &amp; Moto Stickers</a></li>
                        <li><a href="{{ route('home') }}#shop">Anime &amp; Gaming</a></li>
                        <li><a href="{{ route('home') }}#shop">Curated Mystery Boxes</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Customer Care</h4>
                    <ul>
                        <li><a href="mailto:hello@tapstick.in">hello@tapstick.in</a></li>
                        <li><a href="{{ route('home') }}#why">48-Hour Dispatch Guarantee</a></li>
                        <li><a href="{{ route('home') }}#why">100% Waterproof Guarantee</a></li>
                        <li><a href="{{ route('cart.index') }}">Review Cart</a></li>
                        <li><a href="{{ route('admin.dashboard') }}">Staff Admin Portal</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Get 10% Off First Drop</h4>
                    <p style="color:#475569;font-size:0.88rem;">Subscribe to the Tapstick Club for weekly secret drops &amp; members-only perks.</p>
                    <form class="newsletter-form" onsubmit="event.preventDefault(); const inp = this.querySelector('input'); if(inp && inp.value){ const mInp = document.getElementById('lead_email'); if(mInp){ mInp.value = inp.value; } } document.getElementById('floating-lead-trigger')?.click();">
                        <input type="email" placeholder="Enter your email" class="newsletter-input" required>
                        <button type="submit" class="newsletter-btn">Join Club</button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© {{ date('Y') }} TAPSTICK. All rights reserved. Designed &amp; Crafted with ❤️ in India.</p>
                <div class="footer-payment-pills">
                    <span class="payment-pill">⚡ UPI / QR</span>
                    <span class="payment-pill">💳 Cards</span>
                    <span class="payment-pill">💵 Cash on Delivery</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- LIVE COUNTDOWN TIMER JAVASCRIPT -->
    <script>
        (function() {
            let totalSeconds = (1 * 86400) + (9 * 3600) + (39 * 60) + 37;
            function updateTimer() {
                if (totalSeconds <= 0) totalSeconds = 86400 * 2;
                const d = Math.floor(totalSeconds / 86400);
                const h = Math.floor((totalSeconds % 86400) / 3600);
                const m = Math.floor((totalSeconds % 3600) / 60);
                const s = totalSeconds % 60;
                
                const elD = document.getElementById('timer-days');
                const elH = document.getElementById('timer-hours');
                const elM = document.getElementById('timer-mins');
                const elS = document.getElementById('timer-secs');

                if (elD) elD.textContent = String(d).padStart(2, '0');
                if (elH) elH.textContent = String(h).padStart(2, '0');
                if (elM) elM.textContent = String(m).padStart(2, '0');
                if (elS) elS.textContent = String(s).padStart(2, '0');
                totalSeconds--;
            }
            setInterval(updateTimer, 1000);
            updateTimer();
        })();
    </script>
    <!-- LANDING PAGE LEAD / GOOGLE AUTH POPUP MODAL -->
    @include('partials.lead-modal')

    @stack('scripts')
</body>
</html>
