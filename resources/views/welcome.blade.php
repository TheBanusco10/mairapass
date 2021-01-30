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

    <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
</head>
<body id="top">

<!-- Header -->
<header id="header" class="skel-layers-fixed">
    <h1>Maira Pass</h1>
    <nav id="nav">
        <ul>
            @auth
                <li>{{ Auth::user()->name }}</li>
            @else
                <li><a href="{{ route('login') }}" class="button special">INICIAR SESIÓN</a></li>
                <li><a href="{{ route('register') }}" class="button special">REGISTRARSE</a></li>
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
            @else
                <li><a href="{{ route('register') }}" class="button big special">Registrarse</a></li>
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
                    <p>Genera una contraseña aleatoria totalmente segura y personalizable. Tú eliges la longitud, caracteres y muchas más cosas.</p>
                </section>
            </div>
            <div class="4u">
                <section class="special box">
                    <i class="icon fa-cog major"></i>
                    <h3>Amet sed accumsan</h3>
                    <p>Eu non col commodo accumsan ante mi. Commodo consectetur sed mi adipiscing accumsan ac nunc tincidunt lobortis.</p>
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
                    <p>Guardar tus contraseñas nunca ha sido más fácil. Recuerda tu clave maestra para acceder a la cuenta y poder acceder a todas las demás. También disponemos de una opción para generar una contraseña aleatoria totalmente segura, combinando caracteres especiales, dígitos y letras, tanto en mayúscula como en minúscula</p>
                </section>
            </div>
        </div>
    </div>
</section>


<!-- Footer -->
<footer id="footer">
    <div class="container">
        <div class="row double">
            <div class="6u">
                <div class="row collapse-at-2">
                    <div class="6u">
                        <h3>Accumsan</h3>
                        <ul class="alt">
                            <li><a href="#">Nascetur nunc varius</a></li>
                            <li><a href="#">Vis faucibus sed tempor</a></li>
                            <li><a href="#">Massa amet lobortis vel</a></li>
                            <li><a href="#">Nascetur nunc varius</a></li>
                        </ul>
                    </div>
                    <div class="6u">
                        <h3>Faucibus</h3>
                        <ul class="alt">
                            <li><a href="#">Nascetur nunc varius</a></li>
                            <li><a href="#">Vis faucibus sed tempor</a></li>
                            <li><a href="#">Massa amet lobortis vel</a></li>
                            <li><a href="#">Nascetur nunc varius</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="6u">
                <h2>Aliquam Interdum</h2>
                <p>Blandit nunc tempor lobortis nunc non. Mi accumsan. Justo aliquet massa adipiscing cubilia eu accumsan id. Arcu accumsan faucibus vis ultricies adipiscing ornare ut. Mi accumsan justo aliquet.</p>
                <ul class="icons">
                    <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
                    <li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
                </ul>
            </div>
        </div>
        <ul class="copyright">
            <li>&copy; Untitled. All rights reserved.</li>
            <li>Design: <a href="http://templated.co">TEMPLATED</a></li>
            <li>Images: <a href="http://unsplash.com">Unsplash</a></li>
        </ul>
    </div>
</footer>

</body>
</html>
