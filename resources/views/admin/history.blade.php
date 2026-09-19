@extends('admin.layout')
@section('title', 'Stock history')
@section('content')
<div class="heading"><div><div class="kicker">INVENTORY AUDIT TRAIL</div><h1>Stock history</h1><p>Opening stock, manual adjustments and checkout changes recorded after this update.</p></div></div><div class="panel">@include('admin.movements')<div class="pagination">@if($movements->previousPageUrl())<a href="{{ $movements->previousPageUrl() }}">← Previous</a>@endif<span>Page {{ $movements->currentPage() }} of {{ $movements->lastPage() }}</span>@if($movements->nextPageUrl())<a href="{{ $movements->nextPageUrl() }}">Next →</a>@endif</div></div>
@endsection
