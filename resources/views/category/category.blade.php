@extends('layouts.app')

@section('content')
<div class="ms-3">
<form method="GET" action="{{route('tambahcategory')}}">
    <button class="btn btn-primary" href="{{route('tambahcategory')}}">
        Tambah Kategori
    </button>
</form>
</div>

<table class="table mx-3">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Kategori</th>
        <th scope="col" colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

    @php($counter = 0)
    @foreach($category as $c)
    @php($counter++)
    <tr>
        <td>{{$counter}}</td>
        <td>{{$c->category_name}}</td>

        <td><a href="{{route('editcategory',$c)}}"> <button class = 'btn btn-info' id="edit" name='edit'>Edit Kategori</button> </a> </td>

        <td>
            <form action="{{ route('hapuscategory', $c)}}" method="POST">
                @method('delete')
                @csrf
                <button class = 'btn btn-danger' id="delete" name='delete'>Delete</button>
            </form>
        </td>

    </tr>
    @endforeach


    </tbody>
</table>

@endsection