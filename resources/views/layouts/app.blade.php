<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Tabstick – Creative Laptop, Car & Custom Stickers')</title>
    <meta name="description" content="@yield('meta_description', 'Tabstick creates creative, durable stickers for laptops, cars, phones and college students. Explore unique sticker designs and shop online in India.')">
    <meta name="keywords" content="@yield('meta_keywords', 'Tabstick, Tabstick stickers, Tabstick laptop stickers, Tabstick car stickers, stickers for college students, custom stickers in India, waterproof vinyl decals, aesthetic phone stickers')">
    <meta name="robots" content="@yield('robots', 'index, follow')">
    <link rel="canonical" href="@yield('canonical', url()->current())">
    @if(config('services.google.site_verification'))
    <meta name="google-site-verification" content="{{ config('services.google.site_verification') }}">
    @endif

    <!-- Favicon & Search Engine Icons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('favicon-48x48.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon-192x192.png') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:site_name" content="Tabstick">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:title" content="@yield('title', 'Tabstick – Creative Laptop, Car & Custom Stickers')">
    <meta property="og:description" content="@yield('meta_description', 'Tabstick creates creative, durable stickers for laptops, cars, phones and college students. Explore unique sticker designs and shop online in India.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('images/hero-banner.webp'))">
    <meta property="og:locale" content="en_IN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Tabstick – Creative Laptop, Car & Custom Stickers')">
    <meta name="twitter:description" content="@yield('meta_description', 'Tabstick creates creative, durable stickers for laptops, cars, phones and college students. Explore unique sticker designs and shop online in India.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/hero-banner.webp'))">

    <!-- Organization & Founder Schema (JSON-LD) -->
    @php
    $orgSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'Tabstick',
        'alternateName' => ['Tabstick Stickers', 'Tabstick India', 'Tabstick Store'],
        'legalName' => 'Tabstick',
        'url' => 'https://tabstick.in',
        'logo' => asset('favicon-192x192.png'),
        'image' => asset('images/hero-banner.webp'),
        'description' => 'Tabstick is an Indian sticker brand founded by Mayank Malhotra. We create creative and durable stickers for laptops, cars, phones and college students.',
        'founder' => [
            '@type' => 'Person',
            'name' => 'Mayank Malhotra',
            'alternateName' => 'Maayank Malhotra',
            'jobTitle' => 'Founder',
            'url' => 'https://tabstick.in/maayank',
            'sameAs' => 'https://www.linkedin.com/in/maayank-malhotra-a59a55186/'
        ],
        'sameAs' => [
            'https://www.linkedin.com/in/maayank-malhotra-a59a55186/'
        ],
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'contactType' => 'Customer Support',
            'email' => 'hello@tabstick.in',
            'areaServed' => 'IN',
            'availableLanguage' => ['English', 'Hindi']
        ]
    ];

    $webSiteSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'name' => 'Tabstick',
        'alternateName' => ['Tabstick Stickers', 'Tabstick India', 'Tabstick Store'],
        'url' => 'https://tabstick.in',
        'potentialAction' => [
            '@type' => 'SearchAction',
            'target' => [
                '@type' => 'EntryPoint',
                'urlTemplate' => 'https://tabstick.in/?search={search_term_string}#shop'
            ],
            'query-input' => 'required name=search_term_string'
        ]
    ];
    @endphp
    <script type="application/ld+json">
    {!! json_encode($orgSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <!-- WebSite & SearchAction Schema (JSON-LD) -->
    <script type="application/ld+json">
    {!! json_encode($webSiteSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    @stack('schema')
    @yield('head_scripts')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;700;800;900&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    @if(request()->routeIs('home'))
    <!-- 0. CINEMATIC FULL-SCREEN STICKER PEEL PAGE ENTRANCE (HOMEPAGE ONLY) -->
    <div id="sticker-peel-loader" class="sticker-peel-overlay" aria-hidden="true">
        <div class="peel-loader-center">
            <div class="peel-logo-stamp">
                <div class="peel-stamp-badge">
                    <svg width="40" height="40" viewBox="0 0 32 32" fill="none">
                        <rect x="2" y="2" width="28" height="28" rx="8" fill="#FFE600" stroke="#18181B" stroke-width="2.5"/>
                        <path d="M7 10H25M7 16H21M7 22H15" stroke="#18181B" stroke-width="3.5" stroke-linecap="round"/>
                        <circle cx="23" cy="21" r="3.5" fill="#FF334B" stroke="#18181B" stroke-width="1.5"/>
                    </svg>
                </div>
                <div class="peel-stamp-title">TAB<span>STICK</span></div>
            </div>
            <div class="peel-loading-chip">
                <span id="peel-loader-text">✦ UNBOXING STICKER UNIVERSE ✦</span>
            </div>
            <div class="peel-loading-progress">
                <div class="peel-progress-bar"></div>
            </div>
        </div>
        <div class="peel-corner-curl"></div>
    </div>
    <script>
        // Fail-safe: ensure loader peels away cleanly on landing page even if external JS is delayed
        setTimeout(function() {
            var loader = document.getElementById('sticker-peel-loader');
            if (loader && !loader.classList.contains('peeling') && !loader.classList.contains('done')) {
                loader.classList.add('peeling');
                setTimeout(function() { loader.classList.add('done'); }, 550);
            }
        }, 1800);
    </script>
    @endif

    <!-- TOP ANNOUNCEMENT BAR: MINIMUM ORDER, SHIPPING & FOUNDER CONNECT -->
    <div class="top-announcement-bar">
        <div class="top-announcement-inner">
            <span class="top-announcement-item">⚡ <strong>MINIMUM ORDER ₹100</strong> (Mix &amp; match any vinyl decals)</span>
            <span class="top-announcement-bullet">•</span>
            <span class="top-announcement-item">🚚 <strong>FREE SHIPPING</strong> on orders ₹499+</span>
            <span class="top-announcement-bullet hide-on-mobile">•</span>
            <span class="top-announcement-item hide-on-mobile">🔥 100% Waterproof Vinyl</span>
            <span class="top-announcement-bullet">•</span>
            <a href="{{ url('/maayank') }}" class="top-founder-btn" aria-label="Connect directly with the founder">
                <span class="top-founder-pulse"></span>
                <span>Connect directly with the founder</span>
                <span class="top-founder-arrow">↗</span>
            </a>
        </div>
    </div>

    <!-- 2. TABSTICK PLAYFUL POP HEADER -->
    <header class="site-header">
        <div class="container header-inner">
            <div class="brand-wrap">
                <a href="{{ route('home') }}" class="brand-link" aria-label="Tabstick Home">
                    <div class="brand-logo-badge">
                        <svg width="28" height="28" viewBox="0 0 32 32" fill="none">
                            <rect x="2" y="2" width="28" height="28" rx="8" fill="#FFE600" stroke="#18181B" stroke-width="2"/>
                            <path d="M7 10H25M7 16H21M7 22H15" stroke="#18181B" stroke-width="3" stroke-linecap="round"/>
                            <circle cx="23" cy="21" r="3.5" fill="#FF334B" stroke="#18181B" stroke-width="1.5"/>
                            <path d="M23 19V23M21 21H25" stroke="#FFFFFF" stroke-width="1.2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="brand-text-lockup">
                        <span class="brand-main">TAB<span class="brand-accent">STICK</span></span>
                        <span class="brand-sub">STUDIO ✦</span>
                    </div>
                </a>
            </div>

            <nav class="main-nav">
                <a href="{{ route('category.index') }}" class="nav-item">Collections ⚡</a>
                <a href="{{ route('home') }}#shop" class="nav-item">All Stickers</a>
                <a href="{{ route('home') }}#why" class="nav-item">Why We Stick</a>
                <a href="{{ route('home') }}#club" class="nav-item club-pill">The Club ✦</a>
                <a href="{{ route('home') }}#reviews" class="nav-item">Reviews</a>
                <a href="{{ route('home') }}#author" class="nav-item">Our Story</a>
                <a href="{{ url('/maayank') }}" class="founder-nav-item" title="Connect directly with the founder Maayank Malhotra">
                    <span class="top-founder-pulse" style="width:6px;height:6px;"></span>
                    <span>Founder ↗</span>
                </a>
            </nav>

            <div class="header-actions">
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

                <!-- Mobile Menu Button -->
                <button type="button" class="mobile-menu-burger-btn" id="btn-open-mobile-menu" aria-label="Open Mobile Menu">
                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Horizontal Navigation Bar -->
        <div class="mobile-nav-scroller">
            <div class="mobile-nav-inner">
                <a href="{{ route('home') }}#shop" class="mobile-nav-chip active">All Drops</a>
                <a href="{{ route('home') }}#why" class="mobile-nav-chip">Why Us</a>
                <a href="{{ route('home') }}#club" class="mobile-nav-chip highlight">Tabstick Club ✦</a>
                <a href="{{ route('home') }}#reviews" class="mobile-nav-chip">Reviews</a>
                <a href="{{ route('home') }}#author" class="mobile-nav-chip">Our Story</a>
                <a href="{{ url('/maayank') }}" class="mobile-nav-chip" style="background:var(--color-ink);color:#FFE600;font-weight:900;">👨‍💻 Founder ↗</a>
            </div>
        </div>
    </header>

    <!-- MOBILE FULL-SCREEN STICKER MENU DRAWER -->
    <div id="mobile-sticker-drawer" class="mobile-sticker-drawer" aria-hidden="true">
        <div class="mobile-drawer-header">
            <div class="brand-link">
                <div class="brand-logo-badge">
                    <svg width="24" height="24" viewBox="0 0 32 32" fill="none">
                        <rect x="2" y="2" width="28" height="28" rx="8" fill="#FFE600" stroke="#18181B" stroke-width="2"/>
                        <path d="M7 10H25M7 16H21M7 22H15" stroke="#18181B" stroke-width="3" stroke-linecap="round"/>
                        <circle cx="23" cy="21" r="3.5" fill="#FF334B" stroke="#18181B" stroke-width="1.5"/>
                    </svg>
                </div>
                <span class="brand-main">TAB<span class="brand-accent">STICK</span></span>
            </div>
            <button type="button" class="btn-close-mobile-drawer" id="btn-close-mobile-menu" aria-label="Close menu">&times;</button>
        </div>
        <div class="mobile-drawer-links">
            <a href="{{ url('/maayank') }}" class="mobile-drawer-card" style="background:#FFE600;border:2px solid var(--color-ink);margin-bottom:8px;">
                <span class="drawer-card-emoji">👨‍💻</span>
                <div>
                    <strong>Connect directly with the founder</strong>
                    <small>Maayank Malhotra • Portfolio &amp; Direct Desk</small>
                </div>
                <span class="drawer-arrow">➔</span>
            </a>
            <a href="{{ route('category.index') }}" class="mobile-drawer-card card-yellow">
                <span class="drawer-card-emoji">⚡</span>
                <div>
                    <strong>Sticker Collections</strong>
                    <small>Anime, Cars, Laptop, Memes &amp; More</small>
                </div>
                <span class="drawer-arrow">➔</span>
            </a>
            <a href="{{ route('home') }}#shop" class="mobile-drawer-card card-blue">
                <span class="drawer-card-emoji">🛍️</span>
                <div>
                    <strong>Shop The Drop</strong>
                    <small>Explore 5000+ waterproof stickers</small>
                </div>
                <span class="drawer-arrow">➔</span>
            </a>
            <a href="{{ route('home') }}#why" class="mobile-drawer-card card-blue">
                <span class="drawer-card-emoji">🛡️</span>
                <div>
                    <strong>Why We Stick</strong>
                    <small>100% waterproof automotive vinyl</small>
                </div>
                <span class="drawer-arrow">➔</span>
            </a>
            <a href="{{ route('home') }}#club" class="mobile-drawer-card card-pink">
                <span class="drawer-card-emoji">🎁</span>
                <div>
                    <strong>The Tabstick Club</strong>
                    <small>Secret weekly drops &amp; 10% coupon</small>
                </div>
                <span class="drawer-arrow">➔</span>
            </a>
            <a href="{{ route('home') }}#reviews" class="mobile-drawer-card card-green">
                <span class="drawer-card-emoji">⭐</span>
                <div>
                    <strong>Reviews</strong>
                    <small>What 25,000+ sticker heads say</small>
                </div>
                <span class="drawer-arrow">➔</span>
            </a>
            <a href="{{ route('home') }}#gallery" class="mobile-drawer-card card-purple">
                <span class="drawer-card-emoji">📸</span>
                <div>
                    <strong>Seen In The Wild</strong>
                    <small>Streetwear on laptops &amp; bikes</small>
                </div>
                <span class="drawer-arrow">➔</span>
            </a>
            <a href="{{ route('home') }}#author" class="mobile-drawer-card card-red">
                <span class="drawer-card-emoji">✍️</span>
                <div>
                    <strong>Founder Story</strong>
                    <small>Mayank Malhotra's mission</small>
                </div>
                <span class="drawer-arrow">➔</span>
            </a>
        </div>
        <div class="mobile-drawer-footer">
            <button type="button" class="btn-pop-primary" style="width: 100%;" onclick="document.getElementById('floating-lead-trigger')?.click();">
                <span>Claim 10% Off 🎁</span>
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="container"><div class="alert success">{{ session('success') }}</div></div>
    @endif
    @if(session('warning'))
        <div class="container"><div class="alert warning" style="background:#FFF3CD;border:2px solid var(--color-ink);color:#856404;font-weight:700;padding:14px 20px;border-radius:12px;margin:16px auto;box-shadow:3px 3px 0 var(--color-ink);">{{ session('warning') }}</div></div>
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

    <!-- 8. PLAYFUL POP BOLD FOOTER -->
    <footer class="site-footer">
        <div class="footer-marquee-strip">
            <div class="footer-marquee-track">
                <span>✦ PEEL. STICK. STAND OUT. ✦ 100% WATERPROOF VINYL ✦ EASY PEEL BACKING ✦ UV SUNPROOF ✦ 5000+ DESIGNS ✦</span>
                <span>✦ PEEL. STICK. STAND OUT. ✦ 100% WATERPROOF VINYL ✦ EASY PEEL BACKING ✦ UV SUNPROOF ✦ 5000+ DESIGNS ✦</span>
            </div>
        </div>

        <div class="container footer-inner-wrap">
            <div class="footer-hero-statement">
                <div class="footer-floating-stickers-wrap" aria-hidden="true">
                    <span class="footer-float-stk fstk-1">⭐</span>
                    <span class="footer-float-stk fstk-2">🔥</span>
                    <span class="footer-float-stk fstk-3">⚡</span>
                    <span class="footer-float-stk fstk-4">💧</span>
                </div>
                <h2 class="footer-big-brand-title footer-bouncy-title">STICK AROUND.</h2>
                <p class="footer-big-brand-sub">Tabstick is an Indian sticker brand founded by Mayank Malhotra. We create creative and durable stickers for laptops, cars, phones and college students.</p>

                <!-- Final Guarantee Sticker Seal -->
                <div class="footer-seal-stamp" title="100% Authentic Vinyl Seal">
                    <svg width="86" height="86" viewBox="0 0 100 100">
                        <circle cx="50" cy="50" r="46" fill="#FFE600" stroke="#18181B" stroke-width="3" stroke-dasharray="5 3"/>
                        <circle cx="50" cy="50" r="36" fill="#FF334B" stroke="#18181B" stroke-width="2"/>
                        <text x="50" y="44" text-anchor="middle" font-family="sans-serif" font-size="11" font-weight="900" fill="#FFFFFF">100%</text>
                        <text x="50" y="56" text-anchor="middle" font-family="sans-serif" font-size="8" font-weight="900" fill="#FFE600">GENUINE</text>
                        <text x="50" y="67" text-anchor="middle" font-family="sans-serif" font-size="7" font-weight="900" fill="#FFFFFF">VINYL SEAL ✦</text>
                    </svg>
                </div>
            </div>

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
                        <span class="brand-main" style="color:#0f172a;">TAB<span class="brand-accent">STICK</span></span>
                    </div>
                    <p style="color:#475569;font-size:0.92rem;line-height:1.6;max-width:320px;">
                        Tabstick creates creative, durable stickers for laptops, cars, phones and college students. Explore unique sticker designs and shop online in India.
                    </p>
                    <div class="footer-social-links">
                        <a href="[ADD_INSTAGRAM_URL]" target="_blank" rel="noopener" class="social-chip" aria-label="Instagram">
                            <span>📸 Instagram</span>
                        </a>
                        <a href="[ADD_FACEBOOK_URL]" target="_blank" rel="noopener" class="social-chip" aria-label="Facebook">
                            <span>🌐 Facebook</span>
                        </a>
                        <a href="https://www.linkedin.com/in/maayank-malhotra-a59a55186/" target="_blank" rel="noopener me" class="social-chip" aria-label="LinkedIn">
                            <span>💼 LinkedIn</span>
                        </a>
                        <a href="mailto:hello@tabstick.in" class="social-chip" aria-label="Email">
                            <span>✉️ hello@tabstick.in</span>
                        </a>
                    </div>
                </div>

                <div class="footer-col">
                    <h4>Collections</h4>
                    <ul>
                        <li><a href="{{ route('category.index') }}">All Collections Hub</a></li>
                        <li><a href="{{ route('category.show', 'anime') }}">Anime &amp; Manga Decals</a></li>
                        <li><a href="{{ route('category.show', 'cars-bikes') }}">Car &amp; Moto Stickers</a></li>
                        <li><a href="{{ route('category.show', 'memes') }}">Desi Pop &amp; Meme Drops</a></li>
                        <li><a href="{{ route('category.show', 'glitter-holo') }}">Holographic &amp; Glitter</a></li>
                        <li><a href="{{ route('category.show', 'laptop-stickers') }}">Laptop &amp; MacBook Decals</a></li>
                        <li><a href="{{ route('category.show', 'custom-stickers') }}">Custom Stickers in India</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Customer Care</h4>
                    <ul>
                        <li><a href="mailto:hello@tabstick.in">hello@tabstick.in</a></li>
                        <li><a href="{{ route('home') }}#faq">Frequently Asked Questions</a></li>
                        <li><a href="{{ route('home') }}#why">48-Hour Dispatch Guarantee</a></li>
                        <li><a href="{{ route('home') }}#why">100% Waterproof Guarantee</a></li>
                        <li><a href="{{ route('cart.index') }}">Review Your Cart</a></li>
                        <li><a href="{{ route('portfolio') }}">Founder &amp; Engineering (Maayank Malhotra)</a></li>
                        <li><a href="{{ route('admin.dashboard') }}">Staff Admin Portal</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>The Tabstick Promise</h4>
                    <div class="footer-perks-list">
                        <div class="footer-perk-item">
                            <span class="f-perk-icon">💧</span>
                            <div>
                                <strong>100% Waterproof</strong>
                                <small>Rain, snow &amp; dishwasher proof</small>
                            </div>
                        </div>
                        <div class="footer-perk-item">
                            <span class="f-perk-icon">✨</span>
                            <div>
                                <strong>Zero Residue</strong>
                                <small>Clean peel whenever you change</small>
                            </div>
                        </div>
                        <div class="footer-perk-item">
                            <span class="f-perk-icon">🚚</span>
                            <div>
                                <strong>Pan-India Express</strong>
                                <small>Dispatched within 48 hours</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© {{ date('Y') }} TABSTICK. Founded by <a href="{{ route('portfolio') }}" style="color:inherit;font-weight:800;text-decoration:underline;">Maayank Malhotra</a>. Designed &amp; Crafted with ❤️ in India. All stickers 100% waterproof automotive-grade vinyl.</p>
                <div class="footer-payment-pills">
                    <span class="payment-pill">⚡ UPI / QR</span>
                    <span class="payment-pill">💳 Cards &amp; NetBanking</span>
                    <span class="payment-pill">💵 Cash on Delivery</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- MOBILE STICKY BOTTOM APP BAR (NATIVE APP EXPERIENCE) -->
    <nav class="mobile-bottom-bar" aria-label="Mobile Navigation">
        <a href="{{ route('home') }}#shop" class="bottom-bar-item {{ request()->routeIs('home') ? 'active' : '' }}">
            <span class="bottom-bar-icon">🏠</span>
            <span class="bottom-bar-label">Drops</span>
        </a>
        <button type="button" class="bottom-bar-item" id="bottom-bar-search-btn" aria-label="Search">
            <span class="bottom-bar-icon">🔍</span>
            <span class="bottom-bar-label">Search</span>
        </button>
        <button type="button" class="bottom-bar-item vip-pulse-item" id="bottom-bar-vip-btn" aria-label="10% Off VIP Club">
            <span class="bottom-bar-icon-wrap">
                <span class="bottom-bar-icon">🎁</span>
                <span class="bottom-bar-ping"></span>
            </span>
            <span class="bottom-bar-label highlight-label">10% OFF</span>
        </button>
        <a href="{{ route('cart.index') }}" class="bottom-bar-item cart-item {{ request()->routeIs('cart.*') ? 'active' : '' }}">
            <span class="bottom-bar-icon">
                🛍️
                <span class="bottom-bar-badge cart-badge-count">{{ $headerCartCount ?? 0 }}</span>
            </span>
            <span class="bottom-bar-label">Cart</span>
        </a>
        <button type="button" class="bottom-bar-item" id="bottom-bar-menu-btn" aria-label="Menu">
            <span class="bottom-bar-icon">☰</span>
            <span class="bottom-bar-label">Menu</span>
        </button>
    </nav>

    <!-- PLAYFUL POP INTERACTION SCRIPT -->
    <script src="{{ asset('js/playful-pop.js') }}" defer></script>
    <!-- LANDING PAGE LEAD POPUP MODAL -->
    @include('partials.lead-modal')
    <!-- STOREFRONT AI STICKER CHATBOT & STYLIST -->
    @include('partials.sticker-ai-chat')

    @stack('scripts')
</body>
</html>
