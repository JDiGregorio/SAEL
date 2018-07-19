<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Support\Facades\Auth;


class Departamento extends Model
{
    use CrudTrait;
	use \Venturecraft\Revisionable\RevisionableTrait;
	
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'departamentos';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['nombre','codigo'];
    // protected $hidden = [];
    // protected $dates = [];
	protected $guard_name = 'web';
	
	protected $revisionCreationsEnabled = true;
	protected $revisionFormattedFieldNames = array(
		'nombre' => 'nombre de departamento',
		'codigo' => 'código',
	);
	
    /*------------------------------------------------------------------------
    | FUNCTIONS
    |------------------------------------------------------------------------*/

	public static function boot()
    {
		parent::boot();
    }

    /*-------------------------------------------------------------------------
    | RELATIONS
    |------------------------------------------------------------------------*/
	
	public function clientes()
	{
		return $this-> hasMany('App\Models\Cliente');
	}
	
	public function ciudades()
	{
		return $this-> hasMany('App\Models\Ciudad');
	}
	
    /*-------------------------------------------------------------------------
    | SCOPES
    |------------------------------------------------------------------------*/

    /*------------------------------------------------------------------------
    | ACCESORS
    |------------------------------------------------------------------------*/

    /*------------------------------------------------------------------------
    | MUTATORS
    |------------------------------------------------------------------------*/
}
