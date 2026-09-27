@extends('layouts.app')

@section('title', 'Fine Jewelry Collections & Categories | Tabstick Jewelry')
@section('meta_description', 'Browse all Tabstick fine jewelry collections. Discover anti-tarnish, waterproof 18K gold-plated rings, charms & pendants, bracelets, earrings, and necklaces.')
@section('canonical', route('category.index'))

@section('head_scripts')
@php
$collectionsHubSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Tabstick Fine Jewelry Collections & Categories',
    'url' => route('category.index'),
    'description' => 'Explore all curated fine jewelry categories from Tabstick. Anti-tarnish, waterproof 18K gold-plated rings, necklaces, bracelets, and earrings.',
    'isPartOf' => [
        '@type' => 'WebSite',
        'name' => 'Tabstick',
        'url' => 'https://tabstick.in',
    ],
];
@endphp
<!-- Collections Hub Schema (JSON-LD) -->
<script type="application/ld+json">
{!! json_encode($collectionsHubSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endsection

@section('content')
<div class="categories-hub-wrap" style="padding: 40px 0 80px;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav class="product-breadcrumbs" aria-label="Breadcrumb" style="margin-bottom: 24px;">
            <ol style="display:flex;align-items:center;gap:8px;list-style:none;padding:0;margin:0;font-size:0.88rem;font-weight:700;">
                <li><a href="{{ url('/') }}" style="color:var(--color-ink-muted);text-decoration:none;">Home</a></li>
                <li style="color:var(--color-ink-muted);">/</li>
                <li style="color:var(--color-ink);font-weight:900;" aria-current="page">Collections</li>
            </ol>
        </nav>

        <div class="section-pop-header text-center">
            <div class="section-pop-badge bg-yellow" style="margin: 0 auto 16px;">
                <span>✦ 18K GOLD PLATED COLLECTIONS ✦</span>
            </div>
            <h1 class="section-pop-title">FINE JEWELRY COLLECTIONS</h1>
            <p class="section-pop-subtitle" style="max-width: 650px; margin: 0 auto;">
                Explore Tabstick's complete catalog of over 599+ anti-tarnish, water-resistant 18K gold-plated fine jewelry pieces. Everyday luxury designed to last.
            </p>
        </div>

        <!-- Curated Lifestyle & Surface Hubs -->
        <h2 style="font-size: 1.5rem; font-weight: 900; margin: 48px 0 20px; text-transform: uppercase;">
            ✨ Featured Jewelry Categories
        </h2>
        <div class="why-pop-grid" style="grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px;">
            @foreach($curatedCollections as $curated)
                <a href="{{ route('category.show', $curated['slug']) }}" class="why-pop-card" style="text-decoration:none; color:inherit; display:flex; flex-direction:column; justify-content:space-between;">
                    <div>
                        <div class="why-pop-icon-badge icon-yellow" style="font-size: 2rem;">
                            <span>{{ $curated['icon'] }}</span>
                        </div>
                        <span class="badge-pill" style="display:inline-block; margin-top:8px; font-size:0.75rem; font-weight:800; background:var(--color-bg); padding:4px 8px; border-radius:6px; border:2px solid var(--color-ink);">
                            {{ $curated['badge'] }}
                        </span>
                        <h3 class="why-card-title" style="margin-top: 12px; font-size: 1.3rem;">{{ $curated['name'] }}</h3>
                        <p class="why-card-desc" style="font-size: 0.92rem;">{{ $curated['description'] }}</p>
                    </div>
                    <div style="margin-top: 16px; font-weight: 900; color: var(--color-ink); display: flex; align-items: center; gap: 4px;">
                        <span>Explore Collection →</span>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Theme & Artwork Categories -->
        <h2 style="font-size: 1.5rem; font-weight: 900; margin: 56px 0 20px; text-transform: uppercase;">
            💎 All Fine Jewelry Collections
        </h2>
        <div class="why-pop-grid" style="grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 20px;">
            @foreach($categories as $category)
                @if($category->slug !== 'test-stickers')
                    <a href="{{ route('category.show', $category->slug) }}" class="why-pop-card" style="text-decoration:none; color:inherit; display:flex; flex-direction:column; justify-content:space-between; background:#FFFFFF;">
                        <div>
                            <span style="font-size: 2.2rem; display:block; margin-bottom: 8px;">✨</span>
                            <h3 class="why-card-title" style="font-size: 1.25rem;">{{ $category->name }}</h3>
                            <p class="why-card-desc" style="font-size: 0.88rem; margin-top: 6px;">
                                Over <strong>{{ number_format($category->products_count) }}</strong> anti-tarnish 18K gold plated pieces in this collection.
                            </p>
                        </div>
                        <div style="margin-top: 16px; font-weight: 900; font-size: 0.9rem; color: var(--color-ink);">
                            <span>View {{ number_format($category->products_count) }} Pieces →</span>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
