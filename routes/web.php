<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\GradoController;
use App\Http\Controller\AlumnoController;
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
   Route::get('/Profesors/{id}','EscuelaController@show')
->name('Profesor.mostrar')->where('id','[0-9]+');
      Route::get('/Profesors/{id}/editar','EscuelaController@edit')
->name('Profesor.edit')->where('id','[0-9]+');
Route::put('/Profesors/{id}/editar','EscuelaController@update')
->name('Profesor.update')->where('id','[0-9]+');
Route::get('/Profesors/crear','EscuelaController@create')
->name('Profesor.crear');
route::post('/Profesors/crear','EscuelaController@store')
->name('Profesor.guardar');
Route::delete('/Profesors/{id}/borrar','EscuelaController@destroy')
->name('Profesor.borrar')->where('id','[0-9]+');
});

Route::group(['Prefix'=>'AlumnoController'],function(){
     //mostrar la lista de alumnos
     Route::get('/Alumnos', 'AlumnoController@index')
     ->name('Alumno.index');
     Route::get('/Alumnos/{id}','AlumnoController@show')
->name('Alumno.mostrar')->where('id','[0-9]+');
     Route::get('/Alumnos/{id}/editar','AlumnoController@edit')
->name('Alumno.edit')->where('id','[0-9]+');

Route::put('/Alumnos/{id}/editar','AlumnoController@update')//envia los datos al servidor
->name('Alumno.update')->where('id','[0-9]+');
//matricular alumnos
Route::get('/Alumnos/crear','AlumnoController@create')
->name('Alumno.crear');
//guardar los alumnos nuevos
route::post('/Alumnos/crear','AlumnoController@store')
->name('Alumno.guardar');
Route::delete('/Alumnos/{id}/borrar','AlumnoController@destroy')
->name('Alumno.borrar')->where('id','[0-9]+');
 
});
Route::group(['Prefix'=>'GradoController'],function(){
 //mostrar la lista de estudiantes
Route::get('/Grados','GradoController@inicio')
->name('Grado.inicio');
Route::get('/Grados/{id}','GradoController@show')
->name('Grado.mostrar')->where('id','[0-9]+');
///mostrar formulario de edicion
Route::get('/Grados/{id}/editar','GradoController@edit')
->name('Grado.edit')->where('id','[0-9]+');

Route::put('/Grados/{id}/editar','GradoController@update')//envia los datos al servidor
->name('Grado.update')->where('id','[0-9]+');

Route::get('/Grados/crear','GradoController@create')
->name('Grado.crear');

route::post('/Grados/crear','GradoController@store')
->name('Grado.guardar');

Route::delete('/Grados/{id}/borrar','GradoController@destroy')
->name('Grado.borrar')->where('id','[0-9]+');
});