@extends('layouts.app')

@section('title', 'Your Cart | STICK IT UP')

@section('content')
<div class="container" style="padding-top: 40px;">
    <h1 style="font-family:var(--font-heading);font-size:2.4rem;font-weight:900;text-transform:uppercase;margin-bottom:24px;">Your Cart</h1>

    @if($items->isEmpty())
        <div style="background:#f8fafc;border:2px dashed #cbd5e1;border-radius:16px;padding:60px 20px;text-align:center;">
            <div style="font-size:3rem;margin-bottom:12px;">🛒</div>
            <h3 style="font-family:var(--font-heading);font-size:1.5rem;font-weight:800;margin-bottom:8px;">Your cart is empty</h3>
            <p style="color:#64748b;margin-bottom:24px;">Find stickers that speak your vibe!</p>
            <a href="{{ route('home') }}#shop" class="btn-primary" style="display:inline-block;width:auto;padding:12px 32px;">Explore Stickers</a>
        </div>
    @else
        <div class="cart-layout">
            <div class="cart-card">
                @foreach($items as $item)
                    @php
                        $p = $item['product'];
                        $imgSrc = $p->image ? (str_starts_with($p->image, 'http') ? $p->image : (str_starts_with($p->image, 'images/') ? asset($p->image) : asset('storage/'.$p->image))) : null;
                    @endphp
                    <div class="cart-item-row">
                        <div class="cart-thumb">
                            @if($imgSrc)
                                <img src="{{ $imgSrc }}" alt="{{ $p->name }}">
                            @else
                                <span style="font-size:2rem;">{{ $p->emoji ?: '✨' }}</span>
                            @endif
                        </div>

                        <div class="cart-item-details">
                            <h3><a href="{{ route('products.show', $p) }}">{{ $p->name }}</a></h3>
                            <div class="cart-item-price">Rs. {{ number_format($p->price, 2) }} each</div>
                        </div>

                        <form action="{{ route('cart.update', $p) }}" method="POST" class="cart-qty-form">
                            @csrf
                            @method('PATCH')
                            <input class="cart-qty-input" type="number" name="quantity" min="1" max="{{ min(20, $p->stock) }}" value="{{ $item['quantity'] }}">
                            <button type="submit" style="background:#f1f5f9;border:1px solid #cbd5e1;padding:6px 10px;border-radius:6px;font-size:0.75rem;font-weight:700;cursor:pointer;">Update</button>
                        </form>

                        <div style="font-size:1.1rem;font-weight:900;color:#0f172a;min-width:90px;text-align:right;">
                            Rs. {{ number_format($item['line_total'], 2) }}
                        </div>

                        <form action="{{ route('cart.remove', $p) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="cart-remove-btn" title="Remove item">&times;</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <aside class="cart-summary">
                <h3>Order Summary</h3>
                <div class="summary-line">
                    <span>Subtotal</span>
                    <b>Rs. {{ number_format($subtotal, 2) }}</b>
                </div>
                <div class="summary-line">
                    <span>Shipping</span>
                    <b style="color:{{ $shipping === 0 ? '#16a34a' : 'inherit' }}">{{ $shipping ? 'Rs. '.number_format($shipping, 2) : 'FREE' }}</b>
                </div>
                <div class="summary-line total">
                    <span>Total</span>
                    <b style="color:#dc2626;">Rs. {{ number_format($total, 2) }}</b>
                </div>

                <a href="{{ route('checkout.create') }}" class="btn-primary">
                    Proceed to Checkout
                </a>

                <div style="margin-top:16px;text-align:center;font-size:0.78rem;color:#64748b;">
                    🔒 Safe &amp; Secure 256-Bit SSL Checkout
                </div>
            </aside>
        </div>
    @endif
</div>
@endsection
