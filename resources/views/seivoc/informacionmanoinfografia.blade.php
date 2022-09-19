@extends('seivoc.nav')

@section('content')
<br><br><br><br><br>
<main style="background-color: transparent;" >
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-1" >
      <div class="col" >
        <div class="card shadow-sm " style="  border-radius:  50px; ">
          <h5 class="card-title" width="100%" height="225" style="background-color: #2f2e65; border-top-left-radius:  50px; border-top-right-radius:  50px;">
            <div class="row justify-content-between">
              <div class="col-1 offset-md-1">
                <button id="MenuIzquierdo"type="button" class="btn bg-light text-warning">
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
                <div id="titulos" class="col-md-3 " style="height: 500px;overflow-y: scroll;">
                  @if($view == 4)
                  Esta sección la preparamos para
                  apoyarte con algunos recursos

                  educativos a lo largo de tu trayecto-
                  ria escolar, o bien, para preparar

                  tus exámenes de admisión. Conó-
                  celos y Explóralos.
                  @endif
                  @if($view == 5)
                  Quieres explorar tu decisión voca-
                  cional de manera más puntual y

                  acompañada o apoyada por un pro-
                  fesional del área, entonces te reco-
                  mendamos conocer los siguientes

                  lugares.
                  Recuerda que en este momento,
                  por la situación de confinamiento
                  social muchos de los apoyos se
                  han implementado en línea.
                  @endif
                </div>
                <div id="rightM" class="col-sm">
                  @if($view == 2)
                  En el SEIVOC creemos que una buena planeación nos llevará a una buena conclusión y en ese sentido organizar tus

                  tiempos para alcanzar tus metas es importante. Y tener presente los periodos de convocatorias de las distintas Universi-
                  dades es el primer paso para encaminarte hacia tu elección de carrera y tu ingreso a la Universidad

                  Por tanto, hemos preparado para ti el siguiente calendario anual de convocatorias de Universidades públicas de la
                  Ciudad de México y algunas de la Zona Metropolitana. Los periodos que te presentamos son las fechas que hemos

                  identificado que las Universidades publican sus convocatorias, para tener la fecha exacta tendrás que remitirte directa-
                  mente a la página de la Universidad de tu interés.

                  Para apoyarte en tu análisis de estas convocatorias, te sugerimos los siguientes tips:
                  - Identifica los requisitos de ingreso
                  - Adquiere la guía oficial para estudiar
                  - Considera el costo del examen
                  - Lee con atención la convocatoria
                  - Ten claridad en los criterios de selección
                  - Si tienes dudas, acércate al área de admisión de la Universidad de tu interés
                  @endif

                </div>
                @if($view == 1)
                <div id="Menu2" class="col-md-1 container o-hidden">
                  <div class="row  text-center MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1004" onclick="location.href ='{{url('/informacionmanoconvocatorias')}}';"  style=" height: 7em;background-color: #2f2e65; border-radius:  10px;cursor: pointer; "  >
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-white " style=" width: 100%;" >
                        <FONT SIZE=1>
                          <strong>Convocatorias</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>
                  <div class="row bg-warning text-center MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1005" onclick="location.href ='{{url('/informacionmanoconferencias')}}';"  style=" height: 7em;  border-radius:  10px;cursor: pointer;"  >
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-dark " style=" width: 100%;" >
                        <FONT SIZE=1>
                          <strong>Conferencias</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>
                  <div class="row  text-center MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1006" style=" height: 7em;background-color: #2f2e65; border-radius:  10px;cursor: pointer;" onclick="location.href ='{{url('/informacionmanorecursosapoyo')}}';" >
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-white "  >
                        <FONT SIZE=2>
                          <strong> Recursos <br> de apoyo</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>

                  <div class="row bg-warning text-center MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1007" onclick="location.href ='{{url('/informacionmanoserviciosorient')}}';"  style=" height: 7em;  border-radius:  10px;cursor: pointer;"  >
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-dark ">
                        <FONT SIZE=1>
                          <strong>Servicios COE</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>
                @endif
                @if($view == 2)
                <div id="Menu2" class="col-md-1 container o-hidden">
                  <div class="row  text-center  MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1003" style=" height: 7em;background-color: #2f2e65; border-radius:  10px;cursor: pointer; "  src="">
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-white "  onclick="location.href ='{{url('/informacionmanoinfografia')}}';"  >
                        <FONT SIZE=2>
                          <strong>Infografias</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>
                  <div class="row bg-warning text-center  MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1005" onclick="location.href ='{{url('/informacionmanoconferencias')}}';"  style=" height: 7em;  border-radius:  10px;cursor: pointer;"  >
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-dark " style=" width: 100%;" >
                        <FONT SIZE=1>
                          <strong>Conferencias</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>
                  <div class="row  text-center MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1006" style=" height: 7em;background-color: #2f2e65; border-radius:  10px;cursor: pointer;" onclick="location.href ='{{url('/informacionmanorecursosapoyo')}}';" >
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-white "  >
                        <FONT SIZE=2>
                          <strong> Recursos <br> de apoyo</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>

                  <div class="row bg-warning text-center MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1007" onclick="location.href ='{{url('/informacionmanoserviciosorient')}}';"  style=" height: 7em;  border-radius:  10px;cursor: pointer;"  >
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-dark ">
                        <FONT SIZE=1>
                          <strong>Servicios COE</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>
                @endif
                @if($view == 3)
                <div id="Menu2" class="col-md-1 container o-hidden">
                  <div class="row  text-center  MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1003" style=" height: 7em;background-color: #2f2e65; border-radius:  10px;cursor: pointer; "  src="">
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-white "  onclick="location.href ='{{url('/informacionmanoinfografia')}}';"  >
                        <FONT SIZE=2>
                          <strong>Infografias</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>
                  <div class="row bg-warning text-center MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1004" onclick="location.href ='{{url('/informacionmanoconvocatorias')}}';"  style=" height: 7em;  border-radius:  10px;cursor: pointer;"  >
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-dark " style=" width: 100%;" >
                        <FONT SIZE=1>
                          <strong>Convocatorias</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>
                  <div class="row  text-center MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1006" style=" height: 7em;background-color: #2f2e65; border-radius:  10px;cursor: pointer;" onclick="location.href ='{{url('/informacionmanorecursosapoyo')}}';" >
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-white "  >
                        <FONT SIZE=2>
                          <strong> Recursos <br> de apoyo</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>

                  <div class="row bg-warning text-center MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1007" onclick="location.href ='{{url('/informacionmanoserviciosorient')}}';"  style=" height: 7em;  border-radius:  10px;cursor: pointer;"  >
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-dark ">
                        <FONT SIZE=1>
                          <strong>Servicios COE</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>
                @endif
                @if($view == 4)
                <div id="Menu2" class="col-md-1 container o-hidden">
                  <div class="row  text-center " style=" height: 7em;background-color: #2f2e65; border-radius:  10px;cursor: pointer; "  src="">
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-white  MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1003"  onclick="location.href ='{{url('/informacionmanoinfografia')}}';"  >
                        <FONT SIZE=2>
                          <strong>Infografias</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>
                  <div class="row bg-warning text-center MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1004" onclick="location.href ='{{url('/informacionmanoconvocatorias')}}';"  style=" height: 7em;  border-radius:  10px;cursor: pointer;"  >
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-dark " style=" width: 100%;" >
                        <FONT SIZE=1>
                          <strong>Convocatorias</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>
                  <div class="row  text-center MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1005" onclick="location.href ='{{url('/informacionmanoconferencias')}}';"  style=" height: 7em;background-color: #2f2e65; border-radius:  10px;cursor: pointer; "  >
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-white " style=" width: 100%;" >
                        <FONT SIZE=1>
                          <strong>Conferencias</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>
                  <div class="row bg-warning text-center MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1007" onclick="location.href ='{{url('/informacionmanoserviciosorient')}}';"  style=" height: 7em;  border-radius:  10px;cursor: pointer;"  >
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-dark ">
                        <FONT SIZE=1>
                          <strong>Servicios COE</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>
                @endif
                @if($view == 5)
                <div id="Menu2" class="col-md-1 container o-hidden">
                  <div class="row  text-center  MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1003" style=" height: 7em;background-color: #2f2e65; border-radius:  10px;cursor: pointer; "  src="">
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-white "  onclick="location.href ='{{url('/informacionmanoinfografia')}}';"  >
                        <FONT SIZE=2>
                          <strong>Infografias</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>
                  <div class="row bg-warning text-center MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1004" onclick="location.href ='{{url('/informacionmanoconvocatorias')}}';"  style=" height: 7em;  border-radius:  10px;cursor: pointer;"  >
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-dark " style=" width: 100%;" >
                        <FONT SIZE=1>
                          <strong>Convocatorias</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>
                  <div class="row text-center MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1005" onclick="location.href ='{{url('/informacionmanoconferencias')}}';"  style=" height: 7em;background-color: #2f2e65; border-radius:  10px;cursor: pointer; "  >
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-white" style=" width: 100%;" >
                        <FONT SIZE=1>
                          <strong>Conferencias</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>
                  <div class="row bg-warning text-center MetaDataJCSeivoc" ReferenciaMetaSEIVOC="1006" style=" height: 7em; border-radius:  10px;cursor: pointer;" onclick="location.href ='{{url('/informacionmanorecursosapoyo')}}';" >
                    <p>
                      <div class="col-sm text-center rotate-sm-r-90 text-dark"  >
                        <FONT SIZE=2>
                          <strong> Recursos <br> de apoyo</strong>
                        </FONT>
                      </div>
                    </p>
                  </div>
                @endif

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <br><br><br><br>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    
    function metaFuncion(ReferenciaMetaSEIVOC){    
    meta = document.getElementById("mdseivoc").innerHTML;
    if(meta==""){
      $.ajax({
        type: "POST",
        data: {
          "_token": $("meta[name='csrf-token']").attr("content"),                              
          "Ref": ReferenciaMetaSEIVOC
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
            
            "Ref": ReferenciaMetaSEIVOC
          },               
             url:"/api/meta_info_usuario/"+meta+"/"+ReferenciaMetaSEIVOC ,                
          success: function (data) {
            console.log("Guardando MetaDataJCSeivoc");
          }
      });

    }
  }

