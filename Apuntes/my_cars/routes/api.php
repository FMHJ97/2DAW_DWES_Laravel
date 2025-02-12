<?php

use App\Http\Controllers\APICarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/*
Permite crear las rutas de los métodos de un controlador.
Se utiliza el middleware 'auth:basic' para proteger las rutas contra accesos no autorizados.
*/
Route::apiResource('cars', APICarController::class)->middleware('auth:basic');
