<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class CiudadRequest extends FormRequest
{

    public function authorize()
    {
        return backpack_auth()->check();
    }
	
    public function rules()
    {
        return [
            'nombre' => 'required',
            'departamento_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Necesita agregar el nombre de registro de ciudad.',
            'departamento_id.required' => 'Necesita seleccionar el departamento al que pertenece la ciudad.',
        ];
    }
}
