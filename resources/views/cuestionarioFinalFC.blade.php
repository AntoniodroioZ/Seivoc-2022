<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Icons FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    {{-- Ajax JQuerry --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/famCarr.css')}}">
    {{-- <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css"> --}}
    

    <title>Formulario</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light color-rosa">
        <div class="container-fluid container ">
          <a class="navbar-brand" href="#"><img class="logo-img" src="images/logo.png" alt=""></a>

          {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> --}}
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              {{-- <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li> --}}
            </ul>
            {{-- <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> --}}
          </div>
        </div>
      </nav>
      <br><br>
      {{-- <div class="container">
        <div>
          <p>Relaciona las siguientes columnas. Selecciona la opción que describa mejor el quehacer y propósito de las familias de carreras,  de acuerdo con las características que las distinguen.</p>
        </div>
        <div class="row">
          <div class="col box-carreras">
            Ciencias Físico matemáticas e ingenierías 
          </div>
          <div class="col box-carreras">
            Ciencias Químico, Biológicas y de la Salud
          </div>
          <div class="col box-carreras">
            Ciencias Sociales
          </div>
          <div class="col box-carreras">
            Humanidades 
          </div>
          <div class="col box-carreras">
            Artes 
          </div>
        </div>
        <br><br>
        <div class="row">
          <div class="col">
            <p class="btn btn-success">
              Estudian diferentes manifestaciones humanas a través del tiempo
            </p>
          </div>
          <div class="col">
            <p class="btn btn-success">
              Analizan el contexto social para promover el bienestar de los grupos de personas
            </p>
          </div>
          <div class="col">
            <p class="btn btn-success">
              Estudian y emplean las mediciones exactas para generar dispositivos que faciliten la vida humana
            </p>
          </div>
          <div class="col">
            <p class="btn btn-success">
              Estudian los métodos y técnicas para expresar y representar ideas y sentimientos
            </p>
          </div>
          <div class="col">
            <p class="btn btn-success">
              Estudian la vida para favorecer el bienestar y equilibrio de los seres vivos
            </p>
          </div>
        </div>
      </div> --}}
      <div class="container">
        <P style="font-size: 1.5rem">Las siguientes preguntas tienen la finalidad de saber cuánto has avanzado en tu conocimiento de las “Familias de Carreras”</P>
        <p style="font-size: 1.2rem">Instrucciones:</p>
        <p>Relaciona las siguientes columnas. Selecciona la opción que describa mejor el quehacer y propósito de las familias de carreras,  de acuerdo con las características que las distinguen.</p>
        <table class="table table-danger">
          <thead>
            <tr>
              
              <th scope="col">Familia</th>
              <th scope="col">Respuesta</th>
              <th scope="col">Opción</th>
            </tr>
          </thead>
          <tbody>
            <tr>                
              <td>Ciencias Físico matemáticas e ingenierías
                </td>
              <td>
                <select class="form-select" aria-label="Default select example" id="select0_1">
                  <option selected>Respuesta</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </td>
              <td>1.- Estudian diferentes manifestaciones humanas a través del tiempo</td>
            </tr>
            <tr>
              <td>Ciencias Químico, Biológicas y de la Salud</td>
                <td>
                  <select class="form-select" aria-label="Default select example" id="select0_2">
                    <option selected>Respuesta</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
              <td>2.- Analizan el contexto social para promover el bienestar de los grupos de personas</td>
            </tr>
            <tr>
              <td>Ciencias Sociales
                </td>
              <td>
                <select class="form-select" aria-label="Default select example" id="select0_3">
                  <option selected>Respuesta</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </td>
              <td>3.- Estudian y emplean las mediciones exactas para generar dispositivos que faciliten la vida humana</td>
            </tr>
            <tr> 
              <td>Humanidades
                </td>
              <td>
                <select class="form-select" aria-label="Default select example" id="select0_4">
                  <option selected>Respuesta</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </td>
              <td>4.- Estudian los métodos y técnicas para expresar y representar ideas y sentimientos</td>
            </tr>
            <tr> 
              <td>Artes
                </td>
              <td>
                <select class="form-select" aria-label="Default select example" id="select0_5">
                  <option selected>Respuesta</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </td>
              <td>5.- Estudian la vida para favorecer el bienestar y equilibrio de los seres vivos</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="container">
        <p>Instrucciones:</p>
        <p>Selecciona la opción correcta.</p>
        <div class="pregunta-respuesta">
          <p>1.- ¿Por qué las carreras de la familia de las “Artes” no se considera científica?</p>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="p1r" id="p1r1" value=6>
            <label class="form-check-label" for="p1r1">
              El arte no lleva a cabo estudios en laboratorios
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="p1r" id="p1r2" value=7>
            <label class="form-check-label" for="p1r2">
              Las expresiones artísticas no tienen el mismo valor que las ciencias
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="p1r" id="p1r3" value=8>
            <label class="form-check-label" for="p1r3">
              El arte no busca la comprobación de hipótesis
            </label>
          </div>
        </div>
        <br>
        <div class="pregunta-respuesta">
          <p>2.- A diferencia de las ciencias exactas, las ciencias sociales se distinguen por</p>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="p2r" id="p2r1" value=9>
              <label class="form-check-label" for="p2r1">
                No emplear el método científico
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="p2r" id="p2r2" value=10>
              <label class="form-check-label" for="p2r2">
                Analizar fenómenos o eventos originados por diversas causas o factores
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="p2r" id="p2r3" value=11>
              <label class="form-check-label" for="p2r3">
                No emplear las matemáticas
              </label>
            </div>
        </div>
        <br>
        <div class="pregunta-respuesta">
          <p>3.- Las humanidades no se consideran una ciencia porque</p>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="p3r" id="p3r1" value=12>
            <label class="form-check-label" for="p3r1">
              Su propósito no es comprobar un conocimiento o hecho, sino entenderlo y preservarlo
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="p3r" id="p3r2" value=13>
            <label class="form-check-label" for="p3r2">
              Emplean métodos cualitativos
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="p3r" id="p3r3" value=14>
            <label class="form-check-label" for="p3r3">
              Sus investigaciones las llevan a cabo fuera de un laboratorio
            </label>
          </div>
        </div>
        <br>
        <div class="pregunta-respuesta">
          <p>4.- A pesar de tener diferentes objetos de estudio,  las familias  de las Ciencias Físico matemáticas e ingenierías y las Ciencias Químico, Biológicas y de la Salud, son ciencias exactas, ¿porqué?
          </p>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="p4r" id="p4r1" value=15>
            <label class="form-check-label" for="p4r1">
              Porque emplean las matemáticas
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="p4r" id="p4r2" value=16>
            <label class="form-check-label" for="p4r2">
              Porque describen de manera precisa cómo se relacionan causas y efectos
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="p4r" id="p4r3" value=17>
            <label class="form-check-label" for="p4r3">
              Porque llevan a cabo investigaciones en el laboratorio
            </label>
          </div>
        </div>
        <br>
        <div>
          <p>Instrucciones:</p>
          <p>Relaciona las siguientes columnas, identificando a qué área o familia, pertenecen las siguientes carreras.</p>
          <table class="table table-danger">
            <thead>
              <tr>
                
                <th scope="col">Familia</th>
                <th scope="col">Respuesta</th>
                <th scope="col">Opción</th>
              </tr>
            </thead>
            <tbody>
              <tr>                
                <td>Ingeniería en agricultura sostenible 
                  (formar profesionistas para la producción de alimentos, bienes y servicios del medio rural, UACh)
                  </td>
                <td>
                  <select class="form-select" aria-label="Default select example" id="select1">
                    <option selected>Respuesta</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td>1.- Ciencias Físico matemáticas e ingenierías</td>
              </tr>
              <tr>
                <td>Licenciatura en Educación indígena 
                  (Formar profesionales capaces de abordar los problemas de la educación indígena en contextos institucionales y comunitarios y que sean capaces de producir, asesorar, acompañar y evaluar propuestas educativas pertinentes. UPN)</td>
                  <td>
                    <select class="form-select" aria-label="Default select example" id="select2">
                      <option selected>Respuesta</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </td>
                <td>2.- Ciencias Químico, Biológicas y de la Salud</td>
              </tr>
              <tr>
                <td>Licenciatura en escenografía
                  (Sus egresados son profesionales capaces de diseñar creativamente los universos plásticos de cualquier proyecto escénico. INBA)
                  </td>
                <td>
                  <select class="form-select" aria-label="Default select example" id="select3">
                    <option selected>Respuesta</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td>3.- Ciencias Sociales</td>
              </tr>
              <tr> 
                <td>Licenciatura en Políticas Públicas 
                  (Formar egresados que puedan resolver problemas públicos, a partir de análisis económicos, políticos y jurídicos. CIDE)
                  </td>
                <td>
                  <select class="form-select" aria-label="Default select example" id="select4">
                    <option selected>Respuesta</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td>4.- Humanidades</td>
              </tr>
              <tr> 
                <td>Ingeniería en sistemas energéticos sustentables
                  (formar profesionales en el ámbito de sistemas energéticos que proyecten, diseñen, analicen, instalen, programen, operen y mantengan sistemas relacionados con el aprovechamiento sustentable
                  </td>
                <td>
                  <select class="form-select" aria-label="Default select example" id="select5">
                    <option selected>Respuesta</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td>5.- Artes</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div>
          <p>¿Después de trabajar con el material de Mi familia de carreras, qué familia elegirías para estudiar?</p>
          <div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="preguntafinal" id="preguntafinal1" value=1>
              <label class="form-check-label" for="preguntafinal1">
                1.1.   Familia I Ciencias físico-matemáticas y de las ingenierías
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="preguntafinal" id="preguntafinal2" value=2>
              <label class="form-check-label" for="preguntafinal2">
                1.2.   Familia II Ciencias biológicas, químicas y de la salud
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="preguntafinal" id="preguntafinal3" value=3>
              <label class="form-check-label" for="preguntafinal3">
                1.3.   Familia III Ciencias sociales
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="preguntafinal" id="preguntafinal4" value=4>
              <label class="form-check-label" for="preguntafinal4">
                1.4.   Familia IV.1 Humanidades
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="preguntafinal" id="preguntafinal5" value=5>
              <label class="form-check-label" for="preguntafinal5">
                1.5.   Familia IV.2 Artes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="preguntafinal" id="preguntafinal6" value=6>
              <label class="form-check-label" for="preguntafinal6">
                1.6.   Estoy dudoso(a) entre dos familias
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="preguntafinal" id="preguntafinal7" value=7>
              <label class="form-check-label" for="preguntafinal7">
                1.7.   No lo he decidido aún
              </label>
            </div>
          </div>
        </div>
        <br>
        {{-- href="{{url('/MiFamiliadeCarrera/HomeR')}}" --}}
        <a onclick="obtenerDatos()" >
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Enviar
          </button>
          
        </a>
      </div>
      


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <h5 class="modal-title" id="staticBackdropLabel">Gracias</h5> --}}
        <h5 id="tituloModal">Incompleto</h5>
        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
      </div>
      <div class="modal-body">
        <p id="mensajeModal1">Responde todas la preguntas para poder continuar.</p>
        <p id="mensajeModal2"></p>
        <video id="videoModal" src="{{ asset('/images/Video-MFC2.mp4') }}" style="display: none;"></video>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="botonCerrar">Close</button>
        <button onclick="finalizaste()" type="button" class="btn btn-primary" id="botonContinuar">Continuar</button>
      </div>
    </div>
  </div>
</div>
      <br>
      <footer class="bg-secondary p-2 text-dark bg-opacity-10 sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright text-white">
                <span>
                    <br >Hecho en México, todos los derechos reservados. Esta página puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su dirección electrónica. De otra forma requiere permiso previo por escrito de la institución.Trabajo realizado con el apoyo del Programa UNAM-DGAPA-PAPIME, Proyecto PAPIME 302516, 303017, 303118<br><br>
                </span>
            </div>
            <div class="text-center my-auto copyright">
                <img src="{{ asset('images/modulo_administrador/footer.png') }}" width="50%">
            </div>
        </div>
    </footer>

    <script>



function obtenerDatos(){
  respuestasArray = [];
  lista0_1 = document.getElementById("select0_1");
  indiceSeleccionado0_1 = lista0_1.selectedIndex;
  opcionSeleccionada0_1 = lista0_1.options[indiceSeleccionado0_1];


  form0_1 = opcionSeleccionada0_1.value;
  console.log(form0_1);
  respuestasArray.push(form0_1);

  lista0_2 = document.getElementById("select0_2");
  indiceSeleccionado0_2 = lista0_2.selectedIndex;
  opcionSeleccionada0_2 = lista0_2.options[indiceSeleccionado0_2];

  form0_2 = opcionSeleccionada0_2.value;
  console.log(form0_2);
  respuestasArray.push(form0_2);

  lista0_3 = document.getElementById("select0_3");
  indiceSeleccionado0_3 = lista0_3.selectedIndex;
  opcionSeleccionada0_3 = lista0_3.options[indiceSeleccionado0_3];

  form0_3 = opcionSeleccionada0_3.value;
  console.log(form0_3);
  respuestasArray.push(form0_3);

  lista0_4 = document.getElementById("select0_4");
  indiceSeleccionado0_4 = lista0_4.selectedIndex;
  opcionSeleccionada0_4 = lista0_4.options[indiceSeleccionado0_4];

  form0_4 = opcionSeleccionada0_4.value;
  console.log(form0_4);
  respuestasArray.push(form0_4);

  lista0_5 = document.getElementById("select0_5");
  indiceSeleccionado0_5 = lista0_5.selectedIndex;
  opcionSeleccionada0_5 = lista0_5.options[indiceSeleccionado0_5];

  form0_5 = opcionSeleccionada0_5.value;
  console.log(form0_5);
  respuestasArray.push(form0_5);
  
  form1 = document.getElementsByName("p1r");
  for(var i=0; i<form1.length; i++) {
    if(form1[i].checked==true){
      console.log(form1[i].value);
      respuestasArray.push(form1[i].value);
    }    
  }
  form2 = document.getElementsByName("p2r");
  for(var i=0; i<form2.length; i++) {
    if(form2[i].checked==true){
      console.log(form2[i].value);
      respuestasArray.push(form2[i].value);
    }    
  }
  form3 = document.getElementsByName("p3r");
  for(var i=0; i<form3.length; i++) {
    if(form3[i].checked==true){
      console.log(form3[i].value);
      respuestasArray.push(form3[i].value);
    }    
  }
  form4 = document.getElementsByName("p4r");
  for(var i=0; i<form4.length; i++) {
    if(form4[i].checked==true){
      console.log(form4[i].value);
      respuestasArray.push(form4[i].value);
    }    
  }
  lista1 = document.getElementById("select1");
  indiceSeleccionado1 = lista1.selectedIndex;
  opcionSeleccionada1 = lista1.options[indiceSeleccionado1];

  form5 = opcionSeleccionada1.value;
  console.log(form5);
  respuestasArray.push(form5);
  
  lista2 = document.getElementById("select2");
  indiceSeleccionado2 = lista2.selectedIndex;
  opcionSeleccionada2 = lista2.options[indiceSeleccionado2];

  form6 = opcionSeleccionada2.value;
  console.log(form6);
  respuestasArray.push(form6);

  lista3 = document.getElementById("select3");
  indiceSeleccionado3 = lista3.selectedIndex;
  opcionSeleccionada3 = lista3.options[indiceSeleccionado3];

  form7 = opcionSeleccionada3.value;
  console.log(form7);
  respuestasArray.push(form7);
  
  lista4 = document.getElementById("select4");
  indiceSeleccionado4 = lista4.selectedIndex;
  opcionSeleccionada4 = lista4.options[indiceSeleccionado4];

  form8 = opcionSeleccionada4.value;
  console.log(form8);
  respuestasArray.push(form8);

  lista5 = document.getElementById("select5");
  indiceSeleccionado5 = lista5.selectedIndex;
  opcionSeleccionada5 = lista5.options[indiceSeleccionado5];

  form9 = opcionSeleccionada5.value;
  console.log(form9);
  respuestasArray.push(form9);

  form10 = document.getElementsByName("preguntafinal");
  for(var i=0; i<form10.length; i++) {
    if(form10[i].checked==true){
      console.log(form10[i].value);
      respuestasArray.push(form10[i].value);
    }    
  }

  console.log(respuestasArray);
  respuestasC = [];
  comprueba = 0;
  if(respuestasArray.length == 15){

  
  for(var i = 0; i < respuestasArray.length; i++){
    // console.log(respuestasArray[i]);
      // console.log(comprueba, "comprueba");
    if(respuestasArray[i] == 'Respuesta'){
      comprueba++;
    }
  }
  if(comprueba >=1){
    document.getElementById("botonContinuar").style.visibility = "hidden";
    document.getElementById("botonCerrar").style.visibility = "visible";
    comprueba = 0;
  }
      
  @foreach ($respuestasForm as $item)
    respuestasC.push({{$item}})
  @endforeach
  // console.log(respuestasC);
  contador = 0;
  for(var i = 0; i < respuestasC.length; i++){
    if(respuestasArray[i] == respuestasC[i]){
      contador++;
    }
  }
  if(contador >=12 && comprueba == 0){
    console.log("Felicidades tuviste:", contador,"respuestas");
    document.getElementById("tituloModal").innerHTML = "¡Excelente!";
    document.getElementById("mensajeModal1").innerHTML = "Has contestado correctamente más del 80% de las preguntas.";
    document.getElementById("mensajeModal2").innerHTML = "Seguramente, tu comprensión de las Familias de carreras te ha llevado a encontrar la tuya para una elección de carrera más asertiva.";
    document.getElementById("botonContinuar").style.visibility = "visible";
    document.getElementById("botonCerrar").style.visibility = "hidden";
    document.getElementById("videoModal").style.display  = "";
  }
  if(contador>= 7 && contador <=11 && comprueba == 0){
    console.log("Solo obtuviste", contador,"respuestas");
    document.getElementById("tituloModal").innerHTML = "¡Vas por buen camino!";
    document.getElementById("mensajeModal1").innerHTML = "Has obtenido del 50% al 80% de respuestas correctas, pero aún te falta comprender algunos aspectos de las Familias académicas de las carreras.";
    document.getElementById("mensajeModal2").innerHTML = "";
    document.getElementById("videoModal").style.display  = "";
    document.getElementById("botonContinuar").style.visibility = "visible";
    document.getElementById("botonCerrar").style.visibility = "hidden";
  }
  if(contador>= 1 && contador <=6 && comprueba == 0){
    console.log("Tuviste", contador,"respuestas");
    document.getElementById("tituloModal").innerHTML = "¡Ya casi!";
    document.getElementById("mensajeModal1").innerHTML = "Has obtenido menos del 50% de respuestas correctas";
    document.getElementById("mensajeModal2").innerHTML = "Te sugerimos que vuelvas a repasar los módulos de Mi familia de carreras para comprender la importancia de las áreas académicas en tu elección de carrera, y así, encontrar tu lugar en una Familia académica.";
    document.getElementById("videoModal").style.display  = "";
    document.getElementById("botonContinuar").style.visibility = "visible";
    document.getElementById("botonCerrar").style.visibility = "hidden";
  }
  
  for(var i = 0; i < respuestasArray.length; i++){
    $.ajax({
      type: "GET",
      url: "http://127.0.0.1:8000/api/cargarDatosFormulario",
      data: {"_token": $("meta[name='csrf-token']").attr("content"),
            'respuesta_id': respuestasArray[i],
            'pregunta_id': i+1},   
      success: function(data){
        // finalizaste();
      }
    });
  }
}else{
  document.getElementById("botonContinuar").style.visibility = "hidden";
    document.getElementById("botonCerrar").style.visibility = "visible";
}
}
function finalizaste(){  
      window.location.replace("{{url('/MiFamiliadeCarrera/HomeR')}}");    
}  
    </script>
</body>