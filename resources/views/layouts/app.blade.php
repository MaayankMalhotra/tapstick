<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Tabstick – Anti-Tarnish 18K Gold Plated Fine Jewelry')</title>
    <meta name="description" content="@yield('meta_description', 'Discover anti-tarnish, water-resistant, hypoallergenic 18K gold-plated fine jewelry by Tabstick. Shop rings, necklaces, bracelets, earrings & charms online in India.')">
    <meta name="keywords" content="@yield('meta_keywords', 'Tabstick, Tabstick fine jewelry, 18K gold plated jewelry, anti-tarnish jewelry India, waterproof jewelry, gold rings, everyday luxury jewelry')">
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
    <meta property="og:title" content="@yield('title', 'Tabstick – Anti-Tarnish 18K Gold Plated Fine Jewelry')">
    <meta property="og:description" content="@yield('meta_description', 'Discover anti-tarnish, water-resistant, hypoallergenic 18K gold-plated fine jewelry by Tabstick. Shop rings, necklaces, bracelets, earrings & charms online in India.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('images/hero-banner.webp'))">
    <meta property="og:locale" content="en_IN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Tabstick – Anti-Tarnish 18K Gold Plated Fine Jewelry')">
    <meta name="twitter:description" content="@yield('meta_description', 'Discover anti-tarnish, water-resistant, hypoallergenic 18K gold-plated fine jewelry by Tabstick. Shop rings, necklaces, bracelets, earrings & charms online in India.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/hero-banner.webp'))">

    <!-- Organization & Founder Schema (JSON-LD) -->
    @php
    $orgSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'Tabstick',
        'alternateName' => ['Tabstick Jewelry', 'Tabstick India', 'Tabstick Fine Jewelry'],
        'legalName' => 'Tabstick',
        'url' => 'https://tabstick.in',
        'logo' => asset('favicon-192x192.png'),
        'image' => asset('images/hero-banner.webp'),
        'description' => 'Tabstick is an Indian fine jewelry brand founded by Mayank Malhotra. We create anti-tarnish, water-resistant and hypoallergenic 18K gold-plated jewelry for everyday luxury.',
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
        'alternateName' => ['Tabstick Jewelry', 'Tabstick India', 'Tabstick Fine Jewelry'],
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
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart-drawer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jewelsgalaxy.css') }}">
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
                <span id="peel-loader-text">✦ UNBOXING FINE JEWELRY ✦</span>
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

    <!-- TOP ANNOUNCEMENT BAR: TABSTICK LUXURY PROMISES -->
    <div class="top-announcement-bar">
        <div class="top-announcement-inner">
            <span class="top-announcement-item">✨ <strong>18K REAL GOLD PLATED</strong></span>
            <span class="top-announcement-bullet">•</span>
            <span class="top-announcement-item">💧 <strong>WATER &amp; SWEATPROOF</strong></span>
            <span class="top-announcement-bullet">•</span>
            <span class="top-announcement-item">🛡️ <strong>6-MONTH WARRANTY</strong></span>
            <span class="top-announcement-bullet hide-on-mobile">•</span>
            <span class="top-announcement-item hide-on-mobile">🚚 <strong>FREE SHIPPING</strong> ON ₹499+</span>
            <span class="top-announcement-bullet">•</span>
            <a href="{{ url('/maayank') }}" class="top-founder-btn" aria-label="Connect with Founder">
                <span class="top-founder-pulse"></span>
                <span>Founder's Desk</span>
                <span class="top-founder-arrow">↗</span>
            </a>
        </div>
    </div>

    <!-- 2. TABSTICK LUXURY HEADER -->
    <header class="site-header">
        <div class="container header-inner">
            <div class="brand-wrap">
                <a href="{{ route('home') }}" class="brand-link" aria-label="Tabstick Fine Jewelry Home">
                    <div class="brand-logo-badge jg-header-logo-badge" title="Tabstick 18K Fine Jewelry">
                        <svg width="34" height="34" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="tsGoldRimHdr" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#FCEABB" />
                                    <stop offset="35%" stop-color="#D4AF37" />
                                    <stop offset="70%" stop-color="#C5A059" />
                                    <stop offset="100%" stop-color="#8C6623" />
                                </linearGradient>
                                <linearGradient id="tsGoldCoreHdr" x1="0%" y1="100%" x2="100%" y2="0%">
                                    <stop offset="0%" stop-color="#C5A059" />
                                    <stop offset="40%" stop-color="#FFF5D6" />
                                    <stop offset="70%" stop-color="#E5C478" />
                                    <stop offset="100%" stop-color="#9C7728" />
                                </linearGradient>
                                <radialGradient id="tsGemGlowHdr" cx="50%" cy="50%" r="50%">
                                    <stop offset="0%" stop-color="#2D2214" />
                                    <stop offset="100%" stop-color="#120F0C" />
                                </radialGradient>
                            </defs>
                            <polygon points="16,3 38,3 51,16 51,38 38,51 16,51 3,38 3,16" fill="url(#tsGemGlowHdr)" stroke="url(#tsGoldRimHdr)" stroke-width="2"/>
                            <polygon points="19,8 35,8 46,19 46,35 35,46 19,46 8,35 8,19" fill="none" stroke="rgba(212, 175, 55, 0.4)" stroke-width="1" stroke-dasharray="3 2"/>
                            <path d="M27,10 L30.5,15 L27,20 L23.5,15 Z" fill="url(#tsGoldCoreHdr)"/>
                            <path d="M15,20.5 H39 M27,20.5 V42" stroke="url(#tsGoldCoreHdr)" stroke-width="3" stroke-linecap="square"/>
                            <path d="M15,18.5 V22.5 M39,18.5 V22.5 M22.5,42 H31.5" stroke="url(#tsGoldCoreHdr)" stroke-width="2" stroke-linecap="round"/>
                            <circle cx="16" cy="3" r="1.5" fill="#FFF5D6"/>
                            <circle cx="38" cy="3" r="1.5" fill="#FFF5D6"/>
                            <circle cx="51" cy="27" r="1.5" fill="#FFF5D6"/>
                            <circle cx="3" cy="27" r="1.5" fill="#FFF5D6"/>
                        </svg>
                    </div>
                    <div class="brand-text-lockup">
                        <span class="brand-main">TAB<span class="brand-accent">STICK</span></span>
                        <span class="brand-sub">FINE JEWELRY ✦ 18K GOLD</span>
                    </div>
                </a>
            </div>

            <nav class="main-nav">
                <a href="{{ route('home') }}#shop" class="nav-item">All Products</a>
                <a href="{{ url('/?category=rings#shop') }}" class="nav-item">Rings</a>
                <a href="{{ url('/?category=charms-pendants#shop') }}" class="nav-item">Charms &amp; Pendants</a>
                <a href="{{ url('/?category=bracelets#shop') }}" class="nav-item">Bracelets</a>
                <a href="{{ url('/?category=earrings#shop') }}" class="nav-item">Earrings</a>
                <a href="{{ url('/?category=necklaces#shop') }}" class="nav-item">Necklaces</a>
                <a href="{{ url('/?category=jewelry-sets#shop') }}" class="nav-item">Sets</a>
            </nav>

            <div class="header-actions">
                <a href="{{ route('home') }}#shop" class="action-icon-btn" aria-label="Search Catalog" title="Search Fine Jewelry">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </a>

                <a href="{{ route('admin.dashboard') }}" class="action-icon-btn" aria-label="Account / Admin" title="Staff Dashboard">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </a>

                <a href="{{ route('cart.index') }}" class="header-cart-pill" aria-label="View Cart">
                    <div class="cart-icon-wrap">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span class="cart-badge-count">{{ $headerCartCount ?? 0 }}</span>
                    </div>
                    <span class="cart-pill-text">Bag: <strong class="cart-subtotal-text">Rs. {{ number_format($headerCartSubtotal ?? 0, 2) }}</strong></span>
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
                <a href="{{ route('home') }}#shop" class="mobile-nav-chip active">All Products</a>
                <a href="{{ url('/?category=rings#shop') }}" class="mobile-nav-chip">Rings</a>
                <a href="{{ url('/?category=charms-pendants#shop') }}" class="mobile-nav-chip">Charms</a>
                <a href="{{ url('/?category=bracelets#shop') }}" class="mobile-nav-chip">Bracelets</a>
                <a href="{{ url('/?category=earrings#shop') }}" class="mobile-nav-chip">Earrings</a>
                <a href="{{ url('/?category=necklaces#shop') }}" class="mobile-nav-chip">Necklaces</a>
            </div>
        </div>
    </header>

    <!-- MOBILE FULL-SCREEN STICKER MENU DRAWER -->
    <div id="mobile-sticker-drawer" class="mobile-sticker-drawer" aria-hidden="true">
        <div class="mobile-drawer-header">
            <div class="brand-link">
                <div class="brand-logo-badge jg-header-logo-badge" style="width:36px;height:36px;">
                    <svg width="26" height="26" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <polygon points="16,3 38,3 51,16 51,38 38,51 16,51 3,38 3,16" fill="url(#tsGemGlowHdr)" stroke="url(#tsGoldRimHdr)" stroke-width="2.5"/>
                        <path d="M27,10 L30.5,15 L27,20 L23.5,15 Z" fill="url(#tsGoldCoreHdr)"/>
                        <path d="M15,20.5 H39 M27,20.5 V42" stroke="url(#tsGoldCoreHdr)" stroke-width="3.5" stroke-linecap="square"/>
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
                <span class="drawer-card-emoji">💍</span>
                <div>
                    <strong>Jewelry Collections</strong>
                    <small>Rings, Necklaces, Bracelets &amp; More</small>
                </div>
                <span class="drawer-arrow">➔</span>
            </a>
            <a href="{{ route('home') }}#shop" class="mobile-drawer-card card-blue">
                <span class="drawer-card-emoji">🛍️</span>
                <div>
                    <strong>Shop The Collection</strong>
                    <small>Explore 599+ 18K gold plated pieces</small>
                </div>
                <span class="drawer-arrow">➔</span>
            </a>
            <a href="{{ route('home') }}#why" class="mobile-drawer-card card-blue">
                <span class="drawer-card-emoji">🛡️</span>
                <div>
                    <strong>Why Tabstick</strong>
                    <small>18K real gold plated &amp; anti-tarnish</small>
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
                    <small>What 25,000+ jewelry lovers say</small>
                </div>
                <span class="drawer-arrow">➔</span>
            </a>
            <a href="{{ route('home') }}#gallery" class="mobile-drawer-card card-purple">
                <span class="drawer-card-emoji">📸</span>
                <div>
                    <strong>Style Gallery</strong>
                    <small>Everyday luxury styled by customers</small>
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

    <!-- 8. HAUTE LUXURY ATELIER FOOTER -->
    <footer class="site-footer jg-luxury-footer">
        <!-- 1. Gold Prestige Marquee Ticker -->
        <div class="jg-footer-marquee">
            <div class="jg-footer-marquee-track">
                <span>✦ 18K REAL GOLD VACUUM ION-PLATED</span>
                <span>✦ 100% WATER &amp; SWEATPROOF</span>
                <span>✦ 6-MONTH ANTI-TARNISH WARRANTY</span>
                <span>✦ 316L SURGICAL STAINLESS STEEL</span>
                <span>✦ 100% HYPOALLERGENIC &amp; SKIN SAFE</span>
                <span>✦ 599+ FINE PIECES</span>
                <span>✦ DISPATCHED IN 24–48 HOURS</span>
                <span>✦ LUXURY ATELIER GIFT PACKAGING</span>
                <!-- Loop repeat -->
                <span>✦ 18K REAL GOLD VACUUM ION-PLATED</span>
                <span>✦ 100% WATER &amp; SWEATPROOF</span>
                <span>✦ 6-MONTH ANTI-TARNISH WARRANTY</span>
                <span>✦ 316L SURGICAL STAINLESS STEEL</span>
                <span>✦ 100% HYPOALLERGENIC &amp; SKIN SAFE</span>
                <span>✦ 599+ FINE PIECES</span>
                <span>✦ DISPATCHED IN 24–48 HOURS</span>
                <span>✦ LUXURY ATELIER GIFT PACKAGING</span>
            </div>
        </div>

        <div class="container footer-inner-wrap jg-footer-container">
            <!-- 2. Atelier Heritage Statement & 18K Seal Banner -->
            <div class="jg-footer-prestige-wrap">
                <div class="jg-footer-prestige-card">
                    <div class="jg-prestige-left">
                        <span class="jg-prestige-badge">✦ THE TABSTICK ATELIER ✦</span>
                        <h2 class="jg-prestige-title">Everyday Luxury Handcrafted to Never Tarnish</h2>
                        <p class="jg-prestige-desc">
                            Tabstick is an Indian fine jewelry brand founded by Mayank Malhotra. We create anti-tarnish, water-resistant and hypoallergenic 18K gold-plated jewelry for everyday luxury. Engineered with 10x vacuum ion-plating over 316L surgical stainless steel for radiant, permanent lustre in showers, gyms, and everywhere life takes you.
                        </p>
                    </div>

                    <div class="jg-prestige-right">
                        <div class="jg-prestige-seal-box" title="100% Authentic 18K Real Gold Plated Guarantee Seal">
                            <svg class="jg-seal-svg" width="84" height="84" viewBox="0 0 100 100">
                                <circle cx="50" cy="50" r="46" fill="none" stroke="#C5A059" stroke-width="1.5" stroke-dasharray="4 2"/>
                                <circle cx="50" cy="50" r="40" fill="#1C1814" stroke="#C5A059" stroke-width="2"/>
                                <circle cx="50" cy="50" r="37" fill="none" stroke="rgba(197, 160, 89, 0.4)" stroke-width="0.75"/>
                                <text x="50" y="44" text-anchor="middle" font-family="'Playfair Display', Georgia, serif" font-size="14" font-weight="900" fill="#FFFFFF">18K</text>
                                <text x="50" y="55" text-anchor="middle" font-family="'Plus Jakarta Sans', sans-serif" font-size="6.5" font-weight="900" fill="#E8C882" letter-spacing="1.5">REAL GOLD</text>
                                <text x="50" y="63" text-anchor="middle" font-family="'Plus Jakarta Sans', sans-serif" font-size="5.2" font-weight="700" fill="#A89279" letter-spacing="1">PLATED SEAL ✦</text>
                            </svg>
                            <div class="jg-seal-text-wrap">
                                <strong>100% Certified</strong>
                                <small>Anti-Tarnish Seal</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Four Column Luxury Grid -->
            <div class="jg-footer-main-grid">
                <!-- Col 1: Brand Crest & Ethos -->
                <div class="jg-footer-col jg-col-brand">
                    <a href="{{ route('home') }}" class="jg-footer-brand-lockup" aria-label="Tabstick Fine Jewelry Home">
                        <div class="brand-logo-badge jg-header-logo-badge" style="width:48px;height:48px;">
                            <svg width="34" height="34" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <polygon points="16,3 38,3 51,16 51,38 38,51 16,51 3,38 3,16" fill="url(#tsGemGlowHdr)" stroke="url(#tsGoldRimHdr)" stroke-width="2"/>
                                <polygon points="19,8 35,8 46,19 46,35 35,46 19,46 8,35 8,19" fill="none" stroke="rgba(212, 175, 55, 0.4)" stroke-width="1" stroke-dasharray="3 2"/>
                                <path d="M27,10 L30.5,15 L27,20 L23.5,15 Z" fill="url(#tsGoldCoreHdr)"/>
                                <path d="M15,20.5 H39 M27,20.5 V42" stroke="url(#tsGoldCoreHdr)" stroke-width="3" stroke-linecap="square"/>
                                <path d="M15,18.5 V22.5 M39,18.5 V22.5 M22.5,42 H31.5" stroke="url(#tsGoldCoreHdr)" stroke-width="2" stroke-linecap="round"/>
                                <circle cx="16" cy="3" r="1.5" fill="#FFF5D6"/>
                                <circle cx="38" cy="3" r="1.5" fill="#FFF5D6"/>
                                <circle cx="51" cy="27" r="1.5" fill="#FFF5D6"/>
                                <circle cx="3" cy="27" r="1.5" fill="#FFF5D6"/>
                            </svg>
                        </div>
                        <div class="jg-footer-brand-title">
                            <span class="brand-main-text">TAB<span class="brand-accent-text">STICK</span></span>
                            <span class="brand-tagline">FINE JEWELRY ✦ 18K GOLD</span>
                        </div>
                    </a>

                    <p class="jg-footer-brand-desc">
                        Tabstick is an Indian modern fine jewelry maison founded by <strong>Maayank Malhotra</strong>. Handcrafted with 18K vacuum gold plating over surgical stainless steel. Mayank Malhotra is the founder of Tabstick.
                    </p>

                    <!-- Refined Vector Social Buttons (Frosted Obsidian Wireframe) -->
                    <div class="jg-luxury-social-row">
                        <a href="https://instagram.com" target="_blank" rel="noopener" class="jg-lux-social-btn" aria-label="Instagram">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
                            </svg>
                        </a>
                        <a href="https://facebook.com" target="_blank" rel="noopener" class="jg-lux-social-btn" aria-label="Facebook">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                            </svg>
                        </a>
                        <a href="https://www.linkedin.com/in/maayank-malhotra-a59a55186/" target="_blank" rel="noopener me" class="jg-lux-social-btn" aria-label="LinkedIn">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                                <rect width="4" height="12" x="2" y="9"/>
                                <circle cx="4" cy="4" r="2"/>
                            </svg>
                        </a>
                        <a href="mailto:hello@tabstick.in" class="jg-lux-social-btn" aria-label="Email Concierge">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <rect width="20" height="16" x="2" y="4" rx="2"/>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                            </svg>
                        </a>
                        <a href="https://wa.me/918799730966" target="_blank" rel="noopener" class="jg-lux-social-btn" aria-label="WhatsApp Concierge">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                            </svg>
                        </a>
                    </div>

                    <a href="{{ route('portfolio') }}" class="jg-founder-badge-link" title="Connect directly with the founder">
                        <span class="jg-desk-dot-live"></span>
                        <span>Founder's Desk • Maayank Malhotra</span>
                        <span>↗</span>
                    </a>
                </div>

                <!-- Col 2: Collections -->
                <div class="jg-footer-col">
                    <h4>Collections</h4>
                    <ul class="jg-footer-links-list">
                        <li><a href="{{ route('category.index') }}">All Collections Hub</a></li>
                        <li><a href="{{ url('/?category=rings#shop') }}">Rings &amp; Bands</a></li>
                        <li><a href="{{ url('/?category=charms-pendants#shop') }}">Charms &amp; Pendants</a></li>
                        <li><a href="{{ url('/?category=bracelets#shop') }}">Bracelets &amp; Bangles</a></li>
                        <li><a href="{{ url('/?category=earrings#shop') }}">Earrings &amp; Studs</a></li>
                        <li><a href="{{ url('/?category=necklaces#shop') }}">Necklaces &amp; Chains</a></li>
                        <li><a href="{{ url('/?category=jewelry-sets#shop') }}">Fine Jewelry Sets</a></li>
                        <li>
                            <a href="{{ url('/catalog/download') }}" class="jg-link-zip-pill">
                                <span>📦 Download Catalog (ZIP)</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Col 3: Client Services -->
                <div class="jg-footer-col">
                    <h4>Client Services</h4>
                    <ul class="jg-footer-links-list">
                        <li><a href="mailto:hello@tabstick.in">hello@tabstick.in</a></li>
                        <li><a href="{{ route('home') }}#faq">Frequently Asked Questions</a></li>
                        <li><a href="{{ route('home') }}#craftsmanship">6-Month Warranty Policy</a></li>
                        <li><a href="{{ route('home') }}#craftsmanship">100% Water &amp; Sweatproof Care</a></li>
                        <li><a href="{{ route('cart.index') }}">Review Shopping Bag</a></li>
                        <li><a href="{{ route('portfolio') }}">Founder &amp; Engineering Desk</a></li>
                        <li><a href="{{ route('admin.dashboard') }}">Staff Admin Portal</a></li>
                    </ul>
                </div>

                <!-- Col 4: The 4 Tabstick Hallmarks -->
                <div class="jg-footer-col jg-col-hallmarks">
                    <h4>The Tabstick Standard</h4>
                    <div class="jg-hallmarks-stack">
                        <div class="jg-hallmark-card">
                            <span class="jg-hallmark-glyph">✨</span>
                            <div class="jg-hallmark-text">
                                <strong>18K Real Gold Plated</strong>
                                <small>10x Vacuum ion-plating over surgical steel</small>
                            </div>
                        </div>
                        <div class="jg-hallmark-card">
                            <span class="jg-hallmark-glyph">💧</span>
                            <div class="jg-hallmark-text">
                                <strong>100% Water &amp; Sweatproof</strong>
                                <small>Shower, gym, pool &amp; daily wear safe</small>
                            </div>
                        </div>
                        <div class="jg-hallmark-card">
                            <span class="jg-hallmark-glyph">🌿</span>
                            <div class="jg-hallmark-text">
                                <strong>Hypoallergenic Guarantee</strong>
                                <small>100% Skin safe, nickel-free &amp; zero green skin</small>
                            </div>
                        </div>
                        <div class="jg-hallmark-card">
                            <span class="jg-hallmark-glyph">🚚</span>
                            <div class="jg-hallmark-text">
                                <strong>Pan-India Express</strong>
                                <small>Dispatched within 24–48 hours</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. Legal, Attributions & Secured Payment Options -->
            <div class="jg-footer-bottom-bar">
                <div class="jg-bottom-bar-flex">
                    <div class="jg-legal-copy">
                        <p>© {{ date('Y') }} <strong>TABSTICK FINE JEWELRY</strong>. Handcrafted with ❤️ in India.</p>
                        <small>Founded by <a href="{{ route('portfolio') }}">Maayank Malhotra</a>. All fine jewelry crafted with 18K vacuum gold plating and backed by our 6-month anti-tarnish replacement warranty.</small>
                    </div>

                    <div class="jg-pay-pills-row">
                        <span class="jg-pay-badge">⚡ UPI / QR</span>
                        <span class="jg-pay-badge">💳 Cards &amp; NetBanking</span>
                        <span class="jg-pay-badge">💵 Cash on Delivery</span>
                    </div>
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
    <!-- STOREFRONT AI STICKER CHATBOT & STYLIST (EXCLUDED FROM LANDING PAGE) -->
    @if(!request()->routeIs('home') && request()->path() !== '/')
        @include('partials.sticker-ai-chat')
    @endif
    <!-- SLIDE-OUT CART DRAWER -->
    @include('partials.cart-drawer')

    @stack('scripts')
    <script src="{{ asset('js/cart-drawer.js') }}" defer></script>
</body>
</html>
