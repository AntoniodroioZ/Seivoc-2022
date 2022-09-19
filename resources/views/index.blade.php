@extends('welcome')
@section('contenido')
<br><br><br>
<img src="{{ asset('images/info-1.png') }}" width="110%"  >
<a href="{{ url('/about') }}">
<button type="button" class="btn btn-warning  btn-lg btn-block MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1" >&nbsp;&nbsp;&nbsp;&nbsp;Explorar&nbsp;&nbsp;&nbsp;&nbsp;</button></a>


<!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Camino hacia tu vocación</h5>
            <button type="button" class="close cerrarModalSeivoc" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <video width="100%" height="100%" controls>
              <source src="{{ asset('Videos/Intro/Introduccion-seivoc.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary cerrarModalSeivoc" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>


<!-- INICIO CONFERENCIAS -->
{{-- <main style="background-color: transparent;" >
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-1" >
      <div class="col" >
        <div class="card shadow-sm " style="  border-radius:  50px; ">
          <h5 class="card-title" width="100%" height="225" style="background-color: #2f2e65; border-top-left-radius:  50px; border-top-right-radius:  50px;">
            <div class="row justify-content-between">
              <div class="col-1 offset-md-1">
                <button id="MenuIzquierdo" type="button" class="btn bg-light text-warning">
                  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
                  </svg>
                </button>
              </div>
              <div class="col-1">
                <button id="MenuDerecho" type="button"  class="btn bg-warning text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
                  </svg>
                </button>
              </div>
            </div>
          </h5>

          <div class="card-body">
            <div class="container">
              <div class="row ">
                <div class="col-md-3 " style="height: 500px;overflow-y: scroll;">
                  <br>
                  <H3>
                    <p class="text-center">
                      <strong>Conferencias</strong>
                    </p>
                  </H3>
                  <H5><strong>Eje Temático</strong></H5>
                  <br>
                  <p>
                  <FONT SIZE=3><strong>Bachillerato UNAM</strong></FONT>
                  <br>
                  <a href="{{url('')}}"  >
                    <FONT SIZE=2  >1. ¿Qué onda con el pase reglamentado?</FONT>
                  </a>
                  <br>
                  <FONT SIZE=3><strong>Toma de decision vocacional</strong></FONT>
                  <br>
                  <a href="{{url('')}}"  >
                    <FONT SIZE=2  >2. Pasos para elegir carrera</FONT>
                  </a>
                  <br>
                  <a href="{{url('')}}"  >
                    <FONT SIZE=2  >3. Explora tus intereses vocacionales en linea</FONT>
                  </a>
                  <br>
                  <a href="{{url('')}}"  >
                    <FONT SIZE=2  >4. ¿Cómo construir mi vocación?:SEIVOC</FONT>
                  </a>
                  <br>
                  <a href="{{url('')}}"  >
                    <FONT SIZE=2  >5. Estrategia para la toma de decisión informada </FONT>
                  </a>
                  <br>
                  <a href="{{url('')}}"  >
                    <FONT SIZE=2  >6. Tips para elegir una carrera</FONT>
                  </a>
                  <br>
                  <a href="{{url('')}}"  >
                    <FONT SIZE=2  >7. Las carreras de alta demanda de la UNAM</FONT>
                  </a>
                  <br>
                  <a href="{{url('')}}"  >
                    <FONT SIZE=2  >8. Elegir carrera en tiempos de pandemia global</FONT>
                  </a>
                  <br>
                  <a href="{{url('')}}"  >
                    <FONT SIZE=2  >9. Elección de carrera</FONT>
                  </a>
                  <br>
                  <a href="{{url('')}}"  >
                    <FONT SIZE=2  >10. Búsqueda de oferta academica de la UNAM</FONT>
                  </a>
                  <br>
                  <FONT SIZE=3><strong>Conociendo algunas carreras</strong></FONT>
                  <br>
                  <a href="{{url('')}}"  >
                    <FONT SIZE=2  >11. Urbanismo</FONT>
                  </a>
                  <br>
                  <a href="{{url('')}}"  >
                    <FONT SIZE=2  >12. Diseño industrial</FONT>
                  </a>
                  <br>
                  <a href="{{url('')}}"  >
                    <FONT SIZE=2  >13. Arquitectura</FONT>
                  </a>
                  </p>
                </div>
                <div class="col-sm">
                  <div class="row">
                    <div class="container text-center">
                      <p>
                        <FONT SIZE=5>
                          <strong>

                          </strong>
                        </FONT>
                      </p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <p>
                        <FONT SIZE=1>
                        <br><br>

                        </FONT>
                      </p>
                    </div>
                    <div id="video_La"class="col-md-8">
                      Variable de video --}}


                   {{-- </div>
                  </div>
                </div>
                <div id="Menu2" class="col-md-1 container o-hidden"   >
                  <div class="row  text-center " style=" height: 7em;background-color: #2f2e65; border-radius:  10px;cursor: pointer; "  src="">
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-white "  onclick="location.href ='{{url('')}}';"  >
                        <FONT SIZE=2>
                          <strong>Infografias</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>
                  <div class="row bg-warning text-center" onclick="location.href ='{{url('')}}';"  style=" height: 7em;  border-radius:  10px;cursor: pointer;"  >
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-dark " style=" width: 100%;" >
                        <FONT SIZE=1>
                          <strong>Convocatorias</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>
                  <div class="row bg-warning text-center" onclick="location.href ='{{url('')}}';"  style=" height: 7em;  border-radius:  10px;cursor: pointer;"  >
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-dark " style=" width: 100%;" >
                        <FONT SIZE=1>
                          <strong>Conferencias</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>
                  <div class="row  text-center" style=" height: 7em;background-color: #2f2e65; border-radius:  10px;cursor: pointer;" onclick="location.href ='{{url('')}}';" >
                    <p>
                    <div class="col-sm text-center rotate-sm-r-90 text-white "  >
                      <FONT SIZE=2>
                        <strong> Recusos <br> de apoyo</strong>
                      </FONT>
                    </div>
                    </p>
                  </div>

                  <div class="row bg-warning text-center" onclick="location.href ='{{url('')}}';"  style=" height: 7em;  border-radius:  10px;cursor: pointer;"  >
                    <p>
                    <div class="col-sm text-center rotate-sm-r-90 text-dark "  >
                      <FONT SIZE=1>
                        <strong>Servicios COE</strong>
                      </FONT>
                    </div>
                    </p>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main> --}}
<!-- FIN INICIO CONFERENCIAS -->
<script>
  // alert("La resolución de tu pantalla es: " + screen.width + " x " + screen.height)
  if(screen.width <= 1024){
    // console.log("Tu resolución es: ", screen.width)
    window.location.assign("{{ url('/appMobileAndroid') }}");
  }
</script>
@endsection