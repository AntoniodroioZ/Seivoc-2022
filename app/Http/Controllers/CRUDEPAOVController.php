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
use App\Models\roles;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CRUDEPAOVController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function moduloadminEPAOV(){
      $id=Auth::user()->usuario_id;
      $verificacion = roles::where('usuario_id',$id)->get();
      foreach($verificacion as $verificar){
        $rolMinimo = $verificar->roles_id;
      }
      if($rolMinimo >= 5){
          $roles = roles::where('usuario_id',$id)->get();
          // dd($roles);
          $i = 0;
          foreach($roles as $rol_id){
              $rol[$i] = $rol_id->roles_id;
              $i += 1;
          }
          // dd($rol);
        
          return view('administrador.moduloadminEPAOV', compact('rol'));
  
         }
        
        // return view('administrador.moduloadminEPAOV');
    }
    public function EPAOVInfoMano()
    {
        $view = 1;
        $id=Auth::user()->usuario_id;
        $verificacion = roles::where('usuario_id',$id)->get();
        foreach($verificacion as $verificar){
          $rolMinimo = $verificar->roles_id;
        }
        // dd($id);
        // dd($rolMinimo);
        if($rolMinimo >= 5){
          return view('administrador.EPAOVGeneral', compact('view'));
        }

    }
    public function EPAOVConvocatorias()
    {
        $view = 2;

        $id=Auth::user()->usuario_id;
        $verificacion = roles::where('usuario_id',$id)->get();
        foreach($verificacion as $verificar){
          $rolMinimo = $verificar->roles_id;
        }
        
        if($rolMinimo >= 6){
          return view('administrador.EPAOVGeneral', compact('view'));
        }
    }
    public function EPAOVConferencias()
    {
        $view = 3;

        $id=Auth::user()->usuario_id;
        $verificacion = roles::where('usuario_id',$id)->get();
        foreach($verificacion as $verificar){
          $rolMinimo = $verificar->roles_id;
        }
        
        if($rolMinimo >= 7){
          return view('administrador.EPAOVGeneral', compact('view'));
        }
    }
    public function EPAOVRecursosApoyo()
    {
        $view = 4;

        $id=Auth::user()->usuario_id;
        $verificacion = roles::where('usuario_id',$id)->get();
        foreach($verificacion as $verificar){
          $rolMinimo = $verificar->roles_id;
        }
        
        if($rolMinimo >= 8){
          return view('administrador.EPAOVGeneral', compact('view'));
        }
    }
    public function EPAOVServicios()
    {
        $view = 5;

        $id=Auth::user()->usuario_id;
        $verificacion = roles::where('usuario_id',$id)->get();
        foreach($verificacion as $verificar){
          $rolMinimo = $verificar->roles_id;
        }
        
        if($rolMinimo >= 9){
          return view('administrador.EPAOVGeneral', compact('view'));
        }
    }

    public function CRUD_infografias_et(Request $request)
    {
        try
        {
            $recursosInfografiasET=infografias_et::get();
            if($recursosInfografiasET =="[]"){
              $html = '<div>
              <table class="table table-primary table-striped">
                  <thead>
                    <tr>
                      <th scope="col"></th>
                      <th scope="col">Titulo</th>
                      <th scope="col">Acción</th>
                    </tr>
                  </thead>
                  <tbody>';
              $html .= '<tr>
              <th scope="row"></th>
              <td class="color-texto-tablas">¿Deseas agregar una nueva conferencia?</td>
              
              <td><a ><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#nuevoEje"><i class="fas fa-plus"></i></button></a>
              </td>
              </tr> 
                      </tbody>
                      </table>   
                      </div>
                      </div>
                      ';
                return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
            }

            $html = $this->htmlTabla($recursosInfografiasET);
            // $html = $recursosInfografiasET;
            return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
            return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }

    public function CRUD_tema_i(Request $request)
    {
        try
        {
            $recursosTemas_i=tema_i::where('id_infografias',$request->input('id_infografias'))->get();
            $id = $request->input('id_infografias');
            if($recursosTemas_i =="[]"){
              $html = '<div>
              <table class="table table-primary table-striped">
                  <thead>
                    <tr>
                      <th scope="col"></th>
                      <th scope="col">Titulo</th>
                      <th scope="col">Imagen</th>
                      <th scope="col">Texto</th>
                      <th scope="col">Acción</th>
                    </tr>
                  </thead>
                  <tbody>';
                $html .='<tr>
                <th scope="row"></th>
                <td class="color-texto-tablas">¿Deseas agregar una nueva infografia?</td>
                <td class="color-texto-tablas"></td>
                <td class="color-texto-tablas"></td>
                <td><a onclick="getIdEje('.$id.')"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalNuevoForm" ><i class="fas fa-plus"></i></button></a>
                </td>
                </tr> 
                </tbody>
                </table>   
                </div>
                </div>
                ';
                return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
            } 

            $html = $this->htmlTablaTemaICRUD($recursosTemas_i,$id);
            // $html = $recursosInfografiasET;
            return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
            return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }
    public function nuevoEje(Request $request, $nombreTitulo){
        $ejesTematicos = infografias_et::orderBy('id_infografias', 'desc')->first();
        $id = $ejesTematicos['id_infografias'];
        $nuevoEje= new infografias_et;
        $nuevoEje->id_infografias = ($id + 1);
        $nuevoEje->eje_tematico = $nombreTitulo;
        $nuevoEje->save();
        // return redirect()->route('infografias');
    }
    public function borrarEje(Request $request, $id){
        $ejeEliminar = infografias_et::find($id);
        $ejeEliminar->delete();
        // return dd($ejeEliminar);
    }
    public function cambiarEje(Request $request){
      // $id = 10;
      // $nombreTitulo = 'test titulo';
      $cambiarEje = infografias_et::where('id_infografias',$request->input('id_infografias'))->
                    update(['eje_tematico'=>$request->input('eje_tematico')]);
    }
    // Funciones para cambiar contenido del carrusel infografias
    public function subirInfografia(Request $request){
      // entradas
      $idTemaI = tema_i::orderBy('id_tema_i','desc')->first();
      $id = $idTemaI['id_tema_i'];
      $idInfografia = $request->input('IdEje');
      $titulo = $request->input('TituloInfo');
      $texto = $request->input('TextoInfo');
      $nombreOriginal = $request->file('archivo')->getClientOriginalName();   
      $nombreCorregido = str_replace(" ", "",$nombreOriginal);
      // Comprobacion si existe el archivo, renombrar con el titulo
      if(Storage::disk('public')->exists("/infografias/$nombreCorregido")){
        $nombreCorregido = "$titulo$id$texto$nombreCorregido";
        $ruta = "storage/infografias/$nombreCorregido";
        $path = $request->file('archivo')->storeAs(
        'public/infografias',$nombreCorregido
        );
        $nuevaInfografia = new tema_i;
        $nuevaInfografia->id_tema_i = ($id+1);
        $nuevaInfografia->id_infografias = $idInfografia;
        $nuevaInfografia->titulo = $titulo;
        $nuevaInfografia->imagen = $ruta;
        $nuevaInfografia->texto = $texto;
        $nuevaInfografia->save();
        return back();
      }else{
        $ruta = "storage/infografias/$nombreCorregido";
        $path = $request->file('archivo')->storeAs(
          'public/infografias',$nombreCorregido
        );
        $nuevaInfografia = new tema_i;
        $nuevaInfografia->id_tema_i = ($id+1);
        $nuevaInfografia->id_infografias = $idInfografia;
        $nuevaInfografia->titulo = $titulo;
        $nuevaInfografia->imagen = $ruta;
        $nuevaInfografia->texto = $texto;
        $nuevaInfografia->save();
        return back();
      }
      // $request->file('archivo')->store('public');
      // subidas
      
    }
    public function eliminarInfografia(Request $request, $id){
      // $id = 15;
      $infografiaEliminar = tema_i::find($id);
      $imagenEliminar = tema_i::where('id_tema_i',$id)->get("imagen");
      $infografiaEliminar->delete();
      foreach ($imagenEliminar as $imagen){
        $rutaCompleta =$imagen["imagen"];
        $palabras = explode("/",$rutaCompleta);
        // echo $palabras[2];
        Storage::disk('public')->delete("/infografias/$palabras[2]");
        // echo($imagen["imagen"]);

      }
    }

    public function editarInfografia(Request $request){
      // $request->input('id_infografias')
      // $request->input('eje_tematico')
      $idInfografia = $request->input('editIdInfo');
      $titulo = $request->input('editTituloInfo');
      $texto = $request->input('EditTextoInfo');
      $nombreOriginal = $request->file('editarchivo')->getClientOriginalName();   
      $nombreCorregido = str_replace(" ", "",$nombreOriginal);
      // Comprobacion si existe el archivo, eliminalo y sustituyelo
      if(Storage::disk('public')->exists("/infografias/$nombreCorregido")){
        Storage::disk('public')->delete("/infografias/$nombreCorregido");        
      }
      if(Storage::disk('public')->exists("/infografias/$nombreOriginal")){
        Storage::disk('public')->delete("/infografias/$nombreOriginal");        
      }
      $nombreCorregido = "$titulo$idInfografia$texto$nombreCorregido";
      $ruta = "storage/infografias/$nombreCorregido";
      $path = $request->file('editarchivo')->storeAs(
        'public/infografias',$nombreCorregido
      );
      $cambiarEje = tema_i::where('id_tema_i',$idInfografia)->
                  update(['titulo'=>$titulo,
                          'imagen'=>$ruta,
                          'texto'=>$texto]);
      return back();
    }
        

    // CRUD Recursos apoyo
    function CRUD_recursos_apoyo(Request $request)
    {
        try
        {
          $recursosApoyos=recursos_apoyo::get();
          if($recursosApoyos =="[]"){
            $html = '<div>
            <table class="table table-primary table-striped">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Texto</th>
                    <th scope="col">Acción</th>
                  </tr>
                </thead>
                <tbody>';
              $html .='<tr>
              <th scope="row"></th>
              <td class="color-texto-tablas">¿Deseas agregar un nuevo recurso?</td>
              <td class="color-texto-tablas"></td>
              <td class="color-texto-tablas"></td>
              <td><a><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalNuevoForm" ><i class="fas fa-plus"></i></button></a>
              </td>
              </tr> 
              </tbody>
              </table>   
              </div>
              </div>
              ';
              return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
          } 
          if($recursosApoyos =="[]"){
            return json_encode([["HTML"=>""],["code"=>"204"],["detail"=>"No Content"]]);
          }

        $html = $this->htmlTablaRecursos($recursosApoyos);
        return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
          return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }
    // Funciones CRUD recursos apoyo
    public function subirRecurso(Request $request){
      // entradas
      $idTemaI = recursos_apoyo::orderBy('id_recursos_apoyo','desc')->first();
      $id = $idTemaI['id_recursos_apoyo'];
      $idRecurso = $request->input('IdRecurso');
      $titulo = $request->input('TituloRecurso');
      $texto = $request->input('TextoRecurso');
      $nombreOriginal = $request->file('archivoRecurso')->getClientOriginalName();   
      $nombreCorregido = str_replace(" ", "",$nombreOriginal);
      // Comprobacion si existe el archivo, renombrar con el titulo
      if(Storage::disk('public')->exists("/recursosApoyo/$nombreCorregido")){
        $nombreCorregido = "$titulo$id$texto$nombreCorregido";
        $ruta = "storage/recursosApoyo/$nombreCorregido";
        $path = $request->file('archivoRecurso')->storeAs(
        'public/recursosApoyo',$nombreCorregido
        );
        $nuevoRecurso = new recursos_apoyo;
        $nuevoRecurso->id_recursos_apoyo = ($id+1);
        $nuevoRecurso->titulo = $titulo;
        $nuevoRecurso->imagen = $ruta;
        $nuevoRecurso->texto = $texto;
        $nuevoRecurso->save();
        return back();
      }else{
        $ruta = "storage/recursosApoyo/$nombreCorregido";
        $path = $request->file('archivoRecurso')->storeAs(
          'public/recursosApoyo',$nombreCorregido
        );
        $nuevoRecurso = new recursos_apoyo; 
        $nuevoRecurso->id_recursos_apoyo = ($id+1);
        $nuevoRecurso->titulo = $titulo;
        $nuevoRecurso->imagen = $ruta;
        $nuevoRecurso->texto = $texto;
        $nuevoRecurso->save();
        return back();
      }
    }
    public function eliminarRecurso(Request $request, $id){
      // $id = 15;
      $recursoEliminar = recursos_apoyo::find($id);
      $imagenEliminar = recursos_apoyo::where('id_recursos_apoyo',$id)->get("imagen");
      $recursoEliminar->delete();
      foreach ($imagenEliminar as $imagen){
        $rutaCompleta =$imagen["imagen"];
        $palabras = explode("/",$rutaCompleta);
        // echo $palabras[2];
        Storage::disk('public')->delete("/recursosApoyo/$palabras[2]");
        // echo($imagen["imagen"]);

      }
    }
    public function editarRecurso(Request $request){
      $idRecurso = $request->input('editIdRecurso');
      $titulo = $request->input('editTituloRecurso');
      $texto = $request->input('EditTextoRecurso');
      $nombreOriginal = $request->file('editarchivoRecurso')->getClientOriginalName();   
      $nombreCorregido = str_replace(" ", "",$nombreOriginal);
      // Comprobacion si existe el archivo, eliminalo y sustituyelo
      if(Storage::disk('public')->exists("/recursosApoyo/$nombreCorregido")){
        Storage::disk('public')->delete("/recursosApoyo/$nombreCorregido");        
      }
      if(Storage::disk('public')->exists("/recursosApoyo/$nombreOriginal")){
        Storage::disk('public')->delete("/recursosApoyo/$nombreOriginal");        
      }
      $nombreCorregido = "$titulo$idRecurso$texto$nombreCorregido";
      $ruta = "storage/recursosApoyo/$nombreCorregido";
      $path = $request->file('editarchivoRecurso')->storeAs(
        'public/recursosApoyo',$nombreCorregido
      );
      $cambiarEje = recursos_apoyo::where('id_recursos_apoyo',$idRecurso)->
                  update(['titulo'=>$titulo,
                          'imagen'=>$ruta,
                          'texto'=>$texto]);
      return back();
    }

    // Funciones CRUD para servicios
    function CRUD_servicios(Request $request)
    {
        try
        {
          $recursosApoyos=servicios::get();
          if($recursosApoyos =="[]"){
            $html = '<div>
            <table class="table table-primary table-striped">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Texto</th>
                    <th scope="col">Acción</th>
                  </tr>
                </thead>
                <tbody>';
              $html .='<tr>
              <th scope="row"></th>
              <td class="color-texto-tablas">¿Deseas agregar un nuevo servicio?</td>
              <td class="color-texto-tablas"></td>
              <td class="color-texto-tablas"></td>
              <td><a><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalNuevoForm" ><i class="fas fa-plus"></i></button></a>
              </td>
              </tr> 
              </tbody>
              </table>   
              </div>
              </div>
              ';
              return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
          } 
          if($recursosApoyos =="[]"){
            return json_encode([["HTML"=>""],["code"=>"204"],["detail"=>"No Content"]]);
          }

        $html = $this->htmlTablaServicios($recursosApoyos);
        return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
          return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }
    public function subirServicio(Request $request)
    {
      // entradas
      $idTemaI = servicios::orderBy('id_servicios','desc')->first();
      $id = $idTemaI['id_servicios'];
      $idServicio = $request->input('IdServicio');
      $titulo = $request->input('TituloServicio');
      $texto = $request->input('TextoServicio');
      $nombreOriginal = $request->file('archivoServicio')->getClientOriginalName();   
      $nombreCorregido = str_replace(" ", "",$nombreOriginal);
      // Comprobacion si existe el archivo, renombrar con el titulo
      if(Storage::disk('public')->exists("/servicios/$nombreCorregido")){
        $nombreCorregido = "$titulo$id$texto$nombreCorregido";
        $ruta = "storage/servicios/$nombreCorregido";
        $path = $request->file('archivoServicio')->storeAs(
        'public/servicios',$nombreCorregido
        );
        $nuevoServicio = new servicios;
        $nuevoServicio->id_servicios = ($id+1);
        $nuevoServicio->titulo = $titulo;
        $nuevoServicio->imagen = $ruta;
        $nuevoServicio->texto = $texto;
        $nuevoServicio->save();
        return back();
      }else{
        $ruta = "storage/servicios/$nombreCorregido";
        $path = $request->file('archivoServicio')->storeAs(
          'public/servicios',$nombreCorregido
        );
        $nuevoServicio = new servicios; 
        $nuevoServicio->id_servicios = ($id+1);
        $nuevoServicio->titulo = $titulo;
        $nuevoServicio->imagen = $ruta;
        $nuevoServicio->texto = $texto;
        $nuevoServicio->save();
        return back();
      }
    }
    public function eliminarServicio(Request $request, $id)
    {
      // $id = 15;
      $servicioEliminar = servicios::find($id);
      $imagenEliminar = servicios::where('id_servicios',$id)->get("imagen");
      $servicioEliminar->delete();
      foreach ($imagenEliminar as $imagen){
        $rutaCompleta =$imagen["imagen"];
        $palabras = explode("/",$rutaCompleta);
        // echo $palabras[2];
        Storage::disk('public')->delete("/servicio/$palabras[2]");
        // echo($imagen["imagen"]);

      }
    }
    public function editarServicio(Request $request){
      $idServicio = $request->input('editIdServicio');
      $titulo = $request->input('editTituloServicio');
      $texto = $request->input('EditTextoServicio');
      $nombreOriginal = $request->file('editarchivoServicio')->getClientOriginalName();   
      $nombreCorregido = str_replace(" ", "",$nombreOriginal);
      // Comprobacion si existe el archivo, eliminalo y sustituyelo
      if(Storage::disk('public')->exists("/servicios/$nombreCorregido")){
        Storage::disk('public')->delete("/servicios/$nombreCorregido");        
      }
      if(Storage::disk('public')->exists("/servicios/$nombreOriginal")){
        Storage::disk('public')->delete("/servicios/$nombreOriginal");        
      }
      $nombreCorregido = "$titulo$idServicio$texto$nombreCorregido";
      $ruta = "storage/servicios/$nombreCorregido";
      $path = $request->file('editarchivoServicio')->storeAs(
        'public/servicios',$nombreCorregido
      );
      $cambiarEje = servicios::where('id_servicios',$idServicio)->
                  update(['titulo'=>$titulo,
                          'imagen'=>$ruta,
                          'texto'=>$texto]);
      return back();
    }

    // CRUD Conferencias
    public function CRUD_conferencias(Request $request)
    {
        try
        {
            $recursosConferencias=conferencias::get();
            $html = '';
            if($recursosConferencias =="[]"){
              $html = '<div>
              <table class="table table-primary table-striped">
                  <thead>
                    <tr>
                      <th scope="col"></th>
                      <th scope="col">Titulo</th>
                      <th scope="col">Acción</th>
                    </tr>
                  </thead>
                  <tbody>';
              $html .= '<tr>
              <th scope="row"></th>
              <td class="color-texto-tablas">¿Deseas agregar una nueva conferencia?</td>
              
              <td><a ><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#nuevaConferencia"><i class="fas fa-plus"></i></button></a>
              </td>
              </tr> 
                      </tbody>
                      </table>   
                      </div>
                      </div>
                      ';
                return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
            }

            $html = $this->htmlConferencias($recursosConferencias);
            // $html = $recursosInfografiasET;
            return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
            return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }
    public function nuevaConferencia(Request $request, $nombreTitulo)
    {
      $ejesTematicos = conferencias::orderBy('id_conferencias', 'desc')->first();
      $id = $ejesTematicos['id_conferencias'];
      $nuevaConferencia= new conferencias;
      $nuevaConferencia->id_conferencias = ($id + 1);
      $nuevaConferencia->conferenciascol = $nombreTitulo;
      $nuevaConferencia->save();
      // return redirect()->route('infografias');
    }
    public function cambiarConferencias(Request $request)
    {
      $cambiarConferencia = conferencias::where('id_conferencias',$request->input('id_conferencias'))->
                          update(['conferenciascol'=>$request->input('conferenciascol')]);
    }
    public function borrarConferencia(Request $request, $id){
        $ConferenciaEliminar = conferencias::find($id);
        $ConferenciaEliminar->delete();
        // return dd($ejeEliminar);
    }

    // Funciones CRUD para editar el contenido de la conferencia
    public function cambiarContenidoConferencia(Request $request)
    {
      $cambiarConferencia = conferencias::where('id_conferencias',$request->input('id_conferencias'))->
                          update(['titulo'=>$request->input('titulo'),
                                  'texto'=>$request->input('texto'),
                                  'enlace'=>$request->input('enlace')]);
    }
    
    

    // Funciones CRUD para la tabla convocatorias (meses o elementos)
    public function CRUD_convocatorias(Request $request)
    {
        try
        {
            $recursosConvocatorias=convocatorias::get();
            $html = '';
            if($recursosConvocatorias =="[]"){
              $html = '<div>
              <table class="table table-primary table-striped">
                  <thead>
                    <tr>
                      <th scope="col"></th>
                      <th scope="col">Titulo</th>
                      <th scope="col">Acción</th>
                    </tr>
                  </thead>
                  <tbody>';
              $html .= '<tr>
              <th scope="row"></th>
              <td class="color-texto-tablas">¿Deseas agregar una nueva convocatorias?</td>
              
              <td><a ><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#nuevaConvocatorias"><i class="fas fa-plus"></i></button></a>
              </td>
              </tr> 
                      </tbody>
                      </table>   
                      </div>
                      </div>
                      ';
                return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
            }

            $html = $this->htmlTablaConvocatorias($recursosConvocatorias);
            // $html = $recursosInfografiasET;
            return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
            return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }
    public function cambiarElemento(Request $request){
      // $id = 10;
      // $nombreTitulo = 'test titulo';
      $cambiarElemento = convocatorias::where('id_convocatorias',$request->input('id_convocatorias'))->
                    update(['calendario'=>$request->input('calendario')]);
    }
    public function nuevoElemento(Request $request, $nombreTitulo){
      $nuevoElemento = convocatorias::orderBy('id_convocatorias', 'desc')->first();
      $id = $nuevoElemento['id_convocatorias'];
      $nuevoElemento= new convocatorias;
      $nuevoElemento->id_convocatorias = ($id + 1);
      $nuevoElemento->calendario = $nombreTitulo;
      $nuevoElemento->save();
      // return redirect()->route('infografias');
    }
    public function borrarElemento(Request $request, $id){
      $borrarElemento = convocatorias::find($id);
      $borrarElemento->delete();
      // return dd($ejeEliminar);
    }
    // Funciones CRUD para las convocatorias (Convocatorias, nomnbres de escuelas y siglas)
    function CRUD_Convocatorias_contenido(Request $request)
    {
        try
        {
          $recursosApoyos=convocatorias_tabla::where('id_convocatorias',$request->input('id_convocatorias'))->get();
          $id = $request->input('id_convocatorias');
          if($recursosApoyos =="[]"){
            $html = '<div>
            <table class="table table-primary table-striped">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Siglas</th>
                    <th scope="col">Convocatoria</th>
                    <th scope="col">Acción</th>
                  </tr>
                </thead>
                <tbody>';
              $html .='<tr>
              <th scope="row"></th>
              <td class="color-texto-tablas">¿Deseas agregar una nueva convocatoria?</td>
              <td class="color-texto-tablas"></td>
              <td class="color-texto-tablas"></td>
              <td><a onclick="getConvocatoriaId('.$id.')"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#nuevaConvocatoria" ><i class="fas fa-plus"></i></button></a>
              </td>
              </tr> 
              </tbody>
              </table>   
              </div>
              </div>
              ';
              return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
          } 
          if($recursosApoyos =="[]"){
            return json_encode([["HTML"=>""],["code"=>"204"],["detail"=>"No Content"]]);
          }

        $html = $this->htmlTablaConvocatoriasCRUD($recursosApoyos,$id);
        return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);
        } catch(Exception $e){
          return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
        }
    }
    public function cambiarConvocatoriaContenido(Request $request)
    {
      $cambiarConvocatoriaContenido = convocatorias_tabla::where('id_convocatorias_tablas',$request->input('id_convocatorias_tablas'))->
                    update([
                    'id_colores'=>$request->input('id_colores'),
                    'siglas'=>$request->input('siglas'),
                    'nombre'=>$request->input('nombre'),
                    'convocatoria'=>$request->input('convocatoria'),
                    'enlace'=>$request->input('enlace')]);

    }
    public function nuevaConvocatoriaContenido(Request $request)
    {
      $nuevoElemento = convocatorias_tabla::orderBy('id_convocatorias_tablas', 'desc')->first();
      $id = $nuevoElemento['id_convocatorias_tablas'];
      $nuevoElemento= new convocatorias_tabla;
      $nuevoElemento->id_convocatorias_tablas = ($id + 1);
      $nuevoElemento->id_convocatorias = $request->input('id_convocatorias');
      $nuevoElemento->id_colores = $request->input('id_colores');
      $nuevoElemento->siglas = $request->input('siglas');
      $nuevoElemento->nombre = $request->input('nombre');
      $nuevoElemento->convocatoria = $request->input('convocatoria');
      $nuevoElemento->enlace = $request->input('enlace');
      $nuevoElemento->save();
    }

    public function borrarContenidoConvocatoria(Request $request, $id){
      $borrarElemento = convocatorias_tabla::where('id_convocatorias_tablas',$id);
      $borrarElemento->delete();
      // return dd($ejeEliminar);
    }
    public function obtenerColores()
    {
      try {
        $colores = colores::get();
        $html='<select id="colorSelect" name="colorSelect" class="form-select" aria-label="Default select example" required>
              <option selected>Selecciona un color</option>';
        if ($colores == "[]") {
          $html='<select class="form-select" aria-label="Default select example">
          <option selected>No hay ningun color disponible, agregue uno</option>
          
        </select>';
          
        }
        foreach($colores as $color){
          $html .='<option value="'.$color['id_colores'].'" style="color:'.$color['color'].'">'.$color['descripcion'].'</option>';
        }
        $html .='</select>';
        return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);;
      } catch (Exception $e) {
        return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
      }
      
    }
    public function obtenerColoresEdit()
    {
      try {
        $colores = colores::get();
        $html='<select id="colorSelectEdit" name="colorSelect" class="form-select" aria-label="Default select example" required>
              <option selected>Selecciona un color</option>';
        if ($colores == "[]") {
          $html='<select class="form-select" aria-label="Default select example">
          <option selected>No hay ningun color disponible, agregue uno</option>
          
        </select>';
          
        }
        foreach($colores as $color){
          $html .='<option value="'.$color['id_colores'].'" style="color:'.$color['color'].'">'.$color['descripcion'].'</option>';
        }
        $html .='</select>';
        return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);;
      } catch (Exception $e) {
        return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
      }
      
    }
    public function obtenerColoresNuevo()
    {
      try {
        $colores = colores::get();
        $html='<select id="colorSelectNuevo" name="colorSelect" class="form-select" aria-label="Default select example" required>
              <option selected>Selecciona un color</option>';
        if ($colores == "[]") {
          $html='<select class="form-select" aria-label="Default select example">
          <option selected>No hay ningun color disponible, agregue uno</option>
          
        </select>';
          
        }
        foreach($colores as $color){
          $html .='<option value="'.$color['id_colores'].'" style="color:'.$color['color'].'">'.$color['descripcion'].'</option>';
        }
        $html .='</select>';
        return json_encode([["HTML"=>$html],["code"=>"201"],["detail"=>"ok"]]);;
      } catch (Exception $e) {
        return json_encode([["HTML"=>""],["code"=>"504"],["detail"=>"Internal Server Error"]]);
      }
      
    }
    public function nuevoColor()
    {
      $nuevoColor = colores::orderBy('id_colores', 'desc')->first();
      $id = $nuevoColor['id_colores'];
      $nuevoColor = new colores;
      $nuevoColor->id_colores = ($id+1);
      $nuevoColor->color = $request->input('color');
      $nuevoColor->descripcion = $request->input('descripcion');
    }
    public function editarColor()
    {
      $editarColor = colores::where('id_colores',$request->input('id_colores'))->
                update(['color'=>$request->input('color'),
                        'descripcion'=>$request->input('descripcion')]);
    }
    public function eliminarColor()
    {
      $eliminarColor = colores::where('id_colores',$request->input('id_colores'));
      $eliminarColor->delete();
    }

    public function htmlTabla($arregloTabla)
    {
        $a = 0;
        $b = 0;
        $html = '<div>
        <table class="table table-primary table-striped">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Ejes temáticos</th>
                <th scope="col">Acción</th>
              </tr>
            </thead>
            <tbody>';
        
        foreach($arregloTabla as $recurso)
        {
            $a +=1;
            
            $html .='<tr>
            <th scope="row">'.$a.'</th>
            <td class="color-texto-tablas" >'.$recurso['eje_tematico'].' <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#cambiarTitulo'.$a.'">Cambiar nombre <i class="fas fa-pencil-alt"></i></button></td>
            <td style="width: 10rem;"><a href="/informacionmanoinfografia" target="_blank">
            <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button></a> <a onclick="cambiarInfografias('.$recurso['id_infografias'].')">
            <button type="button" class="btn btn-success" ><i class="fas fa-pencil-alt"></i></button></a> <a >
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#verificacionModal'.$recurso['id_infografias'].'"><i class="fas fa-times"></i></button></a>
            </td>
        </tr>';
        }
        $html .= '<tr>
        <th scope="row"></th>
        <td class="color-texto-tablas">¿Deseas agregar un nuevo eje temático?</td>
        
        <td><a ><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#nuevoEje"><i class="fas fa-plus"></i></button></a>
        </td>
        </tr> 
                </tbody>
                </table>   
                </div>
                </div>
                ';
        foreach($arregloTabla as $recurso){
            $b += 1;
            $html .='
            <div class="modal fade" id="cambiarTitulo'.$b.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog ">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="">Cambio de titulo al eje tematico:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form id="formularioEdit"> 
                    <div class="mb-3">
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label" >Titulo:</label>
                        <input type="hidden" class="form-control" id="idInfoEdit'.$recurso['id_infografias'].'" name="id" value="'.$recurso['id_infografias'].'">
                        <input type="text" class="form-control" id="tituloEdit'.$recurso['id_infografias'].'" name="nombreTitulo" value="'.$recurso['eje_tematico'].'">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <a onclick="cambiaTituloId('.$recurso['id_infografias'].')">
                        <button  type="button" class="btn btn-primary" data-bs-dismiss="modal">Cambiar nombre</button>                        
                        </a>
                      </div>
                    </form>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="modal fade" id="verificacionModal'.$recurso['id_infografias'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Advertencia</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ¿Estas seguro que quieres eliminar el eje tematico?<br>
            Al hacerlo, perderas todo el contenido que tenga asignado.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a onclick="borrarEje('.$recurso['id_infografias'].')">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Eliminar</button>
            </a>
          </div>
        </div>
      </div>
      </div>';
        }
        return $html;
    }
    public function htmlTablaTemaICRUD($arregloTabla,$id)
    {
        $a = 0;
        $b = 0;
        $c = 0;
        $html = '<div>
        <table class="table table-primary table-striped">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Titulo</th>
                <th scope="col">Imagen</th>
                <th scope="col">Link o enlace</th>
                <th scope="col">Acción</th>
              </tr>
            </thead>
            <tbody>';
        foreach($arregloTabla as $recurso)
        {
            $a += 1;
            $html .='<tr>
            <th scope="row">'.$a.'</th>
            <td class="color-texto-tablas" ><p id="tituloInfografia'.$recurso['id_tema_i'].'">'.$recurso['titulo'].'</p></td>
            <td class="color-texto-tablas"><img src="'.url("/").'/'.$recurso['imagen'].'" style="width: 50%;"></td>
            <td class="color-texto-tablas" ><p id="textoInfografia'.$recurso['id_tema_i'].'">'.$recurso['texto'].'</p></td>
            <td style="width: 10rem;"><a href="/informacionmanoinfografia" target="_blank">
            <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button></a> <a onclick="getInfografiaTitulo('.$recurso['id_tema_i'].','.$recurso['id_infografias'].')">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalEditarForm"><i class="fas fa-pencil-alt"></i></button></a> <a onclick="eliminarInfografia('.$recurso['id_tema_i'].','.$recurso['id_infografias'].')">
            <button type="button" class="btn btn-danger"><i class="fas fa-times"></i></button></a>
            </td>
        </tr>';
        }
        $html .='<tr>
                <th scope="row"></th>
                <td class="color-texto-tablas">¿Deseas agregar una nueva infografia?</td>
                <td class="color-texto-tablas"></td>
                <td class="color-texto-tablas"></td>
                <td><a onclick="getIdEje('.$id.')"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalNuevoForm" ><i class="fas fa-plus"></i></button></a>
                </td>
                </tr> 
                </tbody>
                </table>   
                </div>
                </div>
                ';
        foreach($arregloTabla as $recurso)
        {
            // modal
            $b += 1;
            $html.='<div class="modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          </div>
          </div>';
        }
       
        return $html;
    }
    public function htmlTablaRecursos($arregloTabla)
    {
      $a = 0;
      $b = 0;
      $c = 0;
      $html = '<div>
        <table class="table table-primary table-striped">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Titulo</th>
                <th scope="col">Imagen</th>
                <th scope="col">Link o enlace</th>
                <th scope="col">Acción</th>
              </tr>
            </thead>
            <tbody>';
        foreach($arregloTabla as $recurso)
        {
            $a += 1;
            $html .='<tr>
            <th scope="row">'.$recurso['id_recursos_apoyo'].'</th>
            <td class="color-texto-tablas" ><p id="tituloRecurso'.$recurso['id_recursos_apoyo'].'">'.$recurso['titulo'].'</p></td>
            <td class="color-texto-tablas"><img src="'.url("/").'/'.$recurso['imagen'].'" style="width: 50%;"></td>
            <td class="color-texto-tablas" ><p id="textoRecurso'.$recurso['id_recursos_apoyo'].'">'.$recurso['texto'].'</p></td>
            <td style="width: 10rem;"><a href="/informacionmanorecursosapoyo" target="_blank">
            <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button></a> <a onclick="getRecursoContenido('.$recurso['id_recursos_apoyo'].')">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalEditarForm"><i class="fas fa-pencil-alt"></i></button></a> <a onclick="eliminarRecurso('.$recurso['id_recursos_apoyo'].')">
            <button type="button" class="btn btn-danger"><i class="fas fa-times"></i></button></a>
            </td>
        </tr>';
        }
        $html .='<tr>
                <th scope="row"></th>
                <td class="color-texto-tablas">¿Deseas agregar un nuevo recurso?</td>
                <td class="color-texto-tablas"></td>
                <td class="color-texto-tablas"></td>
                <td><a onclick=""><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalNuevoForm" ><i class="fas fa-plus"></i></button></a>
                </td>
                </tr> 
                </tbody>
                </table>   
                </div>
                </div>
                ';
        foreach($arregloTabla as $recurso)
        {
            // modal
            $b += 1;
            $html.='<div class="modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          </div>
          </div>';
        }
       
      return $html;
    }
    public function htmlTablaServicios($arregloTabla)
    {
      $a = 0;
      $b = 0;
      $c = 0;
      $html = '<div>
        <table class="table table-primary table-striped">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Titulo</th>
                <th scope="col">Imagen</th>
                <th scope="col">Link o enlace</th>
                <th scope="col">Acción</th>
              </tr>
            </thead>
            <tbody>';
        foreach($arregloTabla as $recurso)
        {
            $a += 1;
            $html .='<tr>
            <th scope="row">'.$recurso['id_servicios'].'</th>
            <td class="color-texto-tablas" ><p id="tituloServicio'.$recurso['id_servicios'].'">'.$recurso['titulo'].'</p></td>
            <td class="color-texto-tablas"><img src="'.url("/").'/'.$recurso['imagen'].'" style="width: 50%;"></td>
            <td class="color-texto-tablas" ><p id="textoServicio'.$recurso['id_servicios'].'">'.$recurso['texto'].'</p></td>
            <td style="width: 10rem;"><a href="/informacionmanorecursosapoyo" target="_blank">
            <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button></a> <a onclick="getServicioContenido('.$recurso['id_servicios'].')">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalEditarForm"><i class="fas fa-pencil-alt"></i></button></a> <a onclick="eliminarServicio('.$recurso['id_servicios'].')">
            <button type="button" class="btn btn-danger"><i class="fas fa-times"></i></button></a>
            </td>
        </tr>';
        }
        $html .='<tr>
                <th scope="row"></th>
                <td class="color-texto-tablas">¿Deseas agregar una nueva infografia?</td>
                <td class="color-texto-tablas"></td>
                <td class="color-texto-tablas"></td>
                <td><a onclick=""><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalNuevoForm" ><i class="fas fa-plus"></i></button></a>
                </td>
                </tr> 
                </tbody>
                </table>   
                </div>
                </div>
                ';
        foreach($arregloTabla as $recurso)
        {
            // modal
            $b += 1;
            $html.='<div class="modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          </div>
          </div>';
        }
       
      return $html;
    }
    public function htmlConferencias($arregloTabla)
    {
        $a = 0;
        $b = 0;
        $html = '<div>
        <table class="table table-primary table-striped">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Ejes temáticos</th>
                <th scope="col">Acción</th>
              </tr>
            </thead>
            <tbody>';
        
        foreach($arregloTabla as $recurso)
        {
            $a +=1;
            
            $html .='<tr>
            <th scope="row">'.$a.'</th>
            <td class="color-texto-tablas" >'.$recurso['conferenciascol'].' <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#cambiarTitulo'.$a.'">Cambiar nombre <i class="fas fa-pencil-alt"></i></button></td>
            <td style="width: 10rem;"><a href="/informacionmanoinfografia" target="_blank">
            <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button></a> <a >
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalEditarConferencia'.$recurso['id_conferencias'].'"><i class="fas fa-pencil-alt"></i></button></a> <a >
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#verificacionModal'.$recurso['id_conferencias'].'"><i class="fas fa-times"></i></button></a>
            </td>
        </tr>';
        }
        $html .= '<tr>
        <th scope="row"></th>
        <td class="color-texto-tablas">¿Deseas agregar un nuevo eje temático?</td>
        
        <td><a ><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#nuevaConferencia"><i class="fas fa-plus"></i></button></a>
        </td>
        </tr> 
                </tbody>
                </table>   
                </div>
                </div>
                ';
        foreach($arregloTabla as $recurso){
            $b += 1;
            $html .='
            <div class="modal fade" id="cambiarTitulo'.$b.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog ">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="">Cambio de titulo al eje tematico:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form id="formularioEdit"> 
                    <div class="mb-3">
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label" >Titulo:</label>
                        <input type="hidden" class="form-control" id="idInfoEdit'.$recurso['id_conferencias'].'" name="id" value="'.$recurso['id_conferencias'].'">
                        <input type="text" class="form-control" id="tituloEdit'.$recurso['id_conferencias'].'" name="nombreTitulo" value="'.$recurso['conferenciascol'].'">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <a onclick="cambiaTituloId('.$recurso['id_conferencias'].')">
                        <button  type="button" class="btn btn-primary" data-bs-dismiss="modal">Cambiar nombre</button>                        
                        </a>
                      </div>
                    </form>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="modal fade" id="verificacionModal'.$recurso['id_conferencias'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Advertencia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ¿Estas seguro que quieres eliminar el eje tematico?<br>
                Al hacerlo, perderas todo el contenido que tenga asignado.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a onclick="borrarConferencia('.$recurso['id_conferencias'].')">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Eliminar</button>
                </a>
              </div>
            </div>
          </div>
          </div>
          
                <div class="modal fade" id="modalEditarConferencia'.$recurso['id_conferencias'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Editar contenido conferencia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="mb-3">
                      <label for="tituloConferencias'.$recurso['id_conferencias'].'" class="col-form-label">Titulo:</label>
                      <input type="text" class="form-control" id="tituloConferencias'.$recurso['id_conferencias'].'" value="'.$recurso['titulo'].'">
                    </div>
                    <div class="mb-3">
                      <label for="enlaceConferencias'.$recurso['id_conferencias'].'" class="col-form-label">Video:</label>
                      <textarea rows=4 class="form-control" id="enlaceConferencias'.$recurso['id_conferencias'].'">'.$recurso['enlace'].'</textarea>
                      <div style="padding: 1rem 6.4rem;">
                      '.$recurso['enlace'].'
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="textoConferencias'.$recurso['id_conferencias'].'" class="col-form-label">Texto:</label>
                      <textarea rows=5 class="form-control" id="textoConferencias'.$recurso['id_conferencias'].'">'.$recurso['texto'].'</textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <a onclick="getContenidoConferencia('.$recurso['id_conferencias'].')">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Editar contenido conferencia</button>
                  </a>
                </div>
                </div>
            </div>
          </div>';
          
        }
        return $html;
    }
    public function htmlTablaConvocatorias($arregloTabla)
    {
        $a = 0;
        $b = 0;
        $html = '<div>
        <table class="table table-primary table-striped">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Elemento</th>
                <th scope="col">Acción</th>
              </tr>
            </thead>
            <tbody>';
        
        foreach($arregloTabla as $recurso)
        {
            $a +=1;
            
            $html .='<tr>
            <th scope="row">'.$a.'</th>
            <td class="color-texto-tablas" >'.$recurso['calendario'].' <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#cambiarTitulo'.$a.'">Cambiar nombre <i class="fas fa-pencil-alt"></i></button></td>
            <td style="width: 10rem;"><a href="/informacionmanoinfografia" target="_blank">
            <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button></a> <a onclick="cambiarConvocatoria('.$recurso['id_convocatorias'].')">
            <button type="button" class="btn btn-success" ><i class="fas fa-pencil-alt"></i></button></a> <a >
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#verificacionModal'.$recurso['id_convocatorias'].'"><i class="fas fa-times"></i></button></a>
            </td>
        </tr>';
        }
        $html .= '<tr>
        <th scope="row"></th>
        <td class="color-texto-tablas">¿Deseas agregar un nuevo elemento?</td>
        
        <td><a ><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#nuevoElemento"><i class="fas fa-plus"></i></button></a>
        </td>
        </tr> 
                </tbody>
                </table>   
                </div>
                </div>
                ';
        foreach($arregloTabla as $recurso){
            $b += 1;
            $html .='
            <div class="modal fade" id="cambiarTitulo'.$b.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog ">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="">Cambio de titulo al elemento:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form id="formularioEdit"> 
                    <div class="mb-3">
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label" >Titulo:</label>
                        <input type="hidden" class="form-control" id="idInfoEdit'.$recurso['id_convocatorias'].'" name="id" value="'.$recurso['id_convocatorias'].'">
                        <input type="text" class="form-control" id="tituloEdit'.$recurso['id_convocatorias'].'" name="nombreTitulo" value="'.$recurso['calendario'].'">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <a onclick="cambiaTituloId('.$recurso['id_convocatorias'].')">
                        <button  type="button" class="btn btn-primary" data-bs-dismiss="modal">Cambiar nombre</button>                        
                        </a>
                      </div>
                    </form>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="modal fade" id="verificacionModal'.$recurso['id_convocatorias'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Advertencia</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ¿Estas seguro que quieres eliminar el elemento?<br>
            Al hacerlo, perderas todo el contenido que tenga asignado.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a onclick="borrarElemento('.$recurso['id_convocatorias'].')">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Eliminar</button>
            </a>
          </div>
        </div>
      </div>
      </div>';
        }
        return $html;
    }
    public function htmlTablaConvocatoriasCRUD($arregloTabla,$id)
    {
        $a = 0;
        $b = 0;
        $c = 0;
        $html = '<div>
        <table class="table table-primary table-striped">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Nombre</th>
                <th scope="col">Siglas</th>
                <th scope="col">Convocatoria</th>
                <th scope="col">Enlace</th>
                <th scope="col">Acción</th>
              </tr>
            </thead>
            <tbody>';
        foreach($arregloTabla as $recurso)
        {
            $a += 1;
            $html .='<tr>
            <th scope="row">'.$a.'</th>
            <td class="color-texto-tablas"><p id="NombreEscuela'.$recurso['id_convocatorias_tablas'].'">'.$recurso['nombre'].'</p></td>
            <td class="color-texto-tablas"><p id="Siglas'.$recurso['id_convocatorias_tablas'].'">'.$recurso['siglas'].'</p></td>
            <td class="color-texto-tablas"><p id="convocatoria'.$recurso['id_convocatorias_tablas'].'">'.$recurso['convocatoria'].'</p></td>
            <td class="color-texto-tablas"><p id="enlace'.$recurso['id_convocatorias_tablas'].'">'.$recurso['enlace'].'</p></td>
            <td style="width: 10rem;"><a href="/informacionmanoinfografia" target="_blank">
            <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button></a> <a onclick="getConvocatoriaFormulario('.$recurso['id_convocatorias'].','.$recurso['id_convocatorias_tablas'].')">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editarConvocatoria"><i class="fas fa-pencil-alt"></i></button></a> <a >
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#verificacionModal'.$recurso['id_convocatorias_tablas'].'"><i class="fas fa-times" ></i></button></a>
            </td>
        </tr>';
        }
        $html .='<tr>
                <th scope="row"></th>
                <td class="color-texto-tablas">¿Deseas agregar una nueva infografia?</td>
                <td class="color-texto-tablas"></td>
                <td class="color-texto-tablas"></td>
                <td class="color-texto-tablas"></td>
                <td><a onclick="getConvocatoriaId('.$recurso['id_convocatorias'].')"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#nuevaConvocatoria" ><i class="fas fa-plus"></i></button></a>
                </td>
                </tr> 
                </tbody>
                </table>   
                </div>
                </div>
                ';
        foreach($arregloTabla as $recurso)
        {
            // modal
            $b += 1;
            $html.='<div class="modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          </div>
          </div>
          <div class="modal fade" id="verificacionModal'.$recurso['id_convocatorias_tablas'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Advertencia</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ¿Estas seguro que quieres eliminar el eje tematico?<br>
            Al hacerlo, perderas todo el contenido que tenga asignado.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a onclick="borrarConvocatoriaElemento('.$recurso['id_convocatorias_tablas'].','.$recurso['id_convocatorias'].')">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Eliminar</button>
            </a>
          </div>
        </div>
      </div>
      </div>';
        }
       
        return $html;
    }
}


    