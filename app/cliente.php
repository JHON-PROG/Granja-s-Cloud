<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	protected $table='cliente';

	protected $primaryKey='nit';

	public $timestamps=false;

	protected $fillable =[
	'nit',
	'razonSocial',
	'nombreComercial',
	'contacto',
	'estadoCliente'
	];

    // para gyurdar datos no recurentes
    protected $guarded = [];
}
