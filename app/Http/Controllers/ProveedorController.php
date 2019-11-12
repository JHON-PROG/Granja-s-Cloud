<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Proveedor;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProveedorFormRequest;
use DB;

class ProveedorController extends Controller  implements Funciones
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
            $proveedores=DB::table('proveedores')->where('razonsocial','LIKE','%'.$query.'%')
            ->orderBy('nit','desc')
            ->paginate(10);
            return view('almacen.proveedor.index',["proveedores"=>$proveedores,"searchText"=>$query]);
        }
    }

    public function show($nit)
    {
        return view("almacen.proveedor.show",["proveedores"=>Proveedor::findOrFail($nit)]);
    }

    public function destroy($nit)
    {
     $proveedor=Proveedor::findOrFail($nit);
        $proveedor->delete();
        //dd($cateoria); para enterarme si si esta lleando al metodo pro consola
        return Redirect::to('almacen/proveedor');
    }

    public function edit($nit)
    {
         return view("almacen.proveedor.edit",["proveedores"=>Proveedor::findOrFail($nit)]);
    }

    public function update(ProveedorFormRequest $request,$nit)
    {
      $proveedor=Proveedor::findOrFail($nit);
      $proveedor->razonsocial=$request->get('razonsocial');
      $proveedor->celular=$request->get('celular');
      $proveedor->ciudad=$request->get('ciudad');
      $proveedor->direccion=$request->get('direccion');
      $proveedor->email=$request->get('email');
      $proveedor->update();
      return Redirect::to('almacen/proveedor');
    }

    public function create()
     {
         return view("almacen.proveedor.create");
     }

     public function store (Request $request)
     {
         $proveedor=new Proveedor;
         $proveedor->nit=$request->get('nit');
         $proveedor->razonsocial=$request->get('razonsocial');
         $proveedor->celular=$request->get('celular');
         $proveedor->ciudad=$request->get('ciudad');
         $proveedor->direccion=$request->get('direccion');
         $proveedor->email=$request->get('email');
         $proveedor->save();
         return Redirect::to('almacen/proveedor');

     }

}
