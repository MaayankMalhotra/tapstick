<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(Request $request): View
    {
        $filters = $request->validate([
            'q' => 'nullable|string|max:100',
            'payment_status' => 'nullable|string|in:all,paid,pending,cod_pending,failed',
            'status' => 'nullable|string|in:all,placed,processing,shipped,delivered,cancelled',
        ]);

        $query = Order::with('items');

        if ($q = $filters['q'] ?? null) {
            $query->where(function ($builder) use ($q) {
                $builder->where('order_number', 'like', '%'.$q.'%')
                    ->orWhere('customer_name', 'like', '%'.$q.'%')
                    ->orWhere('email', 'like', '%'.$q.'%')
                    ->orWhere('phone', 'like', '%'.$q.'%')
                    ->orWhere('city', 'like', '%'.$q.'%');
            });
        }

        if (! empty($filters['payment_status']) && $filters['payment_status'] !== 'all') {
            $query->where('payment_status', $filters['payment_status']);
        }

        if (! empty($filters['status']) && $filters['status'] !== 'all') {
            $query->where('status', $filters['status']);
        }

        $orders = $query->latest('id')->paginate(15)->withQueryString();

        return view('admin.orders.index', compact('orders', 'filters'));
    }

    public function show(Order $order): View
    {
        $order->load('items.product');
        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, Order $order): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|string|in:placed,processing,shipped,delivered,cancelled',
            'payment_status' => 'nullable|string|in:paid,pending,cod_pending,failed',
        ]);

        $order->update($validated);

        return back()->with('success', 'Order '.$order->order_number.' updated successfully.');
    }
}
