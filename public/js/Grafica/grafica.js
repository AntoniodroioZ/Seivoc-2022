/*******************************************************/
/*************************Nuevo*************************/
/*******************************************************/


//Funcion para que se ejecute cuando abren la paguina
//***********************jquery*************************
$(document).ready(function () {
  $('#Planteles').hide(100);
  $('#Escuelas').hide(100);
  $('#Modalidades').hide(100);
  Actualizacion_usarios_numeracion();
 /*$.ajax({
        url: 'http://www.vocacionseivoc.unam.mx:2020/GetDatosGraficar',
        type: "POST",
        dataType: "json",
        data : {
            "TipoGrafica"  : $('#TipoGrafica').val(),
            "EspecialidadGrafica"  : $('#EspecialidadGrafica').val(),
            "situacion_id" : $('#Situacion').val(),
            "modalidad_id" : $('#Modalidad').val(),
            "grado_id"     : $('#Grado').val(),
            "escuela_id"   : $('#Escuela').val(),
            "plantel_id"   : $('#Plantel').val(),
            "Fecha_I"      : $('#FechaInicio').val(),
            "Fecha_F"      : $('#FechaFinal').val()
        },
        success: function(data) {
            Highcharts.chart('Graficav2', {
                chart: {
                    type: 'area'
                },
                title: {
                    text: data.titulo
                },
                subtitle: {
                    text: data.subtitulo
                },
                xAxis: {
                    title: {
                        text: data.ejex//Titulo de x
                    },
                    categories: data.infox
                },
                yAxis: {
                    title: {
                        text: ''//Titulo de x
                    }
                },
                series: [{
                    name: 'Usuarios',
                    data:data.infoy 
                }]
            });
        }
    });*/
});
function AplicarFiltro(Tipo_Estructura,Especialidad) 
{
  Actualizacion_usarios_numeracion();
  ShowFiltro();
  //Sera para las graficas 
  $('#TipoGrafica').val(Tipo_Estructura);
  $('#EspecialidadGrafica').val(Especialidad);
  PintarGrafica();
  PintarGraficaSexo();
  PintarGraficaEdad();


}

function Actualizacion_usarios_numeracion() {
  
  $.ajax({
    type: "POST",
    dataType : 'json',
    data: {"_token": $("meta[name='csrf-token']").attr("content"),
               "situacion_id" : $('#Situacion').val(),
               "modalidad_id" : $('#Modalidad').val(),
               "grado_id"     : $('#Grado').val(),
               "escuela_id"   : $('#Escuela').val(),
               "plantel_id"   : $('#Plantel').val(),
               "Fecha_I"      : $('#FechaInicio').val(),
               "Fecha_F"      : $('#FechaFinal').val()
    },
    url:"/GetUsuariosNumeracion",
    success: function (Usuarios) {
        if(Usuarios.Total !=null){
           $('#TotalUsuaios').html(Usuarios.Total);
           $('#TotalUsuaios_div').show();
        }else{
           $('#TotalUsuaios_div').hide();
        }
        if(Usuarios.Usuario_Registro!=null){
           $('#Usuario_Registro').html(Usuarios.Usuario_Registro);
           $('#Usuario_Registro_div').show();
        }else{
           $('#Usuario_Registro_div').hide();
        }  
        $('#Usuario_Registro_Complementario').html(Usuarios.Usuario_Registro_Complementario);
        $('#Alumno_Cuestionario').html(Usuarios.Alumno_Cuestionario);
        $('#Alumno_evaluacion').html(Usuarios.Alumno_evaluacion);
    }
  });
  ShowFiltro();
  PintarGrafica();
  PintarGraficaSexo();
  PintarGraficaEdad();
}
/**************************************************************/
/**************************************************************/
/**************************************************************/
/**************************************************************/
/****/
function SituacionFiltro(id) {
  $('#Situacion').val(id);
  $('#Modalidades').show();
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content"),
      "id" : id
    },
    url:"/GetModalidad",
    success: function (data) {
      $("#Modalidades").html(data);
    }
  });
  Actualizacion_usarios_numeracion();
}

/****/
function ModalidadFiltro(id) {
  $('#Modalidad').val(id);
  Actualizacion_usarios_numeracion();
}
function GradoFiltro(id) {
  $('#Escuelas').show();
  $('#Grado').val(id);
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content"),
      "id" : id
    },
    url:"/GetEscuela",
    success: function (data) {
      $("#Escuelas").html(data);
    }
  });
  Actualizacion_usarios_numeracion();
}
function EscuelaFiltro(id) {
  $('#Planteles').show();
  $('#Escuela').val(id);
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content"),
      "id" : id
    },
    url:"/GetPlantel",
    success: function (data) {
      $("#Planteles").html(data);
    }
  });
  Actualizacion_usarios_numeracion();
}

function PlantelFiltro(id) {
  
  $('#Plantel').val(id);
  Actualizacion_usarios_numeracion();
}

/**************************************************************/
/**************************************************************/
/**************************************************************/
function ShowFiltro(){
  $.ajax({
     type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content"),
                 "situacion_id" : $('#Situacion').val(),
                 "modalidad_id" : $('#Modalidad').val(),
                 "grado_id"     : $('#Grado').val(),
                 "escuela_id"   : $('#Escuela').val(),
                 "plantel_id"   : $('#Plantel').val()
      },
      url:"/GetFiltroShow",
      success: function (data) {
          $("#Filtro").html(data);
      }
  });

}

