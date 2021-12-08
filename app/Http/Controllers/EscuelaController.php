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
    public function edit ($id){
        $Profesor = Profesor::findOrfail($id);
        return view('FormularioDocente')->with('profesor',$Profesor);
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
         ->with('mensaje', 'El Docente fue modificado exitosamente');
         }else{
            //retornar mensaje de error
         }
        }
     
    public function create(){
        return view('nuevoalumno');
    }
    public function store(Request $request){

        $request->validate([
            'Nombre'=>'required|alpha',
            'Apellido'=>'required|alpha',
            'Nacionalidad'=>'required|alpha',
            'Ciudad'=>'required|alpha',
            'Fecha_Nacimiento'=>'required|numeric',
            'identidad'=>'required|unique:alumnos,Identidad',//especificar el nombre de la tabla y columna
            'Nombre_Tutor'=>'required|alpha',
            'Curso'=>'required|numeric'
        ]);

         $nuevoAlumno = new Alumno();//objeto del modelo

         $nuevoAlumno->Nombre = $request->input('Nombre');
         $nuevoAlumno->Apellido = $request->input('Apellido');
         $nuevoAlumno->Nacionalidad = $request->input('Nacionalidad');
         $nuevoAlumno->Ciudad = $request->input('Ciudad');
         $nuevoAlumno->Fecha_Nacimiento = $request->input('Fecha_Nacimiento');
         $nuevoAlumno->identidad = $request->input('identidad');
         $nuevoAlumno->Nombre_Tutor = $request->input('Nombre_Tutor');
         $nuevoAlumno->Curso = $request->input('Curso');

         $creado = $nuevoAlumno->save();
         if($creado){
         return redirect()->route('Alumno.index')
         ->with('mensaje','El Alumno fue matriculado exitosamente');
         }else{
            //retornar mensaje de error
         }
    }
    
}
