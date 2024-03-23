<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <title>Vacantes</title>
</head>

<body>
    @extends('layout.header')
    @section('content')
    <div class="container">
        @if(session()->has('message'))
        <p id="message" style="display: none;">{{ session('message') }}</p>
        <script>
            const mes = document.getElementById('message')
            alert(mes.textContent);
        </script>
        @endif
        <section class="titlePage">
            <article class="title">
                <h2>Listado De Vacantes</h2>
            </article>
            <article class="btns">
                <article class="descBtns oneBt">
                    <div>
                        <i class="bi bi-ban bt"></i>
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <span>Cerrar /</span>
                    <span>Abrir</span>
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
        <section class="findCom">
            <form action="{{route('vacancies.findByCompany', ['company' => $company->id])}}" method="get">
                <input type="search" name="search" id="" placeholder="Buscar vacante por codigo o cargo">
                @error('search')
                <br>
                <span style="color: red;">{{$message}}</span>
                @enderror
                <button><i class="bi bi-search"></i></button>
            </form>
        </section>
        @if(!$find)
        <table class="table_container">
            <thead class="table_head">
                <tr>
                    <th>Codigo</th>
                    <th>Cargo</th>
                    <th>Vacantes</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table_body">
                @forelse($vacants as $vacant)
                <tr>
                    <td>{{ $vacant->vacancie_code }}</td>
                    <td>{{ $vacant->charge->charge }}</td>
                    <td>{{ $vacant->number_vacancies }}</td>
                    <td>
                        @if($vacant->is_active)
                        Activa
                        @else
                        Inactiva
                        @endif
                    </td>
                    <td class="actions-l">
                        <form action="{{route('vacancies.editStatus', ['vacancie' => $vacant->id])}}" method="post">
                            @csrf
                            @method('PATCH')
                            <button class="btnaction oneyBtn"><i class="{{$vacant->is_active ? 'bi bi-ban bt' : 'bi bi-check-circle-fill bt'}}"></i></button>
                        </form>
                        <form action="{{route('vacancies.edit', ['vacancie' => $vacant->id, 'company' => $company->id])}}" method="get">
                            <button class="btnaction twoBtn"><i class="bi bi-pencil-fill bt"></i></button>
                        </form>
                        <form action="{{route('vacancies.show', ['vacancie' => $vacant->id])}}" method="get">
                            <button class="btnaction threeBtn"><i class="bi bi-eye-fill bt"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>No hay Vacantes para esta empresa</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @else
        <table class="table_container">
            <thead class="table_head">
                <tr>
                    <th>Codigo</th>
                    <th>Cargo</th>
                    <th>Vacantes</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table_body">
                @foreach($vacantsFind as $vacant)
                <tr>
                    <td>{{ $vacant->vacancie_code }}</td>
                    <td>{{ $vacant->charge->charge }}</td>
                    <td>{{ $vacant->number_vacancies }}</td>
                    <td>
                        @if($vacant->is_active)
                        Activa
                        @else
                        Inactiva
                        @endif
                    </td>
                    <td class="actions-l">
                        <form action="{{route('vacancies.editStatus', ['vacancie' => $vacant->id])}}" method="post">
                            @csrf
                            @method('PATCH')
                            <button class="btnaction oneyBtn"><i class="{{$vacant->is_active ? 'bi bi-ban bt' : 'bi bi-check-circle-fill bt'}}"></i></button>
                        </form>
                        <form action="{{route('vacancies.edit', ['vacancie' => $vacant->id, 'company' => $company->id])}}" method="get">
                            <button class="btnaction twoBtn"><i class="bi bi-pencil-fill bt"></i></button>
                        </form>
                        <form action="{{route('vacancies.show', ['vacancie' => $vacant->id])}}" method="get">
                            <button class="btnaction threeBtn"><i class="bi bi-eye-fill bt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <div class="create">
        <a href="{{ route('vacancies.create') }}">Crear Vacante</a>
    </div>
    @endsection
</body>

</html>