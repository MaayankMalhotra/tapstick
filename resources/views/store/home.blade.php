@extends('layouts.app')

@section('title', 'Tabstick – Creative Laptop, Car & Custom Stickers')
@section('meta_description', 'Tabstick creates creative, durable stickers for laptops, cars, phones and college students. Explore unique sticker designs and shop online in India.')
@section('canonical', 'https://tabstick.in')

@section('content')

<!-- ==========================================================================
     1. JEWELS GALAXY COLLECTION HERO BANNER (EXACT FOCAL THEME LAYOUT)
     ========================================================================== -->
<section class="jg-collection-hero">
    <div class="container">
        <nav class="jg-breadcrumb" aria-label="Breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span class="jg-bc-separator">/</span>
            <a href="{{ route('home') }}#shop">Collections</a>
            <span class="jg-bc-separator">/</span>
            <span class="jg-bc-current">All Products</span>
        </nav>

        <div class="jg-hero-header-wrap text-center">
            <span class="jg-subheading-badge">✦ THE TIMELESS 18K GOLD COLLECTION ✦</span>
            <h1 class="jg-collection-main-title">All Products</h1>
            <p class="jg-collection-subtitle">
                Explore {{ number_format($totalProductsCount ?? 599) }}+ anti-tarnish, water-resistant fine jewelry pieces crafted with 18K vacuum gold plating for everyday luxury by Jewels Galaxy.
            </p>
        </div>

        <!-- 4 Key Promises Trust Pills -->
        <div class="jg-hero-trust-bar">
            <div class="jg-trust-pill">
                <span class="jg-trust-icon">✨</span>
                <span>18K Real Gold Plated</span>
            </div>
            <div class="jg-trust-pill">
                <span class="jg-trust-icon">💧</span>
                <span>Water &amp; Sweatproof</span>
            </div>
            <div class="jg-trust-pill">
                <span class="jg-trust-icon">🛡️</span>
                <span>6-Month Warranty</span>
            </div>
            <div class="jg-trust-pill">
                <span class="jg-trust-icon">🌿</span>
                <span>Hypoallergenic &amp; Skin Safe</span>
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
                    ['slug' => 'rings', 'name' => 'Rings', 'count' => '173 Items', 'img' => 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/SMNJG-RNG-5565-M-1-2x.jpg'],
                    ['slug' => 'charms-pendants', 'name' => 'Charms & Pendants', 'count' => '139 Items', 'img' => 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/MYN-PS-26419-A-M-4-2x_d216ff26-4967-4b3d-ac29-35c9fa45ac15.jpg'],
                    ['slug' => 'bracelets', 'name' => 'Bracelets', 'count' => '128 Items', 'img' => 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/SMNJG-BNG-3337-M-F1-2x.jpg'],
                    ['slug' => 'earrings', 'name' => 'Earrings', 'count' => '95 Items', 'img' => 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/SMNJG-ERG-2690-M-F1-2x.jpg'],
                    ['slug' => 'necklaces', 'name' => 'Necklaces', 'count' => '41 Items', 'img' => 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/MYN-NCK-67053-M-1-2x.png'],
                    ['slug' => 'jewelry-sets', 'name' => 'Jewelry Sets', 'count' => '23 Items', 'img' => 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/CT-CB-MIX-49645-M-1-2x.jpg'],
                ];
            @endphp

            @foreach($categoryData as $cat)
                <a href="?category={{ $cat['slug'] }}#shop" class="jg-cat-circle-card" data-slug="{{ $cat['slug'] }}">
                    <div class="jg-cat-img-wrapper">
                        <img src="{{ $cat['img'] }}" alt="{{ $cat['name'] }} – Jewels Galaxy" loading="lazy" class="jg-cat-circle-img">
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
        <span class="ticker-unit"><span class="ticker-star">✦</span> 18K GOLD PLATED</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> WATER &amp; SWEAT PROOF</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> ANTI-TARNISH FINISH</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> 6-MONTH WARRANTY</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> HYPOALLERGENIC &amp; SKIN SAFE</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> 599+ FINE DESIGNS</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> 48H PAN-INDIA DISPATCH</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> LUXURY GIFT PACKAGING</span>
        <!-- Duplicated for seamless infinite continuous loop -->
        <span class="ticker-unit"><span class="ticker-star">✦</span> 18K GOLD PLATED</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> WATER &amp; SWEAT PROOF</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> ANTI-TARNISH FINISH</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> 6-MONTH WARRANTY</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> HYPOALLERGENIC &amp; SKIN SAFE</span>
        <span class="ticker-unit"><span class="ticker-star">✦</span> 599+ FINE DESIGNS</span>
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
            <span class="jg-subheading-badge">JEWELS GALAXY FINE JEWELRY</span>
            <h2 class="jg-section-heading">DISCOVER THE COLLECTION</h2>
            <p class="jg-section-subtext">
                Anti-tarnish, waterproof, hypoallergenic luxury jewelry engineered for daily wear and special moments.
            </p>

            <!-- Dynamic Category Filter Tabs -->
            <div class="jg-filter-tabs" id="pop-category-tabs">
                <button type="button" class="jg-filter-pill pop-filter-pill active" data-category="all">
                    <span>⚡ ALL JEWELRY ({{ number_format($totalProductsCount ?? 599) }})</span>
                </button>
                @if(isset($categories))
                    @foreach($categories as $cat)
                        @if($cat->slug !== 'test-stickers')
                            <button type="button" class="jg-filter-pill pop-filter-pill" data-category="{{ $cat->slug }}">
                                <span>{{ $cat->icon_emoji ?? '✨' }} {{ $cat->name }} ({{ number_format($cat->products_count) }})</span>
                            </button>
                        @endif
                    @endforeach
                @endif
            </div>

            <!-- Live Search Bar & Realtime Count -->
            <div class="jg-search-wrap products-search-wrap">
                <div class="jg-search-bar products-search-bar">
                    <span class="jg-search-icon">🔍</span>
                    <input type="search" id="products-search-input" placeholder="Search 599+ jewelry pieces (e.g. Solitaire Ring, Evil Eye, Tennis Bracelet, Pearl...)" autocomplete="off">
                    <button type="button" id="products-search-clear" style="display:none;" aria-label="Clear search">✕</button>
                </div>
                <div class="jg-live-counter products-live-counter">
                    <span id="products-count-label">Showing <strong id="current-shown-count">{{ $products->count() }}</strong> of <strong id="total-matching-count">{{ number_format($totalProductsCount ?? 599) }}</strong> designs</span>
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
            <span class="spinner-sticker-roll">✨</span>
            <span>UNBOXING MORE JEWELRY DROPS...</span>
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
            <span class="jg-subheading-badge">✦ THE JEWELS GALAXY STANDARD ✦</span>
            <h2 class="jg-section-heading">CRAFTED FOR ENDURING LUXURY</h2>
            <p class="jg-section-subtext">
                Unlike cheap fashion jewelry that turns your skin green or fades within weeks, Jewels Galaxy is engineered with fine jewelry durability.
            </p>
        </div>

        <div class="jg-why-grid">
            <!-- Feature 1 -->
            <div class="jg-why-card">
                <div class="jg-why-icon-box">✨</div>
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
                <div class="jg-why-icon-box">💧</div>
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
                <div class="jg-why-icon-box">🛡️</div>
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
                <div class="jg-why-icon-box">🌿</div>
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
                    “I have sensitive skin that usually breaks out with imitation jewelry. Jewels Galaxy pieces are truly hypoallergenic and comfortable. The packaging felt like receiving a luxury boutique gift!”
                </p>
                <div class="jg-review-author">
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
            <span class="jg-subheading-badge">✦ COMMON QUESTIONS ✦</span>
            <h2 class="jg-section-heading">FREQUENTLY ASKED QUESTIONS</h2>
            <p class="jg-section-subtext">Everything you need to know about our 18K gold plating, water resistance, warranty, and shipping.</p>
        </div>

        <div class="jg-faq-wrap">
            <div class="jg-faq-item">
                <button type="button" class="jg-faq-header faq-accordion-header" aria-expanded="false">
                    <span>Will Jewels Galaxy jewelry tarnish or turn black?</span>
                    <span class="faq-icon-cross">+</span>
                </button>
                <div class="jg-faq-body faq-accordion-body" style="display: none;">
                    No. All Jewels Galaxy pieces are crafted using 18K vacuum ion-plating over medical-grade stainless steel. This makes them 10x more resistant to corrosion, oxidation, sweat, and moisture than standard plated jewelry.
                </div>
            </div>

            <div class="jg-faq-item">
                <button type="button" class="jg-faq-header faq-accordion-header" aria-expanded="false">
                    <span>Can I wear this jewelry in the shower, gym, or swimming pool?</span>
                    <span class="faq-icon-cross">+</span>
                </button>
                <div class="jg-faq-body faq-accordion-body" style="display: none;">
                    Yes! Our jewelry is 100% waterproof and sweatproof. You can wear your rings, bracelets, and necklaces in the shower, during workouts, and in daily water contact without worrying about fading or damage.
                </div>
            </div>

            <div class="jg-faq-item">
                <button type="button" class="jg-faq-header faq-accordion-header" aria-expanded="false">
                    <span>How does the 6-Month Warranty work?</span>
                    <span class="faq-icon-cross">+</span>
                </button>
                <div class="jg-faq-body faq-accordion-body" style="display: none;">
                    Every purchase comes with a 6-month warranty against discoloration, plating fading, or manufacturing defects. If any issue arises, reach out to our customer support team with your order number for a prompt replacement.
                </div>
            </div>

            <div class="jg-faq-item">
                <button type="button" class="jg-faq-header faq-accordion-header" aria-expanded="false">
                    <span>What are the shipping and delivery timelines across India?</span>
                    <span class="faq-icon-cross">+</span>
                </button>
                <div class="jg-faq-body faq-accordion-body" style="display: none;">
                    Orders are dispatched within 24 to 48 hours. Metro deliveries (Mumbai, Delhi NCR, Bengaluru, Hyderabad, Kolkata, Chennai) take 2 to 4 business days, while other locations take 3 to 6 business days with live SMS tracking.
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden SEO & Founder Verification Semantic Elements -->
    <div style="display:none;" aria-hidden="true">
        <p>Tabstick is an Indian sticker brand founded by Mayank Malhotra. We create creative and durable stickers for laptops, cars, phones and college students.</p>
        <p>Mayank Malhotra is the founder of Tabstick.</p>
        <a href="https://www.linkedin.com/in/maayank-malhotra-a59a55186/">Founder LinkedIn</a>
        <div id="laptop-stickers">Laptop Stickers</div>
        <div id="car-stickers">Car &amp; Bike Stickers</div>
        <div id="phone-stickers">Phone Case Stickers</div>
        <div id="college-stickers">Stickers for College Students</div>
        <div id="custom-stickers">Custom Stickers in India</div>
    </div>

    <!-- JSON-LD FAQPage Schema -->
    @php
    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => [
            [
                '@type' => 'Question',
                'name' => 'Will Jewels Galaxy jewelry tarnish or turn black?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'No. All Jewels Galaxy pieces are crafted using 18K vacuum ion-plating over surgical stainless steel, making them 10x more resistant to corrosion and moisture than standard plated jewelry.',
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
