<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



use App\Models\User;
use App\Models\alumno_orientador_v3;
use App\Models\Periodo_Escolar_v3;
use App\Models\Cuestionario_v3;
use App\Models\Cuestionario_Pregunta_v3;
use App\Models\Porcentaje_Grupo_Escalas_v3;
use App\Models\Grupo_v3;
use App\Models\Grupo_Escala_Pregunta_v3;
use App\Models\Escala_v3;
use App\Models\Situacion_v3;
use App\Models\Grado_v3;
use App\Models\Estado_v3;
use App\Models\Plantel_v3;
use App\Models\Modalidad_v3;
use App\Models\Escuela_v3;
use App\Models\Delegacion_v3;
use App\Models\Retroalimentacion_v3;
use App\Models\Material_v3;
use App\Models\Preguntas_Complemento_v3;
use App\Models\Mapeo_Escalas_Grupo_v3;
use App\Models\Preguntas_Evaluacion_v3;



class PrincipalController extends Controller
{
    //

    //  public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function procesoNulos(){
        $nulos = Cuestionario_v3::where('retro_id',NULL)->get();
        
        foreach($nulos as $nulo){  
            // Si tienen las 60 preguntas:
            if(sizeof(Cuestionario_pregunta_v3::where('cuestionario_id',$nulo->cuestionario_id)->get())==60){
                // Si el 'usuario_id' solo aparece una vez en cuestionario_v2 y tienen un null registrado, se manda su usuario_id al principal() para que se le asigne un 'retro_id'
                if(sizeof(Cuestionario_v3::where('usuario_id',$nulo->usuario_id)->get())==1){
                    $this->PrincipalTest($nulo->usuario_id);                    
                }
                // Si el 'usuario_id' aparece en cuestionario_v2 mas de 1 vez, y tiene un retro_id ya asignado, se le asigna el mismo id;
                if(sizeof(Cuestionario_v3::where('usuario_id',$nulo->usuario_id)->get())>1){
                    $retro_id = Cuestionario_v3::where('usuario_id',$nulo->usuario_id)->where('cuestionario_id',(($nulo->cuestionario_id)-1))->get('retro_id');

                    foreach($retro_id as $retro){                       
                        Cuestionario_v3::where('usuario_id',$nulo->usuario_id)->update(['retro_id'=>$retro->retro_id]);
                    }
                    
                }
                
            }
            // Si no tienen las 60 preguntas:
            if(sizeof(Cuestionario_pregunta_v3::where('cuestionario_id',$nulo->cuestionario_id)->get())<60){
                // echo("no son 60 en el cuestionario_id: ");
                // echo($nulo->cuestionario_id);
                // echo(";\n");
                $incompletos = Cuestionario_pregunta_v3::where('cuestionario_id',$nulo->cuestionario_id)->get();
                $incompletos->dd();
            }
        }

        
        
        
       
    }
    public function PrincipalTest($usuario_id){
        echo("Procesando al usuario {$usuario_id}" );
    }
    

    public function Principal()
    {
        $id=Auth::user()->usuario_id;
            //$id=22751;

        // $id = $usuario_id;

           
        $id_cuestionario=Cuestionario_v3::where('usuario_id', $id)->value('cuestionario_id');

          if(false){
            $id=Auth::user()->usuario_id;
            //$id=Usuario::where('usuario_id',7074)->value('usuario_id');
            $id_cuestionario=Cuestionario_v3::where('usuario_id', $id)->value('cuestionario_id');
            //var_dump($id_cuestionario);
            $id_retro=Cuestionario_v3::where('cuestionario_id',$id_cuestionario)->value('retro_id');

            $Retroalimentacion=Retroalimentacion_v3::where('retro_id',$id_retro)->get();

            $Material=Material_v3::where('material_id', $id_Material)->get();
            //Grafica
            $arreglo_grafica= array();

            $Respuestas=Cuestionario_Pregunta_v3_v3::where('cuestionario_id', $id_cuestionario)->orderby('pregunta_id', 'ASC')->pluck('valor');

            $SS = $Respuestas[0]+$Respuestas[10]+$Respuestas[20]+$Respuestas[30]+$Respuestas[40]+$Respuestas[50];
            $EP = $Respuestas[1]+$Respuestas[11]+$Respuestas[21]+$Respuestas[31]+$Respuestas[41]+$Respuestas[51];
            $V  = $Respuestas[2]+$Respuestas[12]+$Respuestas[22]+$Respuestas[32]+$Respuestas[42]+$Respuestas[52];
            $AP = $Respuestas[3]+$Respuestas[13]+$Respuestas[23]+$Respuestas[33]+$Respuestas[43]+$Respuestas[53];
            $MS = $Respuestas[4]+$Respuestas[14]+$Respuestas[24]+$Respuestas[34]+$Respuestas[44]+$Respuestas[54];
            $OG = $Respuestas[5]+$Respuestas[15]+$Respuestas[25]+$Respuestas[35]+$Respuestas[45]+$Respuestas[55];
            $CT = $Respuestas[6]+$Respuestas[16]+$Respuestas[26]+$Respuestas[36]+$Respuestas[46]+$Respuestas[56];
            $CL = $Respuestas[7]+$Respuestas[17]+$Respuestas[27]+$Respuestas[37]+$Respuestas[47]+$Respuestas[57];
            $MC = $Respuestas[8]+$Respuestas[18]+$Respuestas[28]+$Respuestas[38]+$Respuestas[48]+$Respuestas[58];
            $AL = $Respuestas[9]+$Respuestas[19]+$Respuestas[29]+$Respuestas[39]+$Respuestas[49]+$Respuestas[59];
            $SS = $SS*100/24;
            $EP = $EP*100/24;
            $V = $V*100/24;
            $AP = $AP*100/24;
            $MS = $MS*100/24;
            $OG = $OG*100/24;
            $CT = $CT*100/24;
            $CL = $CL*100/24;
            $MC = $MC*100/24;
            $AL = $AL*100/24;

            $arreglo_grafica['SS']=round($SS);
            $arreglo_grafica['EP']=round($EP);
            $arreglo_grafica['V']= round($V);
            $arreglo_grafica['AP']=round($AP);
            $arreglo_grafica['MS']=round($MS);
            $arreglo_grafica['OG']=round($OG);
            $arreglo_grafica['CT']=round($CT);
            $arreglo_grafica['CL']=round($CL);
            $arreglo_grafica['MC']=round($MC);
            $arreglo_grafica['AL']=round($AL);
            //Perfil
            if ($Retroalimentacion[0]['tipo']=='Escala Unica') {
                $tipoPerfil='Unicos';
            }elseif ($Retroalimentacion[0]['tipo']=='Plano General (Moderado-Fuerte)') {
                $tipoPerfil='Planos';
            }elseif ($Retroalimentacion[0]['tipo']=='Plano General (Ligero)') {
                $tipoPerfil='Ligeros';
            }elseif ($Retroalimentacion[0]['tipo']=='Plano General (Escaso)') {
                $tipoPerfil='Escasos';
            }elseif ($Retroalimentacion[0]['tipo']=='Inexistente (Fuerte-Moderado)') {
                $tipoPerfil='Inexistente';
            }elseif ($Retroalimentacion[0]['tipo']=='Primaria(Moderado-Fuerte)') {
                $tipoPerfil='Primarios';
            }elseif ($Retroalimentacion[0]['tipo']=='Secundaria(Moderado-Fuerte)') {
                $tipoPerfil='Secundarios';
            }elseif ($Retroalimentacion[0]['tipo']=='Ideal') {
                $tipoPerfil='Ideal';
                $Datos['Colores']=$this->getColoresIdeales($Retroalimentacion[0]['id_retro']-41);
            }elseif ($Retroalimentacion[0]['tipo']=='G. Potenciales') {
                $tipoPerfil='Potencial';
            }elseif ($Retroalimentacion[0]['tipo']=='Incongruente') {
                $tipoPerfil='Incongruente';
            }

            //contenido de texto
            $Presentacion=$Retroalimentacion[0]['introducion'];
            $Explicacion=$Retroalimentacion[0]['descripcion'];
            $Carreras=$Retroalimentacion[0]['carreras'];
            $Materiales=$Retroalimentacion[0]['expMateriales'];
            //imagenes
            $imagenEx='assets/imagenesReto/'.$tipoPerfil.'.png';
            $imagenGif='assets/imagenesReto/'.$tipoPerfil.'.gif';
            $hojas=$Material[0]['urlPdf'];
            $video=$Material[0]['urlImagen'];
            //igualacion para enviar datos a la vista
            $Datos['tipoPerfil']=$tipoPerfil;
            $Datos['Presentacion']=$Presentacion;
            $Datos['Explicacion']=$Explicacion;
            $Datos['Carreras']=$Carreras;
            $Datos['Materiales']=$Materiales;
            $Datos['imagenEx']=$imagenEx;
            $Datos['imagenGif']=$imagenGif;
            $Datos['hojas']=$hojas;
            $Datos['video']=$video;
            $Datos['Grafica']=$arreglo_grafica;


            return view('seivoc.explora_intereses.respuesta')->with('Datos',$Datos);

        }else{
            return $this->Proceso_Perfiles($id);
        }
    }
    //Principal de testeo

     //funcion que tiene en cuenta los perfiles multi perfil
    public function Proceso_Perfiles($usuario_id) {

        $id=$usuario_id;
        $ID_Cuestionario_v3=Cuestionario_v3::where('usuario_id', $id)->first();
        //dd($ID_Cuestionario_v3);
        $ID_Cuestionario_v3=$ID_Cuestionario_v3['cuestionario_id'];

        $Respuestas=Cuestionario_Pregunta_v3::where('cuestionario_id',$ID_Cuestionario_v3 )->orderby('pregunta_id', 'ASC')->pluck('valor');

        
        $SS = $Respuestas[0]+$Respuestas[10]+$Respuestas[20]+$Respuestas[30]+$Respuestas[40]+$Respuestas[50];
        $EP = $Respuestas[1]+$Respuestas[11]+$Respuestas[21]+$Respuestas[31]+$Respuestas[41]+$Respuestas[51];
        $V  = $Respuestas[2]+$Respuestas[12]+$Respuestas[22]+$Respuestas[32]+$Respuestas[42]+$Respuestas[52];
        $AP = $Respuestas[3]+$Respuestas[13]+$Respuestas[23]+$Respuestas[33]+$Respuestas[43]+$Respuestas[53];
        $MS = $Respuestas[4]+$Respuestas[14]+$Respuestas[24]+$Respuestas[34]+$Respuestas[44]+$Respuestas[54];
        $OG = $Respuestas[5]+$Respuestas[15]+$Respuestas[25]+$Respuestas[35]+$Respuestas[45]+$Respuestas[55];
        $CT = $Respuestas[6]+$Respuestas[16]+$Respuestas[26]+$Respuestas[36]+$Respuestas[46]+$Respuestas[56];
        $CL = $Respuestas[7]+$Respuestas[17]+$Respuestas[27]+$Respuestas[37]+$Respuestas[47]+$Respuestas[57];
        $MC = $Respuestas[8]+$Respuestas[18]+$Respuestas[28]+$Respuestas[38]+$Respuestas[48]+$Respuestas[58];
        $AL = $Respuestas[9]+$Respuestas[19]+$Respuestas[29]+$Respuestas[39]+$Respuestas[49]+$Respuestas[59];

        $arregloEscalas = array(
            'V' => $V*100/24,
            'MS' => $MS*100/24,
            'AP' => $AP*100/24,
            'CT' => $CT*100/24,
            'CL' => $CL*100/24,
            'SS' => $SS*100/24,
            'EP' => $EP*100/24,
            'OG' => $OG*100/24,
            'MC' => $MC*100/24,
            'AL' => $AL*100/24
        );


         //Separar las escalas en bruto en fuertes y moderados (las demas no se toman en cuenta )
        $arreglo_fuertes = array();
        $arreglo_moderados = array();
        $arreglo_fuertesINX = array();
        $arreglo_moderadosINX = array();
        $arreglo_ligeros = array();
        $arreglo_escasos = array();
        //areglo para grafica
        $arreglo_grafica= array();

        foreach ($arregloEscalas as $escala => $valor_escala) {
            if($valor_escala >= 75 ){
                array_push($arreglo_fuertes, $escala);
                $arreglo_fuertesINX[$escala] = $valor_escala;
            }else if($valor_escala >= 50 && $valor_escala <= 74){
                array_push($arreglo_moderados, $escala);
                $arreglo_moderadosINX[$escala] = $valor_escala;
            }else if($valor_escala >= 25 && $valor_escala <= 49){
                array_push($arreglo_ligeros, $escala);

                //$arreglo_ligeros[$escala] = $valor_escala;
            }else if($valor_escala >= 0 && $valor_escala <= 24)
                array_push($arreglo_escasos, $escala);
               //$arreglo_escasos[$escala] = $valor_escala;

            $arreglo_grafica[$escala]=round($valor_escala);
        }
        //ordenamos los arreglos para los procesos siguientes
        arsort($arreglo_fuertes);
        arsort($arreglo_moderados);
        arsort($arreglo_ligeros);
        arsort($arreglo_escasos);
        $Datos=array();



        if ( $this->Perfiles_escasos($arreglo_fuertes,$arreglo_moderados,$arreglo_ligeros,$arreglo_escasos)) {

            $Datos=$this->GetEscasos();

        }elseif ( $this->Perfiles_ligeros($arreglo_fuertes,$arreglo_moderados,$arreglo_ligeros,$arreglo_escasos)) {

            $Datos=$this->GetLigeros();

        }elseif ( $this->Perfiles_planos($arreglo_fuertes,$arreglo_moderados)) {

            $Datos=$this->GetPlanos();

        }elseif ( $this->Perfiles_Unicos($arreglo_fuertes,$arreglo_moderados)) {

           if (count($arreglo_fuertes)==1&&count($arreglo_moderados)<=0){
                $nombre=$arreglo_fuertes[0];
            }else{
                $nombre=$arreglo_moderados[0];
            }

            $Datos=$this->GetUnicos($nombre);

        }elseif ( $this->Perfiles_Primarios($arreglo_fuertes,$arreglo_moderados)) {

            $Datos=$this->GetPrimarios();

        }elseif ( $this->Perfiles_Secundarios($arreglo_fuertes,$arreglo_moderados)) {

            $Datos=$this->GetSecundarios();

        }elseif (($Grupos=$this->Perfiles_Potencial($arreglo_fuertes,$arreglo_moderados))!=null) {
            //grupos con posibilidades de ser ideal
            
                $GrupoEncontrado=$this->Perfiles_Ideal($Grupos,$ID_Cuestionario_v3);
            if (isset($GrupoEncontrado)){
                if (count($GrupoEncontrado)>1) {
                    $GrupoIdealIdela=$this->Miltipefil($GrupoEncontrado,$ID_Cuestionario_v3);
                    if (count($GrupoIdealIdela)>1){
                        //multiideal

                        $Datos=$this->GetIdeales($GrupoIdealIdela[0]);
                    }else{
                        //ideal de ideales
                        $Datos=$this->GetIdeales($GrupoIdealIdela[0]);

       // dd($Datos);
                    }
                }else{
                    //ideal puro
                    $Datos=$this->GetIdeales($GrupoEncontrado[0]);

                }
            }else{

                $KeyGrupos=array_keys($Grupos);
                $Carerras="";
                for ($i=0;$i<3;$i++){
                  if(isset($KeyGrupos[$i])){
                    $Busqueda=Retroalimentacion_v3::where('retro_id',$KeyGrupos[$i]+41)->get()->first();
                    $Carerras.="<br>".$Busqueda->carreras;
                  }
                }
                $Datos=$this->GetPotencial($Carerras);

            }

        }elseif ( $this->Perfiles_Incongruente($arreglo_fuertes,$arreglo_moderados)) {

            $Datos=$this->GetIncongruente();


        }else{
            $Escalas=array_merge($arreglo_fuertesINX,$arreglo_moderadosINX);
            $KeyInexistente=array_keys($Escalas);
            $Datos=$this->GetInexistente($KeyInexistente[0],$KeyInexistente[1]);

        }
        //dd($Datos['Presentacion']);
        $ActualizacionCuestionario=Cuestionario_v3::where('cuestionario_id',$ID_Cuestionario_v3)->update(['retro_id'=>$Datos['Id_retro']]);
        $Datos['Grafica']=$arreglo_grafica;

        return view('seivoc.explora_intereses.respuesta')->with('Datos',$Datos);

    }

    //***************************************************************************************************/
    /**************************************Funciones para recursos***************************************/
    /****************************************nesarios para vistas****************************************/
    //***************************************************************************************************/

    public function GetEscasos()
    {
        $Retroalimentacion=Retroalimentacion_v3::where('retro_id',13)->get();
        $Material=Material_v3::where('material_id', $Retroalimentacion[0]->material_id)->get();
        //contenido de texto
        $tipoPerfil='Escasos';
        $Presentacion=$Retroalimentacion[0]['introduccion'];
        $Explicacion=$Retroalimentacion[0]['descripcion'];
        $Carreras=$Retroalimentacion[0]['carreras'];
        $Materiales=$Retroalimentacion[0]['expMateriales'];
        //imagenes
        $imagenEx='assets/imagenesReto/Escasos.png';
        $imagenGif='assets/imagenesReto/Escasos.gif';
        $hojas=$Material[0]['urlPdf'];
        $video=$Material[0]['urlVideo'];
        $Id_retro=$Retroalimentacion[0]['retro_id'];
        $Datos['Id_retro']=$Retroalimentacion[0]['retro_id'];
        //igualacion para enviar datos a la vista
        $Datos['tipoPerfil']=$tipoPerfil;
        $Datos['Presentacion']=$Presentacion;
        $Datos['Explicacion']=$Explicacion;
        $Datos['Carreras']=$Carreras;
        $Datos['Materiales']=$Materiales;
        $Datos['imagenEx']=$imagenEx;
        $Datos['imagenGif']=$imagenGif;
        $Datos['hojas']=$hojas;
        $Datos['video']=$video;
        return $Datos;
    }

    public function GetLigeros()
    {
        $Retroalimentacion=Retroalimentacion_v3::where('retro_id',12)->get();
        $Material=Material_v3::where('material_id', $Retroalimentacion[0]->material_id)->get();
        //contenido de texto
        $tipoPerfil='Ligeros';
        $Presentacion=$Retroalimentacion[0]['introduccion'];
        $Explicacion=$Retroalimentacion[0]['descripcion'];
        $Carreras=$Retroalimentacion[0]['carreras'];
        $Materiales=$Retroalimentacion[0]['expMateriales'];
        //imagenes
        $imagenEx='assets/imagenesReto/Ligeros.png';
        $imagenGif='assets/imagenesReto/Ligeros.gif';
        $hojas=$Material[0]['urlPdf'];
        $video=$Material[0]['urlVideo'];
        //dd($Material[0]);
        $Id_retro=$Retroalimentacion[0]['retro_id'];
        $Datos['Id_retro']=$Retroalimentacion[0]['retro_id'];
        //igualacion para enviar datos a la vista
        $Datos['tipoPerfil']=$tipoPerfil;
        $Datos['Presentacion']=$Presentacion;
        $Datos['Explicacion']=$Explicacion;
        $Datos['Carreras']=$Carreras;
        $Datos['Materiales']=$Materiales;
        $Datos['imagenEx']=$imagenEx;
        $Datos['imagenGif']=$imagenGif;
        $Datos['hojas']=$hojas;
        $Datos['video']=$video;
        
        return $Datos;
    }
    public function GetPlanos()
    {
        $Retroalimentacion=Retroalimentacion_v3::where('retro_id',11)->get();
        $Material=Material_v3::where('material_id', $Retroalimentacion[0]->material_id)->get();
        //contenido de texto
        $tipoPerfil='Planos';
        $Presentacion=$Retroalimentacion[0]['introduccion'];
        $Explicacion=$Retroalimentacion[0]['descripcion'];
        $Carreras=$Retroalimentacion[0]['carreras'];
        $Materiales=$Retroalimentacion[0]['expMateriales'];
        //imagenes
        $imagenEx='assets/imagenesReto/Planos.png';
        $imagenGif='assets/imagenesReto/Planos.gif';
        $hojas=$Material[0]['urlPdf'];
        $video=$Material[0]['urlVideo'];
        $Id_retro=$Retroalimentacion[0]['retro_id'];
        $Datos['Id_retro']=$Retroalimentacion[0]['retro_id'];
        //igualacion para enviar datos a la vista
        $Datos['tipoPerfil']=$tipoPerfil;
        $Datos['Presentacion']=$Presentacion;
        $Datos['Explicacion']=$Explicacion;
        $Datos['Carreras']=$Carreras;
        $Datos['Materiales']=$Materiales;
        $Datos['imagenEx']=$imagenEx;
        $Datos['imagenGif']=$imagenGif;
        $Datos['hojas']=$hojas;
        $Datos['video']=$video;
        return $Datos;
    }

    public function GetUnicos($nombre)
    {
        $Retroalimentacion=Retroalimentacion_v3::where('nombre',$nombre)->get();
        $Material=Material_v3::where('material_id', $Retroalimentacion[0]->material_id)->get();

        //contenido de texto
        $tipoPerfil='Unicos';
        $Presentacion=$Retroalimentacion[0]['introduccion'];
        $Explicacion=$Retroalimentacion[0]['descripcion'];
        $Carreras=$Retroalimentacion[0]['carreras'];
        $Materiales=$Retroalimentacion[0]['expMateriales'];
        //imagenes
        $imagenEx='assets/imagenesReto/Unicos.png';
        $imagenGif='assets/imagenesReto/Unicos.gif';
        $hojas=$Material[0]['urlPdf'];
        $video=$Material[0]['urlVideo'];
        $Id_retro=$Retroalimentacion[0]['retro_id'];
        $Datos['Id_retro']=$Retroalimentacion[0]['retro_id'];
        //igualacion para enviar datos a la vista
        $Datos['tipoPerfil']=$tipoPerfil;
        $Datos['Presentacion']=$Presentacion;
        $Datos['Explicacion']=$Explicacion;
        $Datos['Carreras']=$Carreras;
        $Datos['Materiales']=$Materiales;
        $Datos['imagenEx']=$imagenEx;
        $Datos['imagenGif']=$imagenGif;
        $Datos['hojas']=$hojas;
        $Datos['video']=$video;
        return $Datos;
    }
    public function GetPrimarios()
    {
        $Retroalimentacion=Retroalimentacion_v3::where('retro_id',40)->get();
        $Material=Material_v3::where('material_id', $Retroalimentacion[0]->material_id)->get();
        //contenido de texto
        $tipoPerfil='Primarios';
        $Presentacion=$Retroalimentacion[0]['introduccion'];
        $Explicacion=$Retroalimentacion[0]['descripcion'];
        $Carreras=$Retroalimentacion[0]['carreras'];
        $Materiales=$Retroalimentacion[0]['expMateriales'];
        //imagenes
        $imagenEx='assets/imagenesReto/Primarios.png';
        $imagenGif='assets/imagenesReto/Primarios.gif';
        $hojas=$Material[0]['urlPdf'];
        $video=$Material[0]['urlVideo'];
        $Id_retro=$Retroalimentacion[0]['retro_id'];
        $Datos['Id_retro']=$Retroalimentacion[0]['retro_id'];
        //igualacion para enviar datos a la vista
        $Datos['tipoPerfil']=$tipoPerfil;
        $Datos['Presentacion']=$Presentacion;
        $Datos['Explicacion']=$Explicacion;
        $Datos['Carreras']=$Carreras;
        $Datos['Materiales']=$Materiales;
        $Datos['imagenEx']=$imagenEx;
        $Datos['imagenGif']=$imagenGif;
        $Datos['hojas']=$hojas;
        $Datos['video']=$video;
        return $Datos;
    }
    public function GetSecundarios()
    {
        $Retroalimentacion=Retroalimentacion_v3::where('retro_id',41)->get();
        $Material=Material_v3::where('material_id', $Retroalimentacion[0]->material_id)->get();
        //contenido de texto
        $tipoPerfil='Secundarios';
        $Presentacion=$Retroalimentacion[0]['introduccion'];
        $Explicacion=$Retroalimentacion[0]['descripcion'];
        $Carreras=$Retroalimentacion[0]['carreras'];
        $Materiales=$Retroalimentacion[0]['expMateriales'];
        //imagenes
        $imagenEx='assets/imagenesReto/Secundarios.png';
        $imagenGif='assets/imagenesReto/Secundarios.gif';
        $hojas=$Material[0]['urlPdf'];
        $video=$Material[0]['urlVideo'];
        $Id_retro=$Retroalimentacion[0]['retro_id'];
        $Datos['Id_retro']=$Retroalimentacion[0]['retro_id'];
        //igualacion para enviar datos a la vista
        $Datos['tipoPerfil']=$tipoPerfil;
        $Datos['Presentacion']=$Presentacion;
        $Datos['Explicacion']=$Explicacion;
        $Datos['Carreras']=$Carreras;
        $Datos['Materiales']=$Materiales;
        $Datos['imagenEx']=$imagenEx;
        $Datos['imagenGif']=$imagenGif;
        $Datos['hojas']=$hojas;
        $Datos['video']=$video;
        return $Datos;
    }
    public function GetIdeales($id_grupos)
    {

        $Retroalimentacion=Retroalimentacion_v3::where('retro_id',$id_grupos+41)->get();
        $Material=Material_v3::where('material_id', $Retroalimentacion[0]->material_id)->get();
        //contenido de texto
        $tipoPerfil='Ideal';
        $Presentacion=$Retroalimentacion[0]['introduccion'];
        $Explicacion=$Retroalimentacion[0]['descripcion'];
        $Carreras=$Retroalimentacion[0]['carreras'];
        $Materiales=$Retroalimentacion[0]['expMateriales'];

        //imagenes
        $imagenEx='assets/imagenesReto/Ideal.png';
        $imagenGif='assets/imagenesReto/Ideal.gif';
        $hojas=$Material[0]['urlPdf'];
        $video=$Material[0]['urlVideo'];
        $Id_retro=$Retroalimentacion[0]['retro_id'];
        $Datos['Id_retro']=$Retroalimentacion[0]['retro_id'];
        //igualacion para enviar datos a la vista
        $Datos['Colores']=$this->getColoresIdeales($id_grupos);
        $Datos['tipoPerfil']=$tipoPerfil;
        $Datos['Presentacion']=$Presentacion;
        $Datos['Explicacion']=$Explicacion;
        $Datos['Carreras']=$Carreras;
        $Datos['Materiales']=$Materiales;
        $Datos['imagenEx']=$imagenEx;
        $Datos['imagenGif']=$imagenGif;
        $Datos['hojas']=$hojas;
        $Datos['video']=$video;
        return $Datos;
    }
    public function GetPotencial($CarrerasP)
    {
        $Retroalimentacion=Retroalimentacion_v3::where('retro_id',77)->get();
        $Material=Material_v3::where('material_id', $Retroalimentacion[0]->material_id)->get();
        //contenido de texto
        $tipoPerfil='Potencial';
        $Presentacion=$Retroalimentacion[0]['introduccion'];
        $Explicacion=$Retroalimentacion[0]['descripcion'];
        $Carreras=$Retroalimentacion[0]['carreras'];
        $Materiales=$Retroalimentacion[0]['expMateriales'];
        //imagenes
        $imagenEx='assets/imagenesReto/Potencial.png';
        $imagenGif='assets/imagenesReto/Potencial.gif';
        $hojas=$Material[0]['urlPdf'];
        $video=$Material[0]['urlVideo'];
        $Id_retro=$Retroalimentacion[0]['retro_id'];
        $Datos['Id_retro']=$Retroalimentacion[0]['retro_id'];
        //igualacion para enviar datos a la vista
        $Datos['tipoPerfil']=$tipoPerfil;
        $Datos['Presentacion']=$Presentacion;
        $Datos['Explicacion']=$Explicacion;
        $Datos['Carreras']=$CarrerasP;
        $Datos['Materiales']=$Materiales;
        $Datos['imagenEx']=$imagenEx;
        $Datos['imagenGif']=$imagenGif;
        $Datos['hojas']=$hojas;
        $Datos['video']=$video;
        return $Datos;
    }

    public function GetIncongruente()
    {
        $Retroalimentacion=Retroalimentacion_v3::where('retro_id',78)->get();
        $Material=Material_v3::where('material_id', $Retroalimentacion[0]->material_id)->get();
        //contenido de texto
        $tipoPerfil='Incongruente';
        $Presentacion=$Retroalimentacion[0]['introduccion'];
        $Explicacion=$Retroalimentacion[0]['descripcion'];
        $Carreras=$Retroalimentacion[0]['carreras'];
        $Materiales=$Retroalimentacion[0]['expMateriales'];
        //imagenes
        $imagenEx='assets/imagenesReto/Incongruente.png';
        $imagenGif='assets/imagenesReto/Incongruente.gif';
        $hojas=$Material[0]['urlPdf'];
        $video=$Material[0]['urlVideo'];
        $Id_retro=$Retroalimentacion[0]['retro_id'];
        $Datos['Id_retro']=$Retroalimentacion[0]['retro_id'];
        //igualacion para enviar datos a la vista
        $Datos['tipoPerfil']=$tipoPerfil;
        $Datos['Presentacion']=$Presentacion;
        $Datos['Explicacion']=$Explicacion;
        $Datos['Carreras']=$Carreras;
        $Datos['Materiales']=$Materiales;
        $Datos['imagenEx']=$imagenEx;
        $Datos['imagenGif']=$imagenGif;
        $Datos['hojas']=$hojas;
        $Datos['video']=$video;
        return $Datos;
    }

    //funcion falta mejorar las nuevas retroalimentaciones
    public function GetInexistente($key1,$key2)
    {
        if (Retroalimentacion_v3::where('nombre',$key1.','.$key2)->exists()) {
            $Ret=Retroalimentacion_v3::where('nombre',$key1.','.$key2)->get();
        }else{
            $Ret=Retroalimentacion_v3::where('nombre',$key2.','.$key1)->get();
        }
        //var_dump($key2.','.$key1);
        $Retroalimentacion=$Ret[0];
        $Material=Material_v3::where('material_id', $Retroalimentacion->material_id)->get();
        //contenido de texto
        $tipoPerfil='Inexistente';

        $Presentacion=$Retroalimentacion['introduccion'];
        $Explicacion=$Retroalimentacion['descripcion'];
        $Carreras=$Retroalimentacion['carreras'];
        $Materiales=$Retroalimentacion['expMateriales'];
        //imagenes
        $imagenEx='assets/imagenesReto/Inexistente.png';
        $imagenGif='assets/imagenesReto/Inexistente.gif';
        $hojas=$Material[0]['urlPdf'];
        $video=$Material[0]['urlVideo'];
        $Id_retro=$Retroalimentacion['retro_id'];
        $Datos['Id_retro']=$Retroalimentacion['retro_id'];
        //igualacion para enviar datos a la vista
        $Datos['tipoPerfil']=$tipoPerfil;
        $Datos['Presentacion']=$Presentacion;
        $Datos['Explicacion']=$Explicacion;
        $Datos['Carreras']=$Carreras;
        $Datos['Materiales']=$Materiales;
        $Datos['imagenEx']=$imagenEx;
        $Datos['imagenGif']=$imagenGif;
        $Datos['hojas']=$hojas;
        $Datos['video']=$video;
        return $Datos;
    }
    //funcion para sacar carreras de una retro alimentacion
    public function GetCarreras($Id_perfiles)
    {
        $Carreras="";
        foreach ($Id_perfiles as $Perfil) {
            $Carreras.=Retroalimentacion_v3::where('retro_id',$Id_perfil+41)->value('carreras');
        }
        return $Carreras;
    }

    //***************************************************************************************************/
    /************************************Funciones para procesamiento************************************/
    /********************************************Perfiles************************************************/
    //***************************************************************************************************/

    function Perfiles_ligeros($arrFuertes,$arrModerados,$arrLigeros,$arrEscasos)
	{
    	if (count($arrFuertes)<=0 &&count($arrModerados)<=0) {
    		if (count($arrLigeros)>0) {
    			return true;
    		}
    	}
    	return false;
	}

	function Perfiles_escasos($arrFuertes,$arrModerados,$arrLigeros,$arrEscasos)
	{
    	if (count($arrFuertes)<1 &&count($arrModerados)<1) {
    		if (count($arrLigeros)<=0&&count($arrEscasos)>0) {

    			return true;
    		}
    	}
    	return false;
	}

	function Perfiles_planos($arrFuertes,$arrModerados)
	{
    	if (count($arrFuertes)>5 ||count($arrModerados)>5) {
    		return true;
    	}
    	return false;
	}

	function Perfiles_Unicos($arrFuertes,$arrModerados)
	{
       // var_dump(count($arrFuertes)==1&&count($arrModerados)<=0);
    	if ((count($arrFuertes)==1&&count($arrModerados)<=0)||(count($arrFuertes)<=0&&count($arrModerados)==1)) {
    		return true;
    	}
    	return 0;
	}

	function Perfiles_Primarios($arrFuertes,$arrModerados)
	{
        if (count($arrFuertes)===5||count($arrModerados)===5) {
            if (in_array("V",$arrFuertes)&&in_array("AP",$arrFuertes)&&in_array("MS",$arrFuertes)&&in_array("CT",$arrFuertes)&&in_array("CL",$arrFuertes)&&!in_array("SS",$arrFuertes)&&!in_array("EP",$arrFuertes)&&!in_array("OG",$arrFuertes)&&!in_array("MC",$arrFuertes)&&!in_array("AL",$arrFuertes) ){
                return true;
            }
            if (in_array("V",$arrModerados)&&in_array("AP",$arrModerados)&&in_array("MS",$arrModerados)&&in_array("CT",$arrModerados)&&in_array("CL",$arrModerados)&&!in_array("SS",$arrModerados)&&!in_array("EP",$arrModerados)&&!in_array("OG",$arrModerados)&&!in_array("MC",$arrModerados)&&!in_array("AL",$arrModerados) ){
                return true;
            }
        }


	return false;
	}
	function Perfiles_Secundarios($arrFuertes,$arrModerados)
	{
	if (count($arrFuertes)===5||count($arrModerados)===5) {
            if (!in_array("V",$arrFuertes)&&!in_array("AP",$arrFuertes)&&!in_array("MS",$arrFuertes)&&!in_array("CT",$arrFuertes)&&!in_array("CL",$arrFuertes)&&in_array("SS",$arrFuertes)&&in_array("EP",$arrFuertes)&&in_array("OG",$arrFuertes)&&in_array("MC",$arrFuertes)&&in_array("AL",$arrFuertes) ){
                return true;
            }
            if (!in_array("V",$arrModerados)&&!in_array("AP",$arrModerados)&&!in_array("MS",$arrModerados)&&!in_array("CT",$arrModerados)&&!in_array("CL",$arrModerados)&&in_array("SS",$arrModerados)&&in_array("EP",$arrModerados)&&in_array("OG",$arrModerados)&&in_array("MC",$arrModerados)&&in_array("AL",$arrModerados) ){
                return true;
            }
        }


    return false;

	}
    function Perfiles_Incongruente($arrFuertes,$arrModerados)
    {
        if (count($arrFuertes)+count($arrModerados)>2) {
            return true;
        }
        return false;
    }


	//solo puede dar 3 perfiles potenciales
	function Perfiles_Potencial($arrFuertes,$arrModerados)
	{

        $GruposF=array();//todos los id de los grupos finales
        //Arreglo intermedio para acomodar arreglo
        $AcomodarGruposF=array();
        $NumeroUnos=array();
        $arrFuertes=array_merge($arrFuertes,$arrModerados);
        
        $arregloAuxFuerte=$arrFuertes;
        $arregloAuxModerados=$arrModerados;
        //cargado de perfiles ideales a un arreglo
        for ($i=1; $i <= (pow(2, count($arrFuertes))-1) ; $i++) {
            $EscalasN=["SS"=>0,"EP"=>0,"V"=>0,"AP"=>0,"MS"=>0,"OG"=>0,"CT"=>0,"CL"=>0,"MC"=>0,"AL"=>0];
            $KeyEscalasN=array_keys($EscalasN);
            $numBin=decbin($i);
            $arrBinario=str_split($numBin);
            $SumAux=count($arrBinario);
            $SumUnos=array_count_values($arrBinario);
            for ($ki=$SumAux; $ki < count($arrFuertes) ; $ki++) {
                array_unshift($arrBinario,0);
            }

            for ($j=0; $j <count($arrBinario) ; $j++) {
                $EscalasN[$arrFuertes[$j]]=(int)$arrBinario[$j];
            }
            $Resul=Mapeo_Escalas_Grupo_v3::where([
                [$KeyEscalasN[0],$EscalasN[$KeyEscalasN[0]]],
                [$KeyEscalasN[1],$EscalasN[$KeyEscalasN[1]]],
                [$KeyEscalasN[2],$EscalasN[$KeyEscalasN[2]]],
                [$KeyEscalasN[3],$EscalasN[$KeyEscalasN[3]]],
                [$KeyEscalasN[4],$EscalasN[$KeyEscalasN[4]]],
                [$KeyEscalasN[5],$EscalasN[$KeyEscalasN[5]]],
                [$KeyEscalasN[6],$EscalasN[$KeyEscalasN[6]]],
                [$KeyEscalasN[7],$EscalasN[$KeyEscalasN[7]]],
                [$KeyEscalasN[8],$EscalasN[$KeyEscalasN[8]]],
                [$KeyEscalasN[9],$EscalasN[$KeyEscalasN[9]]],
            ]
            )->exists();//->get();
                if ($Resul>0) {
                    $Selec2=Mapeo_Escalas_Grupo_v3::where([
                        [$KeyEscalasN[0],$EscalasN[$KeyEscalasN[0]]],
                        [$KeyEscalasN[1],$EscalasN[$KeyEscalasN[1]]],
                        [$KeyEscalasN[2],$EscalasN[$KeyEscalasN[2]]],
                        [$KeyEscalasN[3],$EscalasN[$KeyEscalasN[3]]],
                        [$KeyEscalasN[4],$EscalasN[$KeyEscalasN[4]]],
                        [$KeyEscalasN[5],$EscalasN[$KeyEscalasN[5]]],
                        [$KeyEscalasN[6],$EscalasN[$KeyEscalasN[6]]],
                        [$KeyEscalasN[7],$EscalasN[$KeyEscalasN[7]]],
                        [$KeyEscalasN[8],$EscalasN[$KeyEscalasN[8]]],
                        [$KeyEscalasN[9],$EscalasN[$KeyEscalasN[9]]],
                    ]
                    )->get();
                    //var_dump($Selec2);
                    foreach ($Selec2 as $Clave ) {
                        //array_push ($GruposF,);
                        $AcomodarGruposF[$Clave['grupo_id']]=$SumUnos[1];

                    }


                }
        }
        $OrdenarGruposF=$AcomodarGruposF;
        arsort($OrdenarGruposF);

        $GruposF=array_keys($OrdenarGruposF);


        return $OrdenarGruposF;
	}

    function Perfiles_Ideal($GruposEscalas,$cuestionario)
    {
        $Grupos=array_keys($GruposEscalas);
        $NumeroEscala=0;
        $PorEscalasGrupos=$this->getPorEslas($Grupos,$cuestionario);
        //dd($PorEscalasGrupos);
        //var_dump($PorEscalasGrupos);
        $KeyGrupos=array_keys($PorEscalasGrupos);
        $GruposPreguntasClave=array();
        for ($i=0; $i <count($PorEscalasGrupos) ; $i++) {
            //variable aux para bandera
            $flagGrupo=0;
            $PorRequeridos=Porcentaje_Grupo_Escalas_v3::where('grupo_id',$KeyGrupos[$i])->get();
            
            for ($j=0; $j < count($PorRequeridos); $j++) {
                if ($PorEscalasGrupos[$KeyGrupos[$i]][$PorRequeridos[$j]['escala_id']]<$PorRequeridos[$j]['porcentaje_min']) {
                    $flagGrupo=1;
                }
                if ($PorEscalasGrupos[$KeyGrupos[$i]][$PorRequeridos[$j]['escala_id']]>$PorRequeridos[$j]['porcentaje_max']) {
                    $flagGrupo=1;
                }
            }
            if ($flagGrupo===0&&$NumeroEscala<=$GruposEscalas[$KeyGrupos[$i]]) {
                $NumeroEscala=$GruposEscalas[$KeyGrupos[$i]];
                array_push ($GruposPreguntasClave,$KeyGrupos[$i]);
            }
            if ($NumeroEscala>$GruposEscalas[$KeyGrupos[$i]]) {
                return $GruposPreguntasClave;
            }

        }
    }
    public function Miltipefil($GruposEncontrados,$IDCuestionario)
    {
        $EscalasGruposIdeales=$this->getPorEslas($GruposEncontrados,$IDCuestionario);

        //Arreglo con grupos de con mejor sumatoria
        //$ArrGrupoM=array();
        //Mejor sumatoria
        $MSuma=0;
        $indexGrupo=0;
        if (count($GruposEncontrados)>1) {
            foreach ($GruposEncontrados as $Grupo) {

                $EscalasGrupoIdeal=array_keys($EscalasGruposIdeales[$Grupo]);
                $Sumatoria=0;
                for ($i=0; $i < count($EscalasGruposIdeales[$Grupo]) ; $i++) {
                    $Sumatoria+=$EscalasGruposIdeales[$Grupo][$EscalasGrupoIdeal[$i]];
                }


                if ($MSuma<=$Sumatoria) {
                    if ($MSuma==$Sumatoria) {
                        array_push($ArrGrupoM, $GruposEncontrados[$indexGrupo]);
                    }else{
                        $ArrGrupoM[0]=$GruposEncontrados[$indexGrupo];
                    }
                    $MSuma=$Sumatoria;

                }
                $indexGrupo++;
            }

            return $ArrGrupoM;
        }
    }

    /******************************************************************************************************************************/
    public function Retulados()
    {
        # code...
    }

    //***********************************************Ficiones de api*************************************************************
    //salvar el cuestionario
     function CSave(Request $request)
    {
        $tiempo=date('Y/m/d H:m:s');
        $id=Auth::user()->usuario_id;
        $tim="CURDATE()";
        $Preguntas = $request->input('respuestas');
        
        // $cuestionario = new Cuestionario(
        //     array('id_retro' => null  )
        //     );
        // $cuestionario->save();
        // $cuestionario =Cuestionario::where('id_retro',null)->orderby('id_cuestionario','DESC')->take(1)->get();
        // $id_cuestionario=$cuestionario[0]['id_cuestionario'];
        // //var_dump($cuestionario[0]['id_cuestionario']);
        // $Cuestionario_v3= new Cuestionario_v3(
        //     array('usuario_id' => $id ,
        //           'cuestionario_id'=>$id_cuestionario,
        //           'fecha_realizado'=> $tiempo
        //       ));
        // $Cuestionario_v3->save();

        $cuestionario = new Cuestionario_v3(array('usuario_id' => $id, 'fecha_creacion' => $tiempo, 'retro_id' => null));
        $cuestionario->save();

        $id_cuestionario = $cuestionario->cuestionario_id;

        //Guarda valor de las respuestas en la base con su correspondiente id_cuestionario

        for ($i=0; $i < 60 ; $i++) {
            $Cuestionario_Pregunta_v3= new Cuestionario_Pregunta_v3(
                array('pregunta_id' => $i+1,
                      'cuestionario_id' => $id_cuestionario,
                      'valor' => $Preguntas[$i]['valor'] ));
            $Cuestionario_Pregunta_v3->save();
        }

          //actualizar usuario
         $UsuarioAc=User::where('usuario_id',Auth::user()->usuario_id)->first();
         if ($UsuarioAc!=null) {
             $UsuarioAc->status_id=1;
             $UsuarioAc->save();
         }
        return $id_cuestionario;
    }

        //salvar el cuestionario para alumno
     function CSaveAlumno(Request $request)
    {

        if (alumno_orientador_v3::where('usuario_id',Auth::user()->usuario_id)->exists()) {
            return view('videoAlumno');
        }
        $id_anio='';
        $id_sirve ='';
        $id_estudiando='';
        $id_campo='';
        $id_opcion='';
        $error='';
        //-------- Verifica que el usuario haya elegido Situacion actual:
        if($request->input('cbx_situacion') != 0){
            $situacion_id = $request->input('cbx_situacion');
        } else {
            $error = '¡Elige una opción de "Situacion actual:"!';
        }

        //-------- Verifica que el usuario haya elegido Modalidad de estudio:
        if($request->input('cbx_modalidad') != 0){
            $modalidad_id =$request->input('cbx_modalidad');
        } else {
            $error = '¡Elige una opción de "Modalidad de estudio:"!';
        }

        //-------- Verifica que el usuario haya elegido Ultimo grado de estudios:
        if($request->input('cbx_grado') != 0){
            $grado_id = $request->input('cbx_grado');
            //---------- Verifica si el usuario eligio Bachillerato
            if($grado_id == 3){
                //------- Verifica que el usuario haya elegido Escuela:
                 if ($request->input('cbx_escuela') != 0) {
                    $escuela_id = $request->input('cbx_escuela');
                } else {
                    $error = '¡Elige una opción de "Selecciona tu escuela"!';
                }
            }

            //---------- Verifica si el usuario eligio Licenciatura
            if($grado_id == 4){
                //------- Verifica que el usuario haya elegido Escuela:
                 if ($request->input('cbx_escuela') != 0) {
                    $escuela_id = $request->input('cbx_escuela');
                } else {
                    $error = '¡Elige una opción de "Selecciona tu escuela"!';
                }
            }

            $plantel_id = $request->input('cbx_plantel');

            if($grado_id == 1 || $grado_id == 2){
                $escuela_id = ' ';
                $plantel_id = ' ';
            }

        } else {
            $error= '¡Elige una opción de "Nivel de escolaridad donde laboras:"!';
                    //echo "error grado";
        }

        //--------- Verifica si el usuario eligio alguna opción de Año que cursas/cursaste
        if($request->input('cbx_anio') != "0"){
            $id_anio = $request->input('cbx_anio');
        } else {
            $error = '¡Elige una opción de "Año que cursas/cursaste"!';
        }

        //-------- Verifica que el usuario haya elegido Lugar de residencia
        if($request->input('cbx_residencia') != 0){
            $estado_id = $request->input('cbx_residencia');
        } else {
            $error = '¡Elige una opción de "Lugar de residencia"!';
        }

       //--------- Verifica si el usuario eligio alguna opción de ¿Para qué crees que te servirá contestar el presente cuestionario de Intereses?
        if($request->input('cbx_sirve') != "0"){
            $id_sirve = $request->input('cbx_sirve');
        } else {
            $error = '¡Elige una opción de "¿Para qué crees que te servirá contestar el presente cuestionario de Intereses?"!';
        }

        //--------- Verifica si el usuario eligio alguna opción de la variable ¿Has pensado en alguna opción de carrera?
        if($request->input('cbx_opcion') != "0"){
            $id_opcion = $request->input('cbx_opcion');
        } else {
            $error = '¡Elige una opción de "¿Has pensado en alguna opción de carrera?"!';
        }

        //--------- Verifica si el usuario eligio alguna opción de la variable ¿Qué campo de conocimiento te interesa para realizar estudios de nivel superior?
        if($request->input('cbx_campo') != "0"){
            $id_campo = $request->input('cbx_campo');
        } else {
            $error = '¡Elige una opción de "¿Qué campo de conocimiento te interesa para realizar estudios de nivel superior?"!';
        }

        //--------- Verifica si el usuario eligio alguna opción de la variable ¿Por qué quieres seguir estudiando?
        if($request->input('cbx_estudiando') != "0"){
            $id_estudiando = $request->input('cbx_estudiando');
        } else {
            $error = 'Elige una opción de "¿Por qué quieres seguir estudiando?"';
        }

        if($id_anio == '1'){
            $anio = 'Primaria 5° año';
        }

        if($id_anio == '2'){
            $anio = 'Primaria 6° año';
        }

        if($id_anio == '3'){
            $anio = 'Secundaria 1er año';
        }

        if($id_anio == '4'){
            $anio = 'Secundaria 2° año';
        }

        if($id_anio == '5'){
            $anio = 'Secundaria 3er año';
        }

        if($id_anio == '6'){
            $anio = 'Bachillerato 1er año (1er ó 2° semes';
        }

        if($id_anio == '7'){
            $anio = 'Bachillerato 2° año (3er ó 4° semes';
        }

        if($id_anio == '8'){
            $anio = 'Bachillerato 3er año (5° ó 6° semes';
        }

        if($id_anio == '9'){
            $anio = 'Licenciatura 1er año';
        }

        if($id_anio == '10'){
            $anio = 'Licenciatura 2° año';
        }

        if($id_anio == '11'){
            $anio = 'Licenciatura 3er año';
        }

        if($id_anio == '12'){
            $anio = 'Licenciatura 4° año';
        }

        if($id_anio == '13'){
            $anio = 'Licenciatura 5° año';
        }

        if($id_anio == '14'){
            $anio = 'Licenciatura 6° año';
        }

        if($id_sirve == 'a'){
            $sirve = 'Conocer mis intereses';
        }

        if($id_sirve == 'b'){
            $sirve = 'Saber qué carrera estudiar';
        }

        if($id_sirve == 'c'){
            $sirve = 'Confirmar la carrera que he elegido';
        }

        if($id_sirve == 'd'){
            $sirve = 'Saber qué puedo estudiar acorde con mis intereses';
        }

        if($id_opcion == 'a'){
            $opcion = 'Sí, ya tengo opciones';
        }

        if($id_opcion == 'b'){
            $opcion ='No lo he pensado';
        }

        if($id_opcion == 'c'){
            $opcion = 'Me siento confundido(a)/Tengo dudas';
        }


        if($id_campo == 'a'){
            $campo = 'Área de las Ciencias Físico-Matemáticas y de las Ingenierías';
        }

        if($id_campo == 'b'){
            $campo = 'Área de Ciencias Biológicas, Químicas y de la Salud';
        }

        if($id_campo == 'c'){
            $campo = 'Área de las Ciencias Sociales';    }

        if($id_campo == 'd'){
            $campo = 'Área de las Humanidades y de las Artes';
        }

        if($id_campo == 'e'){
            $campo = 'Desconozco los campos de conocimientos que existen';
        }

        if($id_campo == 'f'){
            $campo = 'No sé a qué campo de conocimiento pertenece la carrera de mi interés';
        }

        if($id_estudiando == 'a'){
            $estudiando = 'Quiero ser alguien en la vida';
        }

        if($id_estudiando == 'b'){
            $estudiando = 'Quiero ganar bien con una profesión';
        }

        if($id_estudiando == 'c'){
            $estudiando = 'Me interesa estudiar';
        }
        if($id_estudiando == 'd'){
            $estudiando = 'Me va a dar prestigio';
        }

        if($id_estudiando == 'e'){
            $estudiando = 'Para superarme';
        }

        if($id_estudiando == 'f'){
            $estudiando = 'Porque así lo quieren mis papás';
        }

        if($id_estudiando == 'g'){
            $estudiando = 'Quiero aprovechar mi pase reglamentado';
        }

        if ($error=="") {
            if (($request->input('cbx_cdmx')=="0")&&($request->input('cbx_escuela')=="0")&&($request->input('cbx_plantel')=="0")) {
               $Alumno= new alumno_orientador_v3(
                        array('situacion' => Situacion_v3::where('situacion_id',$request->input('cbx_situacion'))->value('nombre'),
                              'modalidad' => Modalidad_v3::where('situacion_id',$request->input('cbx_modalidad'))->value('Nombre'),
                              'grado' => Grado_v3::where('grado_id',$request->input('cbx_grado'))->value('nombre'),
                              'plantel' => Plantel_v3::where('plantel_id',$request->input('cbx_plantel'))->value('nombre'),
                              'ultimo_anio_cursado' => $anio,
                              'residencia' => Estado_v3::where('estado_id',$request->input('cbx_residencia'))->value('nombre_estado'),
                              'delegacion' =>Delegacion_v3::where('estado_id',$request->input('cbx_cdmx'))->value('nombre'),
                              'para_que_me_sirve' => $sirve,
                              'opcion_de_carrera' => $opcion,
                              'interes_campo_de_conocimiento' => $campo,
                              'porque_seguir_estudiando' => $estudiando,
                              'usuario_id' => Auth::user()->usuario_id)
                );



            }elseif (($request->input('cbx_cdmx')=="0")&&($request->input('cbx_escuela')=="0")) {
                $Alumno= new alumno_orientador_v3(
                        array('situacion' => Situacion_v3::where('situacion_id',$request->input('cbx_situacion'))->value('nombre'),
                              'modalidad' => Modalidad_v3::where('situacion_id',$request->input('cbx_modalidad'))->value('Nombre'),
                              'grado' => Grado_v3::where('grado_id',$request->input('cbx_grado'))->value('nombre'),
                              'plantel' => Plantel_v3::where('plantel_id',$request->input('cbx_plantel'))->value('nombre'),
                              'ultimo_anio_cursado' => $anio,
                              'residencia' => Estado_v3::where('estado_id',$request->input('cbx_residencia'))->value('nombre_estado'),
                              'para_que_me_sirve' => $sirve,
                              'opcion_de_carrera' => $opcion,
                              'interes_campo_de_conocimiento' => $campo,
                              'porque_seguir_estudiando' => $estudiando,
                              'usuario_id' => Auth::user()->usuario_id)
                );
            }elseif (($request->input('cbx_escuela')=="0")&&($request->input('cbx_plantel')=="0")) {
                $Alumno= new alumno_orientador_v3(
                        array('situacion' => Situacion_v3::where('situacion_id',$request->input('cbx_situacion'))->value('nombre'),
                              'modalidad' => Modalidad_v3::where('situacion_id',$request->input('cbx_modalidad'))->value('Nombre'),
                              'grado' => Grado_v3::where('grado_id',$request->input('cbx_grado'))->value('nombre'),
                              'ultimo_anio_cursado' => $anio,
                              'residencia' => Estado_v3::where('estado_id',$request->input('cbx_residencia'))->value('nombre_estado'),
                              'delegacion' =>Delegacion_v3::where('estado_id',$request->input('cbx_cdmx'))->value('nombre'),
                              'para_que_me_sirve' => $sirve,
                              'opcion_de_carrera' => $opcion,
                              'interes_campo_de_conocimiento' => $campo,
                              'porque_seguir_estudiando' => $estudiando,
                              'usuario_id' => Auth::user()->usuario_id)
                );

            }elseif (($request->input('cbx_cdmx')=="0")&&($request->input('cbx_plantel')=="0")) {
                $Alumno= new Alumno(
                        array('situacion' => Situacion_v3::where('situacion_id',$request->input('cbx_situacion'))->value('nombre'),
                              'modalidad' => Modalidad_v3::where('situacion_id',$request->input('cbx_modalidad'))->value('Nombre'),
                              'grado' => Grado_v3::where('grado_id',$request->input('cbx_grado'))->value('nombre'),
                              'escuela' => Escuela_v3::where('escuela_id',$request->input('cbx_escuela'))->value('nombre'),
                              'ultimo_anio_cursado' => $anio,
                              'residencia' => Estado_v3::where('estado_id',$request->input('cbx_residencia'))->value('nombre_estado'),
                              'para_que_me_sirve' => $sirve,
                              'opcion_de_carrera' => $opcion,
                              'interes_campo_de_conocimiento' => $campo,
                              'porque_seguir_estudiando' => $estudiando,
                              'usuario_id' => Auth::user()->usuario_id)
                );


            }elseif (($request->input('cbx_cdmx')=="0")) {
                $Alumno= new Alumno(
                        array('situacion' => Situacion_v3::where('situacion_id',$request->input('cbx_situacion'))->value('nombre'),
                              'modalidad' => Modalidad_v3::where('situacion_id',$request->input('cbx_modalidad'))->value('Nombre'),
                              'grado' => Grado_v3::where('grado_id',$request->input('cbx_grado'))->value('nombre'),
                              'escuela' => Escuela_v3::where('escuela_id',$request->input('cbx_escuela'))->value('nombre'),
                              'plantel' => Plantel_v3::where('plantel_id',$request->input('cbx_plantel'))->value('nombre'),
                              'ultimo_anio_cursado' => $anio,
                              'residencia' => Estado_v3::where('estado_id',$request->input('cbx_residencia'))->value('nombre_estado'),
                              'para_que_me_sirve' => $sirve,
                              'opcion_de_carrera' => $opcion,
                              'interes_campo_de_conocimiento' => $campo,
                              'porque_seguir_estudiando' => $estudiando,
                              'usuario_id' => Auth::user()->usuario_id)
                );

            }elseif (($request->input('cbx_escuela')=="0")) {
                $Alumno= new Alumno(
                        array('situacion' => Situacion_v3::where('situacion_id',$request->input('cbx_situacion'))->value('nombre'),
                              'modalidad' => Modalidad_v3::where('situacion_id',$request->input('cbx_modalidad'))->value('Nombre'),
                              'grado' => Grado_v3::where('grado_id',$request->input('cbx_grado'))->value('nombre'),
                              'plantel' => Plantel_v3::where('plantel_id',$request->input('cbx_plantel'))->value('nombre'),
                              'ultimo_anio_cursado' => $anio,
                              'residencia' => Estado_v3::where('estado_id',$request->input('cbx_residencia'))->value('nombre_estado'),
                              'delegacion' =>Delegacion_v3::where('estado_id',$request->input('cbx_cdmx'))->value('nombre'),
                              'para_que_me_sirve' => $sirve,
                              'opcion_de_carrera' => $opcion,
                              'interes_campo_de_conocimiento' => $campo,
                              'porque_seguir_estudiando' => $estudiando,
                              'usuario_id' => Auth::user()->usuario_id)
                );

            }elseif (($request->input('cbx_plantel')=="0")) {
                $Alumno= new Alumno(
                        array('situacion' => Situacion_v3::where('situacion_id',$request->input('cbx_situacion'))->value('nombre'),
                              'modalidad' => Modalidad_v3::where('situacion_id',$request->input('cbx_modalidad'))->value('Nombre'),
                              'grado' => Grado_v3::where('grado_id',$request->input('cbx_grado'))->value('nombre'),
                              'escuela' => Escuela_v3::where('grado_id',$request->input('cbx_escuela'))->value('nombre'),
                              'ultimo_anio_cursado' => $anio,
                              'residencia' => Estado_v3::where('estado_id',$request->input('cbx_residencia'))->value('nombre_estado'),
                              'delegacion' =>Delegacion_v3::where('estado_id',$request->input('cbx_cdmx'))->value('nombre'),
                              'para_que_me_sirve' => $sirve,
                              'opcion_de_carrera' => $opcion,
                              'interes_campo_de_conocimiento' => $campo,
                              'porque_seguir_estudiando' => $estudiando,
                              'usuario_id' => Auth::user()->usuario_id)
                );

            }else{
                $Alumno= new Alumno(
                        array('situacion' => Situacion_v3::where('situacion_id',$request->input('cbx_situacion'))->value('nombre'),
                              'modalidad' => Modalidad_v3::where('situacion_id',$request->input('cbx_modalidad'))->value('Nombre'),
                              'grado' => Grado_v3::where('grado_id',$request->input('cbx_grado'))->value('nombre'),
                              'escuela' => Escuela_v3::where('escuela_id',$request->input('cbx_escuela'))->value('nombre'),
                              'plantel' => Plantel_v3::where('plantel_id',$request->input('cbx_plantel'))->value('nombre'),
                              'ultimo_anio_cursado' => $anio,
                              'residencia' => Estado_v3::where('estado_id',$request->input('cbx_residencia'))->value('nombre_estado'),
                              'delegacion' =>Delegacion_v3::where('estado_id',$request->input('cbx_cdmx'))->value('nombre'),
                              'para_que_me_sirve' => $sirve,
                              'opcion_de_carrera' => $opcion,
                              'interes_campo_de_conocimiento' => $campo,
                              'porque_seguir_estudiando' => $estudiando,
                              'usuario_id' => Auth::user()->usuario_id)
                );

            }

             //var_dump($Alumno);
             $Alumno->save();

             return view('videoAlumno');
        }else{
	        $Plantel=Plantel_v3::where("plantel_id",0)->first();
		$Modalidad=Modalidad_v3::where("modalidad_id",0)->first();
		$Escuela=Escuela_v3::where("escuela_id",0)->first();
		$Anio=Periodo_Escolar_v3::where("periodo_escolar_id",0)->first();
		$Delegacion=Delegacion_v3::where("delegacion_id",0)->first();

		$Situaciones=Situacion_v3::get();
		$Grados=Grado_v3::get();
		$Residencias=Estado_v3::get();
		$Para_que_me_sirves=Preg_cuestionario_intereses::get();
		$Opcion_de_carreras=Opcion_carrera::get();
		$Interes_campo_de_conocimientos=Intereses_conocimiento::get();
		$Porque_seguir_estudiandos=Porque_seguir_estudiando::get();
		return view("registroAmpAlumno",[
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

    }
    //salvar el cuestionario para orientador
     function CSaveOrientador(Request $request)
    {
        $error="";
        //-------- Verifica que el usuario haya elegido Primordialmente realizas actividades de:
        if($request->input('cbx_actividad') != "0"){
            /*
            echo "id_actividad: ".$id_actividad;
            echo "</br>";
            echo "</br>";*/

            if($request->input('cbx_actividad') == 'a'){
                $actividad = "Profesor de asignatura";
            }

            if($request->input('cbx_actividad') == 'b'){
                $actividad = 'Orientación';
            }

            if($request->input('cbx_actividad') == 'c'){
                $actividad = 'Tutoría';
            }

            if($request->input('cbx_actividad') == 'd'){
                $actividad = 'Profesor de asignatura y tutor';
            }
        } else {
            $error = '¡Elige una opción de "Primordialmente realizas actividades de:"!';
        }

        //-------- Verifica que el usuario haya elegido Nivel de escolaridad donde laboras:
        if($request->input('cbx_grado') != 0){
            $grado_id = $request->input('cbx_grado');
        } else {
            $error = '¡Elige una opción de "Nivel de escolaridad donde laboras:"!';
        }

        //-------- Verifica que el usuario haya elegido Modalidad en la que trabajas:
        if($request->input('cbx_situacion') != 0){
            $situacion_id = $request->input('cbx_situacion');
        } else {
            $error = '¡Elige una opción de "Modalidad en la que trabajas:"!';
        }

        //------- Verifica que el usuario haya elegido Escuela donde laboras:
         if ($request->input('cbx_escuela') != null) {
            $escuela_id = $request->input('cbx_escuela');
        } else {
            $error = '¡Completa el campo de "Escuela donde laboras:"!';
        }

        //-------- Verifica que el usuario haya elegido Ubicación de la escuela donde laboras
        if($request->input('cbx_residencia') != 0){
            $estado_id = $request->input('cbx_residencia');
        } else {
            $error = '¡Elige una opción de "Ubicación de la escuela donde laboras"!';
        }

        //--------- Verifica si el usuario eligio alguna opción de Primordialmente realizas actividades de:
        if($request->input('cbx_razon') != "0"){
            $id_razon = $request->input('cbx_razon');

            if($id_razon == 'a'){
                $razon = 'Conocer el funcionamiento del SEIVOC';
            }

            if($id_razon == 'b'){
                $razon = 'Ampliar mis conocimientos';
            }

            if($id_razon== 'c'){
                $razon = 'Tutoría';
            }
        } else {
            $error = '¡Elige una opción de "Primordialmente realizas actividades de:"!';
        }


        if ($error=="") {
            //'actividad','escolaridad_donde_labora','modalidad','escuela','ubicacion','delegacion','razon_interesa_seivoc','usuario_id'
            if (Delegacion_v3::where('delegacion_id',$request->input('cbx_cdmx'))->exists()) {
                $Orientador = new alumno_orientador_v3(
                        array('actividad' => $actividad,
                              'escolaridad_donde_labora' => Grado_v3::where('grado_id',$grado_id)->value('nombre'),
                              'modalidad' => Modalidad_v3::where('modalidad_id',$situacion_id)->value('nombre'),
                              'escuela' => $escuela_id,
                              'ubicacion' => Estado_v3::where('estado_id',$estado_id)->value('nombre_estado'),
                              'delegacion' => Delegacion_v3::where('delegacion_id',$request->input('cbx_cdmx'))->value('nombre'),
                              'razon_interesa_seivoc' => $id_razon,
                              'usuario_id' => Auth::user()->usuario_id)
                        );
            }else{
                $Orientador = new alumno_orientador_v3(
                        array('actividad' => $actividad,
                              'escolaridad_donde_labora' => Grado_v3::where('grado_id',$grado_id)->value('nombre'),
                              'modalidad' => Modalidad_v3::where('modalidad_id',$situacion_id)->value('nombre'),
                              'escuela' => $escuela_id,
                              'ubicacion' => Estado_v3::where('estado_id',$estado_id)->value('nombre_estado'),
                              'razon_interesa_seivoc' => $id_razon,
                              'usuario_id' => Auth::user()->usuario_id)
                        );
            }


            $Orientador->save();
            return view('videoAlumno');

        }else{
            $Modalidad=Modalidad_v3::where('situacion_id',1)->get();
            $Situacion=Situacion_v3::where('situacion_id','>',0)->get();
            $Grado=Grado_v3::where('grado_id','>',0)->get();
            $Residencia=Estado_v3::where('estado_id','>',0)->get();
            $Datos['Modalidad']=$Modalidad;
            $Datos['Situacion']=$Situacion;
            $Datos['Grado']=$Grado;
            $Datos['Residencia']=$Residencia;
            $Datos['error']=$error;
            return view('registroAmpOrientador')->with('Datos',$Datos);
        }
    }
    function CSaveEvaluacion(Request $request)
    {
        $error="";
        if ($request->input('cbx_expectativa')!= "0") {
           $expectativa=$request->input('cbx_expectativa');
        }else{
            $error='¡Elige una opción de "¿El cuestionario cumplió tu expectativa inicial?"!';
        }
        if ($request->input('cbx_deacuerdo')!= "0") {
           $deacuerdo=$request->input('cbx_deacuerdo');
        }else{
            $error='¡Elige una opción de "¿Estás de acuerdo con tus resultados obtenidos?"!';
        }
        if ($request->input('cbx_utilidad')!= "0") {
           $utilidad=$request->input('cbx_utilidad');
        }else{
            $error='¡Elige una opción de "¿En qué te fueron de utilidad los resultados y la retroalimentación proporcionada?"!';
        }
        if ($request->input('cbx_instrucciones')!= "0") {
           $instrucciones=$request->input('cbx_instrucciones');
        }else{
            $error='¡Elige una opción de "Las instrucciones del sistema fueron:"!';
        }
        if ($request->input('cbx_presentacion')!= "0") {
           $presentacion=$request->input('cbx_presentacion');
        }else{
            $error='¡Elige una opción de "La presentación del sistema: colores, imágenes, videos, personajes fueron:"!';
        }
        if ($request->input('cbx_navegacion')!= "0") {
           $navegacion=$request->input('cbx_navegacion');
        }else{
            $error='¡Elige una opción de "Navegar dentro del sistema fue:"!';
        }
        if ($request->input('cbx_resultados')!= "0") {
           $resultados=$request->input('cbx_resultados');
        }else{
            $error='¡Elige una opción de "La presentación de tus resultados fueron:"!';
        }
        if ($request->input('cbx_organizacion') != "0") {
           $organizacion=$request->input('cbx_organizacion');
        }else{
            $error='¡Elige una opción de "La organización de las pantallas fue:"!';
        }
        if ($request->input('cbx_secciones')!= "0") {
           $secciones=$request->input('cbx_secciones');
        }else{
            $error='¿Cuál de todas las secciones del sistema contribuyó más en tu decisión vocacional?';
        }
        if ($error=="") {
            if ($request->input('cbx_porque')!= "") {
               $porque=$request->input('cbx_porque');
            }else{
                $porque="  ";
            }
            if ($request->input('cbx_comentarios')!= "") {
               $comentarios=$request->input('cbx_comentarios');
            }else{
                $comentarios="  ";
            }

            $Evaluacion= new Preguntas_Evaluacion_v3(
                        array('usuario_id' => Auth::user()->usuario_id,
                            'preguntaE_id' => 1,
                            'respuestaE_id' =>  $expectativa));

            $Evaluacion= new Preguntas_Evaluacion_v3(
                        array('usuario_id' => Auth::user()->usuario_id,
                            'preguntaE_id' => 2,
                            'respuestaE_id' =>  $deacuerdo));

            $Evaluacion= new Preguntas_Evaluacion_v3(
                        array('usuario_id' => Auth::user()->usuario_id,
                            'preguntaE_id' => 3,
                            'respuestaE_id' =>  $utilidad));

            $Evaluacion= new Preguntas_Evaluacion_v3(
                        array('usuario_id' => Auth::user()->usuario_id,
                            'preguntaE_id' => 4,
                            'respuestaE_id' =>  $instrucciones));

            $Evaluacion= new Preguntas_Evaluacion_v3(
                        array('usuario_id' => Auth::user()->usuario_id,
                            'preguntaE_id' => 5,
                            'respuestaE_id' =>  $presentacion));

            $Evaluacion= new Preguntas_Evaluacion_v3(
                        array('usuario_id' => Auth::user()->usuario_id,
                            'preguntaE_id' => 6,
                            'respuestaE_id' =>  $navegacion));

            $Evaluacion= new Preguntas_Evaluacion_v3(
                        array('usuario_id' => Auth::user()->usuario_id,
                            'preguntaE_id' => 7,
                            'respuestaE_id' =>  $resultados));

            $Evaluacion= new Preguntas_Evaluacion_v3(
                        array('usuario_id' => Auth::user()->usuario_id,
                            'preguntaE_id' => 8,
                            'respuestaE_id' =>  $organizacion));

            $Evaluacion= new Preguntas_Evaluacion_v3(
                        array('usuario_id' => Auth::user()->usuario_id,
                            'preguntaE_id' => 9,
                            'respuestaE_id' =>  $secciones));

            $Evaluacion->save();
                            // 'cumplio_expectativa' => $expectativa,
                            // 'de_acuerdo_resultados' => $deacuerdo,
                            // 'utilidad_resultados_retro' => $utilidad,
                            // 'instrucciones_sistema' => $instrucciones,
                            // 'presentacion_sistema' => $presentacion,
                            // 'navegacion_sistema' => $navegacion,
                            // 'presentacion_resultados' => $resultados,
                            // 'organizazion_pantallas' => $organizacion,
                            // 'seccion_contribuyo_mas' => $secciones,
                            // 'porque_contribuyo' => $porque,
                            // 'comentarios' => $comentarios,
                            // 'usuario_id' => Auth::user()->usuario_id,

                            #1) ¿El cuestionario cumplió tu expectativa?
                            #2) ¿Estás de acuerdo con tus resultados?
                            #3) ¿En qué te fueron de utilidad los y la retroalimentación proporcionada?
                            #4) Las instrucciones del sistema fueron:
                            #5) La presentación del sistema: colores, imágenes, videos, personajes fueron:
                            #6) Navegar dentro del sistema fue:
                            #7) La presentación de tus resultados fueron:
                            #8)  La organización de las pantallas fue:
                            #9) ¿Cuál de todas las secciones del sistema contribuyó más en tu decisión vocacional?


            //actualizar usuario
            $UsuarioAc=User::where('usuario_id',Auth::user()->usuario_id)->first();
            if ($UsuarioAc!=null) {
                $UsuarioAc->status_id=2;
                $UsuarioAc->save();
            }

            return view('agradecimiento');
        }else{
            return view('cuestionarioReingreso');
        }

    }



    /**********************************Funciones Secundarias***********************************************/
    //Funcion para devolver el ideal con los colores representativos
    function getColoresIdeales($ID_Ideal){
      $Escalas_Grupo=Mapeo_Escalas_Grupo_v3::where('grupo_id',$ID_Ideal)->get();
      $Escalas_Grupo=$Escalas_Grupo[0];
     //dd($Escalas_Grupo);
      $Arreglo_colores= array();
      if($Escalas_Grupo->SS==1){
        $Arreglo_colores[0]="#F30A06";
      }else{
        $Arreglo_colores[0]="#1E32DE";
      }
      if($Escalas_Grupo->EP==1){
        $Arreglo_colores[1]="#F30A06";
      }else{
        $Arreglo_colores[1]="#1E32DE";
      }
      if($Escalas_Grupo->V==1){
        $Arreglo_colores[2]="#F30A06";
      }else{
        $Arreglo_colores[2]="#1E32DE";
      }
      if($Escalas_Grupo->AP==1){
        $Arreglo_colores[3]="#F30A06";
      }else{
        $Arreglo_colores[3]="#1E32DE";
      }
      if($Escalas_Grupo->MS==1){
        $Arreglo_colores[4]="#F30A06";
      }else{
        $Arreglo_colores[4]="#1E32DE";
      }
      if($Escalas_Grupo->OG==1){
        $Arreglo_colores[5]="#F30A06";
      }else{
        $Arreglo_colores[5]="#1E32DE";
      }
      if($Escalas_Grupo->CT==1){
        $Arreglo_colores[6]="#F30A06";
      }else{
        $Arreglo_colores[6]="#1E32DE";
      }
      if($Escalas_Grupo->CL==1){
        $Arreglo_colores[7]="#F30A06";
      }else{
        $Arreglo_colores[7]="#1E32DE";
      }
      if($Escalas_Grupo->MC==1){
        $Arreglo_colores[8]="#F30A06";
      }else{
        $Arreglo_colores[8]="#1E32DE";
      }
      if($Escalas_Grupo->AL==1){
        $Arreglo_colores[9]="#F30A06";
      }else{
        $Arreglo_colores[9]="#1E32DE";
      }
      return $Arreglo_colores;
    }
    //Funcion para sacar los porcentajes de los grupos
    //devuelve arrgelo asociativo con % de escalas de grupos
    function getPorEslas($Grupos,$cuestionario)
    {
        //dd($Grupos,$cuestionario);
        //Definitiva porcentaje
        $ArrPorGrupos=array();

        $Respuestas=Cuestionario_Pregunta_v3::where('cuestionario_id', $cuestionario)->orderby('pregunta_id', 'ASC')->pluck('valor');
        
        $KeyGrupos=array_keys($Grupos);
        //dd($KeyGrupos);
        for ($i=0; $i <count($Grupos) ; $i++) {
            //arreglo temporal para hacer los nuevos porcentajes
            $ArrTemPorsentajes=array();
             //arreglo para el numero de preguntas
            $ArrTemNumero=array();
            //posentajes Temporal
            $ArrPorGrupo=array();

            $Preguntas_Grupo=Grupo_Escala_Pregunta_v3::where('grupo_id',$Grupos[$KeyGrupos[$i]])->get();
            //dd($Preguntas_Grupo);
            for ($j=0; $j <count($Preguntas_Grupo); $j++) {
                if (isset($ArrTemPorsentajes[$Preguntas_Grupo[$j]['escala_id']])) {
                    $ArrTemPorsentajes[$Preguntas_Grupo[$j]['escala_id']]+=$Respuestas[$Preguntas_Grupo[$j]['pregunta_id']-1];
                    $ArrTemNumero[$Preguntas_Grupo[$j]['escala_id']]+=1;
                }else{
                    $ArrTemPorsentajes[$Preguntas_Grupo[$j]['escala_id']]=$Respuestas[$Preguntas_Grupo[$j]['pregunta_id']-1];
                    $ArrTemNumero[$Preguntas_Grupo[$j]['escala_id']]=1;
                }
            }
            
            $KeyEscalasOptenidas=array_keys($ArrTemNumero);
            for ($j=0; $j < count($KeyEscalasOptenidas) ; $j++) {
                $ArrTemPorsentajes[$KeyEscalasOptenidas[$j]]=($ArrTemPorsentajes[$KeyEscalasOptenidas[$j]]/($ArrTemNumero[$KeyEscalasOptenidas[$j]]*4))*100;
            }
            $ArrPorGrupos[$Grupos[$KeyGrupos[$i]]]=$ArrTemPorsentajes;
        }
        
        return $ArrPorGrupos;
    }
    public function getGrupoSumMayor($GruposFinales,$CuestionarioPorPregunta)
    {
        foreach ($GruposFinales as $Grupo) {
            //Preguntas de el grupo

        }
        //Definitiva porcentaje
        $ArrPorGrupos=array();
        $Respuestas=Cuestionario_Pregunta_v3::where('cuestionario_id', $cuestionario)->orderby('pregunta_id', 'ASC')->pluck('valor');

        $KeyGrupos=array_keys($Grupos);
        for ($i=0; $i <count($Grupos) ; $i++) {
            //arreglo temporal para hacer los nuevos porcentajes
            $ArrTemPorsentajes=array();
             //arreglo para el numero de preguntas
            $ArrTemNumero=array();
            //posentajes Temporal
            $ArrPorGrupo=array();

            $Preguntas_Grupo=Grupo_Escala_Pregunta_v3::where('grupo_id',$Grupos[$KeyGrupos[$i]])->get();

            for ($j=0; $j <count($Preguntas_Grupo); $j++) {
                if (isset($ArrTemPorsentajes[$Preguntas_Grupo[$j]['escala_id']])) {
                    $ArrTemPorsentajes[$Preguntas_Grupo[$j]['escala_id']]+=$Respuestas[$Preguntas_Grupo[$j]['pregunta_id']-1];
                    $ArrTemNumero[$Preguntas_Grupo[$j]['escala_id']]+=1;
                }else{
                    $ArrTemPorsentajes[$Preguntas_Grupo[$j]['escala_id']]=$Respuestas[$Preguntas_Grupo[$j]['pregunta_id']-1];
                    $ArrTemNumero[$Preguntas_Grupo[$j]['escala_id']]=1;
                }
            }
            $KeyEscalasOptenidas=array_keys($ArrTemNumero);
            for ($j=0; $j < count($KeyEscalasOptenidas) ; $j++) {
                $ArrTemPorsentajes[$KeyEscalasOptenidas[$j]]=($ArrTemPorsentajes[$KeyEscalasOptenidas[$j]]/($ArrTemNumero[$KeyEscalasOptenidas[$j]]*4))*100;
            }
            $ArrPorGrupos[$Grupos[$KeyGrupos[$i]]]=$ArrTemPorsentajes;
        }
        return $ArrPorGrupos;
    }

    /*******************************************Funciones_de_testeo*****************************************************************
    ************************************************************************************************************/
    //
    public function Proceso_Perfiles_test($usuario_id)
    {
        $id=$usuario_id;
        $ID_Cuestionario_v3=Cuestionario_v3::where('usuario_id', $id)->first();
        $ID_Cuestionario_v3=$ID_Cuestionario_v3['cuestionario_id'];

        $Respuestas=Cuestionario_Pregunta_v3::where('cuestionario_id',$ID_Cuestionario_v3 )->orderby('pregunta_id', 'ASC')->pluck('valor');

        $SS = $Respuestas[0]+$Respuestas[10]+$Respuestas[20]+$Respuestas[30]+$Respuestas[40]+$Respuestas[50];
        $EP = $Respuestas[1]+$Respuestas[11]+$Respuestas[21]+$Respuestas[31]+$Respuestas[41]+$Respuestas[51];
        $V  = $Respuestas[2]+$Respuestas[12]+$Respuestas[22]+$Respuestas[32]+$Respuestas[42]+$Respuestas[52];
        $AP = $Respuestas[3]+$Respuestas[13]+$Respuestas[23]+$Respuestas[33]+$Respuestas[43]+$Respuestas[53];
        $MS = $Respuestas[4]+$Respuestas[14]+$Respuestas[24]+$Respuestas[34]+$Respuestas[44]+$Respuestas[54];
        $OG = $Respuestas[5]+$Respuestas[15]+$Respuestas[25]+$Respuestas[35]+$Respuestas[45]+$Respuestas[55];
        $CT = $Respuestas[6]+$Respuestas[16]+$Respuestas[26]+$Respuestas[36]+$Respuestas[46]+$Respuestas[56];
        $CL = $Respuestas[7]+$Respuestas[17]+$Respuestas[27]+$Respuestas[37]+$Respuestas[47]+$Respuestas[57];
        $MC = $Respuestas[8]+$Respuestas[18]+$Respuestas[28]+$Respuestas[38]+$Respuestas[48]+$Respuestas[58];
        $AL = $Respuestas[9]+$Respuestas[19]+$Respuestas[29]+$Respuestas[39]+$Respuestas[49]+$Respuestas[59];
        $arregloEscalas = array(
            'V' => $V*100/24,
            'MS' => $MS*100/24,
            'AP' => $AP*100/24,
            'CT' => $CT*100/24,
            'CL' => $CL*100/24,
            'SS' => $SS*100/24,
            'EP' => $EP*100/24,
            'OG' => $OG*100/24,
            'MC' => $MC*100/24,
            'AL' => $AL*100/24
        );

         //Separar las escalas en bruto en fuertes y moderados (las demas no se toman en cuenta )
        $arreglo_fuertes = array();
        $arreglo_moderados = array();
        $arreglo_fuertesINX = array();
        $arreglo_moderadosINX = array();
        $arreglo_ligeros = array();
        $arreglo_escasos = array();
        //areglo para grafica
        $arreglo_grafica= array();

        foreach ($arregloEscalas as $escala => $valor_escala) {
            if($valor_escala >= 75 ){
                array_push($arreglo_fuertes, $escala);
                $arreglo_fuertesINX[$escala] = $valor_escala;
            }else if($valor_escala >= 50 && $valor_escala <= 74){
                array_push($arreglo_moderados, $escala);
                $arreglo_moderadosINX[$escala] = $valor_escala;
            }else if($valor_escala >= 25 && $valor_escala <= 49){
                array_push($arreglo_ligeros, $escala);

                //$arreglo_ligeros[$escala] = $valor_escala;
            }else if($valor_escala >= 0 && $valor_escala <= 24)
                array_push($arreglo_escasos, $escala);
               //$arreglo_escasos[$escala] = $valor_escala;

            $arreglo_grafica[$escala]=$valor_escala;
        }
        //ordenamos los arreglos para los procesos siguientes
        arsort($arreglo_fuertes);
        arsort($arreglo_moderados);
        arsort($arreglo_ligeros);
        arsort($arreglo_escasos);
        $Datos=array();
        $Datos['Grafica']=$arreglo_grafica;

        if ( $this->Perfiles_escasos($arreglo_fuertes,$arreglo_moderados,$arreglo_ligeros,$arreglo_escasos)) {

            $Retroalimentacion=Retroalimentacion_v3::where('retro_id',13)->get();
            $Material=Material_v3::where('material_id', $id_Material)->get();
            //contenido de texto
            $tipoPerfil='Escasos';
            $Presentacion=$Retroalimentacion[0]['introducion'];
            $Explicacion=$Retroalimentacion[0]['descripcion'];
            $Carreras=$Retroalimentacion[0]['carreras'];
            $Materiales=$Retroalimentacion[0]['expMateriales'];
            //imagenes
            $imagenEx='assets/imagenesReto/Escasos.png';
            $imagenGif='assets/imagenesReto/Escasos.gif';
            $hojas=$Material[0]['urlPdf'];
            $video=$Material[0]['urlVideo'];
            //igualacion para enviar datos a la vista
            $Datos['tipoPerfil']=$tipoPerfil;
            $Datos['Presentacion']=$Presentacion;
            $Datos['Explicacion']=$Explicacion;
            $Datos['Carreras']=$Carreras;
            $Datos['Materiales']=$Materiales;
            $Datos['imagenEx']=$imagenEx;
            $Datos['imagenGif']=$imagenGif;
            $Datos['hojas']=$hojas;
            $Datos['video']=$video;


        }elseif ( $this->Perfiles_ligeros($arreglo_fuertes,$arreglo_moderados,$arreglo_ligeros,$arreglo_escasos)) {


            $Retroalimentacion=Retroalimentacion_v3::where('retro_id',12)->get();
            $Material=Material_v3::where('material_id', $id_Material)->get();
            //contenido de texto
            $tipoPerfil='Ligeros';
            $Presentacion=$Retroalimentacion[0]['introducion'];
            $Explicacion=$Retroalimentacion[0]['descripcion'];
            $Carreras=$Retroalimentacion[0]['carreras'];
            $Materiales=$Retroalimentacion[0]['expMateriales'];
            //imagenes
            $imagenEx='assets/imagenesReto/Ligeros.png';
            $imagenGif='assets/imagenesReto/Ligeros.gif';
            $hojas=$Material[0]['urlPdf'];
            $video=$Material[0]['urlVideo'];
            //igualacion para enviar datos a la vista
            $Datos['tipoPerfil']=$tipoPerfil;
            $Datos['Presentacion']=$Presentacion;
            $Datos['Explicacion']=$Explicacion;
            $Datos['Carreras']=$Carreras;
            $Datos['Materiales']=$Materiales;
            $Datos['imagenEx']=$imagenEx;
            $Datos['imagenGif']=$imagenGif;
            $Datos['hojas']=$hojas;
            $Datos['video']=$video;


        }elseif ( $this->Perfiles_planos($arreglo_fuertes,$arreglo_moderados)) {

            $Retroalimentacion=Retroalimentacion_v3::where('retro_id',11)->get();
            $Material=Material_v3::where('material_id', $id_Material)->get();
            //contenido de texto
            $tipoPerfil='Planos';
            $Presentacion=$Retroalimentacion[0]['introducion'];
            $Explicacion=$Retroalimentacion[0]['descripcion'];
            $Carreras=$Retroalimentacion[0]['carreras'];
            $Materiales=$Retroalimentacion[0]['expMateriales'];
            //imagenes
            $imagenEx='assets/imagenesReto/Planos.png';
            $imagenGif='assets/imagenesReto/Planos.gif';
            $hojas=$Material[0]['urlPdf'];
            $video=$Material[0]['urlVideo'];
            //igualacion para enviar datos a la vista
            $Datos['tipoPerfil']=$tipoPerfil;
            $Datos['Presentacion']=$Presentacion;
            $Datos['Explicacion']=$Explicacion;
            $Datos['Carreras']=$Carreras;
            $Datos['Materiales']=$Materiales;
            $Datos['imagenEx']=$imagenEx;
            $Datos['imagenGif']=$imagenGif;
            $Datos['hojas']=$hojas;
            $Datos['video']=$video;


        }elseif ( $this->Perfiles_Unicos($arreglo_fuertes,$arreglo_moderados)) {

            if (count($arreglo_fuertes)==1&&count($arreglo_moderados)<=0){
                $nombre=$arreglo_fuertes[0];
            }else{
                $nombre=$arreglo_moderados[0];
            }

            $Retroalimentacion=Retroalimentacion_v3::where('nombre',$nombre)->get();
            $Material=Material_v3::where('material_id', $id_Material)->get();

            //var_dump($nombre);
            //contenido de texto
            $tipoPerfil='Unicos';
            $Presentacion=$Retroalimentacion[0]['introducion'];
            $Explicacion=$Retroalimentacion[0]['descripcion'];
            $Carreras=$Retroalimentacion[0]['carreras'];
            $Materiales=$Retroalimentacion[0]['expMateriales'];
            //imagenes
            $imagenEx='assets/imagenesReto/Unicos.png';
            $imagenGif='assets/imagenesReto/Unicos.gif';
            $hojas=$Material[0]['urlPdf'];
            $video=$Material[0]['urlVideo'];
            //igualacion para enviar datos a la vista
            $Datos['tipoPerfil']=$tipoPerfil;
            $Datos['Presentacion']=$Presentacion;
            $Datos['Explicacion']=$Explicacion;
            $Datos['Carreras']=$Carreras;
            $Datos['Materiales']=$Materiales;
            $Datos['imagenEx']=$imagenEx;
            $Datos['imagenGif']=$imagenGif;
            $Datos['hojas']=$hojas;
            $Datos['video']=$video;


        }elseif ( $this->Perfiles_Primarios($arreglo_fuertes,$arreglo_moderados)) {

            $Retroalimentacion=Retroalimentacion_v3::where('retro_id',40)->get();
            $Material=Material_v3::where('material_id', $id_Material)->get();
            //contenido de texto
            $tipoPerfil='Primarios';
            $Presentacion=$Retroalimentacion[0]['introducion'];
            $Explicacion=$Retroalimentacion[0]['descripcion'];
            $Carreras=$Retroalimentacion[0]['carreras'];
            $Materiales=$Retroalimentacion[0]['expMateriales'];
            //imagenes
            $imagenEx='assets/imagenesReto/Primarios.png';
            $imagenGif='assets/imagenesReto/Primarios.gif';
            $hojas=$Material[0]['urlPdf'];
            $video=$Material[0]['urlVideo'];
            //igualacion para enviar datos a la vista
            $Datos['tipoPerfil']=$tipoPerfil;
            $Datos['Presentacion']=$Presentacion;
            $Datos['Explicacion']=$Explicacion;
            $Datos['Carreras']=$Carreras;
            $Datos['Materiales']=$Materiales;
            $Datos['imagenEx']=$imagenEx;
            $Datos['imagenGif']=$imagenGif;
            $Datos['hojas']=$hojas;
            $Datos['video']=$video;


        }elseif ( $this->Perfiles_Secundarios($arreglo_fuertes,$arreglo_moderados)) {

            $Retroalimentacion=Retroalimentacion_v3::where('retro_id',41)->get();
            $Material=Material_v3::where('material_id', $id_Material)->get();
            //contenido de texto
            $tipoPerfil='Secundarios';
            $Presentacion=$Retroalimentacion[0]['introducion'];
            $Explicacion=$Retroalimentacion[0]['descripcion'];
            $Carreras=$Retroalimentacion[0]['carreras'];
            $Materiales=$Retroalimentacion[0]['expMateriales'];
            //imagenes
            $imagenEx='assets/imagenesReto/Secundarios.png';
            $imagenGif='assets/imagenesReto/Secundarios.gif';
            $hojas=$Material[0]['urlPdf'];
            $video=$Material[0]['urlVideo'];
            //igualacion para enviar datos a la vista
            $Datos['tipoPerfil']=$tipoPerfil;
            $Datos['Presentacion']=$Presentacion;
            $Datos['Explicacion']=$Explicacion;
            $Datos['Carreras']=$Carreras;
            $Datos['Materiales']=$Materiales;
            $Datos['imagenEx']=$imagenEx;
            $Datos['imagenGif']=$imagenGif;
            $Datos['hojas']=$hojas;
            $Datos['video']=$video;


        }elseif (($Grupos=$this->Perfiles_Potencial($arreglo_fuertes,$arreglo_moderados))!=null) {
                $GrupoEncontrado=$this->Perfiles_Ideal($Grupos,$ID_Cuestionario_v3);
                $tipoPerfil='Ideal';
                 $T=Cuestionario_v3::where('cuestionario_id',$ID_Cuestionario_v3)->get();
                echo "<br><br><br>Porcentaje de ideales <br>";
                   //var_dump( $GrupoIdealIdela);
                   echo "<br><br>";
                    echo "<br><br><br>Pefiles Potenciales: <br>";
                        var_dump( $Grupos);
                        echo "<br><br>";
                        echo "<br><br><br>Pefiles Ideales: <br>";
                        var_dump( $GrupoEncontrado);
                        echo "<br><br>";
                        echo "<br>Pefiles ideales de los ideales  <br>";
                        //var_dump( $GrupoIdealIdela);
                        echo "<br><br><br>Numero de perfil ".$usuario_id;
                        echo "<br> Numero de cuestionario ";
                        var_dump($ID_Cuestionario_v3);
                        echo "             retroalimentación nueva:  ";
                        //var_dump($Retroalimentacion[0]['nombre']);
                         echo "            retroalimentación vieja:  ";
                        var_dump(Retroalimentacion::where('id_retro',$T[0]['id_retro'])->value('nombre'));
                        echo "<br>Porcentajes: <br>";
                        var_dump( $Datos['Grafica']);
                        echo "<br>Preguntas: <br>";
                        var_dump( $Respuestas);
            if (isset($GrupoEncontrado)){




                if (count($GrupoEncontrado)>1) {
                    $GrupoIdealIdela=$this->Miltipefil($GrupoEncontrado,$ID_Cuestionario_v3);
                if (count($GrupoIdealIdela)>1) {
                    echo "<br><br>************************Que tiene mas de una multi ideal**********************************************";

                }else{

                }
                }


            }else{

                $Retroalimentacion=Retroalimentacion_v3::where('retro_id',77)->get();
                $Material=Material_v3::where('material_id', $id_Material)->get();
                //contenido de texto
                $tipoPerfil='Potencial';
                $Presentacion=$Retroalimentacion[0]['introducion'];
                $Explicacion=$Retroalimentacion[0]['descripcion'];
                $Carreras=$Retroalimentacion[0]['carreras'];
                $Materiales=$Retroalimentacion[0]['expMateriales'];
                //imagenes
                $imagenEx='assets/imagenesReto/Potencial.png';
                $imagenGif='assets/imagenesReto/Potencial.gif';
                $hojas=$Material[0]['urlPdf'];
                $video=$Material[0]['urlVideo'];
                //igualacion para enviar datos a la vista
                $Datos['tipoPerfil']=$tipoPerfil;
                $Datos['Presentacion']=$Presentacion;
                $Datos['Explicacion']=$Explicacion;
                $Datos['Carreras']=$Carreras;
                $Datos['Materiales']=$Materiales;
                $Datos['imagenEx']=$imagenEx;
                $Datos['imagenGif']=$imagenGif;
                $Datos['hojas']=$hojas;
                $Datos['video']=$video;

            }

        }elseif ( $this->Perfiles_Incongruente($arreglo_fuertes,$arreglo_moderados)) {

            $Retroalimentacion=Retroalimentacion_v3::where('retro_id',78)->get();
            $Material=Material_v3::where('material_id', $id_Material)->get();
            //contenido de texto
            $tipoPerfil='Incongruente';
            $Presentacion=$Retroalimentacion[0]['introducion'];
            $Explicacion=$Retroalimentacion[0]['descripcion'];
            $Carreras=$Retroalimentacion[0]['carreras'];
            $Materiales=$Retroalimentacion[0]['expMateriales'];
            //imagenes
            $imagenEx='assets/imagenesReto/Incongruente.png';
            $imagenGif='assets/imagenesReto/Incongruente.gif';
            $hojas=$Material[0]['urlPdf'];
            $video=$Material[0]['urlVideo'];
            //igualacion para enviar datos a la vista
            $Datos['tipoPerfil']=$tipoPerfil;
            $Datos['Presentacion']=$Presentacion;
            $Datos['Explicacion']=$Explicacion;
            $Datos['Carreras']=$Carreras;
            $Datos['Materiales']=$Materiales;
            $Datos['imagenEx']=$imagenEx;
            $Datos['imagenGif']=$imagenGif;
            $Datos['hojas']=$hojas;
            $Datos['video']=$video;

        }else{

            $Escalas=array_merge($arreglo_fuertesINX,$arreglo_moderadosINX);
            $KeyInexistente=array_keys($Escalas);
            if (Retroalimentacion_v3::where('nombre',$KeyInexistente[0].','.$KeyInexistente[1])->exists()) {
                $Ret=Retroalimentacion_v3::where('nombre',$KeyInexistente[0].','.$KeyInexistente[1])->get();
            }else{
                $Ret=Retroalimentacion_v3::where('nombre',$KeyInexistente[1].','.$KeyInexistente[0])->get();
            }

            if (isset($Ret)) {
                $Ret=Retroalimentacion_v3::where('retro_id',80)->get();
            }
            $Retroalimentacion=$Ret;
            $Material=Material_v3::where('material_id', $id_Material)->get();
            //contenido de texto
            $tipoPerfil='Inexistente';
            $Presentacion=$Retroalimentacion[0]['introducion'];
            $Explicacion=$Retroalimentacion[0]['descripcion'];
            $Carreras=$Retroalimentacion[0]['carreras'];
            $Materiales=$Retroalimentacion[0]['expMateriales'];
            //imagenes
            $imagenEx='assets/imagenesReto/Inexistente.png';
            $imagenGif='assets/imagenesReto/Inexistente.gif';
            $hojas=$Material[0]['urlPdf'];
            $video=$Material[0]['urlVideo'];
            //igualacion para enviar datos a la vista
            $Datos['tipoPerfil']=$tipoPerfil;
            $Datos['Presentacion']=$Presentacion;
            $Datos['Explicacion']=$Explicacion;
            $Datos['Carreras']=$Carreras;
            $Datos['Materiales']=$Materiales;
            $Datos['imagenEx']=$imagenEx;
            $Datos['imagenGif']=$imagenGif;
            $Datos['hojas']=$hojas;
            $Datos['video']=$video;


        }
    }



    public function respuestaApp($usuario_id) {

        $id=$usuario_id;
        $ID_Cuestionario_v3=Cuestionario_v3::where('usuario_id', $id)->first();
        //dd($ID_Cuestionario_v3);
        $ID_Cuestionario_v3=$ID_Cuestionario_v3['cuestionario_id'];

        $Respuestas=Cuestionario_Pregunta_v3::where('cuestionario_id',$ID_Cuestionario_v3 )->orderby('pregunta_id', 'ASC')->pluck('valor');
        //dd($Respuestas);
        
        
        $SS = $Respuestas[0]+$Respuestas[10]+$Respuestas[20]+$Respuestas[30]+$Respuestas[40]+$Respuestas[50];
        $EP = $Respuestas[1]+$Respuestas[11]+$Respuestas[21]+$Respuestas[31]+$Respuestas[41]+$Respuestas[51];
        $V  = $Respuestas[2]+$Respuestas[12]+$Respuestas[22]+$Respuestas[32]+$Respuestas[42]+$Respuestas[52];
        $AP = $Respuestas[3]+$Respuestas[13]+$Respuestas[23]+$Respuestas[33]+$Respuestas[43]+$Respuestas[53];
        $MS = $Respuestas[4]+$Respuestas[14]+$Respuestas[24]+$Respuestas[34]+$Respuestas[44]+$Respuestas[54];
        $OG = $Respuestas[5]+$Respuestas[15]+$Respuestas[25]+$Respuestas[35]+$Respuestas[45]+$Respuestas[55];
        $CT = $Respuestas[6]+$Respuestas[16]+$Respuestas[26]+$Respuestas[36]+$Respuestas[46]+$Respuestas[56];
        $CL = $Respuestas[7]+$Respuestas[17]+$Respuestas[27]+$Respuestas[37]+$Respuestas[47]+$Respuestas[57];
        $MC = $Respuestas[8]+$Respuestas[18]+$Respuestas[28]+$Respuestas[38]+$Respuestas[48]+$Respuestas[58];
        $AL = $Respuestas[9]+$Respuestas[19]+$Respuestas[29]+$Respuestas[39]+$Respuestas[49]+$Respuestas[59];

        $arregloEscalas = array(
            'V' => $V*100/24,
            'MS' => $MS*100/24,
            'AP' => $AP*100/24,
            'CT' => $CT*100/24,
            'CL' => $CL*100/24,
            'SS' => $SS*100/24,
            'EP' => $EP*100/24,
            'OG' => $OG*100/24,
            'MC' => $MC*100/24,
            'AL' => $AL*100/24
        );


         //Separar las escalas en bruto en fuertes y moderados (las demas no se toman en cuenta )
        $arreglo_fuertes = array();
        $arreglo_moderados = array();
        $arreglo_fuertesINX = array();
        $arreglo_moderadosINX = array();
        $arreglo_ligeros = array();
        $arreglo_escasos = array();
        //areglo para grafica
        $arreglo_grafica= array();

        foreach ($arregloEscalas as $escala => $valor_escala) {
            if($valor_escala >= 75 ){
                array_push($arreglo_fuertes, $escala);
                $arreglo_fuertesINX[$escala] = $valor_escala;
            }else if($valor_escala >= 50 && $valor_escala <= 74){
                array_push($arreglo_moderados, $escala);
                $arreglo_moderadosINX[$escala] = $valor_escala;
            }else if($valor_escala >= 25 && $valor_escala <= 49){
                array_push($arreglo_ligeros, $escala);

                //$arreglo_ligeros[$escala] = $valor_escala;
            }else if($valor_escala >= 0 && $valor_escala <= 24)
                array_push($arreglo_escasos, $escala);
               //$arreglo_escasos[$escala] = $valor_escala;

            $arreglo_grafica[$escala]=round($valor_escala);
        }
        //ordenamos los arreglos para los procesos siguientes
        arsort($arreglo_fuertes);
        arsort($arreglo_moderados);
        arsort($arreglo_ligeros);
        arsort($arreglo_escasos);
        $Datos=array();



        if ( $this->Perfiles_escasos($arreglo_fuertes,$arreglo_moderados,$arreglo_ligeros,$arreglo_escasos)) {

            $Datos=$this->GetEscasos();

        }elseif ( $this->Perfiles_ligeros($arreglo_fuertes,$arreglo_moderados,$arreglo_ligeros,$arreglo_escasos)) {

            $Datos=$this->GetLigeros();

        }elseif ( $this->Perfiles_planos($arreglo_fuertes,$arreglo_moderados)) {

            $Datos=$this->GetPlanos();

        }elseif ( $this->Perfiles_Unicos($arreglo_fuertes,$arreglo_moderados)) {

           if (count($arreglo_fuertes)==1&&count($arreglo_moderados)<=0){
                $nombre=$arreglo_fuertes[0];
            }else{
                $nombre=$arreglo_moderados[0];
            }

            $Datos=$this->GetUnicos($nombre);

        }elseif ( $this->Perfiles_Primarios($arreglo_fuertes,$arreglo_moderados)) {

            $Datos=$this->GetPrimarios();

        }elseif ( $this->Perfiles_Secundarios($arreglo_fuertes,$arreglo_moderados)) {

            $Datos=$this->GetSecundarios();

        }elseif (($Grupos=$this->Perfiles_Potencial($arreglo_fuertes,$arreglo_moderados))!=null) {
            //grupos con posibilidades de ser ideal
            //dd($Grupos);
                $GrupoEncontrado=$this->Perfiles_Ideal($Grupos,$ID_Cuestionario_v3);
                //dd($GrupoEncontrado);
            if (isset($GrupoEncontrado)){
                if (count($GrupoEncontrado)>1) {
                    $GrupoIdealIdela=$this->Miltipefil($GrupoEncontrado,$ID_Cuestionario_v3);
                    if (count($GrupoIdealIdela)>1){
                        //multiideal

                        $Datos=$this->GetIdeales($GrupoIdealIdela[0]);
                    }else{
                        //ideal de ideales
                        $Datos=$this->GetIdeales($GrupoIdealIdela[0]);

       // dd($Datos);
                    }
                }else{
                    //ideal puro
                    $Datos=$this->GetIdeales($GrupoEncontrado[0]);

                }
            }else{

                $KeyGrupos=array_keys($Grupos);
                $Carerras="";
                for ($i=0;$i<3;$i++){
                  if(isset($KeyGrupos[$i])){
                    $Busqueda=Retroalimentacion_v3::where('retro_id',$KeyGrupos[$i]+41)->get()->first();
                    $Carerras.="<br>".$Busqueda->carreras;
                  }
                }
                $Datos=$this->GetPotencial($Carerras);

            }

        }elseif ( $this->Perfiles_Incongruente($arreglo_fuertes,$arreglo_moderados)) {

            $Datos=$this->GetIncongruente();


        }else{
            $Escalas=array_merge($arreglo_fuertesINX,$arreglo_moderadosINX);
            $KeyInexistente=array_keys($Escalas);
            $Datos=$this->GetInexistente($KeyInexistente[0],$KeyInexistente[1]);

        }
        //dd($Datos['Presentacion']);
        $ActualizacionCuestionario=Cuestionario_v3::where('cuestionario_id',$ID_Cuestionario_v3)->update(['retro_id'=>$Datos['Id_retro']]);
        $Datos['Grafica']=$arreglo_grafica;

        return  [[
            'Id_retro'=>$Datos['Id_retro'],
            'tipoPerfil'=>$Datos['tipoPerfil'],
            'Presentacion'=>$Datos['Presentacion'],
            'Explicacion'=>strip_tags($Datos['Explicacion']),
            'Carreras'=>$Datos['Carreras'],
            'Materiales'=>strip_tags($Datos['Materiales']),
            'imagenEx'=>$Datos['imagenEx'],
            'imagenGif'=>$Datos['imagenGif'],
            'hojas'=>$Datos['hojas'],
            'video'=>$Datos['video'],
            'Grafica'=>array(
                    $V*100/24,
                    $MS*100/24,
                    $AP*100/24,
                    $CT*100/24,
                    $CL*100/24,
                    $SS*100/24,
                    $EP*100/24,
                    $OG*100/24,
                    $MC*100/24,
                    $AL*100/24
                )
                ]];

    }
}
