<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class DepartamentoRequest extends FormRequest
{

    public function authorize()
    {
        return backpack_auth()->check();
    }

    public function rules()
    {
        return [
            'nombre' => 'required',
        ];
    }
	
    public function attributes()
    {
        return [];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Necesita agregar el nombre registro de departamento.',
        ];
    }
}
