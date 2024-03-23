<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/editRole.css')}}">
    <title>Editar Rol De Usuario</title>
</head>

<body>
    @extends('layout.headerAdmin')
    @section('content')
    <section class="container">
        <section class="info">
            <h4 class="info__title">Usuario: {{ucwords(strtolower($userToMod->name))}} {{ucwords(strtolower($userToMod->last_name))}}-{{$userToMod->number_document}}</h4>
        </section>
        <form action="{{route('instructor.updateRole', ['userMod' => $userToMod->id])}}" method="POST" class="form">
        <article class="infotext">
            <span>Rol Actual: {{$userToMod->role->name}}</span>
        </article>    
        @csrf
            @method('PATCH')
            <select name="role_id" id="" class="form__select">
                <option value="{{$userToMod->role_id}}">{{$userToMod->role->name}}</option>
                @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select><br>
            <button class="form__button">Actualizar Rol</button>
        </form>
    </section>
    @endsection
</body>

</html>