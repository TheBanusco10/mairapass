

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MairaPass</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>

        body {

            background-color: #EDF2F7;
        }

        img {
            width: auto;
        }

        .container {
            position: relative;

            width: 50%;
            height: 60%;

            transform: translateY(50%);

            padding: 20px;

            background-color: white;

            border-radius: 5px;

            box-shadow: 2px 5px 20px 2px rgba(0, 0, 0, .3);
        }

        @media (max-width: 768px) {
            .container {
                width: 100%;
            }

            img {
                width: 100%;
            }
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <img src="{{asset('imgs/logo.jpg')}}" alt="logo">
                <h2>Compra realizada con éxito</h2>
                <p>
                    Su cuenta ha sido mejorada a <strong>Pro</strong>, ahora podrá disfrutar de todas
                    las ventajas como contraseñas ilimitadas.
                </p>
                <a href="{{URL::to('/home')}}" class="btn btn-success">Ir a la aplicación</a>
            </div>
        </div>
    </div>

</body>
</html>
