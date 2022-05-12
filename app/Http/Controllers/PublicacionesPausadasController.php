<?php

namespace App\Http\Controllers;

use App\Models\Publicaciones;
use App\Models\Seller;
use Illuminate\Http\Request;

class PublicacionesPausadasController extends Controller
{
    public function show($id) {
        $seller = Seller::find($id);

        $publicaciones_seller = Publicaciones::where('seller_id', $id)
            ->where('status', 'paused')
            ->get();

        return view('apanel.publicaciones_pausadas', compact("seller", "publicaciones_seller"));
    }
}
