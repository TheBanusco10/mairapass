<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('APP_NAME', 'Maira Pass') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/functions.js')  }}"></script>
    <script src="https://kit.fontawesome.com/04702df722.js" crossorigin="anonymous"></script>

    @yield('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link rel="icon" type="img/jpg" href="{{asset('imgs/favicon.jpg')}}" sizes="192x192">

    @yield('estilos')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="row w-100">
                    <div class="col-12 col-md-6">

                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ asset('imgs/logo.jpg') }}" alt="logo" style="height: 48px">
                        </a>
                    </div>
                    <div class="col-12 col-md-6 d-flex align-items-center">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">


                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">

                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            @if (Auth::user()->isPro)
                                                <span class="badge bg-success" style="padding: 5px">PRO</span>
                                            @else
                                                <span class="badge bg-secondary" style="padding: 5px; color: white">Básico</span>

                                            @endif
                                            {{ Auth::user()->name }}

                                            <img class="userAvatar rounded-circle" alt="avatar">
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('settings') }}">
                                                {{ __('Configuración') }}
                                            </a>

                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar sesión') }}

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
                </div>



            </div>
        </nav>

        <main>
            @yield('content')
        </main>

    </div>

    @yield('paypal')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
