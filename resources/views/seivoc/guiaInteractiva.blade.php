<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.80.0">
  <title>SEIVOC New Beginning</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{ asset('/dist/css/bootstrap.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('/css/bootstrap-extension.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('/css/navar.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('/css/guiaInteractiva.css') }}" type="text/css">

</head>
<body style="background-image:  url('{{ asset('images/background.png') }}');background-repeat: no-repeat;background-attachment: fixed;background-size: 130%;">

  <header>
    <div class="pleca-superior">     
      <a href="">
        <img  src="{{ asset('images/Logo.png') }}" width="8%" style="margin-left: 5%;">   
      </a>
      {{-- <input type="image" name="botondeenvio" src="{{ asset('images/Logo.png') }}" > --}}
          @guest
          <a width="8%" style="margin-left: 70%; color: white; font-weight: bold;" href="{{ url('/registro') }}">Registro</a>
          <a  width="8%" style=" color: white;" >/</a>
          <a  width="8%" style=" color: white; font-weight: bold;" href="{{ url('/login') }}">Iniciar Sesión</a>
          <p id="mdseivoc" hidden></p>
        @else   
          <a width="8%" style="margin-left: 70%; color: white;">
          Hola,&nbsp;&nbsp;
          <strong>{{ Auth::user()->alias }}</strong><p id="mdseivoc" hidden>{{ Auth::user()->usuario_id }}</p></a>
          <a  style=" color: white;">
          /</a>
  
  
          <a  style=" color: white;" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Cerrar Sesión') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>  
        @endguest
      </div>
      <div>  
        <div class="navbar justify-content-md-center">
          <p class="titulo-guia">Guia Interactiva</p> 
        </div>
        <div  class=" navbar justify-content-md-center" style="background-color: transparent; padding: 0px;">
          <div>
            <a  class="rounded-circle">
              <div>
                <img class="img-circle"src="{{ asset('/images/guia_interactiva/icono-guia.png') }}" width="100%" style="border-radius: 50%">
              </div>
            </a>
          </div>
        </div>
    </div>
  </header>
  {{-- <main style="background-color: transparent;" > --}}

    {{-- Conoce alguna de las características de la oferta educativa de la UNAM, la ubicación de sus Escuelas y Facultades y el desempeño necesario para ingresar a ellas.
 --}}
    <div class="centrar-item">
      <div class="text-center caja-recordatorio" style="">
        <p class="texto-caja-recordatorio texto-caja-recordatorio2">Conoce alguna de las características de la oferta educativa de la UNAM, la ubicación de sus Escuelas y Facultades y el desempeño necesario para ingresar a ellas.</p>
        {{-- <p class="texto-caja-recordatorio">&</p>
        <p class="texto-caja-recordatorio">Los aciertos aplican para el Concurso de Selección 2022</p> --}}
      </div>
    </div>
    {{-- <br> --}}
    <div class="container centrar-menu">
      <div>
        <a class="border-menu MetaDataJCSeivoc" ReferenciaMetaSEIVOC="11" href="/queTanDificilSera">
          <input style="padding: 4rem 6rem;" class="" type="image" name="botondeenvio" src="{{ asset('/images/guia_interactiva/boton-1.png') }}"  >
          {{-- <img src="{{ asset('/images/guia_interactiva/boton-1.png') }}" alt=""> --}}
        </a>
        <a class="border-menu MetaDataJCSeivoc" ReferenciaMetaSEIVOC="12" href="/debesSaber">
          {{-- <img src="{{ asset('/images/guia_interactiva/boton-3.png') }}" alt=""> --}}
          <input style="padding: 3.75rem 6rem;" class="" type="image" name="botondeenvio" src="{{ asset('/images/guia_interactiva/boton-3.png') }}"  >
        </a>
      </div>
      <div>

        <a class="border-menu MetaDataJCSeivoc" ReferenciaMetaSEIVOC="13" href="/aQueFamiliaPerteneceras">
          <input style="padding: 3.75rem 4.8rem;" class="" type="image" name="botondeenvio" src="{{ asset('/images/guia_interactiva/boton-2.png') }}"  >
        </a>
        <a class="border-menu MetaDataJCSeivoc" ReferenciaMetaSEIVOC="14" href="/dondeEstaras">
          <input style="padding: 3.4rem 5.8rem;" class="" type="image" name="botondeenvio" src="{{ asset('/images/guia_interactiva/boton-4.png') }}"  >
        </a>
      </div>
    </div>
    <div class="brujula centrar-menu">
      <a href="/" class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="0">
        <img src="{{ asset('/images/guia_interactiva/brujula1.gif') }}" alt="">
      </a>
    </div>
    {{-- zona de contenido box --}}
    {{-- <div >
      <div class="container "  >
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-1" >
            <div class="col" >
              <div class="card shadow-sm " style="  border-radius:  50px; ">
  
                <h5 class="card-title" width="100%" height="225" style="background-color: #2f2e65; border-top-left-radius:  50px; border-top-right-radius:  50px;">
  
                  <div class="row justify-content-between">
                    <div class="col-1 offset-md-1">
                      <button id="MenuIzquierdo" type="button" class="btn bg-light text-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
                        </svg>
  
                      </button>
                    </div>
  
                  </div>
                </h5>
            </div>

        </div>
      </div>
    </div>
        
    </div> --}}

    {{-- </main> --}}
    {{-- <br><br><br><br>
    <footer class="py-5" style="opacity: 1;background-color: rgb(6,37,91);color: rgb(6,37,91);filter: brightness(100%) contrast(100%);">
      <div class="container">
        <p class="text-center text-white m-0 small" style="font-size: 75%;"><br>Hecho en México, todos los derechos reservados 2020. Esta pagína puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su dirección electrónica. De otra forma requiere permiso previo
          por escrito de la institución.<br><br></p>
          <p class="text-center text-warning m-0 small" style="font-size: 75%;">Trabajo realizado con el apoyo del Programa UNAM - DGAPA-PAPIME 302516, 303017, 303118, 301119,v 300320 Sitio web administrado por:<br>Departamento de Orientación Especializada&nbsp;<a href="mailto:vocacionenlineaunam@unam.mx">vocacionenlineaunam@unam.mx</a><br><br></p>
          <div class="text-center">
            <img src="{{ asset('images/imgUnam.png') }}" style="width: 15%;">
            <img style="width: 2%;"><img src="{{ asset('images/imgDGOAE.png') }}" style="width: 18%;">
            <img style="width: 2%;"><img src="{{ asset('images/imgDGAPA.png') }}" style="width: 8%;">
          </div>
        </div>
      </footer> --}}
      {{-- menu de navegacion epaov --}}
      {{-- <div  id="MenuPrin1" class="position-fixed  text-center col-3 col-sm-1 col-md-1 col-lg-1 col-xl-1 " style="background-color: #2f2e65;position: relative; top: 140px; left: 40px; opacity: 0.5;" >
      <br>
      <a>
        <input type="image" name="botondeenvio" src="{{ asset('images/boton1-a.png') }}" alt="Home"  width="100%">
      </a>
      <br>
      <a>
        <input type="image" name="botondeenvio" src="{{ asset('images/boton2-a.png') }}" alt="Home"  width="100%">
      </a>
      <br>
      <a>
        <input type="image" name="botondeenvio" src="{{ asset('images/boton3-a.png') }}" alt="Home"  width="100%">
      </a>
      <br>
      <a>
        <input type="image" name="botondeenvio" src="{{ asset('images/boton4-a.png') }}" alt="Home"  width="100%">
      </a>
      <br>
      <a>
        <input type="image" name="botondeenvio" src="{{ asset('images/boton5-a.png') }}" alt="Home"  width="100%">
      </a>
    </div>
    <div id="MenuPrin2" class="position-fixed  text-center  col-3 col-sm-1 col-md-1 col-lg-1 col-xl-1 " style="position: relative; top: 140px; left: 40px; " >
      <br>
      <a>
        <input type="image" name="botondeenvio" src="{{ asset('images/boton1-a.png') }}" alt="Home"  onclick="location.href ='{{url('/')}}';" width="100%">
      </a>
      <br>
      <a>
        <input type="image" name="botondeenvio" src="{{ asset('images/boton2-a.png') }}" alt="Home"   onclick="location.href ='{{url('/guia')}}';" width="100%">
      </a>
      <br>
      <a>
        <input type="image" name="botondeenvio" src="{{ asset('images/boton3-a.png') }}" alt="Home" onclick="location.href ='{{url('/info')}}';" width="100%">
      </a>
      <br>
      <a>
        <input type="image" name="botondeenvio" src="{{ asset('images/boton4-a.png') }}" alt="Home" onclick="location.href ='{{url('/explora')}}';" width="100%">
      </a>
      <br>
      <a>
        <input type="image" name="botondeenvio" src="{{ asset('images/boton5-a.png') }}" alt="Home" onclick="location.href ='{{url('/construyendo')}}';" width="100%">
      </a>
    </div> --}}

    <script src="{{ asset('/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#MenuIzquierdo").click(function(){
          if ($('#MenuPrin1').is(':hidden')){
            $('#MenuPrin1').show(100);
            $('#MenuPrin2').show(100);
          }else{
            $('#MenuPrin1').hide(100);
            $('#MenuPrin2').hide(100);
          }
        });

      });
    </script>
    {{-- <script type="text/javascript">
      $(document).ready(function(){  
        $(".MetaDataJCSeivoc").click(function(){
          // evitamos la acción por defecto
          //e.preventDefault();
          // Aja scritp 
          $.ajax({
              type: "POST",
              data: {
                "_token": $("meta[name='csrf-token']").attr("content"),
                @guest
                @else 
                "id":{{ Auth::user()->usuario_id }},
                @endguest
                "Ref": $(this).attr("ReferenciaMetaSEIVOC")
              },
              @guest
                 url:"/api/meta_info_candidato/" ,
              @else 
                 url:"/api/meta_info_usuario/" ,
              @endguest
             
              success: function (data) {
                console.log("Guardando MetaDataJCSeivoc");
              }
          });
        });
      });
    </script> --}}
    <script type="text/javascript">
      $(document).ready(function(){  
        $(".MetaDataJCSeivoc").click(function(){
          // evitamos la acción por defecto
          //e.preventDefault();
          // Aja scritp 
          meta = document.getElementById("mdseivoc").innerHTML;
          if(meta==""){
            $.ajax({
              type: "POST",
              data: {
                "_token": $("meta[name='csrf-token']").attr("content"),                              
                "Ref": $(this).attr("ReferenciaMetaSEIVOC")
              },
              
                 url:"/api/meta_info_candidato/" ,
              
              success: function (data) {
                console.log("Guardando MetaDataJCSeivoc");
              }
          });
          }
          if(meta>=0){
            $.ajax({
                type: "POST",
                data: {
                  "_token": $("meta[name='csrf-token']").attr("content"),
                  
                  "id":meta,
                  
                  "Ref": $(this).attr("ReferenciaMetaSEIVOC")
                },               
                   url:"/api/meta_info_usuario/"+meta+"/"+$(this).attr("ReferenciaMetaSEIVOC") ,                
                success: function (data) {
                  console.log("Guardando MetaDataJCSeivoc");
                }
            });
    
          }
        });
      });
    </script>
  </body>
  </html>
