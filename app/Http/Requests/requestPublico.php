<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestPublico extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'curp' => 'required|min:3|max:18',
            'nombre' => 'required|min:3|max:20',
            'apaterno' => 'required|min:3|max:20',
            'amaterno' => 'required|min:3|max:20',
            'correo' => 'required|min:3|max:30',
            'telefono' => 'required|min:3|max:15',
            'direccion' => 'required|min:3|max:80',
            'edad' => 'required|min:1|max:3',
        ];
    }

    public function attributes()
    {
        return[
            'curp' => 'Curp',
            'nombre' => 'Nombre',
            'apaterno' => 'Apellido paterno',
            'amaterno' => 'Apellido materno',
            'correo' => 'Correo Electrónico',
            'telefono' => 'Teléfono',
            'direccion' => 'Dirección',
            'edad' => 'Edad',
        ];
    }
}
