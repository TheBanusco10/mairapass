<!DOCTYPE HTML>
<!--
	Ion by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
    <title>Maira Pass - Inicio</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="css/skel.css+style.css+style-xlarge.css" />
    <link rel="icon" type="img/jpg" href="imgs/favicon.jpg" sizes="192x192">
    <link rel="stylesheet" href="{{asset('css/prices.css')}}">

    <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
</head>
<body id="top">

<!-- Header -->
<header id="header" class="skel-layers-fixed">
    <img src="imgs/logo.jpg" alt="logo" style="height: 48px">
    <nav id="nav">
        <ul>
            @auth
                <li>{{ Auth::user()->name }}</li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Cerrar sesión</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @else
                <li><a href="{{ route('login') }}" class="button special">INICIAR SESIÓN</a></li>
            @endauth
        </ul>
    </nav>
</header>

<!-- Banner -->
<section id="banner">
    <div class="inner">
        <h2>Maira Pass</h2>
        <p>Recuerda una clave, guarda miles.</p>
        <ul class="actions">
            @auth
                <li><a href="{{ route('home') }}" class="button big special">Mis contraseñas</a></li>
            @endauth
            <li><a href="#nosotros" class="button big alt">Leer más</a></li>
        </ul>
    </div>
</section>

<!-- One -->
<section id="one" class="wrapper style1">
    <header class="major">
        <h2>No solo guardamos tu contraseña</h2>
        <p>Descubre otras de nuestras características</p>
    </header>
    <div class="container">
        <div class="row">
            <div class="4u">
                <section class="special box">
                    <i class="icon fa-area-chart major"></i>
                    <h3>Contraseñas cifradas</h3>
                    <p>Todas tus contraseñas serán cifradas con los últimos algoritmos para que solo tú puedas usarlas.</p>
                </section>
            </div>
            <div class="4u">
                <section class="special box">
                    <i class="icon fa-refresh major"></i>
                    <h3>Generador de contraseña</h3>
                    <p>Genera una contraseña aleatoria totalmente segura y personalizable. Tú eliges la longitud y nosotros nos encargamos de generarte una contraseña segura.</p>
                </section>
            </div>
            <div class="4u">
                <section class="special box">
                    <i class="icon fa-cog major"></i>
                    <h3>Información cifrada</h3>
                    <p>Toda la información guardada en la base de datos es cifrada.</p>
                </section>
            </div>
        </div>
    </div>
</section>

<!-- Two -->
<section id="nosotros" class="wrapper style2">
    <header class="major">
        <h2>Nosotros</h2>
    </header>
    <div class="container">
        <div class="row">
            <div class="nosotrosParrafo">
                <section class="special">
                    <p>Guardar tus contraseñas nunca ha sido más fácil. Recuerda tu clave maestra para acceder a la cuenta y poder acceder a todas las demás.
                         También disponemos de una opción para generar una contraseña aleatoria totalmente segura, combinando caracteres especiales, dígitos y letras, tanto en mayúscula como en minúscula.</p>
                </section>
            </div>
        </div>
    </div>
</section>


<div id="generic_price_table">
    <section>
        <div class="container">

            <!--BLOCK ROW START-->
            <div class="row precios">
                <div class="col-md-6">

                    <!--PRICE CONTENT START-->
                    <div class="generic_content clearfix">

                        <!--HEAD PRICE DETAIL START-->
                        <div class="generic_head_price clearfix">

                            <!--HEAD CONTENT START-->
                            <div class="generic_head_content clearfix">

                                <!--HEAD START-->
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span>Básico</span>
                                </div>
                                <!--//HEAD END-->

                            </div>
                            <!--//HEAD CONTENT END-->

                            <!--PRICE START-->
                            <div class="generic_price_tag clearfix">
                                <span class="price">
                                    <span class="sign"></span>
                                    <span class="currency">Gratis</span>
                                    <span class="cent"></span>
                                    <span class="month"></span>
                                </span>
                            </div>
                            <!--//PRICE END-->

                        </div>
                        <!--//HEAD PRICE DETAIL END-->

                        <!--FEATURE LIST START-->
                        <div class="generic_feature_list">
                            <ul>
                                <li><span>10</span> contraseñas</li>
                                <li><span>Personalizar</span> imagen de fondo</li>
                            </ul>
                        </div>
                        <!--//FEATURE LIST END-->

                        <!--BUTTON START-->
                        <div class="generic_price_btn clearfix">
                            <a href="#">Unirse</a>
                        </div>
                        <!--//BUTTON END-->

                    </div>
                    <!--//PRICE CONTENT END-->

                </div>

                <div class="col-md-6">

                    <!--PRICE CONTENT START-->
                    <div class="generic_content active clearfix">

                        <!--HEAD PRICE DETAIL START-->
                        <div class="generic_head_price clearfix">

                            <!--HEAD CONTENT START-->
                            <div class="generic_head_content clearfix">

                                <!--HEAD START-->
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span>Pro</span>
                                </div>
                                <!--//HEAD END-->

                            </div>
                            <!--//HEAD CONTENT END-->

                            <!--PRICE START-->
                            <div class="generic_price_tag clearfix">
                                <span class="price">
                                    <span class="sign">€</span>
                                    <span class="currency">10</span>
                                    <span class="cent"></span>
                                    <span class="month">/pago único</span>
                                </span>
                            </div>
                            <!--//PRICE END-->

                        </div>
                        <!--//HEAD PRICE DETAIL END-->

                        <!--FEATURE LIST START-->
                        <div class="generic_feature_list">
                            <ul>
                                <li><span>Ilimitadas</span> contraseñas</li>
                                <li><span>Personalizar</span> imagen de fondo</li>
                                <li><span>Ilimitadas</span> tarjetas de crédito</li>
                                <li>Inicia sesión en <span>ilimitados</span> dispositivos</li>
                                <li><span>Muestra</span> la seguridad de tu contraseña</li>
                            </ul>
                        </div>
                        <!--//FEATURE LIST END-->

                        <!--BUTTON START-->
                        <div class="generic_price_btn clearfix">
                            <a href="#">Unirse</a>
                        </div>
                        <!--//BUTTON END-->

                    </div>
                    <!--//PRICE CONTENT END-->

                </div>
            </div>
            <!--//BLOCK ROW END-->

        </div>
    </section>
</div>

<!-- Footer -->
<footer id="footer">
    <div class="container">
        <div class="row double" style="display: flex; flex-wrap: wrap; justify-content: center;">
            <div class="6u">
                <img src="{{ asset('imgs/logo2.png')  }}" alt="logo" style="width: 100%">
                <p style="text-align: center">MairaPass</p>
                <ul class="icons">
                    <li><a href="https://github.com/TheBanusco10/proyecto-grado" target="_blank" class="icon fa-github"><span class="label">Github</span></a></li>
                </ul>
            </div>
        </div>
        <ul class="copyright">
            <li>&copy; David Jiménez Villarejo. Todos los derechos reservados</li>
        </ul>
    </div>
</footer>

</body>
</html>
