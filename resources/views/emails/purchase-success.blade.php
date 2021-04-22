<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MairaPass</title>

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {

            height: 100vh;

            display: flex;
            flex-wrap: wrap;

            justify-content: center;
            align-items: center;

            background-color: #EDF2F7;

            font-family: 'Roboto', sans-serif;
        }

        .container {
            width: 50%;
            height: 60%;
            text-align: center;

            background-color: white;

            border-radius: 5px;

            box-shadow: 2px 5px 20px 2px rgba(0, 0, 0, .3);
        }

        .cuerpo {
            height: 200px;
            padding: 20px;

        }

        #boton {
            padding: 10px;
            background-color: coral;
            border-radius: 4px;

            text-decoration: none;
            color: white;
        }

        .despedida {
            text-align: right;
            font-style: italic;
        }

        footer {
            width: 100%;

            padding: 20px;

            background-color: #444;

            color: white;

            display: flex;
            flex-wrap: wrap;

            justify-content: end;
            align-items: center;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="cuerpo">
            <img src="{{asset('imgs/logo.jpg')}}" alt="logo">
            <h3>Compra realizada correctamente</h3>
            <p>Tu cuenta ha sido mejorada a Pro. Ahora podrás disfrutar de todas las ventajas que ofrece este paquete, como contraseñas ilimitadas.</p>
            <a id="boton" href="localhost:8000/home">Ir a la aplicación</a>
        </div>
    </div>
    <footer>
        <p class="despedida">Gracias por confiar en nosotros, Maira Pass</p>
    </footer>
</body>
</html>
