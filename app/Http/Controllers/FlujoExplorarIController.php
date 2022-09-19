<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\alumno_orientador_v3;
use App\Models\Cuestionario_Pregunta_v3;
use App\Models\Cuestionario_v3;
use App\Models\Pregunta_v3;
use App\Models\Plantel_v3;
use App\Models\Modalidad_v3;
use App\Models\Escuela_v3;
use App\Models\Periodo_Escolar_v3;
use App\Models\Delegacion_v3;
use App\Models\Situacion_v3;
use App\Models\Grado_v3;
use App\Models\Estado_v3;
use App\Models\RespuestaC_v3;


use DateTime;

class FlujoExplorarIController extends Controller
{

	function FlujoPrincipal()
	{
		$id=Auth::user()->usuario_id;
		$cuestionario=Cuestionario_v3::where('usuario_id',$id)->first();
		//dd(alumno_orientador_v3::where('usuario_id',$id)->exists());
    // dd(Cuestionario_v3::where('usuario_id',$id)->exists());
		if (!(alumno_orientador_v3::where('usuario_id',$id)->exists())) {

			return($this->IndexRegistro());
		}elseif(!Cuestionario_v3::where('usuario_id',$id)->exists()){
    //   return($this->Indexcuestionario());
        return($this->instruccionesCuestionario());
   
    }
    elseif (count(Cuestionario_Pregunta_v3::where('cuestionario_id',$cuestionario->cuestionario_id)->get())<61) {
			return($this->instruccionesCuestionario());
		} else {
			return redirect()->route('Principal');
		}
	}

	public function Indexcuestionario()
    {
        $Id_preguntas_hechas = [];
        if (Cuestionario_v3::where('usuario_id',Auth::user()->usuario_id)->exists()) {
            $Cuestionario=Cuestionario_v3::where('usuario_id',Auth::user()->usuario_id)->first();
            $Id_preguntas_hechas=Cuestionario_Pregunta_v3::where('cuestionario_id',$Cuestionario->cuestionario_id)->get('pregunta_id')->toArray();
            //Areglo [1,2,3,4] 
            $aux = [];
            foreach ($Id_preguntas_hechas as $key) {
              array_push($aux, $key['pregunta_id']);
            }
            $Id_preguntas_hechas = $aux;

            $id_preguntas_no_hechas=[];
            for ($i=1; $i <61 ; $i++) { 
                //funcion si encuentras en este areglo la $i
                if (!in_array($i, $Id_preguntas_hechas)) {
                    array_push( $id_preguntas_no_hechas,$i);
                }
            }

        }else{
            $id_preguntas_no_hechas=[1,2,3,4,5,6,7,8,9,10];
        }
        if (count($id_preguntas_no_hechas)==0) {
            array_push( $id_preguntas_no_hechas,61);
        }
        
        shuffle($id_preguntas_no_hechas);
        $Pregunta_Sig=Pregunta_v3::where('pregunta_id',$id_preguntas_no_hechas[0])->first();
        $Datos=["Pregunta"=>$Pregunta_Sig->descripcion,"PreguntaID"=>$Pregunta_Sig->pregunta_id,"PregVal"=>count($Id_preguntas_hechas)];
        return view('seivoc.explora_intereses.Cuestionario')->with('Datos',$Datos);
        
    }


    public function IndexRegistro()
	{
		$Plantel=Plantel_v3::where("plantel_id",0)->first();
        $Modalidad=Modalidad_v3::where("modalidad_id",0)->first();
        $Escuela=Escuela_v3::where("escuela_id",0)->first();
        $Anio=Periodo_Escolar_v3::where("periodo_escolar_id",0)->first();
        $Delegacion=Delegacion_v3::where("delegacion_id",0)->first();

        $Situaciones=Situacion_v3::get();
        $Grados=Grado_v3::get();
        $Residencias=Estado_v3::get();
        $Para_que_me_sirves=RespuestaC_v3::where("preguntaC_id",1)->get();
        $Opcion_de_carreras=RespuestaC_v3::where("preguntaC_id",2)->get();
        $Interes_campo_de_conocimientos=RespuestaC_v3::where("preguntaC_id",3)->get();
        $Porque_seguir_estudiandos=RespuestaC_v3::where("preguntaC_id",4)->get();


		return view('seivoc.segundoregistro.registrosegundo',[
                                                "Plantel"=>$Plantel,
                                                "Modalidad"=>$Modalidad,
                                                "Escuela"=>$Escuela,
                                                "Anio"=>$Anio,
                                                "Delegacion"=>$Delegacion,
                                                "Situaciones"=>$Situaciones,
                                                "Grados"=>$Grados,
                                                "Residencias"=>$Residencias,
                                                "Para_que_me_sirves"=>$Para_que_me_sirves,
                                                "Opcion_de_carreras"=>$Opcion_de_carreras,
                                                "Interes_campo_de_conocimientos"=>$Interes_campo_de_conocimientos,
                                                "Porque_seguir_estudiandos"=>$Porque_seguir_estudiandos              
                                            ]);
	}
    public function instruccionesCuestionario(){
        $id=Auth::user()->usuario_id;
        if (!(alumno_orientador_v3::where('usuario_id',$id)->exists())) {

			return($this->IndexRegistro());
        }else{
            return view('seivoc.explora_intereses.instrucciones');
        }
    }

}