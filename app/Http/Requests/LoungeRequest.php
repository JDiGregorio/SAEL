<?php

namespace App\Http\Requests;

use app\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class LoungeRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
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
        return [
            //
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
