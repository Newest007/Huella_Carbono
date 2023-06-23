<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConsumoGasolinaAnual
 * 
 * @property string|null $id_colegio
 * @property int $id_Anio
 * @property float|null $Cantidad_Anual
 * @property float|null $Combustible_m3_Anual
 * @property float|null $Ton_CO2_m3_Anual
 * @property float|null $Km_CO2_m3_Anual
 * 
 * @property Colegio|null $colegio
 * @property ConsumoGasolina $consumo_gasolina
 *
 * @package App\Models
 */
class ConsumoGasolinaAnual extends Model
{
	protected $table = 'consumo_gasolina_anual';
	protected $primaryKey = 'id_Anio';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_Anio' => 'int',
		'Cantidad_Anual' => 'float',
		'Combustible_m3_Anual' => 'float',
		'Ton_CO2_m3_Anual' => 'float',
		'Km_CO2_m3_Anual' => 'float'
	];

	protected $fillable = [
		'id_colegio',
		'Cantidad_Anual',
		'Combustible_m3_Anual',
		'Ton_CO2_m3_Anual',
		'Km_CO2_m3_Anual'
	];

	public function colegio()
	{
		return $this->belongsTo(Colegio::class, 'id_colegio');
	}

	public function consumo_gasolina()
	{
		return $this->hasOne(ConsumoGasolina::class, 'id_Anio');
	}
}
