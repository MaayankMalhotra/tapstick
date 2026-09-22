<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\CreateShipmentForFulfillment;
use App\Models\OrderFulfillment;
use App\Models\Vendor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FulfillmentController extends Controller
{
    public function index(Request $request): View
    {
        $filters = $request->validate(['status' => 'nullable|string|max:80', 'vendor_id' => 'nullable|integer|exists:vendors,id']);
        $query = OrderFulfillment::with(['order', 'vendor', 'shipment'])->latest('id');
        if (! empty($filters['status']) && $filters['status'] !== 'all') {
            $query->where('status', $filters['status']);
        }
        if (! empty($filters['vendor_id'])) {
            $query->where('vendor_id', $filters['vendor_id']);
        }

        return view('admin.fulfillments.index', [
            'fulfillments' => $query->paginate(20)->withQueryString(),
            'vendors' => Vendor::orderBy('business_name')->get(),
            'filters' => $filters,
        ]);
    }

    public function show(OrderFulfillment $fulfillment): View
    {
        $fulfillment->load(['order', 'vendor', 'items.product', 'shipment', 'histories.user']);
        return view('admin.fulfillments.show', compact('fulfillment'));
    }

    public function retryShipment(OrderFulfillment $fulfillment): RedirectResponse
    {
        CreateShipmentForFulfillment::dispatch($fulfillment->id);
        return back()->with('success', 'Shipment job queued safely.');
    }
}
