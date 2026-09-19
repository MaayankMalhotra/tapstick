@extends('layouts.app')
@section('title', $product->name.' | Tab Stick')
@section('content')
<section class="shell product-detail">
    <div class="product-art">@if($product->image)<img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" style="max-width:100%;max-height:500px;object-fit:contain">@else{{ $product->emoji ?: '✨' }}@endif</div>
    <div><span class="eyebrow">{{ $product->category?->name ?? 'Tab Stick' }}</span><h1>{{ $product->name }}</h1><p>{{ $product->description }}</p><div class="big-price">₹{{ number_format($product->price, 2) }}</div><p class="stock">{{ $product->stock }} in stock</p>
        <form class="buy-form" action="{{ route('cart.add', $product) }}" method="POST">@csrf<label>Quantity<input type="number" name="quantity" value="1" min="1" max="{{ min(20, $product->stock) }}"></label><button class="pill orange" type="submit">Add to cart</button></form>
    </div>
</section>
@endsection
