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
                            <button class="deleteBtn">Cerrar</button>
                        </form>
                        <form action="{{route('vacancies.edit', ['vacancie' => $vacant->id, 'company' => $company->id])}}" method="get">
                            <button class="updateBtn">Actualizar</button>
                        </form>
                        <form action="{{route('vacancies.show', ['vacancie' => $vacant->id])}}" method="get">
                            <button class="detailsBtn">Detalles</button>
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
                        <form action="{{route('udnin ')}}" method="get">
                            <button class="updateBtn">Actualizar</button>
                        </form>
                        <form action="{{route('vacancies.editStatus', ['vacancie' => $vacant->id])}}" method="post">
                            @csrf
                            @method('PATCH')
                            <button class="deleteBtn">Cerrar</button>
                        </form>
                        <form action="{{route('vacancies.show', ['vacancie' => $vacant->id])}}" method="get">
                            <button class="detailsBtn">Detalles</button>
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
