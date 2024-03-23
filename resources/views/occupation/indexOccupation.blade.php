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
        <section class="titlePage">
            <article class="title">
                <h2>Listado De Ocupaciones</h2>
            </article>
            <article class="btns">
                <article class="descBtns oneBtnTitle">
                    <div>
                        <i class="bi bi-trash-fill bt"></i>
                    </div>
                    <span>Eliminar</span>
                </article>
                <article class="descBtns thBt">
                    <div>
                        <i class="bi bi-eye-fill bt"></i>
                    </div>
                    <span>Detalles</span>
                </article>
                <article class="descBtns twBt">
                    <div>
                        <i class="bi bi-pencil-fill bt"></i>
                    </div>
                    <span>Actualizar</span>
                </article>

            </article>
        </section>
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
                            <button class="btnaction oneBtn"><i class="bi bi-trash-fill bt"></i></button>
                        </form>
                        <form action="{{route('occupation.show', ['occupation' => $occupation->id])}}" method="get">
                            <button class="btnaction threeBtn"><i class="bi bi-eye-fill bt"></i></button>
                        </form>
                        <form action="{{route('occupations.edit',['occupation'=>$occupation->id])}}" method="get">
                            <button class="btnaction twoBtn"><i class="bi bi-pencil-fill bt"></i></button>
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