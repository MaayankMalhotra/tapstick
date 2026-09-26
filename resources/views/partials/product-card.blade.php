@php
    $comparePrice = $product->compare_at_price ?: max(round($product->price * 2.2), $product->price + 499);
    $savings = max(0, $comparePrice - $product->price);
    $discountPercent = $comparePrice > $product->price ? round((($comparePrice - $product->price) / $comparePrice) * 100) : 0;
    $imgSrc = $product->image ? (str_starts_with($product->image, 'http') ? $product->image : (str_starts_with($product->image, 'images/') ? asset($product->image) : asset('storage/'.$product->image))) : 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/SMNJG-RNG-5565-M-1-2x.jpg';
    $reviewCount = 50 + (($product->id * 23) % 200);
@endphp

<article class="jg-product-card" data-category="{{ $product->category?->slug ?? 'all' }}">
    <!-- Image Stage with Discount Badge & Tags -->
    <div class="jg-card-media-wrapper">
        @if($discountPercent > 0)
            <div class="jg-discount-pill">
                <span>{{ $discountPercent }}% OFF</span>
            </div>
        @endif

        <div class="jg-tag-pill">
            <span>18K GOLD</span>
        </div>

        <a href="{{ route('products.show', $product) }}" class="jg-card-img-link" title="{{ $product->name }}">
            <img src="{{ $imgSrc }}" 
                 alt="{{ $product->name }} – Jewels Galaxy Fine Jewelry" 
                 loading="lazy" 
                 class="jg-card-img"
                 onerror="this.onerror=null; this.src='https://cdn.shopify.com/s/files/1/0692/8800/1725/files/SMNJG-RNG-5565-M-1-2x.jpg';">
        </a>
    </div>

    <!-- Product Info & Actions -->
    <div class="jg-card-details">
        <div class="jg-card-meta-row">
            <span class="jg-category-name">{{ $product->category?->name ?? 'Fine Jewelry' }}</span>
            <div class="jg-rating">
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
