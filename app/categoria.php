<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
	protected $table='categoria';

	protected $primaryKey='idcategoria';

	public $timestamps=false;

	protected $fillable =['nombre','descripcion','condicion'];

    // para gyurdar datos no recurentes
    protected $guarded = [];
}
