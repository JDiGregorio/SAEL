<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Support\Facades\Auth;

class Equipo extends Model
{
    use CrudTrait;
	use \Venturecraft\Revisionable\RevisionableTrait;

    protected $table = 'tipo_salones';
    protected $primaryKey = 'id';
     public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['description','precio','max_personas','max_mesas','max_sillas','salon_id'];
    // protected $hidden = [];
    // protected $dates = [];

	protected $revisionCreationsEnabled = true;
	protected $revisionFormattedFieldNames = array(
		'description' => 'descripción',
		'precio' => 'precio estimado',
		'max_personas'  => 'máximo de personas',
		'max_mesas'  => 'máximo de mesas',
		'max_sillas'  => 'máximo de sillas',
		'salon_id' => 'salón',
	);
	
    /*-------------------------------------------------------------------------
    | FUNCTIONS
    |------------------------------------------------------------------------*/
	
	public static function boot()
    {
		parent::boot();
    }
	
    /*-------------------------------------------------------------------------
    | RELATIONS
    |------------------------------------------------------------------------*/
	
	
	public function salon()
	{
		return $this->belongsTo('App\Models\Salon');
	}
	
    /*-------------------------------------------------------------------------
    | SCOPES
    |------------------------------------------------------------------------*/

    /*-------------------------------------------------------------------------
    | ACCESORS
    |------------------------------------------------------------------------*/

    /*-------------------------------------------------------------------------
    | MUTATORS
    |-------------------------------------------------------------------------*/
}
