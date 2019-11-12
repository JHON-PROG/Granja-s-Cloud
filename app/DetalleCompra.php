<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    //
    protected $table='detalle_compra';

    protected $primaryKey='id_compra';

    public $timestamps=false;

    protected $fillable =[
      'id_compra',
      'cod_producto',
      'cantidad',
      'vr_unitario',
      'vr_total'

    ];

      // para gyurdar datos no recurentes
      protected $guarded = [
      ];
}
