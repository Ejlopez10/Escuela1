<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index (){
        $Alumnos = Alumno::paginate(10); 
        return view('raizalumno')->with('alumnos', $Alumnos);
    }
    public function show ($id){
        $Alumno = Alumno::findOrfail($id);// muestra un solo estudiante
        return view('Alumno')->with('alumno',$Alumno);
    }
    public function edit ($id){
        $Alumno = Alumno::findOrfail($id);
        return view('FormularioAlumno')->with('alumno',$Alumno);
    }
    public function update(Request $request, $id){
        $request->validate([
            'Nombre'=>'required|alpha',
            'Apellido'=>'required|alpha',
            'Nacionalidad'=>'required|alpha',
            'Ciudad'=>'required|alpha',
            'Curso'=>'required|numeric|min:1|max:12',
            'Identidad'=>'required',
            'Nombre_Tutor'=>'required|alpha',
            'Fecha_Nacimiento'=>'required|date'
        ]);

        $alumno = Alumno::findOrFail($id);

         $alumno->Nombre = $request->input('Nombre');
         $alumno->Apellido = $request->input('Apellido');
         $alumno->Nacionalidad = $request->input('Nacionalidad');
         $alumno->Ciudad = $request->input('Ciudad');
         $alumno->Curso = $request->input('Curso');
         $alumno->Identidad = $request->input('Identidad');
         $alumno->Nombre_Tutor = $request->input('Nombre_Tutor');
         $alumno->Fecha_Nacimiento = $request->input('Fecha_Nacimiento');


         $creado = $alumno->save();
         if($creado){
         return redirect()->route('Alumno.index')
         ->with('mensaje', 'El estudiante fue modificado exitosamente');
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
    public function destroy($id) {
    Alumno::destroy($id);
        //redirigir 
        return redirect('/Alumnos/')->with('mensaje','Alumno borrado completamente');
    }
}
