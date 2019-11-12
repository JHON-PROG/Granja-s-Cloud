<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    //
    protected $table='detalle_venta';

    protected $primaryKey='Cod_venta';

    public $timestamps=false;

    protected $fillable =[
      'Cod_venta',
      'cod_producto',
      'cantidad',
      'vr_unitario',
      'vr_total'

    ];

      // para gyurdar datos no recurentes
      protected $guarded = [
      ];

}
