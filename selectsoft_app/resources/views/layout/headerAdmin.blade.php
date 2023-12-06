<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/layoutAdmin.css')}}">
    <title>Document</title>
</head>

<body>
    <main class="page">
        <header class="header">
            <section class="logo">
                <img src="{{asset('img/selectsoftAdmin.png')}}" alt="">
            </section>
            <div class="containerOptions">
                <section class="user-log">
                    <i class="bi bi-person-fill"></i>
                    <h5>{{$user->name}} {{$user->last_name}}</h5>
                </section>
                <section class="logout">
                    <form action="{{route('user.logout')}}" method="post">
                        @csrf
                        <button>Cerrar sesion</button>
                    </form>
                </section>
            </div>
        </header>

        @yield('content')
    </main>
</body>

</html>
