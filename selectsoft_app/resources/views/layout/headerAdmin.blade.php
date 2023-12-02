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
                <img src="{{asset('img/SELECTSOFTFooterIcon.png')}}" alt="">
            </section>
            <section class="user-log">
                <img src="{{asset('img/personIcon.jpg')}}" alt="">
                <h5>{{$user->name}} {{$user->last_name}}</h5>
            </section>
            <section class="logout">
                <form action="{{route('user.logout')}}" method="post">
                    @csrf
                    <button>Cerrar sesion</button>
                </form>
            </section>
        </header>

    @yield('content')
    </main>
</body>

</html>
