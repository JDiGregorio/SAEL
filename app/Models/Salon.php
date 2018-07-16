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
	protected $casts = ['fotos' => 'array'];
    protected $fillable = ['nombre','descripcion','ubicacion','fotografia'];
	public $timestamps = true;
	protected $guard_name = 'web';
	
	protected $revisionCreationsEnabled = true;
	protected $revisionFormattedFieldNames = array(
		'nombre' => 'nombre',
		'description' => 'descripción',
		'ubication'  => 'ubicación',
		'fotografia'  => 'fotografía',
	);

    /*-------------------------------------------------------------------------
    | FUNCTIONS
    |------------------------------------------------------------------------*/
	
	public static function boot()
    {
		parent::boot();
		
		self::deleting(function($obj) {
			if (count((array)$obj->fotos)) {
				foreach ($obj->fotos as $file_path) {
					\Storage::disk('public_folder')->delete($obj->image);
				}
			}
		});
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
		return $this->belongsToMany('App\Models\Reservacion', 'reservacion_salon','salon_id');
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
	
	public function setFotoAttribute($value)
    {
        $attribute_name = "fotografia";
        $disk = "public";
        $destination_path = "salon/fotos";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }
	
}
