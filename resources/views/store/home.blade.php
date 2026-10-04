@extends('layouts.app')

@section('title', 'Tabstick – Anti-Tarnish 18K Gold Plated Fine Jewelry')
@section('meta_description', 'Discover anti-tarnish, water-resistant, hypoallergenic 18K gold-plated fine jewelry by Tabstick. Shop rings, necklaces, bracelets, earrings & charms online in India.')
@section('canonical', 'https://tabstick.in')

@section('content')

<!-- ==========================================================================
     1. JEWELS GALAXY MASTER LUXURY HERO SECTION
     ========================================================================== -->
<section class="jg-collection-hero">
    <div class="container">
        <nav class="jg-breadcrumb" aria-label="Breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span class="jg-bc-separator">/</span>
            <a href="{{ route('home') }}#shop">Collections</a>
            <span class="jg-bc-separator">/</span>
            <span class="jg-bc-current">Fine Jewelry</span>
        </nav>

        <div class="jg-hero-header-wrap text-center">
            <div class="jg-hero-badge-wrap">
                <span class="jg-subheading-badge jg-hero-pill-badge">
                    <span class="badge-sparkle">✦</span> 18K REAL GOLD PLATED • WATER &amp; SWEATPROOF • ANTI-TARNISH <span class="badge-sparkle">✦</span>
                </span>
            </div>
            
            <h1 class="jg-collection-main-title">
                Everyday Luxury Handcrafted <br class="hide-on-mobile">to Never Tarnish
            </h1>
            
            <p class="jg-collection-subtitle">
                Explore {{ number_format($totalProductsCount ?? 599) }}+ anti-tarnish, hypoallergenic fine jewelry pieces crafted with 18K vacuum gold plating for everyday luxury by Tabstick Fine Jewelry. Wear in the shower, at the gym, and everywhere life takes you.
            </p>

            <!-- Dual Luxury CTA Buttons -->
            <div class="jg-hero-cta-group">
                <a href="#shop" class="jg-hero-btn-primary">
                    <span>Shop All Jewelry ({{ number_format($totalProductsCount ?? 599) }}) ✦</span>
                </a>
                <a href="#categories-showcase" class="jg-hero-btn-secondary">
                    <span>Browse By Category ✧</span>
                </a>
            </div>
        </div>

        <!-- 5 Key Promises Trust Bar with Bespoke Luxury Badges -->
        <div class="jg-hero-trust-bar">
            <div class="jg-trust-pill">
                <span class="jg-trust-icon-box">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </span>
                <div class="jg-trust-pill-text">
                    <strong>18K Real Gold Plated</strong>
                    <small>10x Vacuum Ion Plating</small>
                </div>
            </div>

            <div class="jg-trust-pill">
                <span class="jg-trust-icon-box">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 2.69l5.66 5.66a8 8 0 11-11.31 0z"/>
                    </svg>
                </span>
                <div class="jg-trust-pill-text">
                    <strong>100% Water &amp; Sweatproof</strong>
                    <small>Shower, Gym &amp; Pool Safe</small>
                </div>
            </div>

            <div class="jg-trust-pill">
                <span class="jg-trust-icon-box">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </span>
                <div class="jg-trust-pill-text">
                    <strong>6-Month Warranty</strong>
                    <small>Anti-Tarnish Replacement</small>
                </div>
            </div>

            <div class="jg-trust-pill">
                <span class="jg-trust-icon-box">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </span>
                <div class="jg-trust-pill-text">
                    <strong>Hypoallergenic</strong>
                    <small>100% Skin Safe &amp; Nickel Free</small>
                </div>
            </div>

            <div class="jg-trust-pill hide-on-mobile">
                <span class="jg-trust-icon-box">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                    </svg>
                </span>
                <div class="jg-trust-pill-text">
                    <strong>Pan-India Express</strong>
                    <small>Dispatched in 24–48 Hours</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     2. CIRCULAR CATEGORY SHOWCASE (JEWELS GALAXY SIGNATURE DESIGN)
     ========================================================================== -->
