@php
$visitas_totales = array();
foreach ($visitas["results"] as $visita) {
$total = $visita["total"];
array_push($visitas_totales, $total);
}
//////////////////////////////////////////////////////////////
switch($seller->pais){
case "AR":
$url = "https://www.mercadolibre.com.ar/perfil/".$seller->nickname;
break;
case "CL":
$url = "https://www.mercadolibre.cl/perfil/".$seller->nickname;
break;
case "PE":
$url = "https://www.mercadolibre.com.pe/perfil/".$seller->nickname;
break;
case "CO":
$url = "https://www.mercadolibre.com.co/perfil/".$seller->nickname;
break;
case "BR":
$url = "https://www.mercadolibre.com.br/perfil/".$seller->nickname;
break;
case "MX":
$url = "https://www.mercadolibre.com.mx/perfil/".$seller->nickname;
break;
case "UY":
$url = "https://www.mercadolibre.com.uy/perfil/".$seller->nickname;
break;
}

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$html = curl_exec($ch);

$dom = new DOMDocument();
@$dom->loadHTML($html);

$h2s = $dom->getElementsByTagName('h2');
$ps = $dom->getElementsByTagName('p');

$h2_array = array();

foreach($h2s as $h2) {
$tile_text = $h2->textContent;
$h2_array[] = $tile_text;
}

$p_array = array();

foreach($ps as $p) {
$tile_text_p = $p->textContent;
$p_array[] = $tile_text_p;
}

$metrica_uno_titulo = $h2_array[0];
$metrica_dos_titulo = $h2_array[1];

if(count($p_array) == 8) {
$metrica_uno_subtitulo = $p_array[3];
$metrica_dos_subtitulo = $p_array[4];
} else {
$metrica_uno_subtitulo = $p_array[5];
$metrica_dos_subtitulo = $p_array[6];
}

if(isset($divisa->divisa)) {
$divisa = $divisa->divisa;
} else {
$divisa = " ";
}
@endphp
@extends('layouts.dashboard')
@section('title', 'Dashboard - ' . $seller->nickname)
@section('contenido')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
    id="informacion">
    <h2 class="h2">Información <a href="https://www.mercadolibre.com.ar/perfil/{{$seller->nickname}}"
            style="text-decoration: none; color: black;">{{$seller->nickname}} (CUST ID: {{$seller->id}})</a></h2>
</div>

