<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Editar Rol De Usuario</title>
</head>

<body>
    @extends('layout.headerAdmin')
    @section('content')
    <section class="container">
        <section class="info">
            <h4>Rol Actual: {{$userToMod->role->name}}</h4>
        </section>
        <form action="{{route('instructor.updateRole', ['userMod' => $userToMod->id])}}" method="POST">
            @csrf
            @method('PATCH')
            <select name="role_id" id="">
                <option value="{{$userToMod->role_id}}">{{$userToMod->role->name}}</option>
                @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select><br>
            <button>Actualizar Rol</button>
        </form>
    </section>
    @endsection
</body>

</html>
