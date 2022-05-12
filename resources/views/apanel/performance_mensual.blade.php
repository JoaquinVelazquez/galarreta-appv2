@extends('layouts.dashboard')
@section('title', 'Performance Mensual - ' . $seller->nickname)
@section('contenido')
@php
$mes_actual = date("Y-m-01");

$fecha_actual = date("Y-m-d");

$mes_1_array_monto = array();
$mes_2_array_monto = array();
$mes_3_array_monto = array();
$mes_4_array_monto = array();
$mes_5_array_monto = array();
$mes_5_array_monto = array();
$mes_6_array_monto = array();
$mes_6_array_monto = array();
$mes_7_array_monto = array();
$mes_8_array_monto = array();
$mes_9_array_monto = array();
$mes_10_array_monto = array();
$mes_11_array_monto = array();
$mes_12_array_monto = array();

$mes_1_array_unidades = array();
$mes_2_array_unidades = array();
$mes_3_array_unidades = array();
$mes_4_array_unidades = array();
$mes_5_array_unidades = array();
$mes_5_array_unidades = array();
$mes_6_array_unidades = array();
$mes_6_array_unidades = array();
$mes_7_array_unidades = array();
$mes_8_array_unidades = array();
$mes_9_array_unidades = array();
$mes_10_array_unidades = array();
$mes_11_array_unidades = array();
$mes_12_array_unidades = array();

$mes_1_nombre = date("F", strtotime($mes_actual . "- 12 months"));
$mes_2_nombre = date("F", strtotime($mes_actual . "- 11 months"));
$mes_3_nombre = date("F", strtotime($mes_actual . "- 10 months"));
$mes_4_nombre = date("F", strtotime($mes_actual . "- 9 months"));
$mes_5_nombre = date("F", strtotime($mes_actual . "- 8 months"));
$mes_6_nombre = date("F", strtotime($mes_actual . "- 7 months"));
$mes_7_nombre = date("F", strtotime($mes_actual . "- 6 months"));
$mes_8_nombre = date("F", strtotime($mes_actual . "- 5 months"));
$mes_9_nombre = date("F", strtotime($mes_actual . "- 4 months"));
$mes_10_nombre = date("F", strtotime($mes_actual . "- 3 months"));
$mes_11_nombre = date("F", strtotime($mes_actual . "- 2 months"));
$mes_12_nombre = date("F", strtotime($mes_actual . "- 1 months"));
$mes_actual_nombre = date("F", strtotime($mes_actual));

$mes_anterior_monto_array = array();
$mes_actual_monto_array = array();

$mes_anterior_unidades_array = array();
$mes_actual_unidades_array = array();

foreach ($ordenes_seller as $data) {
if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 12 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 11 months")) {
    array_push($mes_1_array_monto, $data['monto']);
    array_push($mes_1_array_unidades, $data['cantidad']);
}

if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 11 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 10 months")) {
    array_push($mes_2_array_monto, $data['monto']);
    array_push($mes_2_array_unidades, $data['cantidad']);
}

if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 10 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 9 months")) {
    array_push($mes_3_array_monto, $data['monto']);
    array_push($mes_3_array_unidades, $data['cantidad']);
}

if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 9 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 8 months")) {
    array_push($mes_4_array_monto, $data['monto']);
    array_push($mes_4_array_unidades, $data['cantidad']);
}

if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 8 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 7 months")) {
    array_push($mes_5_array_monto, $data['monto']);
    array_push($mes_5_array_unidades, $data['cantidad']);
}

if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 7 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 6 months")) {
    array_push($mes_6_array_monto, $data['monto']);
    array_push($mes_6_array_unidades, $data['cantidad']);
}

if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 6 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 5 months")) {
    array_push($mes_7_array_monto, $data['monto']);
    array_push($mes_7_array_unidades, $data['cantidad']);
}

if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 5 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 4 months")) {
    array_push($mes_8_array_monto, $data['monto']);
    array_push($mes_8_array_unidades, $data['cantidad']);
}

if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 4 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 3 months")) {
    array_push($mes_9_array_monto, $data['monto']);
    array_push($mes_9_array_unidades, $data['cantidad']);
}

if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 3 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 2 months")) {
    array_push($mes_10_array_monto, $data['monto']);
    array_push($mes_10_array_unidades, $data['cantidad']);
}

if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 2 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 1 months")) {
    array_push($mes_11_array_monto, $data['monto']);
    array_push($mes_11_array_unidades, $data['cantidad']);
}

