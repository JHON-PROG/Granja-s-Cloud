<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
  protected $table='venta';

  protected $primaryKey='Cod_venta';

  public $timestamps=false;

  protected $fillable =[
    'Cod_venta',
    'Cod_cliente',
    'Cod_Vendedor',
    'Fecha',
    'Forma_DE_Pago',
    'Vr_Neto',
    'Impuesto',
    'Descuento',
    'Vr_Total_A_Pagar'


  ];

    // para gyurdar datos no recurentes
    protected $guarded = [];
}
