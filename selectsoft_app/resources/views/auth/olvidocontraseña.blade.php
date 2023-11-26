<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/olvidocontraseña.css">
        <title>Olvide mi contraseña</title>
    </head>
    <body>
        <main class="flex">
            <img src="img/selectsoft.jpeg" alt="Logo Selectsoft">
            <h2>¿OLVIDO SU CONTRASEÑA?</h2>
            <form>
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
                    </select></label>
                </section>
                <section class="form-group">
                    <label for="numero_documento"><input type="text" id="numero_documento" name="numero_documento" placeholder="Digite su número de documento" required></label>
                </section>
                <a href="./nuevacontraseña.html"><button type="submit">Restablecer contraseña</button></a>
            </form>
        </main>
    </body>
</html>