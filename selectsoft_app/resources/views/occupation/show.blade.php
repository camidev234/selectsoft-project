<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/showOccupation.css')}}">
    <title>Ocupacion: {{$occupation->occupation_code}}</title>
</head>
<body>
    @extends('layout.header')
    @section('content')
    <section class="container">
        <section class="occupationInfo">
            <h2>Codigo: {{$occupation->occupation_code}}</h2><br>
            <p><strong>Ocupacion: </strong>{{$occupation->occupation_name}}</p>
            <p><strong>Descripcion: </strong>{{$occupation->description}}</p>
        </section>
        <section class="functions-title">
            <h2>Funciones: </h2>
        </section>
        <section class="functions">
            <table>
                <thead>
                    <tr>
                        <th>Funcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($functions as $function)
                        <tr>
                            <td>{{$function->function}}</td>
                            <td class="functionActions">
                                <form action="{{route('occupationFunction.edit', ['occupation_function' => $function->id, 'occupation' => $occupation->id])}}">
                                    <button class="btnUpdate">Actualizar</button>
                                </form>
                                <form action="{{route('occupationFunction.destroy', ['occupation_function' => $function->id, 'occupation' => $occupation->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btnDelete">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>La ocupacion {{$occupation->occupation_code}} no posee funciones</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section><br>
        <section class="createFunction">
            <a href="{{route('occupationFunction.create',['occupation' => $occupation->id])}}">Crear funcion</a>
        </section>
    </section>
    @endsection
</body>
</html>
