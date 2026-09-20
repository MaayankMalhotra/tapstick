@extends('layouts.app')

@section('title', 'Tabstick – Creative Laptop, Car & Custom Stickers')
@section('meta_description', 'Tabstick creates creative, durable stickers for laptops, cars, phones and college students. Explore unique sticker designs and shop online in India.')
@section('canonical', 'https://tabstick.in')

@section('content')

<!-- ==========================================================================
     1. FULL-SCREEN ANIMATED PLAYFUL POP HERO SECTION
     ========================================================================== -->
<section class="hero-pop-section" id="hero">
    <!-- Moving Organic Gradient / Blob Mesh Background -->
    <div class="hero-blob-canvas" aria-hidden="true">
        <div class="blob-mesh blob-mesh-1"></div>
        <div class="blob-mesh blob-mesh-2"></div>
        <div class="blob-mesh blob-mesh-3"></div>
        <div class="hero-halftone-overlay"></div>
    </div>

    <div class="container hero-pop-container">
        <!-- Floating Doodles & Stickers Around Headline (Parallax Depth) -->
        <div class="hero-floating-doodle doodle-star-1" data-parallax-depth="0.9" data-base-rotate="-12" aria-hidden="true">
            <span class="doodle-sparkle">✦</span>
        </div>
        <div class="hero-floating-doodle doodle-star-2" data-parallax-depth="1.4" data-base-rotate="15" aria-hidden="true">
            <span class="doodle-sparkle color-pink">✴</span>
        </div>
        <div class="hero-floating-doodle doodle-arrow" data-parallax-depth="0.6" data-base-rotate="8" aria-hidden="true">
            <svg width="60" height="40" viewBox="0 0 60 40" fill="none">
                <path d="M5 30C20 10 38 12 52 18M52 18L44 8M52 18L46 28" stroke="#FF334B" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="doodle-arrow-label">STICK EM!</span>
        </div>

        <!-- Left Column: Oversized Rounded Headline & Magnetic CTAs -->
        <div class="hero-pop-text-col">
            <div class="hero-pop-eyebrow-pill reveal-on-scroll">
                <span class="eyebrow-spark">⚡</span>
                <span class="eyebrow-text">TABSTICK DROP • 100% WATERPROOF VINYL</span>
                <span class="eyebrow-badge">NEW</span>
            </div>

            <!-- Independent Word Spans for Staggered Spring Animation -->
            <h1 class="hero-pop-headline reveal-on-scroll">
                <span class="headline-line-1">
                    <span class="pop-word-span word-make">TABSTICK</span>
                    <span class="pop-word-span word-it">STICKERS</span>
                </span>
                <span class="headline-line-2">
                    <span class="headline-pop-word word-yours">
                        CREATIVE &amp; DURABLE.
                        <svg class="pop-wiggle-underline" viewBox="0 0 320 28" fill="none" preserveAspectRatio="none">
                            <path d="M4 18C45 4 85 24 130 14C175 4 215 24 260 14C285 8 305 16 316 12" stroke="#FFE600" stroke-width="8" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <span class="hero-pill-badge-floating" data-parallax-depth="1.2" data-base-rotate="-8">
                        FOR LAPTOPS, CARS &amp; MORE 🔥
                    </span>
                </span>
            </h1>

            <p class="hero-pop-subtext reveal-on-scroll">
                Tabstick is an Indian sticker brand founded by Mayank Malhotra. We create creative and durable stickers for laptops, cars, phones and college students. Crafted with automotive-grade die-cut vinyl built to survive monsoons, road trips, laptops, hydro flasks &amp; daily carry without peeling or leaving gooey residue.
            </p>

            <div class="hero-pop-cta-row reveal-on-scroll">
                <a href="#shop" class="btn-pop-primary btn-magnetic trigger-confetti" data-confetti="true">
                    <span>Shop the drop 🛍️</span>
                </a>
                <a href="#why" class="btn-pop-secondary btn-magnetic">
                    <span>Why we stick ✦</span>
                </a>
            </div>

            <div class="hero-pop-perks-bar reveal-on-scroll">
                <div class="hero-perk-chip">
                    <span class="chip-emoji">💧</span>
                    <span>100% Waterproof</span>
                </div>
                <div class="hero-perk-chip">
                    <span class="chip-emoji">⚡</span>
                    <span>Zero Sticky Residue</span>
                </div>
                <div class="hero-perk-chip">
                    <span class="chip-emoji">🚚</span>
                    <span>48h Pan-India Dispatch</span>
                </div>
            </div>
        </div>

        <!-- Right Column: 3D Interactive Sticker Pile & Rotating Sunburst Badge -->
        <div class="hero-pop-visual-col">
            <!-- Animated Rotating Sunburst Badge: “STICK WITH IT” -->
            <div class="hero-sunburst-badge-wrap" data-parallax-depth="1.6" data-base-rotate="0">
                <div class="sunburst-badge-rotator">
                    <svg class="sunburst-svg" viewBox="0 0 160 160">
                        <defs>
                            <path id="sunburstPath" d="M 80, 80 m -56, 0 a 56,56 0 1,1 112,0 a 56,56 0 1,1 -112,0" />
                        </defs>
                        <!-- Sunburst Rays Background -->
                        <g class="sunburst-rays" fill="#FFE600" stroke="#18181B" stroke-width="2.5">
                            <circle cx="80" cy="80" r="74" fill="#FFE600" />
                            <polygon points="80,4 86,16 98,10 100,24 114,22 112,36 126,38 120,52 134,58 124,70 136,80 124,90 134,102 120,108 126,122 112,124 114,138 100,136 98,150 86,144 80,156 74,144 62,150 60,136 46,138 48,124 34,122 40,108 26,102 36,90 24,80 36,70 26,58 40,52 34,38 48,36 46,22 60,24 62,10 74,16" />
                        </g>
                        <circle cx="80" cy="80" r="54" fill="#18181B" />
                        <!-- Rotating Circular Text -->
                        <text font-family="sans-serif" font-size="11" font-weight="900" fill="#FFFFFF" letter-spacing="2.5">
                            <textPath href="#sunburstPath" startOffset="0%">
                                ✦ STICK WITH IT ✦ TABSTICK ✦ POP ✦
                            </textPath>
                        </text>
                        <circle cx="80" cy="80" r="24" fill="#FF334B" stroke="#FFFFFF" stroke-width="2"/>
                        <text x="80" y="85" text-anchor="middle" font-size="16" font-family="sans-serif">⚡</text>
                    </svg>
                </div>
            </div>

            <!-- 3D Layered Sticker Composition with Tilt & Physics -->
            <div class="hero-sticker-stage">
                <!-- Center Stage Collector Base Card -->
                <div class="stage-base-card" data-parallax-depth="0.4" data-base-rotate="-2">
                    <div class="base-card-inner">
                        <div class="base-card-header">
                            <span class="base-dot red"></span>
                            <span class="base-dot yellow"></span>
                            <span class="base-dot green"></span>
                            <span class="base-card-tag">TABSTICK COLLECTOR PACK • 2026</span>
                        </div>
                        <div class="base-card-main-visual">
                            <img src="{{ asset('images/hero-banner.webp') }}" alt="Tabstick Vinyl Sticker Showcase" class="hero-main-featured-img">
                            <div class="base-card-gloss-sheen"></div>
                        </div>
                    </div>
                </div>

                <!-- Floating Physical Sticker Layers (Authentic Visuals) -->
                <div class="interactive-sticker-layer sticker-pop-1" data-parallax-depth="1.5" data-base-rotate="-12" title="Wasted Vinyl Decal">
                    <div class="die-cut-sticker-wrap">
                        <img src="{{ asset('images/wasted.jpg') }}" alt="Wasted Sticker">
                        <span class="sticker-tag-badge badge-yellow">⭐ BESTSELLER</span>
                        <div class="pop-card-peel-corner"></div>
                    </div>
                </div>

                <div class="interactive-sticker-layer sticker-pop-2" data-parallax-depth="1.8" data-base-rotate="14" title="Ah Shit Here We Go Again">
                    <div class="die-cut-sticker-wrap">
                        <img src="{{ asset('images/ah-shit.jpg') }}" alt="Ah Shit Here We Go Again">
                        <span class="sticker-tag-badge badge-blue">👑 MEME DROP</span>
                        <div class="pop-card-peel-corner"></div>
                    </div>
                </div>

                <div class="interactive-sticker-layer sticker-pop-3" data-parallax-depth="1.2" data-base-rotate="-6" title="Limited Edition Drop">
                    <div class="die-cut-sticker-wrap">
                        <img src="{{ asset('images/limited-edition.jpg') }}" alt="Limited Edition Sticker">
                        <span class="sticker-tag-badge badge-red">🔥 DROP 04</span>
                        <div class="pop-card-peel-corner"></div>
                    </div>
                </div>

                <div class="interactive-sticker-layer sticker-pop-4" data-parallax-depth="2.1" data-base-rotate="18" title="Fizzy Zero Pop Sticker">
                    <div class="die-cut-sticker-wrap">
                        <img src="{{ asset('images/fizzy-zero.jpg') }}" alt="Fizzy Zero Sticker">
                        <span class="sticker-tag-badge badge-green">⚡ POP ART</span>
                        <div class="pop-card-peel-corner"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     2. SCROLLING TICKER: “WATERPROOF ✦ UV RESISTANT ✦ EASY PEEL ✦ MADE TO LAST”
     ========================================================================== -->
