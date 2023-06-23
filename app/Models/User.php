<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;

	protected $table = 'user';
	protected $primaryKey = 'id_usuario';
	public $incrementing = false;
	public $timestamps = false;

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'id_rol',
		'nombre',
		'email',
		'password',
		'remember_token'
	];


	public function role()
	{
		return $this->belongsTo(Role::class, 'id_rol');
	}

	public function colegio()
	{
		return $this->belongsTo(Colegio::class, 'id_usuario');
	}
	
}
