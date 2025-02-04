<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // Nos permite proteger los campos de la asignación masiva.
    protected $guard = [];

    public function profesores()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('asignatura', 'nota');
    }
}
