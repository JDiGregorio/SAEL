<?php

namespace App\Http\Requests;

use app\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class SalonRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
{

    public function authorize()
    {
        return \Auth::check();
    }

    public function rules()
    {
        return [
			'nombre' => 'required',
			'Max_personas' => 'digits_between:0,10000'
        ];
    }

    public function attributes()
    {
        return [];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Necesita agregar el nombre de registro de salón.',
            'Max_personas.digits_between' => 'Necesita agregar el valor de cantidad de personas en enteros positivos.'
        ];
    }
}