<div class="ticker-pop-strip">
    <div class="ticker-pop-track">
        <span class="ticker-unit"><span class="ticker-star">✦</span> WATERPROOF VINYL</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> UV RESISTANT INKS</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> EASY PEEL BACKING</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> MADE TO LAST</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> ZERO STICKY RESIDUE</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> 5000+ ORIGINAL DESIGNS</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> 48H PAN-INDIA DISPATCH</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> AUTOMOTIVE GRADE</span>
        <!-- Duplicated for seamless infinite continuous CSS loop -->
        <span class="ticker-unit"><span class="ticker-star">✦</span> WATERPROOF VINYL</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> UV RESISTANT INKS</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> EASY PEEL BACKING</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> MADE TO LAST</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> ZERO STICKY RESIDUE</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> 5000+ ORIGINAL DESIGNS</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> 48H PAN-INDIA DISPATCH</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> AUTOMOTIVE GRADE</span>
    </div>
</div>

<!-- ==========================================================================
     3. PRODUCT SECTION: “PICK YOUR PERSONALITY”
     ========================================================================== -->
<section id="shop" class="products-pop-section">
    <div class="container">
        <div class="section-pop-header reveal-on-scroll">
            <div class="section-pop-badge">
                <span class="badge-spark">✦</span>
                <span>CURATED COLLECTIBLE PACKS</span>
                <span class="badge-spark">✦</span>
            </div>
            <h2 class="section-pop-title">PICK YOUR PERSONALITY</h2>
            <p class="section-pop-subtitle">
                Die-cut vinyl stickers built to take a beating on MacBooks, hydro flasks, skate decks, cars &amp; bikes.
            </p>

            <!-- Dynamic Category Filter Tabs -->
            <div class="pop-filter-tabs" id="pop-category-tabs">
                <button type="button" class="pop-filter-pill active" data-category="all">
                    <span>⚡ ALL DROPS ({{ number_format($totalProductsCount ?? 4400) }})</span>
                </button>
                @if(isset($categories))
                    @foreach($categories as $cat)
                        <button type="button" class="pop-filter-pill" data-category="{{ $cat->slug }}">
                            <span>{{ $cat->name }} ({{ number_format($cat->products_count) }})</span>
                        </button>
                    @endforeach
                @endif
            </div>

            <!-- Live Search Bar & Realtime Count -->
            <div class="products-search-wrap">
                <div class="products-search-bar">
                    <span class="search-icon">🔍</span>
                    <input type="search" id="products-search-input" placeholder="Search 4,400+ vinyl decals (e.g. Naruto, Chai, Cat, Coding, Enfield...)" autocomplete="off">
                    <button type="button" id="products-search-clear" style="display:none;" aria-label="Clear search">✕</button>
                </div>
                <div class="products-live-counter">
                    <span id="products-count-label">Showing <strong id="current-shown-count">{{ $products->count() }}</strong> of <strong id="total-matching-count">{{ number_format($totalProductsCount ?? 4400) }}</strong> stickers</span>
                </div>
            </div>
        </div>

        <!-- Product Cards Grid: Collectible Pack Styling with Alternating Color Accents -->
        <div class="products-pop-grid" id="products-pop-grid">
            @forelse($products as $index => $product)
                @include('partials.product-card', ['product' => $product, 'index' => $index])
            @empty
                <div class="products-empty-state" id="products-empty-message">
                    <span style="font-size:3rem;">📦</span>
                    <h3>No matching stickers found!</h3>
                    <p>Try searching for something else or pick a different category.</p>
                </div>
            @endforelse
        </div>

        <!-- Lazy Loader Spinner -->
        <div class="products-lazy-loader" id="products-lazy-loader">
            <span class="spinner-sticker-roll">⚡</span>
            <span>UNBOXING MORE DROPS...</span>
        </div>

        <!-- Manual Load More Button -->
        <div class="products-load-more-wrap" id="products-load-more-wrap">
            <button type="button" class="btn-load-more-drops" id="btn-load-more-drops">
                <span>⚡ Load More Stickers (<span id="load-more-remaining-count">{{ max(0, ($totalProductsCount ?? 4400) - $products->count()) }}</span> more)</span>
            </button>
        </div>

        <!-- End of Collection Banner -->
        <div class="products-end-banner" id="products-end-banner">
            <span>🎉 You've reached the end of this collection!</span>
        </div>

        <!-- Infinite Scroll Intersection Sentinel -->
        <div id="products-scroll-sentinel" style="height: 20px; margin-top: -10px;"></div>
    </div>
