@extends('layouts.principal');
@section('contenido')
<@php
    switch ($pais) {
    case "ARGENTINA":
        $link_autenticar = "https://auth.mercadolibre.com.ar";
        break;
    case "CHILE":
        $link_autenticar = "https://auth.mercadolibre.cl";
        break;
    case "PERU":
        $link_autenticar = "https://auth.mercadolibre.com.pe";
        break;
    case "COLOMBIA":
        $link_autenticar = "https://auth.mercadolibre.com.co";
        break;
    case "BRASIL":
        $link_autenticar = "https://auth.mercadolivre.com.br";
        break;
    case "MEXICO":
        $link_autenticar = "https://auth.mercadolibre.com.mx";
        break;
    case "URUGUAY":
        $link_autenticar = "https://auth.mercadolibre.com.uy";
        break;
}
@endphp
<div class="container-sm contenedor-registro">
    <div class="container pt-4 contenedor-autenticacion">
        <h1 class="text-center">Galarreta Intelligence Engine</h1>
        <hr>
        <h3 class="text-center pt-4">
            Haz click
            <a href="<?php echo $link_autenticar ?>/authorization?response_type=code&client_id=624787090575020&redirect_uri=https://app.galarreta.co/autenticacion.php">AQUÍ</a>
            para autenticarte con tu usuario de Mercadolibre
        </h3>
    </div>
</div>
@endsection