<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use App\Services\Shipping\ShippingProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class VendorController extends Controller
{
    public function index(): View
    {
        return view('admin.vendors.index', ['vendors' => Vendor::withCount('fulfillments')->latest('id')->paginate(20)]);
    }

    public function create(): View
    {
        return view('admin.vendors.form', ['vendor' => new Vendor(['is_active' => true, 'pickup_country' => 'India'])]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $vendor = Vendor::create($data);
        $this->syncPortalUser($request, $vendor);

        return redirect()->route('admin.vendors.edit', $vendor)->with('success', 'Vendor created.');
    }

    public function edit(Vendor $vendor): View
    {
        $vendor->load('users');
        return view('admin.vendors.form', compact('vendor'));
    }

    public function update(Request $request, Vendor $vendor): RedirectResponse
    {
        $vendor->update($this->validated($request, $vendor));
        $this->syncPortalUser($request, $vendor);

        return back()->with('success', 'Vendor updated.');
    }

    public function syncPickup(Vendor $vendor, ShippingProvider $provider): RedirectResponse
    {
        $response = $provider->syncPickupLocation($vendor);
        $address = $response['address'] ?? [];
        $vendor->update([
            'shiprocket_pickup_location' => $address['pickup_code'] ?? $vendor->shiprocket_pickup_location ?? 'tapstick-vendor-'.$vendor->id,
            'shiprocket_pickup_id' => $response['pickup_id'] ?? $address['id'] ?? $vendor->shiprocket_pickup_id,
            'pickup_synced_at' => now(),
        ]);

        return back()->with('success', 'Pickup location synchronized with Shiprocket.');
    }

    private function validated(Request $request, ?Vendor $vendor = null): array
    {
        return $request->validate([
            'business_name' => 'required|string|max:150',
            'contact_person' => 'required|string|max:120',
            'email' => ['required', 'email', 'max:150', Rule::unique('vendors')->ignore($vendor?->id)],
            'phone' => 'required|string|max:20',
            'pickup_address' => 'required|string|max:500',
            'pickup_address_2' => 'nullable|string|max:500',
            'pickup_city' => 'required|string|max:80',
            'pickup_state' => 'required|string|max:80',
            'pickup_postal_code' => 'required|string|max:12',
            'pickup_country' => 'required|string|max:80',
            'return_address' => 'nullable|string|max:800',
            'pickup_instructions' => 'nullable|string|max:800',
            'shiprocket_pickup_location' => ['nullable', 'string', 'max:120', Rule::unique('vendors')->ignore($vendor?->id)],
            'is_active' => 'required|boolean',
        ]);
    }

    private function syncPortalUser(Request $request, Vendor $vendor): void
    {
        $portal = $request->validate([
            'portal_name' => 'nullable|string|max:120',
            'portal_email' => 'nullable|email|max:150',
            'portal_password' => 'nullable|string|min:12|max:100',
        ]);

        if (empty($portal['portal_email'])) {
            return;
        }

        DB::transaction(function () use ($portal, $vendor) {
            $user = User::firstOrNew(['email' => $portal['portal_email']]);
            $user->name = $portal['portal_name'] ?: $vendor->contact_person;
            $user->vendor_id = $vendor->id;
            $user->is_vendor = true;
            $user->is_admin = false;
            if (! empty($portal['portal_password'])) {
                $user->password = $portal['portal_password'];
            }
            $user->save();
        });
    }
}
