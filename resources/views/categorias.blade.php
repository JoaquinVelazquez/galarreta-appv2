@extends('layouts.dashboard')
@section('contenido')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" id="informacion">
    <h2 class="h2">Publicaciones por categoría del usuario: <a href="#" style="text-decoration: none; color: black;">NOMBRE_USUARIO (CUST ID:1111111)</a></h2>
</div>

<div class="container" style="margin: 10px; padding: 0;">
    <div class="row">
        <div class="container contenedor-dashboard" style="margin: 10px; padding: 0; justify-content:space-between; align-items: center;">
            <h4>Categorias</h4>

            <div>
                @include('includes.charts.categorias')
            </div>
        </div>
    </div>
</div>
@endsection