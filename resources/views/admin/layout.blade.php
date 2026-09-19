<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>@yield('title', 'Inventory') · Tab Stick Admin</title><link rel="stylesheet" href="{{ asset('css/admin.css') }}"></head>
<body><header class="topbar"><a class="brand" href="{{ route('admin.dashboard') }}">tab <span>stick</span> <small>ADMIN</small></a><div class="top-actions"><a href="{{ route('home') }}">View store ↗</a>@if(auth()->user()?->is_admin)<form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="ghost">Sign out</button></form>@endif</div></header>
<div class="workspace">
@if(auth()->user()?->is_admin)<nav class="sidebar" aria-label="Admin navigation">
<p>STORE MANAGEMENT</p>
<a class="{{ request()->routeIs('admin.dashboard') ? 'selected' : '' }}" href="{{ route('admin.dashboard') }}">Overview</a>
<a class="{{ request()->routeIs('admin.products.*') ? 'selected' : '' }}" href="{{ route('admin.products.index') }}">Products & stock</a>
<a class="{{ request()->routeIs('admin.categories.*') ? 'selected' : '' }}" href="{{ route('admin.categories.index') }}">Categories</a>
<a class="{{ request()->routeIs('admin.history') ? 'selected' : '' }}" href="{{ route('admin.history') }}">Stock history</a>
<div class="identity">Signed in as<br><strong>{{ auth()->user()->name }}</strong></div></nav>@endif
<main class="content">
@if(session('success'))<div class="notice good" role="status">{{ session('success') }}</div>@endif
@if($errors->any())<div class="notice bad" role="alert"><strong>Please check:</strong><ul>@foreach($errors->all() as $message)<li>{{ $message }}</li>@endforeach</ul></div>@endif
@yield('content')
</main></div></body></html>
