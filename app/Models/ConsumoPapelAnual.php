<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConsumoPapelAnual
 * 
 * @property string|null $id_colegio
 * @property int $id_Anio
 * @property float|null $Consumo_m3_Anual
 * @property float|null $Ton_CO2_Anual
 * 
 * @property ConsumoPapel $consumo_papel
 *
 * @package App\Models
 */
class ConsumoPapelAnual extends Model
{
	protected $table = 'consumo_papel_anual';
	protected $primaryKey = 'id_Anio';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_Anio' => 'int',
		'Consumo_m3_Anual' => 'float',
		'Ton_CO2_Anual' => 'float'
	];

	protected $fillable = [
		'id_colegio',
		'Consumo_m3_Anual',
		'Ton_CO2_Anual'
	];

	public function consumo_papel()
	{
		return $this->hasOne(ConsumoPapel::class, 'id_Anio');
	}
}
