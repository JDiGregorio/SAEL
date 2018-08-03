<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\ReservacionRequest as StoreRequest;
use App\Http\Requests\ReservacionRequest as UpdateRequest;

use App\Authorizable;
use App\Models\Logistica;

class ReservacionCrudController extends CrudController
{
	use Authorizable;
    public function setup()
    {

        $this->crud->setModel('App\Models\Reservacion');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/reservacion');
        $this->crud->setEntityNameStrings('reservacion', 'reservaciones');
		
		$this->crud->allowAccess('revisions');
		$this->crud->with('revisionHistory');
		$this->crud->genero = "este";
		
		$this->crud->addColumn([
			'name' => 'nombre',
			'label' => 'Registro de reservación' 
		]);
		
		$this->crud->addColumn([
			'name' => 'fecha_inicio',
			'label' => 'Fecha de inicio',
		]);
		
		$this->crud->addColumn([
			'name' => 'fecha_final',
			'label' => 'Fecha de finalización',
		]);
		
		$this->crud->addColumn([
			'label' => "Cliente", 
			'type' => "select",
			'name' => 'cliente_id',
			'entity' => 'cliente',
			'attribute' => "nombre",
			'model' => "App\Models\Cliente",
		]);
		
		//--------------------------------------------------------------------------------------------------------------------------------------//
		// 								                        D A T O S   G E N E R A L E S													//
		//--------------------------------------------------------------------------------------------------------------------------------------//
		
		$this->crud->addField([
			'name' => 'nombre',
			'label' => 'Registro de reservación',
			'type' => 'text',
			'attributes' => [
				'readonly' => 'readonly',
			],
			'wrapperAttributes' => [
				'class' => 'form-group col-md-12',
			],
			'tab' => 'Datos generales',
		], 'update');
		
		$this->crud->addField([
			'label' => 'Tipo de evento',
			'type' => 'select2',
			'name' => 'evento_id',
			'entity' => 'evento', 
			'attribute' => 'name', 
			'model' => 'App\Models\Evento',
			'wrapperAttributes' => [
				'class' => 'form-group col-md-5',
			],
			'tab' => 'Datos generales',
		]);
		
		$this->crud->addField([
			'name' => 'titulo',
			'label' => 'Título de evento',
			'type' => 'text',
			'wrapperAttributes' => [
				'class' => 'form-group col-md-5',
			],
			'tab' => 'Datos generales',
		]);
		
		$this->crud->addField([
			'label' => 'Color',
			'name' => 'color',
			'type' => 'color_picker',
			'color_picker_options' => ['customClass' => 'custom-class'],
			'default'=>'#00BFFF',
			'wrapperAttributes' => [
				'class' => 'form-group col-md-2',
			],
			'tab' => 'Datos generales',
		]);
		
		$this->crud->addField([
			'name' => 'estado',
			'label' => '',
			'type' => 'toogle',
			'options' => [ 
                        0 => "Pendiente",
                        1 => "Realizado",
                    ],
		],'update');
		
		$this->crud->addField([
			'label' => 'Cliente',
			'type' => 'select2',
			'name' => 'cliente_id',
			'entity' => 'cliente', 
			'attribute' => 'nombre', 
			'model' => 'App\Models\Cliente',
			'wrapperAttributes' => [
				'class' => 'form-group col-md-12',
			],
			'tab' => 'Datos generales',
		]);
		
		$this->crud->addField([
			'name' => 'separator',
			'type' => 'custom_html',
			'value' => '<hr>',
			'tab' => 'Datos generales',
		]);
		
		$this->crud->addField([
			'name'  => 'varios_dias',
			'label' => '¿solo un día?',
			'type'  => 'fieldhidden',
			'options' => [
                    0 => "Si",
                    1 => "No",
            ],
			'inline' => true,
			'hide_when' => [
					0 => ['fecha_final'],
			],
			'default' => false,
			'wrapperAttributes' => [
				'class' => 'form-group col-md-12',
			],
			'tab' => 'Datos generales'
		]);
		
		$this->crud->addField([
			'name' => 'fecha_inicio',
			'type' => 'date_picker',
			'label' => 'Fecha de inicio de evento',
			'date_picker_options' => [
				'todayBtn' => true,
				'format' => 'dd-mm-yyyy',
				'language' => 'es',
			],
			'wrapperAttributes' => [
				'class' => 'form-group col-md-6',
			],
			'tab' => 'Datos generales',
		]);
		
		$this->crud->addField([
			'name' => 'fecha_final',
			'type' => 'date_picker',
			'label' => 'Fecha de finalización de evento',
			'date_picker_options' => [
				'todayBtn' => true,
				'format' => 'dd-mm-yyyy',
				'language' => 'es',
			],
			'wrapperAttributes' => [
				'class' => 'form-group col-md-6',
			],
			'tab' => 'Datos generales',
		]);
		
        $this->crud->addField([
			'name' => 'hora_inicio',
			'label' => 'Hora de inicio',
			'type' => 'time',
			'wrapperAttributes' => [
				'class' => 'form-group col-md-3',
			],
			'tab' => 'Datos generales',
		]);
		
		$this->crud->addField([
			'name' => 'hola_final',
			'label' => 'Hora de finalización',
			'type' => 'time',
			'wrapperAttributes' => [
				'class' => 'form-group col-md-3',
			],
			'tab' => 'Datos generales',			
		]);
		
		$this->crud->addField([
			'name' => 'separator1',
			'type' => 'custom_html',
			'value' => '<hr>',
			'tab' => 'Datos generales',
		]);
		
		$this->crud->addField([
			'name' => 'observacion_1',
			'label' => 'Observación',
			'type' => 'textarea',
			'tab' => 'Datos generales',
		]);
		
		//--------------------------------------------------------------------------------------------------------------------------------------//
		// 								                        L O G I S T I C A																//
		//--------------------------------------------------------------------------------------------------------------------------------------//
		
		$this->crud->addField([
			'label' => 'Salones',
			'type' => 'select2_multiple',
			'name' => 'salones',
			'entity' => 'salones',
			'attribute' => 'nombre',
			'model' => 'App\Models\Salon',
			'pivot' => true,
			'wrapperAttributes' => [
				'class' => 'form-group col-md-12',
			],
			'tab' => 'Logística',
		]);
		
		$this->crud->addField([
			'name' => 'separator3',
			'type' => 'custom_html',
			'value' => '<hr name="separator2">',
			'tab' => 'Logística',
		]);
		
		$this->crud->addField([
			'name'  => 'decision',
			'label' => '¿Servicio de mesas y sillas?',
			'type'  => 'fieldhidden',
			'options' => [
                    0 => "Si",
                    1 => "No",
            ],
			'inline' => true,
			'hide_when' => [
					1 => ['cantidad_mesas','cantidad_sillas','cafe'],
			],
			'default' => false,
			'wrapperAttributes' => [
				'class' => 'form-group col-md-12',
			],
			'tab' => 'Logística'
		]);
		
		$this->crud->addField([
			'name' => 'separator4',
			'type' => 'custom_html',
			'value' => '<hr name="separator2">',
			'tab' => 'Logística',
		]);
		
		$this->crud->addField([
			'name' => 'cantidad_personas',
			'label' => 'Cantidad de personas',
			'type' => 'number',
			'prefix' => "N°.",
			'wrapperAttributes' => [
				'class' => 'form-group col-md-10',
			],
			'tab' => 'Logística',
		]);
		
		$this->crud->addField([
			'name'        => 'audiovisual', 
			'label'       => 'Equipo audiovisual', 
			'type'        => 'radio',
			'options'     => [
								0 => "No",
								1 => "Si"
							],
			'inline'      => true,
			'wrapperAttributes' => [
				'class' => 'form-group col-md-2',
			],
			'tab' => 'Logística',
		]);
		
		$this->crud->addField([
			'name' => 'cantidad_mesas',
			'label' => 'Cantidad de mesas',
			'type' => 'number',
			'prefix' => "N°.",
			'default'  =>  '0',
			'wrapperAttributes' => [
				'class' => 'form-group col-md-5',
			],
			'tab' => 'Logística',
		]);
		
		$this->crud->addField([
			'name' => 'cantidad_sillas',
			'label' => 'Cantidad de sillas',
			'type' => 'number',
			'prefix' => "N°.",
			'default'  =>  '0',
			'wrapperAttributes' => [
				'class' => 'form-group col-md-5',
			],
			'tab' => 'Logística',
		]);
		
		$this->crud->addField([
			'name'        => 'cafe', 
			'label'       => 'Servicio de café', 
			'type'        => 'radio',
			'options'     => [
								0 => "No",
								1 => "Si"
							],
			'inline'      => true,
			'wrapperAttributes' => [
				'class' => 'form-group col-md-2',
			],
			'tab' => 'Logística',
		]);
		
		$this->crud->addField([
			'name' => 'separator5',
			'type' => 'custom_html',
			'value' => '<hr>',
			'tab' => 'Logística',
		]);
		
		$this->crud->addField([
			'name' => 'observacion_2',
			'label' => 'Observación',
			'type' => 'textarea',
			'tab' => 'Logística',
		]);
		
		//--------------------------------------------------------------------------------------------------------------------------------------//
		// 								                        		P A G O																	//
		//--------------------------------------------------------------------------------------------------------------------------------------//
		
		$this->crud->addField([
			'name' => 'costo_total',
			'label' => 'Costo total',
			'type' => 'number',
			'prefix' => "L.",
			'wrapperAttributes' => [
				'class' => 'form-group col-md-12',
			],
			'tab' => 'Pago',
		]);
		
		$this->crud->addField([
			'name' => 'costo_total',
			'label' => 'Costo total',
			'type' => 'number',
			'prefix' => "L.",
			'wrapperAttributes' => [
				'class' => 'form-group col-md-12',
			],
			'attributes' => [
				'readonly' => 'readonly',
			],
			'tab' => 'Pago',
		],'update');
		
		$this->crud->addField([
			'name' => 'monto_adelanto',
			'label' => 'Depositó inicial',
			'type' => 'number',
			'prefix' => "L.",
			'wrapperAttributes' => [
				'class' => 'form-group col-md-6',
			],
			'default'  =>  '0.00',
			'tab' => 'Pago',
		]);
		
		$this->crud->addField([
			'name' => 'monto_adelanto',
			'label' => 'Depositó inicial',
			'type' => 'number',
			'prefix' => "L.",
			'wrapperAttributes' => [
				'class' => 'form-group col-md-6',
			],
			'attributes' => [
				'readonly' => 'readonly',
			],
			'default'  =>  '0.00',
			'tab' => 'Pago',
		],'update');
		
		$this->crud->addField([
			'name' => 'pago_total',
			'label' => 'Pago',
			'type' => 'number',
			'prefix' => "L.",
			'wrapperAttributes' => [
				'class' => 'form-group col-md-6',
			],
			'default'  =>  '0.00',
			'tab' => 'Pago',
		]);
		
		$this->crud->addField([
			'name' => 'saldo',
			'label' => 'Saldo',
			'type' => 'number',
			'prefix' => "L.",
			'wrapperAttributes' => [
				'class' => 'form-group col-md-12',
			],
			'attributes' => [
				'readonly' => 'readonly',
			],
			'default'  =>  '0.00',
			'tab' => 'Pago',
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
