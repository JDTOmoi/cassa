@extends('layouts.app')

@section('content')

<div class="container-fluid bg-dark-subtle h-20 py-5">
    <div class="px-5 fs-2">
        Detail Produk
    </div>
    <div class="px-5 fs-5">
        {{$produk->name}}
    </div>
</div>

@endsection
