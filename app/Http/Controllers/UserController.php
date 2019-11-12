<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UserFormRequest;
use DB;


class UserController extends Controller
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
            $usuarios=DB::table('users')->where('name','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(10);
            return view('almacen.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
        }
    }
      

    public function show($id)
    {
        return view('almacen.usuario.show',["usuarios"=>User::findOrFail($id)]);
    }


    public function create()
    {
        return view('almacen.usuario.create');
    }
 
    public function store (Request $request)
    {
        $usuarios=new User;
        $usuarios->name=$request->get('name');
        $usuarios->email=$request->get('email');
        $usuarios->password= bcrypt( $request->get('password'));
        $usuarios->save();
        return Redirect::to('almacen/usuario');
    }

    public function edit($id)
    {
         return view("almacen.usuario.edit",["usuarios"=>User::findOrFail($id)]);
    }

    public function update(UserFormRequest $request,$id)
    {
      $usuarios=User::findOrFail($id);
      $usuarios->name=$request->get('name');
      $usuarios->email=$request->get('email');
      $usuarios->password= bcrypt( $request->get('password'));
      $usuarios->update();
      return Redirect::to('almacen/usuario');
    }

    public function destroy($id)
    {
        $usuarios=User::findOrFail($id);
        $usuarios->delete();
        return Redirect::to('almacen/usuario');
    }

     public function cambiar($id){
        $usuarios=User::findOrFail($id);
        $usuarios->estadoUser='1';
        $usuarios->update();
        return Redirect::to('almacen/usuario');
    }

}