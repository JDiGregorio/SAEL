<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\LoungeRequest as StoreRequest;
use App\Http\Requests\LoungeRequest as UpdateRequest;

class LoungeCrudController extends CrudController
{
    public function setup()
    {
		
        $this->crud->setModel('App\Models\Lounge');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/salon');
        $this->crud->setEntityNameStrings('salon', 'salones');
		 
		
		$this->crud->addColumn([
		'name' => 'name',
		'label' => 'Nombre' 
		]);
		
        $this->crud->addColumn([
		'name' => 'ubication',
		'label' => 'Ubicación',
		]);
		
        $this->crud->addColumn([
		'name' => 'description',
		'label' => 'Descripción',
		]);
		
        $this->crud->addField([
		'name' => 'name',
		'label' => 'Lounge name' 
		]);
		
		
        $this->crud->addField([
		'name' => 'ubication',
		'label' => 'Ubicación',
		'type' => 'textarea'
		]);
		
		
        $this->crud->addField([
		'name' => 'description',
		'label' => 'Descripción',
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
