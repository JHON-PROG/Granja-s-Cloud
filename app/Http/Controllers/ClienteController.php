<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cliente;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ClienteFormRequest;
use DB;

class ClienteController extends Controller
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
            $cliente=DB::table('cliente')         
            ->where('nit','LIKE','%'.$query.'%')
            ->orderBy('nit','desc')
            ->paginate(10);
            return view('almacen.cliente.index',["cliente"=>$cliente,"searchText"=>$query]);
        }
    }

    public function show($nit)
    {
        return view("almacen.cliente.show",["cliente"=>Cliente::findOrFail($nit)]);
    }

    public function create()
    {
        return view("almacen.cliente.create");
    }

    public function store (Request $request)
    {
        $cliente=new Cliente;
        $cliente->nit=$request->get('nit');
        $cliente->razonSocial=$request->get('razonSocial');
        $cliente->nombreComercial=$request->get('nombreComercial');
        $cliente->contacto=$request->get('contacto');
        

        $cliente->save();
        return Redirect::to('almacen/cliente');

    }

    public function edit($nit)
    {
         return view("almacen.cliente.edit",["cliente"=>Cliente::findOrFail($nit)]);
    }

     public function update(ClienteFormRequest $request,$nit)
    {
         $cliente=Cliente::findOrFail($nit);
         $cliente->nit=$request->get('nit');
         $cliente->razonSocial=$request->get('razonSocial');
         $cliente->nombreComercial=$request->get('nombreComercial');
         $cliente->contacto=$request->get('contacto');
         $cliente->update();
         return Redirect::to('almacen/cliente');
    }

    public function destroy($nit)
    {
        $cliente=Cliente::findOrFail($nit);
        $cliente->estadoCliente='0';
        $cliente->update();
        return Redirect::to('almacen/cliente');
    }

    public function cambiar($nit){
        $cliente=Cliente::findOrFail($nit);
        $cliente->estadoCliente='1';
        $cliente->update();
        return Redirect::to('almacen/cliente');

    }

}
