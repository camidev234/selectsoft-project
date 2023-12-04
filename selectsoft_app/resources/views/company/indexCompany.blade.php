<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/indexCompany.css')}}">
    <title>Document</title>
</head>

<body>
    @extends('layout.header')
    @section('content')

    <section class="container">
        <section class="findCom">
            <form action="{{route('company.findCompany')}}" method="get">
                <input type="search" name="search" id="" placeholder="Buscar empresa por nit">
                <button><i class="bi bi-search"></i></button>
            </form>
        </section>
        <section class="showCompanies">
            @if($find)
            <section class="viaCompany">
                <a href="{{route('company.index')}}">Ver Todas</a>
            </section><br>
            <table>
                <thead>
                    <tr>
                        <th>Nit</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companyFind as $company)
                    <tr>
                        <td>{{$company->nit}}</td>
                        <td>{{$company->business_name}}</td>
                        <td>
                            <form action="">
                                <button>Vincularse</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <table>
                <thead>
                    <tr>
                        <th>Nit</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($allCompanies as $company)
                    <tr>
                        <td>{{$company->nit}}</td>
                        <td>{{$company->business_name}}</td>
                        <td>
                            <form action="">
                                <button>Vincularse</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>No hay empresas para mostrar</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            @endif
        </section>
    </section>
    @endsection
</body>

</html>
