<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Support\Facades\Auth;

class Salon extends Model
{
	
    use CrudTrait;
	use \Venturecraft\Revisionable\RevisionableTrait;

    /*-------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |------------------------------------------------------------------------*/

    protected $table = 'salones';
    protected $fillable = ['nombre','descripcion','ubicacion','Max_personas'];
	public $timestamps = false;
	
	protected $revisionCreationsEnabled = true;
	protected $revisionFormattedFieldNames = array(
		'nombre' => 'nombre',
		'description' => 'descripción',
		'ubication'  => 'ubicación',
		'Max_personas'  => 'cantidad de personas',
	);

    /*-------------------------------------------------------------------------
    | FUNCTIONS
    |------------------------------------------------------------------------*/
	
	public static function boot()
    {
		parent::boot();
    }
	
	public function identifiableName()
    {
        return $this->nombre;
    }
	
    /*-------------------------------------------------------------------------
    | RELATIONS
    |------------------------------------------------------------------------*/
	
	
	public function reservaciones()
	{
		return $this->belongsToMany('App\Models\Reservacion');
	}
	
	public function equipos()
	{
		return $this-> hasMany('App\Models\Equipo');
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
