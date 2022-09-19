<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.80.0">
  <title>SEIVOC New Beginning </title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{ asset('/dist/css/bootstrap.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('/css/bootstrap-extension.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('/css/navar.css') }}" type="text/css">


</head>
<body style="background-image:  url('{{ asset('images/background.png') }}');background-repeat: no-repeat;background-attachment: fixed;background-size: 130%;">

  <header>
    <div class="pleca-superior">
      <img  src="{{ asset('images/Logo.png') }}" width="8%" style="margin-left: 5%;">
      
      @guest
        <a width="8%" style="margin-left: 70%; color: white;" href="{{ url('/registro') }}">Registro</a>
        <a  width="8%" style=" color: white;" >/</a>
        <a  width="8%" style=" color: white;" href="{{ url('/login') }}">Iniciar Sesión</a>
        <p id="mdseivoc" hidden></p>
      @else 
      <div class="nav-link" width="8%" style="margin-left: 60%; margin-top: -3%;">
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a style="color: white;">
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

    </div></div>
    

  </header>
  
  @yield('content')
  
  <div  id="MenuPrin1" class="position-fixed  text-center col-3 col-sm-1 col-md-1 col-lg-1 col-xl-1 " style="background-color: #2f2e65;position: relative; top: 140px; left: 40px; opacity: 0.5;" >
    <br>
    
    <a>
      <input type="image" name="botondeenvio" src="{{ asset('images/boton1-a.png') }}" alt="Home"  width="70%" >
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
    </footer>


    <script src="{{ asset('/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">

      $(document).ready(function(){
        $('#Menu2').hide(100);
        $('#MenuPrin1').hide(100);
        $('#MenuPrin2').hide(100);
        $("#MenuDerecho").click(function(){
          //console.log("Entra");
          if ($('#Menu2').is(':hidden'))
            $('#Menu2').show(100);
          else
            $('#Menu2').hide(100);
        });

        $("#MenuIzquierdo").click(function(){
          //console.log("Entra");
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

    {{-- <script>
      //Class MetaDataJCSeivoc
      //Atributo ReferenciaMetaSEIVOC
      // funcion toda la metadata 
      var boton = document.getElementsByClassName('MetaDataJCSeivoc');

      // cuando se pulsa en el enlace
      boton.onclick = function(e) {
          // evitamos la acción por defecto
          e.preventDefault();
          // Aja scritp 
          $.ajax({
              type: "POST",
              data: {
                "_token": $("meta[name='csrf-token']").attr("content"),
                @guest
                @else 
                "id":{{ Auth::user()->usuario_id }},
                @endguest
                "Ref":e.getAttribute("ReferenciaMetaSEIVOC")
              },
              @guest
                 url:"/api/meta_info_usuario/" ,
              @else 
                 url:"/api/meta_info_candidato/" ,
              @endguest
             
              success: function (data) {
                const tabla = JSON.parse(data);
                console.log(tabla[1].code);
                if (tabla[1].code == "201"){
                  $("#rightM").html(tabla[0].HTML);
                }
              }
          });
      }
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
