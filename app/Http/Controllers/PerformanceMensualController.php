<?php

namespace App\Http\Controllers;

use App\Models\Ordenes;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerformanceMensualController extends Controller
{
    public function show ($id) {
        
        $seller = Seller::find($id);

        $ordenes_seller = Ordenes::where('seller_id', $id)
        ->orderBy("fecha")
        ->get();
        
        return view('apanel.performance_mensual', compact("id", "ordenes_seller", "seller"));
    }
}
