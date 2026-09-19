@extends('layouts.app')

@section('title', $product->name . ' | STICK IT UP')

@section('content')
<div class="container product-detail-layout">
    <div class="product-gallery-box">
        @php
            $imgSrc = $product->image ? (str_starts_with($product->image, 'http') ? $product->image : (str_starts_with($product->image, 'images/') ? asset($product->image) : asset('storage/'.$product->image))) : null;
            $regularPrice = max(79.00, $product->price * 2);
            $savings = max(0, $regularPrice - $product->price);
        @endphp
        @if($imgSrc)
            <img src="{{ $imgSrc }}" alt="{{ $product->name }}">
        @else
            <span style="font-size:8rem;">{{ $product->emoji ?: '✨' }}</span>
        @endif
    </div>

    <div class="product-info-panel">
        <span style="display:inline-block;background:#fef08a;color:#854d0e;padding:4px 12px;border-radius:999px;font-size:0.8rem;font-weight:800;text-transform:uppercase;margin-bottom:12px;">
            {{ $product->category?->name ?? 'Stickers & Skins' }}
        </span>
        <h1>{{ $product->name }}</h1>

        <div class="card-ratings" style="margin: 12px 0;">
            <span class="stars-gold" style="font-size:1.1rem;">★★★★★</span>
            <span class="review-count">(778 reviews)</span>
        </div>

        <div class="card-pricing-row" style="align-items:center;">
            @if($savings > 0)
                <span class="price-regular-strike" style="font-size:1.1rem;">Rs. {{ number_format($regularPrice, 2) }}</span>
                <span class="price-discount-pill" style="font-size:0.85rem;">Save Rs. {{ number_format($savings, 0) }}</span>
            @endif
            <span class="price-final-sale" style="font-size:1.8rem;margin-left:12px;">Rs. {{ number_format($product->price, 2) }}</span>
        </div>

        <p style="color:#64748b;line-height:1.7;margin:16px 0 24px;font-size:1rem;">
            {{ $product->description }}
        </p>

        <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;padding:16px;margin-bottom:24px;">
            <div style="display:flex;gap:16px;font-size:0.85rem;color:#334155;font-weight:600;">
                <span>✓ 100% Waterproof Vinyl</span>
                <span>✓ Scratch-Resistant</span>
                <span>✓ Leaves No Residue</span>
            </div>
        </div>

        <form action="{{ route('cart.add', $product) }}" method="POST" style="display:flex;gap:16px;align-items:center;">
            @csrf
            <div>
                <label style="font-size:0.8rem;font-weight:700;display:block;margin-bottom:4px;">QUANTITY</label>
                <input type="number" name="quantity" value="1" min="1" max="{{ min(20, $product->stock) }}" style="width:80px;padding:12px;border:1px solid #cbd5e1;border-radius:8px;font-weight:800;text-align:center;">
            </div>
            <button type="submit" class="btn-add-to-cart" style="flex:1;height:48px;margin-top:auto;font-size:1rem;">
                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                Add to cart
            </button>
        </form>
    </div>
</div>
@endsection
