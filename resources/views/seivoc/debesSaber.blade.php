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
    <div class="container">
        <div class="centrar-item seleccion-DS">
          <div class="text-center " style="">
            <div class="container">
                <div class="row">
                  <div class="col">
                    <img style="" onclick="cambiarImagenJS(1),obtenerModalidades(),limpiarDescripcionCarrera(1)" class="cuadros-Debessaber MetaDataJCSeivoc" ReferenciaMetaSEIVOC="301" id="imagenSeleccionar1" src="{{ asset('/images/guia_interactiva/modalidad.png') }}" alt="">
                  </div>
                  <div class="col">
                    <img onclick="cambiarImagenJS(2),obtenerNuevasCarreras(),descripcionNuevasCarreras(),limpiarDescripcionCarrera(2)" class="cuadros-Debessaber MetaDataJCSeivoc" ReferenciaMetaSEIVOC="302" id="imagenSeleccionar2" src="{{ asset('/images/guia_interactiva/nuevas-carreras.png') }}" alt="">
                  </div>
                  <div class="col">
                    <img onclick="cambiarImagenJS(3),obtenerCarrerasDirectas(),obtenerDescripciones(1),limpiarDescripcionCarrera(2)" class="cuadros-Debessaber MetaDataJCSeivoc" ReferenciaMetaSEIVOC="303" id="imagenSeleccionar3" src="{{ asset('/images/guia_interactiva/ingreso-directo.png') }}" alt="">
                  </div>
                  <div class="col">
                    <img onclick="cambiarImagenJS(4),obtenerCarrerasIndirectas(),obtenerDescripciones(2),limpiarDescripcionCarrera(2)" class="cuadros-Debessaber MetaDataJCSeivoc" ReferenciaMetaSEIVOC="304" id="imagenSeleccionar4" src="{{ asset('/images/guia_interactiva/ingreso-indirecto.png') }}" alt="">
                  </div>
                  <div class="col">
                    <img onclick="cambiarImagenJS(5),obtenerCarrerasPrerrequisitos(),obtenerDescripciones(3),limpiarDescripcionCarrera(2)" class="cuadros-Debessaber MetaDataJCSeivoc" ReferenciaMetaSEIVOC="305" id="imagenSeleccionar5" src="{{ asset('/images/guia_interactiva/prerrequisitos.png') }}" alt="">
                  </div>
                  <div class="col">
                    <a href="{{url("/")}}/queTanDificilSera" class=" MetaDataJCSeivoc" ReferenciaMetaSEIVOC="11">
                      <img onclick=""  class="cuadros-Debessaber" id="imagenSeleccionar5" src="{{ asset('/images/guia_interactiva/boton-a-b-c.gif') }}" alt="">
                    </a>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-1" >
            <div class="col" >
              <div class="card shadow-sm " style="  border-radius:  50px 50px 50px 50px; ">                
                <div class="card-body">
                  <div class="container">
                    <div class="row ">
                      <div id="titulos" class="col-md-2 caja-titulos" style="">
                        <div class="cuadro-blanco">
                            <div style="height: 1.1rem;"></div>
                            <div class="cuadro-relleno" id="seleccionDato">
                                {{-- <p>Selecciona la categoría de tu interés</p> --}}
                                <img id="imagenSeleccionada" src="" alt="">
                            </div>
                        </div>                        
                        <div id="descripcion">
                          <h2>Selecciona un cuadro para obtener información:</h2>
                        </div>
                      </div>
                      <div class="col-sm caja-descripciones" style="">
                        <div class="container">
                          <br>
                          {{-- <div id="descripcion"> --}}
                              
                            
                              {{-- <h2>Modalidades:</h2>
                              <a href="">
                                <h3>Escolarizado:</h3>
                              </a>
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam eum at repellat officiis ullam voluptatibus iusto corporis labore quaerat, illum nemo tempore perferendis consequatur eius vitae a architecto earum illo!</p> --}}
                            {{-- </div> --}}
                            <div id="descripcionCarreras">
                              {{-- <h5>Selecciona una carrera para obtener mas información.</h5> --}}
                            </div> 
                        </div>
                      </div>
                      <div class="col-md-3 caja-descripciones" style="">
                        <div class="container">                      
                          <div id="carreras">

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
          <a href="/guiaInteractiva">
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
        function cambiarImagenJS(id){
          id = "imagenSeleccionar" + id
          nombreId = document.getElementById(id).src;
          console.log(nombreId)
          document.getElementById("imagenSeleccionada").src=nombreId;
          
        }
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
        function obtenerNuevasCarreras(){
          $.ajax({
          type: "POST",
          data: {"_token": $("meta[name='csrf-token']").attr("content")
          
        },
        url:"{{url("/")}}/api/nuevasCarreras",
        success: function (data) {
          const tabla = JSON.parse(data);
          console.log(tabla[1].code);
          if (tabla[1].code == "201"){
            $("#carreras").html(tabla[0].HTML);
          }
          }
          });
        }
        function obtenerCarrerasIndirectas(){
          $.ajax({
          type: "POST",
          data: {"_token": $("meta[name='csrf-token']").attr("content")
          
        },
        url:"{{url("/")}}/api/ingresoIndirectoCarreras",
        success: function (data) {
          const tabla = JSON.parse(data);
          console.log(tabla[1].code);
          if (tabla[1].code == "201"){
            $("#carreras").html(tabla[0].HTML);
          }
          }
          });
        }
        function obtenerCarrerasDirectas(){
          $.ajax({
          type: "POST",
          data: {"_token": $("meta[name='csrf-token']").attr("content")
          
        },
        url:"{{url("/")}}/api/ingresoDirectoCarreras",
        success: function (data) {
          const tabla = JSON.parse(data);
          console.log(tabla[1].code);
          if (tabla[1].code == "201"){
            $("#carreras").html(tabla[0].HTML);
          }
          }
          });
        }
        function obtenerCarrerasPrerrequisitos(){
          $.ajax({
          type: "POST",
          data: {"_token": $("meta[name='csrf-token']").attr("content")
          
        },
        url:"{{url("/")}}/api/prerrequisitosCarreras",
        success: function (data) {
          const tabla = JSON.parse(data);
          console.log(tabla[1].code);
          if (tabla[1].code == "201"){
            $("#carreras").html(tabla[0].HTML);
          }
          }
          });
        }
        function obtenerModalidades(){
          $.ajax({
          type: "POST",
          data: {"_token": $("meta[name='csrf-token']").attr("content")
          
        },
        url:"{{url("/")}}/api/obtenerModalidades",
        success: function (data) {
          const tabla = JSON.parse(data);
          console.log(tabla[1].code);
          if (tabla[1].code == "201"){
            $("#descripcion").html(tabla[0].HTML);
            $("#carreras").html("");
          }
          }
          });
        }
        function obtenerCarrerasModalidades(id){
          $.ajax({
          type: "POST",
          data: {"_token": $("meta[name='csrf-token']").attr("content"),
          "modalidades_id":id
          
        },
        url:"{{url("/")}}/api/obtenerCarrerasModalidades",
        success: function (data) {
          const tabla = JSON.parse(data);
          console.log(tabla[1].code);
          if (tabla[1].code == "201"){
            $("#carreras").html(tabla[0].HTML);
            $("#descripcionCarreras").html("<h3>Selecciona una carrera para obtener mas información.</h3>");
          }
          }
          });
        }
        function descripcionNuevasCarreras(){
          descripcion = "<h2 <p style='font-size:1.2rem;'>Son las carreras que la UNAM ha aprobado a partir de 2015 y que responde a las necesidades sociales y laborales del país.</p>"
          $("#descripcion").html(descripcion);
        }
        function obtenerDescripciones(id){
          $.ajax({
          type: "POST",
          data: {"_token": $("meta[name='csrf-token']").attr("content"),
          "tipo_ingreso_id":id
          
        },
        url:"{{url("/")}}/api/ObtenerDescripciones",
        success: function (data) {
          const tabla = JSON.parse(data);
          console.log(tabla[1].code);
          if (tabla[1].code == "201"){
            $("#descripcion").html(tabla[0].HTML);
          }
          }
          });
        }
        function cambioDescripcion(id){
          {
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
        }
        }
        function limpiarDescripcionCarrera(selector){
          $("#descripcionCarreras").html("");
          if(selector == 1){
            $("#descripcionCarreras").html("<h3>Selecciona una modalidad para obtener mas información.</h3>");
          }else{
            $("#descripcionCarreras").html("<h3>Selecciona una carrera para obtener mas información.</h3>");
          }
          
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

    