<section class="jg-categories-showcase" id="categories-showcase">
    <div class="container">
        <div class="jg-section-header text-center">
            <span class="jg-subheading-badge">CURATED CATEGORIES</span>
            <h2 class="jg-section-heading">SHOP BY CATEGORY</h2>
            <p class="jg-section-subtext">Discover handcrafted luxury jewelry designed to elevate every occasion.</p>
        </div>

        <div class="jg-category-circles-grid">
            @php
                $categoryData = [
                    ['slug' => 'rings', 'name' => 'Rings', 'count' => '173 Items', 'badge' => 'Trending', 'img' => 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/SMNJG-RNG-5565-M-1-2x.jpg'],
                    ['slug' => 'charms-pendants', 'name' => 'Charms & Pendants', 'count' => '139 Items', 'badge' => 'Bestseller', 'img' => 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/MYN-PS-26419-A-M-4-2x_d216ff26-4967-4b3d-ac29-35c9fa45ac15.jpg'],
                    ['slug' => 'bracelets', 'name' => 'Bracelets', 'count' => '128 Items', 'badge' => 'Most Loved', 'img' => 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/SMNJG-BNG-3337-M-F1-2x.jpg'],
                    ['slug' => 'earrings', 'name' => 'Earrings', 'count' => '95 Items', 'badge' => 'New Drop', 'img' => 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/SMNJG-ERG-2690-M-F1-2x.jpg'],
                    ['slug' => 'necklaces', 'name' => 'Necklaces', 'count' => '41 Items', 'badge' => 'Classic', 'img' => 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/MYN-NCK-67053-M-1-2x.png'],
                    ['slug' => 'jewelry-sets', 'name' => 'Jewelry Sets', 'count' => '23 Items', 'badge' => 'Gift Ready', 'img' => 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/CT-CB-MIX-49645-M-1-2x.jpg'],
                ];
            @endphp

            @foreach($categoryData as $cat)
                <a href="?category={{ $cat['slug'] }}#shop" class="jg-cat-circle-card" data-slug="{{ $cat['slug'] }}">
                    <div class="jg-cat-img-wrapper">
                        <img src="{{ $cat['img'] }}" alt="{{ $cat['name'] }} – Tabstick Fine Jewelry" loading="lazy" class="jg-cat-circle-img">
                        <span class="jg-cat-floating-badge">{{ $cat['badge'] }}</span>
                    </div>
                    <h3 class="jg-cat-circle-title">{{ $cat['name'] }}</h3>
                    <span class="jg-cat-circle-count">{{ $cat['count'] }}</span>
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- ==========================================================================
     3. SCROLLING TICKER: JEWELS GALAXY LUXURY PROMISES
     ========================================================================== -->
<div class="ticker-pop-strip jg-ticker-strip">
    <div class="ticker-pop-track">
        <span class="ticker-unit"><span class="ticker-star">✦</span> 18K REAL GOLD PLATED</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> 100% WATER &amp; SWEATPROOF</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> ANTI-TARNISH FINISH</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> 6-MONTH REPLACEMENT WARRANTY</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> HYPOALLERGENIC &amp; SKIN SAFE</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> 599+ FINE PIECES</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> 48H PAN-INDIA DISPATCH</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> LUXURY GIFT PACKAGING</span>
        <!-- Duplicated for seamless infinite continuous loop -->
        <span class="ticker-unit"><span class="ticker-star">✦</span> 18K REAL GOLD PLATED</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> 100% WATER &amp; SWEATPROOF</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> ANTI-TARNISH FINISH</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> 6-MONTH REPLACEMENT WARRANTY</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> HYPOALLERGENIC &amp; SKIN SAFE</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> 599+ FINE PIECES</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> 48H PAN-INDIA DISPATCH</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> LUXURY GIFT PACKAGING</span>
    </div>
</div>

<!-- ==========================================================================
     4. PRODUCT CATALOG GRID (EXACT JEWELS GALAXY /COLLECTIONS/ALL FORMAT)
     ========================================================================== -->
<section id="shop" class="jg-shop-section">
    <div class="container">
        <div class="jg-section-header text-center">
            <span class="jg-subheading-badge">TABSTICK FINE JEWELRY</span>
            <h2 class="jg-section-heading">DISCOVER THE COLLECTION</h2>
            <p class="jg-section-subtext">
                Anti-tarnish, waterproof, hypoallergenic luxury jewelry engineered for daily wear and special moments.
            </p>

            <!-- Dynamic Category Filter Tabs -->
            <div class="jg-filter-tabs-container">
                <div class="jg-filter-tabs" id="pop-category-tabs">
                    <button type="button" class="jg-filter-pill pop-filter-pill active" data-category="all">
                        <span class="jg-pill-dot">✦</span>
                        <span>ALL JEWELRY ({{ number_format($totalProductsCount ?? 599) }})</span>
                    </button>
                    @if(isset($categories))
                        @foreach($categories as $cat)
                            @if(!in_array($cat->slug, ['test-stickers', 'stickers', 'memes', 'glitter-holo', 'anime', 'cars-bikes', 'aesthetic', 'tech-dev', 'mystery-box', 'clothing', 'popular', 'laptop-stickers', 'bottle-stickers', 'bestsellers-stickers']))
                                <button type="button" class="jg-filter-pill pop-filter-pill" data-category="{{ $cat->slug }}">
                                    <span class="jg-pill-dot">✧</span>
                                    <span>{{ $cat->name }} ({{ number_format($cat->products_count) }})</span>
                                </button>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Live Search Bar & Realtime Count -->
            <div class="jg-search-wrap products-search-wrap">
                <div class="jg-search-bar products-search-bar">
                    <svg class="jg-search-svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="search" id="products-search-input" placeholder="Search 599+ fine jewelry pieces (e.g. Solitaire, Tennis, Evil Eye, Pearl, Chain...)" autocomplete="off">
                    <button type="button" id="products-search-clear" style="display:none;" aria-label="Clear search">✕</button>
                </div>
                <div class="jg-live-counter products-live-counter">
                    <span id="products-count-label">Showing <strong id="current-shown-count">{{ $products->count() }}</strong> of <strong id="total-matching-count">{{ number_format($totalProductsCount ?? 599) }}</strong> luxury designs</span>
                    <a href="{{ route('catalog.download') }}" class="jg-download-catalog-chip" title="Download Complete 599+ Fine Jewelry Catalog (CSV, JSON & Specs ZIP)">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="vertical-align:middle;margin-right:3px;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        <span>Download Catalog (ZIP)</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Product Cards Grid: Jewels Galaxy Luxury Card Grid -->
        <div class="jg-products-grid products-pop-grid" id="products-pop-grid">
            @forelse($products as $index => $product)
                @include('partials.product-card', ['product' => $product, 'index' => $index])
            @empty
                <div class="jg-products-empty-state" id="products-empty-message">
                    <span style="font-size:3rem;">💎</span>
                    <h3>No matching jewelry found!</h3>
                    <p>Try searching for something else or select a different category above.</p>
                </div>
            @endforelse
        </div>

        <!-- Lazy Loader Spinner -->
        <div class="products-lazy-loader" id="products-lazy-loader">
            <span class="spinner-gem-roll">✨</span>
            <span>UNBOXING MORE FINE JEWELRY PIECES...</span>
        </div>

        <!-- Manual Load More Button -->
        <div class="products-load-more-wrap" id="products-load-more-wrap">
            <button type="button" class="btn-load-more-drops jg-btn-load-more" id="btn-load-more-drops">
                <span>✨ Load More Jewelry (<span id="load-more-remaining-count">{{ max(0, ($totalProductsCount ?? 599) - $products->count()) }}</span> more)</span>
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
     5. CRAFTSMANSHIP & VALUE PROPOSITIONS (WHY CHOOSE JEWELS GALAXY)
     ========================================================================== -->
<section class="jg-why-section" id="craftsmanship">
    <div class="container">
        <div class="jg-section-header text-center">
            <span class="jg-subheading-badge">✦ THE TABSTICK STANDARD ✦</span>
            <h2 class="jg-section-heading">CRAFTED FOR ENDURING LUXURY</h2>
            <p class="jg-section-subtext">
                Unlike ordinary fashion jewelry that turns your skin green or fades within weeks, Tabstick Fine Jewelry is engineered with lasting durability.
            </p>
        </div>

        <div class="jg-why-grid">
            <!-- Feature 1 -->
            <div class="jg-why-card">
                <div class="jg-why-icon-box">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                <h3 class="jg-why-card-title">18K Real Gold Plated</h3>
                <p class="jg-why-card-desc">
                    Utilizing advanced vacuum ion-plating technology that deposits a 10x thicker layer of 18K real gold over surgical grade stainless steel for deep, radiant lustre.
                </p>
                <div class="jg-why-chips">
                    <span class="jg-why-chip">✦ 18K Real Gold</span>
                    <span class="jg-why-chip">✦ Mirror Polish</span>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="jg-why-card">
                <div class="jg-why-icon-box">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 2.69l5.66 5.66a8 8 0 11-11.31 0z"/>
                    </svg>
                </div>
                <h3 class="jg-why-card-title">100% Water &amp; Sweatproof</h3>
                <p class="jg-why-card-desc">
                    Wear your jewelry effortlessly in showers, during gym workouts, beach vacations, and humid monsoons without ever worrying about tarnishing or discoloration.
                </p>
                <div class="jg-why-chips">
                    <span class="jg-why-chip">💧 Shower Proof</span>
                    <span class="jg-why-chip">🏋️ Gym Proof</span>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="jg-why-card">
                <div class="jg-why-icon-box">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="jg-why-card-title">6-Month Comprehensive Warranty</h3>
                <p class="jg-why-card-desc">
                    We stand behind our craftsmanship 100%. If your piece ever tarnishes, fades, or breaks under everyday wear, we replace or re-plate it free of charge.
                </p>
                <div class="jg-why-chips">
                    <span class="jg-why-chip">🛡️ Zero Hassle</span>
                    <span class="jg-why-chip">🔄 Free Replacement</span>
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="jg-why-card">
                <div class="jg-why-icon-box">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h3 class="jg-why-card-title">Hypoallergenic &amp; Skin Safe</h3>
                <p class="jg-why-card-desc">
                    100% Lead, Nickel, and Cadmium-free. Safe for even the most sensitive skin types. No redness, no rashes, and guaranteed zero green skin.
                </p>
                <div class="jg-why-chips">
                    <span class="jg-why-chip">🌿 Nickel Free</span>
                    <span class="jg-why-chip">👌 Sensitive Skin</span>
                </div>
            </div>
        </div>

        <!-- Jewels Galaxy vs Traditional Jewelry Comparison Matrix -->
        <div class="jg-comparison-wrap">
            <div class="jg-comparison-header text-center">
                <span class="jg-subheading-badge">WHY WE OUTPERFORM</span>
                <h3 class="jg-comparison-title">Tabstick vs. Traditional Fashion Jewelry</h3>
            </div>

            <div class="jg-comparison-table-wrap">
                <table class="jg-comparison-table">
                    <thead>
                        <tr>
                            <th>Feature</th>
                            <th class="col-highlight">✨ Tabstick Fine Jewelry</th>
                            <th>Traditional Fashion Jewelry</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Gold Plating Process</strong></td>
                            <td class="col-highlight"><span class="check-icon">✓</span> 18K Real Gold Vacuum Ion-Plated (10x Thicker)</td>
                            <td><span class="cross-icon">✕</span> Cheap flash dip (0.05 micron, fades in days)</td>
                        </tr>
                        <tr>
                            <td><strong>Water &amp; Sweat Resistance</strong></td>
                            <td class="col-highlight"><span class="check-icon">✓</span> 100% Waterproof (Wear in shower, gym &amp; pool)</td>
                            <td><span class="cross-icon">✕</span> Tarnishes &amp; turns dark after 1-2 washes</td>
                        </tr>
                        <tr>
                            <td><strong>Skin Safety Guarantee</strong></td>
                            <td class="col-highlight"><span class="check-icon">✓</span> 100% Hypoallergenic • Zero green skin promise</td>
                            <td><span class="cross-icon">✕</span> Leaves green stains, rashes &amp; itchiness</td>
                        </tr>
                        <tr>
                            <td><strong>Core Base Metal</strong></td>
                            <td class="col-highlight"><span class="check-icon">✓</span> 316L Surgical Stainless Steel</td>
                            <td><span class="cross-icon">✕</span> Cheap brass, copper or toxic zinc alloys</td>
                        </tr>
                        <tr>
                            <td><strong>Warranty &amp; Replacement</strong></td>
                            <td class="col-highlight"><span class="check-icon">✓</span> 6-Month Anti-Tarnish Guarantee Replacement</td>
                            <td><span class="cross-icon">✕</span> No warranty, no exchanges</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     6. VERIFIED CUSTOMER REVIEWS
     ========================================================================== -->
<section class="jg-reviews-section" id="reviews">
    <div class="container">
        <div class="jg-section-header text-center">
            <span class="jg-subheading-badge">✦ CUSTOMER LOVE ✦</span>
            <h2 class="jg-section-heading">WHAT OUR CUSTOMERS SAY</h2>
            <p class="jg-section-subtext">Over 50,000+ satisfied buyers across India enjoying everyday fine jewelry.</p>
        </div>

        <div class="jg-reviews-grid">
            <div class="jg-review-card">
                <div class="jg-review-stars">★★★★★</div>
                <p class="jg-review-quote">
                    “The Aura Solitaire Ring looks identical to solid 18K gold! I've worn it daily for 4 months through handwashes, gym workouts, and dishwashing without a single scratch or fade. Exceptional quality!”
                </p>
                <div class="jg-review-author">
                    <div class="jg-author-avatar">AS</div>
                    <div>
                        <span class="jg-author-name">Ananya Sharma</span>
                        <span class="jg-author-location">Mumbai • Verified Buyer</span>
                    </div>
                    <span class="jg-verified-badge">✓ Verified</span>
                </div>
            </div>

            <div class="jg-review-card">
                <div class="jg-review-stars">★★★★★</div>
                <p class="jg-review-quote">
                    “I have sensitive skin that usually breaks out with imitation jewelry. Tabstick pieces are truly hypoallergenic and comfortable. The packaging felt like receiving a luxury boutique gift!”
                </p>
                <div class="jg-review-author">
                    <div class="jg-author-avatar">PN</div>
                    <div>
                        <span class="jg-author-name">Pooja Nair</span>
                        <span class="jg-author-location">Bengaluru • Verified Buyer</span>
                    </div>
                    <span class="jg-verified-badge">✓ Verified</span>
                </div>
            </div>

            <div class="jg-review-card">
                <div class="jg-review-stars">★★★★★</div>
                <p class="jg-review-quote">
                    “Ordered 3 necklaces and a tennis bracelet. The shine and stone clarity is breathtaking. Delivery arrived within 48 hours in Delhi NCR with complete tracking. Highly recommend!”
                </p>
                <div class="jg-review-author">
                    <div class="jg-author-avatar">RK</div>
                    <div>
                        <span class="jg-author-name">Rhea Kapur</span>
                        <span class="jg-author-location">New Delhi • Verified Buyer</span>
                    </div>
                    <span class="jg-verified-badge">✓ Verified</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     7. FREQUENTLY ASKED QUESTIONS (WITH FAQPAGe SCHEMA)
     ========================================================================== -->
<section class="jg-faq-section" id="faq">
    <div class="container">
        <div class="jg-section-header text-center">
            <span class="jg-subheading-badge">✦ EVERYTHING YOU NEED TO KNOW ✦</span>
            <h2 class="jg-section-heading">FREQUENTLY ASKED QUESTIONS</h2>
            <p class="jg-section-subtext">Clear answers on materials, anti-tarnish warranty, care, and delivery.</p>
        </div>

        <div class="jg-faq-accordion-wrap">
            <details class="jg-faq-item" open>
                <summary class="jg-faq-question">
                    <span>Will Tabstick fine jewelry tarnish or turn black?</span>
                    <span class="jg-faq-toggle-icon">+</span>
                </summary>
                <div class="jg-faq-answer">
                    <p>No. All Tabstick pieces are crafted using 18K vacuum ion-plating over surgical stainless steel, making them 10x more resistant to corrosion and moisture than standard plated jewelry.</p>
                </div>
            </details>

            <details class="jg-faq-item">
                <summary class="jg-faq-question">
                    <span>Can I wear this jewelry in the shower, gym, or swimming pool?</span>
                    <span class="jg-faq-toggle-icon">+</span>
                </summary>
                <div class="jg-faq-answer">
                    <p>Yes! Our jewelry is 100% waterproof and sweatproof for daily wear in showers, workouts, and swimming.</p>
                </div>
            </details>

            <details class="jg-faq-item">
                <summary class="jg-faq-question">
                    <span>How does the 6-Month Warranty work?</span>
                    <span class="jg-faq-toggle-icon">+</span>
                </summary>
                <div class="jg-faq-answer">
                    <p>Every purchase comes with a 6-month warranty against discoloration, plating fading, or manufacturing defects with free replacements.</p>
                </div>
            </details>

            <details class="jg-faq-item">
                <summary class="jg-faq-question">
                    <span>What are the shipping and delivery timelines across India?</span>
                    <span class="jg-faq-toggle-icon">+</span>
                </summary>
                <div class="jg-faq-answer">
                    <p>Orders are dispatched within 24 to 48 hours. Delivery takes 2 to 4 business days for metro cities and 3 to 6 business days across India.</p>
                </div>
            </details>
        </div>
    </div>

    <!-- Hidden SEO & Founder Verification Semantic Elements -->
    <div style="display:none;" aria-hidden="true">
        <p>Tabstick is an Indian fine jewelry brand founded by Mayank Malhotra. We create anti-tarnish, water-resistant and hypoallergenic 18K gold-plated jewelry for everyday luxury.</p>
        <p>Mayank Malhotra is the founder of Tabstick.</p>
        <a href="https://www.linkedin.com/in/maayank-malhotra-a59a55186/">Founder LinkedIn</a>
        <div id="rings-collection">Fine Jewelry Rings</div>
        <div id="charms-pendants">Charms &amp; Pendants</div>
        <div id="bracelets-collection">Bracelets &amp; Bangles</div>
        <div id="earrings-collection">Earrings Collection</div>
        <div id="necklaces-collection">Necklaces &amp; Chokers</div>
    </div>

    <!-- JSON-LD FAQPage Schema -->
    @php
    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => [
            [
                '@type' => 'Question',
                'name' => 'Will Tabstick fine jewelry tarnish or turn black?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'No. All Tabstick pieces are crafted using 18K vacuum ion-plating over surgical stainless steel, making them 10x more resistant to corrosion and moisture than standard plated jewelry.',
                ],
            ],
            [
                '@type' => 'Question',
                'name' => 'Can I wear this jewelry in the shower, gym, or swimming pool?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Yes! Our jewelry is 100% waterproof and sweatproof for daily wear in showers, workouts, and swimming.',
                ],
            ],
            [
                '@type' => 'Question',
                'name' => 'How does the 6-Month Warranty work?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Every purchase comes with a 6-month warranty against discoloration, plating fading, or manufacturing defects with free replacements.',
                ],
            ],
            [
                '@type' => 'Question',
                'name' => 'What are the shipping and delivery timelines across India?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Orders are dispatched within 24 to 48 hours. Delivery takes 2 to 4 business days for metro cities and 3 to 6 business days across India.',
                ],
            ],
        ],
    ];
    @endphp
    <script type="application/ld+json">
    {!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
</section>

@endsection
