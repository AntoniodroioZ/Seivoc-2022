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
  <link rel="stylesheet" href="{{ asset('/css/slider.css') }}" type="text/css">
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
    
    <div>
      <div class="centrar-item">
        <div class="text-center caja-recordatorio" style="">
          <p class="texto-caja-recordatorio">Recuerda que las Universidades organizan sus licenciaturas de acuerdo con características académicas afines, por lo que la UNAM propone cuatro Consejos académicos. Para fines didácticos, este sitio propone una subdivisión con el área de Humanidades y Artes.
          </p>
          <p class="texto-caja-recordatorio">A continuación puedes explorar las carreras que se ubican en cada Consejo académico:
          </p>
          {{-- <p class="texto-caja-recordatorio">Los aciertos aplican para el Concurso de Selección 2022</p> --}}
        </div>
      </div>
        <div id="wrapper">
          <br>
            {{-- Control izquierdo --}}
            <span id="controlL" class="left-controls MetaDataJCSeivoc" ReferenciaMetaSEIVOC="200" role="button" aria-label="See Previous Modules" style="">
                {{-- <b class="fa fa-chevron-left fa-chevron-left-extra" aria-hidden="true"></b> --}}
                <img src="{{ asset('/images/guia_interactiva/boton-volver.png') }}" alt="">
            </span>
            {{-- Control izquierdo --}}
            <div class="module-section clearfix" style="overflow-x:hidden;">
              
                <ul id="content">
              
                    <div class="card-dificultad">  
                        <div>
                            <img style="" class="imagenes-familias" src="{{ asset('/images/guia_interactiva/area1.png') }}" alt="">   
                        </div>                      
                        <div>
                            <button id="boton1" class="boton-general boton-area1-1 MetaDataJCSeivoc" ReferenciaMetaSEIVOC="201" onclick="obtenerDescripcionArea(1),myf1()">Descripción</button>
                            <button id="boton2" class="boton-general boton-area1-2 MetaDataJCSeivoc" ReferenciaMetaSEIVOC="202" onclick="obtenerCarreras(1),myf2()">Licenciaturas</button>                            
                            <div class="tarjetas-descripciones">
                                <div id="area1">
                                    
                                </div>
                            </div>                           
                        </div>                     
                    </div>
                    <div class="card-dificultad">
                        <div>
                            <img style="" class="imagenes-familias" src="{{ asset('/images/guia_interactiva/area2.png') }}" alt=""> 
                        </div>
                        <div>
                            <button id="boton3" class="boton-general boton-area2-1 MetaDataJCSeivoc" ReferenciaMetaSEIVOC="203" onclick="obtenerDescripcionArea(2),myf3()">Descripción</button>
                            <button id="boton4" class="boton-general boton-area2-2 MetaDataJCSeivoc" ReferenciaMetaSEIVOC="204" onclick="obtenerCarreras(2),myf4()">Licenciaturas</button>
                            <div class="tarjetas-descripciones">
                                <div id="area2">                                    
                                    
                                </div>

                            </div> 
                        </div>                         
                    </div>
                    <div class="card-dificultad">
                        <div>
                            <img style="" class="imagenes-familias" src="{{ asset('/images/guia_interactiva/area3.png') }}" alt="">
                        </div>
                        <div>
                            <button id="boton5" class="boton-general boton-area3-1 MetaDataJCSeivoc" ReferenciaMetaSEIVOC="205" onclick="obtenerDescripcionArea(3),myf5()">Descripción</button>
                            <button id="boton6" class="boton-general boton-area3-2 MetaDataJCSeivoc" ReferenciaMetaSEIVOC="206" onclick="obtenerCarreras(3),myf6()">Licenciaturas</button>
                            <div class="tarjetas-descripciones">
                                <div id="area3">
                                    
                                </div>
                            </div> 
                        </div>                          
                    </div>
                    <div class="card-dificultad">
                        <div>
                            <img style="" class="imagenes-familias" src="{{ asset('/images/guia_interactiva/area4-1.png') }}" alt=""> 
                        </div>
                        <div>
                            <button id="boton7" class="boton-general boton-area4-1 MetaDataJCSeivoc" ReferenciaMetaSEIVOC="207" onclick="obtenerDescripcionArea(5),myf7()">Descripción</button>
                            <button id="boton8" class="boton-general boton-area4-2 MetaDataJCSeivoc" ReferenciaMetaSEIVOC="208" onclick="obtenerCarreras(4),myf8()">Licenciaturas</button>
                            <div class="tarjetas-descripciones">
                                <div id="area5">
                                    
                                </div>
                            </div> 
                        </div>                         
                    </div>
                    <div class="card-dificultad">
                        <div>
                            <img style="" class="imagenes-familias" src="{{ asset('/images/guia_interactiva/area4-2.png') }}" alt="">  
                        </div>
                        <div>
                            <button id="boton9" class="boton-general boton-area5-1 MetaDataJCSeivoc" ReferenciaMetaSEIVOC="209" onclick="obtenerDescripcionArea(6),myf9()">Descripción</button>
                            <button id="boton10" class="boton-general boton-area5-2 MetaDataJCSeivoc" ReferenciaMetaSEIVOC="210" onclick="obtenerCarreras(6),myf10()">Licenciaturas</button>
                            <div class="tarjetas-descripciones">
                                <div id="area6">
                                    
                                </div>
                            </div> 
                        </div>                        
                    </div>
               
              
                </ul>
              
             
              
            </div>
            {{-- Control derecho --}}
            <span id="controlR" class="right-controls MetaDataJCSeivoc" ReferenciaMetaSEIVOC="211" role="button" aria-label="See Previous Modules">
                {{-- <b class="fa fa-chevron-right fa-chevron-right-extra" aria-hidden="true"></b> --}}
                <img src="{{ asset('/images/guia_interactiva/boton-avanzar.png') }}" alt="">
            </span>
            {{-- Control derecho --}}
            
            
          </div>
    </div>
    
    
    <div class="regresar-flecha">
        <a href="/guiaInteractiva" class="MetaDataJCSeivoc" ReferenciaMetaSEIVOC="3" role="button">
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
      // console.log(screen.width)\
      // if(screen.width >= 1367 && screen.width <=2100){
      //   console.log(screen.width);
      // }
      // let tamCarrouselMax = 1840;
      // let tamCarrouselMin = 1392;
      // let tamFlecha = 130;
      // let tamScreen = screen.width;
      // let scroll = 10;
      // console.log("El tamaño de la pantalla es de: "+ tamScreen);
      if(screen.width >= 2100){
          document.getElementById('controlR').style.visibility = "hidden";
          document.getElementById('controlL').style.visibility = "hidden";
        }
      let mov; //Variable que limitara el numero de movimientos permitidos con base al tamaño de pantalla
      if(screen.width < 1367){
        mov = 3;
      }
      if(screen.width == 1367){
        mov = 2;
      }
      if(screen.width >= 1368 && screen.width <= 1499){
        mov = 3;
      }
      if(screen.width >= 1500 && screen.width <= 1700){
        mov = 2;
      }
      if(screen.width >= 1701 && screen.width <= 2099){
        mov = 1;
      }
      maxMov = mov;
      console.log(maxMov);
      
        $('#controlR').click(function() {
          event.preventDefault();
          if(mov > 0 ){
            $('#content').animate({
              marginLeft: "-=200px"
            }, "fast");
            mov = mov-1;
            console.log(mov);
          }
          // console.log($('#content').offset().left)
        });
      
        $('#controlL').click(function() {
          event.preventDefault();
          if(mov != maxMov){
            $('#content').animate({
              marginLeft: "+=200px"
            }, "fast");
            mov = mov+1;
            console.log(mov);
          }
        });
      function obtenerDescripcionArea(id) {
          $.ajax({
            type: "POST",
            data: {"_token": $("meta[name='csrf-token']").attr("content"),
            "area_id":id
          },
          url:"{{url("/")}}/api/descripcionArea",
          success: function (data) {
            const tabla = JSON.parse(data);
            console.log(tabla[1].code);
            if (tabla[1].code == "201"){
              $("#area"+id).html(tabla[0].HTML);
            }
            }
            });
      }
      obtenerDescripcionArea(1)
      obtenerDescripcionArea(2)
      obtenerDescripcionArea(3)
      obtenerDescripcionArea(5)
      obtenerDescripcionArea(6)

      function obtenerCarreras(id){
          $.ajax({
            type: "POST",
            data: {"_token": $("meta[name='csrf-token']").attr("content"),
            "area_id":id
          },
          url:"{{url("/")}}/api/carrerasAreas",
          success: function (data) {
            const tabla = JSON.parse(data);
            console.log(tabla[1].code);
            if(id == 4){
                id4 = 5;
                if (tabla[1].code == "201"){
              $("#area"+id4).html(tabla[0].HTML);
            }
            }
            if(id == 6){
                id5 = 6;
                if (tabla[1].code == "201"){
              $("#area"+id5).html(tabla[0].HTML);
            }
            }
            if(id <4){
              if (tabla[1].code == "201"){
                $("#area"+id).html(tabla[0].HTML);
              }
            }
          }
            });
      }

      function myf1() {
        document.getElementById("boton1").style.background= "#5454E8";
        document.getElementById("boton2").style.background= "#AFAFDB";
      }
      function myf2() {
        document.getElementById("boton1").style.background= "#AFAFDB";
        document.getElementById("boton2").style.background= "#5454E8";
      }
      function myf3() {
        document.getElementById("boton3").style.background= "#bdf445";
        document.getElementById("boton4").style.background= "#d6f484";
      }
      function myf4() {
        document.getElementById("boton3").style.background= "#d6f484";
        document.getElementById("boton4").style.background= "#bdf445";
      }
      function myf5() {
        document.getElementById("boton5").style.background= "#f93a5f";
        document.getElementById("boton6").style.background= "#f490a8";
      }
      function myf6() {
        document.getElementById("boton5").style.background= "#f490a8";
        document.getElementById("boton6").style.background= "#f93a5f";
      }
      function myf7() {
        document.getElementById("boton7").style.background= "#f4ba27";
        document.getElementById("boton8").style.background= "#f2d186";
      }
      function myf8() {
        document.getElementById("boton7").style.background= "#f2d186";
        document.getElementById("boton8").style.background= "#f4ba27";
      }
      function myf9() {
        document.getElementById("boton9").style.background= "#9d2eed";
        document.getElementById("boton10").style.background= "#d0a6f4";
      }
      function myf10() {
        document.getElementById("boton9").style.background= "#d0a6f4";
        document.getElementById("boton10").style.background= "#9d2eed";
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

    