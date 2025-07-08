<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('empresas', App\Http\Controllers\EmpresaController::class);
Route::apiResource('productos', App\Http\Controllers\ProductoController::class);
Route::apiResource('posiciones', App\Http\Controllers\PosicionController::class);
