@extends('seivoc.nav')

@section('content')
<br><br><br><br><br>
<meta name="csrf-token" content="{{ Session::token() }}"> 
<div class="modal fade" id="modalInstruccion" tabindex="-1" aria-labelledby="modalInstruccionLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalInstruccionLabel">Bienvenido</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col col-md-6 offset-md-3" id="ruta">
            <img class="img-fluid" src="{{ asset('images/bienvenida-cuestionario.png') }}" alt="">
        </div>
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" >Cerrar</button> --}}
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<main style="background-color: transparent;" >
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-1" >
      <div class="col" >
        <div class="card shadow-sm " style="  border-radius:  50px; ">
          <div class="card-body">
            @if (isset ($Datos['error']))
                <div class="alert alert-danger">
                  <p>{{$Datos['error']}}</p>
                </div>
            @endif
            <form id = "combo" name="combo" method="POST" action="{{ route('SavAlumnoOriuentador') }}" style="display: block; margin: 0 auto;text-align:center;">
            @csrf
            <p style="color:#28285b;font-size: 34px;font-family: Arial;text-align: center;"> Formación Académica
            </p>
            <br><br>
            <div>
                <div id="cbx_situacion_text">
                    Situación actual: *
                </div>
                <span class="custom-dropdown">
                    <select id="cbx_situacion" name="id_situacion">
                        @foreach ($Situaciones as $Situacion)
                            {{--@if($Situacion->descripcion!='Sin Dato') --}}
                                <option  value='{{$Situacion->situacion_id}}'>{{$Situacion->descripcion}}</option>
                            {{--@endif--}}
                        @endforeach
                    </select>
                </span>
            </div>

            </br>
            </br>

            <div>
                <div id="cbx_modalidad_text">
                    Modalidad de estudio: *
                </div>
                <span class="custom-dropdown">
                    <select id="cbx_modalidad" name="id_modalidad">
                        <option value="{{$Modalidad->modalidad_id}}">{{$Modalidad->descripcion}}</option>
                    </select>     
                </span>
            </div> 

            </br>
            </br>

            <p style="color:#28285b;font-size: 14px;font-family: Arial;text-align: center;">Ultimo año de escolaridad
            </p>
            <div>
                
                <div id="cbx_grado_text">
                    Selecciona tu ultimo grado de estudios: *
                </div>
                <span class="custom-dropdown">
                    <select id="cbx_grado" name="id_grado">
                        @foreach ($Grados as $Grado)
                            {{--@if($Grado->descripcion!='Sin Dato')--}}
                                <option   value='{{$Grado->grado_id}}'>{{$Grado->descripcion}}</option>
                            {{--@endif--}}
                        @endforeach
                </select>
                </span>
            </div>

            </br>
            </br>

            <div id="tipo_escuela_div">
                <div id="tipo_escuela_text">
                    Selecciona tu tipo de escuela: *
                </div>
                <span class="custom-dropdown">
                    <select id="tipo_escuela" name="tipo_escuela">
                        <option value="0">Publica</option>
                        <option value="1">Privada</option>
                    </select>
                </span>      
            </div>


            </br>
            </br>

            <div id="cbx_escuela_div">
                <div id="cbx_escuela_text">
                    Selecciona tu escuela: *
                </div>
                <span class="custom-dropdown">
                    <select id="cbx_escuela" name="id_escuela">
                        <option value="{{$Escuela->escuela_id}}">{{$Escuela->descripcion}}</option>
                    </select>
                </span>      
            </div>

            </br>
            </br>

            <div id="cbx_plantel_div">
                <div id="cbx_plantel_text">
                    Selecciona tu plantel: *
                </div>
                <span class="custom-dropdown">
                    <select id="cbx_plantel" name="id_plantel">
                        <option value="{{$Plantel->plantel_id}}">{{$Plantel->descripcion}}</option>
                    </select>
                </span>      
            </div>

            </br>
            </br>

            <div>
                <div id="cbx_anio_text">
                    Año que cursas/cursaste *
                </div>
                <span class="custom-dropdown">
                    <select id="cbx_anio" name="id_ultimo_anio_cursado">
                        <option value="{{$Anio->periodo_escolar_id}}">{{$Anio->descripcion}}</option>
                    </select>
                </span>
            </div>

            </br>
            </br>

            <div>
                <div id="cbx_residencia_text">
                    Lugar de residencia: *
                </div>
                <span class="custom-dropdown">
                    <select id="cbx_residencia" name="id_residencia">
                        @foreach ($Residencias as $Residencia)
                            @if($Residencia->nombre_estado!='Sin Dato') 
                                <option   value='{{$Residencia->estado_id}}'>{{$Residencia->descripcion}}</option> 
                            @endif
                        @endforeach
                    </select>
                </span>
            </div>

            </br>
            </br>

            <div id="cbx_cdmx_div">
                <div id="cbx_cdmx_text">
                     Si eres de la Ciudad de México selecciona tu delegación:
                </div>
                <span class="custom-dropdown">
                    <select id="cbx_cdmx" name="id_delegacion">
                        <option value="{{$Delegacion->delegacion_id}}">{{$Delegacion->descripcion}}</option>
                    </select>
                </span>      
            </div> 

            </br>
            </br>

            <div>
                <div id="cbx_sirve_text">
                     ¿Para qué crees que te servirá contestar el presente cuestionario de Intereses? *
                </div>
                <span class="custom-dropdown">
                    <select id="cbx_sirve" name="id_para_que_me_sirve">
                        @foreach ($Para_que_me_sirves as $Para_que_me_sirve)
                            @if($Para_que_me_sirve->descripcion!='Sin Dato') 
                                <option   value='{{$Para_que_me_sirve->respuestaC_id}}'>{{$Para_que_me_sirve->descripcion}} </option>
                            @endif
                        @endforeach
                    </select>
                </span>
            </div>

            </br>
            </br>

            <div id="cbx_opcion_div">
                <div id="cbx_opcion_text">
                    ¿Has pensado en alguna opción de carrera? *
                </div>
                <span class="custom-dropdown">
                    <select id="cbx_opcion" name="id_opcion_de_carrera">
                        @foreach ($Opcion_de_carreras as $Opcion_de_carrera)
                            @if($Opcion_de_carrera->descripcion!='Sin Dato')
                                <option   value='{{$Opcion_de_carrera->respuestaC_id}}'>{{$Opcion_de_carrera->descripcion}} </option>
                            @endif
                        @endforeach
                    </select>
                </span>
            </div>

            </br>
            </br>

            <div id="cbx_campo_div">
                <div id="cbx_campo_text">
                    ¿Qué campo de conocimiento te interesa para realizar estudios de nivel superior?
                </div>
                <span class="custom-dropdown">
                    <select id="cbx_campo" name="id_interes_campo_de_conocimiento">

                        @foreach ($Interes_campo_de_conocimientos as $Interes_campo_de_conocimiento)
                             @if($Interes_campo_de_conocimiento->descripcion!='Sin Dato') 
                                <option   value='{{$Interes_campo_de_conocimiento->respuestaC_id}}'>{{$Interes_campo_de_conocimiento->descripcion }}</option>
                            @endif
                        @endforeach

                    </select>
                </span>
            </div>

            </br>
            </br>

            <div>
                <div id="cbx_estudiando_text">
                    ¿Por qué quieres seguir estudiando? *
                </div>
                <span class="custom-dropdown">
                    <select id="cbx_estudiando" name="id_porque_seguir_estudiando">

                        @foreach ($Porque_seguir_estudiandos as $Porque_seguir_estudiando)
                            @if($Porque_seguir_estudiando->descripcion!='Sin Dato') 
                                <option   value='{{$Porque_seguir_estudiando->respuestaC_id}}'>{{$Porque_seguir_estudiando->descripcion}} </option>
                            @endif
                        @endforeach
                    </select>
                </span>
            </div>

            </br>
            </br>

            <div style="text-align: center;">
                <div id="Text-Aux" class="text-danger" style="display: none">
                  * Campos obligatorios faltantes en Rojo 
                </div>
                <input id="button_From_Enviar" type="button" value="Siguiente" style="font-family: 'Arial';background-color: rgb(0,115,179);border: none; color: white; font-size: 16px;border-radius: 4px;display: block; margin: 0 auto;">
            </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
  <br><br><br><br>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script  type="text/javascript">
