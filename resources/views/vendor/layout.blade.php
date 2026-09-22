<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>@yield('title', 'Vendor') · TAPSTICK</title><link rel="stylesheet" href="{{ asset('css/admin.css') }}"></head>
<body><header class="topbar"><a class="brand" href="{{ route('vendor.dashboard') }}">TAP<span>STICK</span> <small>VENDOR</small></a><div class="top-actions">@auth<form method="POST" action="{{ route('vendor.logout') }}">@csrf<button class="ghost">Sign out</button></form>@endauth</div></header><div class="workspace"><main class="content" style="max-width:1100px;margin:auto;">@if(session('success'))<div class="notice good">{{ session('success') }}</div>@endif @if(isset($errors) && $errors->any())<div class="notice bad"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif @yield('content')</main></div></body>
</html>