</section>

<!-- ==========================================================================
     CUSTOMER PHRASES FLOATING MARQUEE
     ========================================================================== -->
<div class="phrases-marquee-strip">
    <div class="phrases-marquee-track">
        <span class="phrase-item"><span class="phrase-star">★</span> “LOOKS AMAZING”</span>
        <span class="phrase-item"><span class="phrase-star">★</span> “STICKS PERFECTLY”</span>
        <span class="phrase-item"><span class="phrase-star">★</span> “BEST LAPTOP UPGRADE”</span>
        <span class="phrase-item"><span class="phrase-star">★</span> “SO SATISFYING TO PEEL”</span>
        <span class="phrase-item"><span class="phrase-star">★</span> “100% WATERPROOF MONSOON PROOF”</span>
        <span class="phrase-item"><span class="phrase-star">★</span> “COLORS POP LIKE CRAZY”</span>
        <!-- Duplicated for continuous infinite marquee -->
        <span class="phrase-item"><span class="phrase-star">★</span> “LOOKS AMAZING”</span>
        <span class="phrase-item"><span class="phrase-star">★</span> “STICKS PERFECTLY”</span>
        <span class="phrase-item"><span class="phrase-star">★</span> “BEST LAPTOP UPGRADE”</span>
        <span class="phrase-item"><span class="phrase-star">★</span> “SO SATISFYING TO PEEL”</span>
        <span class="phrase-item"><span class="phrase-star">★</span> “100% WATERPROOF MONSOON PROOF”</span>
        <span class="phrase-item"><span class="phrase-star">★</span> “COLORS POP LIKE CRAZY”</span>
    </div>
</div>

<!-- ==========================================================================
     4. SECTION: “WHY YOU’LL LOVE THEM” (WEATHERPROOF, CLEAN CUTS, BOLD COLOUR)
     ========================================================================== -->
<section id="why" class="why-pop-section">
    <div class="container">
        <div class="section-pop-header reveal-on-scroll">
            <div class="section-pop-badge bg-yellow">
                <span>✦ BUILT DIFFERENT ✦</span>
            </div>
            <h2 class="section-pop-title text-ink">WHY YOU’LL LOVE THEM</h2>
            <p class="section-pop-subtitle">
                Most cheap stickers are paper-thin and melt in the rain. Tabstick is crafted with automotive-grade engineering.
            </p>
        </div>

        <div class="why-pop-grid">
            <!-- Feature 1: Weather Resistant -->
            <div class="why-pop-card card-weather reveal-on-scroll">
                <div class="why-pop-icon-badge icon-blue">
                    <span class="why-emoji">🌧️</span>
                </div>
                <div class="why-tape-doodle"></div>
                <h3 class="why-card-title">Weather Resistant</h3>
                <p class="why-card-desc">
                    100% waterproof and scratchproof. Tested on outdoor bikes, car bumpers, helmets and hydro flasks through monsoons, car washes, and harsh Indian summers.
                </p>
                <div class="why-card-meta-chips">
                    <span class="why-chip">💧 100% Waterproof</span>
                    <span class="why-chip">☀️ UV Safe</span>
                </div>
            </div>

            <!-- Feature 2: Clean Cuts -->
            <div class="why-pop-card card-cuts reveal-on-scroll">
                <div class="why-pop-icon-badge icon-red">
                    <span class="why-emoji">✂️</span>
                </div>
                <div class="why-tape-doodle"></div>
                <h3 class="why-card-title">Clean Precision Cuts</h3>
                <p class="why-card-desc">
                    Laser-guided optical die-cutting creates a flawless white outline with smooth edges and easy-peel backing. Plus, zero sticky residue when you decide to swap them.
                </p>
                <div class="why-card-meta-chips">
                    <span class="why-chip">🚫 No Gooey Residue</span>
                    <span class="why-chip">👌 Easy Peel</span>
                </div>
            </div>

            <!-- Feature 3: Bold Colour -->
            <div class="why-pop-card card-colour reveal-on-scroll">
                <div class="why-pop-icon-badge icon-yellow">
                    <span class="why-emoji">🎨</span>
                </div>
                <div class="why-tape-doodle"></div>
                <h3 class="why-card-title">Ultra-Bold Colour</h3>
                <p class="why-card-desc">
                    High-density UV-cured pigment inks print deep blacks, blazing neon reds, and punchy yellows that never fade, smudge, or blur over years of daily handling.
                </p>
                <div class="why-card-meta-chips">
                    <span class="why-chip">🌈 1200 DPI Inks</span>
                    <span class="why-chip">🛡️ Non-Fade Finish</span>
                </div>
            </div>
        </div>

        <!-- Banner Visual Spotlight -->
        <div class="why-banner-stage reveal-on-scroll">
            <div class="why-banner-frame">
                <img src="{{ asset('images/why-banner.webp') }}" alt="Why Tabstick Vinyl Stickers Excel" class="why-banner-image">
                <div class="why-banner-stamp">
                    <span>100% VINYL QUALITY GUARANTEED ✦</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     5. SEO CATEGORY GUIDES (LAPTOP, CAR, PHONE, COLLEGE & CUSTOM STICKERS)
     ========================================================================== -->
