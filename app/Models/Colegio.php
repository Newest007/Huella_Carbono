<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Colegio
 * 
 * @property string $id_colegio
 * @property string|null $Nombre
 * @property string|null $Ubicacion
 * 
 * @property ConsumoAgua $consumo_agua
 * @property Collection|ConsumoAguaAnual[] $consumo_agua_anuals
 * @property ConsumoDiesel $consumo_diesel
 * @property Collection|ConsumoDieselAnual[] $consumo_diesel_anuals
 * @property ConsumoEnergetico $consumo_energetico
 * @property Collection|ConsumoEnergeticoAnual[] $consumo_energetico_anuals
 * @property ConsumoGasolina $consumo_gasolina
 * @property Collection|ConsumoGasolinaAnual[] $consumo_gasolina_anuals
 * @property ConsumoPapel $consumo_papel
 * @property Inventario $inventario
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Colegio extends Model
{
	protected $table = 'colegio';
	protected $primaryKey = 'id_colegio';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'Nombre',
		'Ubicacion'
	];

	public function consumo_agua()
	{
		return $this->hasOne(ConsumoAgua::class, 'id_colegio');
	}

	public function consumo_agua_anuals()
	{
		return $this->hasMany(ConsumoAguaAnual::class, 'id_colegio');
	}

	public function consumo_diesel()
	{
		return $this->hasOne(ConsumoDiesel::class, 'id_colegio');
	}

	public function consumo_diesel_anuals()
	{
		return $this->hasMany(ConsumoDieselAnual::class, 'id_colegio');
	}

	public function consumo_energetico()
	{
		return $this->hasOne(ConsumoEnergetico::class, 'id_colegio');
	}

	public function consumo_energetico_anuals()
	{
		return $this->hasMany(ConsumoEnergeticoAnual::class, 'id_colegio');
	}

	public function consumo_gasolina()
	{
		return $this->hasOne(ConsumoGasolina::class, 'id_colegio');
	}

	public function consumo_gasolina_anuals()
	{
		return $this->hasMany(ConsumoGasolinaAnual::class, 'id_colegio');
	}

	public function consumo_papel()
	{
		return $this->hasOne(ConsumoPapel::class, 'id_colegio');
	}

	public function inventario()
	{
		return $this->hasOne(Inventario::class, 'id_colegio');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'id_colegio');
	}
}
