<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pregunta_v3;
use App\Models\Cuestionario_Pregunta_v3;
use App\Models\Cuestionario_v3;
use DateTime;

class CuestionarioController extends Controller
{
    
    //Guardar la pregunta 
    //Mandar la siguiente pregunta
    public function GuardarPregunta(Request $request)
    {
        //Error de respuesta 
        if (!($request->input('Respuesta')>=0&&$request->input('Respuesta')<5)) {
            return json_encode([["code"=>"510"],["detail"=>"Ese resultado no esta valido"]]);
        }
        //Error de Pregunta
        if (!($request->input('Pregunta')>0&&$request->input('Pregunta')<62)) {
            return json_encode([["code"=>"511"],["detail"=>"Esa pregunta no esta valido"]]);
        }

        if (Cuestionario_v3::where('usuario_id',Auth::user()->usuario_id)->exists()) {
            $Cuestioario=Cuestionario_v3::where('usuario_id',Auth::user()->usuario_id)->first();

            if (!Cuestionario_Pregunta_v3::where('cuestionario_id',$Cuestioario->cuestionario_id)->where('pregunta_id',$request->input('Pregunta'))->exists()) {
                $Pregunta_Actual=Cuestionario_Pregunta_v3::create([
                    'cuestionario_id'=>$Cuestioario->cuestionario_id,
                    'pregunta_id'=>$request->input('Pregunta'),
                    'valor'=>$request->input('Respuesta')
                ]);
                //dd("Guardando Pregunta");
                $Pregunta_Actual->save();
            }else{
                //Actualizamos la pregunta 
                Cuestionario_Pregunta_v3::where('cuestionario_id',$Cuestioario->cuestionario_id)->where('pregunta_id',$request->input('Pregunta'))->update(['valor' => $request->input('Respuesta')]);
                $Pregunta_Actual=Cuestionario_Pregunta_v3::where('cuestionario_id',$Cuestioario->cuestionario_id)->where('pregunta_id',$request->input('Pregunta'))->first();
                //dd("Actualizamos Pregunta   "+$request->input('Pregunta'));
            }
        }else{
            //Crear cuestionario 
            //Preguntar si cuanod vamos a guardar la fecha de creacion 
            //Generando la METADATA
            $tiempo=new DateTime();
            $Nuevocuestionario= Cuestionario_v3::create([
                'usuario_id'    =>Auth::user()->usuario_id,
                'retro_id'      => Null,
                'fecha_creacion'=>$tiempo->format('Y-m-d H:m:s')
            ]);
            $Nuevocuestionario->save();
            $Pregunta_Actual=Cuestionario_Pregunta_v3::create([
                'cuestionario_id'=>$Nuevocuestionario->cuestionario_id,
                'pregunta_id'=>$request->input('Pregunta'),
                'valor'=>$request->input('Respuesta')
            ]);
            $Pregunta_Actual->save();
        }
        
        //validar 60 completas
        //Mandar 61
        if (count(Cuestionario_Pregunta_v3::where('cuestionario_id',$Pregunta_Actual->cuestionario_id)->get())==60) {

            $Pregunta_Sig=Pregunta_v3::where('pregunta_id',61)->first();
            return json_encode([["code"=>"200"],["detail"=>"OK"],["Pregunta"=>$Pregunta_Sig->descripcion,"PreguntaID"=>$Pregunta_Sig->pregunta_id,"Respuesta"=>2,"PregVal"=>61]]);
            
        }elseif(count(Cuestionario_Pregunta_v3::where('cuestionario_id',$Pregunta_Actual->cuestionario_id)->get())==61) {
            if ($Pregunta_Actual->valor==0) {
                //Actualizar pregunta de 0 a 60 
                //Preguntas 5,15,25,35,45,55
                $arreglo_Musica=[5,15,25,35,45,55];
                foreach ($arreglo_Musica as $PreguntaM) {
                   $Pregunta_Actualizar =Cuestionario_Pregunta_v3::where('cuestionario_id',$Pregunta_Actual->cuestionario_id)->where('pregunta_id',$PreguntaM)->update(['valor' => 0]);
                }
                
            }
            return json_encode([["code"=>"202"],["detail"=>"Cuestionario terminado"]]);
        }
        
        $Pregunta_Actual->save();
        //Proceso para mandar la siguiente pregunta 
        return $this->PreguntaSiguiente($Pregunta_Actual->cuestionario_id);
    }
    public function PreguntaSiguiente($Cuestionario)
    {
        
        $Id_preguntas_hechas=Cuestionario_Pregunta_v3::where('cuestionario_id',$Cuestionario)->get('pregunta_id')->toArray();
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
        //dd($id_preguntas_no_hechas);
        shuffle($id_preguntas_no_hechas);
        $Pregunta_Sig=Pregunta_v3::where('pregunta_id',$id_preguntas_no_hechas[0])->first();
        return json_encode([["code"=>"200"],["detail"=>"OK"],["Pregunta"=>$Pregunta_Sig->descripcion,"PreguntaID"=>$Pregunta_Sig->pregunta_id,"Respuesta"=>4,"PregVal"=>count($Id_preguntas_hechas)]]);
    }
        

}