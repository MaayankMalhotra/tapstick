@extends('layouts.app')

@section('title', 'Checkout | TABSTICK')

@section('content')
<div class="container" style="padding-top: 40px;">
    <h1 style="font-family:var(--font-heading);font-size:2.4rem;font-weight:900;text-transform:uppercase;margin-bottom:24px;">Checkout</h1>
    
    <div class="checkout-layout">
        <form class="cart-card" action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <h3 style="font-family:var(--font-heading);font-size:1.3rem;font-weight:800;margin-bottom:20px;">Shipping Details</h3>
            
            <div class="form-grid-2">
                <div class="form-group">
                    <label>FULL NAME</label>
                    <input class="form-control" name="customer_name" value="{{ old('customer_name') }}" placeholder="John Doe" required>
                </div>
                <div class="form-group">
                    <label>EMAIL ADDRESS</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="john@example.com" required>
                </div>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label>PHONE NUMBER (10 DIGITS)</label>
                    <input class="form-control" name="phone" value="{{ old('phone') }}" placeholder="9876543210" required>
                </div>
                <div class="form-group">
                    <label>POSTAL PINCODE</label>
                    <input class="form-control" name="postal_code" value="{{ old('postal_code') }}" placeholder="110001" required>
                </div>
            </div>

            <div class="form-group">
                <label>STREET ADDRESS</label>
                <textarea class="form-control" name="address" rows="3" placeholder="House no, street, landmark" required>{{ old('address') }}</textarea>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label>CITY</label>
                    <input class="form-control" name="city" value="{{ old('city') }}" placeholder="City" required>
                </div>
                <div class="form-group">
                    <label>STATE</label>
                    <input class="form-control" name="state" value="{{ old('state') }}" placeholder="State" required>
                </div>
            </div>

            <h3 style="font-family:var(--font-heading);font-size:1.3rem;font-weight:800;margin:28px 0 16px;">Payment Method</h3>

            <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:14px;margin-bottom:12px;">
                <label style="display:flex;align-items:center;gap:10px;font-weight:700;cursor:pointer;">
                    <input type="radio" name="payment_method" value="cod" {{ old('payment_method', 'cod') === 'cod' ? 'checked' : '' }}>
                    <span>💵 Cash on Delivery (COD)</span>
                </label>
            </div>

            <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:14px;margin-bottom:24px;">
                <label style="display:flex;align-items:center;gap:10px;font-weight:700;cursor:pointer;">
                    <input type="radio" name="payment_method" value="razorpay" {{ old('payment_method') === 'razorpay' ? 'checked' : '' }}>
                    <span>⚡ Razorpay (UPI, Google Pay, PhonePe, Cards, NetBanking)</span>
                </label>
            </div>

            <button class="btn-primary" type="submit" style="font-size:1rem;height:52px;">
                Place Order · Rs. {{ number_format($total, 2) }}
            </button>
        </form>

        <aside class="cart-summary">
            <h3>Order Items</h3>
            @foreach($items as $item)
                <div style="display:flex;justify-content:space-between;margin-bottom:10px;font-size:0.9rem;">
                    <span>{{ $item['product']->name }} × {{ $item['quantity'] }}</span>
                    <b>Rs. {{ number_format($item['line_total'], 2) }}</b>
                </div>
            @endforeach
            <div class="summary-line" style="margin-top:16px;border-top:1px solid #e2e8f0;padding-top:12px;">
                <span>Subtotal</span>
                <b>Rs. {{ number_format($subtotal, 2) }}</b>
            </div>
            <div class="summary-line">
                <span>Shipping</span>
                <b style="color:{{ $shipping === 0 ? '#16a34a' : 'inherit' }}">{{ $shipping ? 'Rs. '.number_format($shipping, 2) : 'FREE' }}</b>
            </div>
            <div class="summary-line total">
                <span>Total Payable</span>
                <b style="color:#dc2626;">Rs. {{ number_format($total, 2) }}</b>
            </div>
        </aside>
    </div>
</div>
@endsection
