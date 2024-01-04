@extends('layouts.app')

@section('content')


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container">
    <div class="row justify-content-center mx-3 my-3">
        <div class="col-md-8">
            <h2>Cassa Terra</h2>
            <h4>Festo Authorized Distributor</h4>
            <p>For Industrial Pneumatic Automation</p>
        </div>
        <div class="col-md-2">
            <img class="img-fluid" src="{{asset('storage/images/153053-Push-in-L-fitting-QSL-3-8-12-2.png')}}" alt="Mesin">
        </div>
        <div class="col-md-2">
            <img class="img-fluid" src="{{asset('storage/images/vuvg.fw-1.png')}}" alt="Mesin">
        </div>

    </div>
</div>
<div class="container-fluid px-5" style="background-color:rgb(227, 227, 227)">
    <div class="row justify-content-center">
        <h2 class="my-4">Lihat per Kategori</h2>
    </div>

    <div class="row justify-content-center">
    @foreach ($produk as $p)



    <div class="card mx-3 my-3 hover-shadow" style="width: 18rem;">
        <div class="bg-image hover-zoom">
        <img class="card-img-top" src="{{asset('storage/'.$p->image)}}" alt="Card image cap">
        </div>
        <div class="card-body">
          <p class="card-text hover-blue">{{$p->name}}</p>
        </div>
      </div>
      @endforeach

    </div>

</div>
<div class="container-fluid px-5">
    <h2 class="mx-auto my-4">Merek-merek yang disediakan</h2>

    <div class="row justify-content-center">
        <img src="https://drive.google.com/uc?export=view&id=1NKpezmUCzCnRvM7ITvDajD2o26GLo1gS" style="width: 256px;"></img>
        <img src="https://drive.google.com/uc?export=view&id=1x2V8pYST3l7RezoOGYMnmsopxmmJfK8R" style="width: 256px;"></img>
    <div>
</div>
@endsection
