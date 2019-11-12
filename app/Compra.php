<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
  protected $table='compra';

  protected $primaryKey='codigo_compra';

  public $timestamps=false;

  protected $fillable =[
    'codigo_compra',
    'proveedor',
    'fecha_compra',
    'vr_neto_compra',
    'impuesto_compra',
    'descuento_compra',
    'vr_total_compra'
  ];

    // para gyurdar datos no recurentes
    protected $guarded = [];
}
