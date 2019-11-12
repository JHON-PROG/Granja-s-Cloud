<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servidor extends Model
{
	protected $table='servidor';

	protected $primaryKey='ipInterna';

	public $timestamps=false;

	protected $fillable =['codigoServidor','nombreServidor','ipInterna','ipExterna','esCluster','categoria','servidorPadre','estadoServidor'];

    // para gyurdar datos no recurentes
    protected $guarded = [];
}
