<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class EquipoRequest extends FormRequest
{
 
    public function authorize()
    {
        return \Auth::check();
    }

    public function rules()
    {
        return [
            'description' => 'required',
            'precio' => 'required|numeric|between:0.00,1000000000',
            'max_personas' => 'required|integer|between:0,1000000000',
            'max_mesas' => 'required|integer|between:0,1000000000',
            'max_sillas' => 'required|integer|between:0,1000000000',
        ];
    }

    public function attributes()
    {
        return [];
    }

    public function messages()
    {
        return [
            'description.required' => 'Necesita agregar la descripción de tipo de salón.',
            'precio.required' => 'Necesita agregar un monto inicial mayor o igual que cero.',
            'max_personas.required' => 'Necesita agregar un valor mayor o igual que cero de cantidad de personas.',
            'max_mesas.required' => 'Necesita agregar un valor mayor o igual que cero de cantidad de mesas.',
            'max_sillas.required' => 'Necesita agregar un valor mayor o igual que cero de cantidad de sillas.',
        ];
    }
}
