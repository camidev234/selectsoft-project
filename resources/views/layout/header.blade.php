<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('styles')
    <link rel="stylesheet" href="{{asset('css/layout.css')}}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="{{asset('js/scrollShadow.js')}}"></script>
    <title>Document</title>
</head>

<body>
    <header class="header">
        @auth
        @if($role_id == 1)
        <div class="logo">
            <a href="{{route('system.index')}}"><img src="{{asset('img/SELECTSOFT.svg')}}" alt="Logo de selectsoft"></a>
        </div>
        <div class="find">
            <form action="{{route('vacancies.searchToCandidate')}}" method="get" id="form">
                @csrf
                <input type="search" name="search" id="" class="input-search" placeholder="Buscar Vacantes">
                <button id="btn-search"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <div class="actions">
            <div class="usernameHeader">
                <article class="imgus">
                    <h5>
                        @if($user->candidate->photo_file == null)
                        <i class="bi bi-house-fill"></i>
                        @else
                        <img src="{{asset('storage/' . $user->candidate->photo_file)}}" alt="" class="photoIcon">
                        @endif
                    </h5>
                </article>
                <article class="nameus">
                    <h5><a href="{{route('user.index')}}">{{ucwords(strtolower($user->name))}}</a></h5>
                </article>
            </div>
            <h5 class="rolename">Rol: {{$user->role->name}}</h5>
            <h5>
                <form action="{{route('user.logout')}}" method="post">
                    @csrf
                    <button>Cerrar sesion</button>
                </form>
            </h5>
        </div>


        @else
        <div class="logoSelect">
            <a href="{{route('system.index')}}"><img src="{{asset('img/SELECTSOFT.svg')}}" alt="Logo de selectsoft"></a>
        </div>
        <div class="actions">
            @if($role_id == 2)
            <h5><i class="bi bi-house-fill"></i> <a href="{{route('selector.index')}}">{{ucwords(strtolower($user->name))}}</a></h5>
            @elseif($role_id == 3)
            <h5><i class="bi bi-house-fill"></i> <a href="{{route('recruiter.index')}}">{{ucwords(strtolower($user->name))}}</a></h5>
            @endif
            <h5 class="rolename">Rol: {{$user->role->name}}</h5>
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
                    <img src="{{asset('img/SELECTSOFTFOOTER.svg')}}" alt="log-selectsoft">
                </section>
            </section>
            <section class="copy">
                <h3>Todos los derechos reservados &copy; 2024</h3>
            </section>
        </section>
    </footer>

</body>

</html>