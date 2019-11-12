<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaServidor extends Model
{
	protected $table='categoria_servidor';

	protected $primaryKey='codigoCategoriaServidor';

	public $timestamps=false;

	protected $fillable =['codigoCategoriaServidor','nombreCategoriaServidor','estadoCategoriaServidor'];

    // para gyurdar datos no recurentes
    protected $guarded = [];
}
