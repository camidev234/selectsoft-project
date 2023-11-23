<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
        <title>Bienvenida</title>
    </head>
    <body>
        <main class="flex">
            <img src="{{asset('img/selectsoft.jpeg')}}" alt="Logo Selectsoft">
            <h2>BIENVENIDO A SELECTSOFT</h2>
            <form>
                <section class="form-group">
                    <p>TU HERRAMIENTA PARA LA SELECCION DE PERSONAL</p>
                        <a href="{{route('user.login')}}"><buttom type="submit-btn">Haga clic para continuar</buttom></a>
                </section>
            </form>
        </main>
    </body>
</html>
