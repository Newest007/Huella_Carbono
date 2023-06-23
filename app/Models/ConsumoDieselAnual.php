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
 * @property ConsumoDiesel $consumo_diesel
 *
 * @package App\Models
 */
class ConsumoDieselAnual extends Model
{
	protected $table = 'consumo_diesel_anual';
	protected $primaryKey = 'id_Anio';
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
		'Cantidad_Anual',
		'Combustible_m3_Anual',
		'Ton_CO2_m3_Anual',
		'kGr_CO2_m3_Anual'
	];

	public function colegio()
	{
		return $this->belongsTo(Colegio::class, 'id_colegio');
	}

	public function consumo_diesel()
	{
		return $this->hasOne(ConsumoDiesel::class, 'id_Anio');
	}
}
