<?php

namespace App\Http\Controllers;

use App\Models\recursos_apoyo;
use App\Models\servicios;
use App\Models\titulo_conferencias;
use App\Models\conferencias;
use App\Models\tema_i;
use App\Models\infografias_et;
use App\Models\convocatorias;
use App\Models\convocatorias_tabla;
use App\Models\colores;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ResourcesEpaov extends Controller
{
    public function index()
    {
        // $recursosApoyos = recursos_apoyo::get();
    }

    function resource_recursos_apoyo(Request $request)
    {

        // $recursos = RecursosApoyo::get();
        // return json_encode($recursos);
        // return json_encode([["Recurso"=>"texto","Imagen"=>"1.png"],["Recurso"=>"texto","Imagen"=>"1.png"],["Recurso"=>"texto","Imagen"=>"1.png"]]);

        try
        {
          $recursosApoyos=recursos_apoyo::get();
          // $recursosApoyos=recursos_apoyo::where('id_recursos_apoyo',$request->input('id_recursos_apoyo',$id))->get();
          // $recrusosApoyos=resource_recursos_apoyo::where()
        if($recursosApoyos =="[]"){
          return json_encode([["HTML"=>""],["code"=>"204"],["detail"=>"No Content"]]);
        }

        $html = $this->htmlCarrusel($recursosApoyos);
        return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
          return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }

    }
    public function resource_servicios(Request $request)
    {
      try
      {
        $recursosServicios=servicios::get();
        if($recursosServicios == "[]")
        {
          return json_encode([["HTML"=>""],["code"=>"204"],["detail"=>"No Content"]]);
        }
        $html = $this->htmlCarrusel($recursosServicios);
        return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);

      } catch(Exception $e)
      {
        return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
      }
    }

    public function resource_conferencias_contenidos(Request $request, $id)
    {
      try
      {
        $html = '';
        $recursosConferenciasContenido = conferencias::where('id_conferencias',$request->input('id_conferencias',$id))->get();
        if($recursosConferenciasContenido == "[]")
        {
          return json_encode([["HTML"=>""],["code"=>"204"],["detail"=>"No Content"]]);
        }
        $a=0;
        $html.='<div class="col-sm">
                  <div class="row">
                    <div class="container text-center">
                      <p>
                        <FONT SIZE=5>';
        foreach($recursosConferenciasContenido as $cambiarConferenciasContenido)
        {
            $html.= '<strong>
                          '.$cambiarConferenciasContenido->titulo.'
                          </strong>
                        </FONT>
                      </p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <p>
                        <FONT SIZE=3>
                        <br><br>
                        '.$cambiarConferenciasContenido->texto.'
                        </FONT>
                      </p>
                    </div>
                    <div id="video_La"class="col-md-8">
                    '.$cambiarConferenciasContenido->enlace.'
                    </div>
                    </div>
                </div>';
        }

        return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);

      } catch(Exception $e)
      {
        return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
      }
    }

    public function resource_conferencias_titulos(Request $request)
    {
      try
      {
        $recursosConferencias=conferencias::get();
        $html = '
              <H3>
                <p class="text-center">
                  <strong>Conferencias</strong>
                </p>
              </H3>
              <H5>
              <strong>Eje Temático</strong></H5>
              <br>';
        $a = 0;

        if($recursosConferencias == "[]")
        {
          return json_encode([["HTML"=>""],["code"=>"204"],["detail"=>"No Content"]]);
        }
        foreach($recursosConferencias as $i=> $recursosConferencia)
        {
          ++$a;
          $html.= '<a href=# class="text-primary MetaDataJCSeivoc" ReferenciaMetaSEIVOC="'.(1500+$i).'" onclick = "cambiarConferencias('.$recursosConferencia->id_conferencias.','.(1500+$i).')">
          <FONT SIZE=2  >'.$a.'. '.$recursosConferencia->conferenciascol.'</FONT>
        </a>
        <br>';
        }
        return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
      } catch(Exception $e)
      {
        return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
      }
    }

    public function resource_infografias_et(Request $request)
    {
      try
      {
        // $recursosInfografiasET=infografias_et::where('id_infografia',$request->input('id_infografia'))->get();
        $recursosInfografiasET=infografias_et::get();
        if($recursosInfografiasET == "[]")
        {
          return json_encode([["HTML"=>""],["code"=>"204"],["detail"=>"No Content"]]);
        }
        $html = '
              <H3>
                <p class="text-center">
                  <strong>Infografias</strong>
                </p>
              </H3>
              <H5>
              <strong>Ejes Temático</strong></H5>
              <br>';
        $a = 0;
        foreach($recursosInfografiasET as $i => $recursosInfografiaET)
        {
          ++$a;
          $html.= '<a href=# class="text-primary MetaDataJCSeivoc" ReferenciaMetaSEIVOC="'.(1300+$i).'"  onclick = "cambiarInfografia('.$recursosInfografiaET->id_infografias.','.(1300+$i).')">
          '.$a.'. '.$recursosInfografiaET->eje_tematico.'
        </a>
        <br>';
        }
        return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
      } catch(Exception $e)
      {
        return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
      }
    }
    public function resource_tema_i(Request $request)
    {
      try
      {
        $recursosTemas_i=tema_i::where('id_infografias',$request->input('id_infografias'))->get();
        if($recursosTemas_i == "[]")
        {
          return json_encode([["HTML"=>""],["code"=>"204"],["detail"=>"No Content"]]);
        }
        $html = $this->htmlCarrusel($recursosTemas_i);
        return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
      } catch(Exception $e)
      {
        return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
      }
    }
    public function resource_convocatorias(Request $request)
    {
      try
      {
        $html='
              <br>
              <H3>
                <p class="text-center">
                  <strong>Convocatorias</strong>
                </p>
              </H3>
              <br>
              <p>
                <FONT SIZE=3><strong>Calendario 2021</strong></FONT>
                <br>';
        $recursosConvocatorias=convocatorias::get();
        $a = 0;
        if($recursosConvocatorias == "[]")
        {
          return json_encode([["HTML"=>""],["code"=>"204"],["detail"=>"No Content"]]);
        }
        foreach($recursosConvocatorias as $i=> $recursosConvocatoria)
        {
          ++$a;
          $html.='<a href=# class="text-primary MetaDataJCSeivoc" ReferenciaMetaSEIVOC="'.(1400+$i).'"  onclick = "cambiarTablaMes('.$recursosConvocatoria->id_convocatorias.','.(1400+$i).')">
          <FONT SIZE=2  >'.$a.'. '.$recursosConvocatoria->calendario.'</FONT>
          </a>
          <br>';
        }
        $html.='</p>';
        return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
      } catch(Exception $e)
      {
        return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
      }
    }
    public function resource_convocatorias_tabla(Request $request, $id)
    {
      try
      {
        $html = '';
        $recursosConvocatoriasTab = convocatorias_tabla::where('id_convocatorias',$request->input('id_convocatorias',$id))->get();
        if($recursosConvocatoriasTab == "[]")
        {
          return json_encode([["HTML"=>""],["code"=>"204"],["detail"=>"No Content"]]);
        }
        $a=0;
        $html.='<tr>
            <td class="table" style="background:#ffc107">UNIVERSIDADES PÚBLICAS</td>
            <td class="table" style="background:#2f2e65; color:#fff;">SIGLAS</td>
            <td class="table" style="background:#ffc107">'.convocatorias::where('id_convocatorias', $request->input('id_convocatorias',$id))->first()->calendario.'</td>
            <td class="table" style="background:#2f2e65; color:#fff;">ENLACES</td>
            </tr>';
        foreach($recursosConvocatoriasTab as $recursosConvocatoriaTab)
        {
          // dd($recursosConvocatoriaTab->enlace);
          $color = colores::where('id_colores', $recursosConvocatoriaTab->id_colores)->first();
          if($a%2){
            $html.='<tr>
            <td class="table" style="background:#bacbe6">'.$recursosConvocatoriaTab->nombre.'</td>
            <td class="table">'.$recursosConvocatoriaTab->siglas.'</td>
            <td class="table" style="color:'.$color->color.'">'.$recursosConvocatoriaTab->convocatoria.'</td>
            
            ';
            if (($recursosConvocatoriaTab->enlace)!="") {
              $html.='<td class="table" style="color:#212529"><a href="'.$recursosConvocatoriaTab->enlace.'" target="_blank">Enlace</a></td>
              </tr>';
            }
            
          }else{
            $html.='<tr>
            <td class="table" style="color:#212529">'.$recursosConvocatoriaTab->nombre.'</td>
            <td class="table" style="color:#000000">'.$recursosConvocatoriaTab->siglas.'</td>
            <td class="table" style="color:'.$color->color.'">'.$recursosConvocatoriaTab->convocatoria.'</td>
            
            ';
            if (($recursosConvocatoriaTab->enlace)!="") {
              $html.='<td class="table" style="color:#212529"><a href="'.$recursosConvocatoriaTab->enlace.'" target="_blank">Enlace</a></td>
              </tr>';
            }
          }

          $a++;
        }
        return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
      } catch(Exception $e)
      {
        return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
      }

    }
    //Funcion que guarda la estructura principal de los carruseles.


    public function htmlCarrusel($arregloCarrusel)
    {
      $html = '
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>';

        $a = 0;

        foreach($arregloCarrusel as $recursosApoyo)
        {
          if ($a != 0) {
            $html.='<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="'.$a.'" aria-label="Slide '.($a+1).'"></button>';
          }

          $a++;
        }
        $html.='</div>
        <div class="carousel-inner">';
        $x = 0;
        foreach($arregloCarrusel as $i=> $recursosApoyo)
        {
          if ($x == 0) {
           $html.='
            <div class="carousel-item active justify-content-center" data-bs-interval="10000">
            <figure type="button" data-bs-toggle="modal" data-bs-target="#exampleModal'.$i.'" class=" MetaDataJCSeivoc" ReferenciaMetaSEIVOC="4020">
                        <img class="boton-ojo" style="max-width: 10rem;
                        margin: 0rem 19rem;" src="images/familiadecarreras/boton-ojito.svg">
                    </figure>
              <div class="d-flex justify-content-center">
              <img src="'.$recursosApoyo['imagen'].'" class=" w-25 justify-content-center"  alt="...">
              
              </div>
              <br><br><br><br><br><br><br><br><br>
              <div class="carousel-caption d-none d-md-block">
              <h5>'.$recursosApoyo['titulo'].'</h5>
              <a href="'.$recursosApoyo['texto'].'">'.$recursosApoyo['texto'].'</a>
              </div>
            </div>
            
            <div class="modal fade" id="exampleModal'.$i.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close MetaDataJCSeivoc" ReferenciaMetaSEIVOC="4030" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex justify-content-center">
            <img class="imagenesIPN-UAM" src="'.$recursosApoyo['imagen'].'" >
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary MetaDataJCSeivoc" ReferenciaMetaSEIVOC="4030" data-bs-dismiss="modal">Cerrar</button>
          
        </div>
      </div>
    </div>
  </div>
            ';
          }
          else {
            $html.='
            <div class="carousel-item justify-content-center" data-bs-interval="10000">
            <figure type="button" data-bs-toggle="modal" data-bs-target="#exampleModal'.$i.'" class=" MetaDataJCSeivoc" ReferenciaMetaSEIVOC="4020">
                        <img class="boton-ojo" style="max-width: 10rem;
                        margin: 0rem 19rem;" src="images/familiadecarreras/boton-ojito.svg">
                    </figure>
              <div class="d-flex justify-content-center">
              <img src="'.$recursosApoyo['imagen'].'" class=" w-25 justify-content-center"  alt="...">
              
              </div>
              <br><br><br><br><br><br><br><br><br>
              <div class="carousel-caption d-none d-md-block">
              <h5>'.$recursosApoyo['titulo'].'</h5>
              <a href="'.$recursosApoyo['texto'].'">'.$recursosApoyo['texto'].'</a>
              </div>
            </div>
            
            <div class="modal fade" id="exampleModal'.$i.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close MetaDataJCSeivoc" ReferenciaMetaSEIVOC="4030" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex justify-content-center">
            <img class="imagenesIPN-UAM" src="'.$recursosApoyo['imagen'].'">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary MetaDataJCSeivoc" ReferenciaMetaSEIVOC="4030" data-bs-dismiss="modal">Cerrar</button>
          
        </div>
      </div>
    </div>
  </div>
            ';
          }

          $x++;
        }
        $html.='</div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"  data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"  data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>';
        return $html;
    }
}