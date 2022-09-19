@extends('seivoc.nav')

@section('content')
<br><br><br><br><br>
<meta name="csrf-token" content="{{ Session::token() }}"> 

<main style="background-color: transparent;" >
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-1" >
      <div class="col" >
        <div class="card shadow-sm " style="  border-radius:  50px; ">
          <div class="card-body">
            <p class="text-center text-warning" style="font-size: 32px;color:rgb(40,40,91);  font-family: 'Open Sans'; padding-top: 7%;">!Estimad@ {{ Auth::user()->nombre }}!<br></p>
            @if (isset($Datos['Presentacion']))
            <p class="text-center  text-dark"><?php echo $Datos['Presentacion'];?><br><br></p>
            @endif
            <p class="text-center text-warning"style="font-size: 32px;color:rgb(40,40,91);  font-family: 'Open Sans'; ">Gráfica</p>
            <div id="GraficaP" style="width: 100%; height: 500px;"></div>
             @if ($Datos['Grafica']["MS"] == 0)
            <div class="text-center " style="text-center:justify" ><strong>Debido a que no consideras música como una carrera profesional</br> tú escala se igualó a 0</strong></div> 
            @endif
            @if (isset($Datos['Explicacion']))
                    
            <p class="text-center text-warning" style="font-size: 32px;color:rgb(40,40,91);  font-family: 'Open Sans'; ">Explicación</p>
            <p style="width: 100%;"><?php echo $Datos['Explicacion'];?></p>
            @if (isset($Datos['Carreras']))
            <p style="width: 100%;"><?php echo $Datos['Carreras'];?></p>          
            @else
            @endif
            @endif
            @if (isset($Datos['tipoPerfil']))
            @if ($Datos['tipoPerfil']=='Primarios')
                <video style="width: 50%;" controls>
                        <source src='assets/imagenesReto/videos/escala-primaria.mp4' type="video/mp4">
                        Your browser does not support the video tag.
                </video>
            @elseif ($Datos['tipoPerfil']=="Secundarios")
                <video style="width: 50%;" controls>
                        <source src='assets/imagenesReto/videos/escala-secundaria.mp4' type="video/mp4">
                        Your browser does not support the video tag.
                </video>
            @else
                <img src="{{ asset($Datos['imagenEx'])}}" style="width: 50%;">
            @endif
            @endif
            <br>
            
            <p class="text-center text-warning" style="font-size: 32px;color:rgb(40,40,91);  font-family: 'Open Sans'; ">Materiales</p>
            @if (isset($Datos['imagenGif']))
            <img src="{{ asset($Datos['imagenGif'])}}" style="width: 50%;">
            @if($Datos['hojas']!='../pdf/alternativas.pdf')
            <a href="{{ asset($Datos['hojas'])}}" target="_blank"><button class='btn btn-secondary' style="background-color: rgb(40,40,91);color: rgb(255,255,255);font-size: 15px;  font-family: 'Open Sans'; ">Hojas de trabajo</button></a>
            @endif
            <a href="{{ asset($Datos['video'])}}" target="_blank"><button class='btn btn-secondary' style="background-color: rgb(40,40,91);color: rgb(255,255,255);font-size: 15px;  font-family: 'Open Sans'; ">Video</button></a>
            @if ($Datos['tipoPerfil'] === 'Ideal')
            <p style="width: 100%;"><?php echo $Datos['Materiales'];?></p>
            <!--<p style="width: 100%;">cunsultaa informacion mas solo pefiles ideales</p>-->            
            @else
            <p style="width: 100%;"><?php echo $Datos['Materiales'];?></p>
            @endif
            @endif
          </div>
        </div>
      </div>
    </div>
  </main>
  <br><br><br><br>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        //var data = new google.visualization.DataTable();
        //data.addColumn('string', 'Estadistica');
        //data.addColumn('number', 'Procentaje');
        //data.addColumn({ role: "style" });
        //data.addColumn({type: 'string', role: 'tooltip'});
        var data = google.visualization.arrayToDataTable([
        
          ["Estadistica", "Procentaje",{ role: "tooltip"}],
          ["SS", {{$Datos['Grafica']["SS"]}},"Expresas un interés de ayuda afectuosa  y desinteresada hacia tus semejantes y  por la comprensión de problemas humanos."],
          ["EP", {{$Datos['Grafica']["EP"]}}, 'Posees un interés por ser el líder en la organización,  dirección o supervisión de grupos y eventos  a través de buenas relaciones interpersonales.'],
          ["V", {{$Datos['Grafica']["V"]}},'Tienes un interés en adquirir el conocimiento  a través del lenguaje oral y escrito, utilizando  las palabras precisas y adecuadas.'],
          ["AP", {{$Datos['Grafica']["AP"]}},'Reflejas un interés por el aprecio de elementos estéticos  a través de las formas, colores y dimensiones de un objeto  que puede ser un dibujo, escultura, pintura o una construcción.'],
          ["MS", {{$Datos['Grafica']["MS"]}},'Posees un interés en captar y distinguir sonidos  en sus diversas modalidades para reproducirlos  o utilizarlos de forma creativa.'],
          ["OG", {{$Datos['Grafica']["OG"]}},'Manifiestas un interés por el orden y la organización de  sistemas, documentos, organizaciones, poniendo  atención en los detalles.'],
          ["CT", {{$Datos['Grafica']["CT"]}},'Reflejas un interés por captar, definir, comprender  y explicar principios y relaciones causales de fenómenos  científicos y sociales para generar nuevas propuestas.'],
          ["CL", {{$Datos['Grafica']["CL"]}},'Expresas interés en las operaciones numéricas para  explicar procesos a través de expresiones matemáticas.'],
          ["MC", {{$Datos['Grafica']["MC"]}},'Muestras un interés en comprender y razonar los  mecanismos y movimientos de los objetos a través  de su manipulación; de imaginarlos y analizarlos en  2 o 3 dimensiones.'],
          ["AL", {{$Datos['Grafica']["AL"]}},'Reflejas un interés por actividades que se realizan  al aire libre, fuera de una oficina, en espacios abiertos,  te gusta estar en contacto con la naturaleza.'],
        ]);
 
        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                         { calc: "stringify",
                           sourceColumn: 1,
                           type: "string",
                           role: "annotation" },
                         2]);
  
        var options = {
         // title: "Density of Precious Metals, in g/cm^3",
          legend: { position: "none" },
          legend: 'none',@if (isset($Datos['Colores']))
            colors: ['{{$Datos['Colores'][0]}}','{{$Datos['Colores'][1]}}','{{$Datos['Colores'][2]}}','{{$Datos['Colores'][3]}}','{{$Datos['Colores'][4]}}','{{$Datos['Colores'][5]}}','{{$Datos['Colores'][6]}}','{{$Datos['Colores'][7]}}','{{$Datos['Colores'][8]}}','{{$Datos['Colores'][9]}}'],
          @else
            colors: ['#1E32DE','#1E32DE','#1E32DE','#1E32DE','#1E32DE','#1E32DE','#1E32DE','#1E32DE','#1E32DE','#1E32DE'],
          @endif
          tooltip: {isHtml: true}
          //legend: 'none'
          
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("GraficaP"));
        chart.draw(view, options);
    }
    </script>
    <script type="text/javascript">
    window.history.forward();
    function sinVueltaAtras(){ window.history.forward(); }
</script>
@endsection