<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth; // Añade esta línea
use App\Models\Helado;
use App\Models\Sabor;
use App\Models\Promocion;

class HeladoController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $response = $next($request);
            
            return $response->withHeaders([
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => 'Sat, 01 Jan 2000 00:00:00 GMT'
            ]);
        });
    }

    public function inicio()
    {
        $destacados = Helado::where('destacado', true)
                          ->where('stock', '>', 0)
                          ->take(3)
                          ->get();
        
        return view('inicio', compact('destacados'));
    }

    public function menu()
    {
        $helados = Helado::where('stock', '>', 0)->get();
    $carrito = session()->get('carrito', []);
    $totalItems = count($carrito);
    
    return view('menu', compact('helados', 'totalItems'));}

    public function sabores()
    {
        $saboresDisponibles = Sabor::where('disponible', true)
                                 ->orderBy('popularidad', 'desc')
                                 ->get();
        
        $saboresNoDisponibles = Sabor::where('disponible', false)
                                   ->orderBy('nombre')
                                   ->get();
        
        return view('sabores', compact('saboresDisponibles', 'saboresNoDisponibles'));
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function enviarContacto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|min:3',
            'email' => 'required|email',
            'mensaje' => 'required|min:10',
        ]);
        
        if ($validator->fails()) {
            return redirect()->route('contacto')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        return redirect()->route('contacto')
                    ->with('success', 'Gracias por tu mensaje. Nos pondremos en contacto contigo pronto.');
    }

    public function promociones()
{
    // Retorna una colección vacía temporalmente
    $promociones = collect([]);
    
    return view('promociones', compact('promociones'));
}
}