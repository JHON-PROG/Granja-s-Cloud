<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Compra;
use App\DetalleCompra;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CompraFormRequest;
use DB;


use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class CompraController extends Controller
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
          $compra=DB::table('compra as c')
          ->join('proveedores as p','p.nit', '=','c.proveedor')
          ->join('detalle_compra as d','d.id_compra','=','c.codigo_compra')
          ->SELECT('c.codigo_compra','p.razonsocial','c.fecha_compra','c.vr_neto_compra','c.impuesto_compra', DB::raw('sum(vr_total_compra) as Total'))
          ->where('c.codigo_compra','LIKE','%'.$query.'%')
          ->orderBy('c.codigo_compra','desc')
          ->groupBy('c.codigo_compra','p.razonsocial','c.fecha_compra','c.vr_neto_compra','c.impuesto_compra')
          ->paginate(10);
          return view('almacen.compra.index',["compra"=>$compra,"searchText"=>$query]);
      }
    }

    public function create(){

        $proveedores=DB::table('proveedores')->get();
        $productos=DB::table('productos as pro')
           ->select(DB::raw('CONCAT(pro.procodigo, " ", pro.pronombre) as productos'),'pro.procodigo')
           ->get();
    
           return view("almacen.compra.create",["proveedores"=>$proveedores,"productos"=>$productos]);
      }
    
      public function store (CompraFormRequest $request){
    
        try{
          DB::beginTransaction();
    
          $compra=new Compra;
    
          $compra->codigo_compra=$request->get('codigo_compra');
          $compra->proveedor=$request->get('proveedor');
          $compra->fecha_compra=$request->get('fecha');
          $compra->vr_neto_compra=$request->get('vrneto');
          $compra->impuesto_compra=$request->get('impuesto_compra');
          $compra->descuento_compra=$request->get('descuento_compra');
          $compra->vr_total_compra=$request->get('vr_total_compra');
          
    
          $compra->save();
    
          $cod_producto = $request->get('cod_producto');
          $cantidad = $request->get('cantidad');
          $vr_unitario = $request->get('vr_unitario');
          $vr_total = $request->get('vr_total');
    
    
    
    
          $cont = 0;
          while($cont < count($cod_producto)){
    
    
            $detalle = new DetalleCompra;
    
            $detalle->id_compra=$request->get('codigo_compra');
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
        return Redirect::to('almacen/compra');
    
    
      }
      public function show ($id){
       
        $compra=DB::table('compra as c')
          ->join('proveedores as p','p.nit', '=','c.proveedor')
          ->join('detalle_compra as d','d.id_compra','=','c.codigo_compra')
          ->SELECT('c.codigo_compra','p.razonsocial','c.fecha_compra','c.vr_neto_compra','c.impuesto_compra', DB::raw('sum(d.cantidad *d.vr_unitario) as Total'))
          ->where('c.codigo_compra','=',$id)
          ->orderBy('c.codigo_compra','desc')
          ->groupBy('c.codigo_compra','p.razonsocial','c.fecha_compra','c.vr_neto_compra','c.impuesto_compra')
          ->first();
         
          //Detalles
    	$detalles = DB::table('detalle_compra as d')
      //Unir detale_ingreso con la tabla articulo
      ->join('productos as a', 'a.procodigo', '=', 'd.cod_producto')
      ->select('a.pronombre', 'd.cantidad', 'd.vr_unitario', 'd.vr_total')
     ->where('d.id_compra', '=', $id)
      ->get();
        
        return view("almacen.compra.detail",["compra"=>$compra,"detalles" => $detalles]);
        
    }
  
      

}