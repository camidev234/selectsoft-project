<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/createEducation.css')}}">
    <title>Nueva Experiencia Laboral</title>
</head>
<body>
    <header class="header">
        @extends('layout.header')
    </header>
    @section('content')
    <main class="container">
        <form action="{{route('exp.store')}}" method="post" class="form">
            @csrf
            <label for="company_experience">Empresa: </label><br>
            <input type="text" placeholder="Empresa" name="company_experience" value="{{old('company_experience')}}"><br>
            @error('company_experience')
                <span style="color:red;">{{$message}}</span>
                <br>
            @enderror
            <label for="months_experience">Meses de Experiencia: </label><br>
            <input type="text" name="months_experience" placeholder="meses de experiencia" value="{{old('months_experience')}}">
            @error('months_experience')
                <span style="color: red;">{{$message}}</span><br>
            @enderror
            <label for="">Funciones Desempeñadas:</label><br>

            <textarea type="text" name="functions" placeholder="Funciones" rows="15">{{old('functions')}}</textarea><br>
            @error('functions')
                <span style="color: red;">{{$message}}</span><br>
            @enderror
            <button>Añadir Experiencia <i class="bi bi-floppy2-fill"></i></button>
        </form>
    </main>
    @endsection
</body>
</html>

