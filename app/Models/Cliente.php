<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Support\Facades\Auth;

class Cliente extends Model
{
    use CrudTrait;
	use \Venturecraft\Revisionable\RevisionableTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'clientes';
    // protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['identidad','nombre','descripcion','direccion','telefono','correo','empresa','departamento_id','ciudad_id','detalles'];
    // protected $hidden = [];
    // protected $dates = [];
	protected $guard_name = 'web';
	
	protected $revisionCreationsEnabled = true;
	protected $revisionFormattedFieldNames = array(
		'identidad' => 'identidad',
		'nombre' => 'nombre de cliente',
		'descripcion' => 'observación',
		'direccion'  => 'dirección',
		'telefono'  => 'teléfono',
		'empresa'  => 'nombre de empresa',
		'departamento_id'  => 'departamento',
		'ciudad_id'  => 'ciudad',
		'detalles'  => 'más detalles',
	);

    /*------------------------------------------------------------------------
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
	
    /*------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------*/
	
	public function reservaciones()
	{
		return $this-> hasMany('App\Models\Reservacion');
	}
	
	public function departamento()
	{
		return $this->belongsTo('App\Models\Departamento');
	}
	
	public function ciudad()
	{
		return $this->belongsTo('App\Models\Ciudad');
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
