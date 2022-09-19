@extends('miFamiliaCarrera.navModulos')

@section('content')
<!--navbar-expand-sm indica que en pantallas pequeñas y extrapequeñas la barra de navegación será conmutable, es deci, se colapsará-->
<br>
<br>
<meta name="csrf-token" content="{{ Session::token() }}"> 
<header class="" style="background: #FFFFFF; color: #99004C;">
    <div class="container">
        <div class="row row-header">
            {{-- <div class="col col-md-8 offset-md-2 ">

                    <a style="text-align: center; width:300px; " role="button" class="vamos bbtn btn-block nav-link btn-info"
                    data-toggle="tooltip" data-html="true"
                    data-placement="bottom" href="{{url('/MiFamiliadeCarrera')}}"> Grabaciones encontradas
                    <img src="{{ asset('images/familiadecarreras/Cerebro.png') }}" style="width: 50px;"></a>

            </div> --}}
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row row-header">
             <div class="col col-md-6 offset-md-3 ">
                <p style="text-align: center;">"Los siguientes audios describen el perfil de cada uno de los personajes pertenecientes a las familias de carreras.
                Selecciona la opci&#243;n correcta del men&#250; desplegable para completar la frase de acuerdo al audio que escuchaste"
                </p>
            </div>
        </div>
        </div>
    </div>
</header>
<!--4 grupos de familias-->
<div class="container ">
    <div  class="col-12 col-sm-12 col-md-9 offset-md-2"  >
        <div class="row row-content">
            <a style=" width: 100%"  id="audio" class="reproduce">
                <figure style="margin-left: 5rem;"><img style="    margin-left: 5rem;
                    height: 30rem;" id="ImagenAudio" class=" img-fluid rounded" src=""></figure>
            </a>


        </div>
    </div>
</div>
<!--Area1--***********************************************************************-->
<div class="container"  id="textos1">
    <div class="col-12 col-sm-12 col-md-10 offset-md-2" >
        <div>
            <div id="Pregunta">
            </div>
        </div>
    </div>
</div>        

<br><br><br><br>
    


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
<script type="text/javascript">
    $(document).ready(function(){
        actualiza(areaState);
        //$('[data-toggle="tooltip"]').tooltip();
    });
    let boton = document.querySelector(".reproduce");
    boton.addEventListener("click", () => {
        Reproducion(link_sonido);
    });
</script>

