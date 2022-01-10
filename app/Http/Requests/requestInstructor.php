<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestInstructor extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|min:3|max:20',
            'apaterno' => 'required|min:3|max:20',
            'amaterno' => 'required|min:3|max:20',
            'correo' => 'required|min:3|max:30',
            'telefono' => 'required|min:3|max:15',
            'titulo' => 'required|min:1|max:15',
        ];
    }

    public function attributes()
    {
        return[
            'nombre' => 'Nombre',
            'apaterno' => 'Apellido paterno',
            'amaterno' => 'Apellido materno',
            'correo' => 'Correo Electrónico',
            'telefono' => 'Teléfono',
            'titulo' => 'Titulo',
        ];
    }
}
