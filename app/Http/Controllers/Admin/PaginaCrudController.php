<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Menu;

class PaginaCrudController extends CrudController
{
    public function index()
    {
		$menus = Menu::where([['enabled','=',True]])->orderBy('parent_id')->orderBy('lft')->get();
		return view('index')->with('menus',$menus);
    }
}
