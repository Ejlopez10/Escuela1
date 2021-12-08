<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;

class EscuelaController extends Controller
{
    public function inicio (){
        $Profesors = Profesor::paginate(10);
        return view('inicioprofesor')->with('profesors', $Profesors);
    }
    public function show ($id){
        $Profesor = Profesor::findOrfail($id);// muestra un solo estudiante
        return view('Profesor')->with('profesor',$Profesor);
    }
    public function edit ($id){
        $Profesor = Profesor::findOrfail($id);
        return view('FormularioDocente')->with('profesor',$Profesor);
    }
    public function create(){
        return view('nuevoProfesor');
    }
public function store(Request $request){

    $request->validate([
        'Nombre'=>'required|alpha',
        'Clase'=>'required|alpha',
        'Email'=>'required|alpha',
        'Telefono'=>'required|numeric', 
        'Titulo'=>'required|alpha',
        'Sueldo'=>'required|numeric'
    ]);

    $nuevoprofesor = new Profesor();

     $nuevoprofesor->Nombre = $request->input('Nombre');
     $nuevoprofesor->Clase = $request->input('Clase');
     $nuevoprofesor->Email = $request->input('Email');
     $nuevoprofesor->Telefono = $request->input('Telefono');
     $nuevoprofesor->Titulo = $request->input('Titulo');
     $nuevoprofesor->Sueldo = $request->input('Sueldo');

     $creado = $nuevoprofesor->save();
     if($creado){
     return redirect()->route('Profesor.inicio')
     ->with('mensaje', 'El Docente fue creado exitosamente');
     }else{
        //retornar mensaje de error
     }
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'Nombre'=>'required|alpha',
            'Clase'=>'required|alpha',
            'Email'=>'required|alpha',
            'Telefono'=>'required|numeric', 
            'Titulo'=>'required|alpha',
            'Sueldo'=>'required|numeric'
        ]);

        $profesor = Profesor::findOrFail($id);

         $profesor->Nombre = $request->input('Nombre');
         $profesor->Clase = $request->input('Clase');
         $profesor->Email = $request->input('Email');
         $profesor->Telefono = $request->input('Telefono');
         $profesor->Titulo = $request->input('Titulo');
         $profesor->Sueldo = $request->input('Sueldo');

         $creado = $profesor ->save();
         if($creado){
         return redirect()->route('Profesor.inicio')
         ->with('mensaje', 'El Alumno fue modificado exitosamente');
         }else{
            //retornar mensaje de error
         }
        }     
    public function destroy($id) {
        Profesor::destroy($id);
        //redirigir 
        return redirect('/Profesors/')->with('mensaje','Docente borrado completamente');
    }
    //
}