/*******************************************************/
/*******************Limpiar Filtros*********************/
/*******************************************************/
function LimpiarFiltros() {
  $('#Planteles').hide(100);
  $('#Escuelas').hide(100);
  $('#Modalidad').hide(100);
  
  $('#Situacion').val("");
  $('#Escuela').val("");
  $('#Plantel').val("");
  $('#Grado').val("");
  $('#Modalidad').val("");
  $('#TipoGrafica').val("");
  $('#EspecialidadGrafica').val("");
  AplicarFiltro(-1,0);
}
function LimpiarFiltro_sin_Grafica() {
  $('#Planteles').hide(100);
  $('#Escuelas').hide(100);
  $('#Modalidad').hide(100);
  $('#Situacion').val("");
  $('#Escuela').val("");
  $('#Plantel').val("");
  $('#Grado').val("");
  $('#Modalidad').val("");
  AplicarFiltro($('#TipoGrafica').val(),$('#EspecialidadGrafica').val());
}
function LimpiarFiltro_Modalidad() {
  $('#Planteles').hide(100);
  $('#Escuela').val("");
  $('#Plantel').val("");
  $('#Modalidad').val("");
  AplicarFiltro($('#TipoGrafica').val(),$('#EspecialidadGrafica').val());
}

function LimpiarFiltro_Escuela() {
  $('#Plantel').val("");
  AplicarFiltro($('#TipoGrafica').val(),$('#EspecialidadGrafica').val());
}

function LimpiarFiltro_Situacion(){
  $('#Planteles').hide(100);
  $('#Escuelas').hide(100);
  $('#Modalidades').hide(100);
  $('#Situacion').val("");
  $('#Escuela').val("");
  $('#Plantel').val("");
  $('#Modalidad').val("");
  AplicarFiltro($('#TipoGrafica').val(),$('#EspecialidadGrafica').val());
}





/*******************************************************/
/**********************Grafica**************************/
/*******************************************************/
function PintarGrafica(){

    $.ajax({
        url: '/GetDatosGraficar',
        type: "POST",
        dataType: "json",
        data : {
            "_token": $("meta[name='csrf-token']").attr("content"),
            "TipoGrafica"  : $('#TipoGrafica').val(),
            "EspecialidadGrafica"  : $('#EspecialidadGrafica').val(),
            "situacion_id" : $('#Situacion').val(),
            "modalidad_id" : $('#Modalidad').val(),
            "grado_id"     : $('#Grado').val(),
            "escuela_id"   : $('#Escuela').val(),
            "plantel_id"   : $('#Plantel').val(),
            "Fecha_I"      : $('#FechaInicio').val(),
            "Fecha_F"      : $('#FechaFinal').val()
        },
        success: function(data) {
            Highcharts.chart('Graficav2', {
                chart: {
                    type: 'area'
                },
                title: {
                    text: data.titulo
                },
                subtitle: {
                    text: data.subtitulo
                },
                xAxis: {
                    title: {
                        text: data.ejex//Titulo de x
                    },
                    categories: data.infox
                },
                yAxis: {
                    title: {
                        text: ''//Titulo de x
                    }
                },
                series: [{
                    name: 'Usuarios',
                    data:data.infoy 
                }]
            });
        }
    });
}

function PintarGraficaSexo(){

    $.ajax({
        url: '/GetDatosGraficarS',
        type: "POST",
        dataType: "json",
        data : {
        "_token": $("meta[name='csrf-token']").attr("content"),
            "situacion_id" : $('#Situacion').val(),
            "modalidad_id" : $('#Modalidad').val(),
            "grado_id"     : $('#Grado').val(),
            "escuela_id"   : $('#Escuela').val(),
            "plantel_id"   : $('#Plantel').val(),
            "Fecha_I"      : $('#FechaInicio').val(),
            "Fecha_F"      : $('#FechaFinal').val()
        },
        success: function(data) {
            Highcharts.chart('GraficaSv2', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: data.titulo
                },
                subtitle: {
                    text: data.subtitulo
                },
                legend: {
                  labelFormat: '{name} <span style="opacity: 0.4">{y}</span>'
                },
                series: [{
                    name: 'Usuarios',
                    keys: ['name', 'y', 'color', 'label'],
                    data:data.info,
                    dataLabels: {
                      enabled: true,
                      format: '{point.label}'
                    },
                  center: ['50%', '88%'],
                  size: '170%',
                  startAngle: -100,
                  endAngle: 100  
                }]
                
            });
        }
    });
}
function PintarGraficaEdad(){

    $.ajax({
        url: '/GetDatosGraficarD',
        type: "POST",
        dataType: "json",
        data : {
        "_token": $("meta[name='csrf-token']").attr("content"),
            "situacion_id" : $('#Situacion').val(),
            "modalidad_id" : $('#Modalidad').val(),
            "grado_id"     : $('#Grado').val(),
            "escuela_id"   : $('#Escuela').val(),
            "plantel_id"   : $('#Plantel').val(),
            "Fecha_I"      : $('#FechaInicio').val(),
            "Fecha_F"      : $('#FechaFinal').val()
        },
        success: function(data) {
            var pieColors = (function () {
  var colors = [],
    base = Highcharts.getOptions().colors[0],
    i;

  for (i = 0; i < 10; i += 1) {
    // Start out with a darkened base color (negative brighten), and end
    // up with a much brighter color
    colors.push(Highcharts.color(base).brighten((i - 3) / 7).get());
  }
  return colors;
}());

// Build the chart
Highcharts.chart('GraficaEv2', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: data.titulo
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b><br> {point.y}'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      colors: pieColors,
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
        distance: -50,
        filter: {
          property: 'percentage',
          operator: '>',
          value: 4
        }
      }
    }
  },
  series: [{
    name: 'Usuarios',
    data: data.info
  }]
});
        }
    });
}


