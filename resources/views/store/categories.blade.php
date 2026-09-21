@extends('layouts.app')

@section('title', 'Sticker Collections & Categories | Tabstick')
@section('meta_description', 'Browse all Tabstick sticker collections. Discover waterproof vinyl stickers for laptops, cars, bikes, phone cases, anime, memes, and college students.')
@section('canonical', route('category.index'))

@section('head_scripts')
<!-- Collections Hub Schema (JSON-LD) -->
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "Tabstick Sticker Collections & Categories",
    "url": "{{ route('category.index') }}",
    "description": "Explore all curated sticker categories from Tabstick. Waterproof, automotive-grade vinyl stickers for laptops, cars, bikes, and everyday tech.",
    "isPartOf": {
        "@type": "WebSite",
        "name": "Tabstick",
        "url": "https://tabstick.in"
    }
}
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
                <span>✦ ALL STICKER COLLECTIONS ✦</span>
            </div>
            <h1 class="section-pop-title">PICK YOUR VIBE &amp; GEAR</h1>
            <p class="section-pop-subtitle" style="max-width: 650px; margin: 0 auto;">
                Explore Tabstick's complete catalog of over 4,400+ original die-cut vinyl stickers. Built tough for laptops, cars, phones, and college gear.
            </p>
        </div>

        <!-- Curated Lifestyle & Surface Hubs -->
        <h2 style="font-size: 1.5rem; font-weight: 900; margin: 48px 0 20px; text-transform: uppercase;">
            🎯 Shop By Gear &amp; Lifestyle
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
            🎨 Shop By Theme &amp; Artwork
        </h2>
        <div class="why-pop-grid" style="grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 20px;">
            @foreach($categories as $category)
                <a href="{{ route('category.show', $category->slug) }}" class="why-pop-card" style="text-decoration:none; color:inherit; display:flex; flex-direction:column; justify-content:space-between; background:#FFFFFF;">
                    <div>
                        <span style="font-size: 2.2rem; display:block; margin-bottom: 8px;">✨</span>
                        <h3 class="why-card-title" style="font-size: 1.25rem;">{{ $category->name }}</h3>
                        <p class="why-card-desc" style="font-size: 0.88rem; margin-top: 6px;">
                            Over <strong>{{ number_format($category->products_count) }}</strong> original die-cut waterproof stickers in this drop.
                        </p>
                    </div>
                    <div style="margin-top: 16px; font-weight: 900; font-size: 0.9rem; color: var(--color-ink);">
                        <span>View {{ number_format($category->products_count) }} Drops →</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
