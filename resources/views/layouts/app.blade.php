<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="icon" href="{{asset('img/logo-title.png')}}" type="image/icon type">
    @include('layouts.head')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- config('app.name', 'Laravel') --}}
                    <img style="height: 50px" src="{{asset('img/logo-navbar.png')}}">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest
                    @else
                    <a href="{{asset('home')}}" class="nav-link" style="color:#000">
                        <i class="material-icons">home</i> 
                    </a>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownDataRumah" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="material-icons">menu</i> DATA RUMAH
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdownDataRumah">
                                <a class="dropdown-item" href="{{asset('datarumah')}}">
                                    Data
                                </a>
                                <a class="dropdown-item" href="{{asset('datarumah/create')}}">
                                    Tambah Data
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownDataUser" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="material-icons">people</i> PELANGGAN
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdownDataUser">
                                <a class="dropdown-item" href="{{asset('userwifi')}}">
                                    Data
                                </a>
                                <a class="dropdown-item" href="{{asset('userwifi/create')}}">
                                    Tambah Data
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownDataPaketWifi" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="material-icons">menu</i> PAKET
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdownDataPaketWifi">
                                <a class="dropdown-item" href="{{asset('paketwifi')}}">
                                    Data
                                </a>
                                <a class="dropdown-item" href="{{asset('paketwifi/create')}}">
                                    Tambah Data
                                </a>
                            </div>
                        </li>
                    </ul>
                    @endguest
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                                    <i class="material-icons">person</i> {{ Auth::user()->name }}
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
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    

</body>
</html>
@include('layouts.foot')