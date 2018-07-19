<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\EventRequest as StoreRequest;
use App\Http\Requests\EventRequest as UpdateRequest;

use App\Models\Reservacion;

class EventCrudController extends CrudController
{
    public function setup()
    {
        $events = Reservacion::select("id","titulo as title","fecha_inicio as start","fecha_final as end","color")->get()->toArray();
		//$events = Reservacion::all();
		return Response()->json($events);
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
