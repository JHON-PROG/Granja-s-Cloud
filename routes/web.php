<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
  
  });
  
  
  Route::resource('almacen/categoriaServidor','CategoriaServidorController');
  Route::delete('almacen/categoriaServidor/cambiar/{categoriaServidor}','CategoriaServidorController@cambiar');
  
  Route::resource('almacen/servidor','ServidorController');
  Route::delete('almacen/servidor/cambiar/{servidor}','ServidorController@cambiar');
  
  Route::resource('almacen/cliente','ClienteController');
  Route::delete('almacen/cliente/cambiar/{cliente}','ClienteController@cambiar');

  Route::resource('almacen/usuario','UserController');
  Route::delete('almacen/usuario/cambiar/{usuario}','UserController@cambiar');

  

  Auth::routes();
  Route::get('/home', 'HomeController@index')->name('home');