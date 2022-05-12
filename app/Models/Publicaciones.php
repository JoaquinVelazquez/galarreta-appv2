<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nombre',
        'marca',
        'precio',
        'imagen',
        'tipo',
        'full',
        'flex',
        'categoria_id',
        'categoria_principal_id',
        'status',
        'pais',
        'seller_id',
        'link',
        'visitas_30_dias',
        'created_at',
        'updated_at',
];
}
