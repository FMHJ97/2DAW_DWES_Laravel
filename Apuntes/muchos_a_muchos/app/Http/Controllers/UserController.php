<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('profesor.index');
    }

    public function create()
    {
        return view('profesor.create');
    }

    public function store(Request $request)
    {
        $new_student = new Student();
        $new_student->dni = $request->dni;
        $new_student->name = $request->name;
        $new_student->surname = $request->surname;
        $new_student->email = $request->email;
        $new_student->curso = $request->curso;
        $new_student->save();

        // Damos valores a los valores de la tabla pivote.
        // Con Auth::id() obtenemos el id del usuario autenticado.
        $new_student->profesores()->attach(Auth::id(), [
            'asignatura' => $request->asignatura,
            'nota' => $request->nota
        ]);

        // Por último, redirigimos a la vista de profesores.
        return to_route('profesor.index');
    }
}
