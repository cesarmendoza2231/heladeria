<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Compra;

/**
 * @method \App\Models\User user() Obtiene el usuario autenticado
 */
class PerfilController extends Controller
{
    public function edit()
    {/** @var \App\Models\User $user */
    $user = Auth::user();
    
    $compras = $user->compras()
                   ->with(['helados' => function($query) {
                       $query->select('id', 'nombre', 'imagen');
                   }])
                   ->orderBy('created_at', 'desc')
                   ->paginate(5, ['id', 'total', 'estado', 'created_at']);
                   
    return view('auth.perfil', compact('user', 'compras'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        // Opción 1 (recomendada)
        $user->update($request->only(['name', 'telefono', 'direccion']));
        
        // Opción 2 (alternativa)
        // $user->name = $request->name;
        // $user->telefono = $request->telefono;
        // $user->direccion = $request->direccion;
        // $user->save();

        return redirect()->route('perfil.edit')
               ->with('success', 'Perfil actualizado correctamente!');
    }
}