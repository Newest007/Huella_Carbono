<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property string $id_rol
 * @property string|null $nombre_rol
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';
	protected $primaryKey = 'id_rol';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'nombre_rol'
	];

	public function users()
	{
		return $this->hasMany(User::class, 'id_rol');
	}
}
