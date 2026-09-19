@extends('layouts.app')

@section('content')

<!-- 1. HERO SECTION (IMAGE 1: STEP INTO STICKER UNIVERSE) -->
<section class="hero-banner-section">
    <a href="#shop">
        <img src="{{ asset('images/hero-banner.webp') }}" alt="Step Into Sticker Universe" class="hero-banner-img">
    </a>
</section>

<!-- 2. HIGH ENERGY TICKER MARQUEE -->
<div class="marquee-bar">
    <div class="marquee-content">
        ⚡ EXPLORE 5000+ DESIGNS &nbsp;•&nbsp; 100% WATERPROOF &nbsp;•&nbsp; SCRATCHPROOF &nbsp;•&nbsp; UV RESISTANT &nbsp;•&nbsp; RESIDUE FREE &nbsp;•&nbsp; FREE SHIPPING ON PREPAID &nbsp;•&nbsp; ⚡ EXPLORE 5000+ DESIGNS &nbsp;•&nbsp; 100% WATERPROOF &nbsp;•&nbsp; SCRATCHPROOF &nbsp;•&nbsp; UV RESISTANT &nbsp;•&nbsp; RESIDUE FREE &nbsp;•&nbsp; FREE SHIPPING ON PREPAID &nbsp;•&nbsp;
    </div>
</div>

<!-- 3. BRAND NEW DESIGNS / NEW COLLECTION (IMAGE 2) -->
<div id="new-collection">
    <div class="striped-divider"></div>
    <section class="new-collection-section">
        <div class="container">
            <div class="banner-responsive-wrap">
                <a href="#shop">
                    <img src="{{ asset('images/new-collection.jpg') }}" alt="Brand New Designs Just Dropped">
                </a>
            </div>
        </div>
    </section>
</div>

<!-- 4. BEST SELLERS PRODUCT GRID (IMAGE 3) -->
<section id="shop" class="products-section">
    <div class="container">
        <div class="section-title-wrap">
            <h2 class="section-watermark">Most Loved</h2>
            <h3 class="section-main-title">BEST SELLERS</h3>
            
            <div class="filter-tabs">
                <button class="tab-pill active" onclick="filterTab(this, 'all')">STICKERS</button>
                <button class="tab-pill" onclick="filterTab(this, 'clothing')">CLOTHING</button>
            </div>
        </div>

        <div class="products-grid">
            @forelse($products as $product)
                @php
                    $regularPrice = max(79.00, $product->price * 2);
                    $savings = max(0, $regularPrice - $product->price);
                    $imgSrc = $product->image ? (str_starts_with($product->image, 'http') ? $product->image : (str_starts_with($product->image, 'images/') ? asset($product->image) : asset('storage/'.$product->image))) : null;
                @endphp
                <article class="product-card" data-category="{{ $product->category?->slug ?? 'stickers' }}">
                    @if($savings > 0)
                        <div class="card-save-badge">Save Rs. {{ number_format($savings, 2) }}</div>
                    @endif

                    <a href="{{ route('products.show', $product) }}" class="card-image-wrap">
                        @if($imgSrc)
                            <img src="{{ $imgSrc }}" alt="{{ $product->name }}" loading="lazy">
                        @else
                            <span style="font-size:4.5rem;">{{ $product->emoji ?: '✨' }}</span>
                        @endif
                        
                        <div class="quick-view-btn" title="Quick view">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                    </a>

                    <h4 class="product-card-title">
                        <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                    </h4>

                    <div class="card-ratings">
                        <span class="stars-gold">★★★★★</span>
                        <span class="review-count">(778)</span>
                    </div>

                    <div class="card-pricing-row">
                        @if($savings > 0)
                            <span class="price-regular-strike">Rs. {{ number_format($regularPrice, 2) }}</span>
                            <span class="price-discount-pill">-Rs. {{ number_format($savings, 0) }}</span>
                        @endif
                        <span class="price-final-sale">Rs. {{ number_format($product->price, 2) }}</span>
                    </div>

                    <form action="{{ route('cart.add', $product) }}" method="POST" style="margin-top:auto;">
                        @csrf
                        <button type="submit" class="btn-add-to-cart">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            Add to cart
                        </button>
                    </form>
                </article>
            @empty
                <div style="grid-column: 1/-1; text-align:center; padding: 60px 20px;">
                    <p style="font-size:1.2rem; color:#64748b;">Fresh drops are arriving soon!</p>
                </div>
            @endforelse
        </div>

        <div class="section-footer-cta">
            <a href="#shop" class="btn-view-all">View all</a>
        </div>
    </div>
