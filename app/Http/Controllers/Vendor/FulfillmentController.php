<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\OrderFulfillment;
use App\Services\FulfillmentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FulfillmentController extends Controller
{
    public function dashboard(Request $request): View
    {
        $vendorId = $request->user()->vendor_id;
        $fulfillments = OrderFulfillment::with(['order', 'items', 'shipment'])
            ->where('vendor_id', $vendorId)
            ->latest('id')
            ->paginate(20);

        $counts = OrderFulfillment::where('vendor_id', $vendorId)
            ->selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        return view('vendor.dashboard', compact('fulfillments', 'counts'));
    }

    public function show(Request $request, OrderFulfillment $fulfillment): View
    {
        abort_unless($fulfillment->vendor_id === $request->user()->vendor_id, 403);
        $fulfillment->load(['order', 'items.product', 'shipment', 'histories']);
        return view('vendor.fulfillment', compact('fulfillment'));
    }

    public function transition(Request $request, OrderFulfillment $fulfillment, FulfillmentService $service): RedirectResponse
    {
        abort_unless($fulfillment->vendor_id === $request->user()->vendor_id, 403);
        $data = $request->validate(['status' => 'required|string|max:80', 'note' => 'nullable|string|max:500']);
        $service->transition($fulfillment, $data['status'], $request->user(), $data['note'] ?? null);

        return back()->with('success', 'Fulfillment updated.');
    }
}
