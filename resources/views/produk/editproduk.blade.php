@extends('layouts.app')

@section('content')

<div class="container mt-5">
    {{-- {{$produkedit->image}} --}}
    <form action="{{route('updatepro', $produkedit)}}" method="POST">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" id="image" name="image" placeholder="Image" value="{{$produkedit->image}}">
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$produkedit->name}}">
          </div>
          <div class="mb-3">
            <label for="sku" class="form-label">SKU</label>
            <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU" value="{{$produkedit->sku}}">
          </div>
          {{-- <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" class="form-control" id="brand" name="brand" placeholder="Brand" value="{{$produkedit->brand}}">
          </div> --}}
          <div class="mb-3">
            <label for="brand" class = "form-label"> Brand</label>
            <select name="brand" id="brand" class="form-select" required>
                @foreach($brands as $brand)
                @if(old('brand') == $brand->id)
                <option value="{{$brand->id}}" selected>{{$brand->brand_name}}</option>
                @else
                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                @endif
                @endforeach
            </select>
            </div>

          <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <input type="text" class="form-control" id="tags" name="tags" placeholder="Tags" value="{{$produkedit->tags}}">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="{{$produkedit->description}}">
          </div>

        <button type="submit" class="btn btn-primary mt-3">Edit</button>
    </form>
    </div>

@endsection
