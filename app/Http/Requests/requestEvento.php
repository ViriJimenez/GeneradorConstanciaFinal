<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestEvento extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|min:3|max:100',
            'descripcion' => 'required|min:3|max:200',
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
