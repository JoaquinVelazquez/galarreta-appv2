@extends('layouts.principal');
@section('contenido')
<div class="container-sm contenedor-registro">

    <div class="col instructivo">
        <h3>Como registrarse en la app</h3>
        <br>
        <p><span>1º Paso: </span>Iniciar sesión en tu cuenta de Mercadolibre</p>
        <p><span>2º Paso: </span>Seleccione su pais</p>
    </div>
    <div class="col lista-paises">
        <a href="/autenticar/ARGENTINA"><img src="img/banderas-icon_0000_ilustracion-bandera-argentina_53876-27120.png" alt="bandera-argentina"> Argentina</a>
        <a href="/autenticar/BRASIL"><img src="img/banderas-icon_0006_Capa-1.png" alt="bandera-brasil"> Brasil</a>
        <a href="/autenticar/CHILE"><img src="img/banderas-icon_0005_chile-29125_640.png" alt="bandera-chile"> Chile</a>
        <a href="/autenticar/COLOMBIA"><img src="img/banderas-icon_0001_Flag_of_Colombia.png" alt="bandera-colombia"> Colombia</a>
        <a href="/autenticar/MEXICO"><img src="img/banderas-icon_0004_Bandera_de_México_(1934-1968).png" alt="bandera-mexico"> México</a>
        <a href="/autenticar/PERU"><img src="img/banderas-icon_0002_download.png" alt="bandera-peru"> Perú</a>
        <a href="/autenticar/URUGUAY"><img src="img/banderas-icon_0003_Bandera_Uruguay_2018.png" alt="bandera-uruguay"> Uruguay</a>
    </div>
</div>
@endsection