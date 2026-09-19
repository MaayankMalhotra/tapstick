@extends('admin.layout')

@section('title', 'Orders')

@section('content')
<div class="heading">
    <div>
        <div class="kicker">ORDER MANAGEMENT</div>
        <h1>Customer Orders</h1>
        <p>Track, fulfill, and manage orders placed on TabStick.</p>
    </div>
</div>

<div class="panel">
    <form method="GET" action="{{ route('admin.orders.index') }}" class="filters" style="flex-wrap:wrap; margin-bottom:20px;">
        <label class="grow" style="min-width:260px;">
            Search orders
            <input type="search" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Search by order #, customer name, email, phone...">
        </label>

        <label style="min-width:160px;">
            Payment Status
            <select name="payment_status" onchange="this.form.submit()">
                <option value="all">All Payment Statuses</option>
                <option value="paid" {{ ($filters['payment_status'] ?? '') === 'paid' ? 'selected' : '' }}>Paid</option>
                <option value="pending" {{ ($filters['payment_status'] ?? '') === 'pending' ? 'selected' : '' }}>Pending (Razorpay)</option>
                <option value="cod_pending" {{ ($filters['payment_status'] ?? '') === 'cod_pending' ? 'selected' : '' }}>COD Pending</option>
                <option value="failed" {{ ($filters['payment_status'] ?? '') === 'failed' ? 'selected' : '' }}>Failed</option>
            </select>
        </label>

        <label style="min-width:160px;">
            Order Status
            <select name="status" onchange="this.form.submit()">
                <option value="all">All Order Statuses</option>
                <option value="placed" {{ ($filters['status'] ?? '') === 'placed' ? 'selected' : '' }}>Placed</option>
                <option value="processing" {{ ($filters['status'] ?? '') === 'processing' ? 'selected' : '' }}>Processing</option>
                <option value="shipped" {{ ($filters['status'] ?? '') === 'shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="delivered" {{ ($filters['status'] ?? '') === 'delivered' ? 'selected' : '' }}>Delivered</option>
                <option value="cancelled" {{ ($filters['status'] ?? '') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </label>

        <button type="submit" class="button" style="padding:11px 18px;">Filter</button>
        @if(!empty($filters['q']) || !empty($filters['payment_status']) || !empty($filters['status']))
            <a href="{{ route('admin.orders.index') }}" class="ghost" style="padding:10px 16px;">Reset</a>
        @endif
    </form>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Items</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Order Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>
                            <a href="{{ route('admin.orders.show', $order) }}" style="font-weight:800; font-family:monospace; font-size:13px;">
                                {{ $order->order_number }}
                            </a>
                        </td>
                        <td>
                            <span style="white-space:nowrap;">{{ $order->created_at->format('d M Y') }}</span>
                            <small>{{ $order->created_at->format('h:i A') }}</small>
                        </td>
                        <td>
                            <strong>{{ $order->customer_name }}</strong>
                            <small>{{ $order->phone }}</small>
                            <small style="color:#64748b;">{{ $order->email }}</small>
                        </td>
                        <td>
                            <div style="max-width:280px; font-size:13px; line-height:1.4;">
                                @foreach($order->items as $item)
                                    <div>• {{ $item->product_name }} <span style="color:#64748b;">× {{ $item->quantity }}</span></div>
                                @endforeach
                            </div>
                        </td>
                        <td>
                            <strong style="font-size:15px; color:#0f172a;">Rs. {{ number_format($order->total, 2) }}</strong>
                        </td>
                        <td>
                            <div>
                                @if($order->payment_status === 'paid')
                                    <span class="badge" style="background:#dcfce7; color:#166534;">✓ Paid</span>
                                @elseif($order->payment_status === 'cod_pending')
                                    <span class="badge" style="background:#fef9c3; color:#854d0e;">COD Pending</span>
                                @else
                                    <span class="badge warn">Payment Pending</span>
                                @endif
                            </div>
                            <small style="text-transform:uppercase; margin-top:4px; font-weight:700;">
                                {{ $order->payment_method === 'cod' ? '💵 Cash on Delivery' : '⚡ Razorpay' }}
                            </small>
                        </td>
                        <td>
                            @php
                                $statusColors = [
                                    'placed' => 'background:#e0f2fe; color:#0369a1;',
                                    'processing' => 'background:#fef3c7; color:#92400e;',
                                    'shipped' => 'background:#e0e7ff; color:#3730a3;',
                                    'delivered' => 'background:#dcfce7; color:#166534;',
                                    'cancelled' => 'background:#fee2e2; color:#991b1b;',
                                ];
                            @endphp
                            <span class="badge" style="{{ $statusColors[$order->status] ?? 'background:#f1f5f9; color:#475569;' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order) }}" class="button" style="padding:6px 12px; font-size:12px; background:#182d23;">
                                Details →
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="empty">
                            No orders found matching the filter criteria.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $orders->links() }}
    </div>
</div>
@endsection