</script>
  @if($view == 1)
  <script type="text/javascript">
   $(document).ready(function () {
     $.ajax({
      type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content")
    },
    url:"/api/resource_infografias_et",
    success: function (data) {
      const titulos = JSON.parse(data);
      console.log(titulos[1].code);
      if (titulos[1].code == "201"){
        $("#titulos").html(titulos[0].HTML);
        cambiarInfografia(0);
      }
    }
  });

   });
   function cambiarInfografia(id,ReferenciaMetaSEIVOC) {
    metaFuncion(ReferenciaMetaSEIVOC);
    $.ajax({
      type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content"),
      "id_infografias": id
    },
    url:"/api/resource_tema_i",
    success: function (data) {
      const carrusel = JSON.parse(data);
      console.log(carrusel[1].code);
      if (carrusel[1].code == "201"){
        $("#rightM").html(carrusel[0].HTML);
      }
    }
  });
  }
</script>
@endif

@if($view == 2)
<script type="text/javascript">
 $(document).ready(function () {
   $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content")
  },
  url:"/api/resource_convocatorias",
  success: function (data) {
    const titulos = JSON.parse(data);
    console.log(titulos[1].code);
    if (titulos[1].code == "201"){
      $("#titulos").html(titulos[0].HTML);
      // cambiarTablaMes(0);
    }
  }
});

 });
 function cambiarTablaMes(id,ReferenciaMetaSEIVOC) {
  metaFuncion(ReferenciaMetaSEIVOC);
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content")
  },
  url:"/api/resource_convocatorias_tabla/" +id,
  success: function (data) {
    const tabla = JSON.parse(data);
    console.log(tabla[1].code);
    if (tabla[1].code == "201"){
      $("#rightM").html(tabla[0].HTML);
    }
  }
});
}
</script>
@endif

