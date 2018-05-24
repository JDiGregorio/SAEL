<?php

 Route::get('/', 'Admin\PaginaCrudController@index');
 
 //Route::get('{page}/{subs?}', ['uses' => 'PageCrudController@index'])->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);
