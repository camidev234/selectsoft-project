<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/indexRecruiter.css')}}">
    <title>Document</title>
</head>
<body>
    <header class="header">
        @extends('layout.header')
    </header>

    @section('content')
        <main class="container">
            <section class="info">
                <h2>Empresa: {{$company}}</h2>
            </section>
            <section class="content">
                <section class="options">
                    <section class="recruiter_card">
                        <section class="card-body">
                            <article class="option op-1">
                                <h5>Vacantes</h5>
                                <a href="" class="add"><i class="bi bi-plus-square"></i></a>
                                <a href="" class="view"><i class="bi bi-eye"></i></a>
                            </article>
                            <article class="option op-2">
                                <h5>Cargos</h5>
                                <a href="" class="add"><i class="bi bi-plus-square"></i></a>
                                <a href="" class="view"><i class="bi bi-eye"></i></a>
                            </article>
                            <article class="option op-3">
                                <h5>Requisiciones</h5>
                                <a href="" class="add"><i class="bi bi-plus-square"></i></a>
                                <a href="" class="view"><i class="bi bi-eye"></i></a>
                            </article>
                            <article class="option op-4">
                                <h5>Ocupaciones</h5>
                                <a href="{{route('create_occupation')}}" class="add"><i class="bi bi-plus-square"></i></a>
                                <a href="" class="view"><i class="bi bi-eye"></i></a>
                            </article>
                        </section>
                    </section>
                </section>
                <section class="info_view">
                    <article class="titleOne mod">
                        <h2>Procesos de seleccion Activos</h2>
                    </article>
                </section>
            </section>
        </main>
    @endsection
</body>
</html>