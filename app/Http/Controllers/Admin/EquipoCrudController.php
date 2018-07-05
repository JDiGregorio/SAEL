<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\EquipoRequest as StoreRequest;
use App\Http\Requests\EquipoRequest as UpdateRequest;

class EquipoCrudController extends CrudController
{
    public function setup()
    {
        $this->crud->setModel('App\Models\Equipo');
        $this->crud->setRoute('admin/equipo-de-salon');
        $this->crud->setEntityNameStrings('equipo', 'equipos');
		
		$this->crud->addColumn([
			'label' =>"Salón",
			'type' => 'select',
			'name' => 'salon_id',
			'entity' => 'salon', 
			'attribute' => 'nombre', 
			'model' => "App\Models\Salon",
		]);
		
		$this->crud->addColumn([
			'name' => 'precio',
			'label' => "Precio estimado", 
		]);
		
		$this->crud->addColumn([
			'name' => 'max_personas',
			'label' => "Cantidad máxima de personas",
		]);
		
		$this->crud->addColumn([
			'name' => 'max_mesas',
			'label' => "Cantidad máxima de mesas",
		]);
		$this->crud->addColumn([
			'name' => 'max_sillas',
			'label' => "Cantidad máxima de sillas",
		]);
		
		$this->crud->addField([
			'label' => "Salón",
			'type' => 'select2',
			'name' => 'salon_id',
			'entity' => 'salon', 
			'attribute' => 'nombre', 
			'model' => "App\Models\Salon",
		]);
		
        $this->crud->addField([
			'name' => 'description',
			'label' => "Descripción",
			'type' => 'textarea',
		]);
		
		$this->crud->addField([
			'name' => 'precio',
			'label' => "Precio estimado",
			'type' => 'number',
			'step' => 'any',
		]);
		
		$this->crud->addField([
			'name' => 'max_personas',
			'label' => "Cantidad máxima de personas",
			'type' => 'number',
			'step' => 'any',
		]);
		
		$this->crud->addField([
			'name' => 'max_mesas',
			'label' => "Cantidad máxima de mesas",
			'type' => 'number',
			'step' => 'any',
		]);
		
		$this->crud->addField([
			'name' => 'max_sillas',
			'label' => "Cantidad máxima de sillas",
			'type' => 'number',
			'step' => 'any',
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
