<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/forgotPassword.css')}}">
        <title>Olvide mi contraseña</title>
    </head>
    <body>
        <main class="flex">
            <img src="img/selectsoft.jpeg" alt="Logo Selectsoft">
            <h2>REESTABLECER CONTRASEÑA</h2>
            @if(session()->has('mensaje'))
                <p style="color:red;">{{ session('mensaje') }}</p>
            @endif
            <form action="{{route('forgotPassword.find')}}" method="post">
                @csrf
                @method('PATCH')
                <section class="form-group">
                    <input type="text" id="numero_documento" name="email" placeholder="Digite su correo electronico" value="{{old('email')}}">
                    @error('email')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </section>
                <a href="./nuevacontraseña.html"><button type="submit">Restablecer contraseña</button></a>
            </form>
        </main>
    </body>
</html>
