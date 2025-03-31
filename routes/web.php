<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeladoController;

/* 
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HeladoController::class, 'inicio'])->name('inicio');
Route::get('/menu', [HeladoController::class, 'menu'])->name('menu');
Route::get('/sabores', [HeladoController::class, 'sabores'])->name('sabores');
Route::get('/contacto', [HeladoController::class, 'contacto'])->name('contacto');
Route::get('/promociones', [HeladoController::class, 'promociones'])->name('promociones');
Route::post('/contacto', [HeladoController::class, 'enviarContacto'])->name('enviar.contacto');