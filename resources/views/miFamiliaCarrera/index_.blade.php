<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/dist/css/bootstrap.min.css') }}" type="text/css">
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-extension.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/navar.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-social.css') }}" >
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
 
    <title>Mi Familia de Carreras</title>
</head>
 
<body>
<header>
    <div class="pleca-superior">
      <img  src="{{ asset('images/Logo.png') }}" width="8%" style="margin-left: 5%;">
        @guest
        <a width="8%" style="margin-left: 70%; color: white;" href="{{ url('/registro') }}">Registro</a>
        <a  width="8%" style=" color: white;" >/</a>
        <a  width="8%" style=" color: white;" href="{{ url('/login') }}">Iniciar Sesión</a>
        
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
  </header>
    <header class="jumbotron">
        <div class="container">
            <div class="row row-header">
                <div class="col-12 col-sm-12 col-md-6 offset-md-4 " >
                    <img src="{{ asset('images/familiadecarreras/Logo-MfdC.png') }}" class="img-fluid" style="width: 60%">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 ">
                    <h1 class="text-center">Mi familia de carreras</h1>
                    <p class="text-center">Este m&oacute;dulo te permitir&aacute; conocer las actividades que se realizan en las cuatro &aacute;reas de conocimiento de la UNAM para que puedas distinguirlas y elegir la que m&aacute;s se adecue a tu perfil</p>
                </div>
            </div>
        </div>
    </header>

    
    <div class="container text-center">
        <h3 class="text-center">Bienvenido a Mi familia de carreras</h3>
        <video src="{{ asset('familiadecarreras/capsulaIntro.mp4') }}" style="width: 600px;" controls>
            <p>Su navegador no soporta v&iacute;deos HTML5.</p>
        </video>
    </div>

  
    <!--4 grupos de familias-->
    <div class="container">
        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-12  col-md-12" >
                <div class="media">
                    <div class="media-body">
                        <h2 class="mt-0" style="text-align: center;"> &iquest;Sab&iacute;as que las carreras de la UNAM se clasifican en &aacute;reas o campos de conocimiento que se asemejan a una familia&#63; </h2>
                        <!--mt es el margen superior-->
                        <p class="text-center">Todas las carreras dentro de la UNAM se agrupan en cuatro grandes "familias".</p>
                    </div>
                </div>
            </div>
            <div class="col col-sm  col-md" >
                <figure><img class="img3" src="{{ asset('images/familiadecarreras/Area_1.png') }}"><figcaption  style="text-align: center;">Ciencias F&iacute;sico-Matem&aacute;ticas y
                </figcaption><figcaption  style="text-align: center;">de las Ingenier&iacute;as</figcaption></figure>
            </div>
            <div class="col col-sm  col-md" >
                <figure><img class="img3" src="{{ asset('images/familiadecarreras/Area_2.png') }}"><figcaption  style="text-align: center;">Ciencias Biol&oacute;gicas
                </figcaption><figcaption  style="text-align: center;">y de la salud</figcaption></figure>   
            </div>
            <div class="col col-sm  col-md" >
                <figure><img class="img3" src="{{ asset('images/familiadecarreras/Area_3.png') }}"><figcaption  style="text-align: center;">Ciencias 
                </figcaption><figcaption  style="text-align: center;">Sociales
                </figcaption></figure>
            </div>
            <div class="col col-sm  col-md" >
                <a role="button"
                        data-toggle="tooltip" data-html="true"  title="<strong>Con fines didácticos nosotros dividiremos de ahora en adelante el área 4 en dos: Área 4.1 Humanidades y Área 4.2 de Artes</strong>"
                        data-placement="bottom">
                <figure><img class="img3" src="{{ asset('images/familiadecarreras/Area_4.png')}}"><figcaption  style="text-align: center;">Humanidades y las
                </figcaption><figcaption  style="text-align: center;">Artes</figcaption></figure>
            </a>
            </div>

        </div>
    </div>

    <!--Por qué llamamos familias-->
    <div class="container">
        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-12  col-md-12" >
                <div class="media">
                    <div class="media-body">
                        <h2 class="mt-0" style="text-align: center;">&iquest;Por qu&eacute; les llamamos "Familia"&#63;</h2>
                        <!--mt es el margen superior-->
                        <p class="text-center" >Les llamamos familia porque aunque son carreras diversas pertenecen a un &aacute;rea espec&iacute;fica dado que comparten caracter&iacute;sticas comunes, como una familia de personas, donde cada integrante tiene caracter&iacute;sticas de personalidad y gustos diferentes pero comparten un apellido y una forma de ver y entender al mundo en com&uacute;n.
                        Y pasa lo mismo con las carreras.</p>
                    </div>
                </div>
            </div>
            <div class="col col-sm  col-md" >
                <figure><img class="img2" src="{{ asset('images/familiadecarreras/PerArea_1.jpg')}}"></figure>
            </div>
            <div class="col col-sm  col-md" >
                <figure><img class="img2" src="{{ asset('images/familiadecarreras/PerArea_2.jpg')}}"></figure>
            </div>
            <div class="col col-sm  col-md" >
                <figure><img class="img2" src="{{ asset('images/familiadecarreras/PerArea_3.jpg')}}"></figure>   
            </div>
            <div class="col col-sm  col-md" >
                <figure><img class="img2" src="{{ asset('images/familiadecarreras/PerArea_4.jpg')}}"></figure>
            </div>
            <div class="col col-sm  col-md" >
                <figure><img class="img2" src="{{ asset('images/familiadecarreras/PerArea_5.jpg')}}"></figure>
            </div>
        </div>
    </div>



     <!--Puedo formar parte de alguna Familia -Descripcción de personajes-->
    <div class="container">
        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-12  col-md-12" >
                <div class="media">
                    <div class="media-body">
                        <h2 class="mt-0" id="descripcciones" style="text-align: center;"> &iquest;Puedo formar parte de alguna familia&#63;</h2>
                        <p class="text-center" >&iexcl;Claro&#33; De hecho, tus intereses, tus aptitudes, tu desempe&ntilde;o acad&eacute;mico, entre otros, depender&aacute; mucho de qu&eacute; tan afin seas a la familia. Por ejemplo:</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Codigo para lightbox de personajes-->
    <div class="container">
        <div class="row">
            <a data-toggle="modal" data-target="#exampleModalLong1" class="col-md-4">
                <figure><img class="img-fluid rounded" src="{{ asset('images/familiadecarreras/ImgArea_1.png')}}"><figcaption style="text-align: center;">Ciencias F&iacute;sico-Matem&aacute;ticas y
                </figcaption><figcaption  style="text-align: center;">de las Ingenier&iacute;as</figcaption></figure>
            </a>
            <a data-toggle="modal" data-target="#exampleModalLong2" class="col-md-4">
                <figure><img class="img-fluid rounded" src="{{ asset('images/familiadecarreras/ImgArea_2.png')}}"><figcaption  style="text-align: center;">Ciencias Biol&oacute;gicas y
                </figcaption><figcaption  style="text-align: center;">de la salud</figcaption></figure>
            </a>
            <a data-toggle="modal" data-target="#exampleModalLong3" class="col-md-4">
               <figure><img class="img-fluid rounded" src="{{ asset('images/familiadecarreras/ImgArea_3.png')}}"><figcaption  style="text-align: center;">Ciencias Sociales
                </figcaption ><figcaption  style="text-align: center;"></figcaption></figure>
            </a>
        </div>
        <div class="row">
                <a data-toggle="modal" data-target="#exampleModalLong4" class="col-md-4 offset-md-1">
                   <figure><img class="img-fluid rounded" src="{{ asset('images/familiadecarreras/ImgArea_4.png')}}"><figcaption  style="text-align: center;">Humanidades
                    </figcaption><figcaption  style="text-align: center;"></figcaption></figure>
                </a>
                <a data-toggle="modal" data-target="#exampleModalLong4-1" class="col-md-4  offset-md-2">
                    <figure><img class="img-fluid rounded" src="{{ asset('images/familiadecarreras/ImgArea_5.png')}}"><figcaption  style="text-align: center;">Artes
                    </figcaption><figcaption  style="text-align: center;"></figcaption></figure>
                </a> 
        </div>
    </div>



    <!-- Modal para ingenieria -->
   <div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle1">Ciencias F&iacute;sico-Matem&aacute;ticas y de las Ingenier&iacute;as</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="content">
                    <img class="imgP" src="{{ asset('images/familiadecarreras/Area1_SN.png')}}">
                <table class="t1">
                        <tr><th>Conocimientos necesarios</th>
                            <th>Caracter&iacute;sticas de personalidad </th>

                        </tr>
                        <tr>
                            <td>- Matem&aacute;tica</td>
                            <td>- Met&oacute;dico </td>
                        </tr>
                        <tr>
                            <td>- Geometr&iacute;a </td>
                            <td>- Preciso</td>
                        </tr>                    
                        <tr>
                            <td>- &Aacute;lgebra </td>
                            <td>- L&oacute;gico</td>
                        </tr>
                           
                        </tr>
                        <tr>
                            <td>- Ecuaciones</td>
                            <th>Valores asociados </th>
                            
                            
                        </tr>
                        <tr>
                            <td>- F&iacute;sica</td>
                            <td>-Inovaci&oacute;n</td>
                        </tr>
                         <tr>
                            <td>     </td>
                            <td>- Conocimiento</td>
                        </tr>
     
                </table>

                <table class="t1-1">
                        <tr><th>Aptitudes</th>
                        <tr>
                            <td>-Capacidad para entender el funcionamiento de las m&aacute;quinas y usar herramientas</td>
                        </tr>
                        <tr>
                            <td>-Capacidad para observar e interpretar fen&oacute;menos f&iacute;sicos</td>
            
                        </tr>
                        <tr>
                            <td>-Manejo de diferentes lenguajes o simbolismos: f&oacute;rmulas, algoritmos y ecuaciones, etc </td>
                        </tr>
                        <tr>
                            <td>-Capacidad de abstracci&oacute;n, observaci&oacute;n y an&aacute;lisis</td>
                        </tr>
                        <tr>
                            <td>-Analizar, sintetizar y resolver problemas en forma pr&aacute;ctica</td>
                        </tr>
                        <tr>
                            <td>-Capacidad de observaci&oacute;n y percepci&oacute;n visual para manejar formas y dimensiones</td>
                        </tr>
                        <tr>
                            <td>- Habilidad para aplicar los conocimientos en la creaci&oacute;n o modificaci&oacute;n de productos.</td>
                        </tr>
                        
                </table>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="b1" data-dismiss="modal">Regresar</button>
          </div>
        </div>
      </div>
    </div>
    <!--Personaje 2-->


    <!-- Modal para ingenieria -->
    <div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle2">Ciencias Biol&oacute;gicas y de la Salud</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="content">
                    <img class="imgP" src="{{ asset('images/familiadecarreras/Area2_SN.png')}}">
                <table class="t2">
                        <tr><th>Conocimientos necesarios</th>
                            <th>Caracter&iacute;sticas de personalidad </th>

                        </tr>
                        <tr>
                            <td>- Qu&iacute;mica</td>
                            <td>- Disposici&oacute;n para trabajar en equipo</td>
                        </tr>
                        <tr>
                            <td>- Biolog&iacute;a  </td>
                            <td>- Vocaci&oacute;n de servicioo</td>
                        </tr>                    
                        <tr>
                            <td>-Matem&aacute;ticas </td>
                            <td>      </td>


        
                        </tr>
                           
                        </tr>
                        <tr>
                            <td>- F&iacute;sica </td>
                            <th>Valores asociados </th>
                            
                            
                        </tr>
                        <tr>
                            <td>        </td>
                            <td>- Empat&iacute;a</td>
                        </tr>
                         <tr>
                            <td>     </td>
                            <td>- Altruismo</td>
                        </tr>
     
                </table>

                <table class="t2-2">
                        <tr><th>Aptitudes</th>
                        <tr>
                            <td>-Servicio social</td>
                        </tr>
                        <tr>
                            <td>-Memoria visual y destreza manual para realizar actividades de precisi&oacute;n</td>
            
                        </tr>
                        <tr>
                            <td>-Capacidad de observaci&oacute;n y percepci&oacute;n visual para manejar formas y dimensiones </td>
                        </tr>
                        <tr>
                            <td>-Comprensi&oacute;n del movimiento de objetos</td>
                        </tr>
                        <tr>
                            <td>-Velocidad perceptual</td>
                        </tr>
                        <tr>
                            <td>-Manejo de instrumentos de laboratorio</td>
                        </tr>
                        <tr>
                            <td>-H&aacute;bitos para el estudio constante</td>
                        </tr>
                        <tr>
                            <td>-Capacidad de trabajo prolongado y bajo presi&oacute;n</td>
                        </tr>
                        <tr>
                            <td>-Capacidad de abstracci&oacute;n, observaci&oacute;n y an&aacute;lisis</td>
                        </tr>
                        <tr>
                            <td>-Capacidad para observar y explicar diversos procesos biol&oacute;gicos o fen&oacute;menos naturales.</td>
                        </tr>
                        
                </table>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="b2" data-dismiss="modal">Regresar</button>
          </div>
        </div>
      </div>
    </div>

    <!--Personaje 3-->
    <!-- Modal para ingenieria -->
    <div class="modal fade" id="exampleModalLong3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle3">Ciencias Sociales</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="content">
                    <img class="imgP" src="{{ asset('images/familiadecarreras/Area3_SN.png')}}">
                <table class="t3">
                        <tr><th>Conocimientos necesarios</th>
                            <th>Caracter&iacute;sticas de personalidad </th>

                        </tr>
                        <tr>
                            <td>- Sociolog&iacute;a </td>
                            <td>- Persuasivos</td>
                        </tr>
                        <tr>
                            <td>- Derecho </td>
                            <td>- Liderazgo</td>
                        </tr>                    
                        <tr>
                            <td>- Econom&iacute;a </td>
                            <td>      </td>


        
                        </tr>
                           
                        </tr>
                        <tr>
                            <td>- Matem&aacute;ticas (estad&iacute;stica) </td>
                            <th>Valores asociados </th>
                            
                            
                        </tr>
                        <tr>
                            <td>        </td>
                            <td>- Justicia social</td>
                        </tr>
                         <tr>
                            <td>     </td>
                            <td>- &Eacute;tica econ&oacute;mica</td>
                        </tr>
     
                </table>

                <table class="t3-3">
                        <tr><th>Aptitudes</th>
                        <tr>
                            <td>- Capacidad de razonamiento argumentativo</td>
                        </tr>
                        <tr>
                            <td>- Capacidad de b&uacute;squeda, an&aacute;lisis y s&iacute;ntesis de informaci&oacute;n</td>
            
                        </tr>
                        <tr>
                            <td>- Facilidad para comunicar ideas de forma oral y escrita</td>
                        </tr>
                        <tr>
                            <td>- Habilidades para la gram&aacute;tica, la redacci&oacute;n</td>
                        </tr>
                        <tr>
                            <td>- H&aacute;bito y aptitud para la lectura</td>
                        </tr>
                        <tr>
                            <td>- Habilidad para trabajar en equipo</td>
                        </tr>
                        <tr>
                            <td>- Capacidad para la negociaci&oacute;n y conciliaci&oacute;n en equipo</td>
                        </tr>
                        <tr>
                            <td>- Capacidad de organizaci&oacute;n</td>
                        </tr>
                        <tr>
                            <td>- Capacidad para observaci&oacute;n cr&iacute;tica.</td>
                        </tr>
                        
                </table>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="b3" data-dismiss="modal">Regresar</button>
          </div>
        </div>
      </div>
    </div>



    <!--Personaje 4-->
    <!-- Modal para ingenieria -->
    <div class="modal fade" id="exampleModalLong4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle4">Humanidades</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="content">

                    <img class="imgP" src="{{ asset('images/familiadecarreras/Area4_SN.png')}}">
                <table class="t4">
                        <tr><th>Conocimientos necesarios</th>
                            <th>Caracter&iacute;sticas de personalidad </th>

                        </tr>
                        <tr>
                            <td>- Filosof&iacute;a </td>
                            <td>- Poseer amplia cultura</td>
                        </tr>
                        <tr>
                            <td>- Literatura </td>
                            <td>- Disposici&oacute;n al di&aacute;logo</td>
                        </tr>                    
                        <tr>
                            <td>- Historia  </td>
                            <td> - Abrirse a nuevas perspectivas y a nuevos contextos   </td>


        
                        </tr>
                           
                        </tr>
                        <tr>
                            <td>    </td>
                            <th>Valores asociados </th>
                            
                            
                        </tr>
                        <tr>
                            <td>        </td>
                            <td>- Filos&oacute;fico</td>
                        </tr>
                         <tr>
                            <td>     </td>
                            <td>- Literario</td>
                        </tr>
     
                </table>

                <table class="t4-4">
                        <tr><th>Aptitudes</th>
                        <tr>
                            <td>- H&aacute;bito y aptitud para la lectura</td>
                        </tr>
                        <tr>
                            <td>- Capacidad de investigaci&oacute;n documental</td>
            
                        </tr>
                        <tr>
                            <td>- Capacidad de trabajo en equipo. </td>
                        </tr>
                        <tr>
                            <td>- Hablar y escribir correctamente</td>
                        </tr>
                        <tr>
                            <td>- Capacidad reflexiva y discursiva</td>
                        </tr>
                        <tr>
                            <td>- Capacidad argumentativa y cr&iacute;tica.</td>
                        </tr>     
                </table>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="b4" data-dismiss="modal">Regresar</button>
          </div>
        </div>
      </div>
    </div>





    <!--Personaje 4-1-->
    <!-- Modal para ingenieria -->
    <div class="modal fade" id="exampleModalLong4-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle4-1">Artes</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="content">
                    <img class="imgP" src="{{ asset('images/familiadecarreras/Area5_SN.png')}}">
                <table class="t4v">
                        <tr><th>Conocimientos necesarios</th>
                            <th>Caracter&aacute;sticas de personalidad </th>

                        </tr>
                        <tr>
                            <td>- Historia </td>
                            <td>- Sensibilidad y creatividad.</td>
                        </tr>
                        <tr>
                            <td>- Est&eacute;tica </td>
                            <td>       </td>
                        </tr>                    
                           
                        </tr>
                        <tr>
                            <td>    </td>
                            <th>Valores asociados </th>
                            
                            
                        </tr>
                        <tr>
                            <td>        </td>
                            <td>- Est&eacute;tico</td>
                        </tr>
     
                </table>

                <table class="t4v-4">
                        <tr><th>Aptitudes</th>
                        <tr>
                            <td>- Capacidad creativa</td>
                        </tr>
                        <tr>
                            <td>- Capacidad para la apreciaci&oacute;n est&iacute;tica</td>
            
                        </tr>
                        <tr>
                            <td>- Capacidad de observaci&oacute;n para distinguir formas, colores y dimensiones </td>
                        </tr>
                        <tr>
                            <td>- Facilidad para imaginar formas, colores y vol&aucute;menes</td>
                        </tr>
                        <tr>
                            <td>- Destreza manual para el dibujo y el manejo de instrumentos de precisi&oacute;n</td>
                        </tr>
                        <tr>
                            <td>- Capacidad para interpretar la m&uacute;sica y para seguir un ritmo musical.</td>
                        </tr>  

                         <tr>
                            <td>- Capacidad mover el cuerpo de acuerdo a los par&aacute;metros de un espacio determinado</td>
                        </tr>     
                </table>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="b4v" data-dismiss="modal">Regresar</button>
          </div>
        </div>
      </div>
    </div>

    <!--Agrupacion de carreras por otras universidades-->
    <div class="container">
        <div class="row row-content">
            <div class="col-12 col-sm-12  col-md-12" >
                <div class="media">
                    <div class="media-body">
                        <h2 class="mt-0" style="text-align: center;">&iquest;S&oacute;lo en la UNAM existen clasificaciones por &aacute;reas&#63;</h2>
                        <!--mt es el margen superior-->
                        <p class="text-center">No. Todas las Universidades dan una organizaci&oacute;n a sus carreras. Observa algunos ejemplos </p>
                    </div>
                </div>
            </div>
            <div class="col col-sm-6  col-md-6 "  >
               <img class="img4" src="{{ asset('images/familiadecarreras/Esquema_SE_UAM.png')}}">
            </div>
            <div class="col col-sm-6  col-md-6 " >
                <img class="img4" src="{{ asset('images/familiadecarreras/Esquema_SE_IPN.png')}}">
            </div>
            
        </div>
    </div>

    <!--Vamos a explorar-->
    <div class="container">
        <div class="row row-content">
            <div class="col-12 col-sm-12  col-md-12" >
                <div class="media">
                    <div class="media-body">
                        <h2 class="mt-0" style="text-align: center;">Veamos</h2>
                        <!--mt es el margen superior-->
                        <p class="text-center">Ahora que ya conoces las familias de carreras.</p>
                        <p class="text-center">&iquest;Te identificas con alguna de ellas&#63;</p>
                        <p class="text-center">Si a&uacute;n no lo haces, no te preocupes, explora el siguiente m&oacute;dulo en donde &iexcl;podr&aacute;s ser parte de una experiencia magn&iacute;fica&#33;</p>
                    </div>
                </div>
            </div>
            <div class="col col-sm-6  col-md-5 offset-2 offset-md-3" >
              <a role="button" class="vamos bbtn btn-block nav-link btn-info" 
                        href="{{url('/MiFamiliadeCarrera/HomeR')}}">&iexcl;Vamos a explorar&#33;</a>
            </div>  
      
        </div>
    </div>

    </div><!--Ultimo div del body-->
      <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/js/popper.min.js') }}"></script>
      <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script>
         $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>