<?php

namespace App\Http\Controllers;
use App\Exports\MetaDataExport;

use Illuminate\Http\Request;
use App\Models\metainfo;
use App\Models\metainfoU;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
class MetaController extends Controller
{
    //
    //public function MetaInfoUsuario(Request $request)
    public function MetaInfoUsuario($id,$Ref)
    {
    	//Generando la METADATA
    	$tiempo=new DateTime();
    	$tiempo->modify('-3 second');
    	//Al revez
      //$request->input('id')=$id;
     //$request->input('Ref')=$Ref;
    	//dd(Auth::user()->id);
    	//Seguridad para no generar mas metadata de la que hay 
    	//hay que actualizar la funcion por que tenemos que saber si es el ultimo registro y con que referencia y delimitar el tiempo 
    	//ya que solo estamos delimitando por tiempo 
    	$Meta =metainfoU::where('usuario_id','=',$id)
    		->where('fecha','>',$tiempo->format('Y-m-d H:m:s'))
    		->orderby('fecha','DESC')
    		->get();
    	
    	/*!metainfoU::where('usuario_id','=',$request->input('id'))->where('fecha','>',$tiempoAtras->format('Y-m-d H:m:s'))->where('fecha','>',$tiempoDelante->format('Y-m-d H:m:s'))->where('referencia','=',$request->input('Ref'))->exists()*/
    	if(metainfoU::where('usuario_id','=',$id)
    		->where('fecha','>',$tiempo->format('Y-m-d H:m:s'))
    		->orderby('fecha','ASC')->exists()) {
    		if($Meta[0]->referencia!=$Ref){
		    	$tiempo->modify('+3 second');
		    	$Usea= new metainfoU(array('usuario_id' => $id,'referencia'=>$Ref,'fecha' =>$tiempo->format('Y-m-d H:m:s')));
		    	$Usea->save();
	    	}
    	}else{
    		$tiempo->modify('+3 second');
    		$Usea= new metainfoU(array('usuario_id' => $id,'referencia'=> $Ref,'fecha' =>$tiempo->format('Y-m-d H:m:s')));
		    	$Usea->save();
    	}
    	
    	
    }
    public function MetaInfoCandidato(Request $request)
    {
    	$tiempo=new DateTime();
    	/*Definir  rangos 
    		  con if
    	  Para actualizar 
    	    los numeros 
    	*/ 
    }

	public function export(){
		return Excel::download(new MetaDataExport, 'metadata-info.xlsx');
	}
}
