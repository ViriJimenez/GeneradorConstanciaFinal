<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestDepartamento extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|min:3|max:1000',
            'descripcion' => 'required|min:3|max:1000',
        ];
    }

    public function attributes()
    {
        return[
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion'
        ];
    }
}
