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
 * @property ConsumoAguaAnual $consumo_agua_anual
 * @property ConsumoDiesel $consumo_diesel
 * @property ConsumoDieselAnual $consumo_diesel_anual
 * @property ConsumoEnergetico $consumo_energetico
 * @property ConsumoEnergeticoAnual $consumo_energetico_anual
 * @property ConsumoGasolina $consumo_gasolina
 * @property ConsumoGasolinaAnual $consumo_gasolina_anual
 * @property ConsumoPapel $consumo_papel
 * @property ConsumoPapelAnual $consumo_papel_anual
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

	public function consumo_agua_anual()
	{
		return $this->hasOne(ConsumoAguaAnual::class, 'id_colegio');
	}

	public function consumo_diesel()
	{
		return $this->hasOne(ConsumoDiesel::class, 'id_colegio');
	}

	public function consumo_diesel_anual()
	{
		return $this->hasOne(ConsumoDieselAnual::class, 'id_colegio');
	}

	public function consumo_energetico()
	{
		return $this->hasOne(ConsumoEnergetico::class, 'id_colegio');
	}

	public function consumo_energetico_anual()
	{
		return $this->hasOne(ConsumoEnergeticoAnual::class, 'id_colegio');
	}

	public function consumo_gasolina()
	{
		return $this->hasOne(ConsumoGasolina::class, 'id_colegio');
	}

	public function consumo_gasolina_anual()
	{
		return $this->hasOne(ConsumoGasolinaAnual::class, 'id_colegio');
	}

	public function consumo_papel()
	{
		return $this->hasOne(ConsumoPapel::class, 'id_colegio');
	}

	public function consumo_papel_anual()
	{
		return $this->hasOne(ConsumoPapelAnual::class, 'id_colegio');
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
