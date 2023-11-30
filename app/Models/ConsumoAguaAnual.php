<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConsumoAguaAnual
 * 
 * @property string|null $id_colegio
 * @property int $id_Anio
 * @property float|null $Consumo_Agua_Anual
 * @property float|null $Ton_CO2_Anual
 * 
 * @property Colegio|null $colegio
 *
 * @package App\Models
 */
class ConsumoAguaAnual extends Model
{
	protected $table = 'consumo_agua_anual';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_Anio' => 'int',
		'Consumo_Agua_Anual' => 'float',
		'Ton_CO2_Anual' => 'float'
	];

	protected $fillable = [
		'id_colegio',
		'id_Anio',
		'Consumo_Agua_Anual',
		'Ton_CO2_Anual'
	];

	public function colegio()
	{
		return $this->belongsTo(Colegio::class, 'id_colegio');
	}
}
