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
  Route::get('/personal/{personal_id}/1x10',   'PersonalController@perosonal1x10');
  Route::resource('votantes',   'VotantesController');
  Route::get('votante/1x10',   'VotantesController@personal_p');
  Route::get('/resultado/votantes',   'VotantesController@resultado');
  Route::post('/resultado/votantes',   'VotantesController@votante');
  Route::get('votante/{funcionario_id}/personal',   'VotantesController@personal_p_votacion');
  //Route::get('/votantes/{gerencia_id}/personal',   'VotantesController@personal');
  Route::get('/votantes/{ente_id}/gerencia',   'VotantesController@gerencia');
  Route::get('/ente/{gerencia_id}/personal',   'VotantesController@personal');
  Route::get('/votaciones/listado',   'VotantesController@listado');
  Route::get('/votaciones/listado/noejercidos',   'VotantesController@noejercidos');

  Route::get('/resultados/{ente_id}',   'HomeController@resultados');
  Route::get('/resultados/votaciones/{ente_id}',   'HomeController@votaciones');


  //Ruta para obtener las gerencias que está asignadas a un proyecto
Route::get('estado/{estado_id}/municipios', 'PersonalController@municipios')
    ->name('estado.municipios');

//Ruta para obtener todas las coordinaciones que están asignadas a una gerencia
Route::get('municipio/{municipio_id}/parroquias', 'PersonalController@parroquias')
    ->name('estado.municipios');

//Ruta para obtener todas los objetivos que están asignadas a una coordinacion
Route::get('objetivo/coordinacion/{id_coordinacion}', 'ObjetivoController@objetivoCoordinacion');

#############################################################################################
#############################################################################################

Route::DELETE('/notificaciones/borrar/{notificacion_id}', 'HomeController@borrarNotificacion')->name('borrarNotificacion');

Route::get('/reload-captcha','CatchaController@reloadCaptcha');


Route::post('personal/1p10/guardar',   'PersonalController@guardar');

Route::post('/votante/1x10/guardar',   'VotantesController@guardar');



});
