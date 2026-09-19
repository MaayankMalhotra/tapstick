@extends('layouts.app')
@section('title', 'Checkout | Tab Stick')
@section('content')
<section class="shell section"><h1 class="page-title">Checkout</h1><div class="checkout-layout">
    <form class="checkout-form" action="{{ route('checkout.store') }}" method="POST">@csrf
        <h3>Delivery details</h3><div class="form-grid">
            <label>Full name<input name="customer_name" value="{{ old('customer_name') }}" required></label><label>Email<input type="email" name="email" value="{{ old('email') }}" required></label>
            <label>Phone<input name="phone" value="{{ old('phone') }}" required></label><label>Postal code<input name="postal_code" value="{{ old('postal_code') }}" required></label>
            <label class="wide">Address<textarea name="address" required>{{ old('address') }}</textarea></label><label>City<input name="city" value="{{ old('city') }}" required></label><label>State<input name="state" value="{{ old('state') }}" required></label>
        </div><h3>Payment</h3><label class="radio"><input type="radio" name="payment_method" value="cod" {{ old('payment_method', 'cod') === 'cod' ? 'checked' : '' }}> Cash on delivery</label><label class="radio"><input type="radio" name="payment_method" value="razorpay" {{ old('payment_method') === 'razorpay' ? 'checked' : '' }}> Razorpay (UPI, cards and netbanking)</label>
        <button class="pill orange full" type="submit">Place order · ₹{{ number_format($total, 0) }}</button>
    </form>
    <aside class="summary"><h3>Your order</h3>@foreach($items as $item)<div><span>{{ $item['product']->name }} × {{ $item['quantity'] }}</span><b>₹{{ number_format($item['line_total'], 0) }}</b></div>@endforeach<div><span>Shipping</span><b>{{ $shipping ? '₹'.number_format($shipping, 0) : 'FREE' }}</b></div><div class="total"><span>Total</span><b>₹{{ number_format($total, 0) }}</b></div></aside>
</div></section>
@endsection