@if($view == 3)
<script type="text/javascript">
 $(document).ready(function () {
   $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content")
  },
  url:"/api/resource_conferencias_titulos",
  success: function (data) {
    const titulos = JSON.parse(data);
    console.log(titulos[1].code);
    if (titulos[1].code == "201"){
      $("#titulos").html(titulos[0].HTML);
      // cambiarTablaMes(0);
    }
  }
});
 });

 function cambiarConferencias(id,ReferenciaMetaSEIVOC) {
  metaFuncion(ReferenciaMetaSEIVOC);
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content")
  },
  url:"/api/resource_conferencias_contenidos/" +id,
  success: function (data) {
    const tabla = JSON.parse(data);
    console.log(tabla[1].code);
    if (tabla[1].code == "201"){
      $("#rightM").html(tabla[0].HTML);
    }
  }
});
}
</script>
@endif

@if($view == 4)
<script type="text/javascript">
 $(document).ready(function () {
   $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content")
  },
  url:"/api/resource_recursos_apoyo",
  success: function (data) {
    const carrusel = JSON.parse(data);
    console.log(carrusel[1].code);
    if (carrusel[1].code == "201"){
      $("#rightM").html(carrusel[0].HTML);
      // cambiarTablaMes(0);
    }
  }
});

 });

</script>
@endif

@if($view == 5)
<script type="text/javascript">
 $(document).ready(function () {
   $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content")
  },
  url:"/api/resource_servicios",
  success: function (data) {
    const carrusel = JSON.parse(data);
    console.log(carrusel[1].code);
    if (carrusel[1].code == "201"){
      $("#rightM").html(carrusel[0].HTML);
      // cambiarTablaMes(0);
    }
  }
});

 });

</script>

@endif

@endsection