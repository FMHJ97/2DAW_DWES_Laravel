<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'getHome'])->name('inicio')->middleware('guest');

Route::get('/catalog', [CatalogController::class, 'getIndex'])->name('dashboard');

Route::get('/catalog/show/{id}', [CatalogController::class, 'getShow'])->name('show');

Route::get('/catalog/create', [CatalogController::class, 'getCreate'])->name('create');

Route::get('/catalog/edit/{id}', [CatalogController::class, 'getEdit'])->name('edit');

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
