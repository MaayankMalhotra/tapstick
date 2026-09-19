@extends('layouts.app')

@section('title', 'Complete Payment | TABSTICK')

@section('content')
<div class="container" style="max-width: 660px; padding: 40px 20px 80px;">
    <div class="payment-card">
        <!-- Security Header Badge -->
        <div class="payment-security-header">
            <div class="security-badge">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
                <span>256-BIT SSL ENCRYPTED</span>
            </div>
            <span class="live-indicator"><span class="dot-blink"></span> Razorpay Verified</span>
        </div>

        <div class="payment-card-body">
            <span class="order-badge-label">SECURE PAYMENT GATEWAY</span>
            <h1 class="payment-title">Complete Your Payment</h1>
            <p class="payment-subtitle">Finalize your TabStick order via UPI (GPay, PhonePe, Paytm, BHIM), Cards, or NetBanking.</p>

            <!-- Order Summary Box -->
            <div class="payment-order-box">
                <div class="order-box-header">
                    <div>
                        <span class="order-badge-label">ORDER NUMBER</span>
                        <h3 class="order-id-highlight">{{ $order->order_number }}</h3>
                    </div>
                    <div class="order-total-badge">
                        <span class="total-label">Total Payable</span>
                        <span class="total-amount">₹{{ number_format($order->total, 2) }}</span>
                    </div>
                </div>

                <div class="order-details-divider"></div>

                <!-- Customer Details -->
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
                        <span class="meta-label">Payment Mode:</span>
                        <strong class="meta-value">Online (Razorpay)</strong>
                    </div>
                    <div class="meta-item" style="grid-column: 1 / -1;">
                        <span class="meta-label">Deliver to:</span>
                        <span class="meta-value">{{ $order->address }}, {{ $order->city }}, {{ $order->state }} - {{ $order->postal_code }}</span>
                    </div>
                </div>

                <!-- Items list -->
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
                            <span class="mini-item-price" style="color: #16a34a; font-weight: 700;">FREE</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Payment Methods Supported Icons/Badges -->
            <div class="payment-methods-supported">
                <span class="methods-caption">SUPPORTED PAYMENT MODES</span>
                <div class="methods-badges-row">
                    <span class="pay-method-pill">⚡ Instant UPI / QR</span>
                    <span class="pay-method-pill">Google Pay</span>
                    <span class="pay-method-pill">PhonePe</span>
                    <span class="pay-method-pill">Paytm</span>
                    <span class="pay-method-pill">Visa / Mastercard / RuPay</span>
                    <span class="pay-method-pill">NetBanking</span>
                </div>
            </div>

            <!-- Pay Button & Status -->
            <div class="payment-action-wrap">
                <button id="pay-now" class="btn-razorpay-pay">
                    <span class="btn-icon">⚡</span>
                    <span class="btn-text">Pay with Razorpay · ₹{{ number_format($order->total, 2) }}</span>
                </button>

                <div id="payment-status-container" class="payment-status-container">
                    <div id="payment-spinner" class="payment-spinner" style="display: none;"></div>
                    <p id="payment-message" class="payment-message">
                        Click the button above to launch secure payment window.
                    </p>
                </div>
            </div>

            <!-- Trust footer -->
            <div class="payment-card-footer">
                <div class="trust-item">
                    <span>🛡️</span>
                    <span>100% Buyer Protection</span>
                </div>
                <div class="trust-item">
                    <span>⚡</span>
                    <span>Instant Confirmation</span>
                </div>
                <div class="trust-item">
                    <span>🔄</span>
                    <span>Auto Refund on Failure</span>
                </div>
            </div>
        </div>
    </div>

    <div class="payment-card-help">
        Need assistance or want to order on COD? <a href="mailto:hello@tabstick.in">Contact Support</a> or <a href="{{ route('home') }}#shop">Return to Shop</a>.
    </div>
</div>
@endsection

@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
const payButton = document.getElementById('pay-now');
const paymentMessage = document.getElementById('payment-message');
const paymentSpinner = document.getElementById('payment-spinner');
const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

const postJson = (url, payload) => fetch(url, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': csrfToken },
    body: JSON.stringify(payload)
}).then(async (response) => {
    const data = await response.json().catch(() => ({}));
    if (! response.ok) throw new Error(data.message || 'Payment request failed.');
    return data;
});

payButton.addEventListener('click', async () => {
    if (! window.Razorpay) {
        paymentMessage.innerHTML = '<span style="color:#ef4444;font-weight:700;">❌ Razorpay checkout could not load. Please check your internet connection and refresh.</span>';
        return;
    }
    payButton.disabled = true;
    if (paymentSpinner) paymentSpinner.style.display = 'inline-block';
    paymentMessage.textContent = 'Initiating secure Razorpay checkout...';

    try {
        const paymentOrder = await postJson(@json(route('api.razorpay.create')), {
            amount: {{ (int) round($order->total * 100) }},
            currency: 'INR',
            receipt: @json($order->order_number)
        });

        const checkout = new Razorpay({
            key: @json(config('services.razorpay.key')),
            amount: paymentOrder.amount,
            currency: paymentOrder.currency,
            name: 'TabStick',
            description: 'Order {{ $order->order_number }}',
            order_id: paymentOrder.order_id,
            prefill: {
                name: @json($order->customer_name),
                email: @json($order->email),
                contact: @json($order->phone)
            },
            handler: async function (response) {
                paymentMessage.textContent = 'Verifying your payment...';
                try {
                    const verified = await postJson(@json(route('api.razorpay.verify')), response);
                    window.location.href = verified.redirect_url;
                } catch (error) {
                    payButton.disabled = false;
                    if (paymentSpinner) paymentSpinner.style.display = 'none';
                    paymentMessage.innerHTML = `<span style="color:#ef4444;font-weight:700;">❌ ${error.message}</span>`;
                }
            },
            modal: {
                ondismiss: function () {
                    payButton.disabled = false;
                    if (paymentSpinner) paymentSpinner.style.display = 'none';
                    paymentMessage.innerHTML = '<span style="color:#ca8a04;font-weight:700;">⚠️ Payment window closed. You can retry payment for this order anytime using the button above.</span>';
                }
            },
            theme: { color: '#000000' }
        });

        checkout.on('payment.failed', function (response) {
            payButton.disabled = false;
            if (paymentSpinner) paymentSpinner.style.display = 'none';
            paymentMessage.innerHTML = `<span style="color:#ef4444;font-weight:700;">❌ ${response.error?.description || 'Payment failed. Please try again.'}</span>`;
        });

        if (paymentSpinner) paymentSpinner.style.display = 'none';
        paymentMessage.textContent = 'Complete your payment in the Razorpay popup...';
        checkout.open();
    } catch (error) {
        payButton.disabled = false;
        if (paymentSpinner) paymentSpinner.style.display = 'none';
        paymentMessage.innerHTML = `<span style="color:#ef4444;font-weight:700;">❌ ${error.message}</span>`;
    }
});
</script>
@endpush
