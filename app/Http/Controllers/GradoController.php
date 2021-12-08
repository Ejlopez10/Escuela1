<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    public function inicio (){
        $Grados = Grado::paginate(10);
        return view('raizgrado')->with('grados', $Grados);
    }
    public function show ($id){
        $Grado = Grado::findOrfail($id);// muestra un solo estudiante
        return view('Grado')->with('grado',$Grado);
    }
    public function edit ($id){
        $Grado = Grado::findOrfail($id);
        return view('EditarGrado')->with('grado',$Grado);
    }
    public function create(){
        return view('nuevoGrado');
    }
public function store(Request $request){

    $request->validate([
        'Nombre_Profesor'=>'required|alpha',    
        'Seccion'=>'required|numeric', 
        'Aula'=>'required|numeric'
    ]);

    $nuevoGrado = new Grado();

    $nuevoGrado->Nombre_Profesor = $request->input('Nombre_Profesor');
    $nuevoGrado->Seccion = $request->input('Seccion');
    $nuevoGrado->Aula = $request->input('Aula');

     $creado = $nuevoGrado->save();
     if($creado){
     return redirect()->route('Grado.inicio')
     ->with('mensaje', 'El Grado fue creado exitosamente');
     }else{
        //retornar mensaje de error
     }
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'Nombre_Profesor'=>'required|alpha',    
            'Seccion'=>'required|numeric', 
            'Aula'=>'required|numeric'
        ]);

        $grado = Grado::findOrFail($id);

        $grado->Nombre_Profesor = $request->input('Nombre_Profesor');
        $grado->Seccion = $request->input('Seccion');
        $grado->Aula = $request->input('Aula');

        $creado = $grado->save();
        if($creado){
         return redirect()->route('Grado.inicio')
         ->with('mensaje', 'El Alumno fue modificado exitosamente');
        }else{
            //retornar mensaje de error
         }
        }     
    public function destroy($id) {
        Grado::destroy($id);
        //redirigir 
        return redirect('/Grados/')->with('mensaje','Grado borrado con Exito');
    }
    //
}
