<?php

namespace App\Http\Controllers;

use App\Models\Ordenes;
use App\Models\Publicaciones;
use App\Models\Seller;
use Illuminate\Http\Request;

class RankingConversionController extends Controller
{
    public function show($id)
    {
        //Establecer fechas
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $horas = time();
        $hora_actual = date('H', time());
        $fecha_actual = date("y-m-d");
        $fecha_inicial = date("y-m-d", strtotime($fecha_actual . "- 30 day"));
        $DATE_FROM = "20" . $fecha_inicial . "T00:00:00.000-00:00";
        $DATE_TO = "20" . $fecha_actual . "T" . $hora_actual . ":00:00.000-00:00";

        $seller = Seller::find($id);

        $ordenes_seller = Publicaciones::join('ordenes', 'publicaciones.id', "=", 'ordenes.producto_id')
            ->where('publicaciones.seller_id', $id)
            ->whereBetween('ordenes.fecha', [$DATE_FROM, $DATE_TO])
            ->get();
        $divisa = Ordenes::where('seller_id', $id)->first();

        return view ('apanel.ranking_conversion', compact('seller', 'ordenes_seller'));
    }
}
