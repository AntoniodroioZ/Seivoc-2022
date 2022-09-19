@extends('miFamiliaCarrera.navModulos')

@section('content')
<header class="jumbotron">
    <div class="container">
    <div class="row row-header">
        <div class="col col-md-6 offset-md-3 ">
            <a style="text-align: center; width:300px; " role="button" class="vamos bbtn btn-block nav-link btn-info" data-toggle="tooltip" data-html="true"  title="<strong>Material previo</strong>"       data-placement="bottom" href="{{url('/MiFamiliadeCarrera')}}">
                |Conocimientos perdidos
                <img src="{{ asset('images/familiadecarreras/Cerebro.png') }}" style="width: 50px;">
            </a>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row row-header">
            <div class="col col-md-6 offset-md-3 ">
                <p style="text-align: center;">Con las explosi&oacute;n, los estudiantes perdieron el conocimiento, tu deber es ayudar  que recuperen sus conocimientos escenciales.Recuerda que cada alumno estudia en un &aacutere;a espec&iacute;fica.
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
        <figure class="col-md-2 mt-2" style="margin-left: 1.2rem;">
            <img  id="firstImage" class="img-fluid rounded" src="{{ asset('images/familiadecarreras/Area1Modulo1.jpg') }}">
            <figcaption  style="text-align: center;">
                Ciencias F&iacute;sico-Matem&aacute;ticas y
            </figcaption>
            <figcaption  style="text-align: center;">
                de las Ingenier&iacute;as
            </figcaption>
        </figure>

        <figure class="col-md-2 mt-2" style="margin-left: 1.2rem;">
            <img class="img-fluid rounded" src="{{ asset('images/familiadecarreras/Area2Modulo1.jpg') }}">
            <figcaption  style="text-align: center;">
                Ciencias Biol&oacute;gicas y
            </figcaption>
            <figcaption  style="text-align: center;">
                de la salud
            </figcaption>
        </figure>

        <figure class="col-md-2 mt-2" style="margin-left: 1.2rem;">
            <img class="img-fluid rounded" src="{{ asset('images/familiadecarreras/Area3Modulo1.jpg') }}">
            <figcaption  style="text-align: center;">
                Ciencias Sociales
            </figcaption >
            <figcaption  style="text-align: center;">
            </figcaption>
        </figure>


        <figure class="col-md-2 mt-2" style="margin-left: 1.2rem;">
            <img class="img-fluid rounded" src="{{ asset('images/familiadecarreras/Area4Modulo1.jpg') }}">
            <figcaption  style="text-align: center;">
                Humanidades
            </figcaption>
            <figcaption  style="text-align: center;">              
            </figcaption>
        </figure>

        <figure class="col-md-2 mt-2" style="margin-left: 1.2rem;">
            <img class="img-fluid rounded" src="{{ asset('images/familiadecarreras/Area5Modulo1.jpg') }}">
            <figcaption  style="text-align: center;">
                Artes
            </figcaption>
            <figcaption  style="text-align: center;">        
            </figcaption>
        </figure>

    </div>


    <div class="offset-md-3">
        Te sugerimos guiarte con los siguientes colores:
        <span class="badge badge-success" style="height: 35px;">Completo</span>
        <span  class="badge" style="height:35px; background:rgb(255,128,0)">Casi completo</span>
    </div>

    <div class="row ">
        <div class="col col-sm  col-md-2 offset-md-1 " >
            <div class="divi2" id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <div class="divi1" ondrop="drop(event)" ondragover="allowDrop(event)" style="border: none;">
                @foreach($respuestaseparadas[0] as $i => $separadas)
                <a style="text-align: center;" role="button" class="comprobables bbtn btn-block nav-link btn-info MetaDataJCSeivoc" ReferenciaMetaSEIVOC="{{4111+$i}}"
                draggable="true" ondragstart="drag(event)" width="88" id="drag{{ $i+0 }}" idrespuesta="{{ $separadas[1] }}" height="31">{{ $separadas[0] }}</a>
                @endforeach
            </div>
        </div>  
        <div class="col col-sm  col-md-2 " >
            <div class="divi2"  id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <div class="divi1" ondrop="drop(event)" ondragover="allowDrop(event)" style="border: none;">
                @foreach($respuestaseparadas[1] as $i => $separadas)
                <a style="text-align: center;" role="button" class="comprobables bbtn btn-block nav-link btn-info MetaDataJCSeivoc" ReferenciaMetaSEIVOC="{{4114+$i}}"
                draggable="true" ondragstart="drag(event)" width="88" id="drag{{ $i+3 }}" idrespuesta="{{ $separadas[1] }}" height="31">{{ $separadas[0] }}</a>
                @endforeach
            </div>
        </div>  

        <div class="col col-sm  col-md-2 " >
            <div class="divi2" id="div3" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <div class="divi1" ondrop="drop(event)" ondragover="allowDrop(event)" style="border: none;">
                @foreach($respuestaseparadas[2] as $i => $separadas)
                <a style="text-align: center;" role="button" class="comprobables bbtn btn-block nav-link btn-info MetaDataJCSeivoc" ReferenciaMetaSEIVOC="{{4117+$i}}"
                draggable="true" ondragstart="drag(event)" width="88" id="drag{{ $i+6 }}" idrespuesta="{{ $separadas[1] }}" height="31">{{ $separadas[0] }}</a>
                @endforeach

            </div>
        </div>  


        <div class="col col-sm  col-md-2 " >
            <div class="divi2"  id="div4" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <div class="divi1" ondrop="drop(event)" ondragover="allowDrop(event)" style="border: none;">
                @foreach($respuestaseparadas[3] as $i => $separadas)
                <a style="text-align: center;" role="button" class="comprobables bbtn btn-block nav-link btn-info MetaDataJCSeivoc" ReferenciaMetaSEIVOC="{{4118+$i}}"
                draggable="true" ondragstart="drag(event)" width="88" id="drag{{ $i+9 }}" idrespuesta="{{ $separadas[1] }}" height="31">{{ $separadas[0] }}</a>
                @endforeach
            </div>
        </div>  



        <div class="col col-sm  col-md-2 " >
            <div class="divi2"   id="div5" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <div class="divi1" ondrop="drop(event)" ondragover="allowDrop(event)" style="border: none;">
                @foreach($respuestaseparadas[4] as $i => $separadas)
                <a style="text-align: center;" role="button" class="comprobables bbtn btn-block nav-link btn-info MetaDataJCSeivoc" ReferenciaMetaSEIVOC="{{4121+$i}}"
                draggable="true" ondragstart="drag(event)" width="88" id="drag{{ $i+12 }}" idrespuesta="{{ $separadas[1] }}" height="31">{{ $separadas[0] }}</a>
                @endforeach
            </div>
        </div>  
    </div>
    <br>
    <br>
