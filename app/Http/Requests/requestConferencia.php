<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestConferencia extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo' => 'required|min:3|max:10000',
            'descripcion' => 'required|min:3|max:10000',
            'modalidad' => 'required|min:3|max:50',
            'fecha' => 'required|min:3|max:20',
            'hora' => 'required|min:3|max:20',
        ];
    }

    public function attributes()
    {
        return[
            'titulo' => 'Titulo',
            'descripcion' => 'Descripción',
            'modalidad' => 'Modalidad',
            'fecha' => 'Fecha',
            'hora' => 'Hora',
        ];
    }
}
