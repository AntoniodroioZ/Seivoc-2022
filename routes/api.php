<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\ResourcesEpaov;
use App\Http\Controllers\MiFamiliadeCarrerasController;
use App\Http\Controllers\familiaCarreraController;
use App\Http\Controllers\GuiaInteractivaController;
use App\Http\Controllers\AndroidAppController;

use App\Http\Controllers\MetaController;

use App\Http\Controllers\CRUDEPAOVController;

use App\Http\Controllers\PrincipalController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/test',[ResourcesEpaov::class,'resource_recursos_apoyo']);
// Recursos EPAOV para la vista, mediante API's
Route::post('/resource_recursos_apoyo', [ResourcesEpaov::class,'resource_recursos_apoyo']);
Route::post('/resource_servicios', [ResourcesEpaov::class,'resource_servicios']);
Route::post('/resource_conferencias_titulos', [ResourcesEpaov::class,'resource_conferencias_titulos']);
Route::post('/resource_conferencias_contenidos/{id}', [ResourcesEpaov::class,'resource_conferencias_contenidos']);
Route::post('/resource_infografias_et', [ResourcesEpaov::class,'resource_infografias_et']);
Route::post('/resource_tema_i', [ResourcesEpaov::class,'resource_tema_i']);
Route::post('/resource_convocatorias', [ResourcesEpaov::class,'resource_convocatorias']);
Route::post('/resource_convocatorias_tabla/{id}', [ResourcesEpaov::class,'resource_convocatorias_tabla']);

// Routes Mi familia de carreras
Route::post('MiFamiliadeCarrera/getModulosRecursos', [MiFamiliadeCarrerasController::class,'getRecusos_Mifamilia']);
Route::post('MiFamiliadeCarrera/getModulo2', [MiFamiliadeCarrerasController::class,'getModulo2']);
Route::post('validar_respuestas_modulo1', [MiFamiliadeCarrerasController::class,'validar_modulo1']);


// Guia interactiva
Route::post('/nombresCarrerasGI',[GuiaInteractivaController::class,'nombresCarrerasGI']);
Route::post('/descripcionesCarreras',[GuiaInteractivaController::class,'descripcionesCarreras']);
Route::post('/datosCarreras',[GuiaInteractivaController::class,'datosCarreras']);
Route::post('/descripcionArea',[GuiaInteractivaController::class,'descripcionArea']);
Route::post('/carrerasAreas',[GuiaInteractivaController::class,'carrerasAreas']);
Route::post('/nuevasCarreras',[GuiaInteractivaController::class,'nuevasCarreras']);
Route::post('/ingresoIndirectoCarreras',[GuiaInteractivaController::class,'ingresoIndirectoCarreras']);
Route::post('/ingresoDirectoCarreras',[GuiaInteractivaController::class,'ingresoDirectoCarreras']);
Route::post('/prerrequisitosCarreras',[GuiaInteractivaController::class,'prerrequisitosCarreras']);
Route::post('/obtenerModalidades',[GuiaInteractivaController::class,'obtenerModalidades']);
Route::post('/obtenerCarrerasModalidades',[GuiaInteractivaController::class,'obtenerCarrerasModalidades']);
Route::post('/ObtenerDescripciones',[GuiaInteractivaController::class,'ObtenerDescripciones']);
Route::post('/obtenerDatosFacultades',[GuiaInteractivaController::class,'obtenerDatosFacultades']);

Route::post('/descripcionCarreraDebes',[GuiaInteractivaController::class,'descripcionCarreraDebes']);

/***************************META-Datos******************************/
//Route::post('/meta_info_usuario', [MetaController::class,'MetaInfoUsuario']);
Route::post('/meta_info_usuario/{id}/{Ref}', [MetaController::class,'MetaInfoUsuario']);
//Definir rangos de identificadores 
Route::post('/meta_info_candidato', [MetaController::class,'MetaInfoCandidato']);

// Recursos EPAOV para los CRUD
Route::post('/CRUD_infografias_et', [CRUDEPAOVController::class,'CRUD_infografias_et']);
Route::post('/CRUD_tema_i', [CRUDEPAOVController::class,'CRUD_tema_i']);
Route::post('/CRUD_recursos_apoyo', [CRUDEPAOVController::class,'CRUD_recursos_apoyo']);
Route::post('/CRUD_servicios', [CRUDEPAOVController::class,'CRUD_servicios']);
Route::post('/CRUD_conferencias', [CRUDEPAOVController::class,'CRUD_conferencias']);
Route::post('/CRUD_convocatorias', [CRUDEPAOVController::class,'CRUD_convocatorias']);
Route::post('/CRUD_Convocatorias_contenido', [CRUDEPAOVController::class,'CRUD_Convocatorias_contenido']);

