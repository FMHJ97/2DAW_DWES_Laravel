<?php

use App\Http\Controllers\frutasController;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('inicio'); // Nombre de la ruta.

// Ruta que llama al controlador frutasController.
Route::get('/frutas', [frutasController::class, 'index'])
    ->name('frutas');
// Se puede acceder a la ruta mediante la URL: */fruteria/frutas
Route::prefix('fruteria')->group(function () {
    // POST
    Route::post('/frutas', [frutasController::class, 'index'])
        ->name('postfrutas');
    Route::post('/frutas', [frutasController::class, 'store'])
    ->name('store');
    // GET
    Route::get('/frutas', [frutasController::class, 'index'])
        ->name('frutas');
    Route::get('/naranjas/{pais?}', [frutasController::class, 'naranjas'])
        ->name('naranjas');
    Route::get('/peras', [frutasController::class, 'peras'])->name('peras');
});

/*
Route::get('/naranjas/{pais?}', [frutasController::class, 'naranjas'])
    ->name('naranjas');
Route::get('/peras', [frutasController::class, 'peras'])->name('peras');
*/

// Vamos a cargar la vista child.
Route::view('child', 'child');

// Ruta que recibe un parámetro de la URL y lo muestra en pantalla.
Route::get('contacto/{nombre?}/{edad?}',
    function ($name = "Invitado", $edad = 18) {
    //return "Soy la página de contacto de $name";

    // Se envía el parámetro a la vista contacto.
    return view('contact.contacto', ['name' => $name, 'edad' => $edad,
        'frutas' => ['naranja', 'pera', 'sandía', 'fresa', 'melon']]);

    // Se envía el parámetro a la vista contacto.
    // return view('contacto')->with('name', $name)->with('edad', $edad);

    // Alternativa para enviar el parámetro a la vista.
    // return view('contacto', compact('name', 'edad'));

})->name('contacto')->where(['nombre' => '[A-Za-z]+' , 'edad' => '[0-9]+'])
    ->middleware('mayor.edad:25'); // Se aplica el middleware mayor.edad.

// Ruta que no necesita el token de CSRF, es decir, no necesita protección
// contra ataques de falsificación de solicitudes entre sitios.
Route::post('contacto', function () {
    return "Soy la página de contacto por POST";
})->withoutMiddleware([ValidateCsrfToken::class]);

// Vamos a cargar la vista componente.
Route::view('componente','vista_componente');