<section id="categories" class="seo-categories-section">
    <div class="container">
        <div class="section-pop-header reveal-on-scroll">
            <div class="section-pop-badge bg-yellow">
                <span>✦ EXPLORE BY GEAR &amp; LIFESTYLE ✦</span>
            </div>
            <h2 class="section-pop-title text-ink">CREATIVE STICKERS FOR EVERY SURFACE</h2>
            <p class="section-pop-subtitle">
                Engineered for maximum durability. Discover Tabstick waterproof vinyl decals tailored for your tech, ride, and campus drip.
            </p>
        </div>

        <div class="seo-categories-grid">
            <!-- Category 1: Laptop Stickers -->
            <div class="seo-category-card reveal-on-scroll" id="laptop-stickers">
                <div>
                    <span class="seo-cat-badge">💻 Tech Setup</span>
                    <h3 class="seo-cat-title">Laptop Stickers</h3>
                    <p class="seo-cat-desc">
                        Turn boring laptop lids into personalized statement art. Tabstick laptop stickers are die-cut from premium automotive-grade vinyl engineered specifically to handle laptop operating heat and daily backpack friction. Because we use high-grade residue-free adhesive, you can peel, swap, and reposition stickers on MacBooks, ThinkPads, and gaming rigs without leaving sticky, gooey glue on aluminum or matte chassis.
                    </p>
                </div>
                <div>
                    <div class="seo-cat-meta-chips">
                        <span class="seo-cat-chip">🚫 Zero Residue</span>
                        <span class="seo-cat-chip">🔥 Heat Resistant</span>
                        <span class="seo-cat-chip">✨ Matte Lamination</span>
                    </div>
                    <a href="#shop" class="seo-cat-btn" onclick="if(window.filterBySearch){window.filterBySearch('laptop');} return false;">
                        <span>Shop Laptop Stickers →</span>
                    </a>
                </div>
            </div>

            <!-- Category 2: Car & Bike Stickers -->
            <div class="seo-category-card reveal-on-scroll" id="car-stickers">
                <div>
                    <span class="seo-cat-badge">🚗 Road &amp; Track</span>
                    <h3 class="seo-cat-title">Car &amp; Bike Stickers</h3>
                    <p class="seo-cat-desc">
                        Built to withstand the open highway, harsh weather, and pressure washes. Tabstick car stickers and motorcycle decals are printed with UV-cured pigment inks that never fade or bleach under blistering Indian sun. Whether sticking them on bumpers, windshields, bike petrol tanks, or helmet visors, our 100% waterproof vinyl stands firm against monsoons, mud splashes, and grit.
                    </p>
                </div>
                <div>
                    <div class="seo-cat-meta-chips">
                        <span class="seo-cat-chip">🌧️ 100% Waterproof</span>
                        <span class="seo-cat-chip">☀️ UV Sunlight Safe</span>
                        <span class="seo-cat-chip">🏍️ Moto &amp; Auto Grade</span>
                    </div>
                    <a href="#shop" class="seo-cat-btn" onclick="if(window.filterBySearch){window.filterBySearch('car');} return false;">
                        <span>Shop Car Stickers →</span>
                    </a>
                </div>
            </div>

            <!-- Category 3: Phone Case Stickers -->
            <div class="seo-category-card reveal-on-scroll" id="phone-stickers">
                <div>
                    <span class="seo-cat-badge">📱 Daily Carry</span>
                    <h3 class="seo-cat-title">Phone Case Stickers</h3>
                    <p class="seo-cat-desc">
                        Your smartphone travels in your hand and pocket all day long. Tabstick phone stickers are miniature die-cut decals created with scratchproof coatings that resist coin scratches, hand sweat, and jeans friction. Slip them seamlessly inside transparent clear cases or stick them securely onto silicone and matte cases without edge lifting or peeling.
                    </p>
                </div>
                <div>
                    <div class="seo-cat-meta-chips">
                        <span class="seo-cat-chip">🛡️ Scratch Resistant</span>
                        <span class="seo-cat-chip">👌 Easy Peel</span>
                        <span class="seo-cat-chip">⚡ Pocket Proof</span>
                    </div>
                    <a href="#shop" class="seo-cat-btn" onclick="if(window.filterBySearch){window.filterBySearch('phone');} return false;">
                        <span>Shop Phone Stickers →</span>
                    </a>
                </div>
            </div>

            <!-- Category 4: Stickers for College Students -->
            <div class="seo-category-card reveal-on-scroll" id="college-stickers">
                <div>
                    <span class="seo-cat-badge">🎓 Campus Vibe</span>
                    <h3 class="seo-cat-title">Stickers for College Students</h3>
                    <p class="seo-cat-desc">
                        College life thrives on humor, hustle, and self-expression. Tabstick stickers for college students feature the internet's dopest meme drops, anime aesthetics, developer code jokes, and desi pop culture art. Designed to withstand campus rough-and-tumble on water bottles, spiral notebooks, hostel doors, and laptops—all at student-friendly pocket money pricing.
                    </p>
                </div>
                <div>
                    <div class="seo-cat-meta-chips">
                        <span class="seo-cat-chip">👑 Viral Memes &amp; Anime</span>
                        <span class="seo-cat-chip">💧 Bottle &amp; Flask Safe</span>
                        <span class="seo-cat-chip">💸 Affordable Packs</span>
                    </div>
                    <a href="#shop" class="seo-cat-btn" onclick="if(window.filterBySearch){window.filterBySearch('meme');} return false;">
                        <span>Shop Student Drops →</span>
                    </a>
                </div>
            </div>

            <!-- Category 5: Custom Stickers in India (Wide Feature Card) -->
            <div class="seo-category-card featured-wide reveal-on-scroll" id="custom-stickers">
                <div>
                    <span class="seo-cat-badge">⚡ Creator Studio</span>
                    <h3 class="seo-cat-title">Custom Stickers in India</h3>
                    <p class="seo-cat-desc">
                        Need custom stickers for your tech startup, college fest, developer community, or personal brand? Tabstick manufactures custom die-cut vinyl stickers in India with ultra-sharp 1200 DPI resolution, custom die-cut contours, and protective waterproof lamination. Enjoy fast turnaround times, low minimum order quantities, and reliable pan-India doorstep delivery.
                    </p>
                    <div class="seo-cat-meta-chips">
                        <span class="seo-cat-chip">📐 Custom Die-Cut</span>
                        <span class="seo-cat-chip">📦 Bulk Pack Pricing</span>
                        <span class="seo-cat-chip">🚀 Pan-India Fast Dispatch</span>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column; align-items: flex-start; gap: 14px;">
                    <p style="font-size: 0.92rem; color: #18181B; font-weight: 700; margin: 0;">
                        Ready to print your artwork or startup swag?
                    </p>
                    <a href="mailto:hello@tabstick.in?subject=Custom%20Sticker%20Order%20Inquiry%20-%20Tabstick" class="seo-cat-btn">
                        <span>Request Custom Quote (hello@tabstick.in) ✉️</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     6. SECTION: “THE TABSTICK CLUB” (“Good things come in small packs.”)
     ========================================================================== -->
