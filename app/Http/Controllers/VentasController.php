<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\venta;
use App\DetalleVenta;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\VentaFormRequest;
use DB;


use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class VentasController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

public function index(Request $request)
  {
      if ($request)
      {
          $query=trim($request->get('searchText'));
          $ventas=DB::table('venta as v')
          ->join('clientes as c','c.numero_doc', '=','v.Cod_Cliente')
          ->join('detalle_venta as d','d.cod_venta','=','v.Cod_venta')
          ->SELECT('v.Cod_venta','c.nombrecliente','c.apellidocliente','v.fecha','v.Forma_De_Pago','v.Vr_Neto','Vr_Total_A_Pagar')
          ->where('v.Cod_venta','LIKE','%'.$query.'%')
          ->orderBy('v.Cod_venta','desc')
          ->groupBy('v.Cod_venta','c.nombrecliente','c.apellidocliente','v.fecha','v.Forma_De_Pago','v.Vr_Neto','Vr_Total_A_Pagar')
          ->paginate(10);
          return view('almacen.venta.index',["ventas"=>$ventas,"searchText"=>$query]);
      }
  }

  public function create(){
////array clientes
    $clientes=DB::table('clientes as c')
    ->select(DB::raw('CONCAT(c.numero_doc, " " ,c.nombrecliente, " ",c.apellidocliente) as clientes'),'c.numero_doc')
    ->get();

    ////array clientes
  $empleados=DB::table('empleados as e')
  ->select(DB::raw('CONCAT(e.numero_doc, " " ,e.nombre_emp, " ",e.apellido_emp) as empleados'),'e.numero_doc')
  ->get();


////// array productos
    $productos=DB::table('productos as pro')
       ->select(DB::raw('CONCAT(pro.procodigo, " ", pro.pronombre) as productos'),'pro.procodigo','pro.proprecio_venta')
       ->get();

       $ventas = Db::table('venta')->max('Cod_venta');
       $ventas = $ventas+1;

       return view("almacen.venta.create",["clientes"=>$clientes,"productos"=>$productos,"ventas"=>$ventas,"empleados"=>$empleados]);
  }

  public function store (VentaFormRequest $request){

    $ventas = Db::table('venta')->max('Cod_venta');
    $ventas = $ventas+1;

    try{
      DB::beginTransaction();

      $venta=new Venta;

      $contador=0;
      $total=0;
      $cod_producto = $request->get('cod_producto');
      $vr_total = $request->get('total');
      while($contador < count($cod_producto)){
        $valor_total= $vr_total[$contador];
        $total=$total+$valor_total;
        $contador=$contador+1;
      }

      $venta->Cod_venta=$ventas;
      $venta->Cod_Cliente=$request->get('codcliente');
      $venta->Cod_Vendedor=$request->get('codvendedor');
      $venta->Fecha=$request->get('fecha');
      $venta->Forma_De_Pago=$request->get('Formadepago');
      $venta->Vr_Neto=$request->get('vrneto');
      $venta->Impuesto=$request->get('impuesto');
      $venta->Descuento=$request->get('descuento');
      $venta->Vr_Total_A_Pagar=$total;
      $venta->save();

      $cod_producto = $request->get('cod_producto');
      $cantidad = $request->get('cantidad');
      $vr_unitario = $request->get('vr_unitario');
      $vr_total = $request->get('total');




      $cont = 0;
      while($cont < count($cod_producto)){


        $detalle = new DetalleVenta;

        $detalle->cod_venta=$ventas;
        $detalle->cod_producto= $cod_producto[$cont];
        $detalle->cantidad= $cantidad[$cont];
        $detalle->vr_unitario= $vr_unitario[$cont];
        $detalle->vr_total= $vr_total[$cont];
        $detalle->save();
        $cont=$cont+1;


    }

      DB::commit();

    }catch(\Exceeption $e)
    {
      DB::rollback();

    }
    return Redirect::to('almacen/venta');


  }


  public function show($id)
      {
      	//Cabecera
        $ventas=DB::table('venta as v')
        ->join('clientes as c','c.numero_doc', '=','v.Cod_Cliente')
        ->join('detalle_venta as d','d.cod_venta','=','v.Cod_venta')
        ->SELECT('v.Cod_venta','c.nombrecliente','c.apellidocliente','v.fecha','v.Forma_De_Pago','v.Vr_Neto','Vr_Total_A_Pagar')
        ->where('v.Cod_venta','=',$id)
        ->orderBy('v.Cod_venta','desc')
        ->groupBy('v.Cod_venta','c.nombrecliente','c.apellidocliente','v.fecha','v.Forma_De_Pago','v.Vr_Neto','Vr_Total_A_Pagar')
      	->first();


      	$detalles=DB::table('detalle_venta as d')
      			->join('productos as a','a.procodigo', '=', 'd.cod_producto')
      			->select('a.pronombre as articulo', 'd.cantidad as cantidad', 'd.vr_unitario', 'd.vr_total')
      			->where('d.cod_venta','=',$id)
      			->get();

      	return view('almacen.venta.show',[
      				"ventas" => $ventas,"detalles" => $detalles
      			]);
      }


  public function destroy(){

  }


    //
}
