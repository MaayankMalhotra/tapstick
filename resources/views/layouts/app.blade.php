<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Tab Stick — expressive, durable stickers for laptops, bottles, cars and more.">
    <title>@yield('title', 'Tab Stick | Stick your story')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="page">
    <header class="shell nav">
        <a class="brand" href="{{ route('home') }}">tab <span>stick</span></a>
        <nav class="navlinks">
            <a href="{{ route('home') }}#shop">Shop</a>
            <a href="{{ route('home') }}#why">Why Tab Stick?</a>
            <a class="pill dark" href="{{ route('cart.index') }}">Cart ({{ array_sum(session('cart', [])) }})</a>
        </nav>
    </header>

    @if(session('success')) <div class="shell alert success">{{ session('success') }}</div> @endif
    @if(session('error')) <div class="shell alert error">{{ session('error') }}</div> @endif
    @if($errors->any())
        <div class="shell alert error"><strong>Please fix the following:</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif

    <main>@yield('content')</main>
    <footer class="footer"><div class="shell"><a class="brand inverse" href="{{ route('home') }}">tab <span>stick</span></a><p>© {{ date('Y') }} Tab Stick. Stick your story.</p></div></footer>
</div>
@stack('scripts')
</body>
</html>
