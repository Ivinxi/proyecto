<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Bloom Store') }}</title>
    <link rel="icon" href="{!! asset('images/icon.png') !!}"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,600&family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white navbar-registro">
            <div class="container">
                <a href="{{ url('/') }}">
                    <img class="logo" alt="Bloom Store" src="/images/logo.png"></a>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle capitalize" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Mi cuenta <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   @if( Auth::user()->rol == 'admin' || Auth::user()->rol == 'vendedor')
                                    <a class="dropdown-item" href="{{ route('admin/home') }}">
                                       Administrar
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('perfil') }}">
                                       Perfil
                                    </a>
                                    <a class="dropdown-item" href="{{ route('facturas') }}">
                                       Pedidos
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

       
        @yield('menu_categoria')
        

        <main class="py-4">
            @yield('content')
        </main>

        @if(!(request()->is('login') || request()->is('register') || request()->is('password/*') || request()->is('procesarCompra')) )
            <footer>
                <div class="{{(request()->is('target/*') && ! request()->is('target/*/producto/*') || request()->is('buscar')) ? 'container-fluid':'container'}} pie">
                    <div class="row">
                        <div class="col-md-12 linea-footer">
                            
                            <p class=" p-5 d-inline-block">Iván Herrera Rodriguez <i class="far fa-copyright"></i></p>
                            <div class="float-right p-5">
                                <a href="https://www.twitter.com"><i class="fab fa-twitter-square fa-3x twitter"></i></a>
                                <a href="https://www.instagram.com"><i class="fab fa-instagram-square fa-3x instagram"></i></a>
                                <a href="https://www.facebook.com"><i class="fab fa-facebook-square fa-3x facebook"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        @endif
    </div>
</body>
</html>
