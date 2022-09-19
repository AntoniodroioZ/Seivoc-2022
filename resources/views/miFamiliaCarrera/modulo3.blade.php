@extends('miFamiliaCarrera.navModulos')

@section('content')

<header class="jumbotron" style="padding-bottom:1rem;">
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
                <p style="text-align: center;">Selecciona la opción correcta.</p>
            </div>
        </div>
    </div>
</div>
</header>
<!--4 grupos de familias-->


<div class="container">
    <div style="display: flex; justify-content: center; align-items: center;">
        <h3>Área {{ $pregunta->pregunta_id - 10 }}</h3>
    </div>
    <div  style="display: flex; justify-content: center; align-items: center;">
        <img  style="height: 17rem;" class="" src="{{  asset($recurso->url_imagen) }}">
    </div>


    <div class="" style="text-align: center;">
        {{ $pregunta->descripcion }}
    </div>
    <br><br>
    <center>
    @foreach($respuestas as $i=>$respuesta)
    <button type="button" name="" class="btn btn-outline-dark validam3 btn-info MetaDataJCSeivoc" ReferenciaMetaSEIVOC="43{{+$pregunta->pregunta_id-11}}{{$i}}" validamo3={{$respuesta[1]}}>{{ $respuesta[0] }}</button><br><br>
    @endforeach
    </center>
    <br>
</div>
<div class="container">
    <div style="display: flex; justify-content: center; align-items: center;">
        <h2>¿Necesitas ayuda?</h2>
    </div>
    <div style="display: flex; justify-content: center; align-items: center;">
        <h4>¡Deberias revisar este video!</h4>
    </div>
    <div class="video-familia3-4" style="display: flex; justify-content: center; align-items: center;">
        
        <video src="{{asset('/images/familiadecarreras/familiadecarreras/videoDeAyuda_3_4.mp4')}}" style="width: 400px;" controls></video>
    </div>
</div>
<br>
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
        html: '<video src="{{asset('/images/familiadecarreras/familiadecarreras/videoDeAyuda_3_4.mp4')}}" style="width: 400px;" controls></video>'
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
        showCancelButton: false,
        showConfirmButton: false,
        timer: 2000
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