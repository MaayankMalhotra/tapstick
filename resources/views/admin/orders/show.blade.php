@extends('admin.layout')

@section('title', 'Order ' . $order->order_number)

@section('content')
<div class="heading">
    <div>
        <a href="{{ route('admin.orders.index') }}" style="display:inline-block; margin-bottom:8px; font-weight:700;">← Back to all orders</a>
        <div class="kicker">ORDER DETAILS</div>
        <h1>Order #{{ $order->order_number }}</h1>
        <p>Placed on {{ $order->created_at->format('d M Y, h:i A') }}</p>
    </div>
</div>

<div class="editor-grid">
    <div>
        <!-- Order Items Panel -->
        <div class="panel">
            <h2>Items Ordered ({{ $order->items->sum('quantity') }})</h2>
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Unit Price</th>
                            <th>Qty</th>
                            <th style="text-align:right;">Line Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>
                                    <div class="product-cell">
                                        <div class="thumb">
                                            @if($item->product?->image)
                                                <img src="{{ str_starts_with($item->product->image, 'http') ? $item->product->image : asset($item->product->image) }}" alt="{{ $item->product_name }}">
                                            @else
                                                <span>{{ $item->product?->emoji ?: '📦' }}</span>
                                            @endif
                                        </div>
                                        <div>
                                            <strong>{{ $item->product_name }}</strong>
                                            @if($item->product)
                                                <small>SKU: {{ $item->product->sku ?: '—' }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>Rs. {{ number_format($item->unit_price, 2) }}</td>
                                <td><strong>{{ $item->quantity }}</strong></td>
                                <td style="text-align:right;">
                                    <strong>Rs. {{ number_format($item->line_total, 2) }}</strong>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div style="margin-top:20px; border-top:1px solid #e8ece5; padding-top:16px; max-width:320px; margin-left:auto;">
                <div style="display:flex; justify-content:space-between; margin-bottom:8px; color:#6a786b; font-size:14px;">
                    <span>Subtotal:</span>
                    <strong>Rs. {{ number_format($order->subtotal, 2) }}</strong>
                </div>
                <div style="display:flex; justify-content:space-between; margin-bottom:8px; color:#6a786b; font-size:14px;">
                    <span>Shipping:</span>
                    <strong style="color:{{ $order->shipping == 0 ? '#166534' : 'inherit' }}">{{ $order->shipping > 0 ? 'Rs. '.number_format($order->shipping, 2) : 'FREE' }}</strong>
                </div>
                <div style="display:flex; justify-content:space-between; border-top:1px solid #e8ece5; padding-top:10px; font-size:17px; color:#0f172a;">
                    <strong>Total Amount:</strong>
                    <strong style="color:#a53329;">Rs. {{ number_format($order->total, 2) }}</strong>
                </div>
            </div>
        </div>

        <!-- Customer & Shipping Information -->
        <div class="panel">
            <h2>Customer &amp; Delivery Information</h2>
            <div class="form-grid">
                <div>
                    <label>
                        Customer Name
                        <input type="text" value="{{ $order->customer_name }}" readonly style="background:#f8fafc;">
                    </label>
                </div>
                <div>
                    <label>
                        Phone Number
                        <input type="text" value="{{ $order->phone }}" readonly style="background:#f8fafc;">
                    </label>
                </div>
                <div>
                    <label>
                        Email Address
                        <input type="text" value="{{ $order->email }}" readonly style="background:#f8fafc;">
                    </label>
                </div>
                <div>
                    <label>
                        City &amp; State
                        <input type="text" value="{{ $order->city }}, {{ $order->state }} - {{ $order->postal_code }}" readonly style="background:#f8fafc;">
                    </label>
                </div>
                <div class="wide">
                    <label>
                        Complete Shipping Street Address
                        <textarea rows="3" readonly style="background:#f8fafc;">{{ $order->address }}</textarea>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Status & Actions Sidebar -->
    <div>
        <div class="panel">
            <h2>Update Order Status</h2>
            <form method="POST" action="{{ route('admin.orders.update', $order) }}">
                @csrf
                @method('PUT')

                <label>
                    Fulfillment Status
                    <select name="status">
                        <option value="placed" {{ $order->status === 'placed' ? 'selected' : '' }}>Placed</option>
                        <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </label>

                <label>
                    Payment Status
                    <select name="payment_status">
                        <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="cod_pending" {{ $order->payment_status === 'cod_pending' ? 'selected' : '' }}>COD Pending</option>
                        <option value="pending" {{ $order->payment_status === 'pending' ? 'selected' : '' }}>Pending (Razorpay)</option>
                        <option value="failed" {{ $order->payment_status === 'failed' ? 'selected' : '' }}>Failed</option>
                    </select>
                </label>

                <button type="submit" class="button full" style="margin-top:12px;">Save Changes</button>
            </form>
        </div>

        <div class="panel">
            <h2>Payment Metadata</h2>
            <div style="font-size:13px; line-height:1.8;">
                <div><strong>Gateway:</strong> {{ strtoupper($order->payment_method) }}</div>
                <div><strong>Razorpay Order ID:</strong> <span style="font-family:monospace;">{{ $order->razorpay_order_id ?: '—' }}</span></div>
                <div><strong>Payment ID:</strong> <span style="font-family:monospace;">{{ $order->razorpay_payment_id ?: '—' }}</span></div>
                @if($order->razorpay_signature)
                    <div><strong>Signature Verified:</strong> <span class="badge" style="background:#dcfce7; color:#166534;">Yes</span></div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
