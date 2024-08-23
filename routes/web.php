<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [EmpleadoController::class, 'index'])->name('empleados.index');
Route::resource('empleados', EmpleadoController::class);
Route::patch('empleados/{id}/aumentarSalario', [EmpleadoController::class, 'aumentarSalario'])->name('empleados.aumentarSalario');
