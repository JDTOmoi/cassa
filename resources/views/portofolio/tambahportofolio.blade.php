@extends('layouts.app')

@section('content')


<div class="container-fluid bg-dark-subtle h-20 py-5">
    <div class="row">
        <div class="px-5 fs-2">
            Tambah Portofolio
        </div>
    </div>
</div>

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
<form action="{{route('addport')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="mb-3">
    <label for="port_image" class="form-label">Upload Image</label>
    <img class = "img-preview img-fluid mb-3 col-sm-5">
    <input class="form-control" type="file" id="port_image" name="port_image" accept="image/jpg , image/png, image/jpeg" onchange="previewImage()">
</div>
<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{old('title')}}">
  </div>
  <div class="mb-3 form-group">
    <label for="content" class="form-label">Content</label>
    <textarea type="text" class="form-control" id="content" name="content" placeholder="Content" value="{{old('content')}}" rows="10">
    </textarea>
  </div>


  {{-- <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div> --}}

<button type="submit" class="btn btn-primary mt-3">Tambah</button>
</form>
</div>


<script>
function previewImage(){
    const image = document.querySelector('#port_image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const ofReader = new FileReader();
    ofReader.readAsDataURL(image.files[0]);

    ofReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
    }
}
</script>

@endsection
