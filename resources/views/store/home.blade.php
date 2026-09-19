@extends('layouts.app')
@section('content')
<section class="shell hero">
    <div>
        <span class="eyebrow">Made to stick. Built to speak.</span>
        <h1>Stick your<br>story.</h1>
        <p>Fresh, durable stickers for laptops, bottles, cars and everything you make your own. Pick a vibe, peel and transform.</p>
        <a class="pill orange" href="#shop">Shop stickers →</a>
    </div>
    <div class="sticker-stage" aria-label="Colourful Tab Stick sticker preview">
        <div class="sticker s1">GOOD VIBES</div><div class="sticker s2">CREATE ✦</div><div class="sticker s3">ROAD TRIP</div>
    </div>
</section>
<section id="shop" class="shell section">
    <div class="section-head"><div><span class="eyebrow">New drops</span><h2>Popular stickers</h2></div></div>
    <div class="product-grid">
        @forelse($products as $product)
            <article class="card">
                <a class="card-image" href="{{ route('products.show', $product) }}">@if($product->image)<img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" style="width:100%;height:100%;object-fit:contain" loading="lazy">@else{{ $product->emoji ?: '✨' }}@endif</a>
                <div class="card-body">
                    <small>{{ $product->category?->name }}</small>
                    <h3><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h3>
                    <div class="price">₹{{ number_format($product->price, 2) }}</div>
                    <form action="{{ route('cart.add', $product) }}" method="POST">@csrf<button class="pill dark full" type="submit">Add to cart</button></form>
                </div>
            </article>
        @empty
            <div class="empty">Fresh drops are on their way. Check back soon.</div>
        @endforelse
    </div>
</section>
<section id="why" class="shell section feature-row">
    <div><span class="eyebrow">Why Tab Stick?</span><h2>Small stickers.<br>Big personality.</h2></div>
    <div class="benefits"><div><b>Weather resistant</b><span>Built for everyday use</span></div><div><b>Clean cuts</b><span>Easy peel, strong hold</span></div><div><b>Bold colour</b><span>Made to stand out</span></div></div>
</section>
@endsection
