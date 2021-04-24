<!doctype html>
<html lang="es">
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
    <script
        src="https://www.paypal.com/sdk/js?client-id=AVfdp_rx6nhe0KGuf5_AKs-qXGlKmZdyzxYeTILLkUOt35nVHG0YVeT7sgeO8po7BFULKUkXnVS6JMld&currency=EUR"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
    </script>
    <script src="{{asset('js/paypalButtons.js')}}"></script>

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link rel="icon" type="img/jpg" href="{{asset('imgs/favicon.jpg')}}" sizes="192x192">

    <style>
        #paypal div {
            width: 20%;
        }
    </style>

</head>
<body>

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('imgs/logo.jpg') }}" alt="logo" style="height: 48px">
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
                                @endif
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('settings', Auth::user()->id) }}">
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
    </nav>

    <main class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="mt-3 col-12 text-center" id="homeContainer">
                    <h3>¡Ya estás cerca!</h3>
                    <p>Para terminar de actualizar tu cuenta, utiliza una de las siguientes opciones de pago. Una vez realizado el pago, serás redirigido a una página de agradecimiento y se le enviará un correo electrónico a la dirección de email que puede ver en la Configuración.</p>
                    <div class="d-flex justify-content-center" id="paypal"></div>
                </div>
            </div>
        </div>
    </main>
    <form id="actualizar" action="{{route('updatePro', \Illuminate\Support\Facades\Auth::user())}}" method="POST">
        @csrf
        @method('PUT')
    </form>
</body>
</html>
