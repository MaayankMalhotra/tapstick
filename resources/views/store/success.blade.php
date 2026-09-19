@extends('layouts.app')

@section('title', 'Order Confirmed | TABSTICK')

@section('content')
<div class="container" style="max-width: 660px; padding: 50px 20px 80px;">
    <div class="payment-card success-card">
        <div class="success-icon-wrap">
            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
        </div>

        <span class="order-badge-label" style="color:#16a34a; background:#dcfce7; border: 1px solid #86efac; padding:4px 14px; border-radius:999px; font-weight:800; font-size:0.78rem; letter-spacing:1px; display:inline-block; margin-bottom:12px;">ORDER PLACED SUCCESSFULLY</span>
        <h1 class="payment-title" style="margin-bottom:8px;">Thank You, {{ explode(' ', $order->customer_name)[0] }}!</h1>
        <p class="payment-subtitle" style="margin-bottom:20px;">Your TabStick order <strong>#{{ $order->order_number }}</strong> is confirmed.</p>

        <div class="payment-order-box" style="margin: 20px 0; text-align: left;">
            <div class="order-box-header">
                <div>
                    <span class="order-badge-label">PAYMENT STATUS</span>
                    <h3 class="order-id-highlight" style="font-size:1.1rem; color:#0f172a;">
                        {{ $order->payment_method === 'cod' ? '💵 Cash on Delivery (Pending)' : '⚡ Paid Online via Razorpay' }}
                    </h3>
                </div>
                <div class="order-total-badge">
                    <span class="total-label">Total Amount</span>
                    <span class="total-amount">₹{{ number_format($order->total, 2) }}</span>
                </div>
            </div>

            <div class="order-details-divider"></div>

            <div class="order-customer-meta">
                <div class="meta-item">
                    <span class="meta-label">Customer:</span>
                    <strong class="meta-value">{{ $order->customer_name }}</strong>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Phone:</span>
                    <strong class="meta-value">{{ $order->phone }}</strong>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Email:</span>
                    <strong class="meta-value">{{ $order->email }}</strong>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Order Date:</span>
                    <strong class="meta-value">{{ date('d M Y') }}</strong>
                </div>
                <div class="meta-item" style="grid-column: 1 / -1;">
                    <span class="meta-label">Delivery Address:</span>
                    <span class="meta-value">{{ $order->address }}, {{ $order->city }}, {{ $order->state }} - {{ $order->postal_code }}</span>
                </div>
            </div>

            <div class="order-items-mini-list">
                @foreach($order->items as $item)
                    <div class="mini-item-row">
                        <span class="mini-item-name">📦 {{ $item->product_name }} <small>× {{ $item->quantity }}</small></span>
                        <span class="mini-item-price">₹{{ number_format($item->line_total, 2) }}</span>
                    </div>
                @endforeach
                @if($order->shipping > 0)
                    <div class="mini-item-row">
                        <span class="mini-item-name">🚚 Shipping</span>
                        <span class="mini-item-price">₹{{ number_format($order->shipping, 2) }}</span>
                    </div>
                @else
                    <div class="mini-item-row">
                        <span class="mini-item-name">🚚 Shipping</span>
                        <span class="mini-item-price" style="color:#16a34a; font-weight:700;">FREE</span>
                    </div>
                @endif
            </div>
        </div>

        <div class="dispatch-notice-box">
            <span class="dispatch-icon">🚚</span>
            <div class="dispatch-text">
                <strong>Dispatches within 48 Hours</strong>
                <p>Your waterproof vinyl stickers are being prepped. Order tracking updates will be sent to <strong>{{ $order->email }}</strong>.</p>
            </div>
        </div>

        <div style="margin-top:28px;">
            <a href="{{ route('home') }}#shop" class="btn-primary" style="display:inline-flex; align-items:center; justify-content:center; gap:8px; width:auto; padding:14px 36px; text-decoration:none;">
                Continue Shopping →
            </a>
        </div>
    </div>
</div>
@endsection
