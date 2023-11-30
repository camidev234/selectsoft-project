<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/indexUser.css')}}">
    <title>Selectsoft-Home</title>
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
                        <section class="actions-card">
                            <div class="action">
                                <a href="{{route('exp.create')}}">Añadir nueva experiencia</a>
                            </div>
                            <form action="{{route('exp.index')}}" method="get">
                                <button>Ver</button>
                            </form>
                        </section>
                    </article>
                    <article class="educations">
                        <h5>Educacion: {{$educations}}</h5>
                        <section class="actions-card">
                            <div class="action">
                                <a href="{{route('education.create')}}">Añadir nueva educacion</a>
                            </div>
                            <form action="{{route('educations.index')}}" method="get">
                                <button>Ver</button>
                            </form>
                        </section>
                    </article>
                    <article class="supports">
                        <h5>Soportes: </h5>
                        <section class="actions-card">
                            <div class="action">
                                <a href="{{route('education.create')}}">Añadir nuevo soporte</a>
                            </div>
                            <form action="" method="get">
                                <button>Ver</button>
                            </form>
                        </section>
                    </article>
                    <article class="hdv">
                        <form action="" method="get">
                            <button>Ver HDV completa</button>
                        </form>
                    </article>
                </section>
            </section>
    </main>

    @endsection


</body>
</html>
