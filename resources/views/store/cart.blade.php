@extends('layouts.app')
@section('title', 'Your cart | Tab Stick')
@section('content')
<section class="shell section"><h1 class="page-title">Your cart</h1>
    @if($items->isEmpty())
        <div class="empty"><h3>Your cart is empty</h3><p>Find a sticker that feels like you.</p><a class="pill orange" href="{{ route('home') }}#shop">Start shopping</a></div>
    @else
        <div class="cart-layout"><div class="cart-list">
            @foreach($items as $item)
                <div class="cart-item"><div class="mini-art">{{ $item['product']->emoji ?: '✨' }}</div><div class="grow"><h3>{{ $item['product']->name }}</h3><span>₹{{ number_format($item['product']->price, 0) }} each</span></div>
                    <form action="{{ route('cart.update', $item['product']) }}" method="POST">@csrf @method('PATCH')<input class="qty" type="number" name="quantity" min="1" max="{{ min(20, $item['product']->stock) }}" value="{{ $item['quantity'] }}"><button class="link-button">Update</button></form>
                    <b>₹{{ number_format($item['line_total'], 0) }}</b>
                    <form action="{{ route('cart.remove', $item['product']) }}" method="POST">@csrf @method('DELETE')<button class="remove" aria-label="Remove item">×</button></form>
                </div>
            @endforeach
        </div><aside class="summary"><h3>Order summary</h3><div><span>Subtotal</span><b>₹{{ number_format($subtotal, 0) }}</b></div><div><span>Shipping</span><b>{{ $shipping ? '₹'.number_format($shipping, 0) : 'FREE' }}</b></div><div class="total"><span>Total</span><b>₹{{ number_format($total, 0) }}</b></div><a class="pill orange full center" href="{{ route('checkout.create') }}">Continue to checkout</a></aside></div>
    @endif
</section>
@endsection
