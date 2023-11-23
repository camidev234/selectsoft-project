<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/iniciosesion.css">
        <title>Inicio de Sesión</title>
    </head>
    <body>
        <main class="flex">
            <img src="img/selectsoft.jpeg" alt="Logo Selectsoft">
            <h2>INICIO DE SESIÓN</h2>
            <form action="#" method="post">
                <section class="form-group">
                    <label for="tipo_documento">Seleccione su tipo de documento</label>
                    <select name="tipo_documento" id="tipo_documento">
                        <option value="cedula">Cédula de Ciudadanía</option>
                        <option value="tarjeta">Tarjeta de Identidad</option>
                        <option value="extranjero">Cédula de Extranjería</option>
                        <option value="ciego">Número ciego SENA</option>
                        <option value="pasaporte">Pasaporte</option>
                        <option value="dni">DNI</option>
                        <option value="nit">NIT</option>
                        <option value="ramv">PEP-RAMV</option>
                        <option value="pep">PEP</option>
                        <option value="ppt">Permiso por Protección Temporal</option>
                    </select>
                </section>
                <section class="form-group">
                    <label for="numero_documento"><input type="text" id="numero_documento" name="numero_documento" placeholder="Digite su número de documento" required></label>
                </section>
                <section class="form-group">
                    <label for="contrasena"><input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required></label>
                </section>
                <a href="./olvidocontraseña.html">¿Olvidó su contraseña?</a>
                <p>¿No se encuentra registrado?<a href="./identificacion.html"> Registrese aquí</a></p>
                <button type="submit">Iniciar sesión</button>
            </form>
        </main>
    </body>
</html>
