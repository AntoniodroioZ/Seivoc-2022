<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Icons FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    {{-- Ajax JQuerry --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/Navbar.css')}}">
    

    <title>Modulo Administrador EPAOV</title>
</head>

<body style="background-image:  url('{{ asset('images/background.png') }}');">
    <nav class="navbar navbar-nav-scroll navbar-expand-md navbar-dark shadow sticky-top" id="navbar" style="background-color: #333978">
        <div class="container-md container-fluid">
            <a class="navbar-brand color-amarillo-base btn-footer nav-link" href="/">
                <img src="{{ asset('images/modulo_administrador/logo.png') }}" style="width: 10rem">
            </a>
            <button  class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                
                <ul class="navbar-nav">
                <li class="nav-link">
                    <a  class="nav-link text-white centrar-item-nav " aria-current="page" href="{{url('/')}}/moduloadmin">
                        <i class="d-block fas fa-crown icono-admin-navbar color-amarillo-base"></i><span class="color-amarillo-base">Modulo Administrador</span>
                    </a>
                </li>    
                <li class="nav-link">
                    <a  class="nav-link text-white centrar-item-nav" aria-current="page" href="{{url('/')}}/moduloadminEPAOV">
                        <i class="d-block far fa-hand-paper icono-mano-navbar color-amarillo-base"></i> <span class="color-amarillo-base">Informacion mano</span>
                    </a>
                </li>
                <li class="nav-link">
                    <p class="centrar-item-nav">
                        <a class="btn btn-primary " data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" style="width: 100%;">Secciones</a>
                      </p>
                      <div class="row">
                        <div class="col">
                          <div class="collapse multi-collapse" id="multiCollapseExample1">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="{{url('/moduloadminEPAOV/infografias') }}"><button type="button" class="btn btn-dark" style="width: 100%;">Infografias</button></a></li>
                                <li class="list-group-item"><a href="{{url('/moduloadminEPAOV/convocatorias') }}"><button type="button" class="btn btn-dark" style="width: 100%;">Convocatorias</button></a></li>
                                <li class="list-group-item"><a href="{{url('/moduloadminEPAOV/conferencias') }}"><button type="button" class="btn btn-dark" style="width: 100%;">Conferencias</button></a></li>
                                <li class="list-group-item"><a href="{{url('/moduloadminEPAOV/recursosapoyo') }}"><button type="button" class="btn btn-dark" style="width: 100%;">Recursos apoyo</button></a></li>
                                <li class="list-group-item"><a href="{{url('/moduloadminEPAOV/servicios') }}"><button type="button" class="btn btn-dark" style="width: 100%;">Servicios COE</button></a></li>
                              </ul>
                          </div>
                        </div>
                        
                      </div>
                </li>
                
                    {{-- <li class="nav-link">
                        <a  class="nav-link text-white centrar-item-nav" href="#">
                            <i class="d-block fas fa-folder-open icono-portfolio-navbar color-amarillo-base"></i><span class="text-white">Portafolio</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a  class="nav-link text-white centrar-item-nav" href="#">
                            <i class="d-block far fa-id-card icono-contact-navbar color-amarillo-base"></i><span class="text-white">Contacto</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="linea-div">            
    </div>
    <footer class="bg-secondary p-2 text-dark bg-opacity-10 sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright text-white">
                <span>
                    <br >Hecho en México, todos los derechos reservados. Esta página puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su dirección electrónica. De otra forma requiere permiso previo por escrito de la institución.Trabajo realizado con el apoyo del Programa UNAM-DGAPA-PAPIME, Proyecto PAPIME 302516, 303017, 303118<br><br>
                </span>
            </div>
            <div class="text-center my-auto copyright">
                <img src="{{ asset('images/modulo_administrador/footer.png') }}" width="50%">
            </div>
        </div>
    </footer>
</body>
</html>