<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeladoController;
use App\Http\Controllers\AuthController; 
use App\Http\Kernel;

// Página principal (login)
Route::get('/', [AuthController::class, 'showLogin'])->name('login');

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
});