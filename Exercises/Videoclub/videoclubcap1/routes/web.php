<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
 
Route::get('/', function() {
    return view('welcome');
})->name('inicio');

Route::get('/catalog', function() {
    return view('catalog.index');
})->name('catalog');

Route::get('/catalog/show/{id}', function($id) {
    return view('catalog.show', ['id' => $id]);
})->name('show');

Route::get('/catalog/create', function() {
    return view('catalog.create');
})->name('create');

Route::get('/catalog/edit/{id}', function($id) {
    return view('catalog.edit', ['id' => $id]);
})->name('edit');

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/
require __DIR__.'/auth.php';