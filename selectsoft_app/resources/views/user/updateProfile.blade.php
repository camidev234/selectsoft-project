<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/updateProfile.css')}}">
    <title>Document</title>
</head>
<body>
    @extends('layout.header')
    @section('content')
    <section class="container">
        <form action="{{route('candidate.saveProfile', ['candidate' => $candidate->id])}}" class="formUpdate" method="post">
            @csrf
            @method('PATCH')
            <label for="curriculum_title">Profesion: </label><br>
            <input type="text" placeholder="titulo" name="curriculum_title" value="{{old('curriculum_title') ?: $candidate->curriculum_title}}">
            @error('curriculum_title')
                <span style="color: red;">{{$message}}</span><br>
            @enderror
            <label for="occupational_profile"></label><br>
            @if($candidate->occupational_profile == 'NULL')
            <textarea name="occupational_profile" placeholder="perfil ocupacional" cols="30" rows="12"></textarea><br>
            @error('occupational_profile')
                <span style="color: red;">{{$message}}</span><br>
            @enderror
            @else
            <textarea name="occupational_profile" id="" cols="30" rows="15">{{old('occupational_profile') ?: $candidate->occupational_profile}}</textarea><br>
            @error('occupational_profile')
                <span style="color: red;">{{$message}}</span><br>
            @enderror
            @endif
            <button>Guardar informacion</button>
        </form>
    </section>
    @endsection
</body>
</html>
