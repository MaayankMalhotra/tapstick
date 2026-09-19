@extends('layouts.app')

@section('content')

<!-- 1. TAPSTICK PLAYFUL POP HERO SECTION -->
<section class="tabstick-hero-section">
    <div class="container hero-container">
        <div class="hero-text-col">
            <div class="hero-badge">
                <span class="badge-spark">⚡</span> TAPSTICK ORIGINAL • 2026 POP DROP
            </div>
            <h1 class="hero-main-heading">
                PEEL. STICK.<br>
                <span class="hero-accent-red">STAND</span> <span class="hero-accent-blue">OUT.</span>
            </h1>
            <p class="hero-subtext">
                India's creative die-cut sticker studio. 100% waterproof, scratchproof vinyl with rich UV inks that won't fade in the sun or leave sticky goo on your gear.
            </p>
            <div class="hero-cta-group">
                <a href="#shop" class="btn-pop-primary">Shop Bestsellers 🛍️</a>
                <a href="#club" class="btn-pop-secondary">Tapstick Club ✦</a>
            </div>
            <div class="hero-perks-row">
                <div class="hero-perk-item">
                    <span class="perk-icon">🚚</span> 48h Pan-India Dispatch
                </div>
                <div class="hero-perk-item">
                    <span class="perk-icon">💧</span> 100% Waterproof Vinyl
                </div>
                <div class="hero-perk-item">
                    <span class="perk-icon">🇮🇳</span> Crafted in India
                </div>
            </div>
        </div>

        <div class="hero-visual-col">
            <div class="hero-stage-card">
                <div class="floating-sticker sticker-pos-1">
                    <img src="{{ asset('images/limited-edition.jpg') }}" alt="Limited Edition Sticker">
                    <span class="sticker-chip chip-red">🔥 HOT</span>
                </div>
                <div class="floating-sticker sticker-pos-2">
                    <img src="{{ asset('images/wasted.jpg') }}" alt="Wasted Sticker">
                    <span class="sticker-chip chip-yellow">⭐ POPULAR</span>
                </div>
                <div class="floating-sticker sticker-pos-3">
                    <img src="{{ asset('images/ah-shit.jpg') }}" alt="Ah Shit Here We Go Again">
                    <span class="sticker-chip chip-blue">👑 MEME</span>
                </div>
                <div class="floating-sticker sticker-pos-4">
                    <img src="{{ asset('images/fizzy-zero.jpg') }}" alt="Fizzy Zero Sticker">
                    <span class="sticker-chip chip-green">⚡ FRESH</span>
                </div>
                <div class="hero-center-badge">
                    <span>TAPSTICK</span>
                    <small>DIE-CUT VINYL • ORIGINAL</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. ANIMATED PRODUCT-QUALITY TICKER (HIGH ENERGY MARQUEE) -->
<div class="marquee-bar">
    <div class="marquee-content">
        <span class="marquee-chip chip-yellow">⭐ 100% WATERPROOF VINYL</span>
        <span class="marquee-chip chip-blue">⚡ SCRATCHPROOF MATTE FINISH</span>
        <span class="marquee-chip chip-red">🎨 ULTRA-VIBRANT UV INKS</span>
        <span class="marquee-chip chip-green">🚫 ZERO STICKY RESIDUE</span>
        <span class="marquee-chip chip-yellow">🚚 48H PAN-INDIA DISPATCH</span>
        <span class="marquee-chip chip-purple">📦 10 LAKH+ STICKERS SHIPPED</span>
        <span class="marquee-chip chip-blue">🇮🇳 PROUDLY CRAFTED IN INDIA</span>
        <span class="marquee-chip chip-red">✨ DIE-CUT PRECISION EDGES</span>
        <!-- Duplicate for seamless continuous loop -->
        <span class="marquee-chip chip-yellow">⭐ 100% WATERPROOF VINYL</span>
        <span class="marquee-chip chip-blue">⚡ SCRATCHPROOF MATTE FINISH</span>
        <span class="marquee-chip chip-red">🎨 ULTRA-VIBRANT UV INKS</span>
        <span class="marquee-chip chip-green">🚫 ZERO STICKY RESIDUE</span>
        <span class="marquee-chip chip-yellow">🚚 48H PAN-INDIA DISPATCH</span>
        <span class="marquee-chip chip-purple">📦 10 LAKH+ STICKERS SHIPPED</span>
        <span class="marquee-chip chip-blue">🇮🇳 PROUDLY CRAFTED IN INDIA</span>
        <span class="marquee-chip chip-red">✨ DIE-CUT PRECISION EDGES</span>
    </div>
</div>

<!-- 3. BRAND NEW DROPS / NEW COLLECTION BANNER -->
<div id="new-collection">
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

<!-- 4. BEST SELLERS PRODUCT GRID -->
<section id="shop" class="products-section">
    <div class="container">
        <div class="section-title-wrap">
            <h2 class="section-watermark">CURATED DROPS</h2>
            <h3 class="section-main-title">TAPSTICK BEST SELLERS</h3>
            <p class="section-subtitle">Ultra-durable vinyl stickers built for laptops, bottles, bikes &amp; phone cases.</p>
            
            <div class="filter-tabs">
                <button class="tab-pill active" onclick="filterTab(this, 'all')">ALL STICKERS</button>
                <button class="tab-pill" onclick="filterTab(this, 'stickers')">MEMES &amp; POP</button>
                <button class="tab-pill" onclick="filterTab(this, 'mystery-box')">MYSTERY PACKS</button>
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
                        <div class="card-save-badge">Save Rs. {{ number_format($savings, 0) }}</div>
                    @endif

                    <a href="{{ route('products.show', $product) }}" class="card-image-wrap">
                        @if($imgSrc)
                            <img src="{{ $imgSrc }}" alt="{{ $product->name }}" loading="lazy">
                        @else
                            <span style="font-size:4.5rem;">{{ $product->emoji ?: '✨' }}</span>
                        @endif
                        
                        <div class="quick-view-btn" title="View details">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                    </a>

                    <div class="card-meta-top">
                        <span class="category-chip">{{ $product->category?->name ?? 'Sticker' }}</span>
                        <div class="card-ratings">
                            <span class="stars-gold">★★★★★</span>
                            <span class="review-count">(778)</span>
                        </div>
                    </div>

                    <h4 class="product-card-title">
                        <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                    </h4>

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
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
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
            <a href="#shop" class="btn-view-all">Explore All 5000+ Stickers →</a>
        </div>
    </div>
