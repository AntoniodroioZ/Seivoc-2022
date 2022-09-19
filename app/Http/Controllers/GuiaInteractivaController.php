<?php

namespace App\Http\Controllers;

use App\Models\carreras;
use App\Models\datos_carreras;
use App\Models\sede;
use App\Models\modalidades_carreras;
use App\Models\areas;
use App\Models\tipo_ingreso;

use DB;

use Illuminate\Http\Request;

class GuiaInteractivaController extends Controller
{
    public function nombresCarrerasGI(Request $request)
    {
        try
        {
            $recursosCarreras=carreras::get();
            if($recursosCarreras == "[]"){
                return json_encode([["HTML"=>""],["code"=>"204"],["detail"=>"No Content"]]);
            }
            $html = '';
            foreach($recursosCarreras as $nombreCarreras){
                $html .= '<a href="#" onclick="cambiarDescripcionCarrera('.$nombreCarreras['carreras_id'].')">'.$nombreCarreras['nombre_carrera'].'</a>
                <br>';
            }
            return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
            // return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
            return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }
    public function descripcionesCarreras(Request $request){
        try
        {
            $recursosCarreras=carreras::where('carreras_id',$request->input('carreras_id'))->get();
            if($recursosCarreras == "[]"){
                return json_encode([["HTML"=>""],["code"=>"204"],["detail"=>"No Content"]]);
            }
            $html = '';
            foreach($recursosCarreras as $nombreCarreras){
                $html .= '<p class="text-center titulo-carrera" style="">'.$nombreCarreras['nombre_carrera'].'</p>
                <p class="text-center descripcion-carrera" style="">'.$nombreCarreras['descripcion'].'</p>';
            }
            return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
            // return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
            return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }
    public function descripcionCarreraDebes(Request $request){
        try
        {
            $recursosCarreras=carreras::where('carreras_id',$request->input('carreras_id'))->get();
            if($recursosCarreras == "[]"){
                return json_encode([["HTML"=>""],["code"=>"204"],["detail"=>"No Content"]]);
            }
            $html = '';
            foreach($recursosCarreras as $nombreCarreras){
                $html .= '<p class="text-center titulo-carrera" style="">'.$nombreCarreras['nombre_carrera'].'</p>
                <p class="text-center descripcion-carrera" style="">'.$nombreCarreras['descripcion'].'</p>';
            }
            return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
            // return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
            return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }
    public function datosCarreras(Request $request){
        try
        {
            $recursosCarreras=datos_carreras::where('carreras_id',$request->input('carreras_id'))->get();
            // dd($recursosCarreras);
            if($recursosCarreras == "[]"){
                return json_encode([["HTML"=>""],["code"=>"204"],["detail"=>"No Content"]]);
            }
            $html = '';
        // +++++++++++++++++++++++++Respaldo de la estructura original++++++++++++++++++++++++++++++
        //     $html1 = '<div class="escuela">
        //     <p class="text-center" style="font-size: 2rem; color:#2f2e65; font-weight: bold;">Facultad de Ciencias</p>
        //     <div class="container">
        //       <div class="row">
        //         <div class="col text-center">
        //           <p style="font-size: 2rem; color:#2f2e65;">Aciertos</p>
        //           <p style="font-size: 4rem; color:#eeb500; font-weight: bold;">107</p>
        //         </div>
        //         <div class="col text-center">
        //           <p style="border: 1px solid #2f2e65; background-color: #2f2e65; color: #fff; font-size:2rem">Escolarizado</p>
        //         </div>
        //         <div class="col text-center">
        //           <p style="font-size: 2rem; color:#2f2e65;">Promedio</p>
        //           <p style="font-size: 4rem; color:#eeb500; font-weight: bold;">8.93</p>
        //         </div>
        //       </div>
        //     </div>
        //   </div>';
        // +++++++++++++++++++++++++Respaldo de la estructura original++++++++++++++++++++++++++++++
            foreach($recursosCarreras as $datoCarrera){
                $sede = sede::where('sede_id',$datoCarrera['sede_id'])->get();
                foreach($sede as $nombreSede){
                    $html .= '<div class="escuela">
                        <p class="text-center" style="font-size: 2rem; color:#2f2e65; font-weight: bold;">'.$nombreSede['nombre_sede'].'</p>';
                }
                
                if($datoCarrera['aciertos']==0){
                    $html .='<div class="container">
                    <div class="row">
                      <div class="col text-center">
                        <p style="font-size: 2rem; color:#2f2e65;">Aciertos</p>
                        <p style="font-size: 4rem; color:#eeb500; font-weight: bold;">Sin registro</p>
                      </div>
                    <div class="col text-center">';
                }else{
                    $html .='<div class="container">
                    <div class="row">
                      <div class="col text-center">
                        <p style="font-size: 2rem; color:#2f2e65;">Aciertos</p>
                        <p style="font-size: 4rem; color:#eeb500; font-weight: bold;">'.$datoCarrera['aciertos'].'</p>
                      </div>
                    <div class="col text-center">';
                }
                $modalidad = modalidades_carreras::where('modalidades_carreras_id',$datoCarrera['modalidades_id'])->get();
                foreach($modalidad as $tipoModalidad){
                    $html .='<p style="border: 1px solid #2f2e65; background-color: #2f2e65; color: #fff; font-size:2rem">'.$tipoModalidad['nombre_modalidad'].'</p>';
                }
                if($datoCarrera['promedio']==0){
                    $html .='</div>
                      <div class="col text-center">
                        <p style="font-size: 2rem; color:#2f2e65;">Promedio</p>
                        <p style="font-size: 4rem; color:#eeb500; font-weight: bold;">Sin registro</p>
                      </div>
                    </div>
                  </div>
                </div>';
                }else{
                    $html .='</div>
                          <div class="col text-center">
                            <p style="font-size: 2rem; color:#2f2e65;">Promedio</p>
                            <p style="font-size: 4rem; color:#eeb500; font-weight: bold;">'.$datoCarrera['promedio'].'</p>
                          </div>
                        </div>
                      </div>
                    </div>';
                }
                
            }
            return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
            return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }
    public function descripcionArea(Request $request){
        try
        {
            $recursosAreas=areas::where('area_id',$request->input('area_id'))->get();
            if($recursosAreas == "[]"){
                return json_encode([["HTML"=>""],["code"=>"204"],["detail"=>"No Content"]]);
            }
            $html = '';
            foreach($recursosAreas as $datoArea){
                $html .= '<p style="margin-left:.5rem; margin-right:.5rem;">'.$datoArea['descripcion'].'</p>';
            }
            return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
            // return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
            return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }
    public function carrerasAreas(Request $request){
        try
        {
            // $recursosCarrerasAreas=datos_carreras::where('area_id',$request->input('area_id'))->get();
            $html = '';
            $recursosCarrerasAreas=datos_carreras::join('carreras','datos_carreras.carreras_id','=','carreras.carreras_id')
                                    ->select(
                                        DB::raw('carreras.nombre_carrera as nombre'))
                                    ->where('area_id',$request->input('area_id'))
                                    ->groupBy('carreras.carreras_id')->orderBy('nombre')->get();
            // dd($recursosCarrerasAreas);
            // $recursosCarrerasAreas = orderBy('nombre');
            foreach($recursosCarrerasAreas as $carreras){
                $html .= '<p style="margin:0px; margin-left:.5rem; margin-right:.5rem;">'.$carreras['nombre'].'</p>';
            }
            // if($recursosCarrerasAreas == "[]"){
            //     return json_encode([["HTML"=>""],["code"=>"204"],["detail"=>"No Content"]]);
            // }
            // $carrerasId = [];
            // foreach($recursosCarrerasAreas as $datoArea){
            //     array_push($carrerasId,$datoArea['carreras_id']);
            // }
            // $carrerasIdUnicos = array_unique($carrerasId);
            // dd($carrerasIdUnicos);
            // foreach($recursosCarrerasAreas as $idUnicos){
                // $recursosCarreras=carreras::where('carreras_id',$idUnicos)->get();
                // foreach($recursosCarreras as $nombreCarreras){
                // $html .= '<p style="margin:0px; margin-left:.5rem; margin-right:.5rem;">'.$nombreCarreras['nombre_carrera'].'</p>';
                // }
            // }
            // dd($carrerasId);
            // dd(array_unique($carrerasId));
            return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
            // return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
            return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }
    public function nuevasCarreras(){
        $html = '<h2>Licenciaturas:</h2>';
        try
        {
            $nuevasCarreras = carreras::where('nueva_carrera',1)->orderBy('nombre_carrera')->get();
            foreach($nuevasCarreras as $nombre){
                $html .='<p style="font-size: 1.15rem; margin:0px; margin-left:.5rem; margin-right:.5rem;" onclick="cambioDescripcion('.$nombre['carreras_id'].')">'.$nombre['nombre_carrera'].'</p>';
            }
            return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
            // return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
            return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }
    public function ingresoIndirectoCarreras(){
        $html = '<h2>Licenciaturas:</h2>';
        try
        {
            $ingresoIndirectoCarreras=datos_carreras::join('carreras','datos_carreras.carreras_id','=','carreras.carreras_id')
                                    ->select(
                                        DB::raw('carreras.nombre_carrera as nombre, carreras.carreras_id as carreras_id'))
                                    ->where('tipo_ingreso_id',2)
                                    ->groupBy('carreras.carreras_id')->orderBy('nombre')->get('carreras_id');
            foreach($ingresoIndirectoCarreras as $nombre){
                $html .='<p style="font-size: 1.15rem; margin:0px; margin-left:.5rem; margin-right:.5rem;" onclick="cambioDescripcion('.$nombre['carreras_id'].')">'.$nombre['nombre'].'</p>';
            }
            return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
            // return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
            return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }
    public function ingresoDirectoCarreras(){
        $html = '<h2>Licenciaturas:</h2>';
        try
        {
            $ingresoIndirectoCarreras=datos_carreras::join('carreras','datos_carreras.carreras_id','=','carreras.carreras_id')
                                    ->select(
                                        DB::raw('carreras.nombre_carrera as nombre, carreras.carreras_id as carreras_id'))
                                    ->where('tipo_ingreso_id',1)
                                    ->groupBy('carreras.carreras_id')->orderBy('nombre')->get();
            foreach($ingresoIndirectoCarreras as $nombre){
                $html .='<p style="font-size: 1.15rem; margin:0px; margin-left:.5rem; margin-right:.5rem;" onclick="cambioDescripcion('.$nombre['carreras_id'].')">'.$nombre['nombre'].'</p>';
            }
            return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
            // return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
            return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }
    public function prerrequisitosCarreras(){
        $html = '<h2>Licenciaturas:</h2>';
        try
        {
            $ingresoIndirectoCarreras=datos_carreras::join('carreras','datos_carreras.carreras_id','=','carreras.carreras_id')
                                    ->select(
                                        DB::raw('carreras.nombre_carrera as nombre, carreras.carreras_id as carreras_id'))
                                    ->where('tipo_ingreso_id',3)
                                    ->groupBy('carreras.carreras_id')->orderBy('nombre')->get();
            foreach($ingresoIndirectoCarreras as $nombre){
                $html .='<p style="font-size: 1.15rem; margin:0px; margin-left:.5rem; margin-right:.5rem;" onclick="cambioDescripcion('.$nombre['carreras_id'].')">'.$nombre['nombre'].'</p>';
            }
            return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
            // return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
            return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }
    public function obtenerModalidades(){
       
        $html = '';
        try
        {
            $modalidadesDatos=modalidades_carreras::get();
            foreach($modalidadesDatos as $modalidad){
                $html .='
                <a style="" href="#" onclick="obtenerCarrerasModalidades('.$modalidad['modalidades_carreras_id'].')">
                  <h3 style="font-size:1.4rem">'.$modalidad['nombre_modalidad'].':</h3>
                </a>
                <p>'.$modalidad['descripcion'].'</p>
              </div>';
            }
            return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
            // return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
            return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }
    public function obtenerCarrerasModalidades(Request $request){
        $html = '<h2>Licenciaturas:</h2>';
        try
        {
            $ingresoIndirectoCarreras=datos_carreras::join('carreras','datos_carreras.carreras_id','=','carreras.carreras_id')
                                    ->select(
                                        DB::raw('carreras.nombre_carrera as nombre, carreras.carreras_id as carreras_id'))
                                    ->where('modalidades_id',$request->input('modalidades_id'))
                                    ->groupBy('carreras.carreras_id')->orderBy('nombre')->get();
            foreach($ingresoIndirectoCarreras as $nombre){
                $html .='<p style="font-size: 1.15rem; margin:0px; margin-left:.5rem; margin-right:.5rem;" onclick="cambioDescripcion('.$nombre['carreras_id'].')">'.$nombre['nombre'].'</p>';
            }
            return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
            // return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
            return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }
    public function ObtenerDescripciones(Request $request){
       
        $html = '';
        try
        {
            $tipoIngresoDatos=tipo_ingreso::where('tipo_ingreso_id',$request->input('tipo_ingreso_id'))->get();
            foreach($tipoIngresoDatos as $descripcion){
                $html .='<h2><p style="font-size:1.2rem;" class="">'.$descripcion['descripcion'].'</p></h2>';
            }
            return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
            // return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
            return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }
    public function obtenerDatosFacultades(Request $request){
    //     $html='<div class="encabezado-datosFac col-3">
    //     <img class="logo-facultad" src="{{ asset('/images/guia_interactiva/imagenes-facultades/18a.jpg')}}" alt="">
    //   </div>
    //   <div class="col">
    //       <p class="titulo-facultad text-center">Facultad de Estudios Superiores Iztacala</p>
    //   </div>
    //   <div>
    //       <a href="http://www.iztacala.unam.mx/" target="_blank" style="text-decoration: none;">
    //           <p class="web-facultad text-center">www.iztacala.unam.mx</p>
    //       </a>
    //       <p style="color: #2F2E65; font-size:1.5rem; font-weight: bold;">Ubicación:</p>
    //       <p class="" style="margin-left:7.5rem;">Av De Los Barrios 1, Los Reyes Ixtacala, Hab Los Reyes Ixtacala Barrio de los Árboles/Barrio de los Héroes, 54090 Tlalnepantla de Baz, Méx</p>
    //       <img class="imagen-facultad" src="{{ asset('/images/guia_interactiva/imagenes-facultades/18b.jpg')}}" alt="">
    //       <p style="color: #2F2E65; font-size:1.5rem; font-weight: bold;">Licenciaturas:</p>
    //       <p style="margin-left:7.5rem; margin-bottom:0;">test</p>
    //       <p style="margin-left:7.5rem; margin-bottom:0;">test</p>
    //       <p style="margin-left:7.5rem; margin-bottom:0;">test</p>
    //       <p style="margin-left:7.5rem; margin-bottom:0;">test</p>
    //       <p style="margin-left:7.5rem; margin-bottom:0;">test</p>
    //       <p style="margin-left:7.5rem; margin-bottom:0;">test</p>
    //       <p style="margin-left:7.5rem; margin-bottom:0;">test</p>
    //       <p style="margin-left:7.5rem; margin-bottom:0;">test</p>

    //   </div>';
        $html='';
        try
        {
            $html = '<div class="encabezado-datosFac col-3">';
            $sedeId = $request->input('sede_id');
            $sedesNombres = sede::where('sede_id',$sedeId)->get();
            $datosCarreras = datos_carreras::join('carreras','datos_carreras.carreras_id','=','carreras.carreras_id')
                                    ->select(
                                        DB::raw('carreras.nombre_carrera as nombre'))
                                    ->where('sede_id',$sedeId)
                                    ->groupBy('carreras.carreras_id')->orderBy('nombre')->get();
            // dd($datosCarreras);
            foreach($sedesNombres as $sede){
                $html .='<img class="logo-facultad" src="'.$sede['logotipo'].'" alt="">
                </div>
      <div class="col">
          <p class="titulo-facultad text-center">'.$sede['nombre_sede'].'</p>
      </div>
      <div>
          <a href="'.$sede['pagina_web'].'" target="_blank" style="text-decoration: none;">
              <p class="web-facultad text-center">Pagina web</p>
          </a>
          <p style="color: #2F2E65; font-size:1.5rem; font-weight: bold;">Ubicación:</p>
          <p class="" style="margin-left:7.5rem;">'.$sede['ubicacion'].'</p>
          <img class="imagen-facultad" src="'.$sede['imagen'].'" alt="">
          <p style="color: #2F2E65; font-size:1.5rem; font-weight: bold;">Licenciaturas:</p>';
            }
            foreach($datosCarreras as $nombreCarrera){
                $html .= '<p style="margin-left:7.5rem; margin-bottom:0;">'.$nombreCarrera['nombre'].'</p>';
            }
            return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
            // return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
            return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }
}
