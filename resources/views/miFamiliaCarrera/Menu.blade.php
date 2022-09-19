@extends('miFamiliaCarrera.navModulos')

@section('content')
<body style="background-color:black; background-image:  url('{{asset('images/familiadecarreras/back-mfc.svg')}}');background-attachment: fixed;background-size: 100%;">
<meta name="csrf-token" content="{{ Session::token() }}"> 
</br></br></br></br>
<div class="col-md-6 text-left">
    <FONT SIZE=4 COLOR="white">
    <li style="color:#30116b;"><img src="{{asset('images/familiadecarreras/icons/user.png')}}">  Usuario: <b> {{ Auth::user()->alias }} </b><p id="mdseivoc" hidden></p><p id="mdseivoc" hidden>{{ Auth::user()->usuario_id }}</p></li>
    @foreach($datosmenu as $data)
    <li style="color:#30116b;"><img src="{{asset('images/familiadecarreras/icons/score.png')}}">  Puntaje: {{ $data->puntaje }} <b></b></li>
    <li style="color:#30116b;"><img src="{{asset('images/familiadecarreras/icons/medalla.png')}}">  Medalla: {{ $data->medalla }} <b></b></li>
    @endforeach
    </FONT>
</div>
</br>
<div class="container">
    <div class="row ">
        <div class="col col-md-6 mt-5" >
            <button style="text-align: center; width:300px; " role="button" class="menu bbtn btn-block nav-link btn-light MetaDataJCSeivoc" ReferenciaMetaSEIVOC="4050" data-toggle="tooltip" data-html="true"  data-placement="bottom"  onclick="window.location='{{url('/MiFamiliadeCarrera/Modulo1')}}'">
                Conocimientos perdidos
                <img src="{{ asset('images/familiadecarreras/Cerebro.png') }}" style="width: 50px;">
            </button>


        </div>
        <div class="col col-md-6 mt-5">
            <button style="text-align: center; width:300px; " role="button" class="menu bbtn btn-block nav-link btn-light MetaDataJCSeivoc" ReferenciaMetaSEIVOC="4051" data-toggle="tooltip" data-html="true" data-placement="bottom"  onclick="window.location='{{url('/MiFamiliadeCarrera/Modulo2/')}}/1'"

            <?php if ($flag<2): ?>
                disabled
            <?php endif ?>
            >
                Grabaciones encontradas
                <img src="{{ asset('images/familiadecarreras/Grabacion.png') }}" style="width: 50px;">
            </button>
        </div>
    </div>
    <div class="row"> 
    <div class="col col-md-6 mt-5">
        <button style="text-align: center; width:300px; " role="button" class="menu bbtn btn-block nav-link btn-light MetaDataJCSeivoc" ReferenciaMetaSEIVOC="4052"    data-toggle="tooltip" data-html="true" data-placement="bottom" onclick="window.location='{{url('/MiFamiliadeCarrera/Modulo3/')}}/1'"
        <?php if ($flag<3): ?>
                disabled
            <?php endif ?>
        >
            Objetos de estudio
            <img src="{{ asset('images/familiadecarreras/Libro.png') }}" style="width: 50px;">
        </button>
    </div>
    <div class="col col-md-6 mt-5">
        <button style="text-align: center; width:300px; " role="button" class="menu bbtn btn-block nav-link btn-light MetaDataJCSeivoc" ReferenciaMetaSEIVOC="4053"  data-toggle="tooltip" data-html="true" data-placement="bottom" onclick="window.location='{{url('/MiFamiliadeCarrera/Modulo4/')}}/1'"
        <?php if ($flag<4): ?>
                disabled
            <?php endif ?>
        >
            Los necesitamos de vuelta
            <img src="{{ asset('images/familiadecarreras/Corazon.png') }}" style="width: 50px;">
        </button>
    </div>
    </div>
</div>
</br></br>
</br></br>
</br></br>

</br></br>
</br></br>
</br></br>
</br></br>
</br></br>
</br></br>
</br></br>
</body>
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
@endsection