</div><!--TODO EL CONTANINER-->
    <!--Comprobación-->
<div class="container">
    <div class="row row-content">
    <div class="col col-sm-4  col-md-4 offset-md-1">
        <a  role="button" class="flechas MetaDataJCSeivoc" ReferenciaMetaSEIVOC="4029"  data-toggle="tooltip" data-html="true"  title="<strong>Ménu</strong>"
        data-placement="bottom" href="{{url('/MiFamiliadeCarrera/HomeR')}}">
        <img style="width:60px;"  src="{{ asset('images/familiadecarreras/Flecha-atras.png') }}"></a>
    </div> 
    <div class="col col-sm-4  col-md-4" >
        <a id ="comprueba" role="button" class="vamos bbtn btn-block nav-link btn-info MetaDataJCSeivoc" ReferenciaMetaSEIVOC="4030" href="#firstImage" data-toggle="modal" data-target="#exampleModalLong1" onclick="correrValidaciones()">Comprobar</a>
    </div>  
    <div class= >
        <a id ="comprueba" role="button" class="vamos bbtn btn-block nav-link btn-info MetaDataJCSeivoc" ReferenciaMetaSEIVOC="4031" href="#firstImage" data-toggle="modal" data-target="#exampleModalLong1" onclick="enviar()">Enviar respuestas</a>
    </div> 
    <div class="col col-sm-4  col-md-4">
        <a  id="flechaSig" style="visibility: hidden;" role="button" class="flechas"  data-toggle="tooltip" data-html="true"  title="<strong>Módulo2</strong>"
        data-placement="bottom" href="{{url('/MiFamiliadeCarrera/Modulo2')}}"><img style="width:60px;"  src="{{ asset('images/familiadecarreras/Flecha-adelante.png') }}"></a>
    </div>  
    </div>
</div>

