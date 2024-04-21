<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/indexEdExp.css')}}">
    <title>Document</title>
</head>

<body>
    <header class="header">
        @extends('layout.header')
    </header>

    @section('content')
    <section class="title">
        <h1>Mi experiencia</h1>
    </section>

    <main class="container">

        <section class="content">
            <table>
                <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Meses de experiencia</th>
                        <!-- <th>Funciones</th> -->
                        <th>Cargo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($experiencies as $experiencie)
                    <tr>
                        <td>{{$experiencie->company_experience}}</td>
                        <td>{{$experiencie->months_experience}}</td>
                        <!-- <td>{{$experiencie->functions}}</td> -->
                        <td>{{$experiencie->job}}</td>
                        <td class="actionstable">
                            <form action="{{route('exp.destroy', ['person_experience' => $experiencie->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btnaction oneBtn"><i class="bi bi-trash-fill bt"></i></button>
                            </form>
                            <form action="{{route('exp.edit', ['person_experience' => $experiencie->id])}}" method="get">
                                <button class="btnaction twoBtn"><i class="bi bi-pencil-fill bt"></i></button>
                            </form>
                            <form action="">
                                <button class="btnaction threeBtn"><i class="bi bi-eye-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>No hay experiencias para el usuario</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
        <section class="card">
            <A href="{{route('exp.create')}}">Agregar nueva experiencia</a>
        </section>
    </main>

    @endsection


</body>

</html>