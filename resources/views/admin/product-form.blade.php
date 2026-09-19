@extends('admin.layout')
@section('title', $product->exists ? 'Manage product' : 'Add product')
@section('content')
<div class="heading"><div><a href="{{ route('admin.products.index') }}">← All products</a><h1>{{ $product->exists ? $product->name : 'Add a product' }}</h1></div>@if($product->exists)<span class="badge">{{ $product->stock }} units available</span>@endif</div>
<div class="editor-grid"><form class="panel" method="POST" enctype="multipart/form-data" action="{{ $product->exists ? route('admin.products.update', $product) : route('admin.products.store') }}">@csrf @if($product->exists)@method('PUT')@endif
<h2>Product details</h2><div class="form-grid">
<label class="wide">Name<input name="name" value="{{ old('name', $product->name) }}" required maxlength="150"></label>
<label>URL slug<input name="slug" value="{{ old('slug', $product->slug) }}" required pattern="[a-z0-9]+(-[a-z0-9]+)*" placeholder="good-vibes" maxlength="150"></label>
<label>SKU<input name="sku" value="{{ old('sku', $product->sku) }}" required maxlength="80" placeholder="TS-001"></label>
<label>Category<select name="category_id"><option value="">Uncategorized</option>@foreach($categories as $category)<option value="{{ $category->id }}" @selected((string) old('category_id', $product->category_id) === (string) $category->id)>{{ $category->name }}</option>@endforeach</select></label>
<label>Price (INR)<input name="price" type="number" min="0.01" max="999999.99" step="0.01" value="{{ old('price', $product->price) }}" required></label>
<label class="wide">Description<textarea name="description" rows="5" maxlength="5000">{{ old('description', $product->description) }}</textarea></label>
<label>Low-stock alert at<input name="low_stock_threshold" type="number" min="0" max="1000000" value="{{ old('low_stock_threshold', $product->low_stock_threshold) }}" required></label>
<label>Store visibility<select name="is_active"><option value="1" @selected((string) old('is_active', (int) $product->is_active) === '1')>Visible</option><option value="0" @selected((string) old('is_active', (int) $product->is_active) === '0')>Hidden (archive)</option></select></label>
@unless($product->exists)<label>Opening stock<input name="stock" type="number" min="0" max="1000000" value="{{ old('stock', 0) }}" required></label>@endunless
<label>Fallback emoji<input name="emoji" value="{{ old('emoji', $product->emoji) }}" maxlength="10"></label>
<label class="wide">Product image<input name="image" type="file" accept="image/jpeg,image/png,image/webp"><small>JPG, PNG or WebP. Maximum 4 MB.</small></label>
@if($product->image)<div class="wide"><img class="preview" src="{{ asset('storage/'.$product->image) }}" alt="Current product image"><label class="check"><input type="checkbox" name="remove_image" value="1">Remove current image</label></div>@endif
</div><button class="button">{{ $product->exists ? 'Save product' : 'Create product' }}</button><p class="muted">Hidden products disappear from the storefront. Their orders and stock history remain available.</p></form>
@if($product->exists)<aside><form class="panel" method="POST" action="{{ route('admin.products.stock', $product) }}">@csrf<h2>Adjust stock</h2><div class="stock-number">{{ $product->stock }} <small>units</small></div><p>Add received stock or subtract damaged, lost or manually sold items.</p><label>Quantity change<input name="quantity_change" type="number" required min="-1000000" max="1000000" value="{{ old('quantity_change') }}" placeholder="20 or -3"></label><label>Reason<input name="reason" required maxlength="255" value="{{ old('reason') }}" placeholder="Supplier delivery / damaged stock"></label><button class="button">Record adjustment</button></form></aside>@endif
</div>
@endsection
