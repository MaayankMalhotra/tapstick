@extends('layouts.app')

@section('title', $product->name . ' Sticker | Tabstick')
@section('meta_description', Str::limit(strip_tags($product->description), 155) ?: ($product->name . ' – 18K gold plated fine jewelry by Jewels Galaxy. Anti-tarnish, water-resistant, hypoallergenic everyday luxury.'))
@section('canonical', route('products.show', $product))

@section('content')
<div class="container" style="padding-top: 24px;">
    <!-- Breadcrumb Navigation -->
    <nav class="product-breadcrumbs" aria-label="Breadcrumb">
        <ol style="display:flex;align-items:center;gap:8px;list-style:none;padding:0;margin:0;font-size:0.88rem;font-weight:600;flex-wrap:wrap;">
            <li>
                <a href="{{ url('/') }}" style="color:var(--jg-text-muted);text-decoration:none;">Home</a>
            </li>
            <li style="color:var(--jg-text-muted);">/</li>
            <li>
                <a href="{{ route('home') }}?category={{ $product->category?->slug ?? 'all' }}#shop" style="color:var(--jg-text-muted);text-decoration:none;">{{ $product->category?->name ?? 'Jewelry' }}</a>
            </li>
            <li style="color:var(--jg-text-muted);">/</li>
            <li style="color:var(--jg-espresso);font-weight:700;" aria-current="page">
                {{ $product->name }}
            </li>
        </ol>
    </nav>
</div>

<div class="container product-detail-layout" style="padding: 20px 0 60px;">
    @php
        $comparePrice = $product->compare_at_price ?: max(round($product->price * 2.2), $product->price + 499);
        $savings = max(0, $comparePrice - $product->price);
        $discountPercent = $comparePrice > $product->price ? round((($comparePrice - $product->price) / $comparePrice) * 100) : 0;
        $imgSrc = $product->image ? (str_starts_with($product->image, 'http') ? $product->image : (str_starts_with($product->image, 'images/') ? asset($product->image) : asset('storage/'.$product->image))) : 'https://cdn.shopify.com/s/files/1/0692/8800/1725/files/SMNJG-RNG-5565-M-1-2x.jpg';
    @endphp

    <div class="product-gallery-box" style="background:#FFFFFF;border:1px solid var(--jg-border);border-radius:var(--radius-card);padding:24px;box-shadow:var(--shadow-pop);display:flex;align-items:center;justify-content:center;aspect-ratio:1;">
        <img src="{{ $imgSrc }}" alt="{{ $product->name }} Vinyl Sticker - Tabstick" style="max-width:100%;max-height:100%;object-fit:contain;border-radius:12px;" onerror="this.onerror=null; this.src='https://cdn.shopify.com/s/files/1/0692/8800/1725/files/SMNJG-RNG-5565-M-1-2x.jpg';">
    </div>

    <div class="product-info-panel" style="background:#FFFFFF;border:1px solid var(--jg-border);border-radius:var(--radius-card);padding:32px;box-shadow:var(--shadow-pop);">
        <div style="display:flex;gap:8px;align-items:center;margin-bottom:12px;flex-wrap:wrap;">
            <span style="display:inline-block;background:var(--jg-gold-light);color:var(--jg-bronze);padding:4px 12px;border-radius:var(--radius-pill);font-size:0.75rem;font-weight:700;letter-spacing:0.04em;text-transform:uppercase;border:1px solid var(--jg-gold);">
                18K GOLD PLATED
            </span>
            <span style="display:inline-block;background:var(--jg-cream);color:var(--jg-espresso);padding:4px 12px;border-radius:var(--radius-pill);font-size:0.75rem;font-weight:700;letter-spacing:0.04em;text-transform:uppercase;border:1px solid var(--jg-border);">
                {{ $product->category?->name ?? 'Fine Jewelry' }}
            </span>
        </div>

        <h1 style="font-family:var(--font-heading);font-size:clamp(1.6rem, 3vw, 2.2rem);font-weight:700;color:var(--jg-espresso);line-height:1.25;">{{ $product->name }}</h1>

        <div class="card-ratings" style="margin: 12px 0;display:flex;align-items:center;gap:6px;">
            <span style="color:#D97706;font-size:1.1rem;">★★★★★</span>
            <span style="font-size:0.85rem;font-weight:700;color:var(--jg-text-muted);">(340 verified buyer reviews)</span>
        </div>

        <div class="card-pricing-row" style="align-items:center;margin:16px 0;display:flex;gap:12px;flex-wrap:wrap;">
            <span style="font-size:2rem;color:var(--jg-espresso);font-weight:800;font-family:var(--font-heading);">Rs. {{ number_format($product->price, 2) }}</span>
            @if($comparePrice > $product->price)
                <span style="font-size:1.15rem;text-decoration:line-through;color:var(--jg-text-faint);">Rs. {{ number_format($comparePrice, 2) }}</span>
                <span style="font-size:0.82rem;background:#FDE8E8;color:var(--jg-red-discount);font-weight:800;border-radius:6px;padding:3px 8px;">{{ $discountPercent }}% OFF</span>
            @endif
        </div>

        <div style="color:var(--jg-text-muted);line-height:1.7;margin:16px 0 24px;font-size:0.98rem;">
            {!! $product->description !!}
        </div>

        <div style="background:var(--jg-cream-soft);border:1px solid var(--jg-border-light);border-radius:12px;padding:16px;margin-bottom:24px;">
            <div style="display:flex;gap:16px;font-size:0.85rem;color:var(--jg-espresso);font-weight:600;flex-wrap:wrap;">
                <span>✨ 18K Real Gold Plated</span>
                <span>💧 100% Water &amp; Sweatproof</span>
                <span>🛡️ 6-Month Anti-Tarnish Warranty</span>
                <span>🌿 Hypoallergenic &amp; Nickel-Free</span>
            </div>
        </div>

        <form action="{{ route('cart.add', $product) }}" method="POST" class="pop-add-cart-form" style="display:flex;gap:16px;align-items:center;flex-wrap:wrap;">
            @csrf
            <div>
                <label style="font-size:0.75rem;font-weight:700;display:block;margin-bottom:6px;text-transform:uppercase;color:var(--jg-espresso);">QUANTITY</label>
                <input type="number" name="quantity" value="1" min="1" max="{{ min(20, $product->stock) }}" style="width:85px;padding:12px;border:1px solid var(--jg-border);border-radius:var(--radius-pill);font-weight:700;text-align:center;font-size:1rem;background:#FFFFFF;color:var(--jg-espresso);">
            </div>
            <button type="submit" class="jg-btn-add-cart" style="flex:1;height:52px;margin-top:auto;font-size:0.95rem;letter-spacing:0.06em;font-weight:700;display:flex;align-items:center;justify-content:center;gap:10px;background:var(--jg-bronze);color:#FFFFFF;border:none;border-radius:var(--radius-pill);cursor:pointer;transition:all 0.2s ease;">
                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span>ADD TO BAG</span>
            </button>
        </form>

        <div style="margin-top:16px;display:flex;align-items:center;gap:10px;font-size:0.82rem;font-weight:600;color:var(--jg-text-muted);flex-wrap:wrap;">
            <span>🚚 Free Pan-India Express Shipping</span>
            <span>•</span>
            <span>💎 Premium Luxury Velvet Box</span>
            <span>•</span>
            <span>🔄 7-Day Easy Exchange</span>
        </div>
    </div>
