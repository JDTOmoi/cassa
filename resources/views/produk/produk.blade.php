@extends('layouts.app')

@section('content')
<div class="ms-3">
<form method="GET" action="{{route('tambahproduk')}}">
    <button class="btn btn-primary" href="{{route('tambahproduk')}}">
        Tambah Produk
    </button>
</form>
</div>

<table class="table mx-3">
    <thead>
      <tr>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">SKU</th>
        <th scope="col">Brand</th>
        <th scope="col">Tags</th>
        <th scope="col">Description</th>
      </tr>
    </thead>
    <tbody>

    @php($counter = 0)
    @foreach($produk as $p)
    @php($counter++)
    <tr>
        <th scope="row">{{$p->image}}</th>
        <td>{{$p->name}}</td>
        <td>{{$p->sku}}</td>
        <td>{{$p->brand}}</td>
        <td>{{$p->tags}}</td>
        <td>{{$p->description}}</td>
    </tr>
    @endforeach


    </tbody>
</table>

@endsection
