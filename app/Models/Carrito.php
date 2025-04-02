<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $fillable = ['user_id', 'helado_id', 'cantidad', 'precio_unitario'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function helado()
    {
        return $this->belongsTo(Helado::class);
    }
}
