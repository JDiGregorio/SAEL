<?php

	CRUD::resource('salon', 'SalonCrudController');
	CRUD::resource('cliente', 'ClienteCrudController');
	CRUD::resource('reservacion', 'ReservacionCrudController');
	CRUD::resource('evento', 'EventoCrudController');
	CRUD::resource('departamento', 'DepartamentoCrudController');
	CRUD::resource('ciudad', 'CiudadCrudController');
	
	Route::get('calendario', 'CalendarioCrudController@index');
	Route::get('estado/eventos', 'EstadoCrudController@index');
	Route::get('logistica/eventos', 'LogisticaCrudController@index');
	
	Route::get('usuario-pdf', function(){
		$users = App\User::all();
		$pdf = PDF::loadView('usuario', ['users' => $users]);
		//return $pdf->download('usuarios.pdf');
		return $pdf->stream();
	});
	
	Route::get('cliente-pdf', function(){
		$clientes = App\Models\Cliente::all();
		$pdf = PDF::loadView('cliente', ['clientes' => $clientes]);
		//return $pdf->download('clientes.pdf');
		return $pdf->stream();
	});
	
	Route::get('reservacion-pdf', function(){
		$reservaciones = App\Models\Reservacion::all();
		$pdf = PDF::loadView('reservacion', ['reservaciones' => $reservaciones]);
		//return $pdf -> download('reservaciones.pdf');
		return $pdf->stream();
	});
	
	Route::get('estado-pdf', function(){
		$reservaciones = App\Models\Reservacion::all();
		$pdf = PDF::loadView('situacion', ['reservaciones' => $reservaciones]);
		//return $pdf -> download('situaciones.pdf');
		return $pdf->stream();
	});
	
	Route::get('logistica-pdf/{id}', function($id){
		$reservaciones = App\Models\Reservacion::where([['id',"=",$id]])->get();
		$pdf = PDF::loadView('logistica', ['reservaciones' => $reservaciones]);
		//return $pdf -> download('logisticas.pdf');
		return $pdf->stream();
	});
	
	//Route::get('{page}/{subs?}', ['uses' => 'PageCrudController@index'])->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);
	