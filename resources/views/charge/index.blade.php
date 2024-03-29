<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <title>Cargos</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <div class="container">
        <section class="titlePage">
            <article class="title">
                <h2>Listado De Cargos</h2>
            </article>
            <article class="btns">
                <article class="descBtns oneBtnTitle">
                    <div>
                        <i class="bi bi-trash-fill bt"></i>
                    </div>
                    <span>Eliminar</span>
                </article>
                <article class="descBtns twBt">
                    <div>
                        <i class="bi bi-pencil-fill bt"></i>
                    </div>
                    <span>Actualizar</span>
                </article>
                <article class="descBtns oneBt">
                    <div>
                        <i class="bi bi-plus-square bt"></i>
                    </div>
                    <span>Añadir Funcion</span>
                </article>
            </article>
        </section>
        <table class="table_container">
            <thead class="table_head">
                <tr>
                    <th>Cargo</th>
                    <th>Ocupacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table_body">
                @forelse($charges as $charge)
                <tr>
                    <td>{{ $charge->charge }}</td>
                    <td>{{ $charge->occupation->occupation_name }}</td>
                    <td class="actions-l">
                        <form action="{{route('charges.destroy',['charge'=>$charge->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btnaction oneBtn"><i class="bi bi-trash-fill bt"></i></button>
                        </form>
                        <form action="{{route('charges.edit',['charge'=>$charge->id, 'company' => $company->id])}}" method="get">
                            <button class="btnaction twoBtn"><i class="bi bi-pencil-fill bt"></i></button>
                        </form>
                        <form action="{{route('charge.show', ['charge' => $charge->id])}}" method="get">
                            <button class="btnaction threeBtn"><i class="bi bi-eye-fill bt"></i></button>
                        </form>
                        <form action="{{route('chargeFunction.create',['charge' => $charge->id])}}" method="get">
                            <button class="btnaction oneyBtn"><i class="bi bi-plus-square bt"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>No hay cargos para esta empresa</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="create">
        <a href="{{ route('charges.create') }}">Crear cargo</a>
    </div>
    @endsection
</body>

</html>