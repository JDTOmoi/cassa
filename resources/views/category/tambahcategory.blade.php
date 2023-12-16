@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <form action="{{route('tambahctg')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="category_name" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Nama Kategori">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>

@endsection