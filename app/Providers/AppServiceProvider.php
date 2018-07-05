<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Menu;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // view()->composer('index', function($view) {
			// $view->with('menus', Menu::menus());
		// });
    }

    public function register()
    {
        //
    }
}
