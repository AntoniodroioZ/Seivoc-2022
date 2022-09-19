<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;
use App\Models\alumno_orientador_v3;
use App\Models\Escala_v3;
use App\Models\Situacion_v3;
use App\Models\Grado_v3;
use App\Models\Delegacion_v3;
use App\Models\Plantel_v3;
use App\Models\Modalidad_v3;
use App\Models\Escuela_v3;
use App\Models\Estado_v3;
use App\Models\Periodo_Escolar_v3;
use App\Models\Preguntas_Complemento_v3;
use App\Models\RespuestaC_v3;
use DateTime;

class AlumnoOrientadorController extends Controller
{

	

	function SavAlumnoOriuentador(Request $request)
	{


		$tiempo=new DateTime();
		
		if($request->input('tipo_escuela')==0){
        $Alumno= new alumno_orientador_v3(
                array(
                	  'usuario_id' => Auth::user()->usuario_id,
                	  'situacion_id' => $request->input('id_situacion'),
                      'modalidad_id' =>$request->input('id_modalidad'),
                      'grado_id' =>$request->input('id_grado'),
                      'escuela_id'=>$request->input('id_escuela'),
                      'plantel_id' =>$request->input('id_plantel'),
                      'periodo_escolar_id' =>$request->input('id_ultimo_anio_cursado'),
                      'estado_id' =>$request->input('id_residencia'),
                      'delegacion_id' =>$request->input('id_delegacion'),
                      'fecha_creacion'=>$tiempo->format('Y-m-d H:m:s'),
                      'alumno_orientador'=>0
                      //'para_que_me_sirve' => $request->input('id_para_que_me_sirve'),
                      //'opcion_de_carrera' => $request->input('id_opcion_de_carrera'),
                      //'interes_campo_de_conocimiento' => $request->input('id_interes_campo_de_conocimiento'),
                     //'porque_seguir_estudiando' => $request->input('id_porque_seguir_estudiando'),
            /*Tomar en cuenta el tipo de escuela hacer un odate*/
                      //'tipo_escuela' => $request->input('tipo_escuela')
            )
        );
        }else{
           $Alumno= new alumno_orientador_v3(
                array(
                	  'usuario_id' => Auth::user()->usuario_id,
                	  'situacion_id' => $request->input('id_situacion'),
                      'modalidad_id' =>$request->input('id_modalidad'),
                      'grado_id' =>$request->input('id_grado'),
                      'escuela_id'=>0,
                      'plantel_id' =>0,
                      'periodo_escolar_id' =>$request->input('id_ultimo_anio_cursado'),
                      'estado_id' =>$request->input('id_residencia'),
                      'delegacion_id' =>$request->input('id_delegacion'),
                      'fecha_creacion'=>$tiempo->format('Y-m-d H:m:s'),
                      'alumno_orientador'=>0
                      //'para_que_me_sirve' => $request->input('id_para_que_me_sirve'),
                      //'opcion_de_carrera' => $request->input('id_opcion_de_carrera'),
                      //'interes_campo_de_conocimiento' => $request->input('id_interes_campo_de_conocimiento'),
                      //'porque_seguir_estudiando' => $request->input('id_porque_seguir_estudiando'),
            /*Tomar en cuenta el tipo de escuela hacer un odate*/
                      //'tipo_escuela' => $request->input('tipo_escuela')
                      
            )
        ); 
        }
        $Alumno->save();
        $Pregunta1= new Preguntas_Complemento_v3([
        	'usuario_id'=>Auth::user()->usuario_id,
        	'respuestaC_id'=>$request->input('id_para_que_me_sirve'),
        	'preguntaC_id'=>1
        ]);
        $Pregunta1->save();
        $Pregunta2= new Preguntas_Complemento_v3([
        	'usuario_id'=>Auth::user()->usuario_id,
        	'respuestaC_id'=>$request->input('id_opcion_de_carrera'),
        	'preguntaC_id'=>2
        ]);
        $Pregunta2->save();
        $Pregunta3= new Preguntas_Complemento_v3([
        	'usuario_id'=>Auth::user()->usuario_id,
        	'respuestaC_id'=>$request->input('id_interes_campo_de_conocimiento'),
        	'preguntaC_id'=>3
        ]);
        $Pregunta3->save();
        $Pregunta4= new Preguntas_Complemento_v3([
        	'usuario_id'=>Auth::user()->usuario_id,
        	'respuestaC_id'=>$request->input('id_porque_seguir_estudiando'),
        	'preguntaC_id'=>4
        ]);
        $Pregunta4->save();
		return redirect()->route('FlujoPrincipal');
	}
	function getModalidad(Request $request)
    {
        
        $Modalidad=Modalidad_v3::where('situacion_id',$request->input('id_situacion'))->get();
        $html="";
        for ($i=0; $i <count($Modalidad) ; $i++) {
                $html.= "<option value='".$Modalidad[$i]['modalidad_id']."'>".$Modalidad[$i]['descripcion']."</option>";
        }
        echo $html;
    }
    function getEscuela(Request $request)
    {

        //$Escuela_sin_dato=Escuela::where('nombre',"like","Sin campo")->get();
        if($request->input('id_modalidad')==3||$request->input('id_modalidad')== 7||$request->input('id_modalidad')== 15){
            $Escuela=Escuela_v3::where('grado_id',$request->input('id_grado'))
                        ->where('tipo',1)
                        ->get();
        }elseif($request->input('id_modalidad')==2||$request->input('id_modalidad')== 6||$request->input('id_modalidad')== 14){
         $Escuela=Escuela_v3::where('grado_id',$request->input('id_grado'))
                        ->where('tipo',2)
                        ->get();   
        }else{
         $Escuela=Escuela_v3::where('grado_id',$request->input('id_grado'))
                        ->where('tipo',0)
                        ->get();     
            
        }
        
        $html="";
        //$html= "<option value='".$Escuela_sin_dato[0]->id_situacion."'>".$Escuela_sin_dato[0]->nombre." </option>";
        for ($i=0; $i <count($Escuela) ; $i++) { 
            if($i==0){
                $html.= "<option value='".$Escuela[$i]['escuela_id']."' selected>".$Escuela[$i]['descripcion']."</option>";
            }else{
                $html.= "<option value='".$Escuela[$i]['escuela_id']."' >".$Escuela[$i]['descripcion']."</option>";
            }
                
            
            
        }
        echo $html;
    }
    function getPlantel(Request $request)
    {
        
        $Planteles=Plantel_v3::where('escuela_id',$request->input('id_escuela'))->get();
        $html="";
        for ($i=0; $i <count($Planteles) ; $i++) {
            if($i==0){
                $html.= "<option value='".$Planteles[$i]['plantel_id']."'selected>".$Planteles[$i]['descripcion']."</option>";
            }else{
                $html.= "<option value='".$Planteles[$i]['plantel_id']."'>".$Planteles[$i]['descripcion']."</option>";
            }
            
                 

        }
        if(1>count($Planteles)){
            $Plantel_sin_dato=Plantel_v3::where('plantel_id',0)->get();
            $html= "<option value='".$Plantel_sin_dato[0]->plantel_id."' selected>".$Plantel_sin_dato[0]->descripcion." </option>";   
        }
        echo $html;
    }
    function getAnio(Request $request)
    {
        //$Anio_sin_dato=Escuela::where('nombre',"like","Sin campo")->get();
        $Anio=Periodo_Escolar_v3::where('grado_id',$request->input('id_grado'))->get();

        $html="";
        //$html= "<option value='".$Anio_sin_dato[0]->id_anio_cursado."'>".$Anio_sin_dato[0]->Anio_cursado." </option>";
        for ($i=0; $i <count($Anio) ; $i++) {
                 $html.= "<option value='".$Anio[$i]['grado_id']."'>".$Anio[$i]['descripcion']."</option>";
        
        } 
        echo $html;
    }
    function getDelegacion(Request $request)
    {
        
        $Delegacion=Delegacion_v3::where('estado_id',$request->input('id_residencia'))->get();
        $html="";
        for ($i=0; $i <count($Delegacion) ; $i++) { 
            $html.= "<option value='".$Delegacion[$i]['delegacion_id']."'>".$Delegacion[$i]['descripcion']."</option>";
        }
        if(1>count($Delegacion)){
            $Delegacion_sin_dato=Delegacion_v3::where("delegacion_id",0)->get();
            $html= "<option value='".$Delegacion_sin_dato[0]->delegacion_id."'>".$Delegacion_sin_dato[0]->descripcion." </option>";   
        }
        echo $html;
    }


}