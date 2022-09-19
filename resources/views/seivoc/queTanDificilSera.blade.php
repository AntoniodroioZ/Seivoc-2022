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
  {{-- <link rel="stylesheet" href="{{ asset('/js/metainfo.js') }}" > --}}
  <script src="{{ asset('/js/metainfo.js') }}" type="text/javascript"></script>

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
    <div class="container">
        <div class="centrar-item">
          <div class="text-center caja-recordatorio" style="">
            <p class="texto-caja-recordatorio">Pase Reglamentado (ENP-CCH) 2022-2023</p>
            <p class="texto-caja-recordatorio">&</p>
            <p class="texto-caja-recordatorio">Los aciertos aplican para el Concurso de Selección 2022</p>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-1" >
            <div class="col" >
              <div class="card shadow-sm " style="  border-radius:  0px 50px 50px 0px; ">
                <div class="card-body">
                  <div class="container">
                    <div class="row ">
                      <div id="titulos" class="col-md-3 caja-titulos" style="">
                        <p style="font-size: 2.5rem; color:#2f2e65;">Licenciaturas</p>
                        <div id="nombresCarreras">
                          @foreach ($recursosCarreras as $key=> $carrera)
                          <a href="#" class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="{{$key+101}}" onclick="cambiarDescripcionCarrera({{$carrera['carreras_id']}})">{{$carrera['nombre_carrera']}}</a>
                          <br>
                          @endforeach
                          
                        </div>
                      </div>
                      <div class="col-sm caja-descripciones" style="">

                        <div class="container">
                          <div id="descripcionCarreras">
                            
                          </div>
                          <p class="text-center" style="color:#575757; margin-left:5rem; margin-right:5rem; margin-bottom: 0px;">Para mayor información de esta carrera, consulta la liga:</p>
                          <p class="text-center">
                            <a href="https://www.dgae.unam.mx/planes/licenciatura.html" class=" MetaDataJCSeivoc" ReferenciaMetaSEIVOC="199" target="_blank">https://www.dgae.unam.mx/planes/licenciatura.html</a>
                          </p>
                          <div id="datosCarrera">
                            
                          </div>

                          {{-- <div class="escuela">
                            <p class="text-center" style="font-size: 2rem; color:#2f2e65; font-weight: bold;">FES Acatlán</p>
                            <div class="container">
                              <div class="row">
                                <div class="col text-center">
                                  <p style="font-size: 2rem; color:#2f2e65;">Aciertos</p>
                                  <p style="font-size: 4rem; color:#eeb500; font-weight: bold;">98</p>
                                </div>
                                <div class="col text-center">
                                  <p style="border: 1px solid #2f2e65; background-color: #2f2e65; color: #fff; font-size:2rem">Escolarizado</p>
                                </div>
                                <div class="col text-center">
                                  <p style="font-size: 2rem; color:#2f2e65;">Promedio</p>
                                  <p style="font-size: 4rem; color:#eeb500; font-weight: bold;">8.14</p>
                                </div>
                              </div>
                            </div>
                          </div> --}}

                        </div>

                      </div>
                    </div>
                    {{-- <a href="http://oferta.unam.mx/" target="blank_" style="font-size: 1.5rem; color:#2f2e65; text-decoration:none;">www.oferta.unam.mx</a> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="regresar-flecha">
          <a href="/guiaInteractiva" class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="3" >
            <img src="{{ asset('/images/guia_interactiva/boton-regresar1.png') }}" alt="regresar">
          </a>
        </div>
        
    <script src="{{ asset('/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

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
        // $(document).ready(function () {
        // $.ajax({
        //   type: "POST",
        //   data: {"_token": $("meta[name='csrf-token']").attr("content")
        // },
        // url:"{{url("/")}}/api/nombresCarrerasGI",
        // success: function (data) {
        //   const tabla = JSON.parse(data);
        //   console.log(tabla);
        //   // console.log(tabla[0].code);
        //   console.log(tabla[0].code);
        //   if (tabla[1].code == "201"){
        //     $("#nombresCarreras").html(tabla[0].HTML);
        //     // cambiarDescripcionCarrera(0);
        //   }
        //     }
        //   });
        // });
        function cambiarDescripcionCarrera(id) {
        $.ajax({
          type: "POST",
          data: {"_token": $("meta[name='csrf-token']").attr("content"),
          "carreras_id":id
        },
        url:"{{url("/")}}/api/descripcionesCarreras",
        success: function (data) {
          const tabla = JSON.parse(data);
          console.log(tabla[1].code);
          if (tabla[1].code == "201"){
            $("#descripcionCarreras").html(tabla[0].HTML);
          }
          }
          });
          $.ajax({
          type: "POST",
          data: {"_token": $("meta[name='csrf-token']").attr("content"),
          "carreras_id":id
        },
        url:"{{url("/")}}/api/datosCarreras",
        success: function (data) {
          const tabla = JSON.parse(data);
          console.log(tabla[1].code);
          if (tabla[1].code == "201"){
            $("#datosCarrera").html(tabla[0].HTML);
          }
          }
          });
        }
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

  </body>
  </html>

    