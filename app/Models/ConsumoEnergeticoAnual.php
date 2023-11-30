<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConsumoEnergeticoAnual
 * 
 * @property string|null $id_colegio
 * @property int $id_Anio
 * @property float|null $Consumo_kWts_Anual
 * @property float|null $Ton_CO2_Anual
 * 
 * @property Colegio|null $colegio
 *
 * @package App\Models
 */
class ConsumoEnergeticoAnual extends Model
{
	protected $table = 'consumo_energetico_anual';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_Anio' => 'int',
		'Consumo_kWts_Anual' => 'float',
		'Ton_CO2_Anual' => 'float'
	];

	protected $fillable = [
		'id_colegio',
		'id_Anio',
		'Consumo_kWts_Anual',
		'Ton_CO2_Anual'
	];

	public function colegio()
	{
		return $this->belongsTo(Colegio::class, 'id_colegio');
	}
}