$(document).ready(function(){
  $('#modalInstruccion').modal('show');
    $("#cbx_grado").change(function () {
        $('#cbx_plantel').find('option').remove().end().append('<option value="{{$Plantel->id_escuela}}">{{$Plantel->nombre}}</option>').val('{{$Plantel->id_escuela}}');
        $.ajax({
                type: "POST",
                url:"getAnio",
                data:{"_token": $("meta[name='csrf-token']").attr("content"),
                        "id_grado":$("#cbx_grado").val()

                },
                success: function(data){
                    $("#cbx_anio").html(data);
                }
            });
        $.ajax({
              type: "POST",
              url:"getEscuela",
              data: {"_token": $("meta[name='csrf-token']").attr("content"),
                   "id_grado" : $("#cbx_grado").val(),
                       "id_modalidad":$("#cbx_modalidad").val(),
              },
              success: function(data){
                $("#cbx_escuela").html(data);
                    console.log($("#cbx_escuela").val());
                    $.ajax({
                        type: "POST",
                        url:"getPlantel",
                        data: {"_token": $("meta[name='csrf-token']").attr("content"),
                               "id_escuela" : $("#cbx_escuela").val()
                        },
                        success: function(data){
                            $("#cbx_plantel").html(data);
                            checkFromCascada();
                        }
                    });
              }
            });
    })
    $("#cbx_modalidad").change(function () {
        //$('#cbx_plantel').find('option').remove().end().append('<option value="{{$Plantel->id_escuela}}">{{$Plantel->nombre}}</option>').val('{{$Plantel->id_escuela}}');
        
        $.ajax({
              type: "POST",
              url:"getEscuela",
              data: {"_token": $("meta[name='csrf-token']").attr("content"),
                   "id_grado" : $("#cbx_grado").val(),
                       "id_modalidad":$("#cbx_modalidad").val(),
              },
              success: function(data){
                $("#cbx_escuela").html(data);
                    console.log($("#cbx_escuela").val());
                    $.ajax({
                        type: "POST",
                        url:"getPlantel",
                        data: {"_token": $("meta[name='csrf-token']").attr("content"),
                               "id_escuela" : $("#cbx_escuela").val()
                        },
                        success: function(data){
                            $("#cbx_plantel").html(data);
                            checkFromCascada();
                        }
                    });
              }
            });
            
    })
    $("#cbx_situacion").change(function () {
        $("#cbx_situacion option:selected").each(function () {
            var id_situacion = $(this).val();
            $.ajax({
              type: "POST",
              url:"getModalidad",
              data: {"_token": $("meta[name='csrf-token']").attr("content"),
                   "id_situacion" : id_situacion
              },
              success: function(data){
                $("#cbx_modalidad").html(data);
              }
            });         
        });
    })
});



