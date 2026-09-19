<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="STICK IT UP - India's #1 Sticker Brand. 5000+ waterproof vinyl stickers for laptops, bikes, bottles & more.">
    <title>@yield('title', 'Buy Stickers Online India - 5000+ Designs | STICK IT UP')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;700;800;900&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <!-- 1. TOP ANNOUNCEMENT BAR WITH LIVE COUNTDOWN -->
    <div class="announcement-bar">
        <span>Sale Ends In :</span>
        <div class="timer-wrap">
            <span class="timer-box" id="timer-days">01</span> <span class="timer-label">Days :</span>
            <span class="timer-box" id="timer-hours">09</span> <span class="timer-label">Hours :</span>
            <span class="timer-box" id="timer-mins">39</span> <span class="timer-label">Mins :</span>
            <span class="timer-box" id="timer-secs">37</span> <span class="timer-label">Secs</span>
        </div>
    </div>

    <!-- 2. STICK IT UP BLACK HEADER -->
    <header class="site-header">
        <div class="container header-inner">
            <div class="brand-wrap">
                <a href="{{ route('home') }}" class="brand-link" style="display:flex;align-items:center;gap:8px;">
                    <img src="{{ asset('images/logo.png') }}" alt="Stick It Up" class="brand-logo" onerror="this.style.display='none';document.getElementById('fallback-brand').style.display='block';">
                    <span id="fallback-brand" class="brand-text" style="display:none;">STICK<span>ITUP</span></span>
                </a>
            </div>

            <nav class="main-nav">
                <a href="{{ route('home') }}#shop" class="nav-item">Stickers &amp; Skins ▾</a>
                <a href="{{ route('home') }}#new-collection" class="nav-item">Find Your Vibe</a>
                <a href="{{ route('home') }}#shop" class="nav-item">Clothing ▾</a>
                <a href="{{ route('home') }}#shop" class="nav-item highlight">Mystery Box</a>
                <a href="{{ route('home') }}#why" class="nav-item">Custom Stickers</a>
                <a href="{{ route('home') }}#author" class="nav-item">Our Story</a>
                <a href="{{ route('home') }}#reviews" class="nav-item">Reviews</a>
            </nav>

            <div class="header-actions">
                <div class="customer-support-pill">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <div>
                        <span style="font-size:0.7rem;display:block;color:#94a3b8;">Customer support</span>
                        <a href="mailto:wecare@stickitup.xyz" style="color:#ffffff;">wecare@stickitup.xyz</a>
                    </div>
                </div>

                <a href="{{ route('home') }}#shop" class="action-icon-btn" aria-label="Search">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </a>

                <a href="{{ route('admin.dashboard') }}" class="action-icon-btn" aria-label="Account">
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
                    <span>Subtotal: <strong class="cart-subtotal-text">Rs. {{ number_format($headerCartSubtotal ?? 0, 2) }}</strong></span>
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

    <!-- 8. FOOTER -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <img src="{{ asset('images/logo.png') }}" alt="Stick It Up" style="height:48px;margin-bottom:16px;">
                    <p style="color:#94a3b8;font-size:0.9rem;line-height:1.6;max-width:320px;">
                        India's #1 online sticker brand. 5000+ waterproof vinyl stickers for laptops, bikes, bottles &amp; more.
                    </p>
                    <div style="display:flex;gap:12px;margin-top:16px;">
                        <span style="display:inline-block;padding:6px 12px;background:#18181b;border-radius:6px;font-size:0.8rem;color:#facc15;font-weight:700;">★ 4.7/5 Rating</span>
                        <span style="display:inline-block;padding:6px 12px;background:#18181b;border-radius:6px;font-size:0.8rem;color:#e2e8f0;font-weight:700;">10 Lakh+ Customers</span>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Collections</h4>
                    <ul>
                        <li><a href="{{ route('home') }}#shop">Bestseller Stickers</a></li>
                        <li><a href="{{ route('home') }}#shop">Laptop Stickers</a></li>
                        <li><a href="{{ route('home') }}#shop">Bumper Stickers</a></li>
                        <li><a href="{{ route('home') }}#shop">Anime &amp; Gaming</a></li>
                        <li><a href="{{ route('home') }}#shop">Mystery Boxes</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Customer Care</h4>
                    <ul>
                        <li><a href="mailto:wecare@stickitup.xyz">wecare@stickitup.xyz</a></li>
                        <li><a href="{{ route('home') }}#why">Shipping Policy (48 hrs)</a></li>
                        <li><a href="{{ route('home') }}#why">Quality Guarantee</a></li>
                        <li><a href="{{ route('cart.index') }}">My Cart</a></li>
                        <li><a href="{{ route('admin.dashboard') }}">Admin Login</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Get 10% Off</h4>
                    <p style="color:#94a3b8;font-size:0.88rem;">Subscribe for weekly secret drops &amp; discount codes.</p>
                    <form class="newsletter-form" onsubmit="event.preventDefault();alert('Thank you for subscribing!');">
                        <input type="email" placeholder="Your email address" class="newsletter-input" required>
                        <button type="submit" class="newsletter-btn">Join</button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© {{ date('Y') }} STICK IT UP. Proudly Designed &amp; Made in India.</p>
                <div style="display:flex;gap:16px;font-weight:600;font-size:0.8rem;">
                    <span>⚡ UPI / QR Accepted</span>
                    <span>💳 Credit &amp; Debit Cards</span>
                    <span>💵 Cash on Delivery</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- LIVE COUNTDOWN TIMER JAVASCRIPT -->
    <script>
        (function() {
            // Target date: 1 day, 9 hours, 39 mins, 37 secs from now
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
