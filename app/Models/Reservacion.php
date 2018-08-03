<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Support\Facades\Auth;

use App\Logistica;

class Reservacion extends Model
{
    use CrudTrait;
	use \Venturecraft\Revisionable\RevisionableTrait;

    /*------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |------------------------------------------------------------------------*/

    protected $table = 'reservaciones';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['fecha_inicio','hora_inicio','hola_final','monto_adelanto','estado','cliente_id','usuario_id',
						   'evento_id','fecha_final','observacion_1','observacion_2','secuencia','nombre','titulo','color',
						   'varios_dias','costo_total','pago_total','saldo','decision','cantidad_personas',
						   'cantidad_mesas','cantidad_sillas','cafe','audiovisual'];
    // protected $hidden = [];
    // protected $dates = [];
	protected $guard_name = 'web';
	
	protected $revisionCreationsEnabled = true;
	protected $revisionFormattedFieldNames = array(
		'fecha_inicio' => 'fecha de inicio',
		'fecha_final' => 'fecha final',
		'hora_inicio' => 'hora inicio',
		'hola_final' => 'hora final',
		'monto_adelanto'  => 'monto adelanto',
		'estado'  => 'estado',
		'cliente_id'  => 'cliente',
		'evento_id'  => 'evento',
		'observacion_1'  => 'observación datos generales',
		'observacion_2'  => 'observación logistica',
		'nombre'  => 'registro de reservación',
		'titulo'  => 'título',
		'color'  => 'color de evento',
		'varios_dias'  => 'evento por varios días',
		'costo_total'  => 'costo total de rervación',
		'pago_total'  => 'pago total de reservación',
		'saldo'  => 'saldo de pago',
		'cantidad_personas'  => 'cantidad de personas',
		'cantidad_mesas'  => 'cantidad de mesas',
		'cantidad_sillas'  => 'cantidad de sillas',
		'cafe'  => 'café',
		'audiovisual'  => 'equipo audiovisual',
	);

    /*------------------------------------------------------------------------
    | FUNCTIONS
    |-----------------------------------------------------------------------*/

	public static function boot()
    {
		parent::boot();
		
		self::creating(function($model)
		{
			$secuencia = Reservacion::all()->max('secuencia');
			$prefix = Reservacion::get_prefix();
			$suffix = $secuencia ? ($secuencia+1) : 1;
			
			$model->nombre = $prefix . str_pad($suffix, 5, "0", STR_PAD_LEFT);
			$model->secuencia = $suffix;
			
			$model->saldo = Reservacion::calcular_saldo($model);	
        });
		
		self::updating(function($model)
		{
			$model->saldo = Reservacion::calcular_saldo($model);
        });
    }
	
	private static function calcular_saldo($model)
	{
		$saldo = 0;
		$costo = $model->costo_total;
		$monto_inicial = $model->monto_adelanto;
		$pago = $model->pago_total;
		$saldo = $costo - $monto_inicial - $pago;
		
		return $saldo;
	}
	
	private static function get_prefix()
	{
		return "SAEL";
	}
	
	public function identifiableName()
    {
        return $this->nombre;
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
		return $this->belongsToMany('App\Models\Salon', 'reservacion_salon','reservacion_id') ;
	}
	
	public function equipo()
	{
		return $this->belongsTo('App\Models\Equipo');
	}
	
    /*-------------------------------------------------------------------------
    | SCOPES
    |------------------------------------------------------------------------*/

    /*------------------------------------------------------------------------
    | ACCESORS
    |-----------------------------------------------------------------------*/

    /*------------------------------------------------------------------------
    | MUTATORS
    |------------------------------------------------------------------------*/
}
