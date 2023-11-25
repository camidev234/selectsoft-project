<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/indexUser.css')}}">
    <title>Selectsoft</title>
</head>
<body>
    <header class="header">
    @extends('layout.header')
    </header>
    @section('content')
        <main class="principal_content">
            <section class="card-user">
                <section class="card-header">
                    <h3>{{$user->name}} {{$user->last_name}}</h3>
                </section>
                <section class="card-body">
                    <article class="experiencies">
                        <h5>Experiencias: {{$experiences}} </h5>
                        <a href="">Añadir nueva experiencia</a>
                    </article>
                    <article class="educations">
                        <h5>Educacion: </h5>
                        <a href="">Añadir nueva educacion</a>
                    </article>
                    <article class="supports">
                        <h5>Soportes: </h5>
                        <a href="">Añadir nuevo soporte</a>
                    </article>
                </section>
            </section>
    </main>
    @endsection
</body>
</html>