<script type="text/javascript">
    var correcto=0;
    var incorrecto=0;
    var areaState={{$PreguntaM2}};
    var Repoduciendo=0;
    var link_sonido="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}";
    $("#audio").addClass("reproduce");
    function ComprobarSelect(id) {
        
        if ($(id).val()==1) {
            $(id).removeClass("bg-danger");
            $(id).removeClass("text-white");
            $(id).addClass("bg-success text-white");
            $(id).prop('disabled', 'disabled');
            correcto++;
        }else{
            $(id).addClass("bg-danger text-white");
            $(id).prop('enable','enable');
            incorrecto++;
        }
        
        if (correcto==$("#Numero_Preguntas").val()) {
                if (areaState==5) { 

                    redirecciona("{{url('/MiFamiliadeCarrera/HomeR')}}",'Felicidades ','Completaste el m&oacute;dulo');
                }else{
                    mandarText("Felicidades","Ayudaste a encontrar las palabras de las grabaciones");
                    correcto=0;
                    incorrecto= 0;
                    areaState++;
                    actualiza(areaState);
                }
            }
            if(incorrecto==3){
                repaso();
            }
            if(incorrecto>0&&incorrecto<3){
                mandarText("Casi lo logras ","Int&eacute;ntalo de nuevo.");
            }
    }
    function allowDrop(ev) {
        ev.preventDefault();
    }
    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }
    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        ev.target.appendChild(document.getElementById(data));
    }
    function Reproducion(link) {
        if(Repoduciendo==0){
          Repoduciendo=1;
          let paudio = document.createElement("audio");
          paudio.setAttribute("src","{{url('/')}}/"+link ,"id","audio");
          //paudio.setAttribute("id","prueba");
          paudio.setAttribute("onended","Acabo_Audio()");
          paudio.play();
          
          
        }
    }
    function Acabo_Audio(){
      if(correcto==0&&incorrecto==0){
          $.ajax({
              type: "POST",
              dataType : 'json',
              url:"/api/MiFamiliadeCarrera/getModulo2",
              data: {"_token": $("meta[name='csrf-token']").attr("content"),
                  "id_recursos":areaState
              }, 
              success: function(data){
                  correcto=0;
                  $("#Pregunta").html(data);
                //   console.log($("#Pregunta").html());
              }
          });
          
        }
        
        Repoduciendo=0;
        // comprobacionExisteRes();
    }
    // function comprobacionExisteRes(id){
    //     testResID1 = document.getElementById("res1");
    //     testResID2 = document.getElementById("res2");
    //     testResID3 = document.getElementById("res3");
    //     testResID4 = document.getElementById("res4");
    //     if(testResID1 == null){
    //         console.log("No existe",testResID1);
    //     }else{
    //         console.log("Existe res1");
    //         if(testResID4 == null){
    //             document.getElementById('0opcion2').style.display = 'none';
    //             document.getElementById('0opcion3').style.display = 'none';
    //             document.getElementById('0opcion4').style.display = 'none';
    //             document.getElementById('0opcion5').style.display = 'none';
    //             // document.getElementById('0opcion6').style.display = 'none';
    //             // document.getElementById('0opcion7').style.display = 'none';
    //         }else{

    //             document.getElementById('0opcion2').style.display = 'none';
    //             document.getElementById('0opcion3').style.display = 'none';
    //             document.getElementById('0opcion4').style.display = 'none';
    //             document.getElementById('0opcion5').style.display = 'none';
    //             document.getElementById('0opcion6').style.display = 'none';
    //             document.getElementById('0opcion7').style.display = 'none';
    //         }
    //     }
    //     if(testResID2 == null){
    //         console.log("No existe",testResID2);
    //     }else{
    //         console.log("Existe res2");
    //         if(testResID4 == null){
    //             document.getElementById('1opcion0').style.display = 'none';
    //             document.getElementById('1opcion1').style.display = 'none';
    //             document.getElementById('1opcion4').style.display = 'none';
    //             document.getElementById('1opcion5').style.display = 'none';
    //         }else{
    //             document.getElementById('1opcion0').style.display = 'none';
    //             document.getElementById('1opcion1').style.display = 'none';
    //             document.getElementById('1opcion4').style.display = 'none';
    //             document.getElementById('1opcion5').style.display = 'none';
    //             document.getElementById('1opcion6').style.display = 'none';
    //             document.getElementById('1opcion7').style.display = 'none';
    //         }
    //     }
    //     if(testResID3 == null){
    //         console.log("No existe",testResID3);
    //     }else{
    //         console.log("Existe res3");
    //         if(testResID4 == null){               
    //             document.getElementById('2opcion0').style.display = 'none';
    //             document.getElementById('2opcion1').style.display = 'none';
    //             document.getElementById('2opcion2').style.display = 'none';
    //             document.getElementById('2opcion3').style.display = 'none';
    //         }else{
    //         document.getElementById('2opcion0').style.display = 'none';
    //         document.getElementById('2opcion1').style.display = 'none';
    //         document.getElementById('2opcion2').style.display = 'none';
    //         document.getElementById('2opcion3').style.display = 'none';
    //         document.getElementById('2opcion6').style.display = 'none';
    //         document.getElementById('2opcion7').style.display = 'none';
    //         }
    //     }
    //     if(testResID4 == null){
    //         console.log("No existe",testResID4);
    //     }else{
    //         console.log("Existe res4");
    //         document.getElementById('3opcion0').style.display = 'none';
    //         document.getElementById('3opcion1').style.display = 'none';
    //         document.getElementById('3opcion2').style.display = 'none';
    //         document.getElementById('3opcion3').style.display = 'none';
    //         document.getElementById('3opcion4').style.display = 'none';
    //         document.getElementById('3opcion5').style.display = 'none';
    //     }
    // }
    function redirecciona(link,titulo,texto){
        swal({
        title: titulo,
        text: texto,
        timer: 3000
        }).then(function () {},
            function (dismiss) {
                if (dismiss === 'timer') {
                    window.location.replace(link);
                }
            }
        )
    }  

    function repaso(){
        swal({
        title: '¿Necesitas ayuda?',
        text: '¡Deberias revisar este video!',
        html: '<video src="{{asset('/images/familiadecarreras/familiadecarreras/videoDeAyuda.mp4')}}" style="width: 400px;" controls></video>'
    })
    }
    function redireccionaM(link,titulo,texto){
        swal({
          title: titulo,
          text: texto,
          timer: 500,
          showCancelButton: false,
          showConfirmButton: false
        }).then(
          function () {},
          // handling the promise rejection
          function (dismiss) {
            if (dismiss === 'timer') {
             window.location.replace(link);
            }
          }
        )  
    }

    function mandarText(titulo,texto){
        swal({
        title: titulo,
        text: texto,
        timer: 3000
        }).then(function () {},
            function (dismiss) {
                if (dismiss === 'timer') {
                    //window.location.replace(link);
                }
            }
        )
    } 
    {{$usuario_id = auth()->id();}}
    function actualiza(areaState){
        
        $.ajax({
            type: "POST",
            dataType : 'json',
            url:"/api/MiFamiliadeCarrera/getModulosRecursos",
            data: {"_token": $("meta[name='csrf-token']").attr("content"),
                "id_recursos":areaState,
                "usuario_id":{{$usuario_id}}
            },
            success: function(data){
                link_sonido=data.audio;
                $("#ImagenAudio").attr('src', "{{url('/')}}/"+data.imagen);
                $("#Pregunta").html("");
            }
        });

    }
    
</script>
@endsection