@extends('layouts.dashboard')
@section('contenido')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" id="informacion">
    <h2 class="h2">Evolucion de envios del usuario: <a href="#" style="text-decoration: none; color: black;">NOMBRE_USUARIO (CUST ID:1111111)</a></h2>
</div>
<div>
    @include('includes.charts.evolucion_envios')
</div>
@endsection