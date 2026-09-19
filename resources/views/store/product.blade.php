@extends('layouts.app')

@section('title', $product->name . ' | TAPSTICK')

@section('content')
<div class="container product-detail-layout" style="padding: 40px 0 60px;">
    <div class="product-gallery-box" style="background:#FFFFFF;border:var(--border-pop);border-radius:var(--radius-card);padding:24px;box-shadow:var(--shadow-pop);display:flex;align-items:center;justify-content:center;aspect-ratio:1;">
        @php
            $imgSrc = $product->image ? (str_starts_with($product->image, 'http') ? $product->image : (str_starts_with($product->image, 'images/') ? asset($product->image) : asset('storage/'.$product->image))) : null;
            $regularPrice = max(79.00, $product->price * 2);
            $savings = max(0, $regularPrice - $product->price);
        @endphp
        @if($imgSrc)
            <img src="{{ $imgSrc }}" alt="{{ $product->name }}" style="max-width:100%;max-height:100%;object-fit:contain;border-radius:14px;">
        @else
            <span style="font-size:8rem;">{{ $product->emoji ?: '✨' }}</span>
        @endif
    </div>

    <div class="product-info-panel" style="background:#FFFFFF;border:var(--border-pop);border-radius:var(--radius-card);padding:32px;box-shadow:var(--shadow-pop);">
        <span style="display:inline-block;background:var(--color-pop-yellow);color:var(--color-ink);padding:4px 14px;border-radius:var(--radius-pill);font-size:0.78rem;font-weight:900;text-transform:uppercase;margin-bottom:12px;border:1.5px solid var(--color-ink);box-shadow:1.5px 1.5px 0 var(--color-ink);">
            {{ $product->category?->name ?? 'Vinyl Sticker' }}
        </span>
        <h1 style="font-family:var(--font-heading);font-size:clamp(1.8rem, 3.5vw, 2.4rem);font-weight:900;color:var(--color-ink);line-height:1.2;">{{ $product->name }}</h1>

        <div class="card-ratings" style="margin: 12px 0;">
            <span class="stars-gold" style="font-size:1.15rem;">★★★★★</span>
            <span class="review-count" style="font-size:0.85rem;font-weight:700;">(778 verified reviews)</span>
        </div>

        <div class="card-pricing-row" style="align-items:center;margin:16px 0;">
            @if($savings > 0)
                <span class="price-regular-strike" style="font-size:1.15rem;">Rs. {{ number_format($regularPrice, 2) }}</span>
                <span class="price-discount-pill" style="font-size:0.82rem;background:#FEE2E2;color:#DC2626;font-weight:800;border-radius:6px;padding:3px 8px;">Save Rs. {{ number_format($savings, 0) }}</span>
            @endif
            <span class="price-final-sale" style="font-size:2rem;margin-left:12px;color:var(--color-pop-red);font-weight:900;">Rs. {{ number_format($product->price, 2) }}</span>
        </div>

        <p style="color:var(--color-ink-muted);line-height:1.7;margin:16px 0 24px;font-size:1.02rem;">
            {{ $product->description }}
        </p>

        <div style="background:var(--color-bg-page);border:var(--border-pop-thin);border-radius:var(--radius-card-sm);padding:16px;margin-bottom:24px;box-shadow:var(--shadow-pop-sm);">
            <div style="display:flex;gap:16px;font-size:0.85rem;color:var(--color-ink);font-weight:800;flex-wrap:wrap;">
                <span>💧 100% Waterproof Vinyl</span>
                <span>⚡ Scratchproof Matte</span>
                <span>🚫 Leaves Zero Residue</span>
            </div>
        </div>

        <form action="{{ route('cart.add', $product) }}" method="POST" style="display:flex;gap:16px;align-items:center;flex-wrap:wrap;">
            @csrf
            <div>
                <label style="font-size:0.78rem;font-weight:900;display:block;margin-bottom:6px;text-transform:uppercase;">QUANTITY</label>
                <input type="number" name="quantity" value="1" min="1" max="{{ min(20, $product->stock) }}" style="width:85px;padding:12px;border:2px solid var(--color-ink);border-radius:var(--radius-pill);font-weight:900;text-align:center;font-size:1rem;box-shadow:2px 2px 0 var(--color-ink);">
            </div>
            <button type="submit" class="btn-pop-primary" style="flex:1;height:52px;margin-top:auto;font-size:1.05rem;gap:10px;">
                <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                Add to Cart
            </button>
        </form>
    </div>
</div>
@endsection
