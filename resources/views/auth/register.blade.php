<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <title>Registrarse a selectsoft</title>
</head>

<body>
    <header class="header">
        <!-- Logo de selectsoft -->
        <article class="img-header">
            <a href="{{route('system.index')}}"><img src="{{asset('img/SELECTSOFT.svg')}}" alt="log-selectsoft"></a>
        </article>
        <!-- Barra de busqueda -->
        <nav class="bar-nav" id="bar">
            <ul class="ul-list">
                <li><a href="{{route('system.index')}}">Inicio</a></li>
                <li><a href="#">Manual de usuario</a></li>
                <li><a href="{{route('users.create')}}">Registrarse</a></li>
                <li class="last"><a href="{{route('user.login')}}">Ingresar</a></li>
            </ul>
        </nav>
    </header>
    @livewire('register-form')
    @livewireScripts
</body>

</html>