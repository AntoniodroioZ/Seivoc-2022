<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MenuController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\Grafica2Controller;
use App\Http\Controllers\MiFamiliadeCarrerasController;

use App\Http\Controllers\CuestionarioController;
use App\Http\Controllers\AlumnoOrientadorController;
use App\Http\Controllers\FlujoExplorarIController;
use App\Http\Controllers\PrincipalController;

use App\Http\Controllers\CRUDEPAOVController;
use App\Http\Controllers\familiaCarreraController;
use App\Http\Controllers\MetaController;


Route::get('/', [MenuController::class, 'index']);
Route::get('/about', [MenuController::class, 'about']);
Route::get('/guia', [MenuController::class, 'guia']);
Route::get('/info', [MenuController::class, 'infmano']);
Route::get('/explora', [MenuController::class, 'explora']);
Route::get('/construyendo', [MenuController::class, 'construyendo']);
//Route::get('/login', [MenuController::class, 'login']);
/*Route::get('/login', [MenuController::class, 'login'])
            ->middleware(['guest:'.config('fortify.guard')])
            ->name('login');
*/
Route::get('/verificacion/{ID_usuario}/{Hash}', [RegistroController::class, 'VerifyAlumno']);
Route::post('/SavUsuaio', [RegistroController::class, 'RegistroUsuario'])->name('SavUsuaio');

// Routes información a la mano
Route::get('/informacionmano', [MenuController::class, 'informacionmano']);
Route::get('/informacionmanoinfografia', [MenuController::class, 'informacionmanoinfografia']);
Route::get('/informacionmanoconvocatorias', [MenuController::class, 'informacionmanoconvocatorias']);
Route::get('/informacionmanoconferencias', [MenuController::class, 'informacionmanoconferencias']);
Route::get('/informacionmanorecursosapoyo', [MenuController::class, 'informacionmanorecursosapoyo']);
Route::get('/informacionmanoserviciosorient', [MenuController::class, 'informacionmanoserviciosorient']);
/*********************************Segundo Registro**********************************/
Route::get('/Formacion', [FlujoExplorarIController::class, 'IndexRegistro']);
Route::post('/getDelegacion', [AlumnoOrientadorController::class, 'getDelegacion']);
Route::post('/getPlantel', [AlumnoOrientadorController::class, 'getPlantel']);
Route::post('/getEscuela', [AlumnoOrientadorController::class, 'getEscuela']);
Route::post('/getModalidad', [AlumnoOrientadorController::class, 'getModalidad']);
Route::post('/getAnio', [AlumnoOrientadorController::class, 'getAnio']);
Route::post('/SavAlumnoOriuentador', [AlumnoOrientadorController::class, 'SavAlumnoOriuentador'])->name('SavAlumnoOriuentador');
/**********************************URL Generico****************************************/
Route::get('/FlujoPrincipal',[FlujoExplorarIController::class,'FlujoPrincipal'])->name('FlujoPrincipal');
/**********************************URL Principal***************************************/
Route::get('/Principal', [PrincipalController::class, 'Principal'])->name('Principal');
/*************************************************************************************/

//Cuestionario de intereses 
Route::get('/cuestionario', [FlujoExplorarIController::class, 'Indexcuestionario']);
Route::post('/EnvioPregunta', [CuestionarioController::class, 'GuardarPregunta']);
Route::get('/instruccionesCuestionario', [FlujoExplorarIController::class, 'instruccionesCuestionario']);
// Routes Mi familia de carreras
Route::get('/MiFamiliadeCarrera', [MiFamiliadeCarrerasController::class, 'intro']);

Route::get('/MiFamiliadeCarrera/HomeR', [MiFamiliadeCarrerasController::class, 'ruta']);
#Route::get('/MiFamiliadeCarrera/Video1', [MiFamiliadeCarrerasController::class, 'video1']);
#Route::get('/MiFamiliadeCarrera/Menu', [MiFamiliadeCarrerasController::class, 'menu']);

Route::get('/MiFamiliadeCarrera/Modulo1', [MiFamiliadeCarrerasController::class, 'modulo1']);
Route::get('/MiFamiliadeCarrera/Modulo2/{id}', [MiFamiliadeCarrerasController::class, 'modulo2']);
Route::get('/MiFamiliadeCarrera/Modulo3/{id}', [MiFamiliadeCarrerasController::class, 'modulo3']);
Route::get('/MiFamiliadeCarrera/Modulo4/{id}', [MiFamiliadeCarrerasController::class, 'modulo4']);
Route::get('/MiFamiliadeCarrera/status', [MiFamiliadeCarrerasController::class, 'CambiarStatus']);
Route::get('/MiFamiliadeCarrera/statusAjax', [MiFamiliadeCarrerasController::class, 'CambiarStatusAjax']);



