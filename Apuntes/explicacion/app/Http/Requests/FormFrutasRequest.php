<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormFrutasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|min:5|max:10|in:peras,fresas',
            'descripcion' => 'required|min:10|max:20',
            'pais' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'EL NOMBRE ES REQUERIDO',
            'nombre.min' => 'LA FRUTA DEBE TENER AL MENOS 5 LETRAS',
            'nombre.max' => 'LA FRUTA DEBE TENER COMO MAXIMO 10 LETRAS'
        ];
    }
}
