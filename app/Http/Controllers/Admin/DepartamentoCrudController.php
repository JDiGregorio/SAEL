<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\DepartamentoRequest as StoreRequest;
use App\Http\Requests\DepartamentoRequest as UpdateRequest;

use App\Authorizable;

class DepartamentoCrudController extends CrudController
{
	use Authorizable;
    public function setup()
    {

        $this->crud->setModel('App\Models\Departamento');
        $this->crud->setRoute('admin/departamento');
        $this->crud->setEntityNameStrings('departamento', 'departamentos');
		
		$this->crud->allowAccess('revisions');
		$this->crud->with('revisionHistory');
		$this->crud->genero = "este";
		
		$this->crud->addColumn([
			'name' => 'nombre',
			'label' => 'Departamento' 
		]);
		
		$this->crud->addColumn([
			'name' => 'codigo',
			'label' => 'Código' 
		]);
		
		//-----------------------------------------------------------------------------------//
		
		$this->crud->addField([
			'name' => 'nombre',
			'label' => 'Nombre de Departamento',
			'type' => 'text',
			'attributes' => [
				'placeholder' => 'Registro de departamento',
			],
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
