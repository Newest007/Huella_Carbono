<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConsumoEnergetico
 * 
 * @property string|null $id_colegio
 * @property int|null $id_Anio
 * @property string|null $Mes
 * @property float|null $Consumo_kWts
 * @property float|null $Ton_CO2
 * 
 * @property Colegio|null $colegio
 * @property ConsumoEnergeticoAnual|null $consumo_energetico_anual
 *
 * @package App\Models
 */
class ConsumoEnergetico extends Model
{
	protected $table = 'consumo_energetico';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_Anio' => 'int',
		'Consumo_kWts' => 'float',
		'Ton_CO2' => 'float'
	];

	protected $fillable = [
		'id_colegio',
		'id_Anio',
		'Mes',
		'Consumo_kWts',
		'Ton_CO2'
	];

	public function colegio()
	{
		return $this->belongsTo(Colegio::class, 'id_colegio');
	}

	public function consumo_energetico_anual()
	{
		return $this->belongsTo(ConsumoEnergeticoAnual::class, 'id_Anio');
	}
}
