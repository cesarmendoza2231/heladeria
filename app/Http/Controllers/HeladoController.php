<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HeladoController extends Controller
{
    // Datos de ejemplo (luego se reemplazarán con base de datos)
    private $helados = [
        ['id' => 1, 'nombre' => 'Cono Clásico', 'precio' => 3.50, 'imagen' => 'cono-clasico.jpg', 'descripcion' => 'Delicioso cono con dos bolas de helado y topping a elección'],
        ['id' => 2, 'nombre' => 'Sundae de Chocolate', 'precio' => 4.50, 'imagen' => 'sundae-chocolate.jpg', 'descripcion' => 'Helado de vainilla con salsa de chocolate caliente y crema batida'],
        ['id' => 3, 'nombre' => 'Banana Split', 'precio' => 5.75, 'imagen' => 'banana-split.jpg', 'descripcion' => 'Plátano partido con tres bolas de helado, salsa de chocolate, fresa y piña'],
        ['id' => 4, 'nombre' => 'Helado en Copa', 'precio' => 4.00, 'imagen' => 'copa-helado.jpg', 'descripcion' => 'Dos bolas de helado en copa de cristal con toppings'],
    ];
    
    private $sabores = [
        ['id' => 1, 'nombre' => 'Vainilla', 'disponible' => true, 'popularidad' => 5],
        ['id' => 2, 'nombre' => 'Chocolate', 'disponible' => true, 'popularidad' => 5],
        ['id' => 3, 'nombre' => 'Fresa', 'disponible' => true, 'popularidad' => 4],
        ['id' => 4, 'nombre' => 'Menta', 'disponible' => false, 'popularidad' => 3],
        ['id' => 5, 'nombre' => 'Cookies & Cream', 'disponible' => true, 'popularidad' => 5],
        ['id' => 6, 'nombre' => 'Dulce de Leche', 'disponible' => true, 'popularidad' => 4],
        ['id' => 7, 'nombre' => 'Limón', 'disponible' => true, 'popularidad' => 3],
        ['id' => 8, 'nombre' => 'Mango', 'disponible' => true, 'popularidad' => 4],
    ];
    
    private $promociones = [
        ['id' => 1, 'nombre' => 'Martes de Helado', 'descripcion' => '2x1 en todos los conos los martes', 'valido_hasta' => '2023-12-31'],
        ['id' => 2, 'nombre' => 'Happy Hour', 'descripcion' => 'Descuento del 20% de 4pm a 6pm', 'valido_hasta' => '2023-12-31'],
        ['id' => 3, 'nombre' => 'Combo Familiar', 'descripcion' => '4 helados grandes por el precio de 3', 'valido_hasta' => '2023-12-31'],
    ];

    public function inicio()
    {
        $destacados = array_slice($this->helados, 0, 3);
        return view('inicio', compact('destacados'));
    }

    public function menu()
    {
        return view('menu', ['helados' => $this->helados]);
    }

    public function sabores()
    {
        $saboresDisponibles = array_filter($this->sabores, function($sabor) {
            return $sabor['disponible'];
        });
        
        $saboresNoDisponibles = array_filter($this->sabores, function($sabor) {
            return !$sabor['disponible'];
        });
        
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
        return view('promociones', ['promociones' => $this->promociones]);
    }
}