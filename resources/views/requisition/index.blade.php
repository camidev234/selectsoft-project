<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/indexEdExp.css')}}">
    <title>Requisiciones</title>
</head>

<body>
    <header class="header">
        @extends('layout.header')
    </header>

    @section('content')
    <section class="title">
        <h1>Requisiciones</h1>
    </section>

    <main class="container">

        <section class="card">
            <a href="{{route('education.create')}}">Añadir nueva requisicion</a>
        </section>

        <section class="content">
            <table>
                <thead>
                    <tr>
                        <th>Cargo</th>
                        <th>Justificacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($requisitions as $requisition)
                    <tr>
                        <td>{{$requisition->charge->charge}}</td>
                        <td>{{$requisition->justification}}</td>
                        <td>
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button><i class="bi bi-trash-fill"></i></button>
                            </form>
                            <form action="x" method="get">
                                <button><i class="bi bi-pencil-fill"></i></button>
                            </form>
                            <form action="">
                                <button><i class="bi bi-eye-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>No hay requisiciones para mostrar</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </main>
    @endsection
</body>

</html>