@extends('layouts.principal');
@section('contenido')
<div class="contenedor-registro container-sm">
    <div class="card carta-registro" style="width: 18rem;">
        <img src="img/mercado.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title" style="font-size: 20px">Registrar Usuario</h5>
            <p class="card-text">Enlace para poder registrar sellers al sistema y poder comenzar a medir sus metricas
            </p>
            <a href="/agregar_seller" class="btn btn-primary">Haga click aquí</a>
        </div>
    </div>
    <div class="card carta-operar" style="width: 18rem;">
        <img src="img/post-social-data-for-publishers-tail.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title" style="font-size: 20px">Operar con la App</h5>
            <p class="card-text">Accede al Dashboard de Galarreta Intelligence para comenzar a trabajar con el sistema.
            </p>
            <a href="/apanel/sellers" class="btn btn-primary">Haga click aquí</a>
        </div>
    </div>
</div>
@endsection