<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Compra extends Model
{
    protected $fillable = ['user_id', 'total', 'estado']; // Ajusta según tu estructura
    
    /**
     * Relación con el usuario
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Relación con los helados (si es una relación many-to-many)
     * @return BelongsToMany
     */
    public function helados()
    {
        return $this->belongsToMany(Helado::class)
                   ->withPivot('cantidad', 'precio_unitario');
    }
}