// Routes guia interactiva
Route::get('/guiaInteractiva',[MenuController::class, 'guiaInteractiva']);
Route::get('/queTanDificilSera',[MenuController::class, 'queTanDificilSera']);
Route::get('/aQueFamiliaPerteneceras',[MenuController::class, 'aQueFamiliaPerteneceras']);
Route::get('/dondeEstaras',[MenuController::class, 'dondeEstaras']);
Route::get('/dondeEstaras/CDMX',[MenuController::class, 'dondeEstarasCDMX']);
Route::get('/dondeEstaras/foraneas',[MenuController::class, 'dondeEstarasForaneas']);
Route::get('/dondeEstaras/CU',[MenuController::class, 'dondeEstarasCU']);
Route::get('/debesSaber',[MenuController::class, 'debesSaber']);

// Modulo de administrador
Route::get('/moduloadmin', [Grafica2Controller::class, 'index'])->name('Grafica');

Route::post('/GetDatosGraficar', [Grafica2Controller::class, 'Clasificacion_Graficos_Mostrar']);
Route::get('/GetDatosGraficarget', [Grafica2Controller::class, 'Clasificacion_Graficos_Mostrar']);
Route::post('/GetDatosGraficarS', [Grafica2Controller::class, 'Grafico_Sexo']);
Route::post('/GetDatosGraficarD', [Grafica2Controller::class, 'Grafico_Edad']);

Route::get('/GetModalidad',[Grafica2Controller::class, 'GetModalidad']);
Route::post('/GetFiltroShow',[Grafica2Controller::class, 'GetFiltroShow']);
Route::post('/GetEscuela',[Grafica2Controller::class, 'GetEscuela']);
Route::post('/GetPlantel',[Grafica2Controller::class, 'GetPlantel']);
Route::post('/GetUsuariosNumeracion',[Grafica2Controller::class, 'GetUsuariosNumeracion']);

// EPAOV ADMIN
Route::get('/moduloadminEPAOV',[CRUDEPAOVController::class, 'moduloadminEPAOV']);
Route::get('/moduloadminEPAOV/infografias',[CRUDEPAOVController::class, 'EPAOVInfoMano'])->name('infografias');
Route::get('/moduloadminEPAOV/convocatorias',[CRUDEPAOVController::class, 'EPAOVConvocatorias']);
Route::get('/moduloadminEPAOV/conferencias',[CRUDEPAOVController::class, 'EPAOVConferencias']);
Route::get('/moduloadminEPAOV/recursosapoyo',[CRUDEPAOVController::class, 'EPAOVRecursosApoyo']);
Route::get('/moduloadminEPAOV/servicios',[CRUDEPAOVController::class, 'EPAOVServicios']);



// Test
Route::get('/GetUsuariosNumeracionget',[Grafica2Controller::class, 'GetUsuariosNumeracion']);
Route::get('/formularioFamCarreras',[familiaCarreraController::class, 'vistaFamiliaCarrera']);
Route::get('/MiFamiliadeCarrera/redireccionamientoFormulario', [MiFamiliadeCarrerasController::class, 'redireccionamientoFormulario']);

Route::get('/appMobileAndroid', [MenuController::class, 'appMobileAndroid']);
// Route::post('/cargarDatosFormulario',[familiaCarreraController::class, 'cargarDatosFormulario']);

Route::get('/test',[RegistroController::class,'testPass']);

Route::get('metadata/export/', [MetaController::class, 'export']);

Route::get('/forgotPassword', [RegistroController::class, 'forgotPassword']);
Route::post('/sendEmailResetPassword', [RegistroController::class, 'sendEmailResetPassword'])->name('sendResetEmail');
Route::get('/resetPasswordView/{ID_usuario}/{Hash}', [RegistroController::class, 'resetPasswordView']);
Route::post('/resetPass', [RegistroController::class, 'resetPassword'])->name('resetPass');

Route::get('/videoFamilia3_4', [MiFamiliadeCarrerasController::class, 'videoModulo3_4']);
/*Excel*/ 
// Route::post('/GetExcel','ExportExcelController@GetUsuarios');
/*Prueba*/
// Route::post('/GetDatosGraficar', 'Grafica2Controller@Clasificacion_Graficos_Mostrar');
// Route::post('/GetDatosGraficarS', 'Grafica2Controller@Grafico_Sexo');
// Route::post('/GetDatosGraficarD', 'Grafica2Controller@Grafico_Edad');

/**********************Fin del Modulo de administrador******************************/
 //Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [MenuController::class, 'index'])->name('dashboard');


/***************************META-Datos******************************/


