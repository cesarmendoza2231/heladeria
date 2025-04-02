<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comprobante;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ReciboController extends Controller
{
    public function generarRecibo(Request $request)
    {
        // Verificar autenticación si es necesario
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para pagar');
        }

        $carrito = session()->get('carrito', []);
        
        if(empty($carrito)) {
            return redirect()->route('carrito')->with('error', 'El carrito está vacío');
        }

        // Calcular total
        $total = array_reduce($carrito, function($carry, $item) {
            return $carry + ($item['precio'] * $item['cantidad']);
        }, 0);

        // Crear comprobante
        $comprobante = Comprobante::create([
            'numero_recibo' => 'REC-' . strtoupper(uniqid()),
            'total' => $total,
            'items' => json_encode($carrito),
            'user_id' => Auth::id()
        ]);

        // Generar PDF
        $pdf = Pdf::loadView('recibo', [
            'carrito' => $carrito,
            'total' => $total,
            'fecha' => now()->format('d/m/Y H:i:s'),
            'numero_recibo' => $comprobante->numero_recibo
        ]);

        // Limpiar carrito
        session()->forget('carrito');

        // Mostrar PDF en navegador
        return $pdf->stream("recibo-{$comprobante->numero_recibo}.pdf");
    }
}