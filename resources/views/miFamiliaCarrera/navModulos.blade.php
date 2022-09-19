<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link  rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-social.css') }}" >
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/sweetalert2/6.0.1/sweetalert2.min.css" rel="stylesheet"/>
    
    <script src="https://cdn.jsdelivr.net/sweetalert2/6.0.1/sweetalert2.min.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Mi Familia de Carreras</title>
</head>
 
<body>
    <nav class="navbar navbar-dark navbar-expand  fixed-top">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="col-12 col-md-2">
                <a class="navbar-brand mr-auto" href="{{url('/MiFamiliadeCarrera')}}"><img src="{{ asset('images/Logo.png') }}" height="40" width="60"></a>
            </div>
    
            <div class="col-12 col-md-4 offset-md-2">
                    <h1>Regr&eacute;senlos a CU</h1>
            </div>
            <div class="col-12 col-md-4 offset-1">
                    <p>Mi familia de carreras</p>
                    <p>
                  @guest
                    <a width="8%" style="margin-left: 10%; color: white;" href="{{ url('/registro') }}">Registro</a>
                    <a  width="8%" style=" color: white;">/</a>
                    <a  width="8%" style=" color: white;" href="{{ url('/login') }}">Iniciar Sesión</a>
                    <p id="mdseivoc" hidden></p>
                  @else
                    <a style="color: white; margin-left: 0%;" width="8%">
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
                  @endguest</p>
            </div>

            <div class="col-12 col-md-1">
                    <img src="{{ asset('images/familiadecarreras/Logo-MfdC.png') }}" height="30" width="30">
            </div>  
    </nav>

    @yield('content')

    <footer class="py-5" style="opacity: 1;background-color: rgb(178,102,255);color: rgb(6,37,91);filter: brightness(100%) contrast(100%);">
        <div class="container">
            <p class="text-center text-white m-0 small" style="font-size: 75%;"><br>Hecho en M&eacute;xico, todos los derechos reservados 2020. Esta pag&iacute;na puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su direcci&oacute;n electr&oacute;nica. De otra forma requiere permiso previo
                por escrito de la instituci&oacute;n.<br><br></p>
            <p class="text-center text-warning m-0 small" style="font-size: 75%;">Trabajo realizado con el apoyo del Programa UNAM - DGAPA-PAPIME 302516, 303017, 303118, 301119,v 300320 Sitio web administrado por:<br>Departamento de Orientaci&oacute;n Especializada&nbsp;<a href="mailto:vocacionenlineaunam@unam.mx">vocacionenlineaunam@unam.mx</a><br><br></p>
            <div
                class="text-center"><img src="{{ asset('images/imgUnam.png') }}" style="width: 15%;">
                <img style="width: 2%;"><img src="{{ asset('images/imgDGOAE.png') }}" style="width: 18%;">
                <img style="width: 2%;"><img src="{{ asset('images/imgDGAPA.png') }}" style="width: 8%;"></div>
        </div>
    </footer>

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
