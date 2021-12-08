<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\EscuelaController; 
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

 
 
//grupo de rutas para escuela
Route::group(['Prefix'=>'EscuelaController'],function(){

   Route::get('/Profesors', 'EscuelaController@inicio')
   ->name('Profesor.inicio');
      Route::get('/Profesors/{id}/editar','EscuelaController@edit')
->name('Profesor.edit')->where('id','[0-9]+');
Route::put('/Profesors/{id}/editar','EscuelaController@update')
->name('Profesor.update')->where('id','[0-9]+');
//matricular alumnos
Route::get('/Alumnos/crear','EscuelaController@create')
->name('Alumno.crear');
//guardar los alumnos nuevos
route::post('/Alumnos/crear','EscuelaController@store')
->name('Alumno.guardar');
 
});