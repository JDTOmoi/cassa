<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cassa Terra</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    Cassa Terra
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <ul class="navbar-nav d-md-none">
                            <li class="nav-item {{$activeProduk ?? ''}}">
                              <a class="nav-link {{$activeProduk ?? ''}}" href="{{route('daftarproduk')}}"> Daftar Produk</a>
                            </li>
                            <li class="nav-item {{$activeCategory ?? ''}}">
                              <a class="nav-link {{$activeCategory ?? ''}}" href="{{route('daftarcategory')}}">Kategori</a>
                            </li>
                            <li class="nav-item {{$activeBrand ?? ''}}">
                              <a class="nav-link {{$activeBrand ?? ''}}" href="{{route('daftarbrand')}}">Brand</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Portofolio</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link {{$activeNews ?? ''}}" href="{{route('berita')}}">Berita</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link {{$activeContact ?? ''}}" href="{{route('contact')}}">Contact</a>
                            </li>
                    </ul>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @auth


        <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item {{$activeProduk ?? ''}}">
                  <a class="nav-link {{$activeProduk ?? ''}}" href="{{route('daftarproduk')}}"> Daftar Produk</a>
                </li>
                <li class="nav-item {{$activeCategory ?? ''}}">
                  <a class="nav-link {{$activeCategory ?? ''}}" href="{{route('daftarcategory')}}">Kategori</a>
                </li>
                <li class="nav-item {{$activeBrand ?? ''}}">
                  <a class="nav-link {{$activeBrand ?? ''}}" href="{{route('daftarbrand')}}">Brand</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Portofolio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{$activeNews ?? ''}}" href="{{route('berita')}}">Berita</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contact</a>
                </li>
              </ul>
            </div>
          </nav>

          @endauth

        <main class="py-4">
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>
</body>
</html>
