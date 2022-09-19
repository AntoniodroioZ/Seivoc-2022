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
    <br>
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-1" >
          <div class="col" >
            <div class="card shadow-sm " style="  border-radius:  50px 50px 50px 50px; ">
              <div class="card-body">
                <div class="container">
                  <div class="row ">
                    <div id="titulos" class="col-md-7 caja-titulos" style="">  
                      <div id="Mapa">
                        <div class="">
                          <img class="logo-unamDE" src="{{ asset('/images/guia_interactiva/escudo-unam.png') }}" alt="">
                        </div>                      
                        <figure onclick="obtenerDatosFacultades(2)">
                          <img class ="ubicacion10 tamaño-ubicacion2 MetaDataJCSeivoc" ReferenciaMetaSEIVOC="401" style="" src="{{ asset('/images/guia_interactiva/ubicacion3.png')}}" alt="">
                          <figcaption class="ubicacion-texto10">Centro de Nanociencias y Nanotecnología, Ensenada, Baja California</figcaption>
                        </figure>
                        {{-- <figure onclick="obtenerDatosFacultades(0)">
                          <img class ="ubicacion11 tamaño-ubicacion2" style="" src="{{ asset('/images/guia_interactiva/ubicacion4.png')}}" alt="">
                          <figcaption class="ubicacion-texto11">Oficina SUAyED de la Facultad de Derecho, Mazatlán, Sinaloa</figcaption>
                        </figure> --}}
                        {{-- <figure onclick="obtenerDatosFacultades(43)">
                          <img class ="ubicacion12 tamaño-ubicacion4" style="" src="{{ asset('/images/guia_interactiva/ubicacion3.png')}}" alt="">
                          <figcaption class="ubicacion-texto12">Centro Peninsular en Humanidades y Ciencias Sociales en Mérida</figcaption>
                        </figure> --}}
                        {{-- <figure onclick="obtenerDatosFacultades(42)">
                          <img class ="ubicacion13 tamaño-ubicacion4" style="" src="{{ asset('/images/guia_interactiva/ubicacion4.png')}}" alt="">
                          <figcaption class="ubicacion-texto13">Facultad de Ciencias, Unidad Multidisciplinaria en Docencia e Investigación en SISAL</figcaption>
                        </figure> --}}
                        <figure onclick="obtenerDatosFacultades(9)">
                          <img class ="ubicacion29 tamaño-ubicacion6 MetaDataJCSeivoc" ReferenciaMetaSEIVOC="402" style="" src="{{ asset('/images/guia_interactiva/ubicacion4.png')}}" alt="">
                          <figcaption class="ubicacion-texto29">Escuela Nacional de Estudios Superiores, Unidad Mérida</figcaption>
                        </figure>
                        {{-- <figure onclick="obtenerDatosFacultades(39)">
                          <img class ="ubicacion14 tamaño-ubicacion4" style="" src="{{ asset('/images/guia_interactiva/ubicacion3.png')}}" alt="">
                          <figcaption class="ubicacion-texto14">Centro de Física Aplicada y Tecnología Avanzada</figcaption>
                        </figure> --}}
                        <figure onclick="obtenerDatosFacultades(7)">
                          <img class ="ubicacion15 tamaño-ubicacion4 MetaDataJCSeivoc" ReferenciaMetaSEIVOC="403" style="" src="{{ asset('/images/guia_interactiva/ubicacion4.png')}}" alt="">
                          <figcaption class="ubicacion-texto15">Escuela Nacional de Estudios Superiores, Unidad León</figcaption>
                        </figure>
                        <figure onclick="obtenerDatosFacultades(6)">
                          <img class ="ubicacion16 tamaño-ubicacion5 MetaDataJCSeivoc" ReferenciaMetaSEIVOC="404" style="" src="{{ asset('/images/guia_interactiva/ubicacion3.png')}}" alt="">
                          <figcaption class="ubicacion-texto16">Escuela Nacional de Estudios Superiores, Unidad Juriquilla</figcaption>
                        </figure>
                        {{-- <figure onclick="obtenerDatosFacultades(0)">
                          <img class ="ubicacion17 tamaño-ubicacion5" style="" src="{{ asset('/images/guia_interactiva/ubicacion4.png')}}" alt="">
                          <figcaption class="ubicacion-texto17">Programa SEP-H/UNAM, Hídalgo</figcaption>
                        </figure> --}}
                        <figure onclick="obtenerDatosFacultades(10)">
                          <img class ="ubicacion18 tamaño-ubicacion4 MetaDataJCSeivoc" ReferenciaMetaSEIVOC="405" style="" src="{{ asset('/images/guia_interactiva/ubicacion3.png')}}" alt="">
                          <figcaption class="ubicacion-texto18">Escuela Nacional de Estudios Superiores, Unidad Morelia</figcaption>
                        </figure>
                        {{-- <figure onclick="obtenerDatosFacultades(38)">
                          <img class ="ubicacion19 tamaño-ubicacion4" style="" src="{{ asset('/images/guia_interactiva/ubicacion4.png')}}" alt="">
                          <figcaption class="ubicacion-texto19">Centro de Investigaciones de Ecosistemas</figcaption>
                        </figure> --}}
                        {{-- <figure onclick="obtenerDatosFacultades(0)">
                          <img class ="ubicacion20 tamaño-ubicacion5" style="" src="{{ asset('/images/guia_interactiva/ubicacion3.png')}}" alt="">
                          <figcaption class="ubicacion-texto20">Centro de Estudios de Chimalhuacán</figcaption>
                        </figure> --}}
                        {{-- <figure onclick="obtenerDatosFacultades(0)">
                          <img class ="ubicacion21 tamaño-ubicacion5" style="" src="{{ asset('/images/guia_interactiva/ubicacion3.png')}}" alt="">
                          <figcaption class="ubicacion-texto21">test10</figcaption>
                        </figure> --}}
                        <figure onclick="obtenerDatosFacultades(40),obtenerDatosFacultades2(46)">
                          <img class ="ubicacion22 tamaño-ubicacion5 MetaDataJCSeivoc" ReferenciaMetaSEIVOC="406" style="" src="{{ asset('/images/guia_interactiva/ubicacion4.png')}}" alt="">
                          <figcaption class="ubicacion-texto22">FES Zaragoza Campus 3, Tlaxcala.<br>Centro de Alta Tecnología y Educación a Distancia, Tlaxcala</figcaption>
                        </figure>
                        {{-- <figure onclick="obtenerDatosFacultades(0)">
                          <img class ="ubicacion23 tamaño-ubicacion6" style="" src="{{ asset('/images/guia_interactiva/ubicacion3.png')}}" alt="">
                          <figcaption class="ubicacion-texto23">Centro de Ciencias Genómicas, en Cuernavaca, Morelos</figcaption>
                        </figure> --}}
                        <figure onclick="obtenerDatosFacultades(1),obtenerDatosFacultades2(36)">
                          <img class ="ubicacion24 tamaño-ubicacion6 MetaDataJCSeivoc" ReferenciaMetaSEIVOC="407" style="" src="{{ asset('/images/guia_interactiva/ubicacion4.png')}}" alt="">
                          <figcaption class="ubicacion-texto24">Centro de Ciencias Genómicas, en Cuernavaca, Morelos.<br>Instituto de Energías Renovables, en Temixco, Morelos.</figcaption>
                        </figure>
                        {{-- <figure onclick="obtenerDatosFacultades(0)">
                          <img class ="ubicacion25 tamaño-ubicacion3" style="" src="{{ asset('/images/guia_interactiva/ubicacion4.png')}}" alt="">
                          <figcaption class="ubicacion-texto25">Universidad Juárez Autónoma de Tabasco</figcaption>
                        </figure> --}}
                        <figure onclick="obtenerDatosFacultades(16)">
                          <img class ="ubicacion26 tamaño-ubicacion3 MetaDataJCSeivoc" ReferenciaMetaSEIVOC="408" style="" src="{{ asset('/images/guia_interactiva/ubicacion3.png')}}" alt="">
                          <figcaption class="ubicacion-texto26">Facultad de Artes y Diseño</figcaption>
                        </figure>
                        {{-- <figure onclick="obtenerDatosFacultades(41)">
                          <img class ="ubicacion27 tamaño-ubicacion5" style="" src="{{ asset('/images/guia_interactiva/ubicacion4.png')}}" alt="">
                          <figcaption class="ubicacion-texto27">Centro de Educación Abierta y a Distancia, Oaxaca</figcaption>
                        </figure> --}}
                        {{-- <figure onclick="obtenerDatosFacultades(0)">
                          <img class ="ubicacion28 tamaño-ubicacion5" style="" src="{{ asset('/images/guia_interactiva/ubicacion3.png')}}" alt="">
                          <figcaption class="ubicacion-texto28">Centro de Educación continua y a Distancia, Chiapas</figcaption>
                        </figure> --}}
                        

                        <div class="centrar-mapa">
                            <img class="mapa-cdmx" src="{{ asset('/images/guia_interactiva/mapa-republica.png') }}" alt="">
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-sm caja-descripciones" style="">
                      <div class="container">
                        <div class="row" id="datosFacultad">
                          <p class="titulo-facultad text-center">Selecciona una ubicación para mas información</p>

                        </div>
                        <div class="row" id="datosFacultad2">
                          

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="regresar-flecha">
          <a class=" MetaDataJCSeivoc" ReferenciaMetaSEIVOC="3" href="/dondeEstaras">
            <img src="{{ asset('/images/guia_interactiva/boton-regresar1.png') }}" alt="regresar">
          </a>
        </div>
    

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
     <script type="text/javascript">
      function obtenerDatosFacultades(id) {
        $.ajax({
          type: "POST",
          data: {"_token": $("meta[name='csrf-token']").attr("content"),
          "sede_id":id
        },
        url:"{{url("/")}}/api/obtenerDatosFacultades",
        success: function (data) {
          const tabla = JSON.parse(data);
          console.log(tabla[1].code);
          if (tabla[1].code == "201"){
            $("#datosFacultad").html(tabla[0].HTML);
            $("#datosFacultad2").html('');
          }
          }
          });
    }
    function obtenerDatosFacultades2(id) {
        $.ajax({
          type: "POST",
          data: {"_token": $("meta[name='csrf-token']").attr("content"),
          "sede_id":id
        },
        url:"{{url("/")}}/api/obtenerDatosFacultades",
        success: function (data) {
          const tabla = JSON.parse(data);
          console.log(tabla[1].code);
          if (tabla[1].code == "201"){
            $("#datosFacultad2").html(tabla[0].HTML);
          }
          }
          });
    }
    </script>
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
