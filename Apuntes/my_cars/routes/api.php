<?php

use App\Http\Controllers\APICarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/*
Permite crear las rutas de los métodos de un controlador.
*/
Route::apiResource('cars', APICarController::class);
