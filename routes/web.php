<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::middleware(['auth',])->group(function () {

  Route::get('/', 'HomeController@index')->name('home');
  Route::resource('logins', 'LoginController');
  Route::resource('user',   'UserController');
  Route::resource('permission', 'PermissionController');
  Route::get('logs', 'HomeController@logs')->name('logs');
  Route::resource('roles',   'RolesController');
  Route::resource('gerencias',   'GerenciasController');
  Route::get('/gerencia/borrar/{gerencia_id}',   'GerenciasController@borrar');
  Route::resource('personal',   'PersonalController');
  Route::get('/personal/borrar/{personal_id}',   'PersonalController@borrar');

  Route::resource('votantes',   'VotantesController');
  Route::get('/resultado/votantes',   'VotantesController@resultado');
  Route::post('/resultado/votantes',   'VotantesController@votante');
  //Route::get('/votantes/{gerencia_id}/personal',   'VotantesController@personal');
  Route::get('/votantes/{ente_id}/gerencia',   'VotantesController@gerencia');
  Route::get('/ente/{gerencia_id}/personal',   'VotantesController@personal');
  Route::get('/votaciones/listado',   'VotantesController@listado');
  Route::get('/votaciones/listado/noejercidos',   'VotantesController@noejercidos');


});
