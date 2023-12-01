<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/updateProfile.css')}}">
    <title>Actualizar Perfil Ocupacional</title>
</head>
<body>
    <header class="header">
        @extends('layout.header')
    </header>
    @section('content')
    <main class="container">
        <form action="{{route('candidate.saveProfile')}}" method="post" class="form">
            @csrf
            @method('PATCH')
            <label for="occupational_profile">Perfil Ocupacional: </label><br>
            <textarea name="occupational_profile" id="" cols="30" rows="15">{{$profile}}</textarea>
            @error('occupational_profile')
                <span style="color: red;">{{$message}}</span>
                <br>
            @enderror
            <button class="btn-sub">Actualizar Perfil</button>
        </form>
    </main>
    @endsection
</body>
</html>
