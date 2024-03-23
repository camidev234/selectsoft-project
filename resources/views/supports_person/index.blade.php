<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/indexEdExp.css')}}">
    <title>Mis soportes</title>
</head>

<body>
    <header class="header">
        @extends('layout.header')
    </header>

    @section('content')
    <section class="title">
        <h1>Mis soportes</h1>
    </section>

    <main class="container">

        <section class="card">
            <a href="{{route('supports.create')}}">Añadir nuevo soporte</a>
        </section>

        <section class="content">
            <table>
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Archivo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($supports as $support)
                    <tr>
                        <td>{{$support->support_type->support_type}}</td>
                        @php
                        $fileName = basename($support->support_file);
                        @endphp
                        <td><a href="{{ asset($support->support_file) }}" target="_blank">{{ $fileName }}</a></td>
                        <td class="actionstable">
                            <form action="{{route('supports.destroy', ['candidate_support' => $support->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btnaction oneBtn"><i class="bi bi-trash-fill bt"></i></button>
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
    </main>
    @endsection
</body>

</html>