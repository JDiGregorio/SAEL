<?php
/*
namespace Backpack\PageManager\app\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Page extends Model
{
    use CrudTrait;
    use Sluggable;
    use SluggableScopeHelpers;
	*/
    /*-------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |------------------------------------------------------------------------*/
   /* protected $table = 'pages';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['template', 'name', 'title', 'slug', 'content', 'extras'];
    protected $fakeColumns = ['extras'];
   
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug_or_title',
            ],
        ];
    }*/
    /*-------------------------------------------------------------------------
    | FUNCTIONS
    |------------------------------------------------------------------------*/
	/*
    public function getTemplateName()
    {
        return trim(preg_replace('/(id|at|\[\])$/i', '', ucfirst(str_replace('_', ' ', $this->template))));
    }
    public function getPageLink()
    {
        return url($this->slug);
    }
    public function getOpenButton()
    {
        return '<a class="btn btn-default btn-xs" href="'.$this->getPageLink().'" target="_blank">'.
            '<i class="fa fa-eye"></i> '.trans('backpack::pagemanager.open').'</a>';
    }
	*/
    /*-------------------------------------------------------------------------
    | RELATIONS
    |------------------------------------------------------------------------*/
	
    /*-------------------------------------------------------------------------
    | SCOPES
    |------------------------------------------------------------------------*/
	
    /*-------------------------------------------------------------------------
    | ACCESORS
    |-------------------------------------------------------------------------*/
  /*  
    public function getSlugOrTitleAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }
        return $this->title;
    }*/
	
    /*-------------------------------------------------------------------------
    | MUTATORS
    |------------------------------------------------------------------------*/
}