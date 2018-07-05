<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class EventoRequest extends FormRequest
{
  
    public function authorize()
    {
        return \Auth::check();
    }

    public function rules()
    {
        return [
            'name' => 'required|min:5|max:255'
        ];
    }

    public function attributes()
    {
        return [];
    }
	
    public function messages()
    {
        return [
            //
        ];
    }
}
