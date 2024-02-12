<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/login.css')}}">
        <title>Inicio de Sesión</title>
    </head>
    <body>
        <main class="flex">
            <img src="{{asset('img/selectsoft.jpeg')}}" alt="Logo Selectsoft">
            <h2>INICIO DE SESIÓN</h2>
            @if(session()->has('message'))
                <p style="display:none;" id="message">{{ session('message') }}</p>
                <script>
                    const warning = document.getElementById('message');
                    alert(warning.textContent);
                </script>
            @endif
            @if(session()->has('mensaje'))
                <p style="color:red;">{{ session('mensaje') }}</p>
            @endif
            <form action="{{route('user.auth')}}" method="post">
                @csrf
                <section class="form-group">
                    <label for="email"><input type="email" id="numero_documento" name="email" placeholder="Digite su correo electronico" value="{{old('email')}}"></label>
                    @error('email')
                    <br>
                        <span style="color:red;">{{$message}}</span>
                    <br>
                        @enderror
                </section>
                <section class="form-group">
                    <label for="contrasena"><input type="password" id="contrasena" name="password" placeholder="Contraseña" value="{{old('password')}}"></label>
                    @error('password')
                    <br>
                        <span style="color:red;">{{$message}}</span>
                        <br>
                    @enderror
                </section>
                <a href="{{route('forgotPassword.index')}}">¿Olvidó su contraseña?</a>
                <p>¿No se encuentra registrado?<a href="{{route('users.create')}}"> Registrese aquí</a></p>
                <button type="submit">Iniciar sesión</button>
            </form>
        </main>
    </body>
</html>
