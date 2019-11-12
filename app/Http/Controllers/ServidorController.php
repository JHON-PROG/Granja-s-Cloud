<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Servidor;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ServidorFormRequest;
use DB;



class ServidorController extends Controller 
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
            $servidor=DB::table('servidor as s')
            ->join('categoria_servidor as c','c.codigoCategoriaServidor', '=','s.categoria')
            ->SELECT('s.codigoServidor','s.ipInterna','s.nombreServidor','s.ipInterna','s.ipExterna','s.esCluster','c.nombreCategoriaServidor','s.servidorPadre','s.estadoServidor')
            ->where('s.ipInterna','LIKE','%'.$query.'%')
            ->orderBy('s.codigoServidor','desc')
            ->groupBy('s.codigoServidor','s.ipInterna','s.nombreServidor','s.ipInterna','s.ipExterna','s.esCluster','c.nombreCategoriaServidor','s.servidorPadre','s.estadoServidor')
            ->paginate(10);
            return view('almacen.servidor.index',["servidor"=>$servidor,"searchText"=>$query]);
        }
    }

    public function show($ipInterna)
    {
        return view("almacen.servidor.show",["servidor"=>Servidor::findOrFail($ipInterna)]);
    }

    public function create()
     {
        $categoria_servidor=DB::table('categoria_servidor as e')
        ->select(DB::raw('CONCAT(e.codigoCategoriaServidor," ",e.nombreCategoriaServidor)  as categoria'),'e.codigoCategoriaServidor')
        ->where('e.estadoCategoriaServidor','=','1')
        ->get();
         return view("almacen.servidor.create",["categoria_servidor"=>$categoria_servidor]);
     }

     public function store (Request $request)
     {
         $servidor=new Servidor;
         $servidor->nombreServidor=$request->get('nombreServidor');
         $servidor->ipInterna=$request->get('ipInterna');
         $servidor->ipExterna=$request->get('ipExterna');
         $servidor->categoria=$request->get('categoria');
         $servidor->esCluster=$request->get('esCluster');
         $servidor->servidorPadre=$request->get('servidorPadre');
         

         $servidor->save();
         return Redirect::to('almacen/servidor');

     }

     public function edit($ipInterna)
    {
         return view("almacen.servidor.edit",["servidor"=>Servidor::findOrFail($ipInterna)]);
    }

     public function update(ServidorFormRequest $request,$ipInterna)
    {
         $servidor=Servidor::findOrFail($ipInterna);
         $servidor->nombreServidor=$request->get('nombreServidor');
         $servidor->ipInterna=$request->get('ipInterna');
         $servidor->ipExterna=$request->get('ipExterna');
         $servidor->esCluster=$request->get('esCluster');
         $servidor->servidorPadre=$request->get('servidorPadre');
         $servidor->update();
         return Redirect::to('almacen/servidor');
    }

    public function destroy($ipInterna)
    {
        $servidor=Servidor::findOrFail($ipInterna);
        $servidor->estadoServidor='0';
        $servidor->update();
        return Redirect::to('almacen/servidor');
    }

    public function cambiar($ipInterna){
        $servidor=Servidor::findOrFail($ipInterna);
        $servidor->estadoServidor='1';
        $servidor->update();
        return Redirect::to('almacen/servidor');

    }


  

}

/*  if(preg_match('/^[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}$/',$servidor))
         {
             echo 'IP es valida!';
          }
          else
          {
             echo 'IP no es valida';
          }
*/