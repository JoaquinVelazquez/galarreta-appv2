@extends('layouts.dashboard')
@section('title', 'Evolucion Canal - ' . $seller->nickname)
@section('contenido')
@php
$mes_actual = date("Y-m-01");

$mes_1_array = array();
$mes_2_array = array();
$mes_3_array = array();
$mes_4_array = array();
$mes_5_array = array();
$mes_5_array = array();
$mes_6_array = array();
$mes_6_array = array();
$mes_7_array = array();
$mes_8_array = array();
$mes_9_array = array();
$mes_10_array = array();
$mes_11_array = array();
$mes_12_array = array();

foreach ($ordenes_seller as $data) {

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 12 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 11 months")) {
        array_push($mes_1_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 11 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 10 months")) {
        array_push($mes_2_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 10 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 9 months")) {
        array_push($mes_3_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 9 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 8 months")) {
        array_push($mes_4_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 8 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 7 months")) {
        array_push($mes_5_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 7 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 6 months")) {
        array_push($mes_6_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 6 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 5 months")) {
        array_push($mes_7_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 5 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 4 months")) {
        array_push($mes_8_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 4 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 3 months")) {
        array_push($mes_9_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 3 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 2 months")) {
        array_push($mes_10_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 2 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 1 months")) {
        array_push($mes_11_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 1 months") && strtotime($data["fecha"]) <= strtotime($mes_actual)) {
        array_push($mes_12_array, $data);
    }
}
@endphp
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
    id="informacion">
    <h2 class="h2">Evolucion de Marketplace del usuario: <a href="#"style="text-decoration: none; color: black;">{{$seller->nickname}} ({{$seller->id}})</a></h2>
</div>
<div>
    @include('includes.charts.evolucion_canal_ordenes')
</div>
<hr>
<div>
    @include('includes.charts.evolucion_canal_unidades')
</div>
<hr>
<div class="evolucion-canal-facturacion">
    @include('includes.charts.evolucion_canal_facturacion')
</div>
@endsection