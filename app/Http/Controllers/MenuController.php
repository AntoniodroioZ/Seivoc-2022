<?php

namespace App\Http\Controllers;

use App\Models\carreras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MenuController extends Controller
{

    public function index()
    {
      
      /*if(Auth::user()!=null){
          if(Auth::user()->email_verified_at == null){
            Auth::logout();
            $Error='Verifica tu email';
            return view('seivoc.auth.login',compact('Error'));
          }else{
            return view('index');
          } 
      }*/
        return view('index');
    }
    
    public function login()
    {
        return view('seivoc.auth.login');
    }
    public function registro()
    {
        return view('seivoc.auth.register');
    }

    public function about()
    {
        return view('about');
    }

    public function guia()
    {
        return view('guia');
    }

    public function infmano()
    {
        return view('info');
    }

    public function explora()
    {
        return view('explora');
    }

    public function construyendo()
    {
        return view('construyendo');
    }

    public function informacionmano()
    {
        return view('seivoc.informacionmano');
    }

    public function informacionmanoinfografia()
    {
        $view = 1;

        return view('seivoc.informacionmanoinfografia', compact('view'));
    }

    public function informacionmanoconvocatorias()
    {
        $view = 2;

        return view('seivoc.informacionmanoinfografia', compact('view'));
    }

    public function informacionmanoconferencias()
    {
        $view = 3;

        return view('seivoc.informacionmanoinfografia', compact('view'));
    }

    public function informacionmanorecursosapoyo()
    {
        $view = 4;

        return view('seivoc.informacionmanoinfografia', compact('view'));
    }

    public function informacionmanoserviciosorient()
    {
        $view = 5;

        return view('seivoc.informacionmanoinfografia', compact('view'));
    }


    public function guiaInteractiva()
    {
        return view('seivoc.guiaInteractiva');
    }

    public function queTanDificilSera()
    {
        $recursosCarreras=carreras::orderBy('nombre_carrera')->get();
        return view('seivoc.queTanDificilSera', compact('recursosCarreras'));
    }
        
    public function aQueFamiliaPerteneceras()
    {
        return view('seivoc.aQueFamilia');
    }

    public function dondeEstaras()
    {
        return view('seivoc.dondeEstaras');
    }
    public function dondeEstarasCDMX()
    {
        return view('seivoc.dondeEstarasCDMX');
    }
    public function dondeEstarasForaneas()
    {
        return view('seivoc.dondeEstarasForaneas');
    }
    public function dondeEstarasCU()
    {
        return view('seivoc.dondeEstarasCU');
    }

    public function debesSaber()
    {
        return view('seivoc.debesSaber');
    }

    public function appMobileAndroid()
    {
        return view('appMobileAndroid');
    }
}