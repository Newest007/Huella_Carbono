<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConsumoGasolina
 * 
 * @property string|null $id_colegio
 * @property int|null $id_Anio
 * @property string|null $Mes
 * @property float|null $Cantidad
 * @property float|null $Combustible_m3
 * @property float|null $Ton_CO2_m3
 * @property float|null $Km_CO2_m3
 * 
 * @property Colegio|null $colegio
 * @property ConsumoGasolinaAnual|null $consumo_gasolina_anual
 *
 * @package App\Models
 */
class ConsumoGasolina extends Model
{
	protected $table = 'consumo_gasolina';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_Anio' => 'int',
		'Cantidad' => 'float',
		'Combustible_m3' => 'float',
		'Ton_CO2_m3' => 'float',
		'Km_CO2_m3' => 'float'
	];

	protected $fillable = [
		'id_colegio',
		'id_Anio',
		'Mes',
		'Cantidad',
		'Combustible_m3',
		'Ton_CO2_m3',
		'Km_CO2_m3'
	];

	public function colegio()
	{
		return $this->belongsTo(Colegio::class, 'id_colegio');
	}

	public function consumo_gasolina_anual()
	{
		return $this->belongsTo(ConsumoGasolinaAnual::class, 'id_Anio');
	}
}
