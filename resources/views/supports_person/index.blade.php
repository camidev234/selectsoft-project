<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis soportes</title>
</head>

<body>
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
                            <td><a href="{{ asset($support->support_file) }}" download>{{ $fileName }}</a></td>
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

</body>

</html>