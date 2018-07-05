<?php

use Faker\Generator as Faker;

$factory->define(App\Menu::class, function (Faker $faker) {
    $name = $faker->name;
    $menus = App\Menu::all();
    return [
        'name' => $name,
        //'slug' => str_slug($name),
        'parent_id' => (count($menus) > 0) ? $faker->randomElement($menus->pluck('id')->toArray()) : 0,
        //'order' => 0,
    ];
});
