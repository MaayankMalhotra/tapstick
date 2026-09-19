<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="TabStick - India's freshest sticker brand. 5000+ waterproof vinyl stickers for laptops, bikes, bottles & cars.">
    <title>@yield('title', 'TabStick | Express Your Story — Premium Vinyl Stickers & Skins')</title>
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
            <span>Sale Ends In :</span>
            <div class="timer-wrap">
                <span class="timer-box" id="timer-days">01</span> <span class="timer-label">Days :</span>
                <span class="timer-box" id="timer-hours">09</span> <span class="timer-label">Hours :</span>
                <span class="timer-box" id="timer-mins">39</span> <span class="timer-label">Mins :</span>
                <span class="timer-box" id="timer-secs">37</span> <span class="timer-label">Secs</span>
            </div>
            <span class="announcement-perk">• FREE SHIPPING OVER ₹499</span>
        </div>
    </div>

    <!-- 2. TABSTICK OBSIDIAN HEADER -->
    <header class="site-header">
        <div class="container header-inner">
            <div class="brand-wrap">
                <a href="{{ route('home') }}" class="brand-link" aria-label="TabStick Home">
                    <div class="brand-logo-badge">
                        <svg width="28" height="28" viewBox="0 0 32 32" fill="none">
                            <rect x="2" y="2" width="28" height="28" rx="8" fill="#fafe21" />
                            <path d="M7 9H25M7 16H20M7 23H15" stroke="#000000" stroke-width="3.5" stroke-linecap="round" />
                            <circle cx="23" cy="21" r="4" fill="#000000" />
                            <path d="M23 19V23M21 21H25" stroke="#fafe21" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </div>
                    <div class="brand-text-lockup">
                        <span class="brand-main">TAB<span class="brand-accent">STICK</span></span>
                        <span class="brand-sub">STUDIO</span>
                    </div>
                </a>
            </div>

            <nav class="main-nav">
                <a href="{{ route('home') }}#shop" class="nav-item">Stickers &amp; Decals ▾</a>
                <a href="{{ route('home') }}#new-collection" class="nav-item">Collections</a>
                <a href="{{ route('home') }}#shop" class="nav-item highlight">Mystery Packs</a>
                <a href="{{ route('home') }}#why" class="nav-item">Why TabStick</a>
                <a href="{{ route('home') }}#author" class="nav-item">Our Story</a>
                <a href="{{ route('home') }}#why" class="nav-item">Custom Orders</a>
            </nav>

            <div class="header-actions">
                <div class="customer-support-pill">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <div>
                        <span style="font-size:0.7rem;display:block;color:#94a3b8;">Help &amp; Orders</span>
                        <a href="mailto:hello@tabstick.in" style="color:#ffffff;">hello@tabstick.in</a>
                    </div>
                </div>

                <a href="{{ route('home') }}#shop" class="action-icon-btn" aria-label="Search Catalog">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </a>

                <a href="{{ route('admin.dashboard') }}" class="action-icon-btn" aria-label="Account / Admin">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </a>

                <a href="{{ route('cart.index') }}" class="header-cart-pill">
                    <div class="cart-icon-wrap">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color:var(--color-accent-yellow);">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span class="cart-badge-count">{{ $headerCartCount ?? 0 }}</span>
                    </div>
                    <span>Cart: <strong class="cart-subtotal-text">Rs. {{ number_format($headerCartSubtotal ?? 0, 2) }}</strong></span>
                </a>
            </div>
        </div>
    </header>

    @if(session('success'))
        <div class="container"><div class="alert success">{{ session('success') }}</div></div>
    @endif
    @if(session('error'))
        <div class="container"><div class="alert error">{{ session('error') }}</div></div>
    @endif
    @if($errors->any())
        <div class="container"><div class="alert error"><strong>Please fix:</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div></div>
    @endif

    <main>
        @yield('content')
    </main>

    <!-- 8. TABSTICK FOOTER -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <div class="brand-wrap" style="margin-bottom:16px;">
                        <div class="brand-logo-badge">
                            <svg width="26" height="26" viewBox="0 0 32 32" fill="none">
                                <rect x="2" y="2" width="28" height="28" rx="8" fill="#fafe21" />
                                <path d="M7 9H25M7 16H20M7 23H15" stroke="#000000" stroke-width="3.5" stroke-linecap="round" />
                                <circle cx="23" cy="21" r="4" fill="#000000" />
                                <path d="M23 19V23M21 21H25" stroke="#fafe21" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                        <span class="brand-main" style="color:#ffffff;">TAB<span class="brand-accent">STICK</span></span>
                    </div>
                    <p style="color:#94a3b8;font-size:0.9rem;line-height:1.6;max-width:320px;">
                        India's creative sticker studio. 5000+ waterproof die-cut vinyl stickers built for laptops, bottles, bikes, and everyday carry.
                    </p>
                    <div style="display:flex;gap:12px;margin-top:16px;">
                        <span style="display:inline-block;padding:6px 12px;background:#18181b;border-radius:6px;font-size:0.8rem;color:#facc15;font-weight:700;">★ 4.8/5 Verified</span>
                        <span style="display:inline-block;padding:6px 12px;background:#18181b;border-radius:6px;font-size:0.8rem;color:#e2e8f0;font-weight:700;">10 Lakh+ Delivered</span>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Collections</h4>
                    <ul>
                        <li><a href="{{ route('home') }}#shop">Bestseller Stickers</a></li>
                        <li><a href="{{ route('home') }}#shop">Laptop Decals</a></li>
                        <li><a href="{{ route('home') }}#shop">Bumper &amp; Moto Stickers</a></li>
                        <li><a href="{{ route('home') }}#shop">Anime &amp; Gaming</a></li>
                        <li><a href="{{ route('home') }}#shop">Curated Mystery Boxes</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Customer Care</h4>
                    <ul>
                        <li><a href="mailto:hello@tabstick.in">hello@tabstick.in</a></li>
                        <li><a href="{{ route('home') }}#why">48-Hour Dispatch Policy</a></li>
                        <li><a href="{{ route('home') }}#why">Waterproof Guarantee</a></li>
                        <li><a href="{{ route('cart.index') }}">Review Cart</a></li>
                        <li><a href="{{ route('admin.dashboard') }}">Staff Admin Portal</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Get 10% Off First Drop</h4>
                    <p style="color:#94a3b8;font-size:0.88rem;">Subscribe for weekly secret sticker drops &amp; members-only discounts.</p>
                    <form class="newsletter-form" onsubmit="event.preventDefault();alert('Welcome to the TabStick family!');">
                        <input type="email" placeholder="Enter your email" class="newsletter-input" required>
                        <button type="submit" class="newsletter-btn">Join</button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© {{ date('Y') }} TABSTICK. All rights reserved. Designed &amp; Crafted in India.</p>
                <div style="display:flex;gap:16px;font-weight:600;font-size:0.8rem;">
                    <span>⚡ Instant UPI / QR</span>
                    <span>💳 Cards &amp; NetBanking</span>
                    <span>💵 Cash on Delivery</span>
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
    @stack('scripts')
</body>
</html>
