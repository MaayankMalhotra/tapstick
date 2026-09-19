<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index() { return view('admin.categories', ['categories' => Category::withCount('products')->orderBy('name')->get()]); }
    public function store(Request $request)
    {
        Category::create($this->validated($request));
        return back()->with('success', 'Category added.');
    }
    public function update(Request $request, Category $category)
    {
        $category->update($this->validated($request, $category));
        return back()->with('success', 'Category updated.');
    }
    public function destroy(Category $category)
    {
        if ($category->products()->exists()) return back()->withErrors(['category' => 'Move products to another category before deleting this category.']);
        $category->delete();
        return back()->with('success', 'Empty category deleted.');
    }
    private function validated(Request $request, ?Category $category = null): array
    {
        return $request->validate(['name' => 'required|string|max:100', 'slug' => ['required', 'max:150', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/', Rule::unique('categories')->ignore($category?->id)]]);
    }
}
