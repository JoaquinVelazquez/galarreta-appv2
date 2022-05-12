<?php

namespace App\Http\Controllers;

use App\Models\Ordenes;
use App\Models\Publicaciones;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvolucionCanalController extends Controller
{
    public function show($id) {
        $seller = Seller::find($id);

        $ordenes_seller = Ordenes::select(
            DB::raw("plataforma as plataforma"),
            DB::raw("fecha as fecha"),
            DB::raw("count(order_id) as ordenes"),
            DB::raw("sum(monto) as monto"),
            DB::raw("sum(cantidad) as unidades"),
            //DB::raw("(DATE_FORMAT(fecha, '%m-%Y')) as month_year"),
        )
        ->where('seller_id', $id)
        ->groupBy("fecha")
        ->orderByDesc("fecha")
        ->groupBy('plataforma')
        ->get();
        
        return view('apanel.evolucion_canal', compact("id", "ordenes_seller", "seller"));
    }
}
