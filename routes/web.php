<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeladoController;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\PerfilController; 
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CheckoutController;
use App\Http\Kernel;
use App\Http\Controllers\ReciboController;

// Página principal (login)
Route::get('/', [AuthController::class, 'showLogin'])->name('login');

//Route::post('/generar-recibo', [ReciboController::class, 'generarRecibo'])->name('recibo.generar');
Route::post('/generar-recibo', [ReciboController::class, 'generarRecibo'])
     ->name('recibo.generar')
     ->middleware('auth');
// Autenticación
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas
Route::middleware(['auth'])->group(function () {
    Route::get('/inicio', [HeladoController::class, 'inicio'])->name('inicio');
    Route::get('/menu', [HeladoController::class, 'menu'])->name('menu');
    Route::get('/sabores', [HeladoController::class, 'sabores'])->name('sabores');
    Route::get('/contacto', [HeladoController::class, 'contacto'])->name('contacto');
    Route::get('/promociones', [HeladoController::class, 'promociones'])->name('promociones');
    Route::post('/contacto', [HeladoController::class, 'enviarContacto'])->name('enviar.contacto');
    Route::get('/perfil', [PerfilController::class, 'edit'])->name('perfil.edit');
    Route::post('/perfil', [PerfilController::class, 'update'])->name('perfil.update');
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito');
    Route::post('/carrito/agregar/{helado}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::delete('/carrito/eliminar/{helado}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    Route::get('checkout', [CheckoutController::class, 'show'])->name('checkout');
    Route::post('/checkout/procesar', [CheckoutController::class, 'process'])->name('checkout.procesar');
});





// Rutas del carrito
/*Route::get('/carrito', [HeladoController::class, 'mostrarCarrito'])->name('carrito');
Route::post('/agregar-carrito/{id}', [HeladoController::class, 'agregarAlCarrito'])->name('agregar.carrito');
Route::patch('/actualizar-carrito', [HeladoController::class, 'actualizarCarrito'])->name('actualizar.carrito');
Route::delete('/eliminar-carrito/{id}', [HeladoController::class, 'eliminarDelCarrito'])->name('eliminar.carrito');
Route::post('/vaciar-carrito', [HeladoController::class, 'vaciarCarrito'])->name('vaciar.carrito');*/