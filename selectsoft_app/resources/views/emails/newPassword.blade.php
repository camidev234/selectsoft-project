<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: sans-serif;
        }

        .redirect a {
            text-decoration: none;
            background-color: #2193b0;
            padding: 12px 20px;
            color: white;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <p>Estimado {{$name}}  hemos recuperado tu contraseña, intenta ingresar nuevamente con tu respectivo email y contraseña</p>
    <br>

    <br>

    <p>Nueva Contraseña: <h4>{{$password}}</h4></p><br>

    <div class="redirect">
        <a href="{{route('user.login')}}">Iniciar sesion</a>
    </div>

    <br>

    <p>Le recordamos que esta dirección de e-mail es utilizada solamente para los envíos de la información solicitada. Por favor no responda con consultas personales ya que no podrán ser respondidas.</p>

    <p>Si no pudo ir al inicio de sesion mediante el boton puede hacerlo mediante este link: <a href="http://127.0.0.1:8000/selectsoft/login">Iniciar Sesion</a></p>
</body>
</html>
