<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <title>Requisiciones</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <div class="container">
        <section class="titlePage">
            <article class="title">
                <h2>Requisiciones</h2>
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
                <article class="descBtns thBt">
                    <div>
                        <i class="bi bi-eye-fill bt"></i>
                    </div>
                    <span>Detalles</span>
                </article>
            </article>
        </section>
        <table class="table_container">
            <thead class="table_head">
                <tr>
                    <th>Cargo</th>
                    <th>Meses de experiencia</th>
                    <th>Numero de vacantes</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table_body">
                @forelse($requisitions as $requisiton)
                <tr>
                    <td>{{ $requisiton->charge->charge }}</td>
                    <td>{{ $requisiton->required_experience }}</td>
                    <td>{{ $requisiton->number_vacancies }}</td>
                    <td class="actions-l">
                        <form action="{{route('requisition.destroy',['requisition'=>$requisiton->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btnaction oneBtn"><i class="bi bi-trash-fill bt"></i></button>
                        </form>
                        <form action="{{route('requisiton.edit', ['requisiton' => $requisiton->id])}}" method="get">
                            <button class="btnaction twoBtn"><i class="bi bi-pencil-fill bt"></i></button>
                        </form>
                        <form action="{{route('requisition.show', ['requisition' => $requisiton->id])}}" method="get">
                            <button class="btnaction threeBtn"><i class="bi bi-eye-fill bt"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>No hay requisiciones para esta empresa</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="create">
        <a href="{{ route('requisition.create', ['company' => $company->id]) }}">Crear Requisicion</a>
    </div>
    @endsection
</body>

</html>