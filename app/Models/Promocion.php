<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table = 'promociones'; // Forzar nombre de tabla en español
    
    protected $fillable = [
        'nombre',
        'descripcion',
        'codigo',
        'valido_desde',
        'valido_hasta',
        'activa'
    ];
    
    protected $dates = ['valido_desde', 'valido_hasta'];
}
