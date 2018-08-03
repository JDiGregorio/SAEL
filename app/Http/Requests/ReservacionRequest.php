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
            //'fecha_inicio' => 'required|date|after_or_equal:today',
            // 'fecha_final' => 'required|date|after_or_equal:fecha_inicio',
            'fecha_final' => 'required_if:varios_dias,==,1',
			'evento_id'  => 'required',
			'titulo'  => 'required',
			'costo_total'  => 'required|numeric|min:0.00|max:1000000000000',
			'monto_adelanto'  => 'numeric|min:0.00|max:1000000000',
			'pago_total'  => 'numeric|min:0.00|max:1000000000',
        ];
    }

    public function attributes()
    {
        return [];
    }

    public function messages()
    {
        return [
			'evento_id.required' => 'Necesita seleccionar el tipo de evento.',
			'titulo.required' => 'Necesita agregar el titulo del evento.',
            'fecha_inicio.required' => 'Necesita seleccionar la fecha de inicio de evento.',
			//'fecha_inicio.after_or_equal' => 'Necesita seleccionar una fecha igual o mayor a la fecha actual.',
            'fecha_final.required_if' => 'Necesita seleccionar una fecha de finalización igual o posterior a la fecha de inicio de evento.',
            //'fecha_final.after_or_equal' => 'Necesita seleccionar una fecha de finalización igual o posterior a la fecha de inicio de evento.',
			'costo_total.required' => 'Necesita agregar el costo total en la sección Pago',
			'costo_total.min' => 'El costo total ubicado en la sección de Pago debe ser coherente debe ser mayor o igual a 0.',
			'costo_total.max' => 'El costo total ubicado en la sección de Pago debe ser coherente debe ser menor o igual a 1000000000000.',
			'monto_adelanto.min' => 'El monto deposito inicial ubicado en la sección de Pago debe ser coherente debe ser mayor o igual a 0.',
			'pago_total.min' => 'El monto de pago ubicado en la sección de Pago debe ser coherente debe ser mayor o igual a 0.',
			
			
        ];
    }
}
