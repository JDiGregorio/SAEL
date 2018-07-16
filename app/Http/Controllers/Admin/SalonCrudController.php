<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\SalonRequest as StoreRequest;
use App\Http\Requests\SalonRequest as UpdateRequest;

use App\Authorizable;

class SalonCrudController extends CrudController
{
	use Authorizable;
    public function setup()
    {
		
        $this->crud->setModel('App\Models\Salon');
        $this->crud->setRoute('admin/salon');
        $this->crud->setEntityNameStrings('salon', 'salones');
		
		$this->crud->allowAccess('revisions');
		$this->crud->with('revisionHistory');
		$this->crud->genero = "este";
		
		$this->crud->addColumn([
		'name' => 'nombre',
		'label' => 'Registro de salón' 
		]);
		
        $this->crud->addColumn([
		'name' => 'ubicacion',
		'label' => 'Ubicación',
		]);
		
		//---------------------------------------------------------------------------------------------------------------------------------------------------------//
		
        $this->crud->addField([
		'name' => 'nombre',
		'label' => 'Registro de salón',
		'type' => 'text',
		'tab' => 'Datos generales',
		]);
		
		$this->crud->addField([
		'name' => 'descripcion',
		'label' => 'Descripción de salón',
		'type' => 'textarea',
		'tab' => 'Datos generales',
		]);
		
        $this->crud->addField([
		'name' => 'ubicacion',
		'label' => 'Ubicación de salón',
		'type' => 'address',
		'tab' => 'Datos generales',
		]);
		
		$this->crud->addField([
			'name' => 'fotografia',
			'label' => "Fotografía",
			'type' => 'upload',
			'upload' => true,
			'tab' => 'Fotografía',
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
