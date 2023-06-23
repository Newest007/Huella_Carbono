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
 * @property ConsumoEnergetico $consumo_energetico
 *
 * @package App\Models
 */
class ConsumoEnergeticoAnual extends Model
{
	protected $table = 'consumo_energetico_anual';
	protected $primaryKey = 'id_Anio';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_Anio' => 'int',
		'Consumo_kWts_Anual' => 'float',
		'Ton_CO2_Anual' => 'float'
	];

	protected $fillable = [
		'id_colegio',
		'Consumo_kWts_Anual',
		'Ton_CO2_Anual'
	];

	public function colegio()
	{
		return $this->belongsTo(Colegio::class, 'id_colegio');
	}

	public function consumo_energetico()
	{
		return $this->hasOne(ConsumoEnergetico::class, 'id_Anio');
	}
}
