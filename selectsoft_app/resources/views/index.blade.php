<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Selectsoft-Herramienta de seleccion de personal</title>
</head>
<body>
    <main class="page">

        <!-- Header de la pagina -->

        <header class="header">
            <!-- Logo de selectsoft -->
            <article class="img-header">
                <a href="index.html"><img src="img/SELECTSOFTGenericIcon.png" alt="log-selectsoft"></a>
            </article>
            <!-- Barra de busqueda -->
            <article class="search">
                <input type="search" name="" id="" placeholder="Buscar vacantes">
            </article>
            <nav class="bar-nav" id="bar">
                <ul class="ul-list">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="{{route('user.login')}}">Login</a></li>
                    <li><a href="{{route('users.create')}}">Sign In</a></li>
                    <li><a href="#">Sobre Nosotros</a></li>
                </ul>
            </nav>
        </header>

        <!-- Seccion para imagen de presentacion -->

        <!-- Present section Container -->
        <section class="present-section">
            <section class="present-text">
                <!-- Logo de selectsoft -->
                <img src="img/select-present.png" alt="log-selectsoft">
                <!-- Texto de presentacion -->
                <p>Una herramienta para la seleccion de personal al alcance de tus manos.</p>
            </section>
        </section>

        <!-- Contenido central de la pagina -->

        <article class="tittle"><h1>Vacantes Del Dia</h1></article>

        <section class="content-page">
            <section class="cards">
                <article class="site-card">
                    <section class="card-text">
                        <h3>XXXXX</h3>
                        <h4>Cargo de la vacante</h4>
                        <h5>Ubicacion: Municipio</h5>
                    </section>
                    <a href="" id="hipertext">Ver mas</a>
                </article>
                <article class="site-card">
                    <section class="card-text">
                        <h3>XXXXX</h3>
                        <h4>Cargo de la vacante</h4>
                        <h5>Ubicacion: Municipio</h5>
                    </section>
                    <a href="" id="hipertext">Ver mas</a>
                </article>
                <article class="site-card">
                    <section class="card-text">
                        <h3>XXXXX</h3>
                        <h4>Cargo de la vacante</h4>
                        <h5>Ubicacion: Municipio</h5>
                    </section>
                    <a href="" id="hipertext">Ver mas</a>
                </article>
            </section>
            <section class="widgets">
                <section class="sign-in cd">
                    <article class="icon">
                        <img src="img/personIcon.jpg" alt="icono-persona">
                    </article>
                    <article class="hiper">
                        <a href="{{route('users.create')}}">Registrarse</a>
                    </article>
                </section>
                <section class="log-in cd">
                    <article class="icon">
                        <img src="img/keyIcon.png" alt="icono-inicio-sesion">
                    </article>
                    <article class="hiper">
                        <a href="{{route('user.login')}}">Iniciar Sesion</a>
                    </article>
                </section>
            </section>
        </section>

        <!-- Footer page -->

        <footer class="site-footer">
            <section class="Index">
                <h4><a href="">Volver Al Inicio</a></h4>
            </section>
            <section class="content-footer">
                <section class="container-footer">
                    <section class="cont one">
                        <h2>Conocenos</h2>
                        <h5><a href="">Sobre Nosotros</a></h5>
                    </section>
                    <section class="cont two">
                        <h2>Soporte</h2>
                        <h5><a href="">Manual De Usuario</a></h5>
                    </section>
                    <section class="cont three">
                        <img src="img/SELECTSOFTFooterIcon.png" alt="log-selectsoft">
                    </section>
                </section>
                <section class="copy">
                    <h3>Todos los derechos reservados &copy; 2023</h3>
                </section>
            </section>
        </footer>

    </main>
</body>
</html>
