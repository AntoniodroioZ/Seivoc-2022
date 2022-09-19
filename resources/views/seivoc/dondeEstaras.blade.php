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
    <div class="container centrar-menu">
      <div style="padding: 0rem 3rem;">        
        <a class=" MetaDataJCSeivoc" ReferenciaMetaSEIVOC="400" href="/dondeEstaras/foraneas">
        <input   class="" type="image" name="botondeenvio" src="{{ asset('/images/guia_interactiva/sedes-foraneas.png') }}"  >
      </a>
      </div>
      <div style="padding: 0rem 3rem;">
        <a class=" MetaDataJCSeivoc" ReferenciaMetaSEIVOC="440" href="/dondeEstaras/CDMX">
          {{-- <img src="{{ asset('/images/guia_interactiva/boton-3.png') }}" alt=""> --}}
          <input style=""  class="" type="image" name="botondeenvio" src="{{ asset('/images/guia_interactiva/cdmx-zona-conurbada.png') }}"  >
        </a>
      </div>
      <div style="padding: 0rem 3rem;">
        <a class=" MetaDataJCSeivoc" ReferenciaMetaSEIVOC="420" href="/dondeEstaras/CU">
          {{-- <img src="{{ asset('/images/guia_interactiva/boton-3.png') }}" alt=""> --}}
          <input style=""  class="" type="image" name="botondeenvio" src="{{ asset('/images/guia_interactiva/Boton-CU.png') }}"  >
        </a>
      </div>
    </div>
    <div class="container centrar-menu"> 
      <div class="menu-DE" style="">
        <a >
          <img src="{{ asset('/images/guia_interactiva/logotipo-sedes.png') }}" alt="">
        </a>
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
