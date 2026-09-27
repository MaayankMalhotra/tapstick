@php
    $comparePrice = $product->compare_at_price ?: max(round($product->price * 2.2), $product->price + 499);
    $savings = max(0, $comparePrice - $product->price);
    $discountPercent = $comparePrice > $product->price ? round((($comparePrice - $product->price) / $comparePrice) * 100) : 0;
    $imgSrc = $product->image ? (str_starts_with($product->image, 'http') ? $product->image : (str_starts_with($product->image, 'images/') ? asset($product->image) : asset('storage/'.$product->image))) : 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/SMNJG-RNG-5565-M-1-2x.jpg';
    $reviewCount = 50 + (($product->id * 23) % 200);
@endphp

<article class="jg-product-card" data-category="{{ $product->category?->slug ?? 'all' }}">
    <!-- Image Stage with Luxury Badges & Quick Heart -->
    <div class="jg-card-media-wrapper">
        <div class="jg-card-badges-stack">
            @if($discountPercent > 0)
                <span class="jg-discount-pill">{{ $discountPercent }}% OFF</span>
            @endif
            <span class="jg-tag-pill">18K GOLD</span>
        </div>

        <button type="button" class="jg-card-wishlist-btn" aria-label="Add to Wishlist" onclick="this.classList.toggle('active');" title="Save to Wishlist">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
            </svg>
        </button>

        <a href="{{ route('products.show', $product) }}" class="jg-card-img-link" title="{{ $product->name }}">
            <img src="{{ $imgSrc }}" 
                 alt="{{ $product->name }} – Tabstick Fine Jewelry" 
                 loading="lazy" 
                 class="jg-card-img"
                 onerror="this.onerror=null; this.src='https://cdn.shopify.com/s/files/1/0692/8800/1725/files/SMNJG-RNG-5565-M-1-2x.jpg';">
        </a>

        <!-- Luxury Trust Watermark Strip on Image -->
        <div class="jg-card-trust-watermark">
            <span>💧 100% Water &amp; Sweatproof • Anti-Tarnish</span>
        </div>
    </div>

    <!-- Product Info & Actions -->
    <div class="jg-card-details">
        <div class="jg-card-meta-row">
            <span class="jg-category-name">{{ $product->category?->name ?? 'Fine Jewelry' }}</span>
            <div class="jg-rating" title="Rated 5 stars by verified buyers">
                <span class="jg-stars">★★★★★</span>
                <span class="jg-review-count">({{ $reviewCount }})</span>
            </div>
        </div>

        <h3 class="jg-product-title">
            <a href="{{ route('products.show', $product) }}" title="{{ $product->name }}">{{ $product->name }}</a>
        </h3>

        <div class="jg-pricing-block">
            <span class="jg-sale-price">Rs. {{ number_format($product->price, 2) }}</span>
            @if($comparePrice > $product->price)
                <span class="jg-regular-price">Rs. {{ number_format($comparePrice, 2) }}</span>
                <span class="jg-savings-chip">Save Rs. {{ number_format($savings) }}</span>
            @endif
        </div>

        <!-- Add to Cart Form -->
        <form action="{{ route('cart.add', $product) }}" method="POST" class="jg-cart-action-form">
            @csrf
            <button type="submit" class="jg-btn-add-cart trigger-confetti" data-confetti="true">
                <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span>ADD TO CART</span>
            </button>
        </form>
    </div>
</article>
