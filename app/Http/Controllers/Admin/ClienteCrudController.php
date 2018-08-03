<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\ClienteRequest as StoreRequest;
use App\Http\Requests\ClienteRequest as UpdateRequest;

use App\Authorizable;
use App\Models\Cliente as Cliente;

class ClienteCrudController extends CrudController
{
	
	use Authorizable;
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
			'label' => 'Número de identidad',
		]);
		
		$this->crud->addColumn([
			'name' => 'nombre',
			'label' => 'Nombre' 
		]);
		
		$this->crud->addColumn([
			'name' => 'telefono',
			'label' => 'Número de teléfono',
		]);
		
		//-------------------------------------------------------------------------------//
		
		$this->crud->addField([
			'name' => 'identidad',
			'label' => 'Número de identidad',
			'type' => 'text',
			'wrapperAttributes' => [
				'class' => 'form-group col-md-4',
			],
			'tab'=> 'Datos generales',
		]);
		
        $this->crud->addField([
			'name' => 'nombre',
			'label' => 'Nombre de cliente',
			'type' => 'text',
			'wrapperAttributes' => [
				'class' => 'form-group col-md-8',
			],
			'tab'=> 'Datos generales',
		]);
		
		$this->crud->addField([
			'name' => 'telefono',
			'label' => 'Número de teléfono/celular',
			'type' => 'text',
			'prefix' => "N°.",
			'wrapperAttributes' => [
				'class' => 'form-group col-md-4',
			],
			'tab'=> 'Datos generales',
		]);
		
		$this->crud->addField([
			'name' => 'correo',
			'label' => 'Correo',
			'type' => 'email',
			'wrapperAttributes' => [
				'class' => 'form-group col-md-8',
			],
			'tab'=> 'Datos generales',
		]);
		
		$this->crud->addField([
			'name' => 'separator',
			'type' => 'custom_html',
			'value' => '<hr>',
			'tab' => 'Datos generales'
		]);
		
		$this->crud->addField([
			'name' => 'empresa',
			'label' => 'Nombre de empresa',
			'type' => 'text',
			'tab'=> 'Datos generales',
		]);
		
		$this->crud->addField([
			'name' => 'separator1',
			'type' => 'custom_html',
			'value' => '<hr>',
			'tab' => 'Datos generales'
		]);
		
		$this->crud->addField([
			'name' => 'descripcion',
			'label' => 'Observación',
			'type' => 'textarea',
			'tab'=> 'Datos generales',
		]);
		
		///------------------------------------------------------------------------------------------------------------------------///
		
		$this->crud->addField([
			'label' => "Departamento",
			'type' => 'select2',
			'name' => 'departamento_id',
			'entity' => 'departamento', 
			'attribute' => 'nombre', 
			'model' => "App\Models\Departamento",
			'wrapperAttributes' => [
				'class' => 'form-group col-md-6',
			],
			'tab'=> 'Dirección',
		]);
		
		$this->crud->addField([
			'label' => "Ciudad",
			'type' => 'select2',
			'name' => 'ciudad_id',
			'entity' => 'ciudad', 
			'attribute' => 'nombre', 
			'model' => "App\Models\Ciudad",
			'wrapperAttributes' => [
				'class' => 'form-group col-md-6',
			],
			'tab'=> 'Dirección',
		]);
		
		$this->crud->addField([
			'name' => 'direccion',
			'label' => 'Dirección',
			'type' => 'address',
			'tab'=> 'Dirección',
		]);
		
		$this->crud->addField([
			'name' => 'separator2',
			'type' => 'custom_html',
			'value' => '<hr>',
			'tab'=> 'Dirección',
		]);
		
		$this->crud->addField([
			'name' => 'detalles',
			'label' => 'Más detalles',
			'type' => 'textarea',
			'tab'=> 'Dirección',
		]);
    }
	
	public function ver($id)
    {
        return Cliente::find($id);
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
