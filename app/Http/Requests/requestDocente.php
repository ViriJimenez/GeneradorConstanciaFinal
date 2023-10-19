<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestDocente extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rfc' => 'required|min:3|max:18',
            'nombre' => 'required|min:3|max:50',
            'apaterno' => 'required|min:3|max:50',
            'amaterno' => 'required|min:3|max:50',
            'correo' => 'required|min:3|max:100',
            //'password' => 'required|min:3|max:100',
            'telefono' => 'required|min:3|max:15',
            'direccion' => 'required|min:3|max:100',
            'edad' => 'required|min:1|max:3',
            //'foto' => 'required|max:10000|mimes:jpg,png,jpeg,gif',
        ];
    }

    public function attributes()
    {
        return[
            'rfc' => 'RFC',
            'nombre' => 'Nombre',
            'apaterno' => 'Apellido paterno',
            'amaterno' => 'Apellido materno',
            'correo' => 'Correo Electrónico',
            'password' => 'Contraseña',
            'telefono' => 'Teléfono',
            'direccion' => 'Dirección',
            'edad' => 'Edad',
        ];
    }

    public function messages()
    {
        return[
            //'foto.required' => 'Tienes que colocar la Fotografía'
        ];
    }
}
