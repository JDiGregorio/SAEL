<?php

/*namespace Backpack\PageManager\app\Http\Controllers\Admin;

use App\PageTemplates;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\PageManager\app\Models\Page; 

use Backpack\PageManager\app\Http\Requests\PageRequest as StoreRequest;
use Backpack\PageManager\app\Http\Requests\PageRequest as UpdateRequest;


class PageCrudController extends CrudController 
{ 
	use PageTemplates;
	
	public function index($slug)
    {
        $page = Page::findBySlug($slug);

        if (!$page)
        {
            abort(404, 'Please go back to our <a href="'.url('').'">home</a>.');
        }

        $this->data['title'] = $page->title;
        $this->data['page'] = $page->withFakes();

        return view('pages.'.$page->template, $this->data);
    }
	
}*/