if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 1 months") && strtotime($data["fecha"]) <= strtotime($mes_actual)) {
    array_push($mes_12_array_monto, $data['monto']);
    array_push($mes_12_array_unidades, $data['cantidad']);
}

if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 1 months") && strtotime($data["fecha"]) <= strtotime($fecha_actual . "- 1 months" . "- 1 day")) {
    array_push($mes_anterior_monto_array, $data['monto']);
    array_push($mes_anterior_unidades_array, $data['cantidad']);
}

if (strtotime($data["fecha"]) >= strtotime($mes_actual) && strtotime($data["fecha"]) <= strtotime($fecha_actual . "- 1 day")) {
    array_push($mes_actual_monto_array, $data['monto']);
    array_push($mes_actual_unidades_array, $data['cantidad']);
}
}

$user_id = $seller->id;
$access_token = $seller->access_token;

$visitas_mtd_array = array();
$i = 0;

do {
    //Establecer fechas
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $horas = time();
    $hora_actual = date('H:i:s', time());
    $fecha_actual = date("Y-m-d");
    $mes_actual = date("Y-m-01");
    $fecha_inicial = date("Y-m-d", strtotime($mes_actual . "- 12 months" . "+" . $i . " months"));
    $fecha_inicial_siguiente = date("Y-m-d", strtotime($fecha_inicial . "+1 month"));

    $DATE_FROM = $fecha_inicial . "T00:00:00.000-00:00";
    $DATE_FROM_SIGUIENTE = $fecha_inicial_siguiente . "T00:00:00.000-00:00";
    $DATE_TO = $fecha_actual . "T00:00:00.000-00:00";

    ////$informacion
    $authorization = array("Authorization: Bearer " . $access_token);
    // create curl resource
    $ch = curl_init();
    //Apí Link
    $url = "https://api.mercadolibre.com/users/" . $user_id . "/items_visits?date_from=" . $DATE_FROM . "&date_to=" . $DATE_FROM_SIGUIENTE;
    // set url
    curl_setopt($ch, CURLOPT_URL, $url);
    //Bearer Token to Header
    curl_setopt($ch, CURLOPT_HTTPHEADER, $authorization);
    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // $output contains the output string
    $output = curl_exec($ch);
    // close curl resource to free up system resources
    curl_close($ch);
    //DD info
    $visitas_mtd = (json_decode($output, true));

    $i += 1;
    array_push($visitas_mtd_array, $visitas_mtd);
} while ($i < 14);

$visitas_por_mes_array = array();

$visitas_por_mes = array(
    "user_id" => "NULL",
    "fecha" => "NULL",
    "visitas" => "NULL",
);

foreach ($visitas_mtd_array as $data) {

    if (!isset($data["error"])) {

        if (isset($data["date_from"])) {
            $fecha_api = $data["date_from"];
            $fecha = explode("T", $fecha_api);
        } else {
            $fecha_real = "NULL";
        }

        $visitas_por_mes = array(
            "user_id" => $data["user_id"],
            "fecha" => $fecha[0],
            "visitas" => $data["total_visits"],
        );

        array_push($visitas_por_mes_array, $visitas_por_mes);
    }
}

$mes_1_visitas_array = array();
$mes_2_visitas_array = array();
$mes_3_visitas_array = array();
$mes_4_visitas_array = array();
$mes_5_visitas_array = array();
$mes_6_visitas_array = array();
$mes_7_visitas_array = array();
$mes_8_visitas_array = array();
$mes_9_visitas_array = array();
$mes_10_visitas_array = array();
$mes_11_visitas_array = array();
$mes_12_visitas_array = array();

