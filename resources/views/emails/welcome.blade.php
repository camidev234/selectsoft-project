<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <main class="content">
        <div class="logo">
            <img src="{{asset('img/SELECTSOFTGenericIcon.png')}}" alt="Logo de selectsoft">
        </div>

        <div class="content">
            <h3>Bienvenido a Selectsoft</h3>
            <p>Bienvenido {{$userName}} a tu herramienta de seleccion de personal, gracias por preferirnos. Aca podras encontrar herramientas de gestion de talento humano bastante utiles para tu proceso de seleccion.</p>
        </div>
    </main>
</body>
</html>
