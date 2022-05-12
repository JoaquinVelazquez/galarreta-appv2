@extends('layouts.dashboard')
@section('title', 'Ventas Por Marca - ' . $seller->nickname)
@section('contenido')
@php
$total_facturado = $ordenes_seller->sum('monto');
$total_unidades = $ordenes_seller->sum('cantidad');

foreach($ordenes_seller as $data) {
$nombre_marca = $data["marca"];
$ordenes_por_marca[$nombre_marca][] = [
'id_producto' => $data["publicacion_id"],
'nombre_producto' => $data["nombre"],
'monto' => $data["monto"],
'cantidad' => $data["cantidad"],
'marca' => $data["marca"],
];

$ordenes_por_marca[$nombre_marca]['total_monto'] = array_sum(array_column($ordenes_por_marca[$nombre_marca], 'monto'));
$ordenes_por_marca[$nombre_marca]['total_cantidad'] = array_sum(array_column($ordenes_por_marca[$nombre_marca],
'cantidad'));
}
@endphp
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
    id="informacion">
    <h2 class="h2">Ventas por Marca Ultimos 30 Dias <a href="#"
            style="text-decoration: none; color: black;">{{$seller->nickname}} ({{$seller->id}})</a></h2>
</div>

<div class="container d-flex" style="margin: 10px; padding: 0; align-items:center; justify-content:center">
    <div class="contenedor-botones-marca">
        <button id="btn-facturacion" class="btn btn-primary boton-facturacion">Ventas por Marca Facturación</button>
        <button id="btn-unidades" class="btn btn-primary boton-unidades">Ventas por Marca Unidades</button>
    </div>

    <div class="marca-facturacion">
        @include('includes.charts.venta_marca_facturacion')
    </div>
    <div class="marca-unidades invisible">
        @include('includes.charts.venta_marca_unidades')
    </div>
</div>
<script>
    const btnFacturacion = document.querySelector("#btn-facturacion");
    const btnUnidades = document.querySelector("#btn-unidades");
    const graficoFacturacion = document.querySelector(".marca-facturacion");
    const graficoUnidades = document.querySelector(".marca-unidades")

    if (graficoUnidades.classList.contains("invisible")) {
        btnFacturacion.classList.remove("btn-primary");
        btnFacturacion.classList.add("btn-success");
        btnUnidades.classList.add("btn-primary");
        btnUnidades.classList.remove("btn-success");
    }

    btnFacturacion.addEventListener("click", function () {
        graficoFacturacion.classList.remove("invisible");
        graficoUnidades.classList.add("invisible");
        btnFacturacion.classList.remove("btn-primary");
        btnFacturacion.classList.add("btn-success");
        btnUnidades.classList.add("btn-primary");
        btnUnidades.classList.remove("btn-success");
    });

    btnUnidades.addEventListener("click", function () {
        graficoUnidades.classList.remove("invisible");
        graficoFacturacion.classList.add("invisible");
        btnUnidades.classList.remove("btn-primary");
        btnUnidades.classList.add("btn-success");
        btnFacturacion.classList.add("btn-primary");
        btnFacturacion.classList.remove("btn-success");
    });
</script>
@endsection