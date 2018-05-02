<?php

namespace Backpack\PageManager\app\Http\Requests;

use App\Http\Requests\Request;

class PageRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
{

    public function authorize()
    {

        return \Auth::check();
    }
   
    public function rules()
    {
        $id = \Request::get('id');
        return [
            'name' => 'required|min:2|max:255',
            'title' => 'required|min:2|max:255',
            'slug' => 'unique:pages,slug'.($id ? ','.$id : ''),
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