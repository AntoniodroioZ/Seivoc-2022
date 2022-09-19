@extends('miFamiliaCarrera.navModulos')

@section('content')

<header class="jumbotron">
    <div class="container">
    <div class="row row-header">
        {{-- <div class="col col-md-6 offset-md-3 ">
            <a style="text-align: center; width:300px; " role="button" class="vamos bbtn btn-block nav-link btn-info" data-toggle="tooltip" data-html="true"  title="<strong>Material previo</strong>"       data-placement="bottom" href="{{url('/MiFamiliadeCarrera')}}">
                Objetos de estudio
                <img src="{{ asset('images/familiadecarreras/Cerebro.png') }}" style="width: 50px;">
            </a>
        </div> --}}
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row row-header">
            <div class="col col-md-6 offset-md-3 ">
                <p style="text-align: center;">De acuerdo con los íconos que aparecen, ¿cu&aacute;l sería el objeto de estudio de cada área del conocimiento?
                </p>
                <p style="text-align: center;">Arrastra el conocimiento a cada caja</p>
            </div>
        </div>
    </div>
    </div>
</header>
    <!--4 grupos de familias-->


<div class="container">
    <div class="row offset-md-1">
        <center>
        <figure class="">
            <figcaption  style="text-align: center;">
                Área {{ $pregunta->pregunta_id - 10 }}
            </figcaption>
            <img class="" src="{{  asset($recurso->url_imagen) }}">
        </figure>
        </center>
    </div>


    <div class="" style="text-align: center;">
        {{ $pregunta->descripcion }}
    </div>
    <br><br>
    <center>
    @foreach($respuestas as $respuesta)
    <button type="button" name="" class="btn btn-outline-dark validam3" validamo3={{$respuesta[1]}}>{{ $respuesta[0] }}</button><br><br>
    @endforeach
    </center>
    <br>
    <br>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var intentos = 0;
    $(document).ready(function(){
            
        $('.validam3').click(function(){
            if ($(this).attr('validamo3') == 1) {
                @if ($pregunta->pregunta_id - 10 < 5)
                location.href="{{ URL('/MiFamiliadeCarrera/Modulo3/') }}/{{ $pregunta->pregunta_id - 9 }}";
                @else
                console.log('Finalizaste Modulo 3');
                finalizaste();
                @endif
            }
            else{
                if (intentos == 2) {
                console.log('Me parece que nos ayudaría revisar este video');
                repaso();
                }
                else{
                    intentos++;
                    console.log('¡Casi!, pero no es la correcta, intenta de nuevo.');
                    intentaDeNuevo();
                }
            }

         });//comprueba
           
    });//document
    function repaso(){
        swal({
        title: '¿Necesitas ayuda?',
        text: '¡Deberias revisar este video!',
        html: '<video src="{{asset('/images/familiadecarreras/familiadecarreras/videoDeAyuda.mp4')}}" style="width: 400px;" controls></video>'
    })
    }
    function intentaDeNuevo(){
        swal({
        title: '¡Casi!',
        text: 'Pero no es la correcta, intenta de nuevo.',
        
    })
    }
    function finalizaste(){
        swal({
        title: '¡Felicidades!',
        text: 'Terminaste este modulo, pasemos al siguiente',
        confirmButtonText:'<a href="{{url('/MiFamiliadeCarrera/HomeR')}}">¡OK!</a>',
        timer: 4000
        }).then(
          function () {},
          // handling the promise rejection
          function (dismiss) {
            if (dismiss === 'timer') {
              //console.log('Me parece que nos ayudaría revisar de nuevo “Mi familia de Carreras')
              window.location.replace("{{url('/MiFamiliadeCarrera/HomeR')}}");
            }
          
    })
    }
    </script>

@endsection