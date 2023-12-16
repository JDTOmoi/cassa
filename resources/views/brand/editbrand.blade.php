@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <form action="{{route('updatebrd', $brandedit)}}" method="POST">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="brand_name" class="form-label">Nama Merek</label>
            <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Nama Merek" value="{{$brandedit->brand_name}}">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Edit</button>
    </form>
</div>
@endsection