</div>

<!-- JSON-LD Product & BreadcrumbList Structured Data -->
@php
$productSchema = [
    '@context' => 'https://schema.org/',
    '@type' => 'Product',
    'name' => $product->name,
    'image' => $imgSrc ? [$imgSrc] : [asset('images/hero-banner.webp')],
    'description' => strip_tags($product->description) ?: '18K gold plated fine jewelry by Jewels Galaxy.',
    'sku' => $product->slug,
    'brand' => [
        '@type' => 'Brand',
        'name' => 'Tabstick'
    ],
    'offers' => [
        '@type' => 'Offer',
        'url' => route('products.show', $product),
        'priceCurrency' => 'INR',
        'price' => number_format($product->price, 2, '.', ''),
        'availability' => $product->stock > 0 ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
        'itemCondition' => 'https://schema.org/NewCondition',
        'seller' => [
            '@type' => 'Organization',
            'name' => 'Tabstick'
        ]
    ]
];

$breadcrumbSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Home',
            'item' => url('/')
        ],
        [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => $product->category?->name ?? 'Jewelry',
            'item' => route('home') . '?category=' . ($product->category?->slug ?? 'all')
        ],
        [
            '@type' => 'ListItem',
            'position' => 3,
            'name' => $product->name,
            'item' => route('products.show', $product)
        ]
    ]
];
@endphp

@push('schema')
<script type="application/ld+json">
{!! json_encode($productSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
<script type="application/ld+json">
{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush
@endsection
