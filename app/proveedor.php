<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
	protected $table='proveedores';

	protected $primaryKey='nit';

	public $timestamps=false;

	protected $fillable =['nit','razonsocial','celular','ciudad','direccion','email'];

    // para gyurdar datos no recurentes
    protected $guarded = [];
}
