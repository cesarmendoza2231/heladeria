<?php

namespace App\Http\Controllers;

use App\Models\Helado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function index()
    {
        $carrito = session()->get('carrito', []);
        $total = 0;

        // Calcular total
        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        return view('carrito', [ // Cambiado a 'carrito' en lugar de 'carrito.index'
            'carrito' => $carrito,
            'total' => $total,
            'totalItems' => count($carrito)
        ]);
    }

    public function agregar(Request $request, $id)
    {
        $helado = Helado::findOrFail($id);
        
        // Validar stock
        if ($helado->stock < ($request->cantidad ?? 1)) {
            return back()->with('error', 'Stock insuficiente');
        }

        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad'] += $request->cantidad ?? 1;
        } else {
            $carrito[$id] = [
                "nombre" => $helado->nombre,
                "precio" => $helado->precio,
                "cantidad" => $request->cantidad ?? 1,
                "imagen" => $helado->imagen
            ];
        }

        session()->put('carrito', $carrito);
        return redirect()->route('menu')->with('success', '¡Helado añadido!');
    }

    public function eliminar($id)
    {
        $carrito = session()->get('carrito');

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return back()->with('success', 'Helado removido');
    }
}