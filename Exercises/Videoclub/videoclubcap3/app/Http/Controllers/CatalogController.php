<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    public function deleteMovie($id) {
        // Obtenemos la película a eliminar.
        $pelicula = Movie::findOrFail($id);
        // Eliminamos la película.
        $pelicula->delete();
        // Redirigimos a la página de inicio.
        return to_route('dashboard')->with('delete_msg', 1);
    }

    public function putReturn($id) {
        // Obtenemos la película a devolver.
        $pelicula = Movie::findOrFail($id);
        // Cambiamos el estado de la película.
        $pelicula->rented = false;
        // Guardamos los cambios.
        $pelicula->save();
        // Redirigimos a la página de la película.
        // Muestro mensaje de devolución.
        return to_route('show', $pelicula->id)->with('return_msg', 1);
    }

    public function putRent($id) {
        // Obtenemos la película a alquilar.
        $pelicula = Movie::findOrFail($id);
        // Cambiamos el estado de la película.
        $pelicula->rented = true;
        // Guardamos los cambios.
        $pelicula->save();
        // Redirigimos a la página de la película.
        // Muestro mensaje de alquiler.
        return to_route('show', $pelicula->id)->with('rent_msg', 1);
    }

    public function postCreate(Request $request) {
        // Creamos una nueva película.
        $p = new Movie();
        // Asignamos los valores del formulario.
        $p->title = $request->input('title');
        $p->year = $request->input('year');
        $p->director = $request->input('director');
        $p->poster = $request->input('poster');
        $p->synopsis = $request->input('synopsis');
        // Guardamos la película.
        $p->save();
        // Redirigimos a la página de inicio.
        return to_route('dashboard')->with('create_msg', 1);
    }

    public function putEdit($id, Request $request) {
        // Obtenemos la película a editar.
        $pelicula = Movie::findOrFail($id);
        // Actualizamos los datos de la película.
        $pelicula->title = $request->input('title');
        $pelicula->year = $request->input('year');
        $pelicula->director = $request->input('director');
        $pelicula->poster = $request->input('poster');
        $pelicula->synopsis = $request->input('synopsis');
        // Guardamos los cambios.
        $pelicula->save();
        // Redirigimos a la página de la película.
        return to_route('show', $pelicula->id);
    }

    public function getEdit($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit')->with('pelicula', $pelicula);
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function getShow($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.show')->with('pelicula', $pelicula);
    }

    public function getIndex()
    {
        $allMovies = Movie::all();
        return view('catalog.index')->with('arrayPeliculas', $allMovies);
    }
}
