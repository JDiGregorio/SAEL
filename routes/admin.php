<?php

	CRUD::resource('salon', 'LoungeCrudController');
	
	Route::get('{page}/{subs?}', ['uses' => 'PageCrudController@index'])->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);
	
	Route::group(['prefix' => config('backpack.base.route_prefix', 'admin'), 'middleware' => ['web', 'auth'], 'namespace' => 'Admin'], function () {
    // Backpack\MenuCRUD
    CRUD::resource('menu-item', 'MenuItemCrudController');
	});
	