Route::post('/nuevoEje/{nombreTitulo}', [CRUDEPAOVController::class,'nuevoEje'])->name('nuevoEje');
Route::post('/eliminar/{id}', [CRUDEPAOVController::class,'borrarEje'])->name('borrarEje');
Route::post('/cambiarEje', [CRUDEPAOVController::class,'cambiarEje'])->name('cambiarEje');

Route::post('/subir',[CRUDEPAOVController::class, 'subirInfografia'])->name('subir');
Route::post('/eliminarInfografia/{id}',[CRUDEPAOVController::class, 'eliminarInfografia'])->name('eliminarInfografia');
Route::post('/editarInfografia',[CRUDEPAOVController::class, 'editarInfografia'])->name('editarInfografia');

Route::post('/cambiarElemento', [CRUDEPAOVController::class,'cambiarElemento'])->name('cambiarElemento');
Route::post('/nuevoElemento/{nombreTitulo}', [CRUDEPAOVController::class,'nuevoElemento'])->name('nuevoElemento');
Route::post('/borrarElemento/{id}',[CRUDEPAOVController::class, 'borrarElemento'])->name('borrarElemento');

Route::post('/cambiarConvocatoriaContenido', [CRUDEPAOVController::class,'cambiarConvocatoriaContenido'])->name('cambiarConvocatoriaContenido');
Route::post('/nuevaConvocatoriaContenido', [CRUDEPAOVController::class,'nuevaConvocatoriaContenido'])->name('nuevaConvocatoriaContenido');
Route::post('/borrarContenidoConvocatoria/{id}', [CRUDEPAOVController::class,'borrarContenidoConvocatoria'])->name('borrarContenidoConvocatoria');

Route::post('/obtenerColores', [CRUDEPAOVController::class,'obtenerColores'])->name('obtenerColores');
Route::post('/obtenerColoresEdit', [CRUDEPAOVController::class,'obtenerColoresEdit'])->name('obtenerColoresEdit');
Route::post('/obtenerColoresNuevo', [CRUDEPAOVController::class,'obtenerColoresNuevo'])->name('obtenerColoresNuevo');

Route::post('/nuevaConferencia/{nombreTitulo}', [CRUDEPAOVController::class,'nuevaConferencia'])->name('nuevaConferencia');
Route::post('/cambiarConferencias', [CRUDEPAOVController::class,'cambiarConferencias'])->name('cambiarConferencias');
Route::post('/borrarConferencia/{id}', [CRUDEPAOVController::class,'borrarConferencia'])->name('borrarConferencia');
Route::post('/cambiarContenidoConferencia', [CRUDEPAOVController::class,'cambiarContenidoConferencia'])->name('cambiarContenidoConferencia');

Route::post('/subirRecurso',[CRUDEPAOVController::class, 'subirRecurso'])->name('subirRecurso');
Route::post('/eliminarRecurso/{id}',[CRUDEPAOVController::class, 'eliminarRecurso'])->name('eliminarRecurso');
Route::post('/editarRecurso',[CRUDEPAOVController::class, 'editarRecurso'])->name('editarRecurso');

Route::post('/subirServicio',[CRUDEPAOVController::class, 'subirServicio'])->name('subirServicio');
Route::post('/eliminarServicio/{id}',[CRUDEPAOVController::class, 'eliminarServicio'])->name('eliminarServicio');
Route::post('/editarServicio',[CRUDEPAOVController::class, 'editarServicio'])->name('editarServicio');

// Route::post('/test',[CRUDEPAOVController::class, 'test'])->name('test');
Route::get('/cargarDatosFormulario',[familiaCarreraController::class, 'cargarDatosFormulario']);






// android app
Route::get('/login/appSeivoc',[AndroidAppController::class, 'appSeivoc']);
// Route::get('/login/GetSituacion/{id}',[AndroidAppController::class, 'GetSituacion']);
Route::get('/Respuesta/{id}',[PrincipalController::class, 'respuestaApp']);

