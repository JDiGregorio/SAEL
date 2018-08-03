<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Support\Facades\Auth;

class Ciudad extends Model
{
    use CrudTrait;
	use \Venturecraft\Revisionable\RevisionableTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'ciudades';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['nombre','codigo','departamento_id'];
    // protected $hidden = [];
    // protected $dates = [];
	protected $guard_name = 'web';

    protected $revisionCreationsEnabled = true;
	protected $revisionFormattedFieldNames = array(
		'nombre' => 'nombre de departamento',
		'codigo' => 'código',
		'departamento_id' => 'departamento',
	);
	
    /*------------------------------------------------------------------------
    | FUNCTIONS
    |------------------------------------------------------------------------*/

	public static function boot()
    {
		parent::boot();
    }

    /*------------------------------------------------------------------------
    | RELATIONS
    |------------------------------------------------------------------------*/

	public function departamento()
	{
		return $this->belongsTo('App\Models\Departamento');
	}
	
	public function clientes()
	{
		return $this-> hasMany('App\Models\Cliente');
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