</section>

<!-- 5. WHY STICKITUP SECTION (IMAGE 4: BUILT TO LAST) -->
<section id="why" class="why-section">
    <div class="container">
        <div class="banner-responsive-wrap" style="border: 1px solid #27272a;">
            <img src="{{ asset('images/why-banner.webp') }}" alt="Why Stickitup - Built to last, designed to stand out">
        </div>

        <div class="features-grid">
            <div class="feature-item">
                <div class="feature-icon-box">🚚</div>
                <div class="feature-text">
                    <strong>SHIPPED IN 48 HRS</strong>
                    <span>Pan India delivery</span>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-icon-box">🎖️</div>
                <div class="feature-text">
                    <strong>TOP GRADE MATERIAL</strong>
                    <span>Uv &amp; waterproof</span>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-icon-box">📦</div>
                <div class="feature-text">
                    <strong>5000+ DESIGNS</strong>
                    <span>Always dropping new</span>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-icon-box">🇮🇳</div>
                <div class="feature-text">
                    <strong>PROUDLY INDIAN</strong>
                    <span>Designed &amp; made in india</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6. ABOUT THE FOUNDER SECTION -->
<section id="author" class="author-section">
    <div class="container">
        <div class="author-grid">
            <div class="author-image-col">
                <div class="author-card-wrap">
                    <img src="{{ asset('images/author.jpg') }}" alt="Founder &amp; Creator" class="author-portrait">
                    <div class="author-floating-badge">
                        <span>FOUNDER &amp; CREATOR ✦</span>
                    </div>
                </div>
            </div>
            <div class="author-content-col">
                <span class="author-eyebrow">ABOUT THE FOUNDER</span>
                <h2 class="author-heading">Turning Passion Into <span class="text-highlight">Everyday Art</span>.</h2>
                <p class="author-bio">
                    Hey! Welcome to STICK IT UP. We believe your gear should speak your mind. What began as a love for stickers, pop culture, and bold design has grown into a community of over 10 lakh creators, riders, gamers, and dreamers across India.
                </p>
                <p class="author-bio">
                    Every design is carefully curated, printed on premium waterproof vinyl, and built to survive the sun, rain, and everyday grind. No peeling, no fading, and zero sticky residue.
                </p>
                
                <div class="author-stats-row">
                    <div class="stat-box">
                        <strong class="stat-num">10L+</strong>
                        <span class="stat-desc">Stickers Delivered</span>
                    </div>
                    <div class="stat-box">
                        <strong class="stat-num">5000+</strong>
                        <span class="stat-desc">Custom Designs</span>
                    </div>
                    <div class="stat-box">
                        <strong class="stat-num">4.7★</strong>
                        <span class="stat-desc">Customer Rating</span>
                    </div>
                </div>

                <div style="margin-top: 32px;">
                    <a href="#shop" class="btn-author-cta">Shop Founder's Picks →</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    function filterTab(btn, category) {
        document.querySelectorAll('.tab-pill').forEach(el => el.classList.remove('active'));
        btn.classList.add('active');
        const cards = document.querySelectorAll('.product-card');
        if (category === 'all') {
            cards.forEach(c => c.style.display = 'flex');
        } else {
            cards.forEach(c => {
                const cat = c.getAttribute('data-category');
                c.style.display = (cat === category) ? 'flex' : 'none';
            });
        }
    }
</script>
@endpush