<!-- Modal -->
   {{-- <div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h5 class="modal-title" id="exampleModalLongTitle1">EXCELENTE!</h5></center>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
           <h4>Ahora estamos más cerca de salvar a los estudiantes</h4>
          <div class="modal-body">
            <div class="content">
                    <img class="imgP" src="{{ asset('images/familiadecarreras/Area1_SN.png')}}">
            </div>
          </div>
          <div class="modal-footer">
            {{-- <button type="button" class="b1" data-dismiss="modal"  onclick="window.location='{{url('/MiFamiliadeCarrera/HomeR')}}'">Regresar</button> --}}
            {{-- <button type="button" class="b1" data-dismiss="modal"  onclick="actualizaPuntaje()">Enviar respuestas</button>
          </div>
        </div>
      </div>
    </div> --}}
    <!-- End Modal-->
<link href="https://cdn.jsdelivr.net/sweetalert2/6.0.1/sweetalert2.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/sweetalert2/6.0.1/sweetalert2.min.js"></script>

  <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/js/popper.min.js') }}"></script>
      <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script>
        var intentos=0;
        var aciertos=0;
        var bandera_Equivoco=false;
        var bandera_Perfect=false;
        // $(document).ready(function(){
        //     var comprueba=0;
        //     $('#comprueba').click(function(){
        //        bandera_Equivoco=false;
        //         bandera_Perfect=false;

        //     validarareas(1);
        //     validarareas(2);
        //     validarareas(3);
        //     validarareas(4);
        //     validarareas(5);
        //     // console.log(validarareas(1));
            
        //     // console.log("comprobacion 1: ", comprobacion1, "comprobacion 2: ", comprobacion2, "comprobacion 3: ", comprobacion3, "comprobacion 4: ", comprobacion4, "comprobacion 4: ", comprobacion5);

        //  });//comprueba
           
        // });//document
        function correrValidaciones(){
            validarareas(1);
            validarareas(2);
            validarareas(3);
            validarareas(4);
            validarareas(5);
            
        }
        function enviar(){
            contador = 0;
            if(div1.style.backgroundColor == "rgb(0, 200, 0)"){
                // console.log(div1.style.backgroundColor);
                console.log("Area 1 correcta")
                contador++;
                console.log("contador: ", contador);
            } 
            if(div2.style.backgroundColor == "rgb(0, 200, 0)"){
                // console.log(div1.style.backgroundColor);
                console.log("Area 2 correcta")
                contador++;
                console.log("contador: ", contador);
            } 
            if(div3.style.backgroundColor == "rgb(0, 200, 0)"){
                // console.log(div1.style.backgroundColor);
                console.log("Area 3 correcta")
                contador++;
                console.log("contador: ", contador);
            } 
            if(div4.style.backgroundColor == "rgb(0, 200, 0)"){
                // console.log(div1.style.backgroundColor);
                console.log("Area 4 correcta")
                contador++;
                console.log("contador: ", contador);
            } 
            if(div5.style.backgroundColor == "rgb(0, 200, 0)"){
                // console.log(div1.style.backgroundColor);
                console.log("Area 5 correcta")
                contador++;
                console.log("contador: ", contador);
            } 
            if(contador<5){
                console.log("Completa todo el modulo para continuar");
                alertaCompletar();
            }
            if(contador == 5){
                console.log("Avancemos al siguiente m&oacute;dulo");
                $.ajax({
                type: "GET",
                data: {
                "_token": $("meta[name='csrf-token']").attr("content"),
                "puntaje": 5,
                "medalla": 1,   
                "pregunta_id":5,
                },
                 url:"/MiFamiliadeCarrera/statusAjax",
             
                success: function (data) {
                console.log("Funciona");

                }
                });
                redireccionaB();
            }

        }

        function validarareas(id){
            var resultado = 0;
            if ($('#div' + id).find(".comprobables").length) {
                // console.log('Contiene algo');

                var respuesta1 = [];
                $('#div' + id).find(".comprobables").each(function(){
                    respuesta1.push($(this).attr("idrespuesta"));

                });
                // console.log(respuesta1);
                $.ajax({
                type: "POST",
                data: {
                "_token": $("meta[name='csrf-token']").attr("content"),
                "pregunta": id,
                "respuestas": respuesta1,   
                "usuario_id":{{$usuario_id}}
                },
                 url:"/api/validar_respuestas_modulo1/",
             
                success: function (data) {
                // console.log(data);
                if (data == 1) {
                    //verde
                    $("#div" + id).css('background', 'rgb(0,200,0)');
                    // return retornar1();
                }
                else if(data == 2){
                    //naranja
                    $("#div" + id).css('background', 'rgb(255,128,0)');
                    redirecciona();
                }
                else if(data == 0){
                    //rojo
                    $("#div" + id).css('background', 'rgb(255,0,0)');
                    redirecciona();
                }
                }
                });
            }
            // if($('#div' + id).style.backgroundColor)
            // console.log(div1.style.backgroundColor);
        }
        
    </script>

    <script>
    function redirecciona(){
        swal({
          title: 'Nos parece que te ayudar&iacute;a',
          text: 'revisar de nuevo Mi familia de Carreras\nTe redirigiremos en un momento',
          timer: 3500
        }).then(
          function () {},
          // handling the promise rejection
          function (dismiss) {
            if (dismiss === 'timer') {
              //console.log('Me parece que nos ayudaría revisar de nuevo “Mi familia de Carreras')
            //   window.location.replace("{{url('/MiFamiliadeCarrera')}}");
                window.open("{{url('/MiFamiliadeCarrera')}}",'_blank');
            }
          }
        )
    }      
    
    function redireccionaB(){
        swal({
          title:'¡Lo has logrado!',
          text: 'Avancemos al siguiente m&oacute;dulo',
        //   icon: 'success',
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
          }
        )
    }    
    function alertaCompletar(){
        swal({
          title:'Completa todo el modulo',
          text: 'para poder continuar',
          timer: 4000
        })
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
    </script>
@endsection