<section id="club" class="club-pop-section">
    <div class="container">
        <div class="club-pop-header reveal-on-scroll">
            <span class="club-badge-tag">✦ THE MOVEMENT ✦</span>
            <h2 class="club-pop-heading">GOOD THINGS COME IN SMALL PACKS.</h2>
            <p class="club-pop-subtext">
                Tabstick started out of pure frustration with flimsy, cheap stickers that ruined MacBooks and peeled within days. Today, we're a community of 25,000+ creators turning ordinary tech into personal art.
            </p>
        </div>

        <!-- Founder Story Spotlight (#author) -->
        <div id="author" class="founder-spotlight-box reveal-on-scroll">
            <div class="founder-spotlight-grid">
                <!-- Polaroid Frame with Realistic Tape Sticker -->
                <div class="founder-photo-col">
                    <div class="founder-polaroid-frame">
                        <div class="polaroid-tape-strip tape-top"></div>
                        <img src="{{ asset('images/author.jpg') }}" alt="Mayank Malhotra, Founder of Tabstick" class="founder-photo-img">
                        <div class="polaroid-handwriting-caption">
                            <strong>Mayank Malhotra</strong>
                            <span>Founder of Tabstick</span>
                        </div>
                    </div>
                </div>

                <!-- Story & Metrics -->
                <div class="founder-text-col">
                    <div class="founder-kicker-pill">FOUNDER &amp; BRAND STORY</div>
                    <h3 class="founder-quote-title">
                        “Stickers shouldn't be disposable paper. They should be wearable streetwear for your gear.”
                    </h3>
                    <p class="founder-story-paragraph">
                        <strong>Mayank Malhotra is the founder of Tabstick.</strong> Tabstick is an Indian sticker brand founded by Mayank Malhotra. We create creative and durable stickers for laptops, cars, phones and college students.
                    </p>
                    <p class="founder-story-paragraph">
                        Back in 2024, I spent ₹1,500 on laptop stickers that arrived pixelated, peeled at the corners after a week, and left sticky glue all over my aluminum lid. I knew we could do better. We sourced automotive-grade waterproof vinyl, partnered with local indie illustrators, and dialed in rich UV-cured inks. Today, Tabstick is proud to be India's fastest-growing sticker studio.
                    </p>

                    <!-- Real Impact Counters -->
                    <div class="founder-metrics-strip">
                        <div class="metric-card">
                            <strong class="metric-number">10L+</strong>
                            <span class="metric-label">Stickers Shipped</span>
                        </div>
                        <div class="metric-card">
                            <strong class="metric-number">5000+</strong>
                            <span class="metric-label">Original Drops</span>
                        </div>
                        <div class="metric-card">
                            <strong class="metric-number">4.8★</strong>
                            <span class="metric-label">Community Rating</span>
                        </div>
                    </div>

                    <div class="founder-actions-row">
                        <a href="https://www.linkedin.com/in/maayank-malhotra-a59a55186/" target="_blank" rel="noopener me" class="founder-linkedin-chip">
                            <span>Connect with Mayank Malhotra on LinkedIn →</span>
                        </a>
                        <a href="#shop" class="btn-pop-primary btn-magnetic">
                            <span>Shop Founder's Picks →</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Interactive Sticker Playground Wall -->
        <div class="interactive-sticker-wall-wrap reveal-on-scroll">
            <div class="wall-header-pill">
                <span class="wall-spark">🎮</span>
                <span>INTERACTIVE STICKER WALL • DRAG &amp; PLAY AROUND!</span>
                <span class="wall-spark">✦</span>
            </div>
            <div class="sticker-wall-stage" id="sticker-wall">
                <div class="draggable-sticker wall-stk-1" data-base-rotate="-8" title="Drag me!">
                    <img src="{{ asset('images/wasted.jpg') }}" alt="Wasted Sticker">
                    <span class="sticker-pin">📌</span>
                </div>
                <div class="draggable-sticker wall-stk-2" data-base-rotate="12" title="Drag me!">
                    <img src="{{ asset('images/ah-shit.jpg') }}" alt="Ah Shit Sticker">
                    <span class="sticker-pin">📌</span>
                </div>
                <div class="draggable-sticker wall-stk-3" data-base-rotate="-14" title="Drag me!">
                    <img src="{{ asset('images/limited-edition.jpg') }}" alt="Limited Drop">
                    <span class="sticker-pin">📌</span>
                </div>
                <div class="draggable-sticker wall-stk-4" data-base-rotate="6" title="Drag me!">
                    <img src="{{ asset('images/fizzy-zero.jpg') }}" alt="Fizzy Pop">
                    <span class="sticker-pin">📌</span>
                </div>
                <div class="draggable-sticker wall-stk-5" data-base-rotate="-4" title="Drag me!">
                    <img src="{{ asset('images/keep-distance.jpg') }}" alt="Keep Distance">
                    <span class="sticker-pin">📌</span>
                </div>
                <div class="draggable-sticker wall-stk-6" data-base-rotate="10" title="Drag me!">
                    <img src="{{ asset('images/uchiha.jpg') }}" alt="Uchiha Clan">
                    <span class="sticker-pin">📌</span>
                </div>
            </div>
        </div>

        <!-- 3 Club Benefits Cards -->
        <div class="club-benefits-grid">
            <div class="benefit-card benefit-yellow reveal-on-scroll">
                <div class="benefit-icon">🎁</div>
                <h4>Secret Weekly Drops</h4>
                <p>Members get 24-hour early access to limited anime, meme &amp; indie artist drops before they sell out.</p>
            </div>
            <div class="benefit-card benefit-blue reveal-on-scroll">
                <div class="benefit-icon">🛡️</div>
                <h4>Stick-For-Life Promise</h4>
                <p>If your Tabstick sticker ever bubbles, peels or fades from normal use, we replace it free of cost.</p>
            </div>
            <div class="benefit-card benefit-pink reveal-on-scroll">
                <div class="benefit-icon">⚡</div>
                <h4>Surprise Mystery Gifts</h4>
                <p>Exclusive surprise die-cut stickers and holographic bonus decals tucked into every club order over ₹499.</p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     7. FREQUENTLY ASKED QUESTIONS (WITH FAQPAGe SCHEMA)
     ========================================================================== -->
<section id="faq" class="faq-pop-section">
    <div class="container">
        <div class="section-pop-header reveal-on-scroll">
            <div class="section-pop-badge bg-yellow">
                <span>✦ GOT QUESTIONS? WE'VE GOT ANSWERS ✦</span>
            </div>
            <h2 class="section-pop-title text-ink">FREQUENTLY ASKED QUESTIONS</h2>
            <p class="section-pop-subtitle">
                Everything you need to know about Tabstick sticker quality, waterproof vinyl, shipping across India, and our founder.
            </p>
        </div>

        <div class="faq-accordion-wrap reveal-on-scroll">
            <!-- FAQ 1: Quality -->
            <div class="faq-accordion-item">
                <button type="button" class="faq-accordion-header" aria-expanded="false">
                    <span>What makes Tabstick stickers different from ordinary stickers?</span>
                    <span class="faq-icon-cross">+</span>
                </button>
                <div class="faq-accordion-body" style="display: none;">
                    Tabstick stickers are manufactured with heavy-duty automotive-grade vinyl and cured with high-density pigment inks. Unlike thin paper stickers that rip or blur when touched, Tabstick decals feature a durable protective matte laminate that resists water, sun exposure, oil, and scratches.
                </div>
            </div>

            <!-- FAQ 2: Waterproof -->
            <div class="faq-accordion-item">
                <button type="button" class="faq-accordion-header" aria-expanded="false">
                    <span>Are Tabstick stickers completely waterproof and weatherproof?</span>
                    <span class="faq-icon-cross">+</span>
                </button>
                <div class="faq-accordion-body" style="display: none;">
                    Yes, 100%. All Tabstick stickers are fully waterproof, monsoon-tested, and dishwasher safe. You can stick them on outdoor car bumpers, motorcycle petrol tanks, helmets, and hydro flasks without worrying about rain, car washes, or summer heat peeling the edges.
                </div>
            </div>

            <!-- FAQ 3: Residue -->
            <div class="faq-accordion-item">
                <button type="button" class="faq-accordion-header" aria-expanded="false">
                    <span>Will Tabstick stickers leave sticky residue when removed?</span>
                    <span class="faq-icon-cross">+</span>
                </button>
                <div class="faq-accordion-body" style="display: none;">
                    No. We engineered our adhesive specifically for tech devices and delicate surfaces. When you peel a Tabstick sticker off your MacBook, iPad, phone case, or car paint, it leaves zero gooey residue. If any slight dust remains, it wipes off effortlessly with a dry cloth.
                </div>
            </div>

            <!-- FAQ 4: Application -->
            <div class="faq-accordion-item">
                <button type="button" class="faq-accordion-header" aria-expanded="false">
                    <span>How do I apply and remove Tabstick stickers for best results?</span>
                    <span class="faq-icon-cross">+</span>
                </button>
                <div class="faq-accordion-body" style="display: none;">
                    To apply, wipe the surface clean and ensure it is dry and free of oils. Peel the sticker from its backing, position it gently, and smooth down from the center toward the edges with your thumb. To remove, simply lift an edge with your fingernail and peel slowly at a 45-degree angle.
                </div>
            </div>

            <!-- FAQ 5: Shipping -->
            <div class="faq-accordion-item">
                <button type="button" class="faq-accordion-header" aria-expanded="false">
                    <span>What are the shipping and delivery timelines across India?</span>
                    <span class="faq-icon-cross">+</span>
                </button>
                <div class="faq-accordion-body" style="display: none;">
                    We dispatch all orders within 24 to 48 hours from our studio. Delivery typically takes 2 to 4 business days for metro cities (Bengaluru, Delhi NCR, Mumbai, Hyderabad, Chennai, Kolkata) and 3 to 6 business days for the rest of India with live SMS tracking.
                </div>
            </div>

            <!-- FAQ 6: Custom Stickers -->
            <div class="faq-accordion-item">
                <button type="button" class="faq-accordion-header" aria-expanded="false">
                    <span>Can I order custom stickers in India for startups, colleges, or events?</span>
                    <span class="faq-icon-cross">+</span>
                </button>
                <div class="faq-accordion-body" style="display: none;">
                    Absolutely! We specialize in custom die-cut vinyl stickers for tech startups, developer conferences, college fests, and indie creators in India. Email your designs, quantity, and dimensions to <strong>hello@tabstick.in</strong> for an instant quote and proof mockups.
                </div>
            </div>

            <!-- FAQ 7: Founder Identity -->
            <div class="faq-accordion-item">
                <button type="button" class="faq-accordion-header" aria-expanded="false">
                    <span>Who is the founder of Tabstick?</span>
                    <span class="faq-icon-cross">+</span>
                </button>
                <div class="faq-accordion-body" style="display: none;">
                    <strong>Mayank Malhotra is the founder of Tabstick.</strong> He founded Tabstick to bring streetwear aesthetics, automotive-grade durability, and creator culture to the Indian sticker ecosystem, ending the era of flimsy, peeling paper stickers.
                </div>
            </div>
        </div>
    </div>

    <!-- JSON-LD FAQPage Schema -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "What makes Tabstick stickers different from ordinary stickers?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Tabstick stickers are manufactured with heavy-duty automotive-grade vinyl and cured with high-density pigment inks. Unlike thin paper stickers, Tabstick decals feature a durable protective matte laminate that resists water, sun exposure, oil, and scratches."
                }
            },
            {
                "@type": "Question",
                "name": "Are Tabstick stickers completely waterproof and weatherproof?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes, 100%. All Tabstick stickers are fully waterproof, monsoon-tested, and dishwasher safe for outdoor car bumpers, motorcycles, helmets, and hydro flasks."
                }
            },
            {
                "@type": "Question",
                "name": "Will Tabstick stickers leave sticky residue when removed?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "No. Tabstick uses a specialized residue-free acrylic adhesive. When peeled from MacBooks, laptops, or car paint, it leaves zero gooey residue."
                }
            },
            {
                "@type": "Question",
                "name": "How do I apply and remove Tabstick stickers for best results?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Clean and dry the surface. Peel the sticker from its easy-peel backing and smooth down from center to edges. To remove, peel slowly at a 45-degree angle."
                }
            },
            {
                "@type": "Question",
                "name": "What are the shipping and delivery timelines across India?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Orders are dispatched within 24 to 48 hours. Delivery takes 2 to 4 business days for metro cities and 3 to 6 business days for the rest of India."
                }
            },
            {
                "@type": "Question",
                "name": "Can I order custom stickers in India for startups, colleges, or events?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes! Tabstick manufactures custom die-cut vinyl stickers for tech startups, college fests, and creators in India. Email hello@tabstick.in for details."
                }
            },
            {
                "@type": "Question",
                "name": "Who is the founder of Tabstick?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Mayank Malhotra is the founder of Tabstick. Tabstick is an Indian sticker brand founded by Mayank Malhotra. We create creative and durable stickers for laptops, cars, phones and college students."
                }
            }
        ]
    }
    </script>
