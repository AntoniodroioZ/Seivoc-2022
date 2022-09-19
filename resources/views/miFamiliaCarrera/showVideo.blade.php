@extends('miFamiliaCarrera.navModulos')

@section('content')
<meta name="csrf-token" content="{{ Session::token() }}"> 
</br>
</br></br></br>
</br></br></br>
</br></br>

<div class="container" style="align-items: center;" id="player">
  <div class="col col-md-6 offset-md-3" >
    <video width="100%" id="videoP" controls  autoplay  ended="Habilita()">
      <source src="{{$Datos['UrlVideo']}}" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>
</div>
</br>
<div class="container" style="align-items: center;"> 
  <div class="col col-sm-6  col-md-5 offset-2 offset-md-3" >
    <a style="text-align: center;" id="Continuar" role="Continuar" id="Continuar" class="vamos bbtn btn-block nav-link btn-info" href="{{$Datos['Redireccionar']}}" >
      Continuar
    </a>
  </div>  
</div>
</br>
</br>
</br>
</br>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#Continuar").hide();
    $('#videoP').on('ended',function(){      
      $("#Continuar").show();
    });
  });
</script>
@endsection