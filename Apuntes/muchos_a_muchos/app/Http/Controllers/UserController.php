<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Obtenemos el profesor autenticado.
        $profesor = User::find(Auth::id());
        // Obtenemos los alumnos del profesor.
        $alumnos = $profesor->students;
        // Mostar los alumnos paginados.
        $alumnos = $profesor->students()->paginate(3);
        // $alumnos = $profesor->students()->where('nota', '>=', 9)->get();
        // Mostramos la vista de profesor con los alumnos.
        return view('profesor.index')->with('alumnos', $alumnos);
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

    public function nota()
    {
        // Obtenemos el profesor autenticado.
        $profesor = User::find(Auth::id());
        // Obtenemos los alumnos del profesor.
        // $alumnos = $profesor->students;
        $alumnos = $profesor->uniqueEstudiantes;
        return view('profesor.nota')->with('alumnos', $alumnos);
    }

    public function putnota(Request $request)
    {
        // Obtenemos el alumno seleccionado del formulario.
        // $alumno = Student::find($request->alumno_id);
        // Damos valores a los valores de la tabla pivote.
        // Con Auth::id() obtenemos el id del usuario autenticado (profesor).
        // Con la función profesores() obtenemos la relación de profesores.
        // $alumno->profesores()->attach(Auth::id(), [
        //     'asignatura' => $request->asignatura,
        //     'nota' => $request->nota
        // ]);
        $profesor = User::find(Auth::id());
        $profesor->students()->attach($request->alumno_id, [
            'asignatura' => $request->asignatura,
            'nota' => $request->nota
        ]);

        return to_route('profesor.index');
    }
}