</section>

<!-- ==========================================================================
     8. CUSTOMER REVIEWS: ANIMATED ASYMMETRICAL QUOTE CARDS
     ========================================================================== -->
<section id="reviews" class="reviews-pop-section">
    <div class="container">
        <div class="section-pop-header reveal-on-scroll">
            <div class="section-pop-badge bg-pink">
                <span>✦ PROOF THAT STICKS ✦</span>
            </div>
            <h2 class="section-pop-title">STUCK ON TABSTICK</h2>
            <p class="section-pop-subtitle">
                Over 25,000+ laptops, bottles, cars &amp; bikes upgraded. Here's what the community is saying.
            </p>
        </div>

        <div class="reviews-pop-grid">
            <!-- Review 1 -->
            <div class="review-pop-card tilt-left reveal-on-scroll">
                <div class="review-stars-row">★★★★★</div>
                <p class="review-quote-text">
                    “Covered my entire MacBook Pro M3 with Tabstick drops. The colors pop insanely well in daylight and the matte finish feels premium under hand. Zero peel even after 6 months of daily backpack abuse!”
                </p>
                <div class="review-author-row">
                    <div class="author-avatar-badge bg-yellow">💻</div>
                    <div>
                        <strong class="author-name">Arjun S.</strong>
                        <span class="author-tag">Frontend Dev • Bengaluru</span>
                    </div>
                    <span class="verified-buyer-pill">✓ Verified</span>
                </div>
            </div>

            <!-- Review 2 -->
            <div class="review-pop-card tilt-right reveal-on-scroll">
                <div class="review-stars-row">★★★★★</div>
                <p class="review-quote-text">
                    “Put the ‘Wasted’ and meme decals on my Royal Enfield petrol tank. Survived heavy Mumbai monsoon rains, mud, and water washes with zero damage. Genuinely 100% waterproof.”
                </p>
                <div class="review-author-row">
                    <div class="author-avatar-badge bg-red">🏍️</div>
                    <div>
                        <strong class="author-name">Rohan V.</strong>
                        <span class="author-tag">Rider • Mumbai</span>
                    </div>
                    <span class="verified-buyer-pill">✓ Verified</span>
                </div>
            </div>

            <!-- Review 3 -->
            <div class="review-pop-card tilt-straight reveal-on-scroll">
                <div class="review-stars-row">★★★★★</div>
                <p class="review-quote-text">
                    “The Mystery Pack is the best value hands down. Got 12 dope holographic &amp; die-cut anime stickers. The packaging had so much personality and arrived in 48 hours in Delhi!”
                </p>
                <div class="review-author-row">
                    <div class="author-avatar-badge bg-blue">🎨</div>
                    <div>
                        <strong class="author-name">Sneha K.</strong>
                        <span class="author-tag">Designer • New Delhi</span>
                    </div>
                    <span class="verified-buyer-pill">✓ Verified</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     7. INSTAGRAM-STYLE LIFESTYLE GALLERY: “SEEN IN THE WILD” (AUTO-SCROLLING)
     ========================================================================== -->
