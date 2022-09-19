@extends('seivoc.nav')

@section('content')
<br><br><br><br><br><br>

<main style="background-color: transparent;" >
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-1" >
        <div class="col" >
          <div class="card shadow-sm " style="  border-radius:  50px; ">
            <div class="card-body">
                <div class="container" style="align-items: center;" id="player">
                    <div class="col col-md-6 offset-md-3" id="video">
                      <video width="100%" id="videoP" controls  autoplay  ended="Habilita()">
                        <source src="{{ asset('images/video-cuestionario.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                      </video>
                    </div>
                    <div class="col col-md-6 offset-md-3" id="ruta" style="display:none;">
                        <img class="img-fluid" src="{{ asset('images/ruta-cuestionario.png') }}" alt="">
                    </div>
                    {{-- <div class="col col-md-6 offset-md-3" id="instrucciones" style="display:none;">
                        
                    </div> --}}
                  </div>
                  </br>
                  <div class="container" style="align-items: center;"> 
                    <div class="col col-sm-6  col-md-5 offset-2 offset-md-3" style="display: flex;
                    justify-content: center;
                    align-items: center;">
                        <a role="button" style="display:none;" id="flecha" onclick="retrocede()">
                            <img src="{{ asset('/images/guia_interactiva/boton-regresar1.png') }}" alt="regresar">
                        </a>
                      <a style="text-align: center; width: 20rem; margin-left: 5rem;" onclick="avanza()" id="Continuar" role="Continuar" id="Continuar" class="vamos bbtn btn-block nav-link btn-info" href="#" >
                        Continuar
                      </a>
                    </div> 
                    {{-- <div > --}}
                    {{-- </div>  --}}
                  </div>
                  </br>
                  </br>
                  </br>
                  </br>
                  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                  <script type="text/javascript">
                    $valor = 0
                    $(document).ready(function(){
                      $("#Continuar").hide();
                      $('#videoP').on('ended',function(){      
                        $("#Continuar").show();
                      });
                    });
                    function avanza(){
                        $valor++;
                        if($valor == 1){
                            $("#video").hide();
                            $("#ruta").show();
                            $("#flecha").show();
                        }
                        if($valor == 2){
                            window.location.assign("{{ url('/cuestionario') }}");   
                        }
                        
                        // console.log($valor)
                    }
                    function retrocede(){
                        $valor--;
                        if($valor == 0){
                            $("#flecha").hide();
                            $("#video").show();
                            $("#ruta").hide();
                        }
                        if($valor == 1){
                            $("#ruta").show();
                            $("#instrucciones").hide();
                        }
                    }
                    
                  </script>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>
<br>