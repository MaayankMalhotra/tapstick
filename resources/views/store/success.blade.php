@extends('layouts.app')
@section('title', 'Order confirmed | Tab Stick')
@section('content')
<section class="shell section narrow center"><div class="success-mark">✓</div><span class="eyebrow">Order confirmed</span><h1 class="page-title">Thank you!</h1><p>Your order <b>{{ $order->order_number }}</b> has been placed.</p><p>Total: <b>₹{{ number_format($order->total, 0) }}</b> · Payment: {{ $order->payment_method === 'cod' ? 'Cash on delivery' : 'Paid online' }}</p><a class="pill dark" href="{{ route('home') }}">Continue shopping</a></section>
@endsection
