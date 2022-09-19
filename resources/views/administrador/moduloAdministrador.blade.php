<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Seivoc Monitoreo</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">

    <link rel="stylesheet" href="{{ asset('assetsG/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsG/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsG/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsG/fonts/fontawesome5-overrides.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsG/css/Table-with-search-1.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsG/css/Table-with-search.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/administrador.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    
    {{-- Highcharts --}}
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/item-series.js"></script>
    
    

    <script src="{{ asset('assetsG/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assetsG/js/chart.min.js') }}"></script>
    <script src="{{ asset('assetsG/js/bs-init.js') }}"></script>
    <script src="{{ asset('assetsG/js/Table-with-search.js') }}"></script>
    <script src="{{ asset('assetsG/js/theme.js') }}"></script>
    
    <script src="{{asset('js/Grafica/grafica.js')}}"></script>


</head>

 
<body id="page-top" style="margin: -29px;">
    <meta name="csrf-token" content="{{ Session::token() }}"> 
    {{--Variables que ayudan a ver los filtros de la pagina--}}
    <input   id="Situacion" value="" style="display:none; ">    
    <input   id="Modalidad" value="" style="display:none; ">
    <input   id="Grado" value="" style="display:none; ">
    <input   id="Escuela" value="" style="display:none; ">
    <input   id="Plantel" value="" style="display:none; ">
    <input   id="TipoGrafica" value="-1" style="display:none; ">
    <input   id="EspecialidadGrafica" value="0" style="display:none; ">
    {{--Fin de variables--}}
    <div id="wrapper" class="row ">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion p-0 col-2 " style="background-color: #333978; margin-left: 1rem;">
            <div class="container-fluid d-flex flex-column p-0" style="padding: 1rem">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="{{ url('/') }}">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"></div>
                    <img src="{{ asset('images/modulo_administrador/logo.png') }}" width="50%" style="margin-top: 2rem;">
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation">
                        @for ($i = 0; $i < sizeof($rol); $i++)
                            @if ($rol[$i]==1)
                            <div class="nav-item dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="color: rgb(255,255,255); text-decoration: none;">
                                    <i class="far fa-user"></i>&nbsp; Estadisticas <i class=""></i>
                                </a>
                                {{--La funcion Aplicar Filtro el primer parametro sera el tipo de grafica o estructura de graficas y la segunda variable sera lo que especifique el tipo--}}
                                {{--Procurar que la estructura se respete--}}
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" role="presentation" href="#" onclick="AplicarFiltro(0,1)">Escalas Únicas</a>
                                    <a class="dropdown-item" role="presentation" href="#" onclick="AplicarFiltro(0,2)">Perfiles Ideales</a>
                                    <a class="dropdown-item" role="presentation" href="#" onclick="AplicarFiltro(0,3)">Perfiles Inexistentes</a>
                                    <a class="dropdown-item" role="presentation" href="#" onclick="AplicarFiltro(0,4)">Todos los perfiles</a>
                                </div>
                            </div>
                            @endif
                            @if ($rol[$i]==2)
                        
                        <div class="nav-item dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="color: rgb(255,255,255); text-decoration: none;">
                                <i class="far fa-user"></i>&nbsp; Preguntas de B <i class=""></i>
                            </a>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" role="presentation" href="#" onclick="AplicarFiltro(1,1)">Para qué crees que te servirá contestar el presente cuestionario de Intereses</a>
                                <a class="dropdown-item" role="presentation" href="#" onclick="AplicarFiltro(1,2)">Has pensado en alguna opción de carrera</a>
                                <a class="dropdown-item" role="presentation" href="#" onclick="AplicarFiltro(1,3)">Qué campo de conocimiento te interesa para realizar estudios de nivel superior</a>
                                <a class="dropdown-item" role="presentation" href="#" onclick="AplicarFiltro(1,4)">Por qué quieres seguir estudiando</a>
                            </div>
                        </div>
                        @endif
                        @if ($rol[$i]==3)
                        
                        <div class="nav-item dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="color: rgb(255,255,255); text-decoration: none;">
                                <i class="far fa-user"></i>&nbsp; Preguntas de E. <i class=""></i>
                            </a>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" role="presentation" href="#"  onclick="AplicarFiltro(2,1)">cumplio expectativa</a>
                                <a class="dropdown-item" role="presentation" href="#"  onclick="AplicarFiltro(2,2)">De acuerdo resultados</a>
                                <a class="dropdown-item" role="presentation" href="#"  onclick="AplicarFiltro(2,3)">Utilidad resultados_retro</a>
                                <a class="dropdown-item" role="presentation" href="#"  onclick="AplicarFiltro(2,4)">Instrucciones sistema</a>
                                <a class="dropdown-item" role="presentation" href="#"  onclick="AplicarFiltro(2,5)">Presentacion sistema</a>
                                <a class="dropdown-item" role="presentation" href="#"  onclick="AplicarFiltro(2,6)">Navegacion sistema</a>
                                <a class="dropdown-item" role="presentation" href="#" onclick="AplicarFiltro(2,7)">Presentacion resultados</a>
                                <a class="dropdown-item" role="presentation" href="#"  onclick="AplicarFiltro(2,8)">Organizazion pantallas</a>
                                <a class="dropdown-item" role="presentation" href="#"  onclick="AplicarFiltro(2,9)">Seccion contribuyo mas</a>
                            </div>
                        </div>
                        @endif
                        @if ($rol[$i]==4)
                        <div class="nav-item">
                            <a class="" href="{{ url('/moduloadminEPAOV') }}" style="color: rgb(255,255,255); text-decoration: none;">
                                <i class="far fa-user"></i>&nbsp; EPAOV<i class="" ></i>
                            </a>
                        </div>
                        @endif

                        @endfor
                        
                        
                        
                        <div class="nav-item">
                            <a class="btn btn-secondary" onclick="LimpiarFiltros()">Limpiar Filtros</a>  
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="d-flex flex-column text-center col-9" id="content-wrapper" style="width: 80%">
            <div id="content">
                <div class="row">
                        <div class="col">
                            
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0"> <img src=" {{ asset('images/modulo_administrador/GIFSF.gif') }}" width="30%"><br>Filtros</h6>
                                    <div class="btn btn-group" role="group" style="width: 100%;">

                                        <div class="dropdown btn-group" role="group" style="width: 100%;">
                                          <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Situacion Escolar</button>
                                          <div class="dropdown-menu" role="menu">
                                              <a class="dropdown-item" role="presentation" onclick="SituacionFiltro(-1)">Todos</a>
                                              @foreach($Datos['Situaciones'] as $Situacion)
                                              	<a class="dropdown-item" role="presentation" onclick="SituacionFiltro({{$Situacion->situacion_id}})">{{$Situacion->descripcion}}</a>
                                              @endforeach
                                          </div>
                                        </div>
                                        <div class="dropdown btn-group" role="group" style="width: 100%;">
                                           <button  class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Nivel Educativo</button>
                                            <div class="dropdown-menu" role="menu">
                                            	@foreach($Datos['GradoEducativo'] as $Grado)
                                            		<a class="dropdown-item" role="presentation" onclick="GradoFiltro({{$Grado->grado_id}})">{{$Grado->descripcion}}</a>
                                            	@endforeach
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <br><br>
                                     <div class="btn-group" role="group" style="width: 100%;">
                                        <div id='Escuelas' style="width: 100%;" style="display: none;">
                                            
                                        </div>
                                        <div id='Planteles' style="width: 100%;" style="display: none;">
                                            
                                        </div>
                                       
                                        <div id='Modalidades' style="width: 100%;" style="display: none;">
                                            
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="btn-group col" role="group" style="width: 100%;">
                                            <div class="dropdown btn-group col " role="group" style="width: 100%;">
                                                <label for="example-datetime-local-input" class="col-form-label" >
                                                    Fecha inicio
                                                </label>
                                                <div class="col-10">
                                                    <input class="form-control" type="datetime-local" value="1996-01-01T00:00:00" id="FechaInicio">
                                                </div>
                                            </div>
                                            <div class="dropdown btn-group col" role="group" style="width: 100%;">
                                                <label for="example-datetime-local-input"class="col-form-label" >
                                                    Fecha fin
                                                </label>
                                                <div class="col-10">
                                                    <input class="form-control" type="datetime-local" value="2020-12-31T00:00:00" id="FechaFinal">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---->
                    <div class="row">
                        <div id="TotalUsuaios_div" class="col-md-6 col-xl-6 mb-6">
                            <div class="card shadow border-left-success py-2" style="background-color: rgb(146,194,138);">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1">
                                                <span style="color: rgb(0,0,0);font-size: 15px;">Total de &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;usuarios</span>
                                            </div>
                                            <div class="text-dark font-weight-bold h5 mb-0">
                                                <i  class="fab fa-neos fa-2x text-gray-300"></i>
                                                <span  id="TotalUsuaios"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="Usuario_Registro_div" class="col-md-6 col-xl-6 mb-6">
                            <div class="card shadow border-left-info py-2" style="background-color: rgb(200,171,171);font-size: 15px;">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-info font-weight-bold text-xs mb-1">
                                                <span data-aos="fade" style="color: rgb(0,0,0);font-size: 15px;">Usuarios que solo se registraron</span>
                                            </div>
                                            <div class="text-dark font-weight-bold h5 mb-0" style="color: rgb(255,255,255);">
                                                <i class="fab fa-neos fa-2x text-gray-300"></i>
                                                <span id="Usuario_Registro"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <!----->
                    <div class="row">
                        <div class="col-md-6 col-xl-4 mb-4">
                            <div class="card shadow border-left-success py-2" style="background-color: rgb(146,194,138);">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1">
                                                <span style="color: rgb(0,0,0);font-size: 15px;">Usuarios que solo contestaron el registro complementario</span>
                                            </div>
                                            <div class="text-dark font-weight-bold h5 mb-0">
                                                <i  class="fab fa-neos fa-2x text-gray-300"></i>
                                                <span  id="Usuario_Registro_Complementario"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4 mb-4">
                            <div class="card shadow border-left-info py-2" style="background-color: rgb(200,171,171);">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-info font-weight-bold text-xs mb-1">
                                                <span style="color: rgb(0,0,0);font-size: 15px;">Usuarios que contestaron <br>las 61 preguntas</span>
                                            </div>
                                            <div class="text-dark font-weight-bold h5 mb-0" style="color: rgb(255,255,255);">
                                                <i class="fab fa-neos fa-2x text-gray-300"></i>
                                                <span id="Alumno_Cuestionario"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4 mb-4">
                            <div class="card shadow border-left-warning py-2" style="background-color: #333978;">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-warning font-weight-bold text-xs mb-1">
                                                <span style="font-size: 14px;">Usuarios que  <br> regresaron</span>
                                                <div class="text-dark font-weight-bold h5 mb-0">
                                                    <i class="fab fa-neos fa-2x text-gray-300"></i>
                                                    <span  style="color: rgb(255,255,255);" id="Alumno_evaluacion"></span>
                                                    <!--&nbsp; 215,000-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="container-fluid">

                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Filtros</h3><div class="text-dark mb-3"id="Filtro"></div>
                        {{-- <a class="btn btn-primary btn-sm d-none d-sm-inline-block" href="{{ route('excel-file',['type'=>'csv']) }}"><i class="fa fa-download" aria-hidden="true"></i> Descargar reporte</a> --}}
                    </div>                   
                </div>
                <div class="row">
                        <div class="col">
                             <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0">Seivoc </h6>
                                </div>
                                <div class="container text-center">
                                    <div id="Graficav2" style="width: 100%; min-width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
            <div class="row">
                        <div class="col">
                             <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0">Poblacion de Seivoc clasificada por sexo</h6>
                                </div>
                                <div class="container text-center">
                                    <div id="GraficaSv2" style="width: 100%; min-width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
            <div class="row">
                        <div class="col">
                             <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0">Poblacion de Seivoc clasificada por edad</h6>
                                </div>
                                <div class="container text-center">
                                    <div id="GraficaEv2" style="width: 100%; min-width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright">
                        <span>
                            <br>Hecho en México, todos los derechos reservados. Esta página puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su dirección electrónica. De otra forma requiere permiso previo por escrito de la institución.Trabajo realizado con el apoyo del Programa UNAM-DGAPA-PAPIME, Proyecto PAPIME 302516, 303017, 303118<br><br>
                        </span>
                    </div>
                    <div class="text-center my-auto copyright">
                        <img src="{{ asset('images/modulo_administrador/footer.png') }}" width="50%">
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
