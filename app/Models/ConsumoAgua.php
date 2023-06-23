<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConsumoAgua
 * 
 * @property string|null $id_colegio
 * @property int|null $id_Anio
 * @property string|null $Mes
 * @property float|null $Consumo_m3
 * @property float|null $Ton_CO2_m3
 * 
 * @property Colegio|null $colegio
 * @property ConsumoAguaAnual|null $consumo_agua_anual
 *
 * @package App\Models
 */
class ConsumoAgua extends Model
{
	protected $table = 'consumo_agua';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_Anio' => 'int',
		'Consumo_m3' => 'float',
		'Ton_CO2_m3' => 'float'
	];

	protected $fillable = [
		'id_colegio',
		'id_Anio',
		'Mes',
		'Consumo_m3',
		'Ton_CO2_m3'
	];

	public function colegio()
	{
		return $this->belongsTo(Colegio::class, 'id_colegio');
	}

	public function consumo_agua_anual()
	{
		return $this->belongsTo(ConsumoAguaAnual::class, 'id_Anio');
	}
}
