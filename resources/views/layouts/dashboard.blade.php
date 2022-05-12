@php
if(isset($seller->id)) {
    $id_seller = $seller->id;
} else {
    $id_seller = 0;
}
@endphp

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>@yield('title')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}">
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/apanel/sellers">Galarreta Intelligence Engine
            V2.0.1</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <form class="logout" method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Cerrar Sesión') }}
                    </x-dropdown-link>
                </form>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse shadow">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="/"><img src="../../img/png/galarreta-logo.png" alt="galarreta-logo"></a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="{{route('sellers.show', $id_seller)}}">
                                <span data-feather="file" class="border-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a disabled class="nav-link" href="">
                                <span data-feather="users"></span>
                                Fulfilment
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="">
                                <span data-feather="users"></span>
                                Categorias
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="{{route('ranking_ventas.show',  $id_seller)}}">
                                <span data-feather="bar-chart-2"></span>
                                Ranking de productos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="{{route('ranking_conversion.show', $id_seller)}}">
                                <span data-feather="bar-chart-2"></span>
                                Ranking de Conversión
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="{{route('performance_mensual.show', $id_seller)}}">
                                <span data-feather="bar-chart-2"></span>
                                Performance Mensual
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="{{route('publicaciones_pausadas.show',  $id_seller)}}">
                                <span data-feather="bar-chart-2"></span>
                                Publicaciones Pausadas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="">
                                <span data-feather="bar-chart-2"></span>
                                Evolución Envios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="{{route('evolucion_canal.show', $id_seller)}}">
                                <span data-feather="bar-chart-2"></span>
                                Evolución Canal
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="{{route('ventas_marca.show',  $id_seller)}}">
                                <span data-feather="bar-chart-2"></span>
                                Ventas por Marca
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('contenido')
            </main>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/58821011b2.js" crossorigin="anonymous"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>