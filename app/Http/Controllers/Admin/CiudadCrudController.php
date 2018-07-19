<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\CiudadRequest as StoreRequest;
use App\Http\Requests\CiudadRequest as UpdateRequest;

use App\Authorizable;

class CiudadCrudController extends CrudController
{
	use Authorizable;
    public function setup()
    {
     
        $this->crud->setModel('App\Models\Ciudad');
        $this->crud->setRoute('admin/ciudad');
        $this->crud->setEntityNameStrings('ciudad', 'ciudades');
		
		$this->crud->allowAccess('revisions');
		$this->crud->with('revisionHistory');
		$this->crud->genero = "este";

		$this->crud->addColumn([
			'name' => 'nombre',
			'label' => 'Ciudad',
		]);
		
		$this->crud->addColumn([
			'label' => "Departamento", 
			'type' => "select",
			'name' => 'departamento_id', 
			'entity' => 'departamento', 
			'attribute' => "nombre",
			'model' => "App\Models\Departamento",
		]);
		
		$this->crud->addColumn([
			'name' => 'codigo',
			'label' => 'Código',
		]);
		
		//-------------------------------------------------------------------------------------//
		
		$this->crud->addField([
			'name' => 'nombre',
			'label' => 'Nombre',
			'type' => 'text',
			'attributes' => [
				'placeholder' => 'Registro de ciudad',
			],
		]);
		
		$this->crud->addField([
			'label' => "Departamento",
			'type' => 'select2',
			'name' => 'departamento_id', 
			'entity' => 'departamento', 
			'attribute' => 'nombre',
			'model' => "App\Models\Departamento",
		]);
		
		$this->crud->addField([
			'name' => 'codigo',
			'label' => 'Código',
			'type' => 'text',
			'attributes' => [
				'placeholder' => 'Código',
			],
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