<section id="gallery" class="gallery-pop-section">
    <div class="container">
        <div class="section-pop-header reveal-on-scroll">
            <div class="section-pop-badge bg-yellow">
                <span>📸 STREETWEAR ON YOUR GEAR</span>
            </div>
            <h2 class="section-pop-title">SEEN IN THE WILD</h2>
            <p class="section-pop-subtitle">
                Tag <strong>@tabstick.in</strong> on Instagram to be featured on our official drop wall. Hover to pause.
            </p>
        </div>
    </div>

    <!-- Continuous Auto-Scrolling Track with Hover Pause -->
    <div class="lifestyle-autoscroll-container">
        <div class="lifestyle-autoscroll-track">
            <!-- Tile 1 -->
            <div class="gallery-tile">
                <div class="gallery-tile-inner">
                    <img src="{{ asset('images/hero-banner.webp') }}" alt="Stickers on Laptop" loading="lazy">
                    <div class="gallery-tile-overlay">
                        <span class="gallery-insta-handle">@tabstick.in</span>
                        <span class="gallery-gear-label">MacBook Air • Pop Drops</span>
                    </div>
                </div>
            </div>

            <!-- Tile 2 -->
            <div class="gallery-tile">
                <div class="gallery-tile-inner">
                    <img src="{{ asset('images/wasted.jpg') }}" alt="Wasted Sticker on Flask" loading="lazy">
                    <div class="gallery-tile-overlay">
                        <span class="gallery-insta-handle">@tabstick.in</span>
                        <span class="gallery-gear-label">Hydro Flask • Meme Pack</span>
                    </div>
                </div>
            </div>

            <!-- Tile 3 -->
            <div class="gallery-tile">
                <div class="gallery-tile-inner">
                    <img src="{{ asset('images/limited-edition.jpg') }}" alt="Limited Edition on Bike" loading="lazy">
                    <div class="gallery-tile-overlay">
                        <span class="gallery-insta-handle">@tabstick.in</span>
                        <span class="gallery-gear-label">Moto Helmet • Drop 04</span>
                    </div>
                </div>
            </div>

            <!-- Tile 4 -->
            <div class="gallery-tile">
                <div class="gallery-tile-inner">
                    <img src="{{ asset('images/ah-shit.jpg') }}" alt="Ah Shit on Skateboard" loading="lazy">
                    <div class="gallery-tile-overlay">
                        <span class="gallery-insta-handle">@tabstick.in</span>
                        <span class="gallery-gear-label">Skate Deck • Street Drop</span>
                    </div>
                </div>
            </div>

            <!-- Tile 5 -->
            <div class="gallery-tile">
                <div class="gallery-tile-inner">
                    <img src="{{ asset('images/fizzy-zero.jpg') }}" alt="Fizzy Pop on iPad" loading="lazy">
                    <div class="gallery-tile-overlay">
                        <span class="gallery-insta-handle">@tabstick.in</span>
                        <span class="gallery-gear-label">iPad Pro • Pop Art</span>
                    </div>
                </div>
            </div>

            <!-- Tile 6 -->
            <div class="gallery-tile">
                <div class="gallery-tile-inner">
                    <img src="{{ asset('images/mystery-box.jpg') }}" alt="Mystery Box Unboxing" loading="lazy">
                    <div class="gallery-tile-overlay">
                        <span class="gallery-insta-handle">@tabstick.in</span>
                        <span class="gallery-gear-label">Mystery Unboxing • Collector</span>
                    </div>
                </div>
            </div>

            <!-- DUPLICATED FOR SEAMLESS INFINITE LOOP -->
            <div class="gallery-tile">
                <div class="gallery-tile-inner">
                    <img src="{{ asset('images/hero-banner.webp') }}" alt="Stickers on Laptop" loading="lazy">
                    <div class="gallery-tile-overlay">
                        <span class="gallery-insta-handle">@tabstick.in</span>
                        <span class="gallery-gear-label">MacBook Air • Pop Drops</span>
                    </div>
                </div>
            </div>
            <div class="gallery-tile">
                <div class="gallery-tile-inner">
                    <img src="{{ asset('images/wasted.jpg') }}" alt="Wasted Sticker on Flask" loading="lazy">
                    <div class="gallery-tile-overlay">
                        <span class="gallery-insta-handle">@tabstick.in</span>
                        <span class="gallery-gear-label">Hydro Flask • Meme Pack</span>
                    </div>
                </div>
            </div>
            <div class="gallery-tile">
                <div class="gallery-tile-inner">
                    <img src="{{ asset('images/limited-edition.jpg') }}" alt="Limited Edition on Bike" loading="lazy">
                    <div class="gallery-tile-overlay">
                        <span class="gallery-insta-handle">@tabstick.in</span>
                        <span class="gallery-gear-label">Moto Helmet • Drop 04</span>
                    </div>
                </div>
            </div>
            <div class="gallery-tile">
                <div class="gallery-tile-inner">
                    <img src="{{ asset('images/ah-shit.jpg') }}" alt="Ah Shit on Skateboard" loading="lazy">
                    <div class="gallery-tile-overlay">
                        <span class="gallery-insta-handle">@tabstick.in</span>
                        <span class="gallery-gear-label">Skate Deck • Street Drop</span>
                    </div>
                </div>
            </div>
            <div class="gallery-tile">
                <div class="gallery-tile-inner">
                    <img src="{{ asset('images/fizzy-zero.jpg') }}" alt="Fizzy Pop on iPad" loading="lazy">
                    <div class="gallery-tile-overlay">
                        <span class="gallery-insta-handle">@tabstick.in</span>
                        <span class="gallery-gear-label">iPad Pro • Pop Art</span>
                    </div>
                </div>
            </div>
            <div class="gallery-tile">
                <div class="gallery-tile-inner">
                    <img src="{{ asset('images/mystery-box.jpg') }}" alt="Mystery Box Unboxing" loading="lazy">
                    <div class="gallery-tile-overlay">
                        <span class="gallery-insta-handle">@tabstick.in</span>
                        <span class="gallery-gear-label">Mystery Unboxing • Collector</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     8. NEWSLETTER SIGNUP WITH ANIMATED STICKER MASCOT: “STICK WITH US.”
     ========================================================================== -->
