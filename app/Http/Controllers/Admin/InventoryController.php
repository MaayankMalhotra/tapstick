<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CustomerLead;
use App\Models\Order;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class InventoryController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalProducts' => Product::count(),
            'activeProducts' => Product::where('is_active', true)->count(),
            'units' => Product::sum('stock'),
            'lowStockCount' => Product::whereColumn('stock', '<=', 'low_stock_threshold')->count(),
            'lowStock' => Product::whereColumn('stock', '<=', 'low_stock_threshold')->orderBy('stock')->limit(12)->get(),
            'movements' => StockMovement::with(['product', 'user'])->latest('id')->limit(10)->get(),
            'totalOrders' => Order::count(),
            'totalRevenue' => (float) Order::where(fn ($q) => $q->where('payment_status', 'paid')->orWhere('payment_method', 'cod'))->sum('total'),
            'recentOrders' => Order::with('items')->latest('id')->limit(6)->get(),
            'totalCustomers' => Order::distinct('email')->count('email'),
            'totalLeads' => CustomerLead::count(),
            'recentLeads' => CustomerLead::latest('id')->limit(6)->get(),
        ]);
    }

    public function index(Request $request)
    {
        $filters = $request->validate(['q' => 'nullable|string|max:100', 'status' => 'nullable|in:active,hidden,low,out']);
        $query = Product::with('category');
        if ($q = $filters['q'] ?? null) {
            $query->where(fn ($builder) => $builder->where('name', 'like', '%'.$q.'%')->orWhere('sku', 'like', '%'.$q.'%'));
        }
        match ($filters['status'] ?? '') {
            'active' => $query->where('is_active', true),
            'hidden' => $query->where('is_active', false),
            'low' => $query->whereColumn('stock', '<=', 'low_stock_threshold'),
            'out' => $query->where('stock', 0),
            default => null,
        };
        return view('admin.products', ['products' => $query->latest('id')->paginate(20)->withQueryString()]);
    }

    public function create()
    {
        return view('admin.product-form', ['product' => new Product(['is_active' => true, 'low_stock_threshold' => 5]), 'categories' => Category::orderBy('name')->get()]);
    }

    public function edit(Product $product)
    {
        return view('admin.product-form', ['product' => $product, 'categories' => Category::orderBy('name')->get()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $request->validate(['stock' => 'required|integer|min:0|max:1000000']);
        $path = $request->hasFile('image') ? $request->file('image')->store('products', 'public') : null;
        if ($path === false) throw ValidationException::withMessages(['image' => 'Image upload failed. Please check storage permissions and try again.']);
        try {
            $product = DB::transaction(function () use ($request, $data, $path) {
                $product = Product::create([...$data, 'image' => $path, 'stock' => (int) $request->stock]);
                StockMovement::create(['product_id' => $product->id, 'user_id' => $request->user()->id, 'quantity_change' => $product->stock, 'stock_after' => $product->stock, 'reason' => 'Opening inventory']);
                return $product;
            });
        } catch (\Throwable $e) {
            if ($path) Storage::disk('public')->delete($path);
            throw $e;
        }
        return redirect()->route('admin.products.edit', $product)->with('success', 'Product created.');
    }

    public function update(Request $request, Product $product)
    {
        $data = $this->validated($request, $product);
        $oldImage = $product->image;
        $path = $request->hasFile('image') ? $request->file('image')->store('products', 'public') : null;
        if ($path === false) throw ValidationException::withMessages(['image' => 'Image upload failed. Please check storage permissions and try again.']);
        if ($path) $data['image'] = $path;
        elseif ($request->boolean('remove_image')) $data['image'] = null;
        try {
            $product->update($data);
        } catch (\Throwable $e) {
            if ($path) Storage::disk('public')->delete($path);
            throw $e;
        }
        if (($path || $request->boolean('remove_image')) && $oldImage) Storage::disk('public')->delete($oldImage);
        return back()->with('success', 'Product updated.');
    }

    public function adjust(Request $request, Product $product)
    {
        $data = $request->validate(['quantity_change' => 'required|integer|not_in:0|between:-1000000,1000000', 'reason' => 'required|string|max:255']);
        DB::transaction(function () use ($data, $product, $request) {
            $locked = Product::whereKey($product->id)->lockForUpdate()->firstOrFail();
            $after = $locked->stock + (int) $data['quantity_change'];
            if ($after < 0 || $after > 1000000) throw ValidationException::withMessages(['quantity_change' => 'The resulting stock must be between 0 and 1,000,000.']);
            $locked->update(['stock' => $after]);
            StockMovement::create(['product_id' => $locked->id, 'user_id' => $request->user()->id, 'quantity_change' => (int) $data['quantity_change'], 'stock_after' => $after, 'reason' => $data['reason']]);
        });
        return back()->with('success', 'Stock adjustment saved.');
    }

    public function history()
    {
        return view('admin.history', ['movements' => StockMovement::with(['product', 'user'])->latest('id')->paginate(30)]);
    }

    private function validated(Request $request, ?Product $product = null): array
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'slug' => ['required', 'string', 'max:150', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/', Rule::unique('products')->ignore($product?->id)],
            'sku' => ['required', 'string', 'max:80', Rule::unique('products')->ignore($product?->id)],
            'category_id' => 'nullable|exists:categories,id', 'description' => 'nullable|string|max:5000',
            'price' => 'required|numeric|min:0.01|max:999999.99|decimal:0,2',
            'low_stock_threshold' => 'required|integer|min:0|max:1000000',
            'emoji' => 'nullable|string|max:10', 'is_active' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096', 'remove_image' => 'nullable|boolean',
        ]);
        unset($data['image'], $data['remove_image']);
        return $data;
    }
}
