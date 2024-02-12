<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/indexEdExp.css')}}">
    <title>Document</title>
</head>
<body>
    <header class="header">
        @extends('layout.header')
    </header>

    @section('content')
    <section class="title">
        <h1>Mis experiencias</h1>
    </section>

    <main class="container">

        <section class="card">
            <a href="{{route('exp.create')}}">Añadir nueva Experiencia</a>
        </section>

        <section class="content">
            <table>
                <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Meses de experiencia</th>
                        <th>Funciones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($experiencies as $experiencie)
                        <tr>
                            <td>{{$experiencie->company_experience}}</td>
                            <td>{{$experiencie->months_experience}}</td>
                            <td>{{$experiencie->functions}}</td>
                            <td>
                                <form action="{{route('exp.destroy', ['person_experience' => $experiencie->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <button><i class="bi bi-trash-fill"></i></button>
                                </form>
                                <form action="{{route('exp.edit', ['person_experience' => $experiencie->id])}}" method="get">
                                    <button><i class="bi bi-pencil-fill"></i></button>
                                </form>
                        </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No hay experiencias para el usuario</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </main>
    @endsection


</body>
</html>
