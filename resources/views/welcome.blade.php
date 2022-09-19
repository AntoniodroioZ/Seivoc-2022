<!DOCTYPE html>
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
  {{-- <link rel="stylesheet" href="{{ asset('/js/metainfo.js') }}" > --}}
  {{-- <script src="{{ asset('/js/metainfo.js') }}" type="text/javascript"></script> --}}
</head>
<body style="background-image:  url('{{asset('/images/background.png')}}');background-repeat: no-repeat;background-attachment: fixed;background-size: 130%;">

  <header>
    <div class="pleca-superior">
      <img  src="{{ asset('images/Logo.png') }}" width="8%" style="margin-left: 5%;">
        @guest
        <a width="8%" style="margin-left: 70%; color: white;" href="{{ url('/registro') }}">Registro</a>
        <a  width="8%" style=" color: white;" >/</a>
        <a  width="8%" style=" color: white;" href="{{ url('/login') }}">Iniciar Sesión</a>
        <p id="mdseivoc" hidden></p>
        
      @else
        <a style="color: white; margin-left: 60%;" width="8%">
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
    <!--<dir  class="navbar justify-content-md-center" style="background-color: transparent;">
      <a  class="rounded-circle" >
        <img class="img-circle"src="{{ asset('/images/boton-video1.png') }}" width="100%" style="border-radius: 50%">
      </a>
    </dir>-->
  </header>

  <main style="background-color: transparent;" >
    
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-1" >
          <div class="col" >
            <div class="container">
              <div class="row ">
                <div class="col-md-8 offset-md-2 text-center" >
                  <p>
                    <br>
                    @yield('contenido')
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </main>
<!-- T H E  G A M E  -->
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer class="py-5" class="py-5" style="opacity: 1;background-color: rgb(6,37,91);color: rgb(6,37,91);filter: brightness(100%) contrast(100%);">
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
      </footer>

      <!--Script necesarios -->
      <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

    </body>
    <div  id="MenuPrin1" class="position-fixed  text-center col-3 col-sm-1 col-md-1 col-lg-1 col-xl-1 " style="background-color: #2f2e65;position: relative; top: 140px; left: 40px; opacity: 0.5;" >
      <br>
      <a>
        <input type="image" name="botondeenvio" src="{{ asset('images/boton1-a.png') }}" alt="Home"  width="70%">
      </a>
      <br>
      <a>
        <input type="image" name="botondeenvio" src="{{ asset('images/boton2-a.png') }}" alt="Home"  width="70%">
      </a>
      <br>
      <a>
        <input type="image" name="botondeenvio" src="{{ asset('images/boton3-a.png') }}" alt="Home"  width="70%">
      </a>
      <br>
      <a>
        <input type="image" name="botondeenvio" src="{{ asset('images/boton4-a.png') }}" alt="Home"  width="70%">
      </a>
      <br>
      <a>
        <input type="image" name="botondeenvio" src="{{ asset('images/boton5-a.png') }}" alt="Home"  width="70%">
      </a>
    </div>
    <div id="MenuPrin2" class="position-fixed  text-center  col-3 col-sm-1 col-md-1 col-lg-1 col-xl-1 " style="position: relative; top: 140px; left: 40px; " >
      <br>
      <a>
        <input type="image" class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="0" name="botondeenvio" src="{{ asset('images/boton1-a.png') }}" alt="Home" onclick="location.href ='{{url('/')}}';"  width="70%">
      </a>
      <br>
      <a>
        <input type="image" class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="2" name="botondeenvio" src="{{ asset('images/boton2-a.png') }}" alt="Home"   onclick="location.href ='{{url('/guia')}}';" width="70%">
      </a>
      <br>
      <a>
        <input type="image" class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1001" name="botondeenvio" src="{{ asset('images/boton3-a.png') }}" alt="Home" onclick="location.href ='{{url('/info')}}';" width="70%">
      </a>
      <br>
      <a>
        <input type="image" class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="3001" name="botondeenvio" src="{{ asset('images/boton4-a.png') }}" alt="Home" onclick="location.href ='{{url('/explora')}}';" width="70%">
      </a>
      <br>
      <a>
        <input type="image" class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="4001" name="botondeenvio" src="{{ asset('images/boton5-a.png') }}" alt="Home" onclick="location.href ='{{url('/construyendo')}}';" width="70%">
      </a>
    </div>
    <div id="MenuPrin3" class="redes-sociales position-fixed  text-center  col-3 col-sm-1 col-md-1 col-lg-1 col-xl-1 " style= >
      <br>
      <a>
        <input type="image" name="botondeenvio" src="{{ asset('images/boton-face1.png') }}" alt="Home"  onclick="location.href ='https://www.facebook.com/SEIVOC';" width="100%">
      </a>
      <br>
      <a>
        <input type="image" name="botondeenvio" src="{{ asset('images/boton-insta1.png') }}" alt="Home"   onclick="location.href ='https://www.instagram.com/seivoc/';" width="100%">
      </a>
      <br>
      <a href="mailto:vocacionenlinea@unam.mx">
        <input type="image" name="botondeenvio" src="{{ asset('images/boton-correo1.png') }}" alt="Home"  width="100%">
      </a>
      <br>
      <a>
        <input type="image" name="botondeenvio" src="{{ asset('images/boton-messenger1.png') }}" alt="Home" onclick="location.href ='https://m.me/SEIVOC';" width="100%">
      </a>
    </div>

  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript">

      $(document).ready(function(){
      if ($('#exampleModal').length) {
  $('#exampleModal').modal('show');
}
$(".cerrarModalSeivoc").click(function(){
$('#exampleModal').modal('hide');
});
        
        $(".MetaDataJCSeivoc").click(function(){
          // evitamos la acción por defecto
          //e.preventDefault();
          // Aja scritp 
          // $.ajax({
          //     type: "POST",
          //     data: {
          //       "_token": $("meta[name='csrf-token']").attr("content"),
          //       @guest
          //       @else 
          //       "id":{{ Auth::user()->usuario_id }},
          //       @endguest
          //       "Ref": $(this).attr("ReferenciaMetaSEIVOC")
          //     },
          //     @guest
          //        url:"/api/meta_info_candidato/" ,
          //     @else 
          //        url:"/api/meta_info_usuario/" ,
          //     @endguest
             
          //     success: function (data) {
          //       console.log("Guardando MetaDataJCSeivoc");
          //     }
          // });
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
           url:"/api/meta_info_usuario/{{ Auth::user()->usuario_id }}/"+$(this).attr("ReferenciaMetaSEIVOC") ,
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

    </html>
