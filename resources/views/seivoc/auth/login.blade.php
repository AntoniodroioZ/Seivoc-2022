@extends('seivoc.nav')

@section('content')
<br><br><br><br><br><br>

<div class="container " >
      <div class="row" >
        <div class="col-md-6 offset-md-3" >
          <div class="card shadow-sm " style=" border-radius:  50px; ">
             

        
            <div class="card-body">
                
              <div class="container">
                <div class="row" >
                  <div class="col-md-12 ">
                    <h2 style="text-align: center;color:#2f2e65";>Iniciar Sesi&oacute;n </h2>                  
                  </div>
                </div>
                <div class="row" >
                  <div class="col-md-12">
                    <br>
                    <div class="row row-conteent justify-content-md-center ">
                      <a    style="width: 50%" >
                      <img  style=" width: 100%" src="images\login\logotipo.png">
                      </a> 
                    </div>
                  </div> 
                </div>
                <br>
              <x-jet-validation-errors class="mb-4" />
              @if (isset($Error))
          <div class="alert alert-danger" role="alert">
            {{ $Error }}
          </div>
        @endif
        
        @if (isset($text))
          <div class="alert alert-success" role="alert">
            {{ $text }}
          </div>
        @endif
        
                <br>
              <form method="POST" action="{{ route('login') }}">
            @csrf

            <div style="display: flex;align-items: center; justify-content: center;">
                <x-jet-input id="email" class="block  w-full" type="email" name="email" :value="old('email')" required autofocus  placeholder="Correo Electr&oacute;nico"/>
            </div>

            <div class="mt-4" style="display: flex;align-items: center; justify-content: center;">
                <x-jet-input id="password" class="block  w-full" type="password" name="password" required autocomplete="current-password" placeholder="Password"/>
            </div>

<br>
            
            <div class="ml-4" style="display: flex;align-items: center; justify-content: center;">
                <x-jet-button lass="btn btn-outline-light" class=" btn-primary">
                    Iniciar sesión
                    {{-- <img   src="images\registro\registro.png"> --}}
                </x-jet-button>
            </div>
            {{-- <div  style="display: flex;align-items: center; justify-content: center;">
              <a href="/forgotPassword" class="btn btn-warning">Olvide mi contraseña</a>
            </div> --}}
        </form>
        <br>
        <div  style="display: flex;align-items: center; justify-content: center;">
          <a href="/forgotPassword" class="btn btn-warning">Olvide mi contraseña</a>
        </div>
        
              </div>
            </div>
        
          </div>
        </div>
      </div>
    </div>
    <img style="position: relative; top: -560px; left: 780px;" src="images\login\grafico_1.png"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection