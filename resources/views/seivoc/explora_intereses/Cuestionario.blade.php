@extends('seivoc.nav')

@section('content')
<br><br><br><br><br>
<meta name="csrf-token" content="{{ Session::token() }}"> 

<main style="background-color: transparent;" >
  <div class="modal fade" id="modalFelicidades" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Felicidades</h5>
        </div>
        <div class="modal-body">
          <img class="img-fluid" src="{{ asset('images/fin-cuestionario.png') }}" alt="">
        </div>
        <div class="modal-footer">
          <button onclick="redirecciona()" type="button" class="btn btn-primary">Continuar</button>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-1" >
      <div class="col" >
        <div class="card shadow-sm " style="  border-radius:  50px; ">
          <div class="card-body">
            <input   id="idPregunta" value="{{$Datos["PreguntaID"]}}" style="display:none; ">
            <div class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"  aria-valuemin="0" aria-valuemax="100" id="LoginJC" style="width: {{$Datos["PregVal"]*1000/60}}"></div>
              <img src="{{ asset('images/imgCuestionario/running.gif') }}" />
            </div>
            <br>
            <img style="width: 42%; " src="{{ asset('images/imgCuestionario/pregunta.png') }}" class="md-card-image" ng-hide="fc.completo">
            <div class="d-flex  justify-content-center">

                <p class="display-5" id="PreguntaJC">{{$Datos["Pregunta"]}}</p>
            </div>
            <br><br><br>
            <div class="container">
              <div class="row" id="Respuestas">
                <div class="col col-lg-2"></div>
                <div class="col col-lg-2" onclick="SigPregunta(4)">
                  <input type="image" src="{{ asset('images/imgCuestionario/happy-3.svg') }}" />
                </div>
                @if($Datos["PreguntaID"]!=61)
                <div class="col col-lg-2" onclick="SigPregunta(3)" id="Respuesta3JC">
                  <input type="image" src="{{ asset('images/imgCuestionario/happy-2.svg') }}" />
                </div>          
                <div class="col col-lg-2" onclick="SigPregunta(1)" id="Respuesta1JC">
                  <input type="image" src="{{ asset('images/imgCuestionario/confused.svg') }}" /></div>
                @endif
                <div class="col col-lg-2" onclick="SigPregunta(0)">
                  <input type="image" src="{{ asset('images/imgCuestionario/angry.svg') }}" />
                </div>
              </div>
            </div>
            <br><br><br>
          </div>
        </div>
      </div>
    </div>
  </main>
  <br><br><br><br>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    function SigPregunta(Respuesta) {
      $('#Respuestas').html('<div class="col col-lg-12 loading"><img src="{{ asset("images/Cuestionario/loader.gif") }}" alt="loading" /><br/></div>');
       
      $.ajax({
        type: "POST",
        data: {"_token": $("meta[name='csrf-token']").attr("content"),
          "Pregunta" : $("#idPregunta").val(),
          "Respuesta": Respuesta
        },
        url:"/EnvioPregunta",
        success: function (data) {
          const PreguntaSig = JSON.parse(data);
          
          if (PreguntaSig[0].code==202) {
              console.log("Redireccionar");
              $('#modalFelicidades').modal('show');
              // window.location.assign("{{ url('/FlujoPrincipal') }}");
              // windows.location.replace('{{ url('/FlujoPrincipal') }}');
          }
          if (PreguntaSig[0].code==200) {
            $("#PreguntaJC").html(PreguntaSig[2].Pregunta);
            $("#idPregunta").val(PreguntaSig[2].PreguntaID);
            valor=PreguntaSig[2].PregVal*1000/60;
            $("#LoginJC").css({width:valor});
          }else{
            console.log("Error validalo con Desarrollador JC");
          }
          $('#Respuestas').html('<div class="col col-lg-2"></div><div class="col col-lg-2" onclick="SigPregunta(4)"><input type="image" src="{{ asset("images/imgCuestionario/happy-3.svg") }}" /></div><div class="col col-lg-2" onclick="SigPregunta(3)" id="Respuesta3JC"><input type="image" src="{{ asset("images/imgCuestionario/happy-2.svg") }}" /></div><div class="col col-lg-2" onclick="SigPregunta(1)" id="Respuesta1JC"><input type="image" src="{{ asset("images/imgCuestionario/confused.svg") }}" /></div><div class="col col-lg-2" onclick="SigPregunta(0)"><input type="image" src="{{ asset("images/imgCuestionario/angry.svg") }}" /> </div>');
          if ($("#idPregunta").val()==61) {
            $('#Respuestas').html('<div class="col col-lg-2"></div><div class="col col-lg-2" onclick="SigPregunta(4)"><input type="image" src="{{ asset("images/imgCuestionario/happy-3.svg") }}" /></div><div class="col col-lg-2" onclick="SigPregunta(0)"><input type="image" src="{{ asset("images/imgCuestionario/angry.svg") }}" /> </div>');
            }
        }
      });

    }

    function redirecciona(){
      window.location.assign("{{ url('/FlujoPrincipal') }}");
    }
  </script>
@endsection