<section id="newsletter" class="newsletter-pop-section">
    <div class="container">
        <div class="newsletter-pop-card reveal-on-scroll">
            <div class="newsletter-grid">
                <!-- Mascot Column with Interactive Animated Eyes -->
                <div class="mascot-col">
                    <div class="mascot-character-wrap">
                        <div class="mascot-body-badge">
                            <!-- SVG Playful Mascot with Eye-Tracking Pupils -->
                            <svg width="180" height="180" viewBox="0 0 160 160" fill="none">
                                <!-- Mascot Shadow -->
                                <ellipse cx="80" cy="148" rx="55" ry="10" fill="#18181B" opacity="0.2"/>
                                <!-- Mascot Body Blob -->
                                <path d="M80 12C118 12 144 38 144 76C144 116 116 142 80 142C44 142 16 116 16 76C16 38 42 12 80 12Z" fill="#FFE600" stroke="#18181B" stroke-width="4"/>
                                <!-- Peel Corner -->
                                <path d="M125 24L144 43L125 43Z" fill="#FF334B" stroke="#18181B" stroke-width="3"/>
                                <!-- Left Eye Outer -->
                                <circle cx="56" cy="68" r="18" fill="#FFFFFF" stroke="#18181B" stroke-width="3.5"/>
                                <!-- Left Eye Pupil (Tracks Cursor) -->
                                <circle cx="56" cy="68" r="8" fill="#18181B" class="mascot-pupil"/>
                                <circle cx="53" cy="65" r="2.5" fill="#FFFFFF"/>
                                <!-- Right Eye Outer -->
                                <circle cx="104" cy="68" r="18" fill="#FFFFFF" stroke="#18181B" stroke-width="3.5"/>
                                <!-- Right Eye Pupil (Tracks Cursor) -->
                                <circle cx="104" cy="68" r="8" fill="#18181B" class="mascot-pupil"/>
                                <circle cx="101" cy="65" r="2.5" fill="#FFFFFF"/>
                                <!-- Blushing Cheeks -->
                                <ellipse cx="40" cy="88" rx="8" ry="5" fill="#FF80BF"/>
                                <ellipse cx="120" cy="88" rx="8" ry="5" fill="#FF80BF"/>
                                <!-- Playful Smile -->
                                <path d="M62 96C72 110 88 110 98 96" stroke="#18181B" stroke-width="4" stroke-linecap="round"/>
                                <path d="M74 104C77 108 83 108 86 104" fill="#FF334B"/>
                            </svg>
                        </div>
                        <span class="mascot-tag-chip">STICKY • THE MASCOT</span>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="newsletter-content-col">
                    <div class="newsletter-eyebrow">✦ SECRET DROP CLUB ✦</div>
                    <h2 class="newsletter-headline">STICK WITH US.</h2>
                    <p class="newsletter-subtext">
                        Join 25,000+ sticker collectors. Claim an instant <strong>10% discount code</strong> (`TABSTICK10`) for your first drop and get notified about secret meme releases.
                    </p>

                    <form class="pop-newsletter-form" onsubmit="event.preventDefault(); const inp = this.querySelector('input'); if(inp && inp.value){ const mInp = document.getElementById('lead_email'); if(mInp){ mInp.value = inp.value; } } document.getElementById('floating-lead-trigger')?.click();">
                        <div class="newsletter-input-group">
                            <input type="email" placeholder="Enter your email address..." class="pop-newsletter-input" required autocomplete="email">
                            <button type="submit" class="btn-pop-primary btn-newsletter-submit trigger-confetti" data-confetti="true">
                                <span>Get 10% Off 🎁</span>
                            </button>
                        </div>
                        <small class="newsletter-privacy-note">🔒 No spam ever. One email per week with fresh drops. Unsubscribe anytime.</small>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
