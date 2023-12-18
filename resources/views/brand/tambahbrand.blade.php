@extends('layouts.app')

@section('content')

@if($errors->any())
    <div class="alert alert-danger mx-3">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-5">
    <form action="{{route('tambahbrd')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="brand_name" class="form-label">Nama Merek</label>
            <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Nama Merek" value="{{old('brand_name')}}">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>

@endsection
