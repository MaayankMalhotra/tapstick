@extends('admin.layout')
@section('title', 'Sign in')
@section('content')
<section class="panel login"><div class="kicker">TAB STICK BACK OFFICE</div><h1>Welcome back.</h1><p>Sign in to manage your products and inventory.</p><form action="{{ route('admin.login.submit') }}" method="POST">@csrf
<label>Email<input type="email" name="email" required value="{{ old('email') }}" autocomplete="username" autofocus></label>
<label>Password<input type="password" name="password" required autocomplete="current-password"></label>
<button class="button full">Sign in</button></form></section>
@endsection
