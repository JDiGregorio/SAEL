<?php

use App\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    public function run()
    {
        $m1 = factory(Menu::class)->create([
            'name' => 'Inicio',
            //'slug' => 'inicio',
            'parent_id' => 0,
            //'order' => 0,
        ]);
		
        factory(Menu::class)->create([
            'name' => 'Fundación',
            //'slug' => 'fundacion',
            'parent_id' => 0,
            //'order' => 1,
        ]);
		
        /*$m3 = factory(Menu::class)->create([
            'name' => 'Proyectos',
            //'slug' => 'proyectos',
            'parent' => 0,
            'order' => 2,
        ]);
        $m4 = factory(Menu::class)->create([
            'name' => 'Componentes',
            //'slug' => 'componentes',
            'parent' => 0,
            'order' => 3,
        ]);
        factory(Menu::class)->create([
            'name' => 'Eventos',
            //'slug' => 'eventos',
            'parent' => 0,
            'order' => 4,
        ]);
        factory(Menu::class)->create([
            'name' => 'Apoyanos',
            //'slug' => 'apoyanos',
            'parent' => 0,
            'order' => 5,
        ]);
        factory(Menu::class)->create([
            'name' => 'Noticias',
            //'slug' => 'noticias',
            'parent' => 0,
            'order' => 6,
        ]);
        $m32 = factory(Menu::class)->create([
            'name' => 'Contacto',
            //'slug' => 'contacto',
            'parent' => 0,
            'order' => 7,
        ]);
        factory(Menu::class)->create([
            'name' => 'Opción 4.1',
            'slug' => 'opcion-4.1',
            'parent' => $m4->id,
            'order' => 0,
        ]);
        factory(Menu::class)->create([
            'name' => 'Opción 3.2.1',
            'slug' => 'opcion-3.2.1',
            'parent' => $m32->id,
            'order' => 0,
        ]);
        factory(Menu::class)->create([
            'name' => 'Opción 3.2.2',
            'slug' => 'opcion-3.2.2',
            'parent' => $m32->id,
            'order' => 1,
        ]);
        factory(Menu::class)->create([
            'name' => 'Opción 3.2.3',
            'slug' => 'opcion-3.2.3',
            'parent' => $m32->id,
            'order' => 2,
        ]);*/
    }
}
