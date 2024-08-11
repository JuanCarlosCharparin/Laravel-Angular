<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

// Ruta para obtener todos los clientes (GET)
Route::get('/clientes', [ClienteController::class, 'index']);

// Ruta para crear un nuevo cliente (POST)
Route::post('/clientes', [ClienteController::class, 'store']);

// Ruta para obtener un cliente específico (GET)
Route::get('/clientes/{cliente}', [ClienteController::class, 'show']);

// Ruta para actualizar un cliente específico (PUT/PATCH)
Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');

// Ruta para eliminar un cliente específico (DELETE)
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy']);


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
