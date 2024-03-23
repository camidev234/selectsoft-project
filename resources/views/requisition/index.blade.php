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
            <a href="{{route('requisition.create', ['company' => $company->id])}}">Añadir nueva requisicion</a>
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
                        <td class="actionstable">
                            <form action="{{route('requisition.destroy', ['requisition' => $requisition->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btnaction oneBtn"><i class="bi bi-trash-fill bt"></i></button>
                            </form>
                            <form action="x" method="get">
                                <button class="btnaction twoBtn"><i class="bi bi-pencil-fill bt"></i></button>
                            </form>
                            <form action="{{route('requisition.show', ['requisition' => $requisition->id])}}">
                                <button class="btnaction threeBtn"><i class="bi bi-eye-fill bt"></i></button>
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