$(document).ready(function(){
    $("#cbx_escuela").change(function () {
        $("#cbx_escuela option:selected").each(function () {
            id_escuela = $(this).val();
            $.ajax({
              type: "POST",
              url:"getPlantel",
              data: {"_token": $("meta[name='csrf-token']").attr("content"),
                   "id_escuela" : id_escuela
              },
              success: function(data){
                $("#cbx_plantel").html(data);
                    checkFromCascada();
              }
            }); 
        });
    })
});

$(document).ready(function(){
    $("#cbx_residencia").change(function () {
        $("#cbx_residencia option:selected").each(function () {
            id_residencia = $(this).val();
            
            $.ajax({
              type: "POST",
              url:"/getDelegacion",
              data: {"_token": $("meta[name='csrf-token']").attr("content"),
                   "id_residencia" : id_residencia
              },
              success: function(data){
                $("#cbx_cdmx").html(data);
                    checkFromCascada();
              }
            });           
        });
    })
});
</script>
<script type="text/javascript" >
    $(document).ready(function(){
        $("#button_From_Enviar").click(function(event){
            console.log(checkFromSelect());
            if (checkFromSelect()) {
               $('#combo').submit(); 
            }else{
                $('#Text-Aux').show(); 
            }
        });
        $('#cbx_situacion').change(function () {
            
            checkFromSelect();
        });
        $('#cbx_modalidad').change(function () {
            
            checkFromSelect();
        });
        $('#cbx_grado').change(function () {
            
            checkFromSelect();
        });
        $('#cbx_escuela').change(function () {
            
            checkFromSelect();
        });
        $('#cbx_plantel').change(function () {
            checkFromSelect();
        });
        $('#cbx_anio').change(function () {
            checkFromSelect();
        });
        $('#cbx_residencia').change(function () {
            checkFromSelect();
        });
        $('#cbx_cdmx').change(function () {
        checkFromCascada();
            checkFromSelect();
        });
        $('#cbx_sirve').change(function () {
            checkFromSelect();
        });
        $('#cbx_opcion').change(function () {
        checkFromCascada();
            checkFromSelect();
        });
        $('#cbx_campo').change(function () {
            checkFromSelect();
        });
        $('#cbx_estudiando').change(function () {
            checkFromSelect();
        });
        $('#tipo_escuela').change(function () {
            checkFromSelect();
            if($('#tipo_escuela').val()>0){
                $('#cbx_escuela_div').hide();
                $('#cbx_plantel_div').hide();
                $('#cbx_escuela').val(0);
                $('#cbx_plantel').val(0);
            }else{
                $('#cbx_escuela_div').show();
                $('#cbx_plantel_div').show();
            }
        });
        
    });
    /**********************************************************************/
    
    function checkFromCascada() {
        var count_E =$("#cbx_escuela").children().length;
        var count_P =$("#cbx_plantel").children().length;
        var count_C =$("#cbx_cdmx").children().length;
        if(count_E<=1){
             if ($("#cbx_escuela option:selected").text()=="Sin Dato"||$("#cbx_escuela option:selected").text()==""){
                $('#cbx_escuela_div').hide();
             }else{
                if($('#tipo_escuela').val()==0){
                    $('#cbx_escuela_div').show();
                }
             }
            
        }else{
            if($('#tipo_escuela').val()==0){
                $('#cbx_escuela_div').show();
            }
        }
        if(count_P<2){
            if ($("#cbx_plantel option:selected").val()!=12){
                $('#cbx_plantel_div').hide();
             }else{
                if($('#tipo_escuela').val()==0){
                    $('#cbx_plantel_div').show();
                }
             }
            
        }else{
            if($('#tipo_escuela').val()==0){
                $('#cbx_plantel_div').show();
            }
         }
        if(count_C<2){
                $('#cbx_cdmx_div').hide();
        }else{
            $('#cbx_cdmx_div').show(100);
         }
         if ($("#cbx_opcion ").val()==5){
            $('#cbx_campo_div').show();
         }else{
            $('#cbx_campo').val('13');
            $('#cbx_campo_div').hide();
         }
        
        
        
    }
    function checkFromSelect() {
        var FromTrue=true;
        //*********Modalidad de estudio: *
        var count = $("#cbx_situacion").children().length;
        if (count>1) {
            if ($("#cbx_situacion").val()) {
                if ($("#cbx_situacion option:selected").text()=="Sin Dato") {
                    $('#cbx_situacion_text').removeClass();
                    $('#cbx_situacion_text').addClass('text-danger');
                    FromTrue=FromTrue&&false;
                }else{
                    $('#cbx_situacion_text').removeClass();
                    FromTrue=FromTrue&&true;
                }
            }else{
                $('#cbx_situacion_text').removeClass();
                $('#cbx_situacion_text').addClass('text-danger');
                FromTrue=FromTrue&&false;
            }
        }else{
            $('#cbx_situacion_text').removeClass();
            FromTrue=FromTrue&&true;
        }
        //*********Modalidad de estudio: *
        var count = $("#cbx_modalidad").children().length;
        if (count>1) {
            if ($("#cbx_modalidad").val()) {
                if ($("#cbx_modalidad option:selected").text()=="Sin Dato") {
                    $('#cbx_modalidad_text').removeClass();
                    $('#cbx_modalidad_text').addClass('text-danger');
                    FromTrue=FromTrue&&false;
                }else{
                    $('#cbx_modalidad_text').removeClass();
                    FromTrue=FromTrue&&true;
                }
            }else{
                $('#cbx_modalidad_text').removeClass();
                $('#cbx_modalidad_text').addClass('text-danger');
                FromTrue=FromTrue&&false;
            }
        }else{
            $('#cbx_modalidad_text').removeClass();
            FromTrue=FromTrue&&true;
        }
        //*********Selecciona tu ultimo grado de estudios: *
        var count = $("#cbx_grado").children().length;
        if (count>1) {
            if ($("#cbx_grado").val()) {
                if ($("#cbx_grado option:selected").text()=="Sin Dato") {
                    $('#cbx_grado_text').removeClass();
                    $('#cbx_grado_text').addClass('text-danger');
                    FromTrue=FromTrue&&false;
                }else{
                    $('#cbx_grado_text').removeClass();
                    FromTrue=FromTrue&&true;
                }
            }else{
                $('#cbx_grado_text').removeClass();
                $('#cbx_grado_text').addClass('text-danger');
                FromTrue=FromTrue&&false;
            }
        }else{
            $('#cbx_grado_text').removeClass();
            FromTrue=FromTrue&&true;
        }
        //*********Selecciona tu escuela: *
        if($('#tipo_escuela').val()==0){
            var count = $("#cbx_escuela").children().length;
            if (count>1) {
                if ($("#cbx_escuela").val()) {
                    if ($("#cbx_escuela option:selected").text()=="Sin Dato") {
                        $('#cbx_escuela_text').removeClass();
                        $('#cbx_escuela_text').addClass('text-danger');
                        FromTrue=FromTrue&&false;
                    }else{
                        $('#cbx_escuela_text').removeClass();
                        FromTrue=FromTrue&&true;
                    }
                }else{
                    $('#cbx_escuela_text').removeClass();
                    $('#cbx_escuela_text').addClass('text-danger');
                    FromTrue=FromTrue&&false;
                }
            }else{
                $('#cbx_escuela_text').removeClass();
                FromTrue=FromTrue&&true;
            }
            //*********Selecciona tu plantel: *
            var count = $("#cbx_plantel").children().length;
            if (count>1) {
                if ($("#cbx_plantel").val()) {
                    if ($("#cbx_plantel option:selected").text()=="Sin Dato") {
                        $('#cbx_plantel_text').removeClass();
                        $('#cbx_plantel_text').addClass('text-danger');
                        FromTrue=FromTrue&&false;
                    }else{
                        $('#cbx_plantel_text').removeClass();
                        FromTrue=FromTrue&&true;
                    }
                }else{
                    $('#cbx_plantel_text').removeClass();
                    $('#cbx_plantel_text').addClass('text-danger');
                    FromTrue=FromTrue&&false;
                }
            }else{
                $('#cbx_plantel_text').removeClass();
                FromTrue=FromTrue&&true;
            }
        }
        //*********Año que cursas/cursaste *
        var count = $("#cbx_anio").children().length;
        if (count>1) {
            if ($("#cbx_anio").val()) {
                if ($("#cbx_anio option:selected").text()=="Sin Dato") {
                    $('#cbx_anio_text').removeClass();
                    $('#cbx_anio_text').addClass('text-danger');
                    FromTrue=FromTrue&&false;
                }else{
                    $('#cbx_anio_text').removeClass();
                    FromTrue=FromTrue&&true;
                }
            }else{
                $('#cbx_anio_text').removeClass();
                $('#cbx_anio_text').addClass('text-danger');
                FromTrue=FromTrue&&false;
            }
        }else{
            $('#cbx_anio_text').removeClass();
            FromTrue=FromTrue&&true;
        }
        //*********Lugar de residencia: *
        var count = $("#cbx_residencia").children().length;
        if (count>1) {
            if ($("#cbx_residencia").val()) {
                if ($("#cbx_residencia option:selected").text()=="Sin Dato") {
                    $('#cbx_residencia_text').removeClass();
                    $('#cbx_residencia_text').addClass('text-danger');
                    FromTrue=FromTrue&&false;
                }else{
                    $('#cbx_residencia_text').removeClass();
                    FromTrue=FromTrue&&true;
                }
            }else{
                $('#cbx_residencia_text').removeClass();
                $('#cbx_residencia_text').addClass('text-danger');
                FromTrue=FromTrue&&false;
            }
        }else{
            $('#cbx_residencia_text').removeClass();
            FromTrue=FromTrue&&true;
        }
        //*********Si eres de la Ciudad de México selecciona tu delegación:
        var count = $("#cbx_cdmx").children().length;
        if (count>1) {
            if ($("#cbx_cdmx").val()) {
                if ($("#cbx_cdmx option:selected").text()=="Sin Dato") {
                    $('#cbx_cdmx_text').removeClass();
                    $('#cbx_cdmx_text').addClass('text-danger');
                    FromTrue=FromTrue&&false;
                }else{
                    $('#cbx_cdmx_text').removeClass();
                    FromTrue=FromTrue&&true;
                }
            }else{
                $('#cbx_cdmx_text').removeClass();
                $('#cbx_cdmx_text').addClass('text-danger');
                FromTrue=FromTrue&&false;
            }
        }else{
            $('#cbx_cdmx_text').removeClass();
            FromTrue=FromTrue&&true;
        }
        //*********¿Para qué crees que te servirá contestar el presente cuestionario de Intereses? *
        
        var count = $("#cbx_sirve").children().length;
        if (count>1) {
            if ($("#cbx_sirve").val()) {
                if ($("#cbx_sirve option:selected").text()=="Sin Dato") {
                    $('#cbx_sirve_text').removeClass();
                    $('#cbx_sirve_text').addClass('text-danger');
                    FromTrue=FromTrue&&false;
                }else{
                    $('#cbx_sirve_text').removeClass();
                    FromTrue=FromTrue&&true;
                }
            }else{
                $('#cbx_sirve_text').removeClass();
                $('#cbx_sirve_text').addClass('text-danger');
                FromTrue=FromTrue&&false;
            }
        }else{
            $('#cbx_sirve_text').removeClass();
            FromTrue=FromTrue&&true;
        }
        //*********¿Has pensado en alguna opción de carrera? *
        var count = $("#cbx_opcion").children().length;
        if (count>1) {
            if ($("#cbx_opcion").val()) {
                if ($("#cbx_opcion option:selected").text()=="Sin Dato") {
                    $('#cbx_opcion_text').removeClass();
                    $('#cbx_opcion_text').addClass('text-danger');
                    FromTrue=FromTrue&&false;
                }else{
                    $('#cbx_opcion_text').removeClass();
                    FromTrue=FromTrue&&true;
                }
            }else{
                $('#cbx_opcion_text').removeClass();
                $('#cbx_opcion_text').addClass('text-danger');
                FromTrue=FromTrue&&false;
            }
        }else{
            $('#cbx_opcion_text').removeClass();
            FromTrue=FromTrue&&true;
        }
        //*********¿Qué campo de conocimiento te interesa para realizar estudios de nivel superior?
        var count = $("#cbx_campo").children().length;
        if (count>1) {
            if ($("#cbx_campo").val()) {
                if ($("#cbx_campo option:selected").text()=="Sin Dato") {
                    $('#cbx_campo_text').removeClass();
                    $('#cbx_campo_text').addClass('text-danger');
                    FromTrue=FromTrue&&false;
                }else{
                    $('#cbx_campo_text').removeClass();
                    FromTrue=FromTrue&&true;
                }
            }else{
                $('#cbx_campo_text').removeClass();
                $('#cbx_campo_text').addClass('text-danger');
                FromTrue=FromTrue&&false;
            }
        }else{
            $('#cbx_campo_text').removeClass();
            FromTrue=FromTrue&&true;
        }
        //***¿Por qué quieres seguir estudiando? *
        var count = $("#cbx_estudiando").children().length;
        if (count>1) {
            if ($("#cbx_estudiando").val()) {
                if ($("#cbx_estudiando option:selected").text()=="Sin Dato") {
                    $('#cbx_estudiando_text').removeClass();
                    $('#cbx_estudiando_text').addClass('text-danger');
                    FromTrue=FromTrue&&false;
                }else{
                    $('#cbx_estudiando_text').removeClass();
                    FromTrue=FromTrue&&true;
                }
            }else{
                $('#cbx_estudiando_text').removeClass();
                $('#cbx_estudiando_text').addClass('text-danger');
                FromTrue=FromTrue&&false;
            }
        }else{
            $('#cbx_estudiando_text').removeClass();
            FromTrue=FromTrue&&true;
        }
        return FromTrue;
    }
  </script>
@endsection