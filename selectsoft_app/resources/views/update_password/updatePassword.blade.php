<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/updatePassword.css')}}">
    <title>Document</title>
</head>
<body>
    <header class="header">
        @extends('layout.header')
    </header>

    @section('content')
    <main class="containerr">
        <form action="{{route('user.storePassword')}}" method="post" class="form">
            @csrf
            @method('PATCH')
            <label>Ingrese su nueva contraseña</label>
            <input type="password" name="password">
            <br>
            @error('password')
                <span style="color: red;">{{$message}}</span><br>
                <br>
            @enderror
            <input type="submit">
        </form>
    </main>
    @endsection
</body>
</html>
