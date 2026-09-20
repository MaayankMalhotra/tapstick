@extends('layouts.app')

@section('title', 'Your Cart | Tabstick')

@section('content')
<div class="container cart-page-container">
    <h1 class="cart-page-title">Your Cart</h1>

    @if($items->isEmpty())
        <div style="background:#FFFFFF;border:var(--border-pop);border-radius:var(--radius-card);box-shadow:var(--shadow-pop);padding:60px 20px;text-align:center;">
            <div style="font-size:3.5rem;margin-bottom:12px;">🛒</div>
            <h3 style="font-family:var(--font-heading);font-size:1.6rem;font-weight:900;margin-bottom:8px;color:var(--color-ink);">Your cart is empty</h3>
            <p style="color:var(--color-ink-muted);margin-bottom:24px;font-size:1rem;">Find stickers that speak your vibe!</p>
            <a href="{{ route('home') }}#shop" class="btn-pop-primary" style="display:inline-block;padding:12px 32px;">Explore Stickers</a>
        </div>
    @else
        <div class="cart-layout">
            <div class="cart-card" style="background:#FFFFFF;border:var(--border-pop);border-radius:var(--radius-card);box-shadow:var(--shadow-pop);padding:24px;">
                @foreach($items as $item)
                    @php
                        $p = $item['product'];
                        $imgSrc = $p->image ? (str_starts_with($p->image, 'http') ? $p->image : (str_starts_with($p->image, 'images/') ? asset($p->image) : asset('storage/'.$p->image))) : null;
                    @endphp
                    <div class="cart-item-row" style="border-bottom:1.5px solid var(--color-border-subtle);padding:18px 0;display:flex;align-items:center;gap:18px;">
                        <div class="cart-thumb" style="width:72px;height:72px;border-radius:14px;background:var(--color-bg-page);border:1.5px solid var(--color-ink);display:flex;align-items:center;justify-content:center;overflow:hidden;flex-shrink:0;">
                            @if($imgSrc)
                                <img src="{{ $imgSrc }}" alt="{{ $p->name }} Vinyl Sticker - Tabstick" style="max-width:100%;max-height:100%;object-fit:contain;">
                            @else
                                <span style="font-size:2rem;">{{ $p->emoji ?: '✨' }}</span>
                            @endif
                        </div>

                        <div class="cart-item-details" style="flex:1;">
                            <h3 style="font-family:var(--font-heading);font-size:1.05rem;font-weight:900;margin-bottom:4px;color:var(--color-ink);"><a href="{{ route('products.show', $p) }}">{{ $p->name }}</a></h3>
                            <div class="cart-item-price" style="color:var(--color-ink-muted);font-weight:700;font-size:0.88rem;">Rs. {{ number_format($p->price, 2) }} each</div>
                        </div>

                        <form action="{{ route('cart.update', $p) }}" method="POST" class="cart-qty-form" style="display:flex;align-items:center;gap:8px;">
                            @csrf
                            @method('PATCH')
                            <input class="cart-qty-input" type="number" name="quantity" min="1" max="{{ min(20, $p->stock) }}" value="{{ $item['quantity'] }}" style="width:65px;padding:8px;border:2px solid var(--color-ink);border-radius:var(--radius-pill);text-align:center;font-weight:900;">
                            <button type="submit" style="background:var(--color-bg-page);border:1.5px solid var(--color-ink);padding:6px 12px;border-radius:var(--radius-pill);font-size:0.75rem;font-weight:800;cursor:pointer;">Update</button>
                        </form>

                        <div style="font-size:1.15rem;font-weight:900;color:var(--color-ink);min-width:95px;text-align:right;">
                            Rs. {{ number_format($item['line_total'], 2) }}
                        </div>

                        <form action="{{ route('cart.remove', $p) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="cart-remove-btn" title="Remove item" style="background:none;border:none;color:var(--color-pop-red);font-size:1.5rem;font-weight:900;cursor:pointer;padding:4px 8px;">&times;</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <aside class="cart-summary" style="background:#FFFFFF;border:var(--border-pop);border-radius:var(--radius-card);box-shadow:var(--shadow-pop);padding:28px;">
                <h3 style="font-family:var(--font-heading);font-size:1.3rem;font-weight:900;text-transform:uppercase;margin-bottom:20px;color:var(--color-ink);">Order Summary</h3>
                <div class="summary-line" style="display:flex;justify-content:space-between;margin-bottom:12px;font-size:0.95rem;font-weight:600;color:var(--color-ink-muted);">
                    <span>Subtotal</span>
                    <b style="color:var(--color-ink);">Rs. {{ number_format($subtotal, 2) }}</b>
                </div>
                <div class="summary-line" style="display:flex;justify-content:space-between;margin-bottom:12px;font-size:0.95rem;font-weight:600;color:var(--color-ink-muted);">
                    <span>Shipping</span>
                    <b style="color:{{ $shipping === 0 ? '#16a34a' : 'inherit' }}">{{ $shipping ? 'Rs. '.number_format($shipping, 2) : 'FREE ⚡' }}</b>
                </div>
                <div class="summary-line total" style="display:flex;justify-content:space-between;border-top:2px solid var(--color-ink);padding-top:16px;margin-top:16px;font-size:1.3rem;font-weight:900;color:var(--color-ink);">
                    <span>Total</span>
                    <b style="color:var(--color-pop-red);">Rs. {{ number_format($total, 2) }}</b>
                </div>

                <a href="{{ route('checkout.create') }}" class="btn-pop-primary" style="display:flex;justify-content:center;width:100%;margin-top:24px;font-size:1.05rem;">
                    Proceed to Checkout →
                </a>

                <a href="{{ route('home') }}#shop" style="display:block; text-align:center; margin-top:16px; font-size:0.88rem; font-weight:800; color:var(--color-pop-blue); text-decoration:none;">
                    ← Add More Stickers
                </a>

                <div style="margin-top:18px;text-align:center;font-size:0.78rem;font-weight:700;color:var(--color-ink-muted);">
                    🔒 Safe &amp; Secure Checkout • 100% Satisfaction
                </div>
            </aside>
        </div>
    @endif
</div>
@endsection