<div class="container" style="margin: 10px; padding: 0;">
    <div class="row">
        <div class="col-1">
            @if (isset($content->thumbnail->picture_url))
            <img class="img-fluid rounded" src="{{$content->thumbnail->picture_url}}" alt="thumbnail"
                style="margin: auto; padding: auto;">
            @else
            <p>Imagen de perfil no disponible</p>
            @endif
        </div>
        <div class="col-4">
            <h4 class="h4">Reputación</h4>

            @php
            $periodo_raw = $content->seller_reputation->metrics->sales->period;
            $ventas = $content->seller_reputation->metrics->sales->completed;
            $periodo = explode(" ", $periodo_raw);
            @endphp

            <p>{{$ventas}} ventas realizadas en los ultimos {{$periodo[0]}} {{($periodo[1] == "days" ? "dias" :
                "meses")}}</p>

            <div class="d-flex" style="align-items: center;">
                @switch($content->seller_reputation->level_id)
                @case("5_green")
                <div class="rectangulo_rojo disabled"></div>
                <div class="rectangulo_naranja disabled"></div>
                <div class="rectangulo_amarillo disabled"></div>
                <div class="rectangulo_verde_claro disabled"></div>
                <div class="rectangulo_verde_oscuro selected"></div>
                @break
                @case("4_light_green")
                <div class="rectangulo_rojo disabled"></div>
                <div class="rectangulo_naranja disabled"></div>
                <div class="rectangulo_amarillo disabled"></div>
                <div class="rectangulo_verde_claro selected"></div>
                <div class="rectangulo_verde_oscuro disabled"></div>
                @break
                @case("3_yellow")
                <div class="rectangulo_rojo disabled"></div>
                <div class="rectangulo_naranja disabled"></div>
                <div class="rectangulo_amarillo selected"></div>
                <div class="rectangulo_verde_claro disabled"></div>
                <div class="rectangulo_verde_oscuro disabled"></div>
                @break
                @case("2_orange")
                <div class="rectangulo_rojo disabled"></div>
                <div class="rectangulo_naranja selected"></div>
                <div class="rectangulo_amarillo disabled"></div>
                <div class="rectangulo_verde_claro disabled"></div>
                <div class="rectangulo_verde_oscuro disabled"></div>
                @break
                @case("1_red")
                <div class="rectangulo_rojo selected"></div>
                <div class="rectangulo_naranja disabled"></div>
                <div class="rectangulo_amarillo disabled"></div>
                <div class="rectangulo_verde_claro disabled"></div>
                <div class="rectangulo_verde_oscuro disabled"></div>
                @break
                @default
                <div class="rectangulo_rojo disabled"></div>
                <div class="rectangulo_naranja disabled"></div>
                <div class="rectangulo_amarillo disabled"></div>
                <div class="rectangulo_verde_claro disabled"></div>
                <div class="rectangulo_verde_oscuro disabled"></div>
                @endswitch
            </div>

            <div class="d-flex">
                @switch($content->seller_reputation->power_seller_status)
                @case("platinum")
                <p>MercadoLider Platino</p>
                @break
                @case("gold")
                <p>MercadoLider Oro</p>
                @break
                @case(NULL)
                <br>
                @break
                @default
                <p>MercadoLider Estandar</p>
                @endswitch
            </div>

            <h4 class="h4">Ubicación</h4>

            <div class="d-flex" style="flex-direction:row;">
                <p>{{$content->address->city}}, {{$content->address->state}}</p>
                @switch($seller->pais)
                @case("AR")
                <img src="../../img/png/bandera-arg.png" alt="bandera_ar" class="banderas">
                @break
                @case("CL")
                <img src="../../img/png/bandera-chi.png" alt="bandera_cl" class="banderas">
                @break
                @case("PE")
                <img src="../../img/png/bandera-per.png" alt="bandera_pe" class="banderas">
                @break
                @case("CO")
                <img src="../../img/png/bandera-col.png" alt="bandera_co" class="banderas">
                @break
                @case("BR")
                <img src="../../img/png/bandera-bra.png" alt="bandera_br" class="banderas">
                @break
                @case("MX")
                <img src="../../img/png/bandera-mx.png" alt="bandera_br" class="banderas">
                @break
                @case("UY")
                <img src="../../img/png/bandera-uy.png" alt="bandera_br" class="banderas">
                @break
                @default

                @endswitch
            </div>
        </div>

        <div class="col-4">
            <div class="atencion">
                <div class="d-flex" style="text-align: center; align-items:center" ;>
                    <div class="contenedor_imagen_mensaje">
                        <img class="mensajes_img" src="../../img/png/mensajes.png" alt="mensajes.png">
                        @switch($metrica_uno_titulo)
                        @case("Brinda buena atención")
                        <i class="fas fa-check-circle mensajes_icon"></i>
                        @break
                        @case("Atención brindada a sus compradores")
                        <i class="fas fa-minus-circle mensajes_icon"></i>
                        @break
                        @default
                        <i class="fas fa-times-circle mensajes_icon"></i>
                        @endswitch
                    </div>

                    <div class="ml-4 metricas_texto">
                        <h4>{{$metrica_uno_titulo}}</h4>
                        <p>
                            @switch($metrica_uno_titulo)
                            @case("Brinda buena atención")
                            Sus compradores estan satisfechos.
                            @break
                            @case("Atención brindada a sus compradores")
                            Aún no podemos calcularlo.
                            @break
                            @default
                            Sus compradores no estan satisfechos.
                            @endswitch
                        </p>
                    </div>

                </div>
            </div>

            <br>

            <div class="despacho">
                <div class="d-flex" style="text-align: center; align-items:center;">
                    <div class="contenedor_imagen_despacho">
                        <img class="mensajes_img" src="../../img/png/despacho.png" alt="mensajes.png">
                        @switch($metrica_dos_titulo)
                        @case("Despacha sus productos a tiempo")
                        <i class="fas fa-check-circle mensajes_icon" ;></i>
                        @break
                        @case("Entrega sus productos a tiempo")
                        <i class="fas fa-check-circle mensajes_icon" ;></i>
                        @break
                        @case("Tiempo en despachar sus productos")
                        <i class="fas fa-minus-circle mensajes_icon"></i>
                        @break
                        @default
                        <i class="fas fa-times-circle mensajes_icon"></i>
                        @endswitch
                    </div>

                    <div class="ml-4 metricas_texto">
                        <h5>{{$metrica_dos_titulo}}</h5>
                        <p>
                            @switch($metrica_dos_titulo)
                            @case("Despacha sus productos a tiempo")
                            Sus productos llegan sin demora.
                            @break
                            @case("Entrega sus productos a tiempo")
                            Sus productos llegan sin demora.
                            @break
                            @case("Tiempo en despachar sus productos")
                            Aún no podemos calcularlo.
                            @break
                            @default
                            Sus productos llegan con demora.
                            @endswitch
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3 porcentajes">
            <h4>% de reclamos</h4>
            <p>{{$content->seller_reputation->metrics->claims->rate * 100}}%</p>
            <br>
            <h4>% de retrasos</h4>
            <p>{{$content->seller_reputation->metrics->delayed_handling_time->rate * 100}}%</p>
            <br>
        </div>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-top"
            id="metricas">
            <h2 class="h2">Metricas ultimos 60 dias</h2>
        </div>

        <div class="container contenedor-dashboard"
            style="margin: 10px; padding: 0; justify-content:space-between; align-items: center;">
            <div class="row d-flex pb-4" style="justify-content: space-evenly; align-items: center;">
                <div class="col-4 d-flex"
                    style="flex-direction: row; text-align: center; align-items: center; justify-content: center;">
                    <div>
                        <h4 style="text-align: center;"> <a style="text-decoration: none; color: black;"
                                href="{{route('ordenes.update', $seller->id)}}">Transacciones Realizadas:</a></h4>
                        <p class="h2">{{$ordenes_seller->count()}}</p>

                        <br>

                        <h4 style="text-align: center;">Unidades Totales Vendidas</h4>
                        <p class="h2">{{$ordenes_seller->sum('cantidad')}}</p>

                        <br>

                        <h4 style="text-align: center;">Unidades Promedio</h4>
                        <p class="h2">{{($ordenes_seller->count() > 0) ?
                            number_format((($ordenes_seller->sum('cantidad') / $ordenes_seller->count())), 2) : 0}}</p>

                        <br>

                        <h4 style="text-align: center;">Valor Total en {{$divisa}}</h4>
                        <p class="h2">${{($ordenes_seller->count() > 0) ? number_format($ordenes_seller->sum('monto')) :
                            0}}</p>

                        <br>

                        <h4 style="text-align: center;">Ticket Promedio</h4>
                        <p class="h2">${{($ordenes_seller->count() > 0) ? number_format($ordenes_seller->sum('monto') /
                            $ordenes_seller->count()) : 0}}</p>

                        <br>

                        @if ($seller->pais == 'AR' || $seller->pais == 'BR' || $seller->pais == 'CL' || $seller->pais ==
                        'MX' || $seller->pais == 'CO')
                        <h4 style="text-align: center;"> <a style="text-decoration: none; color: black;"
                                href="{{route('publicaciones.update', $seller->id)}}">Publicaciones activas:</a></h4>
                        <p class="h2">{{$publicaciones_seller->count()}}</p>
                        <p style="font-weight: bold;">Premium:
                            {{isset($publicaciones_seller->countBy('tipo')["gold_pro"]) ?
                            $publicaciones_seller->countBy('tipo')["gold_pro"] : 0 }} - Clasica:
                            {{isset($publicaciones_seller->countBy('tipo')["gold_special"]) ?
                            $publicaciones_seller->countBy('tipo')["gold_special"] : 0}}</p>
                        @else
                        <h4 style="text-align: center;"> <a style="text-decoration: none; color: black;"
                                href="{{route('publicaciones.update', $seller->id)}}">Publicaciones activas:</a></h4>
                        <p class="h2">{{$publicaciones_seller->count()}}</p>
                        <p style="font-weight: bold;">Premium:
                            {{isset($publicaciones_seller->countBy('tipo')["gold_special"]) ?
                            $publicaciones_seller->countBy('tipo')["gold_special"] : 0}} - Clasica:
                            {{isset($publicaciones_seller->countBy('tipo')["bronze"]) ?
                            $publicaciones_seller->countBy('tipo')["bronze"] : 0}}</p>
                        @endif

                        <br>

                        <h4 style="text-align: center;">Conversión Total:</h4>
                        <p class="h2">{{($ordenes_seller->count() > 0) ?
                            number_format((($ordenes_seller->sum('cantidad') / (array_sum($visitas_totales))) * 100), 2)
                            : 0}}%</p>
                    </div>
                </div>

                <div class="col-8" style="text-align: center;">
                    <h4 style="text-align: center;">Canal de venta (transacciones)</h4>

                    @include('includes.charts.canales_transacciones')

                    <div class="d-flex" style="justify-content: space-between;">
                        <div>
                            <p>
                                @if (isset($ordenes_seller->groupBy('plataforma')["mshops"]))
                                MercadoShops:
                                {{($ordenes_seller->countBy('plataforma')["mshops"] > 0) ?
                                $ordenes_seller->countBy('plataforma')["mshops"] : 0}}
                                ({{($ordenes_seller->countBy('plataforma')["mshops"] > 0) ?
                                number_format((($ordenes_seller->countBy('plataforma')["mshops"] /
                                $ordenes_seller->count()) * 100), 2) : 0}}%)
                                @else
                                MercadoShops: 0
                                @endif
                            </p>
                            <img src="../../img/png/logo_mercadoshops.png" alt="logo_mercadoshops" class="logos">
                        </div>
                        <div>
                            <p>
                                @if ($ordenes_seller->count() > 0)
                                MercadoLibre:
                                {{($ordenes_seller->countBy('plataforma')["meli"] > 0) ?
                                $ordenes_seller->countBy('plataforma')["meli"] : 0}}
                                ({{($ordenes_seller->countBy('plataforma')["meli"] > 0) ?
                                number_format((($ordenes_seller->countBy('plataforma')["meli"] /
                                $ordenes_seller->count()) * 100), 2) : 0}}%)
                                @else
                                MercadoLibre: 0
                                @endif
                            </p>
                            <img src="../../img/png/logo_mercadolibre.png" alt="logo_mercadoshops" class="logos">
                        </div>

                    </div>
                    <br>
                    <h4 style="text-align: center;">Canal de venta (GMV)</h4>

                    @include('includes.charts.canales_dinero')

                    <div class="d-flex" style="justify-content: space-between;">
                        <div>
                            <p>
                                @if (isset($ordenes_seller->groupBy('plataforma')["mshops"]))
                                MercadoShops:
                                ${{(isset($ordenes_seller->groupBy('plataforma')["mshops"])) ?
                                number_format($ordenes_seller->groupBy('plataforma')["mshops"]->sum('monto'), 2) : 0}}
                                ({{($ordenes_seller->groupBy('plataforma')["mshops"]->sum('monto') > 0) ?
                                number_format((($ordenes_seller->groupBy('plataforma')["mshops"]->sum('monto') /
                                $ordenes_seller->sum('monto')) * 100), 2) : 0}}%)
                                @else
                                MercadoShops: 0
                                @endif
                            </p>
                            <img src="../../img/png/logo_mercadoshops.png" alt="logo_mercadoshops" class="logos">
                        </div>
                        <div>
                            <p>
                                @if ($ordenes_seller->count() > 0)
                                MercadoLibre:
                                ${{(isset($ordenes_seller->groupBy('plataforma')["meli"])) ?
                                number_format($ordenes_seller->groupBy('plataforma')["meli"]->sum('monto'), 2) : 0}}
                                ({{($ordenes_seller->groupBy('plataforma')["meli"]->sum('monto') > 0) ?
                                number_format((($ordenes_seller->groupBy('plataforma')["meli"]->sum('monto') /
                                $ordenes_seller->sum('monto')) * 100), 2) : 0}}%)
                                @else
                                MercadoLibre: 0
                                @endif
                            </p>
                            <img src="../../img/png/logo_mercadolibre.png" alt="logo_mercadoshops" class="logos">
                        </div>

                    </div>
                </div>
            </div>
            <hr>
            <div class="row d-flex pt-4"
                style="justify-content: space-evenly; align-items:center; justify-content:space-between; margin: 0 auto;">
                <h3 class="text-center mb-4">
                    Visitas Ultimos 60 dias: {{array_sum($visitas_totales)}}
                </h3>

                <div class="col- d-flex">
                    <canvas id="visitas_grafico" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('visitas_grafico').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [  
                    @php
                        foreach ($visitas["results"] as $visita) {
                            $fecha_format = explode('T', $visita["date"]);
                            $fecha = $fecha_format[0];
                            echo '"' . $fecha . '"' . ',';
                        }
                    @endphp
            ],
                datasets: [{
                    label: '',
                    data: [
                    @php
                        foreach ($visitas["results"] as $visita) {
                            $total = $visita["total"];
                            echo $total . ',';
                        }
                    @endphp
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                maintainAspectRatio: false,
            }
        });
</script>
@endsection