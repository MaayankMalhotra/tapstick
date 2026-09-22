@extends('vendor.layout')
@section('title', 'Vendor login')
@section('content')
<form class="panel" method="POST" action="{{ route('vendor.login.submit') }}" style="max-width:420px;margin:60px auto;">@csrf<h1>Vendor Login</h1><label>Email<input name="email" type="email" required value="{{ old('email') }}"></label><label>Password<input name="password" type="password" required></label><label class="check"><input type="checkbox" name="remember" value="1">Remember me</label><button class="button full">Sign in</button></form>
@endsection
