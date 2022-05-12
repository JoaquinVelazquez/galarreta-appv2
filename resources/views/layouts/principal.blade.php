<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galarreta Intelligence v2.0.1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}">
</head>

<style>
    body {
        background-image: url(../img/fondo.jpg);
        background-position: bottom;
        background-repeat: no-repeat;
        background-size: cover;
        overflow-y:hidden;
    }
</style>

<body>
    <div class="container-fluid contenedor-general">
        <div class="back">
            <nav class="nav-inicio align-items-center d-flex">
                <a href="/"><img class="img-fluid" src="img/galarreta-logo.png" alt="logo-galarreta"></a>
                <a class="nav-link" target="_blank" href="https://galarreta.co/">Sitio Oficial</a>
                <a class="nav-link" target="_blank" href="https://galarreta.co/#nosotros">Sobre Nosotros</a>
            </nav>
            @yield('contenido')
        </div>
    </div>
</body>
</html>