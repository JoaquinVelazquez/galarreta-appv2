<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenes extends Model
{
    use HasFactory;
    protected $fillable = [
        'seller_id',
        'order_id',
        'producto_id',
        'shipping_id',
        'producto',
        'cantidad',
        'monto',
        'fecha',
        'plataforma',
        'divisa',
        'created_at',
        'updated_at',
];
}
