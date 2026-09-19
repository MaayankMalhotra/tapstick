@extends('admin.layout')

@section('title', 'Customers')

@section('content')
<div class="heading">
    <div>
        <div class="kicker">CUSTOMER DIRECTORY</div>
        <h1>Customers</h1>
        <p>View all customers who have placed orders on TabStick.</p>
    </div>
</div>

<div class="panel">
    <form method="GET" action="{{ route('admin.customers.index') }}" class="filters" style="margin-bottom:20px;">
        <label class="grow">
            Search customers
            <input type="search" name="q" value="{{ $q ?? '' }}" placeholder="Search by name, email, phone, or city...">
        </label>
        <button type="submit" class="button" style="padding:11px 18px;">Search</button>
        @if(!empty($q))
            <a href="{{ route('admin.customers.index') }}" class="ghost" style="padding:10px 16px;">Reset</a>
        @endif
    </form>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Email Address</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Total Orders</th>
                    <th>Total Spent</th>
                    <th>Last Order</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $customer)
                    <tr>
                        <td>
                            <strong style="font-size:15px; color:#0f172a;">{{ $customer->name }}</strong>
                        </td>
                        <td>
                            <a href="mailto:{{ $customer->email }}" style="font-weight:600;">{{ $customer->email }}</a>
                        </td>
                        <td>
                            <span style="font-family:monospace; font-size:13px;">{{ $customer->phone ?: '—' }}</span>
                        </td>
                        <td>
                            <span>{{ $customer->city ?: '—' }}</span>
                            @if($customer->state)
                                <small>{{ $customer->state }}</small>
                            @endif
                        </td>
                        <td>
                            <span class="badge" style="background:#eaf1df; font-weight:800; font-size:13px;">
                                {{ $customer->total_orders }} {{ Str::plural('order', $customer->total_orders) }}
                            </span>
                        </td>
                        <td>
                            <strong style="color:#0f172a; font-size:15px;">
                                Rs. {{ number_format($customer->total_spent, 2) }}
                            </strong>
                        </td>
                        <td>
                            <span>{{ \Carbon\Carbon::parse($customer->last_order_at)->format('d M Y') }}</span>
                            <small>{{ \Carbon\Carbon::parse($customer->last_order_at)->format('h:i A') }}</small>
                        </td>
                        <td>
                            <a href="{{ route('admin.orders.index', ['q' => $customer->email]) }}" class="button" style="padding:6px 12px; font-size:12px; background:#182d23;">
                                Orders ({{ $customer->total_orders }}) →
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="empty">
                            No customers found. Orders placed by customers will appear here automatically.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $customers->links() }}
    </div>
</div>
@endsection
