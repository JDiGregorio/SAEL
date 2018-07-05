<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\EventoRequest as StoreRequest;
use App\Http\Requests\EventoRequest as UpdateRequest;

class EventoCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Evento');
        $this->crud->setRoute('admin/evento');
        $this->crud->setEntityNameStrings('evento', 'eventos');

        $this->crud->allowAccess('revisions');
		$this->crud->with('revisionHistory');
		$this->crud->genero = "este";
		
		$this->crud->addColumn([
			'name' => 'name',
			'label' => 'Registro de evento' 
		]);
		
		$this->crud->addColumn([
			'name' => 'descripcion',
			'label' => 'Descripción de evento' 
		]);
		
		$this->crud->addField([
		'name' => 'name',
		'label' => 'Registro de evento',
		'type' => 'text'
		]);
		
		$this->crud->addField([
		'name' => 'descripcion',
		'label' => 'Descripción de evento',
		'type' => 'textarea',
		]);

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
