<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selectsoft</title>
</head>
<body>
    <header class="header">
    @extends('layout.header')
    </header>
    @section('content')
        <div class="principal_content">
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
                        <a href="">Añadir nueva educacio</a>
                    </article>
                    <arcicle class="supports">
                        <h5>Soportes: </h5>
                        <a href="">Añadir nuevo soporte</a>
                    </arcicle>
                </section>
            </section>
        </div>
    @endsection
</body>
</html>
