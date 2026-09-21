<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GrazeMenuCategory;
use App\Models\GrazeMenuItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Str;

class GrazeMenuAdminController extends Controller
{
    protected function isAuthorized(Request $request): bool
    {
        if (Auth::check() && Auth::user()?->is_admin) {
            return true;
        }

        return (bool)$request->session()->get('graze_admin_auth', false);
    }

    public function index(Request $request): View|RedirectResponse
    {
        if (! $this->isAuthorized($request)) {
            return redirect()->route('graze.admin.login');
        }

        $categories = GrazeMenuCategory::withCount('items')->orderBy('sort_order')->get();

        $selectedCategorySlug = $request->input('category');
        $selectedCategory = null;
        if ($selectedCategorySlug) {
            $selectedCategory = $categories->firstWhere('slug', $selectedCategorySlug);
        }

        $q = $request->input('q');
        $type = $request->input('type');

        $query = GrazeMenuItem::with('category');

        if ($selectedCategory) {
            $query->where('category_id', $selectedCategory->id);
        }

        if ($q) {
            $query->where(function ($b) use ($q) {
                $b->where('name', 'like', "%{$q}%")
                  ->orWhere('description', 'like', "%{$q}%")
                  ->orWhere('price', 'like', "%{$q}%");
            });
        }

        if ($type && in_array($type, ['Veg', 'Non-Veg', 'Veg / Non-Veg'])) {
            $query->where('type', $type);
        }

        $items = $query->orderBy('category_id')->orderBy('sort_order')->paginate(30)->withQueryString();

        $stats = [
            'total_items' => GrazeMenuItem::count(),
            'total_categories' => $categories->count(),
            'active_items' => GrazeMenuItem::where('is_active', true)->count(),
            'veg_items' => GrazeMenuItem::where('type', 'Veg')->count(),
            'non_veg_items' => GrazeMenuItem::where('type', 'Non-Veg')->count(),
        ];

        $adminName = Auth::user()?->name ?? $request->session()->get('graze_admin_name', 'Graze Manager');

        return view('admin.graze.menu.index', compact(
            'categories', 'items', 'selectedCategory', 'q', 'type', 'stats', 'adminName'
        ));
    }

    public function store(Request $request): RedirectResponse
    {
        if (! $this->isAuthorized($request)) {
            return redirect()->route('graze.admin.login');
        }

        $validated = $request->validate([
            'category_id' => 'required|exists:graze_menu_categories,id',
            'name' => 'required|string|max:150',
            'description' => 'nullable|string|max:1000',
            'type' => 'required|string|in:Veg,Non-Veg,Veg / Non-Veg',
            'price' => 'required|string|max:30',
            'unit' => 'nullable|string|max:30',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $item = GrazeMenuItem::create([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'type' => $validated['type'],
            'price' => $validated['price'],
            'unit' => $validated['unit'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => true,
        ]);

        return back()->with('success', "Dish '{$item->name}' added to menu.");
    }

    public function update(Request $request, GrazeMenuItem $item): RedirectResponse
    {
        if (! $this->isAuthorized($request)) {
            return redirect()->route('graze.admin.login');
        }

        $validated = $request->validate([
            'category_id' => 'required|exists:graze_menu_categories,id',
            'name' => 'required|string|max:150',
            'description' => 'nullable|string|max:1000',
            'type' => 'required|string|in:Veg,Non-Veg,Veg / Non-Veg',
            'price' => 'required|string|max:30',
            'unit' => 'nullable|string|max:30',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $item->update($validated);

        return back()->with('success', "Dish '{$item->name}' updated successfully.");
    }

    public function destroy(Request $request, GrazeMenuItem $item): RedirectResponse
    {
        if (! $this->isAuthorized($request)) {
            return redirect()->route('graze.admin.login');
        }

        $name = $item->name;
        $item->delete();

        return back()->with('success', "Dish '{$name}' removed from menu.");
    }

    public function toggleActive(Request $request, GrazeMenuItem $item): RedirectResponse
    {
        if (! $this->isAuthorized($request)) {
            return redirect()->route('graze.admin.login');
        }

        $item->update([
            'is_active' => ! $item->is_active,
        ]);

        $status = $item->is_active ? 'Active (Visible on Website)' : 'Hidden (Unavailable)';

        return back()->with('success', "Item '{$item->name}' is now {$status}.");
    }

    public function storeCategory(Request $request): RedirectResponse
    {
        if (! $this->isAuthorized($request)) {
            return redirect()->route('graze.admin.login');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'nullable|string|max:50|unique:graze_menu_categories,slug',
            'subtitle' => 'nullable|string|max:500',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);
        if (empty($slug)) {
            $slug = 'cat-' . time();
        }

        $originalSlug = $slug;
        $counter = 1;
        while (GrazeMenuCategory::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }

        $maxSort = GrazeMenuCategory::max('sort_order') ?? 0;

        $category = GrazeMenuCategory::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'subtitle' => $validated['subtitle'] ?? null,
            'sort_order' => $validated['sort_order'] ?? ($maxSort + 1),
            'is_active' => true,
        ]);

        return redirect()->route('graze.admin.menu.index', ['category' => $category->slug])
            ->with('success', "Category '{$category->name}' created successfully.");
    }

    public function updateCategory(Request $request, GrazeMenuCategory $category): RedirectResponse
    {
        if (! $this->isAuthorized($request)) {
            return redirect()->route('graze.admin.login');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'nullable|string|max:50|unique:graze_menu_categories,slug,' . $category->id,
            'subtitle' => 'nullable|string|max:500',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable',
        ]);

        if (!empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        $validated['is_active'] = $request->has('is_active');

        $category->update($validated);

        return back()->with('success', "Category '{$category->name}' updated successfully.");
    }

    public function destroyCategory(Request $request, GrazeMenuCategory $category): RedirectResponse
    {
        if (! $this->isAuthorized($request)) {
            return redirect()->route('graze.admin.login');
        }

        $itemCount = $category->items()->count();
        if ($itemCount > 0 && ! $request->boolean('force')) {
            return back()->with('error', "Cannot delete category '{$category->name}' because it contains {$itemCount} dishes. Remove dishes first or confirm forced deletion.");
        }

        $name = $category->name;
        $category->delete();

        return redirect()->route('graze.admin.menu.index')
            ->with('success', "Category '{$name}' deleted successfully.");
    }
}
