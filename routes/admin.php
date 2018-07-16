<?php

	CRUD::resource('salon', 'SalonCrudController');
	CRUD::resource('cliente', 'ClienteCrudController');
	CRUD::resource('reservacion', 'ReservacionCrudController');
	CRUD::resource('evento', 'EventoCrudController');
	CRUD::resource('equipo-de-salon', 'EquipoCrudController');
	
	//Route::get('{page}/{subs?}', ['uses' => 'PageCrudController@index'])->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);
	
	Route::get('pdf_usuario', function(){
		$users = App\User::all();
		$pdf = PDF::loadView('usuario', ['users' => $users]);
		return $pdf -> download('usuarios.pdf');
	});
	
	Route::get('pdf_cliente', function(){
		$clientes = App\Models\Cliente::all();
		$pdf = PDF::loadView('cliente', ['clientes' => $clientes]);
		return $pdf -> download('clientes.pdf');
	});
	
	Route::get('pdf_AR', function(){
		$reservaciones = App\Models\Reservacion::all();
		$pdf = PDF::loadView('reservacion', ['reservaciones' => $reservaciones]);
		return $pdf -> download('reservaciones.pdf');
	});