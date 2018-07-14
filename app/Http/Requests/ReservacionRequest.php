<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ReservacionRequest extends FormRequest
{
 
    public function authorize()
    {
        return \Auth::check();
    }


    public function rules()
    {
        return [
            'fecha_inicio' => 'required',
            'fecha_final' => 'required|date|after_or_equal:fecha_inicio',
        ];
    }

    public function attributes()
    {
        return [];
    }

    public function messages()
    {
        return [
            'fecha_inicio.required' => 'Necesita seleccionar la fecha de inicio de evento.',
            'fecha_inicio.required' => 'Necesita seleccionar la fecha de finalización de evento.',
            'fecha_final.after_or_equal' => 'Necesita seleccionar una fecha de finalización igual o posterior a la fecha de inicio de evento.',
        ];
    }
}
