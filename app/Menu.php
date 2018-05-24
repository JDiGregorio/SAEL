<?php

namespace App;

use App\Menu;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	protected $table = 'menu_items';
    protected $fillable = ['name', 'parent_id','enabled'];
	public $timestamps = true;
	
	
	/*
	*	Recorrer el arreglo para identificar cual es el padre
	*/
	public function getChildren($data, $line)
    {
        $Children = [];
        foreach ($data as $line1) {
            if ($line['id'] == $line1['parent_id']) {
                $Children = array_merge($Children, [ array_merge($line1, ['submenu' => $this->getChildren($data, $line1) ]) ]);
            }
        }
        return $Children;
    }
	
	/*
	*	Retorna las opciones de menu activas y ordenadas.
	*/
    // public function opcionMenu()
    // {
        // return $this->where('enabled', 1)
            // ->orderby('parent_id')
            // //->orderby('order')
            // ->orderby('name')
            // ->get()
            // ->toArray();
    // }
	
	// /*
	// *	Recorrer las opciones de menu, y en las opciones padre obtener sus hijos
	// */
    // public static function menus()
    // {
        // $menus = new Menu();
        // $data = $menus->opcionMenu();
        // $menuAll = [];
        // foreach ($data as $line) {
            // $item = [ array_merge($line, ['submenu' => $menus->get_hijo($data, $line) ]) ];
            // $menuAll = array_merge($menuAll, $item);
        // }
        // return $menus->menuAll = $menuAll;
    // }
}
