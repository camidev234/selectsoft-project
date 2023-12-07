<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('styles')
    <link rel="stylesheet" href="{{asset('css/layout.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
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
                    <form action="" method="" id="form">
                    @csrf
                        <input type="search" name="find_vacant" id="" class="input-search" placeholder="Buscar Vacantes">
                        <button id="btn-search"><i class="bi bi-search"></i></button>
                    </form>
                </div>
                <div class="actions">
                    <h5><i class="bi bi-house-fill"></i> <a href="{{route('user.index')}}">{{$user->name}}</a></h5>
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
                    @if($role_id == 2)
                    <h5><i class="bi bi-house-fill"></i> <a href="{{route('selector.index')}}">{{$user->name}}</a></h5>
                    @elseif($role_id == 3)
                    <h5><i class="bi bi-house-fill"></i> <a href="{{route('recruiter.index')}}">{{$user->name}}</a></h5>
                    @endif
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

    <footer class="site-footer">
            <section class="Index">
                <h4><a href="{{route('system.index')}}">Volver Al Inicio</a></h4>
            </section>
            <section class="content-footer">
                <section class="container-footer">
                    <section class="cont one">
                        <h2>Conocenos</h2>
                        <h5><a href="">Sobre Nosotros</a></h5>
                    </section>
                    <section class="cont two">
                        <h2>Soporte</h2>
                        <h5><a href="">Manual De Usuario</a></h5>
                    </section>
                    <section class="cont three">
                        <img src="img/SELECTSOFTFooterIcon.png" alt="log-selectsoft">
                    </section>
                </section>
                <section class="copy">
                    <h3>Todos los derechos reservados &copy; 2023</h3>
                </section>
            </section>
        </footer>

</body>
</html>