foreach ($visitas_por_mes_array as $data) {

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 12 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 11 months")) {
        array_push($mes_1_visitas_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 11 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 10 months")) {
        array_push($mes_2_visitas_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 10 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 9 months")) {
        array_push($mes_3_visitas_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 9 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 8 months")) {
        array_push($mes_4_visitas_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 8 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 7 months")) {
        array_push($mes_5_visitas_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 7 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 6 months")) {
        array_push($mes_6_visitas_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 6 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 5 months")) {
        array_push($mes_7_visitas_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 5 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 4 months")) {
        array_push($mes_8_visitas_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 4 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 3 months")) {
        array_push($mes_9_visitas_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 3 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 2 months")) {
        array_push($mes_10_visitas_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 2 months") && strtotime($data["fecha"]) < strtotime($mes_actual . "- 1 months")) {
        array_push($mes_11_visitas_array, $data);
    }

    if (strtotime($data["fecha"]) >= strtotime($mes_actual . "- 1 months") && strtotime($data["fecha"]) < strtotime($mes_actual)) {
        array_push($mes_12_visitas_array, $data);
    }
}

$mes_anterior_visitas_array = array();
$mes_actual_visitas_array = array();

//Establecer fechas
date_default_timezone_set('America/Argentina/Buenos_Aires');
$DATE_FROM_MTD = date("Y-m-01", strtotime("- 1 months"));
$DATE_TO_MTD = date("Y-m-d", strtotime("- 1 months"));

$visitas_mtd_anterior_array = array();
$visitas_mtd_actual_array = array();

////$informacion
$authorization = array("Authorization: Bearer " . $access_token);
// create curl resource
$ch = curl_init();
//Apí Link
$url = "https://api.mercadolibre.com/users/" . $user_id . "/items_visits?date_from=" . $DATE_FROM_MTD . "&date_to=" . $DATE_TO_MTD;
// set url
curl_setopt($ch, CURLOPT_URL, $url);
//Bearer Token to Header
curl_setopt($ch, CURLOPT_HTTPHEADER, $authorization);
//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $output contains the output string
$output = curl_exec($ch);
// close curl resource to free up system resources
curl_close($ch);
//DD info
$visitas_mtd_anterior = (json_decode($output, true));
array_push($visitas_mtd_anterior_array, $visitas_mtd_anterior);

foreach ($visitas_mtd_anterior_array as $data) {

    if (!isset($data["error"])) {

        if (isset($data["date_from"])) {
            $fecha_api = $data["date_from"];
            $fecha = explode("T", $fecha_api);
        } else {
            $fecha_real = "NULL";
        }

        $visitas_por_mes = array(
            "user_id" => $data["user_id"],
            "fecha" => $fecha[0],
            "visitas" => $data["total_visits"],
        );

        array_push($mes_anterior_visitas_array, $visitas_por_mes);
    }
}

//Establecer fechas
date_default_timezone_set('America/Argentina/Buenos_Aires');
$DATE_FROM_MTD = date("Y-m-01");
$DATE_TO_MTD = date("Y-m-d");

$visitas_mtd_anterior_array = array();

////$informacion
$authorization = array("Authorization: Bearer " . $access_token);
// create curl resource
$ch = curl_init();
//Apí Link
$url = "https://api.mercadolibre.com/users/" . $user_id . "/items_visits?date_from=" . $DATE_FROM_MTD . "&date_to=" . $DATE_TO_MTD;
// set url
curl_setopt($ch, CURLOPT_URL, $url);
//Bearer Token to Header
curl_setopt($ch, CURLOPT_HTTPHEADER, $authorization);
//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $output contains the output string
$output = curl_exec($ch);
// close curl resource to free up system resources
curl_close($ch);
//DD info
$visitas_mtd_actual = (json_decode($output, true));
array_push($visitas_mtd_actual_array, $visitas_mtd_actual);

foreach ($visitas_mtd_actual_array as $data) {

    if (!isset($data["error"])) {

        if (isset($data["date_from"])) {
            $fecha_api = $data["date_from"];
            $fecha = explode("T", $fecha_api);
        } else {
            $fecha_real = "NULL";
        }

        $visitas_por_mes = array(
            "user_id" => $data["user_id"],
            "fecha" => $fecha[0],
            "visitas" => $data["total_visits"],
        );

        array_push($mes_actual_visitas_array, $visitas_por_mes);
    }
}
@endphp
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" id="informacion">
    <h2 class="h2">Performance del usuario: <a href="#" style="text-decoration: none; color: black;">{{$seller->nickname}} ({{$seller->id}})</a></h2>
</div>

<div class="container" style="margin: 10px; padding: 0;">
    <div class="row">
        <div class="container contenedor-dashboard"
            style="margin: 10px; padding: 0; justify-content:space-between; align-items: center;">
            <div class="row d-flex pt-4" style="align-items:center; justify-content:space-between;">
                <h4>Performance Mensual</h4>

                <div class="d-flex" style="flex-direction:row; align-items:baseline;">
                    <div>
                        @include('includes.charts.ventas_facturacion')
                    </div>

                    <div>
                        @include('includes.charts.ventas_facturacion_mtd')
                    </div>
                </div>

                <div class="d-flex" style="flex-direction:row; align-items:baseline;">
                    <table class="table table-bordered" style="width: 1000px;">
                        <thead>
                            <tr>
                                <th> </th>
                                <th><?php echo substr($mes_1_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_2_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_3_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_4_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_5_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_6_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_7_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_8_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_9_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_10_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_11_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_12_nombre, 0, 3); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Ventas</th>
                                <th>
                                    {{count($mes_1_array_unidades)}}
                                </th>
                                <th>
                                    {{count($mes_2_array_unidades)}}
                                </th>
                                <th>
                                    {{count($mes_3_array_unidades)}}
                                </th>
                                <th>
                                    {{count($mes_4_array_unidades)}}
                                </th>
                                <th>
                                    {{count($mes_5_array_unidades)}}
                                </th>
                                <th>
                                    {{count($mes_6_array_unidades)}}
                                </th>
                                <th>
                                    {{count($mes_7_array_unidades)}}
                                </th>
                                <th>
                                    {{count($mes_8_array_unidades)}}
                                </th>
                                <th>
                                    {{count($mes_9_array_unidades)}}
                                </th>
                                <th>
                                    {{count($mes_10_array_unidades)}}
                                </th>
                                <th>
                                    {{count($mes_11_array_unidades)}}
                                </th>
                                <th>
                                    {{count($mes_12_array_unidades)}}
                                </th>
                            </tr>
                            <tr>
                                <th scope="row">Facturacion</th>
                                <th>$
                                    {{number_format((array_sum($mes_1_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_2_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_3_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_4_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_5_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_6_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_7_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_8_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_9_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_10_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_11_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_12_array_monto) / 10000), 2)}}
                                </th>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered" style="width: 300px;">
                        <thead>
                            <tr>
                                <th> </th>
                                <th>
                                    <?php echo substr($mes_12_nombre, 0, 3); ?>
                                </th>
                                <th>
                                    <?php echo substr($mes_actual_nombre, 0, 3); ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"> </th>
                                <th>
                                    ${{number_format((array_sum($mes_anterior_monto_array) / 10000), 2)}}
                                </th>
                                <th>
                                    ${{number_format((array_sum($mes_actual_monto_array) / 10000), 2)}}
                                </th>
                            </tr>
                            <tr>
                                <th scope="row"> </th>
                                <th>
                                    {{count($mes_anterior_unidades_array)}}
                                </th>
                                <th>
                                    {{count($mes_actual_unidades_array)}}
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr>

                <div class="d-flex" style="flex-direction:row; align-items:baseline;">
                    <div>
                        @include('includes.charts.unidades_facturacion')
                    </div>

                    <div>
                        @include('includes.charts.unidades_facturacion_mtd')
                    </div>
                </div>

                <div class="d-flex" style="flex-direction:row; align-items:baseline;">
                    <table class="table table-bordered" style="width: 1000px;">
                        <thead>
                            <tr>
                                <th> </th>
                                <th><?php echo substr($mes_1_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_2_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_3_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_4_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_5_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_6_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_7_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_8_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_9_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_10_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_11_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_12_nombre, 0, 3); ?></th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Unidades</th>
                                <th>
                                    {{array_sum($mes_1_array_unidades)}}
                                </th>
                                <th>
                                    {{array_sum($mes_2_array_unidades)}}
                                </th>
                                <th>
                                    {{array_sum($mes_3_array_unidades)}}
                                </th>
                                <th>
                                    {{array_sum($mes_4_array_unidades)}}
                                </th>
                                <th>
                                    {{array_sum($mes_5_array_unidades)}}
                                </th>
                                <th>
                                    {{array_sum($mes_6_array_unidades)}}
                                </th>
                                <th>
                                    {{array_sum($mes_7_array_unidades)}}
                                </th>
                                <th>
                                    {{array_sum($mes_8_array_unidades)}}
                                </th>
                                <th>
                                    {{array_sum($mes_9_array_unidades)}}
                                </th>
                                <th>
                                    {{array_sum($mes_10_array_unidades)}}
                                </th>
                                <th>
                                    {{array_sum($mes_11_array_unidades)}}
                                </th>
                                <th>
                                    {{array_sum($mes_12_array_unidades)}}
                                </th>
                            </tr>
                            <tr>
                                <th scope="row">Facturacion</th>
                                <th>$
                                    {{number_format((array_sum($mes_1_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_2_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_3_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_4_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_5_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_6_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_7_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_8_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_9_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_10_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_11_array_monto) / 10000), 2)}}
                                </th>
                                <th>$
                                    {{number_format((array_sum($mes_12_array_monto) / 10000), 2)}}
                                </th>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered" style="width: 300px;">
                        <thead>
                            <tr>
                                <th> </th>
                                <th>
                                    <?php echo substr($mes_12_nombre, 0, 3); ?>
                                </th>
                                <th>
                                    <?php echo substr($mes_actual_nombre, 0, 3); ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"> </th>
                                <th>
                                    ${{number_format((array_sum($mes_anterior_monto_array) / 10000), 2)}}
                                </th>
                                <th>
                                    ${{number_format((array_sum($mes_actual_monto_array) / 10000), 2)}}
                                </th>
                            </tr>
                            <tr>
                                <th scope="row"> </th>
                                <th>
                                    {{array_sum($mes_anterior_unidades_array)}}
                                </th>
                                <th>
                                    {{array_sum($mes_actual_unidades_array)}}
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr>

                <div class="d-flex" style="flex-direction:row; align-items:baseline;">
                    <div>
                        @include('includes.charts.visitas_preguntas')
                    </div>

                    <div>
                        @include('includes.charts.visitas_preguntas_mtd')
                    </div>
                </div>

                <div class="d-flex" style="flex-direction:row; align-items:baseline;">
                    <table class="table table-bordered" style="width: 1000px;">
                        <thead>
                            <tr>
                                <th> </th>
                                <th><?php echo substr($mes_1_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_2_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_3_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_4_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_5_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_6_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_7_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_8_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_9_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_10_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_11_nombre, 0, 3); ?></th>
                                <th><?php echo substr($mes_12_nombre, 0, 3); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Visitas</th>
                                <th>
                                    <?php
                                    if (isset($mes_1_visitas_array[0]["visitas"])) {
                                        echo $mes_1_visitas_array[0]["visitas"];
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    if (isset($mes_2_visitas_array[0]["visitas"])) {
                                        echo $mes_2_visitas_array[0]["visitas"];
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    if (isset($mes_3_visitas_array[0]["visitas"])) {
                                        echo $mes_3_visitas_array[0]["visitas"];
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    if (isset($mes_4_visitas_array[0]["visitas"])) {
                                        echo $mes_4_visitas_array[0]["visitas"];
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    if (isset($mes_5_visitas_array[0]["visitas"])) {
                                        echo $mes_5_visitas_array[0]["visitas"];
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    if (isset($mes_6_visitas_array[0]["visitas"])) {
                                        echo $mes_6_visitas_array[0]["visitas"];
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    if (isset($mes_7_visitas_array[0]["visitas"])) {
                                        echo $mes_7_visitas_array[0]["visitas"];
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    if (isset($mes_8_visitas_array[0]["visitas"])) {
                                        echo $mes_8_visitas_array[0]["visitas"];
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    if (isset($mes_9_visitas_array[0]["visitas"])) {
                                        echo $mes_9_visitas_array[0]["visitas"];
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    if (isset($mes_10_visitas_array[0]["visitas"])) {
                                        echo $mes_10_visitas_array[0]["visitas"];
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    if (isset($mes_11_visitas_array[0]["visitas"])) {
                                        echo $mes_11_visitas_array[0]["visitas"];
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    if (isset($mes_12_visitas_array[0]["visitas"])) {
                                        echo $mes_12_visitas_array[0]["visitas"];
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </th>
                            </tr>
                            <tr>
                                <th scope="row">Preguntas</th>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered" style="width: 300px;">
                        <thead>
                            <tr>
                                <th> </th>
                                <th>
                                    <?php echo substr($mes_12_nombre, 0, 3); ?>
                                </th>
                                <th>
                                    <?php echo substr($mes_actual_nombre, 0, 3); ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"> </th>
                                <th>
                                    <?php
                                    if (isset($mes_anterior_visitas_array[0]["visitas"])) {
                                        echo $mes_anterior_visitas_array[0]["visitas"];
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    if (isset($mes_actual_visitas_array[0]["visitas"])) {
                                        echo $mes_actual_visitas_array[0]["visitas"];
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </th>
                            </tr>
                            <tr>
                                <th scope="row"> </th>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection