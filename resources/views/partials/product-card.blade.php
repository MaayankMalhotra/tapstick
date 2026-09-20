@php
    $accentColorClasses = ['card-accent-yellow', 'card-accent-red', 'card-accent-blue', 'card-accent-pink', 'card-accent-green', 'card-accent-purple'];
    $colorClass = $accentColorClasses[($index ?? ($product->id % 6)) % count($accentColorClasses)];
    $regularPrice = max(round($product->price * 1.8), $product->price + 29);
    $savings = max(0, $regularPrice - $product->price);
    $imgSrc = $product->image ? (str_starts_with($product->image, 'http') ? $product->image : (str_starts_with($product->image, 'images/') ? asset($product->image) : asset('storage/'.$product->image))) : null;
    $stockLeft = max(4, min(18, ($product->stock % 15) + 3));
@endphp

<article class="product-pop-card {{ $colorClass }}" data-category="{{ $product->category?->slug ?? 'stickers' }}">
    <!-- Card Top Pill: Stock & Category -->
    <div class="pop-card-top-bar">
        <span class="pop-category-tag">{{ $product->category?->name ?? 'Sticker Pack' }}</span>
        @if($stockLeft <= 8)
            <span class="pop-stock-pill urgent pulse">🔥 Only {{ $stockLeft }} left!</span>
        @else
            <span class="pop-stock-pill in-stock">✓ In Stock</span>
        @endif
    </div>

    <!-- Die-Cut Image Stage with Tactile Peel Corner -->
    <a href="{{ route('products.show', $product) }}" class="pop-card-image-stage">
        @if($savings > 0)
            <div class="pop-savings-corner-badge">
                <span>SAVE ₹{{ number_format($savings, 0) }}</span>
            </div>
        @endif

        <div class="pop-card-peel-corner" title="Peel me!"></div>

        <div class="pop-sticker-preview-wrapper">
            @if($imgSrc)
                <img src="{{ $imgSrc }}" alt="{{ $product->name }}" loading="lazy" class="pop-card-sticker-img" onerror="this.onerror=null; this.src='https://cdn.shopify.com/s/files/1/0561/0215/8500/files/{{ $product->slug }}.jpg';">
            @else
                <span class="pop-card-fallback-emoji">{{ $product->emoji ?: '✨' }}</span>
            @endif
            <div class="pop-sticker-diecut-halo"></div>
        </div>

        <div class="pop-quick-view-badge" title="View details">
            <span>Inspect 👁️</span>
        </div>
    </a>

    <!-- Card Body -->
    <div class="pop-card-body">
        <div class="pop-rating-row">
            <span class="pop-stars">★★★★★</span>
            <span class="pop-rating-num">4.9</span>
            <span class="pop-review-total">({{ 450 + ($product->id * 37) % 350 }})</span>
        </div>

        <h3 class="pop-product-name">
            <a href="{{ route('products.show', $product) }}" title="{{ $product->name }}">{{ $product->name }}</a>
        </h3>

        <div class="pop-price-block">
            <div class="pop-price-numbers">
                @if($savings > 0)
                    <span class="pop-original-price">₹{{ number_format($regularPrice, 0) }}</span>
                @endif
                <span class="pop-current-price">₹{{ number_format($product->price, 2) }}</span>
            </div>
            <span class="pop-price-note">Incl. all taxes</span>
        </div>

        <!-- Add to Cart Form with Magnetic Hover & Flying Sticker Animation -->
        <form action="{{ route('cart.add', $product) }}" method="POST" class="pop-add-cart-form">
            @csrf
            <button type="submit" class="btn-add-pop-cart trigger-confetti" data-confetti="true">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span>Add to Cart</span>
            </button>
        </form>
    </div>
</article>
