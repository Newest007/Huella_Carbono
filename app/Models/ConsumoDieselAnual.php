<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConsumoDieselAnual
 * 
 * @property string|null $id_colegio
 * @property int $id_Anio
 * @property float|null $Cantidad_Anual
 * @property float|null $Combustible_m3_Anual
 * @property float|null $Ton_CO2_m3_Anual
 * @property float|null $kGr_CO2_m3_Anual
 * 
 * @property Colegio|null $colegio
 *
 * @package App\Models
 */
class ConsumoDieselAnual extends Model
{
	protected $table = 'consumo_diesel_anual';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_Anio' => 'int',
		'Cantidad_Anual' => 'float',
		'Combustible_m3_Anual' => 'float',
		'Ton_CO2_m3_Anual' => 'float',
		'kGr_CO2_m3_Anual' => 'float'
	];

	protected $fillable = [
		'id_colegio',
		'id_Anio',
		'Cantidad_Anual',
		'Combustible_m3_Anual',
		'Ton_CO2_m3_Anual',
		'kGr_CO2_m3_Anual'
	];

	public function colegio()
	{
		return $this->belongsTo(Colegio::class, 'id_colegio');
	}
}
