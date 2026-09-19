@extends('admin.layout')
@section('title', 'Overview')
@section('content')
<div class="heading">
    <div>
        <div class="kicker">YOUR STORE, AT A GLANCE</div>
        <h1>Store &amp; Inventory Overview</h1>
        <p>Monitor orders, customers, and ready-to-ship sticker stock.</p>
    </div>
    <div style="display:flex; gap:10px;">
        <a class="button" href="{{ route('admin.orders.index') }}" style="background:#182d23;">View Orders</a>
        <a class="button" href="{{ route('admin.products.create') }}">+ Add product</a>
    </div>
</div>

<div class="stats">
    <article style="border-left: 4px solid #df7239;">
        <span>Total Orders</span>
        <strong>{{ $totalOrders }}</strong>
        <small style="color:#df7239; font-weight:700;"><a href="{{ route('admin.orders.index') }}">View all orders →</a></small>
    </article>
    <article style="border-left: 4px solid #225a43;">
        <span>Active Customers</span>
        <strong>{{ $totalCustomers }}</strong>
        <small style="color:#225a43; font-weight:700;"><a href="{{ route('admin.customers.index') }}">View directory →</a></small>
    </article>
    <article>
        <span>Visible Products</span>
        <strong>{{ $activeProducts }}</strong>
        <small style="color:#6a786b;">out of {{ $totalProducts }} products</small>
    </article>
    <article class="{{ $lowStockCount > 0 ? 'alert-stat' : '' }}">
        <span>Low Stock Alert</span>
        <strong>{{ $lowStockCount }}</strong>
        <small style="color:#6a786b;">{{ number_format($units) }} units in stock</small>
    </article>
</div>

<!-- Recent Orders Section -->
<div class="panel">
    <div class="heading">
        <h2>Recent Orders &amp; Customers</h2>
        <a href="{{ route('admin.orders.index') }}">View all orders →</a>
    </div>
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
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentOrders as $order)
                    <tr>
                        <td>
                            <a href="{{ route('admin.orders.show', $order) }}" style="font-weight:800; font-family:monospace; font-size:13px;">
                                {{ $order->order_number }}
                            </a>
                        </td>
                        <td>
                            <span style="white-space:nowrap;">{{ $order->created_at->format('d M') }}</span>
                            <small>{{ $order->created_at->format('h:i A') }}</small>
                        </td>
                        <td>
                            <strong>{{ $order->customer_name }}</strong>
                            <small>{{ $order->phone ?: $order->email }}</small>
                        </td>
                        <td>
                            <span style="font-size:13px;">
                                {{ $order->items->first()?->product_name }}
                                @if($order->items->count() > 1)
                                    <small style="display:inline; color:#64748b;">+{{ $order->items->count() - 1 }} more</small>
                                @endif
                            </span>
                        </td>
                        <td>
                            <strong style="color:#0f172a;">Rs. {{ number_format($order->total, 2) }}</strong>
                        </td>
                        <td>
                            @if($order->payment_status === 'paid')
                                <span class="badge" style="background:#dcfce7; color:#166534;">✓ Paid</span>
                            @elseif($order->payment_status === 'cod_pending')
                                <span class="badge" style="background:#fef9c3; color:#854d0e;">COD</span>
                            @else
                                <span class="badge warn">Pending</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge" style="text-transform:capitalize;">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order) }}" style="font-weight:700;">View →</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="empty">No orders placed yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="panel"><div class="heading"><h2>Needs attention</h2><a href="{{ route('admin.products.index', ['status' => 'low']) }}">View all low stock →</a></div><div class="table-wrap"><table><thead><tr><th>Product</th><th>SKU</th><th>Available</th><th>Alert at</th><th></th></tr></thead><tbody>@forelse($lowStock as $product)<tr><td>{{ $product->name }}</td><td>{{ $product->sku ?: '—' }}</td><td><span class="badge warn">{{ $product->stock }}</span></td><td>{{ $product->low_stock_threshold }}</td><td><a href="{{ route('admin.products.edit', $product) }}">Manage</a></td></tr>@empty<tr><td colspan="5" class="empty">All products are above their stock alert levels.</td></tr>@endforelse</tbody></table></div></div>
<div class="panel"><div class="heading"><h2>Recent stock changes</h2><a href="{{ route('admin.history') }}">Full history →</a></div>@include('admin.movements')</div>
@endsection
