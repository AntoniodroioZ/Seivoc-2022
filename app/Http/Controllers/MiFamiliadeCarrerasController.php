<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta_familia;
use App\Models\Respuesta_familia;
use App\Models\Modulo;
use App\Models\Consolidacion;
use App\Models\recursos_familia;
use App\Models\select_familia;
use App\Models\Seguimiento;
use App\Models\formulario_pregunta_respuesta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MiFamiliadeCarrerasController extends Controller
{

    // public function __construct()
    // {
    //  $this->middleware('auth');
    // }


    public function ruta()
    {
      $id=Auth::User()->usuario_id;

      //dd($id);
      $flag=0;
      $Pregunta=0;
      if(!Seguimiento::where('usuario_id',$id)->exists()){
        $this->CambiarStatus(0,0,0,$id);
      }else{
        $SeguimientoUsuario=Seguimiento::where('usuario_id',$id)->first();
         $Pregunta=$SeguimientoUsuario->pregunta_id;
         
        if ($SeguimientoUsuario->pregunta_id>14) {
          $flag=4;
        }elseif ($SeguimientoUsuario->pregunta_id>9) {
          $flag=3;
        }elseif ($SeguimientoUsuario->pregunta_id>4) {
          $flag=2;
        }elseif ($SeguimientoUsuario->pregunta_id>0) {
          $flag=1;
        }
        //dd($flag);
      }
      return $this->RutaFunciones($Pregunta,$flag);
    }
    public function RutaFunciones($Pregunta,$flag)
    {
      if ($flag==0 && $Pregunta==0) {
        $id=Auth::User()->usuario_id;
        $this->CambiarStatus(1,0,0,$id);
        return $this->video1();
      }else{
        return $this->menu($Pregunta,$flag);
      }
    }
    public function intro()
    {
        return view('miFamiliaCarrera.index');
    }

    public function video1()
    {
      $Datos=['UrlVideo'=>"/images/familiadecarreras/familiadecarreras/Introducion.mp4",'Redireccionar'=>'/MiFamiliadeCarrera/HomeR'];
      return view('miFamiliaCarrera.showVideo')->with('Datos',$Datos);
    }

    public function videoModulo3_4()
    {
      $Datos=['UrlVideo'=>"/images/familiadecarreras/familiadecarreras/videoDeAyuda_3_4.mp4",'Redireccionar'=>'/MiFamiliadeCarrera/Modulo3/1'];
      return view('miFamiliaCarrera.showVideo')->with('Datos',$Datos);
    }


    public function menu($Pregunta,$flag)
    {
      $id=Auth::User()->usuario_id;
      $datosmenu = Seguimiento::where('usuario_id',$id)->get();
      return view('miFamiliaCarrera.Menu', compact('datosmenu','Pregunta','flag'));
    }

    public function modulo1()
    {
      $respuestasmod = Consolidacion::where('modulo_id', 1)->get();
      $respuestas = [];
      foreach ($respuestasmod as $value) {
        $nombrerespuesta = Respuesta_familia::where('respuesta_id', $value->respuesta_id)->first();
        array_push($respuestas, [$nombrerespuesta->descripcion, $nombrerespuesta->respuesta_id]);
      }
      shuffle($respuestas);
      $respuestaseparadas = array_chunk($respuestas, 3);

      $usuario_id=Auth::User()->usuario_id;
      // dd($respuestaseparadas);
      return view('miFamiliaCarrera.modulo1', compact('respuestaseparadas','usuario_id'));
    }

    public function validar_modulo1(Request $request)
    {
      $bandera = 1;
      if ($request->input('pregunta') == 1) {
        // consulta de BD de las respuestas de la pregunta
        $respuestas = Consolidacion::where('modulo_id', 1)->where('pregunta_id', 1)->get('respuesta_id')->toArray();
        $aux = [];
        foreach ($respuestas as $key) {
          array_push($aux, $key['respuesta_id']);
        }
        $respuestas = $aux;

        foreach ($request->input('respuestas') as $key) {
          
          if (!in_array($key, $respuestas)) {
            $bandera = 0;
          }
        }
        if (count($request->input('respuestas')) != count($respuestas) && $bandera == 1) {
          $bandera = 2;
        }
      }
      elseif ($request->input('pregunta') == 2) {
        $respuestas = Consolidacion::where('modulo_id', 1)->where('pregunta_id', 2)->get('respuesta_id')->toArray();
        $aux = [];
        foreach ($respuestas as $key) {
          array_push($aux, $key['respuesta_id']);
        }
        $respuestas = $aux;
        foreach ($request->input('respuestas') as $key) {
          
          if (!in_array($key, $respuestas)) {
            $bandera = 0;
          }
        }
        if (count($request->input('respuestas')) != count($respuestas) && $bandera == 1) {
          $bandera = 2;
        }
      }
      elseif ($request->input('pregunta') == 3) {
        $respuestas = Consolidacion::where('modulo_id', 1)->where('pregunta_id', 3)->get('respuesta_id')->toArray();
        $aux = [];
        foreach ($respuestas as $key) {
          array_push($aux, $key['respuesta_id']);
        }
        $respuestas = $aux;

        foreach ($request->input('respuestas') as $key) {
          
          if (!in_array($key, $respuestas)) {
            $bandera = 0;
          }
        }
        if (count($request->input('respuestas')) != count($respuestas) && $bandera == 1) {
          $bandera = 2;
        }
      }
      elseif ($request->input('pregunta') == 4) {
        $respuestas = Consolidacion::where('modulo_id', 1)->where('pregunta_id', 4)->get('respuesta_id')->toArray();
        $aux = [];
        foreach ($respuestas as $key) {
          array_push($aux, $key['respuesta_id']);
        }
        $respuestas = $aux;

        foreach ($request->input('respuestas') as $key) {
          
          if (!in_array($key, $respuestas)) {
            $bandera = 0;
          }
        }
        if (count($request->input('respuestas')) != count($respuestas) && $bandera == 1) {
          $bandera = 2;
        }
      }
      elseif ($request->input('pregunta') == 5) {
        $respuestas = Consolidacion::where('modulo_id', 1)->where('pregunta_id', 5)->get('respuesta_id')->toArray();
        $aux = [];
        foreach ($respuestas as $key) {
          array_push($aux, $key['respuesta_id']);
        }
        $respuestas = $aux;

        foreach ($request->input('respuestas') as $key) {
          
          if (!in_array($key, $respuestas)) {
            $bandera = 0;
          }
        }
        if (count($request->input('respuestas')) != count($respuestas) && $bandera == 1) {
          $bandera = 2;
        }
      }
       // $bandera = 1;
      // if ($bandera==1) {
      //   //dd($request->input('usuario_id'));
      //   $id=$request->input('usuario_id');
      //   //dd($id);
      //   if(Seguimiento::where('usuario_id',$id)->exists()){
      //     $Seguimiento=Seguimiento::where('usuario_id',$id)->first();
      //     if($Seguimiento->pregunta_id<$request->input('pregunta')){
      //       $this->CambiarStatus($request->input('pregunta')+1,1,1,$id);
      //     }
      //   }
      // }
      return $bandera;
    }

    public function modulo2($id)
    {
        $PreguntaM2=$id;
        return view('miFamiliaCarrera.modulo2', compact('PreguntaM2'));
    }

    public function modulo3($id)
    {
      $consolidado = Consolidacion::where('modulo_id', 3)->where('pregunta_id', 10 + $id)->get();
      // dd($consolidado);
      $respuestas = [];
      foreach ($consolidado as $respuesta) {
        $nombrerespuesta = Respuesta_familia::where('respuesta_id', $respuesta->respuesta_id)->first();
        array_push($respuestas, [$nombrerespuesta->descripcion, $nombrerespuesta->verdadero]);
      }

      $pregunta = Pregunta_familia::where('pregunta_id', 10 + $id)->first();

      $recurso = recursos_familia::where('pregunta_id', 10 + $id)->first();

      $id_user=Auth::User()->usuario_id;
      if(Seguimiento::where('usuario_id',$id_user)->exists()){
        $Seguimiento=Seguimiento::where('usuario_id',$id_user)->first();
        if($Seguimiento->pregunta<($id+10)){
          if ($id + 10==15) {
            $this->CambiarStatus($id + 10,1,3,$id_user);
          }else{
            $this->CambiarStatus($id + 10,1,0,$id_user);
          }
          
        }
      }

      return view('miFamiliaCarrera.modulo3', compact('respuestas', 'pregunta', 'recurso'));
    }

    public function modulo4($id)
    {
      $consolidado = Consolidacion::where('modulo_id', 4)->where('pregunta_id', 15 + $id)->get();
      // dd($consolidado);
      $respuestas = [];
      foreach ($consolidado as $respuesta) {
        $nombrerespuesta = Respuesta_familia::where('respuesta_id', $respuesta->respuesta_id)->first();
        array_push($respuestas, [$nombrerespuesta->descripcion, $nombrerespuesta->verdadero]);
      }

      $pregunta = Pregunta_familia::where('pregunta_id', 15 + $id)->first();

      $recurso = recursos_familia::where('pregunta_id', 15 + $id)->first();
      $id_user=Auth::User()->usuario_id;
      if(Seguimiento::where('usuario_id',$id_user)->exists()){
        $Seguimiento=Seguimiento::where('usuario_id',$id_user)->first();
        if($Seguimiento->pregunta_id<($id+15)){
          if ($id + 15==15) {
            $this->CambiarStatus($id + 15,1,4,$id_user);
          }else{
            $this->CambiarStatus($id + 15,1,4,$id_user);
          }
          
        }
      }
      return view('miFamiliaCarrera.modulo4', compact('respuestas', 'pregunta', 'recurso'));
    }

    public function getRecusos_Mifamilia(Request $request){
      //Revisar la base con respecto alo que te llega 
      //Select con where especifico  
      
      //Provicional 
      // $Recusos=[["images/familiadecarreras/Area1Modulo2.png","images/familiadecarreras/Audios/IvanArea1.mp3"],
      // ["images/familiadecarreras/Area2Modulo2.png","images/familiadecarreras/Audios/LuzArea2.mp3",],
      // ["images/familiadecarreras/Area3Modulo2.png","images/familiadecarreras/Audios/AnaArea3.mp3"],
      // ["images/familiadecarreras/Area4Modulo2.png","images/familiadecarreras/Audios/SamArea4.mp3"],
      // ["images/familiadecarreras/Area5Modulo2.png","images/familiadecarreras/Audios/TonyArea5.mp3"]];

      $Recursos = recursos_familia::where('pregunta_id', $request->input('id_recursos') + 5)->first();
      // dd($Recursos);
      
      // $id=Auth::User()->usuario_id;
      $id=$request->input('usuario_id');
        if(Seguimiento::where('usuario_id',$id)->exists()){
          $Seguimiento=Seguimiento::where('usuario_id',$id)->get();
          // dd($Seguimiento);
          foreach($Seguimiento as $pregunta){
            if($pregunta->pregunta_id<10){
              if ($pregunta->pregunta_id<($request->input('id_recursos') + 5)) {
                $this->CambiarStatus($request->input('id_recursos') + 5,1,2,$id);
              }else{
                $this->CambiarStatus($request->input('id_recursos') + 5,1,0,$id);
              }
              
            }
          }
        }
      
      return ["imagen"=>$Recursos->url_imagen,"audio"=>$Recursos->url_audio];
      
    }

    public function getModulo2(Request $request){
      $Pregunta_Actual=$request->input('id_recursos')-1;
      // dd($Pregunta_Actual);
      $consolidacion = Consolidacion::where('modulo_id', 2)->where('pregunta_id', $Pregunta_Actual + 6)->get();
      // dd($consolidacion);
      $pregunta = Pregunta_familia::where('pregunta_id', $Pregunta_Actual + 6)->first();
      $pregunta = explode('#%', $pregunta->descripcion);
      // dd($pregunta);
      $numselects = select_familia::where('pregunta_id', $Pregunta_Actual + 6)
                                    ->select('select_id',
                                            DB::raw("select_id")
                                        )
                                    ->groupby('select_id')
                                    ->get();

      // dd(count($numselects));
      
      $html="<input   id='Numero_Preguntas' value='".count($numselects)."' style='display: none;'>";
      // $select_id = [];
        // foreach($numselects as $numselect_id){
        //   array_push($select_id,$numselect_id->select_id);
        // }
        // dd($select_id);
        $respuestasselects = [];
        foreach($numselects as $numselect_id){ 
          array_push($respuestasselects,select_familia::where('select_id', $numselect_id->select_id)->get());
        }
        foreach($respuestasselects as $i=>$select){
        // dd($select);
        // $respuestas = Respuesta_familia::where('respuesta_id', $consolidacion[$i]->respuesta_id)->first();
        // dd($numselects);
        $html.=$pregunta[$i];
       
        $html.="<select name='res".($select[0]->select_id+1)."'  id='res".($select[0]->select_id+1)."' required=''  onchange='ComprobarSelect(res".($select[0]->select_id+1).")' NuPreguna='".($select[0]->select_id+1)."'>
              <option value='' hidden='true'>Elige una opción</option>";
          
        //Tomar las respues de cada select 
        // dd($numselects);
        // Codigo que hizo Isa
        // foreach($numselects as $numselect_id){
        //   $select_id = $numselect_id->select_id;
        // }
        // // dd($select_id);
        // $respuestasselects = select_familia::where('select_id', $select_id)->get();
        // // dd($respuestasselects);
        // for($j=0;$j<count($respuestasselects);$j++){
        //     $Contenido_Respuesta=Respuesta_familia::where('respuesta_id', $respuestasselects[$j]->respuesta_id)->first();
        //     $html.="<option value='".$Contenido_Respuesta->verdadero."'>".$Contenido_Respuesta->descripcion."</option>"; 
        // }
        // $html.="</select>"; 
        // Codigo en correcccion
        // $select_id = [];
        // $contador1 = 0;
        // foreach($numselects as $numselect_id){
        //   $select_id[$contador1] = $numselect_id->select_id;
        //   $contador1++;
        // }
        // dd($select_id);

        // $respuestasselects = [];
        // // $contador2 = 0;
        // foreach($numselects as $key=>$numselect_id){
        //   // $respuestasselects[$contador2] = select_familia::where('select_id', $numselect_id->select_id)->get();
        //   array_push($respuestasselects,select_familia::where('select_id', $numselect_id->select_id)->get());
        //   // $contador2++;
        // }
        $respuestaUnicoSelect = select_familia::where('select_id', $select[0]->select_id)->get();
        // $html1 = "";
        // dd($respuestasselects);
        // $Contenido_Respuesta = [];
        foreach($respuestaUnicoSelect as $key2=>$unico){
          // dd($unico);
          $Contenido_Respuesta=Respuesta_familia::where('respuesta_id', $unico->respuesta_id)->first();
          // dd($Contenido_Respuesta);
          $html.="<option value='".$Contenido_Respuesta->verdadero."' >".$Contenido_Respuesta->descripcion."</option>";
        }
        // $contador3 = 0;
        // $contador4 = 0;
        // $contador5 = 0;
        // for ($j=0; $j < count($respuestasselects); $j++) { 
        //   // dd($respuestasselects[$j]);
        //   $contador3 = 0;
        //   $respuestas_id = [];
        //   foreach($respuestasselects[$j] as $id_respuestas){
        //     $respuestas_id[$contador3]= $id_respuestas->respuesta_id;
        //     $contador3++;
        //   }
        //   // dd($respuestas_id);
        //   $Contenido_Respuesta1=Respuesta_familia::where('respuesta_id', $respuestas_id[0])->first();
        //   $Contenido_Respuesta2=Respuesta_familia::where('respuesta_id', $respuestas_id[1])->first();
        //   // dd($Contenido_Respuesta2);
        //   $html.="<option value='".$Contenido_Respuesta1->verdadero."' id=".$i."opcion".$contador5.">".$Contenido_Respuesta1->descripcion."</option>";
        //   $html.="<option value='".$Contenido_Respuesta2->verdadero."' id=".$i."opcion".($contador5+1).">".$Contenido_Respuesta2->descripcion."</option>";
        //   $contador4++;
        //   $contador5 = $contador5+2;
        //   $html.= $contador4;

        //   // $html.="forinterno2";
        //   // continue 1;
        //   // $html1.="Aqui terminar el ".$j." for ||||";
        // }
        // dd($respuestas_id);
        // dd($Contenido_Respuesta);
        $html.="</select>"; 
        // $html.="forinterno3";
        
      }

      // $html.=$pregunta[count($respuestasselects)];
      
      return json_encode($html);
    }
    /*Cambia o lo crea 
    si el usuario ya esta creado y la pregunta o puntaje o medalla vienen en cero 
    estas no se actualizan */
    public function CambiarStatus($pregunta,$puntaje,$medalla,$id)
    {
      //$id=Auth::User()->usuario_id;
      //dd($id);

      if(!Seguimiento::where('usuario_id',$id)->exists()){

        $SeguimientoUsuario= new Seguimiento([
          'usuario_id' => Auth::User()->usuario_id, 
          'puntaje'=> $puntaje,  
          'medalla'=> $medalla,
          'pregunta_id'=> $pregunta,
          'fecha' => date('Y/m/d H:i:s')
        ]);
        
        $SeguimientoUsuario->save();
        // dd($SeguimientoUsuario);
      }else{
        $SeguimientoUsuario=Seguimiento::where('usuario_id',$id)->first();
        if ($puntaje!=0 && $puntaje!=NULL) {
          $SeguimientoUsuario->puntaje+=$puntaje;
          //Seguimiento::where('usuario_id',$id)->update(['puntaje'=>$SeguimientoUsuario->puntaje+$puntaje]);
        }
        if ($medalla!=0  && $medalla!=NULL) {
          $SeguimientoUsuario->medalla=$medalla;
        }
        if ($pregunta!=0  && $pregunta!=NULL) {
          $SeguimientoUsuario->pregunta_id=$pregunta;
        }
        $SeguimientoUsuario->save();
        return 2;
      }
      return 0;
    }
    public function CambiarStatusAjax(Request $request)
    {
      $id=Auth::User()->usuario_id;
      // $id = 7379;
      //dd($id);
      $puntaje = $request->input('puntaje');
      $medalla = $request->input('medalla');
      $pregunta_id = $request->input('pregunta_id');

      if(!Seguimiento::where('usuario_id',$id)->exists()){

        $SeguimientoUsuario= new Seguimiento([ 
          // 'usuario_id' => Auth::User()->usuario_id, 
          'usuario_id' => $id,
          'puntaje'=> $puntaje,  
          'medalla'=> $medalla,
          'pregunta_id'=> $pregunta_id,
          'fecha' => date('Y/m/d H:i:s')
        ]);
        
        $SeguimientoUsuario->save();
        // dd($SeguimientoUsuario);
      }else
      {
        $SeguimientoUsuario=Seguimiento::where('usuario_id',$id)->first();
        
        // dd($SeguimientoUsuario->pregunta_id);
        
        if ($puntaje!=0 && $puntaje!=NULL && $SeguimientoUsuario->puntaje < 6) {
          $SeguimientoUsuario->puntaje=$puntaje;
          //Seguimiento::where('usuario_id',$id)->update(['puntaje'=>$SeguimientoUsuario->puntaje+$puntaje]);
        }
        if ($medalla!=0  && $medalla!=NULL && $SeguimientoUsuario->medalla < 2) {
          $SeguimientoUsuario->medalla=$medalla;
        }
        if ($pregunta_id!=0  && $pregunta_id!=NULL && $SeguimientoUsuario->pregunta_id < 6) {
          $SeguimientoUsuario->pregunta_id=$pregunta_id;
        }
        $SeguimientoUsuario->save();
        return 2;
      }
      return 0;
    }
    public function redireccionamientoFormulario(){
      $usuario_id=Auth::User()->usuario_id;
      // $usuario_id = 7379;
      $existe = 0;
      if(formulario_pregunta_respuesta::where('usuario_id',$usuario_id)->exists()){
        // dd("EXISTE");
        $existenciaFormulario = formulario_pregunta_respuesta::where('usuario_id',$usuario_id)->orderby('pregunta_id')->get();
        // dd($existenciaFormulario);
        for ($i=0; $i < 14; $i++) { 
          // dd($existenciaFormulario[$i]->pregunta_id);
          if($existenciaFormulario[$i]->pregunta_id == ($i+1)){
            $existe++;
          }
       }
      //  dd($existe);
        if($existe == 14){
          // dd("EXISTE 2");
          return redirect('/MiFamiliadeCarrera/HomeR');
        }
      } else{
        // dd("No existe");
        return redirect('/formularioFamCarreras');
      }
      
      
    }
}