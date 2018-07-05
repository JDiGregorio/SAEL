<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\ReservacionRequest as StoreRequest;
use App\Http\Requests\ReservacionRequest as UpdateRequest;

class ReservacionCrudController extends CrudController
{
    public function setup()
    {

        $this->crud->setModel('App\Models\Reservacion');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/reservacion');
        $this->crud->setEntityNameStrings('reservacion', 'reservaciones');
		
		$this->crud->allowAccess('revisions');
		$this->crud->with('revisionHistory');
		$this->crud->genero = "este";
		
		$this->crud->addColumn([
			'name' => 'fecha',
			'label' => 'Fecha de evento',
		]);
		
		$this->crud->addColumn([
			'label' => "Clientes", 
			'type' => "select",
			'name' => 'cliente_id',
			'entity' => 'cliente',
			'attribute' => "nombre",
			'model' => "App\Models\Cliente",
		]);
		
		$this->crud->addColumn([
			'name' => 'hora_inicio',
			'label' => 'Hora de inicio',
		]);
		
		$this->crud->addColumn([
			'name' => 'hola_final',
			'label' => 'Hora de finalización',
		]);
		
		$this->crud->addColumn([
			'name' => 'estado',
			'label' => 'Estado',
			'type' => 'boolean',
			'options' => [ 0 => 'En espera', 1 => 'Finalizado'],
		]);
		
		$this->crud->addField([
			'label' => 'Salones',
			'type' => 'select2_multiple',
			'name' => 'salones',
			'entity' => 'salones',
			'attribute' => 'nombre',
			'model' => 'App\Models\Salon',
			'pivot' => true,
		]);
		
		$this->crud->addField([
			'name' => 'fecha',
			'type' => 'date_picker',
			'label' => 'Fecha de evento programada',
			'date_picker_options' => [
				'todayBtn' => true,
				'format' => 'dd-mm-yyyy',
				'language' => 'es',
			],
		]);
		
        $this->crud->addField([
			'name' => 'hora_inicio',
			'label' => 'Hora de inicio',
			'type' => 'time',
		]);
		
		$this->crud->addField([
			'name' => 'hola_final',
			'label' => 'Hora de finalización',
			'type' => 'time',		
		]);
		
		$this->crud->addField([
			'name' => 'monto_adelanto',
			'label' => 'Depositó inicial',
			'type' => 'number',
		]);
		
		$this->crud->addField([
			'label' => 'Cliente',
			'type' => 'select2',
			'name' => 'cliente_id',
			'entity' => 'cliente', 
			'attribute' => 'nombre', 
			'model' => 'App\Models\Cliente', 
		]);
		
		$this->crud->addField([
			'name' => 'tipo',
			'label' => "Template",
			'type' => 'select_from_array',
			'options' => ['alquiler' => 'Alquiler', 'reservacion' => 'Reservación'],
			'allows_null' => false,
		]);
		
		$this->crud->addField([
			'label' => 'Tipo de evento',
			'type' => 'select2',
			'name' => 'evento_id',
			'entity' => 'evento', 
			'attribute' => 'name', 
			'model' => 'App\Models\Evento',
		]);
		
        //$this->crud->setFromDb();
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
