<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <title>Ocupaciones</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <div class="container">
        <table class="table_container">
            <thead class="table_head">
                <tr>
                    <th>Codigo</th>
                    <th>Ocupacion</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table_body">
                @forelse($allOccupations as $occupation)
                <tr>
                    <td>{{ $occupation->occupation_code }}</td>
                    <td>{{ $occupation->occupation_name }}</td>
                    <td>{{ $occupation->description }}</td>
                    <td class="actions-l">
                        <form action="{{route('occupations.destroy',['id'=>$occupation->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="deleteBtn">Eliminar</button>
                        </form>
                        <form action="{{route('occupation.show', ['occupation' => $occupation->id])}}" method="get">
                            <button class="detailsBtn">Detalles</button>
                        </form>
                        <form action="{{route('occupations.edit',['occupation'=>$occupation->id])}}" method="get">
                            <button class="updateBtn">Actualizar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>No hay ocupaciones en el sistema</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="create">
        <a href="{{ route('occupations.create') }}">Crear ocupacion</a>
    </div>
    @endsection
</body>

</html>
