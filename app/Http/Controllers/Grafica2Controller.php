<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\alumno_orientador_v3;
use App\Models\User;
use App\Models\Situacion_v3;
use App\Models\Escuela_v3;
use App\Models\Plantel_v3;
use App\Models\Grado_v3;
use App\Models\Modalidad_v3;
use App\Models\Cuestionario_v3;
use App\Models\RespuestaE_v3;
use App\Models\Preguntas_Evaluacion_v3;
use App\Models\PreguntaE_v3;
use App\Models\PreguntaC_v3;
use App\Models\Retroalimentacion_v3;
use App\Models\roles;
use DB;
class Grafica2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    $id=Auth::user()->usuario_id;
    $verificacion = roles::where('usuario_id',$id)->get();
    foreach($verificacion as $verificar){
        $rolMinimo = $verificar->roles_id;
    }
    // $id=7379;
    if($rolMinimo >= 1){
    	$Datos = array();
        $Situacion=Situacion_v3::get();
        $GradoEducativo=Grado_v3::get();
        $Datos['Situaciones']=$Situacion;
        $Datos['GradoEducativo']=$GradoEducativo;
        $roles = roles::where('usuario_id',$id)->get();
        // dd($roles);
        $i = 0;
        foreach($roles as $rol_id){
            $rol[$i] = $rol_id->roles_id;
            $i += 1;
        }
        
        // dd($rol);
    	/*$Modalidades=Modalidad_v2::where('id_situacion',1)->get();
    	$GradoEducativo=Grado_v2::get();
    	$Escuelas=Escuela_v2::get();
    	$Planteles=Plantel_v2::get();
    	$Datos['Modalidades']=$Modalidades;
    	$Datos['GradoEducativo']=$GradoEducativo;
    	$Datos['Escuelas']=$Escuelas;
    	$Datos['Planteles']=$Planteles;*/
    	return view('administrador.moduloAdministrador',compact('rol'))->with('Datos',$Datos);

       }
    } 
    



    /****************************************************************************************************/
    /****************************************************************************************************/
    /****************************************FILTROS*****************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    public function GetModalidad(Request $request)
    {
        $Modalidades=Modalidad_v3::where('situacion_id','=',$request->input('id'))->get();
        $html='<div  class="dropdown btn-group" role="group" style="width: 100%;">
                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Modalidades</button>
                    <div class="dropdown-menu" >';
        foreach ($Modalidades as $Modalidad) {
            $html.='<a class="dropdown-item" role="presentation" onclick="ModalidadFiltro('.$Modalidad->modalidad_id.')"   style="font-size: 0.5rem;" >'.$Modalidad->descripcion.'
            </a>';
        }
        $html.='</div></div>';
        return $html;
    }
    public function GetEscuela(Request $request)
    {

        $Escuelas=Escuela_v3::where('grado_id','=',$request->input('id'))->get();
        $html='<div  class="dropdown btn-group" role="group" style="width: 100%;">
                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Escuelas</button>
                    <div class="dropdown-menu" >';
        foreach ($Escuelas as $Escuela) {
            $html.='<a class="dropdown-item" role="presentation" onclick="EscuelaFiltro('.$Escuela->escuela_id.')"   style="font-size: 0.5rem;" >'.$Escuela->descripcion.'
            </a>';
        }
        $html.='<a class="dropdown-item" role="presentation" onclick="EscuelaFiltro(0)"   style="font-size: 0.5rem;" >Sin Dato
            </a>';
        $html.='</div></div>';
        return $html;
    }
    public function GetPlantel(Request $request)
    {
        $Planteles=Plantel_v3::where('escuela_id','=',$request->input('id'))->get();
        $html='<div  class="dropdown btn-group" role="group" style="width: 100%;">
                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Planteles</button>
                    <div class="dropdown-menu" >';
        foreach ($Planteles as $Plantel) {
            $html.='<a class="dropdown-item" role="presentation" onclick="PlantelFiltro('.$Plantel->plantel_id.')"   style="font-size: 0.5rem;" >'.$Plantel->descripcion.'
            </a>';
        }
        $html.='</div></div>';
        return $html;
    }
    
    
    /****************************************************************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    public function GetFiltroShow(Request $request)
    {
        $Filtro="";
       // dd($request);
        if (!is_null($request->input('grado_id'))) {
                $Filtro.='<a href="#" onclick="LimpiarFiltro_sin_Grafica()">'.Grado_v3::where('grado_id',$request->input('grado_id'))->value('descripcion')."</a>";
            
        }
        if (!is_null($request->input('situacion_id'))) {
            if ($Filtro=="") {
                $Filtro.='<a href="#" onclick="LimpiarFiltro_Situacion()">'.Situacion_v3::where('situacion_id',$request->input('situacion_id'))->value('descripcion')."</a>";
            }else{
                $Filtro.=' > <a href="#" onclick="LimpiarFiltro_Situacion()">'.Situacion_v3::where('situacion_id',$request->input('situacion_id'))->value('descripcion')."</a>";
            }
        }
        if (!is_null($request->input('modalidad_id'))) {
            if ($Filtro=="") {
                $Filtro.='<a href="#" onclick="LimpiarFiltro_Modalidad()">'.Modalidad_v3::where('modalidad_id',$request->input('modalidad_id'))->value('descripcion')."</a>";
            }else{
                $Filtro.=' > <a href="#" onclick="LimpiarFiltro_Modalidad()">'.Modalidad_v3::where('modalidad_id',$request->input('modalidad_id'))->value('descripcion')."</a>";
            }
        }
        if (!is_null($request->input('escuela_id'))) {
            if ($Filtro=="") {
                $Filtro.='<a href="#" onclick="LimpiarFiltro_Escuela()">'.Escuela_v3::where('escuela_id',$request->input('escuela_id'))->value('descripcion')."</a>";
            }else{
                $Filtro.=' > <a href="#" onclick="LimpiarFiltro_Escuela()">'.Escuela_v3::where('escuela_id',$request->input('escuela_id'))->value('descripcion')."</a>";
            }
        }
        if (!is_null($request->input('plantel_id'))) {
            if ($Filtro=="") {
                $Filtro.=' > '.Plantel_v3::where('plantel_id',$request->input('plantel_id'))->value('descripcion')."</a>";
            }else{
                $Filtro.=' > '.Plantel_v3::where('plantel_id',$request->input('plantel_id'))->value('descripcion');
            }
        }
        return "<a> " .$Filtro. "</a>";
    }
    /****************************************************************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    public function GetUsuariosNumeracion(Request $request)
    {
        $Situacion=null;
        $SigS="!=";
        $Modalidad=null;
        $SigM='!=';
        $Nivel=null;
        $SigN='!=';
        $Escula=null;
        $SigE='!=';
        $Plantel=null;
        $SigP='!=';
        $FechaI=null;
        $FechaF=null;
        $Usuarios=[];
        if($request->input('situacion_id')!=null) {
            $Situacion=$request->input('situacion_id');
            $SigS='=';
        }
        if ($request->input('modalidad_id')!=null) {
            $Modalidad=$request->input('modalidad_id');
            $SigM='=';
        }
        if ($request->input('grado_id')!=null) {
            $Nivel=$request->input('grado_id');
            $SigN='=';
        }
        if ($request->input('escuela_id')!=null) {
            $Escula=$request->input('escuela_id');
            $SigE='=';
        }
        if ($request->input('plantel_id')!=null) {
            $Plantel=$request->input('plantel_id');
            $SigP='=';
        }
        if ($request->input('Fecha_I')!=null) {
            $FechaI=$request->input('Fecha_I');
        }
        if ($request->input('Fecha_F')!=null) {
            $FechaF=$request->input('Fecha_F');
        }
        if ($request->input('situacion_id')!=null||$request->input('modalidad_id')!=null||$request->input('grado_id')!=null||$request->input('escuela_id')!=null||$request->input('plantel_id')!=null) {
            $Usuario["Total"]=null;
            $Usuario["Usuario_Registro"]=null;
            $Usuario["Usuario_Registro_Complementario"]=$this->GetTotalUsuaiosAlumnos($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF);
            $Usuario["Alumno_Cuestionario"]=$this->GetTotalUsuaiosAlumnosCuestionario($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF);
            $Usuario["Alumno_evaluacion"]=$this->GetTotalUsuaiosAlumnosCuestionarioEvaluacion($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF);

        }else{
            $Total=$this->GetTotalUsuaios($FechaI,$FechaF);
            $Total_Alumnos=$this->GetTotalUsuaiosAlumnos($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF);
            $Usuario["Total"]=$Total;
            $Usuario["Usuario_Registro"]=$Total-$Total_Alumnos;
            $Usuario["Usuario_Registro_Complementario"]=$Total_Alumnos;
            $Usuario["Alumno_Cuestionario"]=$this->GetTotalUsuaiosAlumnosCuestionario($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF);
            $Usuario["Alumno_evaluacion"]=$this->GetTotalUsuaiosAlumnosCuestionarioEvaluacion($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF);
        }
        return $Usuario;
    }

    public function GetTotalUsuaios($FechaI,$FechaF)
    {
        $NumeroUsuarios= User::whereBetween('created_at', [$FechaI, $FechaF])->get();   
        return count($NumeroUsuarios); 
    }

    public function GetTotalUsuaiosAlumnos($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF)
    {
        $NumeroUsuarios=alumno_orientador_v3::where('alumno_orientador',0)
                                    ->where('situacion_id',$SigS,$Situacion)
                                    ->where('modalidad_id',$SigM,$Modalidad)
                                    ->where('grado_id',$SigN,$Nivel)
                                    ->where('escuela_id',$SigE,$Escula)
                                    ->where('plantel_id',$SigP,$Plantel)
                                    ->whereBetween('fecha_creacion', [$FechaI, $FechaF])
                                    ->get();
        return count($NumeroUsuarios);
    }

    public function GetTotalUsuaiosAlumnosCuestionario($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF)
    {   
        $NumeroUsuarios=alumno_orientador_v3::join('cuestionario_v2','cuestionario_v2.usuario_id','=','alumno_orientador_v2.usuario_id')
                                    ->where('alumno_orientador',0)
                                    ->where('situacion_id',$SigS,$Situacion)
                                    ->where('modalidad_id',$SigM,$Modalidad)
                                    ->where('grado_id',$SigN,$Nivel)
                                    ->where('escuela_id',$SigE,$Escula)
                                    ->where('plantel_id',$SigP,$Plantel)
                                    ->whereBetween('alumno_orientador_v2.fecha_creacion', [$FechaI, $FechaF])
                                    ->get();
        return count($NumeroUsuarios);
    }

    public function GetTotalUsuaiosAlumnosCuestionarioEvaluacion($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF)
    {
        $NumeroUsuarios=alumno_orientador_v3::join('cuestionario_v2','cuestionario_v2.usuario_id','=','alumno_orientador_v2.usuario_id')
                                    ->join('preguntas_evaluacion_v2','preguntas_evaluacion_v2.usuario_id','=','alumno_orientador_v2.usuario_id')
                                    ->where('alumno_orientador',0)
                                    ->where('situacion_id',$SigS,$Situacion)
                                    ->where('modalidad_id',$SigM,$Modalidad)
                                    ->where('grado_id',$SigN,$Nivel)
                                    ->where('escuela_id',$SigE,$Escula)
                                    ->where('plantel_id',$SigP,$Plantel)
                                    ->whereBetween('alumno_orientador_v2.fecha_creacion', [$FechaI, $FechaF])
                                    ->get()
                                    ->groupBy('usuario_id');
                                    
        return count($NumeroUsuarios);
    }
    /****************************************************************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    /*****************************************GRAFICAS***************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    /****************************************************************************************************/
    
    public function Clasificacion_Graficos_Mostrar(Request $request)
    {
        //Filtros
        $Situacion=null;
        $SigS="!=";
        $Modalidad=null;
        $SigM='!=';
        $Nivel=null;
        $SigN='!=';
        $Escula=null;
        $SigE='!=';
        $Plantel=null;
        $SigP='!=';
        $FechaI=null;
        $FechaF=null;
        $Usuarios=[];
        $Datos=[];
        if($request->input('situacion_id')!=null) {
            $Situacion=$request->input('situacion_id');
            $SigS='=';
        }
        if ($request->input('modalidad_id')!=null) {
            $Modalidad=$request->input('modalidad_id');
            $SigM='=';
        }
        if ($request->input('grado_id')!=null) {
            $Nivel=$request->input('grado_id');
            $SigN='=';
        }
        if ($request->input('escuela_id')!=null) {
            $Escula=$request->input('escuela_id');
            $SigE='=';
        }
        if ($request->input('plantel_id')!=null) {
            $Plantel=$request->input('plantel_id');
            $SigP='=';
        }
        if ($request->input('Fecha_I')!=null) {
            $FechaI=$request->input('Fecha_I');
        }
        if ($request->input('Fecha_F')!=null) {
            $FechaF=$request->input('Fecha_F');
        }
        
        
         
        /*
        data.titulo
        data.subtitulo
        data.ejex
        data.info
        */
        //Clasificacion
        //0 -> grafica de inicio 
        //1 -> Estadistica
        //2 -> Preguntas de bienbenida 
        //3 -> Preguntas de evaluacion
        ///Segunda version
        ///////Graficas envueltas en datos
        ///1 principal
        ///2 sexo
        ///3 edad
        $Tem=[];
        if($request->input('TipoGrafica')==null){
          $Tipo=-1;
        }else{
          $Tipo=$request->input('TipoGrafica');
        }
        if($Tipo<0){
          
          $Datos["titulo"]='Histograma de usuarios de SEIVOC';
          $Datos["subtitulo"]='Son los usuarios totales del sistema';
          $Datos["ejex"]='Hitoria en numero de meses';
          $Tem=$this->Grafico_Inicio($FechaI,$FechaF);
          $Datos["infoy"]=$Tem[0];
          $Datos["infox"]=$Tem[1];
        }elseif($Tipo==0){
          if ($request->input('EspecialidadGrafica')==1) {
              $Datos["subtitulo"]=(String)"Escalas Unicas del sistema SEIVOC";
              $Datos["ejex"]="Escalas Unicas";
              $adicional[0]="retroalimentacion_v2.tipo";
              $adicional[1]="like";
              $adicional[2]="%Escala%";
              $Group[0]="retroalimentacion_v2.nombre";
              $Group[1]="retroalimentacion_v2.nombre";
          }elseif($request->input('EspecialidadGrafica')==2){
              $Datos["subtitulo"]="Perfiles Ideales del sistema SEIVOC";
              $Datos["ejex"]="Perfiles Ideales";
              $adicional[0]="retroalimentacion_v2.tipo";
              $adicional[1]="like";
              $adicional[2]="%Ideal%";
              $Group[0]="retroalimentacion_v2.nombre";
              $Group[1]="retroalimentacion_v2.nombre";
          }elseif($request->input('EspecialidadGrafica')==3){
              $Datos["subtitulo"]="Perfiles Inexistentes del sistema SEIVOC";
              $Datos["ejex"]="Perfiles Inexistentes";
              $adicional[0]="retroalimentacion_v2.tipo";
              $adicional[1]="like";
              $adicional[2]="%Inexistente%";
              $Group[0]="retroalimentacion_v2.nombre";
              $Group[1]="retroalimentacion_v2.nombre";
          }elseif($request->input('EspecialidadGrafica')==4){
              $Datos["subtitulo"]="Perfiles del sistema SEIVOC";
              $Datos["ejex"]="Perfiles";
              $adicional=null;
              $Group[0]="retroalimentacion_v2.tipo";
              $Group[1]="retroalimentacion_v2.tipo";
          }
          //dd($request->input('EspecialidadGrafica'));
          $Datos["titulo"]='Estadisticas de usuarios de SEIVOC';
          $Tem=$this->Grafico_2($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF,$adicional,$Group);
          $Datos["infoy"]=$Tem[0];
          $Datos["infox"]=$Tem[1];
        }elseif($Tipo==1){
          $Datos["titulo"]='Preguntas de Bienvenida del SEIVOC';
          $Pregunta=PreguntaC_v3::where("preguntaC_id","=",$request->input('EspecialidadGrafica'))->first();
          $Datos["subtitulo"]=$Pregunta->descripcion;
          $Tem=$this->GetUsuariosBienveniday($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF,$request->input('EspecialidadGrafica'));
          $Datos["infoy"]=$Tem[0];
          $Datos["infox"]=$Tem[1];
        }elseif($Tipo==2){
          $Datos["titulo"]='Preguntas de Evaluacion del SEIVOC';
          $Pregunta=PreguntaE_v3::where("preguntaE_id","=",$request->input('EspecialidadGrafica'))->first();
          $Datos["subtitulo"]=$Pregunta->descripcion;
          $Tem=$this->GetUsuariosEvaluacion($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF,$request->input('EspecialidadGrafica'));
          $Datos["infoy"]=$Tem[0];
          $Datos["infox"]=$Tem[1];
        }
        //dd($Datos);
        return json_encode($Datos);
    }
    public function GetUsuariosEvaluacion($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF,$Pregunta_id)
    {
        
        $Usuarios=alumno_orientador_v3::join('cuestionario_v2','cuestionario_v2.usuario_id','=','alumno_orientador_v2.usuario_id')
                                    ->join('preguntas_evaluacion_v2','preguntas_evaluacion_v2.usuario_id','=','alumno_orientador_v2.usuario_id')
                                    ->join('respuestae_v2','respuestae_v2.respuestaE_id','=','preguntas_evaluacion_v2.respuestaE_id')
                                    ->select(
                                          DB::raw('count(preguntas_evaluacion_v2.respuestaE_id) as respuestas'),
                                          DB::raw("respuestae_v2.descripcion as descripcion")
                                      )
                                    ->where('alumno_orientador',0)
                                    ->where('situacion_id',$SigS,$Situacion)
                                    ->where('modalidad_id',$SigM,$Modalidad)
                                    ->where('grado_id',$SigN,$Nivel)
                                    ->where('escuela_id',$SigE,$Escula)
                                    ->where('plantel_id',$SigP,$Plantel)
                                    ->whereBetween('alumno_orientador_v2.fecha_creacion', [$FechaI, $FechaF])
                                    ->where('preguntas_evaluacion_v2.preguntaE_id',"=",$Pregunta_id)
                                    ->groupBy('preguntas_evaluacion_v2.respuestaE_id')
                                    ->get();
                                    
        $data=[];
        $data2=[];
        foreach ($Usuarios as $Usuario) {
          array_push($data,$Usuario->respuestas);
          array_push($data2,$Usuario->descripcion);
        }
        return [$data,$data2];
      
        return $NumeroUsuarios;
    }
    public function GetUsuariosBienveniday($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF,$Pregunta_id)
    {
        
        $Usuarios=alumno_orientador_v3::join('preguntas_complemento_v2','preguntas_complemento_v2.usuario_id','=','alumno_orientador_v2.usuario_id')
                                    ->join('respuestac_v2','respuestac_v2.respuestaC_id','=','preguntas_complemento_v2.respuestaC_id')
                                    ->select(
                                          DB::raw('count(preguntas_complemento_v2.usuario_id) as respuestas'),
                                          DB::raw("respuestac_v2.descripcion as descripcion")
                                      )
                                    ->where('alumno_orientador',0)
                                    ->where('situacion_id',$SigS,$Situacion)
                                    ->where('modalidad_id',$SigM,$Modalidad)
                                    ->where('grado_id',$SigN,$Nivel)
                                    ->where('escuela_id',$SigE,$Escula)
                                    ->where('plantel_id',$SigP,$Plantel)
                                    ->whereBetween('alumno_orientador_v2.fecha_creacion', [$FechaI, $FechaF])
                                    ->where('preguntas_complemento_v2.preguntaC_id',"=",$Pregunta_id)
                                    ->groupBy('preguntas_complemento_v2.respuestaC_id')
                                    ->get();
                                    
        $data=[];
        $data2=[];
        foreach ($Usuarios as $Usuario) {
          array_push($data,$Usuario->respuestas);
          array_push($data2,$Usuario->descripcion);
        }
        return [$data,$data2];
      
        return $NumeroUsuarios;
    }
    
    /***********************************************************************/
    /***********************************************************************/
    /***********************************************************************/
    /***********************************************************************/
    public function Grafico_Inicio($FechaI,$FechaF)
    {
      $Usuarios= User::select(
            DB::raw('count(usuario_id) as user_count'),
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as months")
        )
        ->whereBetween('users.created_at', [$FechaI, $FechaF])
        ->orderByRaw('DATE_FORMAT(created_at, "%y%m")')
        ->groupBy('months')
        
        ->get();
      $data=[];
      $data2=[];
      foreach ($Usuarios as $Usuario) {
        array_push($data,$Usuario->user_count);
        array_push($data2,$Usuario->months);
      }
      return [$data,$data2];
    }
    
     public function Grafico_2($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF,$Where_adicional,$Group)
    {
      if($Where_adicional!= null){
        $Usuarios= alumno_orientador_v3::join('cuestionario_v2','cuestionario_v2.usuario_id','=','alumno_orientador_v2.usuario_id')
                              ->join('retroalimentacion_v2','retroalimentacion_v2.retro_id','=','cuestionario_v2.retro_id')
                              ->select(
                                  DB::raw('count('.$Group[1].') as conteo'),
                                  DB::raw($Group[1]." as nombres")
                              )
                              ->where('alumno_orientador',0)
                              ->where('situacion_id',$SigS,$Situacion)
                              ->where('modalidad_id',$SigM,$Modalidad)
                              ->where('grado_id',$SigN,$Nivel)
                              ->where('escuela_id',$SigE,$Escula)
                              ->where('plantel_id',$SigP,$Plantel)
                              ->where($Where_adicional[0],$Where_adicional[1],$Where_adicional[2])
                              ->whereBetween('alumno_orientador_v2.fecha_creacion', [$FechaI, $FechaF])
                              ->groupBy($Group[0])
                              ->get();
        }else{
          $Usuarios= alumno_orientador_v3::join('cuestionario_v2','cuestionario_v2.usuario_id','=','alumno_orientador_v2.usuario_id')
                              ->join('retroalimentacion_v2','retroalimentacion_v2.retro_id','=','cuestionario_v2.retro_id')
                              ->select(
                                  DB::raw('count('.$Group[1].') as conteo'),
                                  DB::raw($Group[1]." as nombres")
                              )
                              ->where('alumno_orientador',0)
                              ->where('situacion_id',$SigS,$Situacion)
                              ->where('modalidad_id',$SigM,$Modalidad)
                              ->where('grado_id',$SigN,$Nivel)
                              ->where('escuela_id',$SigE,$Escula)
                              ->where('plantel_id',$SigP,$Plantel)
                              ->whereBetween('alumno_orientador_v2.fecha_creacion', [$FechaI, $FechaF])
                              ->groupBy($Group[0])
                              ->get();
        }
      
      $data=[];
      $data2=[];
      foreach ($Usuarios as $Usuario) {
        array_push($data,$Usuario->conteo);
        array_push($data2,$Usuario->nombres);
      }
      return [$data,$data2];
      
    }
    
    /***********************************************************************/
    /***********************************************************************/
    /***********************************************************************/
    /***********************************************************************/
    public function Grafico_Sexo(Request $request)
    {
      //Filtros
        $Situacion=null;
        $SigS="!=";
        $Modalidad=null;
        $SigM='!=';
        $Nivel=null;
        $SigN='!=';
        $Escula=null;
        $SigE='!=';
        $Plantel=null;
        $SigP='!=';
        $FechaI=null;
        $FechaF=null;
        $Usuarios=[];
        $Datos=[];
        if($request->input('situacion_id')!=null) {
            $Situacion=$request->input('situacion_id');
            $SigS='=';
        }
        if ($request->input('modalidad_id')!=null) {
            $Modalidad=$request->input('modalidad_id');
            $SigM='=';
        }
        if ($request->input('grado_id')!=null) {
            $Nivel=$request->input('grado_id');
            $SigN='=';
        }
        if ($request->input('escuela_id')!=null) {
            $Escula=$request->input('escuela_id');
            $SigE='=';
        }
        if ($request->input('plantel_id')!=null) {
            $Plantel=$request->input('plantel_id');
            $SigP='=';
        }
        if ($request->input('Fecha_I')!=null) {
            $FechaI=$request->input('Fecha_I');
        }
        if ($request->input('Fecha_F')!=null) {
            $FechaF=$request->input('Fecha_F');
        }
        
      if($Situacion==null&&$Modalidad==null&&$Nivel==null&&$Escula==null&&$Plantel==null){
        $Usuarios=User::select(
            DB::raw('count(usuario_id) as conteo'),
            DB::raw("sexo as nombre")
        )
        ->whereBetween('users.created_at', [$FechaI, $FechaF])
        ->groupBy('sexo')
        ->get();
      }else{
        $Usuarios= User::join('alumno_orientador_v2','users.usuario_id','=','alumno_orientador_v2.usuario_id')
                              ->select(
                                  DB::raw('count(users.usuario_id) as conteo'),
                                  DB::raw("users.sexo as nombre")
                              )
                              ->where('alumno_orientador',0)
                              ->where('situacion_id',$SigS,$Situacion)
                              ->where('modalidad_id',$SigM,$Modalidad)
                              ->where('grado_id',$SigN,$Nivel)
                              ->where('escuela_id',$SigE,$Escula)
                              ->where('plantel_id',$SigP,$Plantel)
                              ->whereBetween('alumno_orientador_v2.fecha_creacion', [$FechaI, $FechaF])
                              ->groupBy('users.sexo')
                              ->get();
      }        
      $data=[];
      //dd($Usuarios);
      foreach ($Usuarios as $Usuario) {
      
        if($Usuario->nombre == 0){
          array_push($data,['Hombres registrados',$Usuario->conteo,'#BE3075','Usuario registrado']);
        }elseif($Usuario->nombre == 1){
          array_push($data,['Mujeres registradas',$Usuario->conteo,'#64A12D','Usuaria registrada']);
        }elseif($Usuario->nombre == null){
          array_push($data,['Sin sexo registrado',$Usuario->conteo,'#000000','Usuari@ sin sexo registrad@']);
        }
      }
      $Datos=[];
      $Datos["titulo"]='Grafica que muestra la tendencia de usuarios por sexo';
      $Datos["subtitulo"]='Clasificacion de usuarios por sexo del sistema';
      $Datos["info"]=$data;
      return json_encode($Datos);
      
    }
    
    
    public function Grafico_Edad(Request $request)
    {
      //Filtros
        $Situacion=null;
        $SigS="!=";
        $Modalidad=null;
        $SigM='!=';
        $Nivel=null;
        $SigN='!=';
        $Escula=null;
        $SigE='!=';
        $Plantel=null;
        $SigP='!=';
        $FechaI=null;
        $FechaF=null;
        $Usuarios=[];
        $Datos=[];
        if($request->input('situacion_id')!=null) {
            $Situacion=$request->input('situacion_id');
            $SigS='=';
        }
        if ($request->input('modalidad_id')!=null) {
            $Modalidad=$request->input('modalidad_id');
            $SigM='=';
        }
        if ($request->input('grado_id')!=null) {
            $Nivel=$request->input('grado_id');
            $SigN='=';
        }
        if ($request->input('escuela_id')!=null) {
            $Escula=$request->input('escuela_id');
            $SigE='=';
        }
        if ($request->input('plantel_id')!=null) {
            $Plantel=$request->input('plantel_id');
            $SigP='=';
        }
        if ($request->input('Fecha_I')!=null) {
            $FechaI=$request->input('Fecha_I');
        }
        if ($request->input('Fecha_F')!=null) {
            $FechaF=$request->input('Fecha_F');
        }
        
      
      $Datos["titulo"]='Grafica que muestra la tendencia de usuarios por edad';
      $Datos["subtitulo"]='Clasificacion de usuarios por sexo del sistema';
      //{ name: 'Firefox', y: 10.85 }
      $edad15=$this->count_usuario_edad($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF,-1,15);
      $edad15a18=$this->count_usuario_edad($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF,15,18);
      $edad18a21=$this->count_usuario_edad($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF,18,21);
      $edad21a24=$this->count_usuario_edad($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF,21,24);
      $edad24a100=$this->count_usuario_edad($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF,24,100);
      //$edad15a18=$this->count_usuario_edad($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF,15,18);
      
      $Datos["info"]=[["name"=>" < 15", "y"=>$edad15],["name"=>"16 - 18", "y"=>$edad15a18],["name"=>"19 - 21", "y"=>$edad18a21],["name"=>"22 - 24", "y"=>$edad21a24],["name"=>"25 >", "y"=>$edad24a100]];
      return json_encode($Datos);
      
    }
    public function count_usuario_edad($Situacion,$SigS,$Modalidad,$SigM,$Nivel,$SigN,$Escula,$SigE,$Plantel,$SigP,$FechaI,$FechaF,$edadmin,$edadmax)
    {
      if($Situacion==null&&$Modalidad==null&&$Nivel==null&&$Escula==null&&$Plantel==null){
        $Usuarios=User::whereBetween('users.created_at', [$FechaI, $FechaF])
        ->where("edad",'>',$edadmin)
        ->where("edad",'<=',$edadmax)
        ->get();
      }else{
        $Usuarios= User::join('alumno_orientador_v2','users.usuario_id','=','alumno_orientador_v2.usuario_id')
                              ->where('alumno_orientador',0)
                              ->where('situacion_id',$SigS,$Situacion)
                              ->where('modalidad_id',$SigM,$Modalidad)
                              ->where('grado_id',$SigN,$Nivel)
                              ->where('escuela_id',$SigE,$Escula)
                              ->where('plantel_id',$SigP,$Plantel)
                              ->whereBetween('alumno_orientador_v2.fecha_creacion', [$FechaI, $FechaF])
                              ->where("edad",'>',$edadmin)
                              ->where("edad",'<=',$edadmax)
                              ->get();
      }
      return count($Usuarios);
    }
    
    
    
}
