<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConsumoPapel
 * 
 * @property string|null $id_colegio
 * @property int|null $id_Anio
 * @property string|null $Mes
 * @property float|null $Consumo_m3
 * @property float|null $Ton_CO2
 * 
 * @property Colegio|null $colegio
 * @property ConsumoPapelAnual|null $consumo_papel_anual
 *
 * @package App\Models
 */
class ConsumoPapel extends Model
{
	protected $table = 'consumo_papel';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_Anio' => 'int',
		'Consumo_m3' => 'float',
		'Ton_CO2' => 'float'
	];

	protected $fillable = [
		'id_colegio',
		'id_Anio',
		'Mes',
		'Consumo_m3',
		'Ton_CO2'
	];

	public function colegio()
	{
		return $this->belongsTo(Colegio::class, 'id_colegio');
	}

	public function consumo_papel_anual()
	{
		return $this->belongsTo(ConsumoPapelAnual::class, 'id_Anio');
	}
}
