<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{

    public function authorize()
    {
        return \Auth::check();
    }

    public function rules()
    {
        return [
            'identidad' => 'required|min:15|max:17',
            'identidad' => 'unique:clientes,identidad,id',
			'nombre' => 'required'
        ];
    }

    public function attributes()
    {
        return [];
    }

    public function messages()
    {
        return [
            'identidad.required' => 'Necesita agregar el número de identidad.',
            'identidad.unique' => 'Verifique el número de identidad este ya esta siendo utilizado.',
            'nombre.required' => 'Necesita agregar el nombre del cliente.',
        ];
    }
}
