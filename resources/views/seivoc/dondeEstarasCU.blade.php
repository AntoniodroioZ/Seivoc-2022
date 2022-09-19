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
                        
                    </div>                      
                    <div>
                      <img class ="ubicacionCU0 tam-avin" style="" src="{{ asset('/images/guia_interactiva/svg/av-insurgentes-sur.svg')}}" alt="">
                    </div>
                    <div>
                        <img class ="ubicacionCU4 tam-islas" style="" src="{{ asset('/images/guia_interactiva/svg/islas-rectoria-biblioteca.svg')}}" alt="">
                    </div>
                    <div>
                        <img class ="ubicacionCU1 tam-estadioCU" style="" src="{{ asset('/images/guia_interactiva/svg/estadio-olimpico.svg')}}" alt="">
                    </div>
                    <div>
                      <img class ="ubicacionCU2 tam-reserva" style="" src="{{ asset('/images/guia_interactiva/svg/reserva-escultorico.svg')}}" alt="">
                    </div>
                    <div>
                      <img class ="ubicacionCU3 tam-JardiB" style="" src="{{ asset('/images/guia_interactiva/svg/jardin-botanico.svg')}}" alt="">
                    </div>
                    <div>
                      <img class ="ubicacionCU5 tam-ZonaDeportiva" style="" src="{{ asset('/images/guia_interactiva/svg/zona-deportiva.svg')}}" alt="">
                    </div>
                    <div class="">
                      <img class="logo-unamDE" src="{{ asset('/images/guia_interactiva/escudo-unam.png') }}" alt="">
                    </div>
                    <div class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="421" onclick="obtenerDatosFacultades(22)">
                        <img class ="ubicacionCU7 tam-fac1" style="" src="{{ asset('/images/guia_interactiva/svg/facultad-filosofia-letras.svg')}}" alt="">
                    </div>
                    <div class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="422" onclick="obtenerDatosFacultades(29)">
                        <img class ="ubicacionCU6 tam-fac1" style="" src="{{ asset('/images/guia_interactiva/svg/facultad-de-psicologia.svg')}}" alt="">
                    </div>
                    <div class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="423" onclick="obtenerDatosFacultades(20)">
                        <img class ="ubicacionCU8 tam-fac1" style="" src="{{ asset('/images/guia_interactiva/svg/facultad-derecho.svg')}}" alt="">
                    </div>
                    <div class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="424" onclick="obtenerDatosFacultades(21)">
                        <img class ="ubicacionCU9 tam-fac1" style="" src="{{ asset('/images/guia_interactiva/svg/facultad-economia.svg')}}" alt="">
                    </div>    
                    <div class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="425" onclick="obtenerDatosFacultades(28)">
                        <img class ="ubicacionCU10 tam-fac1" style="" src="{{ asset('/images/guia_interactiva/svg/facultad-odontologia.svg')}}" alt="">
                    </div>  
                    <div class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="426" onclick="obtenerDatosFacultades(24)">
                        <img class ="ubicacionCU11 tam-fac1" style="" src="{{ asset('/images/guia_interactiva/svg/facultad-medicina.svg')}}" alt="">
                    </div>  
                    <div class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="427" onclick="obtenerDatosFacultades(45)">
                        <img class ="ubicacionCU12 tam-fac2" style="" src="{{ asset('/images/guia_interactiva/svg/instituto-biomedicas.svg')}}" alt="">
                    </div> 
                    <div class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="428" onclick="obtenerDatosFacultades(13)">
                        <img class ="ubicacionCU13 tam-fac1" style="" src="{{ asset('/images/guia_interactiva/svg/escuela-nacional-trabajo-social.svg')}}" alt="">
                    </div> 
                    <div class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="429" onclick="obtenerDatosFacultades(19)">
                        <img class ="ubicacionCU14 tam-fac1" style="" src="{{ asset('/images/guia_interactiva/svg/facultad-contaduria-administracion.svg')}}" alt="">
                    </div> 
                    <div class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="430" onclick="obtenerDatosFacultades(14)">
                        <img class ="ubicacionCU15 tam-fac1" style="" src="{{ asset('/images/guia_interactiva/svg/facultad-arquitectura.svg')}}" alt="">
                    </div> 
                    <div class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="431" onclick="obtenerDatosFacultades(23)">
                        <img class ="ubicacionCU16 tam-fac1" style="" src="{{ asset('/images/guia_interactiva/svg/facultad-ingenieria.svg')}}" alt="">
                    </div> 
                    <div class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="432" onclick="obtenerDatosFacultades(11)">
                        <img class ="ubicacionCU17 tam-fac1" style="" src="{{ asset('/images/guia_interactiva/svg/enallt.svg')}}" alt="">
                    </div> 
                    <div class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="433" onclick="obtenerDatosFacultades(37)">
                        <img class ="ubicacionCU18 tam-fac1" style="" src="{{ asset('/images/guia_interactiva/svg/iimas.svg')}}" alt="">
                    </div>
                    <div class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="434"onclick="obtenerDatosFacultades(30)">
                        <img class ="ubicacionCU19 tam-fac1" style="" src="{{ asset('/images/guia_interactiva/svg/facultad-quimica.svg')}}" alt="">
                    </div>
                    <div class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="435" onclick="obtenerDatosFacultades(4)">
                        <img class ="ubicacionCU20 tam-fac2" style="" src="{{ asset('/images/guia_interactiva/svg/escuela-nacional-ciencias-tierra.svg')}}" alt="">
                    </div>
                    <div class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="436" onclick="obtenerDatosFacultades(25)">
                        <img class ="ubicacionCU21 tam-fac1" style="" src="{{ asset('/images/guia_interactiva/svg/facultad-veterinaria.svg')}}" alt="">
                    </div>
                    <div class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="437" onclick="obtenerDatosFacultades(3)">
                        <img class ="ubicacionCU22 tam-fac1" style="" src="{{ asset('/images/guia_interactiva/svg/escuela-artes-cinematograficas.svg')}}" alt="">
                    </div>
                    <div class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="438" onclick="obtenerDatosFacultades(27)">
                        <img class ="ubicacionCU23 tam-fac1" style="" src="{{ asset('/images/guia_interactiva/svg/centro-universitario-teatro.svg')}}" alt="">
                    </div>
                    <div class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="439" onclick="obtenerDatosFacultades(17)">
                        <img class ="ubicacionCU24 tam-fac1" style="" src="{{ asset('/images/guia_interactiva/svg/facultad-ciencias.svg')}}" alt="">
                    </div>
                    <div class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="440" onclick="obtenerDatosFacultades(18)">
                        <img class ="ubicacionCU25 tam-fac1" style="" src="{{ asset('/images/guia_interactiva/svg/facultad-ciencias-politicas.svg')}}" alt="">
                    </div>
                    <div >
                        <img class ="ubicacionCU26 tam-SalaNeza" style="" src="{{ asset('/images/guia_interactiva/svg/sala-nezahualcoyotl.svg')}}" alt="">
                    </div>
                    <div >
                        <img class ="ubicacionCU27 tam-centro-cultural" style="" src="{{ asset('/images/guia_interactiva/svg/muac-centro-cultural.svg')}}" alt="">
                    </div>
                    <div >
                        <img class ="ubicacionCU28 tam-universum" style="" src="{{ asset('/images/guia_interactiva/svg/universum.svg')}}" alt="">
                    </div>
                    <div >
                        <img class ="ubicacionCU29 tam-SalaNeza" style="" src="{{ asset('/images/guia_interactiva/svg/m-copilco.svg')}}" alt="">
                    </div>
                    <div >
                        <img class ="ubicacionCU30 tam-SalaNeza" style="" src="{{ asset('/images/guia_interactiva/svg/m-universidad.svg')}}" alt="">
                    </div>

                    
                    </div>
                    <div class="col-sm caja-descripciones" style="">
                      <div class="container">
                        <div class="row" id="datosFacultad">
                          <p class="titulo-facultad text-center">Selecciona una ubicación para mas información</p>

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
