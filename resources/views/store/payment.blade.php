@extends('layouts.app')
@section('title', 'Complete payment | Tab Stick')
@section('content')
<section class="shell section narrow center"><span class="eyebrow">Secure payment</span><h1 class="page-title">Complete your payment</h1><p>Order {{ $order->order_number }} · ₹{{ number_format($order->total, 0) }}</p><button id="pay-now" class="pill orange">Pay with Razorpay</button><p id="payment-message" class="muted">Use UPI, cards, wallets or netbanking through Razorpay.</p></section>
@endsection
@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
const payButton = document.getElementById('pay-now');
const paymentMessage = document.getElementById('payment-message');
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
        paymentMessage.textContent = 'Razorpay checkout could not load. Please refresh and try again.';
        return;
    }
    payButton.disabled = true;
    paymentMessage.textContent = 'Creating secure Razorpay order...';
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
            name: 'Tab Stick',
            description: 'Order {{ $order->order_number }}',
            order_id: paymentOrder.order_id,
            prefill: { name: @json($order->customer_name), email: @json($order->email), contact: @json($order->phone) },
            handler: async function (response) {
                paymentMessage.textContent = 'Verifying your payment...';
                try {
                    const verified = await postJson(@json(route('api.razorpay.verify')), response);
                    window.location.href = verified.redirect_url;
                } catch (error) {
                    payButton.disabled = false;
                    paymentMessage.textContent = error.message;
                }
            },
            modal: {
                ondismiss: function () {
                    payButton.disabled = false;
                    paymentMessage.textContent = 'Payment window closed. You can retry payment for this order.';
                }
            },
            theme: { color: '#ff5c35' }
        });
        checkout.on('payment.failed', function (response) {
            payButton.disabled = false;
            paymentMessage.textContent = response.error?.description || 'Payment failed. Please try again.';
        });
        checkout.open();
    } catch (error) {
        payButton.disabled = false;
        paymentMessage.textContent = error.message;
    }
});
</script>
@endpush
