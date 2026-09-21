@extends('layouts.app')

@section('title', $seoTitle)
@section('meta_description', $metaDescription)
@section('canonical', route('category.show', $currentSlug))

@section('head_scripts')
@php
$categoryItemList = [];
foreach ($products->take(10) as $idx => $p) {
    $categoryItemList[] = [
        '@type' => 'ListItem',
        'position' => $idx + 1,
        'url' => route('products.show', $p),
        'name' => $p->name,
    ];
}

$categorySchema = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'CollectionPage',
            '@id' => route('category.show', $currentSlug) . '#webpage',
            'url' => route('category.show', $currentSlug),
            'name' => $seoTitle,
            'description' => $metaDescription,
            'isPartOf' => [
                '@type' => 'WebSite',
                '@id' => 'https://tabstick.in/#website',
                'name' => 'Tabstick',
                'url' => 'https://tabstick.in',
            ],
            'about' => [
                '@type' => 'Thing',
                'name' => $categoryName . ' Vinyl Stickers',
            ],
        ],
        [
            '@type' => 'BreadcrumbList',
            '@id' => route('category.show', $currentSlug) . '#breadcrumb',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => 'https://tabstick.in',
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Collections',
                    'item' => route('category.index'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => $categoryName,
                    'item' => route('category.show', $currentSlug),
                ],
            ],
        ],
        [
            '@type' => 'ItemList',
            'name' => $categoryName . ' Sticker Collection',
            'numberOfItems' => $products->total(),
            'itemListElement' => $categoryItemList,
        ],
    ],
];
@endphp
<!-- Collection & Breadcrumb Schema (JSON-LD) -->
<script type="application/ld+json">
{!! json_encode($categorySchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endsection

@section('content')
<div class="category-page-wrap">
    <!-- Breadcrumb Bar -->
    <div class="container" style="padding-top: 24px;">
        <nav class="product-breadcrumbs" aria-label="Breadcrumb">
            <ol style="display:flex;align-items:center;gap:8px;list-style:none;padding:0;margin:0;font-size:0.88rem;font-weight:700;flex-wrap:wrap;">
                <li>
                    <a href="{{ url('/') }}" style="color:var(--color-ink-muted);text-decoration:none;">Home</a>
                </li>
                <li style="color:var(--color-ink-muted);">/</li>
                <li>
                    <a href="{{ route('category.index') }}" style="color:var(--color-ink-muted);text-decoration:none;">Collections</a>
                </li>
                <li style="color:var(--color-ink-muted);">/</li>
                <li style="color:var(--color-ink);font-weight:900;" aria-current="page">
                    {{ $categoryName }}
                </li>
            </ol>
        </nav>
    </div>

    <!-- Category Header Hero -->
    <header class="category-hero-section">
        <div class="container text-center">
            <div class="section-pop-badge bg-yellow" style="margin: 0 auto 16px;">
                <span>✦ TABSTICK ORIGINAL COLLECTION ✦</span>
            </div>
            <h1 class="category-hero-title">{{ $h1 }}</h1>
            <p class="category-hero-desc">{{ $description }}</p>
            
            <div class="category-stats-pill">
                <span>⚡ <strong>{{ number_format($products->total()) }}</strong> Original Drops Available</span>
                <span style="opacity:0.5;">•</span>
                <span>💧 100% Waterproof Vinyl</span>
                <span style="opacity:0.5;">•</span>
                <span>🚫 Zero Sticky Residue</span>
            </div>

            <!-- Category Switcher Pill Tabs -->
            <div class="pop-filter-tabs" style="margin-top: 32px; justify-content: center; flex-wrap: wrap;">
                <a href="{{ url('/#shop') }}" class="pop-filter-pill" style="text-decoration:none;">
                    <span>⚡ All Drops</span>
                </a>
                @if(isset($allCategories))
                    @foreach($allCategories as $cat)
                        <a href="{{ route('category.show', $cat->slug) }}" class="pop-filter-pill {{ $currentSlug === $cat->slug ? 'active' : '' }}" style="text-decoration:none;">
                            <span>{{ $cat->name }} ({{ number_format($cat->products_count) }})</span>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </header>

    <!-- Product Grid Section -->
    <section class="container" style="padding-bottom: 60px;">
        @if($products->count() > 0)
            <div class="products-pop-grid" style="margin-top: 24px;">
                @foreach($products as $index => $product)
                    @include('partials.product-card', ['product' => $product, 'index' => $index])
                @endforeach
            </div>

            <!-- Pagination Bar -->
            <div class="category-pagination-wrap" style="margin-top: 48px; display: flex; justify-content: center;">
                {{ $products->links() }}
            </div>
        @else
            <div class="products-empty-state" style="margin-top: 40px; text-align: center; padding: 60px 20px;">
                <span style="font-size:3rem;">📦</span>
                <h3>No stickers currently in this collection!</h3>
                <p>Check out our other drops or custom packs.</p>
                <a href="{{ url('/') }}" class="btn-pop-primary" style="margin-top: 16px; display: inline-block;">Explore All Stickers</a>
            </div>
        @endif
    </section>

    <!-- SEO Information & Buyer Guarantee Section -->
    <section class="category-seo-info-section" style="background:#FFFFFF;border-top:var(--border-pop);border-bottom:var(--border-pop);padding:60px 0;">
        <div class="container">
            <div class="section-pop-header text-center">
                <div class="section-pop-badge bg-yellow" style="margin: 0 auto 16px;">
                    <span>✦ QUALITY COMMITMENT ✦</span>
                </div>
                <h2 class="section-pop-title">WHY CHOOSE TABSTICK {{ strtoupper($categoryName) }} STICKERS?</h2>
                <p class="section-pop-subtitle" style="max-width: 780px; margin: 0 auto;">
                    Every Tabstick sticker is engineered from heavy-duty automotive vinyl. Whether attached to a daily commuter MacBook, a motorcycle petrol tank, or a rear car windshield, our stickers are built to last through extreme conditions.
                </p>
            </div>

            <div class="why-pop-grid" style="margin-top: 36px;">
                <div class="why-pop-card reveal-on-scroll">
                    <div class="why-pop-icon-badge icon-blue"><span class="why-emoji">🌧️</span></div>
                    <h3 class="why-card-title">100% Monsoon Proof</h3>
                    <p class="why-card-desc">Waterproof lamination protects ink from car washes, rainstorms, and accidental water bottle spills.</p>
                </div>
                <div class="why-pop-card reveal-on-scroll">
                    <div class="why-pop-icon-badge icon-red"><span class="why-emoji">🚫</span></div>
                    <h3 class="why-card-title">Residue-Free Clean Peel</h3>
                    <p class="why-card-desc">Remove or swap your stickers anytime without leaving sticky gummy glue residue on laptop chassis or glass.</p>
                </div>
                <div class="why-pop-card reveal-on-scroll">
                    <div class="why-pop-icon-badge icon-yellow"><span class="why-emoji">☀️</span></div>
                    <h3 class="why-card-title">UV Sunlight Safe</h3>
                    <p class="why-card-desc">Printed with Japanese UV-cured pigment inks that resist fading under intense Indian summer sunlight.</p>
                </div>
            </div>

            <!-- Founder Quality Note -->
            <div style="background:var(--color-bg);border:var(--border-pop);border-radius:var(--radius-card);padding:24px;margin-top:40px;text-align:center;box-shadow:var(--shadow-pop-sm);">
                <p style="font-weight:700;margin:0;color:var(--color-ink);">
                    Tabstick is an Indian sticker brand founded by Mayank Malhotra. We create creative and durable stickers for laptops, cars, phones and college students.
                </p>
                <p style="font-size:0.9rem;color:var(--color-ink-muted);margin:8px 0 0;">
                    Have questions or custom requests? Email us at <a href="mailto:hello@tabstick.in" style="color:var(--color-ink);font-weight:900;">hello@tabstick.in</a> or connect with <a href="https://www.linkedin.com/in/maayank-malhotra-a59a55186/" target="_blank" rel="noopener me" style="color:var(--color-ink);font-weight:900;">Mayank Malhotra on LinkedIn</a>.
                </p>
            </div>
        </div>
    </section>
</div>
@endsection
