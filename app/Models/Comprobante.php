<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    protected $fillable = [
        'numero_recibo',
        'total',
        'items',
        'user_id'
    ];
    
    // Opcional: Si quieres que los items se automaticen como array
    protected $casts = [
        'items' => 'array'
    ];
}
