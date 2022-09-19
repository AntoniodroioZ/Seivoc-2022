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
                          <figure class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="441" onclick="obtenerDatosFacultades(33)">
                            <img class ="ubicacion1 tamaño-ubicacion" style="" src="{{ asset('/images/guia_interactiva/ubicacion1.png')}}" alt="">
                            <figcaption class="ubicacion-texto1">FES Cuatitlán</figcaption>
                          </figure>
                          <figure class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="442" onclick="obtenerDatosFacultades(34)">
                            <img class ="ubicacion2 tamaño-ubicacion" style="" src="{{ asset('/images/guia_interactiva/ubicacion2.png')}}" alt="">
                            <figcaption class="ubicacion-texto2">FES Iztacala</figcaption>
                          </figure>
                          <figure class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="443" onclick="obtenerDatosFacultades(31)">
                            <img class ="ubicacion3 tamaño-ubicacion" style="" src="{{ asset('/images/guia_interactiva/ubicacion1.png')}}" alt="">
                            <figcaption class="ubicacion-texto3">FES Acatlán</figcaption>
                          </figure>
                          <figure class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="444" onclick="obtenerDatosFacultades(32)">
                            <img class ="ubicacion4 tamaño-ubicacion" style="" src="{{ asset('/images/guia_interactiva/ubicacion2.png')}}" alt="">
                            <figcaption class="ubicacion-texto4">FES Aragón</figcaption>
                          </figure>
                          <figure class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="445" onclick="obtenerDatosFacultades(35)">
                            <img class ="ubicacion5 tamaño-ubicacion" style="" src="{{ asset('/images/guia_interactiva/ubicacion1.png')}}" alt="">
                            <figcaption class="ubicacion-texto5">FES Zaragoza</figcaption>
                          </figure>
                          <figure class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="446" onclick="obtenerDatosFacultades(26)">
                            <img class ="ubicacion6 tamaño-ubicacion" style="" src="{{ asset('/images/guia_interactiva/ubicacion4.png')}}" alt="">
                            <figcaption class="ubicacion-texto6">Facultad de Música</figcaption>
                          </figure>
                          <a class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="420" href="/dondeEstaras/CU">
                          <figure >
                              <img class ="ubicacion7 tamaño-ubicacion" style="" src="{{ asset('/images/guia_interactiva/ubicacion3.png')}}" alt="">
                              <figcaption class="ubicacion-texto7">Ciudad Universitaria</figcaption>
                            </figure>
                          </a>
                          <figure class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="447" onclick="obtenerDatosFacultades(5)">
                            <img class ="ubicacion8 tamaño-ubicacion" style="" src="{{ asset('/images/guia_interactiva/ubicacion4.png')}}" alt="">
                            <figcaption class="ubicacion-texto8">Escuela Nacional de Enfermería y Obstetricia</figcaption>
                          </figure>
                          <figure  class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="448" onclick="obtenerDatosFacultades(15)">
                            <img class ="ubicacion9 tamaño-ubicacion" style="" src="{{ asset('/images/guia_interactiva/ubicacion3.png')}}" alt="">
                            <figcaption class="ubicacion-texto9">Facultad de Artes y Diseño</figcaption>
                          </figure>
                          <div class="centrar-mapa">
                              <img class="mapa-cdmx" src="{{ asset('/images/guia_interactiva/mapa-cdmx.png') }}" alt="">
                          </div>
                          
                        </div>
                      </div>
                      <div class="col-sm caja-descripciones" style="">
                        <div class="container">
                          <div class="row" id="datosFacultad">
                            <p class="titulo-facultad text-center">Selecciona una ubicación para mas información</p>
                            {{-- <div class="encabezado-datosFac col-3">
                              <img class="logo-facultad" src="{{ asset('/images/guia_interactiva/imagenes-facultades/18a.png')}}" alt="xd">
                            </div>
                            <div class="col">
                                <p class="titulo-facultad text-center">Facultad de Estudios Superiores Iztacala</p>
                            </div>
                            <div>
                                <a href="http://www.iztacala.unam.mx/" target="_blank" style="text-decoration: none;">
                                    <p class="web-facultad text-center">www.iztacala.unam.mx</p>
                                </a>
                                <p style="color: #2F2E65; font-size:1.5rem; font-weight: bold;">Ubicación:</p>
                                <p class="" style="margin-left:7.5rem;">Av De Los Barrios 1, Los Reyes Ixtacala, Hab Los Reyes Ixtacala Barrio de los Árboles/Barrio de los Héroes, 54090 Tlalnepantla de Baz, Méx</p>
                                <img class="imagen-facultad" src="{{ asset('/images/guia_interactiva/imagenes-facultades/18b.png')}}" alt="">
                                <p style="color: #2F2E65; font-size:1.5rem; font-weight: bold;">Licenciaturas:</p>
                                <p style="margin-left:7.5rem; margin-bottom:0;">test</p>
                                <p style="margin-left:7.5rem; margin-bottom:0;">test</p>
                                <p style="margin-left:7.5rem; margin-bottom:0;">test</p>
                                <p style="margin-left:7.5rem; margin-bottom:0;">test</p>
                                <p style="margin-left:7.5rem; margin-bottom:0;">test</p>
                                <p style="margin-left:7.5rem; margin-bottom:0;">test</p>
                                <p style="margin-left:7.5rem; margin-bottom:0;">test</p>
                                <p style="margin-left:7.5rem; margin-bottom:0;">test</p>

                            </div> --}}

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
        <div class="regresar-flecha MetaDataJCSeivoc" ReferenciaMetaSEIVOC="3">
            <a href="/dondeEstaras">
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
