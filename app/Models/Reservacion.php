<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Support\Facades\Auth;

class Reservacion extends Model
{
    use CrudTrait;
	use \Venturecraft\Revisionable\RevisionableTrait;

    /*-------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |------------------------------------------------------------------------*/

    protected $table = 'reservaciones';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['fecha','hora_inicio','hola_final','monto_adelanto','estado','cliente_id','usuario_id','tipo','evento_id'];
    // protected $hidden = [];
    // protected $dates = [];
	
	protected $revisionCreationsEnabled = true;
	protected $revisionFormattedFieldNames = array(
		'fecha' => 'fecha',
		'hora_inicio' => 'hora inicio',
		'hola_final' => 'hora final',
		'monto_adelanto'  => 'monto adelanto',
		'estado'  => 'estado',
		'cliente_id'  => 'cliente',
		'tipo'  => 'tipo alquiler o reservación',
		'evento_id'  => 'evento',
		
	);

    /*------------------------------------------------------------------------
    | FUNCTIONS
    |-----------------------------------------------------------------------*/

	public static function boot()
    {
		parent::boot();
    }
	
    /*------------------------------------------------------------------------
    | RELATIONS
    |------------------------------------------------------------------------*/

	public function cliente()
	{
		return $this->belongsTo('App\Models\Cliente');
	}
	
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	
	public function evento()
	{
		return $this->belongsTo('App\Models\Evento');
	}
	
	public function salones()
	{
		return $this->belongsToMany('App\Models\Salon', 'reservacion_salon', 'salon_id', 'reservacion_id');
	}
	
    /*-------------------------------------------------------------------------
    | SCOPES
    |------------------------------------------------------------------------*/

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
