<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/layout.css')}}">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="{{asset('img/SELECTSOFTGenericIcon.png')}}" alt="Logo de selectsoft">
        </div>
        @auth
            @if($role_id == 1)
                <div class="find">
                    <form action="" method="post">
                    @csrf
                        <input type="search" name="find_vacant" id="" class="input" placeholder="Buscar Vacantes">
                    </form>
                </div>
                <div class="actions">
                    <h5>Usuario: {{$user->name}}</h5>
                    <h5>Rol: {{$user->role->name}}</h5>
                    <h5>
                        <form action="{{route('user.logout')}}" method="post">
                            @csrf
                            <button>Cerrar sesion</button>
                        </form>
                    </h5>
                </div>

                @else
                <div class="actions">
                    <h5>Usuario: {{$user->name}}</h5>
                    <h5>Rol: {{$user->role->name}}</h5>
                    <h5>
                        <form action="{{route('user.logout')}}" method="post">
                            @csrf
                            <button>Cerrar sesion</button>
                        </form>
                    </h5>
                </div>
            @endif
        @endauth
    </header>

    @yield('content')

</body>
</html>
