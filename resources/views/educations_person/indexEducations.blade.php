<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/indexEdExp.css')}}">
    <title>Mis educaciones</title>
</head>

<body>

    <header class="header">
        @extends('layout.header')
    </header>

    @section('content')
    <section class="title">
        <h1>Mi educacion</h1>
    </section>

    <main class="container">

        <section class="content contentEdu">
            <table>
                <thead>
                    <tr>
                        <th>Institucion</th>
                        <th>TItulo Obtenido</th>
                        <th>Nivel</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($educations as $education)
                    <tr>
                        <td>{{$education->shcool_name}}</td>
                        <td>{{$education->obtained_title}}</td>
                        <td>{{$education->study_level->study_level}}</td>
                        <td>{{$education->study_status->study_status}}</td>
                        <td class="actionstable">
                            <form action="{{route('educations.destroy', ['education_person' => $education->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btnaction oneBtn"><i class="bi bi-trash-fill bt"></i></button>
                            </form>
                            <form action="{{route('educations.edit', ['education_person' => $education->id])}}" method="get">
                                <button class="btnaction twoBtn"><i class="bi bi-pencil-fill bt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>No hay eduaciones para mostrar</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
        <section class="card">
            <a href="{{route('education.create')}}">Añadir nueva educacion</a>
        </section>
    </main>
    @endsection
</body>

</html>