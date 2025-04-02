<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrito;
use App\Models\Compra;

class CheckoutController extends Controller
{
    public function show()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        $items = $user->carritos()->with('helado')->get();
        
        if($items->isEmpty()) {
            return redirect()->route('carrito.index')
                   ->with('error', 'Tu carrito está vacío');
        }

        $total = $items->sum(function($item) {
            return $item->precio_unitario * $item->cantidad;
        });

        return view('checkout', compact('items', 'total'));
    }

    public function process(Request $request)
    {
        // Implementaremos esto después
        return 'Procesando pago...';
    }
}