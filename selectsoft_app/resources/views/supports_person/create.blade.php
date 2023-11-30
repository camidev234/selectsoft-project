<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/createEducation.css')}}">
    <title>Document</title>
</head>
<body>
    <header class="header">
        @extends('layout.header')
    </header>

    @section('content')
    <main class="container">
        <form action="{{route('supports.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">Tipo de soporte: </label><br>
            <select name="support_type_id" id="">
                @forelse($supportTypes as $support)
                    <option value="{{$support->id}}">{{$support->support_type}}</option>
                @empty
                    <option value="">No hay tipos de soporte</option>
                @endforelse
            </select><br>
            <label for="">Archivo: </label><br>
            <input type="file" name="support_file" id="" accept="application/pdf"><br>
            @error('support_file')
                <span style="color: red;">{{$message}}</span>
            @enderror
            <button>Subir Soporte</button>
        </form>
    </main>
    @endsection
</body>
</html>
