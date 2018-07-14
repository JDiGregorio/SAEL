<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Formulario;
use App\Notifications\ReiniciarPasswordNotification as ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;
    use CrudTrait;
    use HasRoles;
	
	protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
	
	/*-------- RELATIONS --------*/
	
	public function reservaciones()
	{
		return $this-> hasMany('App\Models\Reservacion');
	}
}
