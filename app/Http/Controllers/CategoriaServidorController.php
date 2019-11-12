<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CategoriaServidor;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaServidorFormRequest;
use DB;


class CategoriaServidorController extends Controller
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
            $categoria_servidor=DB::table('categoria_servidor')->where('codigoCategoriaServidor','LIKE','%'.$query.'%')
           
            ->orderBy('codigoCategoriaServidor','desc')
            ->paginate(10);
            return view('almacen.categoriaServidor.index',["categoria_servidor"=>$categoria_servidor,"searchText"=>$query]);
        }
    }

    public function show($codigoCategoriaServidor)
    {
        return view("almacen.categoriaServidor.show",["categoria_servidor"=>CategoriaServidor::findOrFail($codigoCategoriaServidor)]);
    }

    

    public function edit($codigoCategoriaServidor)
    {
         return view("almacen.categoriaServidor.edit",["categoria_servidor"=>CategoriaServidor::findOrFail($codigoCategoriaServidor)]);
    }

    public function update(CategoriaServidorFormRequest $request,$codigoCategoriaServidor)
    {
      $categoria_servidor=CategoriaServidor::findOrFail($codigoCategoriaServidor);
      $categoria_servidor->nombreCategoriaServidor=$request->get('nombreCategoriaServidor');

      $categoria_servidor->update();
      return Redirect::to('almacen/categoriaServidor');
    }

    public function create()
     {
        return view("almacen.categoriaServidor.create");
     }

     public function store (Request $request)
     {
         $categoria_servidor=new CategoriaServidor;
         $categoria_servidor->nombreCategoriaServidor=$request->get('nombreCategoriaServidor');
         

         $categoria_servidor->save();
         return Redirect::to('almacen/categoriaServidor');

     }
    
     public function destroy($codigoCategoriaServidor)
     {
         $categoria_servidor=CategoriaServidor::findOrFail($codigoCategoriaServidor);
         $categoria_servidor->estadoCategoriaServidor='0';
         $categoria_servidor->update();
         return Redirect::to('almacen/categoriaServidor');
     }

     public function cambiar($codigoCategoriaServidor){
        $categoria_servidor=CategoriaServidor::findOrFail($codigoCategoriaServidor);
        $categoria_servidor->estadoCategoriaServidor='1';
        $categoria_servidor->update();
        return Redirect::to('almacen/categoriaServidor');

    } 

}
