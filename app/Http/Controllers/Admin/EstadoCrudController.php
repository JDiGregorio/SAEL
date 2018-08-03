<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\IniviewRequest as StoreRequest;
use App\Http\Requests\IniviewRequest as UpdateRequest;

class EstadoCrudController extends CrudController
{
	public function index()
    {
        return view('vendor.backpack.base.estado');
    }

    public function store(StoreRequest $request)
    {
        $redirect_location = parent::storeCrud($request);
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        $redirect_location = parent::updateCrud($request);
        return $redirect_location;
    }
}
