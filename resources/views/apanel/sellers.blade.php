@extends('layouts.dashboard')
@section('title', 'Sellers')
@section('contenido')
<link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
<style>
    .nav li {
        display: none
    }

    .nav li:first-of-type {
        display: block
    }
</style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 style="font-size: 25px">Hola <b>{{ Auth::user()->name}}</b>, seleccione un Seller.</h2>
    <form action="" method="GET">
        <label for="" class="form-label">Busca un usuario:</label>
        <input type="text" class="form-control" id="search" name="search">
    </form>
</div>

<div class="contenedor-tarjetas-seller">
    @foreach ($sellers as $item)
    <div class="card carta-seller" style="width: 18rem;">
        <a href="#" target="_blank">
            @if (isset($item->imagen))
                <img src="{{$item->imagen}}" class="card-img-top" alt="foto-perfil">
            @else
                <img src="../img/sin_imagen.png" class="card-img-top" alt="foto-perfil">
            @endif
        </a>

        <div class="card-body">
            <a href="#" target="_blank">
                <h5 class="card-title">#{{$item->id}} - {{$item->nickname}}</h5>
            </a>
            <a href="{{route('sellers.update', $item->id)}}" target="_blank" class="btn btn-primary boton-dashboard"><i
                    class="lni lni-graph"></i>DASHBOARD</a>
            <div class="elementos-dashboard">
                <a href="{{route('ranking_ventas.show', $item->id)}}" class="btn link-1" target="_blank"><span>Ranking de Productos</span><i class="lni lni-invest-monitor"></i></a>
                <a href="{{route('ranking_conversion.show', $item->id)}}" class="btn link-2" target="_blank"><span>Ranking de Conversión</span><i class="lni lni-target-revenue"></i></a>
                <a href="{{route('performance_mensual.show', $item->id)}}" class="btn link-3" target="_blank"><span>Performance Mensual</span><i class="lni lni-stats-up"></i></a>
                <a href="#" class="btn link-4" target="_blank"><span>Evolución Envios</span><i class="lni lni-delivery"></i></a>
                <a href="{{route('evolucion_canal.show', $item->id)}}" class="btn link-4" target="_blank"><span>Evolución Canal</span><i class="lni lni-cart-full"></i></a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div style="margin-bottom: 10px">
    {{$sellers->links()}}
</div>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
</script>
<script src="https://cdn.tailwindcss.com"></script>
@endsection