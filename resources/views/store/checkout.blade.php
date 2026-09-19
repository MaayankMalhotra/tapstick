@extends('layouts.app')

@section('title', 'Checkout | TAPSTICK')

@section('content')
<div class="container" style="padding: 40px 0 60px;">
    <h1 style="font-family:var(--font-heading);font-size:2.4rem;font-weight:900;text-transform:uppercase;margin-bottom:24px;color:var(--color-ink);">Checkout</h1>
    
    <div class="checkout-layout">
        <form class="cart-card" action="{{ route('checkout.store') }}" method="POST" style="background:#FFFFFF;border:var(--border-pop);border-radius:var(--radius-card);box-shadow:var(--shadow-pop);padding:32px;">
            @csrf
            <h3 style="font-family:var(--font-heading);font-size:1.35rem;font-weight:900;text-transform:uppercase;margin-bottom:20px;color:var(--color-ink);">Shipping Details</h3>
            
            <div class="form-grid-2">
                <div class="form-group">
                    <label style="font-size:0.78rem;font-weight:900;text-transform:uppercase;margin-bottom:6px;display:block;">FULL NAME</label>
                    <input class="form-control" name="customer_name" value="{{ old('customer_name', session('customer_name')) }}" placeholder="Mayank Malhotra" required style="border:2px solid var(--color-ink);border-radius:10px;padding:12px 14px;font-weight:600;">
                </div>
                <div class="form-group">
                    <label style="font-size:0.78rem;font-weight:900;text-transform:uppercase;margin-bottom:6px;display:block;">EMAIL ADDRESS</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email', session('customer_email')) }}" placeholder="mayank@example.com" required style="border:2px solid var(--color-ink);border-radius:10px;padding:12px 14px;font-weight:600;">
                </div>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label style="font-size:0.78rem;font-weight:900;text-transform:uppercase;margin-bottom:6px;display:block;">PHONE NUMBER (10 DIGITS)</label>
                    <input class="form-control" name="phone" value="{{ old('phone', session('customer_phone')) }}" placeholder="9876543210" required style="border:2px solid var(--color-ink);border-radius:10px;padding:12px 14px;font-weight:600;">
                </div>
                <div class="form-group">
                    <label style="font-size:0.78rem;font-weight:900;text-transform:uppercase;margin-bottom:6px;display:block;">POSTAL PINCODE</label>
                    <input class="form-control" name="postal_code" value="{{ old('postal_code') }}" placeholder="110001" required style="border:2px solid var(--color-ink);border-radius:10px;padding:12px 14px;font-weight:600;">
                </div>
            </div>

            <div class="form-group">
                <label style="font-size:0.78rem;font-weight:900;text-transform:uppercase;margin-bottom:6px;display:block;">STREET ADDRESS</label>
                <textarea class="form-control" name="address" rows="3" placeholder="House no, street, landmark" required style="border:2px solid var(--color-ink);border-radius:10px;padding:12px 14px;font-weight:600;">{{ old('address') }}</textarea>
            </div>

            <div class="form-grid-2">
                <div class="form-group">
                    <label style="font-size:0.78rem;font-weight:900;text-transform:uppercase;margin-bottom:6px;display:block;">CITY</label>
                    <input class="form-control" name="city" value="{{ old('city') }}" placeholder="New Delhi" required style="border:2px solid var(--color-ink);border-radius:10px;padding:12px 14px;font-weight:600;">
                </div>
                <div class="form-group">
                    <label style="font-size:0.78rem;font-weight:900;text-transform:uppercase;margin-bottom:6px;display:block;">STATE</label>
                    <input class="form-control" name="state" value="{{ old('state') }}" placeholder="Delhi" required style="border:2px solid var(--color-ink);border-radius:10px;padding:12px 14px;font-weight:600;">
                </div>
            </div>

            <h3 style="font-family:var(--font-heading);font-size:1.35rem;font-weight:900;text-transform:uppercase;margin:28px 0 16px;color:var(--color-ink);">Payment Method</h3>

            <div style="background:var(--color-bg-page);border:2px solid var(--color-ink);border-radius:14px;padding:16px;margin-bottom:12px;box-shadow:var(--shadow-pop-sm);">
                <label style="display:flex;align-items:center;gap:12px;font-weight:800;cursor:pointer;font-size:0.95rem;">
                    <input type="radio" name="payment_method" value="cod" {{ old('payment_method', 'cod') === 'cod' ? 'checked' : '' }} style="accent-color:var(--color-pop-red);transform:scale(1.2);">
                    <span>💵 Cash on Delivery (COD)</span>
                </label>
            </div>

            <div style="background:var(--color-bg-page);border:2px solid var(--color-ink);border-radius:14px;padding:16px;margin-bottom:28px;box-shadow:var(--shadow-pop-sm);">
                <label style="display:flex;align-items:center;gap:12px;font-weight:800;cursor:pointer;font-size:0.95rem;">
                    <input type="radio" name="payment_method" value="razorpay" {{ old('payment_method') === 'razorpay' ? 'checked' : '' }} style="accent-color:var(--color-pop-blue);transform:scale(1.2);">
                    <span>⚡ Razorpay (Instant UPI, QR, Google Pay, Cards, NetBanking)</span>
                </label>
            </div>

            <button class="btn-pop-primary" type="submit" style="font-size:1.1rem;height:54px;width:100%;justify-content:center;">
                Place Order · Rs. {{ number_format($total, 2) }}
            </button>
        </form>

        <aside class="cart-summary" style="background:#FFFFFF;border:var(--border-pop);border-radius:var(--radius-card);box-shadow:var(--shadow-pop);padding:28px;">
            <h3 style="font-family:var(--font-heading);font-size:1.3rem;font-weight:900;text-transform:uppercase;margin-bottom:20px;color:var(--color-ink);">Order Items</h3>
            @foreach($items as $item)
                <div style="display:flex;justify-content:space-between;margin-bottom:10px;font-size:0.9rem;font-weight:600;color:var(--color-ink);">
                    <span>{{ $item['product']->name }} × {{ $item['quantity'] }}</span>
                    <b>Rs. {{ number_format($item['line_total'], 2) }}</b>
                </div>
            @endforeach
            <div class="summary-line" style="margin-top:16px;border-top:1.5px solid var(--color-border-subtle);padding-top:14px;display:flex;justify-content:space-between;font-size:0.95rem;font-weight:600;color:var(--color-ink-muted);">
                <span>Subtotal</span>
                <b style="color:var(--color-ink);">Rs. {{ number_format($subtotal, 2) }}</b>
            </div>
            <div class="summary-line" style="display:flex;justify-content:space-between;margin-bottom:12px;font-size:0.95rem;font-weight:600;color:var(--color-ink-muted);">
                <span>Shipping</span>
                <b style="color:{{ $shipping === 0 ? '#16a34a' : 'inherit' }}">{{ $shipping ? 'Rs. '.number_format($shipping, 2) : 'FREE ⚡' }}</b>
            </div>
            <div class="summary-line total" style="display:flex;justify-content:space-between;border-top:2px solid var(--color-ink);padding-top:16px;margin-top:16px;font-size:1.3rem;font-weight:900;color:var(--color-ink);">
                <span>Total Payable</span>
                <b style="color:var(--color-pop-red);">Rs. {{ number_format($total, 2) }}</b>
            </div>
            <div style="margin-top:20px;text-align:center;font-size:0.78rem;font-weight:700;color:var(--color-ink-muted);">
                🚚 48-Hour Pan-India Express Dispatch
            </div>
        </aside>
    </div>
</div>
@endsection
