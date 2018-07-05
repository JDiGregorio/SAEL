<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\ClienteRequest as StoreRequest;
use App\Http\Requests\ClienteRequest as UpdateRequest;

class ClienteCrudController extends CrudController
{
    public function setup()
    {
        $this->crud->setModel('App\Models\Cliente');
        $this->crud->setRoute('admin/cliente');
        $this->crud->setEntityNameStrings('cliente', 'clientes');
		
		$this->crud->allowAccess('revisions');
		$this->crud->with('revisionHistory');
		$this->crud->genero = "este";
		
		$this->crud->addColumn([
		'name' => 'identidad',
		'label' => 'Número de identidad' 
		]);
		
		$this->crud->addColumn([
		'name' => 'nombre',
		'label' => 'Nombre' 
		]);
		
		$this->crud->addColumn([
		'name' => 'telefono',
		'label' => 'Número de teléfono',
		]);
		
		$this->crud->addField([
		'name' => 'identidad',
		'label' => 'Número de identidad',
		'type' => 'text'
		]);
		
        $this->crud->addField([
		'name' => 'nombre',
		'label' => 'Nombre',
		'type' => 'text'
		]);
		
		$this->crud->addField([
		'name' => 'direccion',
		'label' => 'Dirección',
		'type' => 'address'
		]);
		
		$this->crud->addField([
		'name' => 'telefono',
		'label' => 'Número de teléfono',
		'type' => 'text'
		]);
		
		$this->crud->addField([
		'name' => 'correo',
		'label' => 'Dirección de correo',
		'type' => 'email'
		]);
		
		$this->crud->addField([
		'name' => 'descripcion',
		'label' => 'Comentario',
		'type' => 'textarea'
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
