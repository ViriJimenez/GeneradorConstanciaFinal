<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestPonente extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|min:3|max:20',
            'clave' => 'required|min:3|max:18',
            'correo' => 'required|min:3|max:100',
        ];
    }

    public function attributes()
    {
        return[
            'nombre' => 'Nombre',
            'clave' => 'Clave',
            'correo' => 'Correo Electrónico',
        ];
    }
}
