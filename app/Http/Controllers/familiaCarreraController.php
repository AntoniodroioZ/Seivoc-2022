<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\formulario_pregunta_respuesta;
use App\Models\formulario_pregunta;
use App\Models\formulario_respuesta;
use App\Models\formularios;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class familiaCarreraController extends Controller
{
    public function vistaFamiliaCarrera()
    {
        $respuestasForm = [4,3,1,5,2,8,10,12,16,2,4,5,3,1];
        return view('cuestionarioFinalFC')->with('respuestasForm',$respuestasForm);
    }

    
    public function cargarDatosFormulario(Request $request){
        $id=Auth::user()->usuario_id;
        // $id = 7379;
        // echo $id;
        // $datos = $request->input('datos');
        // $datos = array(1,2,3,4,5);
        // $i = 1;
        // foreach ($datos as $dato) { 
            $nuevoDato= new formulario_pregunta_respuesta;
            $nuevoDato->usuario_id = $id;
            $nuevoDato->respuesta_id = $request->input('respuesta_id');
            $nuevoDato->pregunta_id = $request->input('pregunta_id');
            $nuevoDato->save();
            // $i++;
            // echo $i;
        // }
    }



    ////////////////////////////////////////////////////////////////
    public function cargarDatosFormulario2(Request $request){
        $id=Auth::user()->usuario_id;
        // echo $id;
        // $datos = $request->get('datos');
        $datos = array(1,2,3,4,5);
        $i = 1;
        foreach ($datos as $dato) { 
            $nuevoDato= new formulario_pregunta_respuesta;
            $nuevoDato->usuario_id = $id;
            $nuevoDato->respuesta_id = $datos[$i-1];
            $nuevoDato->pregunta_id = $i;
            $nuevoDato->save();
            $i++;
            // echo $i;
        }
    }
}