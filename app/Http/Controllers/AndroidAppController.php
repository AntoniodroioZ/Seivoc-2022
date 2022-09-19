<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Preguntas_Complemento_v3;
use App\Models\Cuestionario_v3;
use App\Models\Cuestionario_Pregunta_v3;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AndroidAppController extends Controller
{
    public function appSeivoc(Request $request){
        // $id=Auth::user()->usuario_id;

        $loginQuery = User::where('email',$request->input("email"))->get();
        // $password =  password_hash($request->input("password"), PASSWORD_BCRYPT);
        // dd($loginQuery);
        if(sizeof($loginQuery)==1){
            $cuestionarioComp = Preguntas_Complemento_v3::where("usuario_id",$loginQuery[0]["usuario_id"])->exists();
            if($cuestionarioComp == true){
                $respuesta = array('status' =>0, 'status_Usuario'=>3, 'id_usuario'=>$loginQuery[0]["usuario_id"]);
                return(json_encode($respuesta));
            }else{
                $respuesta = array('status' =>0, 'status_Usuario'=>1, 'id_usuario'=>$loginQuery[0]["usuario_id"]);
                return(json_encode($respuesta));
            }
        }else{
            $respuesta = array('status'=>1,'id_usuario'=>0,'status_Usuario'=>0);
            return(json_encode($respuesta));
        }
    }

    
    public function GetSituacion(){
        return(1);
    }
    
    
    public function RespuestaFunction(){
        $Id_retro = '1';
        $tipoPerfil= 'test';
        $Presentacion= 'test';
        $Explicacion= 'test';
        $Carreras= 'test';
        $Materiales= 'test';
        $imagenEx= 'test';
        $imagenGif= 'test';
        $hojas= 'test';
        $video= 'test';
        $Grafica = [10.0,10.0,10.0,10.0,10.0,10.0,10.0,10.0,10.0,10.0];
         

        $respuesta =[$Id_retro,$tipoPerfil,$Presentacion,$Explicacion,$Carreras,$Materiales,$imagenEx,$imagenGif,$hojas,$video,$Grafica];
        return(json_encode($respuesta));
    }
    

}