<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Inventario
 * 
 * @property string|null $id_colegio
 * @property int $Cantidad
 * @property string $Tipo
 * @property string $Marca
 * @property string $Descripcion
 * @property string $Extras
 * @property string $Ubicacion
 * @property float $Consumo_Kw
 * 
 * @property Colegio|null $colegio
 *
 * @package App\Models
 */
class Inventario extends Model
{
	protected $table = 'inventario';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Cantidad' => 'int',
		'Consumo_Kw' => 'float'
	];

	protected $fillable = [
		'id_colegio',
		'Cantidad',
		'Tipo',
		'Marca',
		'Descripcion',
		'Extras',
		'Ubicacion',
		'Consumo_Kw'
	];

	public function colegio()
	{
		return $this->belongsTo(Colegio::class, 'id_colegio');
	}
}