</section>

<!-- 5. NEW “TAPSTICK CLUB” STORY & COMMUNITY SECTION -->
<section id="club" class="club-section">
    <div class="container">
        <div class="club-header">
            <span class="club-pill-tag">✦ THE COMMUNITY ✦</span>
            <h2 class="club-title">JOIN THE TAPSTICK CLUB</h2>
            <p class="club-subtitle">
                More than just stickers — it's a movement of creators, gamers, coders, and riders making ordinary tech and gear colorful.
            </p>
        </div>

        <div class="club-perks-grid">
            <div class="club-perk-card perk-cream">
                <div class="club-perk-icon">🎁</div>
                <h4>Secret Drops First</h4>
                <p>Club members get 24-hour early access to limited weekly meme, anime, and art drops before they sell out.</p>
            </div>
            <div class="club-perk-card perk-blue">
                <div class="club-perk-icon">🛡️</div>
                <h4>Stick-For-Life Guarantee</h4>
                <p>100% waterproof, weather-sealed &amp; UV-cured. If it ever peels, fades, or bubbles, we replace it free.</p>
            </div>
            <div class="club-perk-card perk-yellow">
                <div class="club-perk-icon">⚡</div>
                <h4>Mystery Perks &amp; 10% Off</h4>
                <p>Unlock an instant 10% discount on your first order plus secret surprise stickers in every package over ₹499.</p>
            </div>
        </div>

        <!-- Founder Story Spotlight (#author) -->
        <div id="author" class="founder-spotlight-card">
            <div class="founder-grid">
                <div class="founder-image-col">
                    <div class="polaroid-frame">
                        <div class="tape-sticker"></div>
                        <img src="{{ asset('images/author.jpg') }}" alt="Mayank Malhotra, Founder of Tapstick" class="founder-photo">
                        <div class="polaroid-caption">
                            <strong>Mayank Malhotra</strong>
                            <span>Founder &amp; Chief Curator</span>
                        </div>
                    </div>
                </div>
                <div class="founder-content-col">
                    <span class="founder-eyebrow">THE TAPSTICK STORY</span>
                    <h3 class="founder-heading">Turning Passion Into <span class="pop-accent-red">Everyday Art</span>.</h3>
                    <p class="founder-bio">
                        Hey! Welcome to <strong>Tapstick</strong>. We started Tapstick with a single frustration: mass-market stickers were paper-thin, faded within weeks, and left a sticky, disgusting residue on expensive MacBooks and bikes.
                    </p>
                    <p class="founder-bio">
                        We built Tapstick with heavy-duty automotive-grade vinyl, rich UV-cured inks, and precision die-cuts. Today, we're proud to have delivered over 10 Lakh+ stickers to creators, gamers, coders, and dreamers across India.
                    </p>
                    <div class="founder-stats-bar">
                        <div class="f-stat-item">
                            <strong class="f-stat-num">10L+</strong>
                            <span class="f-stat-label">Stickers Shipped</span>
                        </div>
                        <div class="f-stat-item">
                            <strong class="f-stat-num">5000+</strong>
                            <span class="f-stat-label">Original Designs</span>
                        </div>
                        <div class="f-stat-item">
                            <strong class="f-stat-num">4.8★</strong>
                            <span class="f-stat-label">Community Rating</span>
                        </div>
                    </div>
                    <div class="founder-cta-wrap">
                        <a href="#shop" class="btn-pop-primary">Shop Founder's Favorites →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6. WHY TAPSTICK QUALITY GUARANTEES -->
<section id="why" class="why-section">
    <div class="container">
        <div class="why-brand-header">
            <span class="why-eyebrow">QUALITY THAT STICKS</span>
            <h2 class="why-heading">Built To Last. Designed To Stand Out.</h2>
            <p class="why-subheading">
                Every sticker is crafted from automotive-grade waterproof vinyl, sealed with UV protection, and tested on outdoor bikes, helmets &amp; daily carry laptops.
            </p>
        </div>

        <div class="banner-responsive-wrap why-banner-wrap">
            <img src="{{ asset('images/why-banner.webp') }}" alt="Why Tapstick - Built to last, designed to stand out">
        </div>

        <div class="features-grid">
            <div class="feature-item">
                <div class="feature-icon-box">🚚</div>
                <div class="feature-text">
                    <strong>SHIPPED IN 48 HRS</strong>
                    <span>Fast pan-India dispatch</span>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-icon-box">🎖️</div>
                <div class="feature-text">
                    <strong>100% VINYL QUALITY</strong>
                    <span>Waterproof &amp; scratchproof</span>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-icon-box">📦</div>
                <div class="feature-text">
                    <strong>5000+ DESIGNS</strong>
                    <span>Memes, anime &amp; pop drops</span>
                </div>
            </div>
            <div class="feature-item">
                <div class="feature-icon-box">🇮🇳</div>
                <div class="feature-text">
                    <strong>PROUDLY INDIAN</strong>
                    <span>Crafted with love in India</span>
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
