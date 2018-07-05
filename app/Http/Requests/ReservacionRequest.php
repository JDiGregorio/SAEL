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
            'fecha' => 'required'
        ];
    }

    public function attributes()
    {
        return [];
    }

    public function messages()
    {
        return [
            'fecha.required' => 'Necesita seleccionar la fecha de reservación.'
        ];
    }
}
