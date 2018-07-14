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
			'fotografia' => 'nullable|image|max:250'
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
			'fotografia.image' => 'El archivo seleccionado debe ser una imagen.',
			'foto.max' => 'El tamaño de la fotografía no es valido. Máximo 250Kb.'
        ];
    }
}
