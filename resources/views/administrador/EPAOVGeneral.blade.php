{{-- NavBar --}}
@extends('administrador.navEPAOV')
@section('content')
@if ($view==1)


<div class="container">
    <div class="centrar">
        <h1 class="text-dark">Secciones Infografías</h1>
    </div>
    {{-- Modal Edicion de infografia --}}
    <div class="modal fade" id="modalEditarForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar infografía:</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('editarInfografia') }}" accept-charset="UTF-8" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type="text" class="form-control" id="editIdEje" name="editIdEje" value="" style="display:none;" readonly>
              <input type="text" class="form-control" id="editIdInfo" name="editIdInfo" value="" style="display:none;" readonly>
              <div class="mb-3">
                <label for="editTitulo" class="col-form-label" >Titulo:</label>
                <input type="text" class="form-control" id="editTituloInfo" name="editTituloInfo" value="" required>
              </div>
              <div class="input-group mb-3">
                <label for="archivo" class="col-form-label">Imagen:</label>
                <input type="file" accept=".jpg,.png,.jpeg,.gif" class="form-control" id="entradaInfografiaIMG" name="editarchivo" required>
                {{-- <input type="file" --}}
                {{-- <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#imagenModal"><i class="far fa-eye"></i></button> --}}
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Link o enlace:</label>
                <textarea type="text" class="form-control" id="EditTextoInfo" name="EditTextoInfo" value="" required></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" >Editar infografia</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    {{-- Modal nueva infografia --}}

    {{-- Modal imagen preview --}}

    <div class="modal fade" id="imagenModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Vista previa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <img src="" alt="" style="width: 100%">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
            
          </div>
        </div>
      </div>
    </div>
    
    {{-- Nuevo Eje Tematico --}}
    <div class="modal fade" id="nuevoEje" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo eje tematico:</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="formulario"> 
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Titulo:</label>
                <input type="text" class="form-control" id="recipientName" name="nombreTitulo">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a onclick="getTitulo()">
                  <button type="submit" class="btn btn-primary" >Añadir eje tematico</button>
                </a>
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
    
    {{-- Modal agregar una nueva infografia--}}
    <div class="modal fade" id="modalNuevoForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nueva infografía:</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('subir') }}" accept-charset="UTF-8" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type="hidden" class="form-control" id="IdEje" name="IdEje" value="" style="display:none;">
              {{-- <input type="hidden" class="form-control" id="IdInfo" name="IdInfo" value=""> --}}
              <div class="mb-3">
                <label for="TituloInfo" class="col-form-label" >Titulo:</label>
                <input type="text" class="form-control" id="TituloInfo" name="TituloInfo" value="" required>
              </div>
              <div class="input-group mb-3">
                <label for="archivo" class="col-form-label">Imagen:</label>
                <input type="file" accept=".jpg,.png,.jpeg,.gif" class="form-control" id="entradaInfografiaIMG" name="archivo" required>
                {{-- <input type="file" --}}
                {{-- <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#imagenModal"><i class="far fa-eye"></i></button> --}}
              </div>
              <div class="mb-3">
                <label for="TextoInfo" class="col-form-label">Link o enlace:</label>
                <textarea type="text" class="form-control" id="TextoInfo" name="TextoInfo" value="" required></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" >Nueva infografia</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <div id="rightM">
      
</div>   
</div>   
      
@endif
@if ($view==2)
<div class="container">
    <div class="centrar">
        <h1 class="text-dark">Secciones Convocatorias</h1>
    </div>
    <div class="modal fade" id="nuevoElemento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nueva conferencia:</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="formulario"> 
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Titulo:</label>
                <input type="text" class="form-control" id="recipientName" name="nombreTitulo">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a onclick="getTitulo()">
                  <button type="submit" class="btn btn-primary" >Añadir conferencia</button>
                </a>
              </div>
            </form>
          </div> 
        </div>
      </div>
    </div>
    <div class="modal fade" id="editarConvocatoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar convocatoria:</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <input type="text" class="form-control" id="editIdMes" name="editIdMes" value="" style="display:none;" readonly>
              <input type="text" class="form-control" id="editIdConvocatoria" name="editIdConvocatoria" value="" style="display:none;" readonly>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Nombre de la escuela:</label>
                <input type="text" class="form-control" id="nombreEscuela" name="nombreEscuela">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Siglas:</label>
                <input type="text" class="form-control" id="siglasEscuela" name="siglasEscuela">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Tipo de convocatoria:</label>
                <input type="text" class="form-control" id="tipoConvocatoria" name="tipoConvocatoria">
              </div>
              <div id="coloresSelectEdit">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Enlace:</label>
                <input type="text" class="form-control" id="editEnlace" name="editEnlace">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <a onclick="getContenidoConvocatoria()">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Editar convocatoria</button>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="nuevaConvocatoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nueva convocatoria:</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <input type="text" class="form-control" id="nuevoIdMes" name="nuevoIdMes" value="" style="display:none;" readonly>
              <input type="text" class="form-control" id="nuevoIdConvocatoria" name="nuevoIdConvocatoria" value="" style="display:none;" readonly>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Nombre de la escuela:</label>
                <input type="text" class="form-control" id="nuevoNombreEscuela" name="nuevoNombreEscuela">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Siglas:</label>
                <input type="text" class="form-control" id="nuevoSiglasEscuela" name="nuevoSiglasEscuela">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Tipo de convocatoria:</label>
                <input type="text" class="form-control" id="nuevoTipoConvocatoria" name="nuevoTipoConvocatoria">
              </div>
              <div id="coloresSelectNuevo">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Enlace:</label>
                <input type="text" class="form-control" id="nuevoEnlace" name="nuevoEnlace">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <a onclick="getNuevoContenidoConvocatoria()">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Nueva convocatoria</button>
            </a>
          </div>
        </div>
      </div>
    </div>
    
    <div id="rightM">
</div>   
</div>  

  

@endif
@if ($view==3)
<div class="container">
    <div class="centrar">
        <h1 class="text-dark">Secciones Conferencias</h1>
    </div>
    <div class="modal fade" id="nuevaConferencia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nueva conferencia:</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="formulario"> 
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Titulo:</label>
                <input type="text" class="form-control" id="recipientName" name="nombreTitulo">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a onclick="getTitulo()">
                  <button type="submit" class="btn btn-primary" >Añadir conferencia</button>
                </a>
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
    

    <div id="rightM">
</div>   
</div>  
@endif
@if($view==4)
<div class="container">
  <div class="centrar">
      <h1 class="text-dark">Editar Recursos de Apoyo para la Trayectoria Escolar</h1>
  </div>
  {{-- Modal Edicion de recurso --}}
  <div class="modal fade" id="modalEditarForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Recurso:</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('editarRecurso') }}" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="text" class="form-control" id="editIdRecurso" name="editIdRecurso" value="" style="display:none;" readonly>
            <div class="mb-3">
              <label for="editTitulo" class="col-form-label" >Titulo:</label>
              <input type="text" class="form-control" id="editTituloRecurso" name="editTituloRecurso" value="" required>
            </div>
            <div class="input-group mb-3">
              <label for="archivo" class="col-form-label">Imagen:</label>
              <input type="file" accept=".jpg,.png,.jpeg,.gif" class="form-control" id="entradaRecursoIMG" name="editarchivoRecurso" required>
              {{-- <input type="file" --}}
              {{-- <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#imagenModal"><i class="far fa-eye"></i></button> --}}
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Link o enlace:</label>
              <textarea type="text" class="form-control" id="EditTextoRecurso" name="EditTextoRecurso" value="" required></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" >Editar recurso</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  {{-- Modal agregar un nuevo recurso--}}
  <div class="modal fade" id="modalNuevoForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo recurso:</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('subirRecurso') }}" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" class="form-control" id="IdRecurso" name="IdRecurso" value="" style="display:none;">
            {{-- <input type="hidden" class="form-control" id="IdInfo" name="IdInfo" value=""> --}}
            <div class="mb-3">
              <label for="TituloInfo" class="col-form-label" >Titulo:</label>
              <input type="text" class="form-control" id="TituloRecurso" name="TituloRecurso" value="" required>
            </div>
            <div class="input-group mb-3">
              <label for="archivo" class="col-form-label">Imagen:</label>
              <input type="file" accept=".jpg,.png,.jpeg,.gif" class="form-control" id="entradaRecursoIMG" name="archivoRecurso" required>
              {{-- <input type="file" --}}
              {{-- <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#imagenModal"><i class="far fa-eye"></i></button> --}}
            </div>
            <div class="mb-3">
              <label for="TextoInfo" class="col-form-label">Link o enlace:</label>
              <textarea type="text" class="form-control" id="TextoRecurso" name="TextoRecurso" value="" required></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" >Nuevo recurso</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <div id="rightM">
    </div>   
</div>  
@endif
@if($view==5)
<div class="container">
  <div class="centrar">
      <h1 class="text-dark">Editar 	Servicios de Orientación Educativa</h1>
  </div>
  {{-- Modal Edicion de servicio --}}
  <div class="modal fade" id="modalEditarForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar servicios:</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('editarServicio') }}" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="text" class="form-control" id="editIdServicio" name="editIdServicio" value="" style="display:none;" readonly>
            <div class="mb-3">
              <label for="editTitulo" class="col-form-label" >Titulo:</label>
              <input type="text" class="form-control" id="editTituloServicio" name="editTituloServicio" value="" required>
            </div>
            <div class="input-group mb-3">
              <label for="archivo" class="col-form-label">Imagen:</label>
              <input type="file" accept=".jpg,.png,.jpeg,.gif" class="form-control" id="entradaServicioIMG" name="editarchivoServicio" required>
              {{-- <input type="file" --}}
              {{-- <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#imagenModal"><i class="far fa-eye"></i></button> --}}
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Link o enlace:</label>
              <textarea type="text" class="form-control" id="EditTextoServicio" name="EditTextoServicio" value="" required></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" >Editar servicios</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  

  
  {{-- Modal agregar un nuevo servicio--}}
  <div class="modal fade" id="modalNuevoForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuev servicio:</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('subirServicio') }}" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" class="form-control" id="IdServicio" name="IdServicio" value="" style="display:none;">
            {{-- <input type="hidden" class="form-control" id="IdInfo" name="IdInfo" value=""> --}}
            <div class="mb-3">
              <label for="TituloInfo" class="col-form-label" >Titulo:</label>
              <input type="text" class="form-control" id="TituloServicio" name="TituloServicio" value="" required>
            </div>
            <div class="input-group mb-3">
              <label for="archivo" class="col-form-label">Imagen:</label>
              <input type="file" accept=".jpg,.png,.jpeg,.gif" class="form-control" id="entradaInfografiaIMG" name="archivoServicio" required>
              {{-- <input type="file" --}}
              {{-- <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#imagenModal"><i class="far fa-eye"></i></button> --}}
            </div>
            <div class="mb-3">
              <label for="TextoInfo" class="col-form-label">Link o enlace:</label>
              <textarea type="text" class="form-control" id="TextoServicio" name="TextoServicio" value="" required></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" >Nuevo servicio</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <div id="rightM">
  </div>   
</div>  
@endif
{{-- Si es la vista 1, ejecuta este JS --}}
@if($view == 1)
<script type="text/javascript">
 $(document).ready(function () {
   $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content")
  },
  url:"{{url('/')}}/api/CRUD_infografias_et",
  success: function (data) {
    const tabla = JSON.parse(data);
    // console.log(tabla[0].code);
    if (tabla[1].code == "201"){
      $("#rightM").html(tabla[0].HTML);
      // cambiarTablaMes(0);
    }
  }
});
});

function cambiarInfografias(id) {
    $.ajax({
      type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content"),
      "id_infografias": id
    },
    url:"{{url('/')}}/api/CRUD_tema_i",
    success: function (data) {
      const carrusel = JSON.parse(data);
      console.log(carrusel[1].code);
      if (carrusel[1].code == "201"){
        $("#rightM").html(carrusel[0].HTML);
      }
    }
  });
  }
function borrarEje(id) {
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content"),
  },
  url:"{{url('/')}}/api/eliminar/"+id,
  success: function (data) {
    $(document).ready(function () {
      $.ajax({
      type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content")
      },
      url:"{{url('/')}}/api/CRUD_infografias_et",
    success: function (data) {
      const tabla = JSON.parse(data);
      console.log(tabla[0].code);
      if (tabla[1].code == "201"){
        $("#rightM").html(tabla[0].HTML);
        // cambiarTablaMes(0);
      }
      }
      });
      });
    }
  });
  }
function getTitulo(){
  var formulario = document.forms['formulario'];
  var campo = formulario['recipientName'].value;
  nuevoEje(campo);
}
function nuevoEje(nombreTitulo) {
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content"),
  },
  url:"{{url('/')}}/api/nuevoEje/"+nombreTitulo,
  success: function (data) {
    $(document).ready(function () {
      $.ajax({
      type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content")
      },
      url:"{{url('/')}}/api/CRUD_infografias_et",
    success: function (data) {
      const tabla = JSON.parse(data);
      console.log(tabla[0].code);
      if (tabla[1].code == "201"){
        $("#rightM").html(tabla[0].HTML);
      }
      }
      });
      });
    }
  });
  }
  
  function getTituloCambio(id){
    id = id;
    var formulario = document.forms['formulario'];
    var campo = formulario['nuevoTitulo'+id].value;
    console.log(id);
    
  }
  function cambiaTituloId(id){
    a = "idInfoEdit"+id.toString();
    b = "tituloEdit"+id.toString();
    var idInfoEdit = document.getElementById(a).value;
    var tituloEdit = document.getElementById(b).value;
    console.log(idInfoEdit+" "+tituloEdit);  
    cambiarTituloEje(id,tituloEdit);
  }
  function cambiarTituloEje(id,titulo) {
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content"),
    "id_infografias": id,
    "eje_tematico":titulo
  },
  url:"{{url('/')}}/api/cambiarEje",
  success: function (data) {
    $(document).ready(function () {
      $.ajax({
      type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content")
      },
      url:"{{url('/')}}/api/CRUD_infografias_et",
    success: function (data) {
      const tabla = JSON.parse(data);
      console.log(tabla[0].code);
      if (tabla[1].code == "201"){
        $("#rightM").html(tabla[0].HTML);
      }
      }
      });
      });
    }
  });
  }
  function getIdEje(id){
    $("input#IdEje").val(id);
  }

  function getInfografiaTitulo(id,eje){
    a = "tituloInfografia"+id.toString();
    b = "textoInfografia"+id.toString();
    var titulo = document.getElementById(a);
    var contenidoTitulo = titulo.innerHTML;
    contenidoTitulo.toString();
    var texto = document.getElementById(b);
    var contenidoTexto = texto.innerHTML;
    contenidoTexto.toString();
    $("input#editIdInfo").val(id);
    $("input#IdEje").val(eje);
    $("input#editTituloInfo").val(contenidoTitulo);
    $("textarea#EditTextoInfo").val(contenidoTexto);
    
  }

  function eliminarInfografia(id,eje) {
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content"),
  },
  url:"{{url('/')}}/api/eliminarInfografia/"+id,
  success: function (data) {
    $(document).ready(function () {
      $.ajax({
      type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content"),
      "id_infografias": eje
      },
      url:"{{url('/')}}/api/CRUD_tema_i",
    success: function (data) {
      const tabla = JSON.parse(data);
      console.log(tabla[0].code);
      if (tabla[1].code == "201"){
        $("#rightM").html(tabla[0].HTML);
        // cambiarTablaMes(0);
      }
      }
      });
      });
    }
  });
  }
  
</script>
@endif
@if($view == 2)
<script type="text/javascript">
$(document).ready(function () {
  $.ajax({
   type: "POST",
   data: {"_token": $("meta[name='csrf-token']").attr("content")
 },
 url:"{{url('/')}}/api/CRUD_convocatorias",
 success: function (data) {
   const tabla = JSON.parse(data);
   // console.log(tabla[0].code);
   if (tabla[1].code == "201"){
     $("#rightM").html(tabla[0].HTML);
     // cambiarTablaMes(0);
   }
 }
});
}); 
function cambiaTituloId(id){
    a = "idInfoEdit"+id.toString();
    b = "tituloEdit"+id.toString();
    var idInfoEdit = document.getElementById(a).value;
    var tituloEdit = document.getElementById(b).value;
    console.log(idInfoEdit+" "+tituloEdit);  
    cambiarTituloEje(id,tituloEdit);
  }
  function cambiarTituloEje(id,titulo) {
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content"),
    "id_convocatorias": id,
    "calendario":titulo
  },
  url:"{{url('/')}}/api/cambiarElemento",
  success: function (data) {
    $(document).ready(function () {
      $.ajax({
      type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content")
      },
      url:"{{url('/')}}/api/CRUD_convocatorias",
    success: function (data) {
      const tabla = JSON.parse(data);
      console.log(tabla[0].code);
      if (tabla[1].code == "201"){
        $("#rightM").html(tabla[0].HTML);
      }
      }
      });
      });
    }
  });
  } 
  function getTitulo(){
    var formulario = document.forms['formulario'];
    var campo = formulario['recipientName'].value;
    nuevoElemento(campo);
  }
function nuevoElemento(nombreTitulo) {
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content"),
  },
  url:"{{url('/')}}/api/nuevoElemento/"+nombreTitulo,
  success: function (data) {
    $(document).ready(function () {
      $.ajax({
      type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content")
      },
      url:"{{url('/')}}/api/CRUD_convocatorias",
    success: function (data) {
      const tabla = JSON.parse(data);
      console.log(tabla[0].code);
      if (tabla[1].code == "201"){
        $("#rightM").html(tabla[0].HTML);
      }
      }
      });
      });
    }
  });
  }
  function borrarElemento(id) {
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content"),
  },
  url:"{{url('/')}}/api/borrarElemento/"+id,
  success: function (data) {
    $(document).ready(function () {
      $.ajax({
      type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content")
      },
      url:"{{url('/')}}/api/CRUD_convocatorias",
    success: function (data) {
      const tabla = JSON.parse(data);
      console.log(tabla[0].code);
      if (tabla[1].code == "201"){
        $("#rightM").html(tabla[0].HTML);
        // cambiarTablaMes(0);
      }
      }
      });
      });
    }
  });
  }
  function cambiarConvocatoria(id) {
    $.ajax({
      type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content"),
      "id_convocatorias": id
    },
    url:"{{url('/')}}/api/CRUD_Convocatorias_contenido",
    success: function (data) {
      const carrusel = JSON.parse(data);
      console.log(carrusel[1].code);
      if (carrusel[1].code == "201"){
        $("#rightM").html(carrusel[0].HTML);
      }
    }
  });
  }
  function getConvocatoriaFormulario(id,convocatoriaid){
    a = "NombreEscuela"+convocatoriaid.toString();
    b = "Siglas"+convocatoriaid.toString();
    c = "convocatoria"+convocatoriaid.toString();
    d = "enlace"+convocatoriaid.toString();
    var nombre = document.getElementById(a);
    var contenidoNombre = nombre.innerHTML;
    contenidoNombre.toString();
    var siglas = document.getElementById(b);
    var contenidoSiglas = siglas.innerHTML;
    contenidoSiglas.toString();
    var convocatoria = document.getElementById(c);
    var contenidoConvocatoria = convocatoria.innerHTML;
    contenidoConvocatoria.toString();
    var enlace = document.getElementById(d);
    var contenidoEnlace = enlace.innerHTML;
    contenidoEnlace.toString();
    $("input#editIdMes").val(id);
    $("input#editIdConvocatoria").val(convocatoriaid);
    $("input#nombreEscuela").val(contenidoNombre);
    $("input#siglasEscuela").val(contenidoSiglas);
    $("input#tipoConvocatoria").val(contenidoConvocatoria);
    $("input#editEnlace").val(contenidoEnlace);
  }
  function getContenidoConvocatoria(){
    id = document.getElementById("editIdConvocatoria").value;
    var colorSelect = document.getElementById("colorSelectEdit").value;
    var nombreEscuela = document.getElementById("nombreEscuela").value;
    var siglasEscuela = document.getElementById("siglasEscuela").value;
    var tipoConvocatoria = document.getElementById("tipoConvocatoria").value;
    var editIdMes = document.getElementById("editIdMes").value;
    var editEnlace = document.getElementById("editEnlace").value;
    console.log(colorSelect+" "+nombreEscuela+" "+siglasEscuela+" "+tipoConvocatoria+" "+editEnlace);  
    cambiarContenidoConvocatorias(id,nombreEscuela,siglasEscuela,tipoConvocatoria,editIdMes,colorSelect,editEnlace);
  }
  function cambiarContenidoConvocatorias(id,escuela,siglas,convocatoria,editIdMes,colorSelect,editEnlace) {
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content"),
    "id_convocatorias_tablas": id,
    "id_colores":colorSelect, 
    "siglas":siglas,
    "nombre":escuela,
    "convocatoria":convocatoria,
    "enlace":editEnlace
  },
  url:"{{url('/')}}/api/cambiarConvocatoriaContenido",
  success: function (data) {
    $(document).ready(function () {
      $.ajax({
      type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content"),
      "id_convocatorias":editIdMes
      },
      url:"{{url('/')}}/api/CRUD_Convocatorias_contenido",
    success: function (data) {
      const tabla = JSON.parse(data);
      console.log(tabla[0].code);
      if (tabla[1].code == "201"){
        $("#rightM").html(tabla[0].HTML);
      }
      }
      });
      });
    }
  });
  }
  function getConvocatoriaId(id){
    $("input#nuevoIdMes").val(id);
  }
  function getNuevoContenidoConvocatoria(){
    id = document.getElementById("nuevoIdConvocatoria").value;
    var colorSelect = document.getElementById("colorSelectNuevo").value;
    var id_convocatorias = document.getElementById("nuevoIdMes").value;
    var nombreEscuela = document.getElementById("nuevoNombreEscuela").value;
    var siglasEscuela = document.getElementById("nuevoSiglasEscuela").value;
    var tipoConvocatoria = document.getElementById("nuevoTipoConvocatoria").value;
    var enlace = document.getElementById("nuevoEnlace").value;
    console.log(nombreEscuela+" "+siglasEscuela+" "+tipoConvocatoria+" "+enlace);  
    nuevoContenidoConvocatorias(id_convocatorias,nombreEscuela,siglasEscuela,tipoConvocatoria,colorSelect,enlace);
  }
  function nuevoContenidoConvocatorias(id_convocatorias,nombre,siglas,convocatoria,colorSelect,enlace) {
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content"),
    "id_convocatorias":id_convocatorias,
    "id_colores":colorSelect, 
    "siglas":siglas,
    "nombre":nombre,
    "convocatoria":convocatoria,
    "enlace":enlace
  },
  url:"{{url('/')}}/api/nuevaConvocatoriaContenido",
  success: function (data) {
    $(document).ready(function () {
      $.ajax({
      type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content"),
      "id_convocatorias":id_convocatorias
      },
      url:"{{url('/')}}/api/CRUD_Convocatorias_contenido",
    success: function (data) {
      const tabla = JSON.parse(data);
      console.log(tabla[0].code);
      if (tabla[1].code == "201"){
        $("#rightM").html(tabla[0].HTML);
      }
      }
      });
      });
    }
  });
  }
  function borrarConvocatoriaElemento(id,id_convocatorias) {
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content"),
  },
  url:"{{url('/')}}/api/borrarContenidoConvocatoria/"+id,
  success: function (data) {
    $(document).ready(function () {
      $.ajax({
      type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content"),
      "id_convocatorias":id_convocatorias
      },
      url:"{{url('/')}}/api/CRUD_Convocatorias_contenido",
    success: function (data) {
      const tabla = JSON.parse(data);
      console.log(tabla[0].code);
      if (tabla[1].code == "201"){
        $("#rightM").html(tabla[0].HTML);
        // cambiarTablaMes(0);
      }
      }
      });
      });
    }
  });
  }
  $(document).ready(function () {
  $.ajax({
   type: "POST",
   data: {"_token": $("meta[name='csrf-token']").attr("content")
 },
 url:"{{url('/')}}/api/obtenerColoresEdit",
 success: function (data) {
   const tabla = JSON.parse(data);
   // console.log(tabla[0].code);
   if (tabla[1].code == "201"){
     $("#coloresSelectEdit").html(tabla[0].HTML);
     // cambiarTablaMes(0);
   }
 }
});
}); 
$(document).ready(function () {
  $.ajax({
   type: "POST",
   data: {"_token": $("meta[name='csrf-token']").attr("content")
 },
 url:"{{url('/')}}/api/obtenerColoresNuevo",
 success: function (data) {
   const tabla = JSON.parse(data);
   // console.log(tabla[0].code);
   if (tabla[1].code == "201"){
     $("#coloresSelectNuevo").html(tabla[0].HTML);
     // cambiarTablaMes(0);
   }
 }
});
});
</script>
@endif
@if($view == 3)
<script type="text/javascript">
$(document).ready(function () {
  $.ajax({
   type: "POST",
   data: {"_token": $("meta[name='csrf-token']").attr("content")
 },
 url:"{{url('/')}}/api/CRUD_conferencias",
 success: function (data) {
   const tabla = JSON.parse(data);
   // console.log(tabla[0].code);
   if (tabla[1].code == "201"){
     $("#rightM").html(tabla[0].HTML);
     // cambiarTablaMes(0);
   }
 }
});
});

function cambiaTituloId(id){
    a = "idInfoEdit"+id.toString();
    b = "tituloEdit"+id.toString();
    var idInfoEdit = document.getElementById(a).value;
    var tituloEdit = document.getElementById(b).value;
    console.log(idInfoEdit+" "+tituloEdit);  
    cambiarTituloConferencia(id,tituloEdit);
  }
  function cambiarTituloConferencia(id,titulo) {
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content"),
    "id_conferencias": id,
    "conferenciascol":titulo
  },
  url:"{{url('/')}}/api/cambiarConferencias",
  success: function (data) {
    $(document).ready(function () {
      $.ajax({
      type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content")
      },
      url:"{{url('/')}}/api/CRUD_conferencias",
    success: function (data) {
      const tabla = JSON.parse(data);
      console.log(tabla[0].code);
      if (tabla[1].code == "201"){
        $("#rightM").html(tabla[0].HTML);
      }
      }
      });
      });
    }
  });
  }
  function borrarConferencia(id) {
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content"),
  },
  url:"{{url('/')}}/api/borrarConferencia/"+id,
  success: function (data) {
    $(document).ready(function () {
      $.ajax({
      type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content")
      },
      url:"{{url('/')}}/api/CRUD_conferencias",
    success: function (data) {
      const tabla = JSON.parse(data);
      console.log(tabla[0].code);
      if (tabla[1].code == "201"){
        $("#rightM").html(tabla[0].HTML);
        // cambiarTablaMes(0);
      }
      }
      });
      });
    }
  });
  }
  function getTitulo(){
  var formulario = document.forms['formulario'];
  var campo = formulario['recipientName'].value;
  nuevaConferencia(campo);
}
function nuevaConferencia(nombreTitulo) {
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content"),
  },
  url:"{{url('/')}}/api/nuevaConferencia/"+nombreTitulo,
  success: function (data) {
    $(document).ready(function () {
      $.ajax({
      type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content")
      },
      url:"{{url('/')}}/api/CRUD_conferencias",
    success: function (data) {
      const tabla = JSON.parse(data);
      console.log(tabla[0].code);
      if (tabla[1].code == "201"){
        $("#rightM").html(tabla[0].HTML);
      }
      }
      });
      });
    }
  });
  }
  function getContenidoConferencia(id){
    a = "tituloConferencias"+id.toString();
    b = "enlaceConferencias"+id.toString();
    c = "textoConferencias"+id.toString();
    var tituloConferencias = document.getElementById(a).value;
    var enlaceConferencias = document.getElementById(b).value;
    var textoConferencias = document.getElementById(c).value;
    console.log(tituloConferencias+" "+enlaceConferencias+" "+textoConferencias);  
    cambiarContenidoConferencias(id,tituloConferencias,enlaceConferencias,textoConferencias);
  }
  function cambiarContenidoConferencias(id,titulo,enlace,texto) {
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content"),
    "id_conferencias": id,
    "titulo":titulo,
    "texto":texto,
    "enlace":enlace
  },
  url:"{{url('/')}}/api/cambiarContenidoConferencia",
  success: function (data) {
    $(document).ready(function () {
      $.ajax({
      type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content")
      },
      url:"{{url('/')}}/api/CRUD_conferencias",
    success: function (data) {
      const tabla = JSON.parse(data);
      console.log(tabla[0].code);
      if (tabla[1].code == "201"){
        $("#rightM").html(tabla[0].HTML);
      }
      }
      });
      });
    }
  });
  }
</script>
@endif
@if($view == 4)
<script type="text/javascript">
  $(document).ready(function () {
   $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content")
  },
  url:"{{url('/')}}/api/CRUD_recursos_apoyo",
  success: function (data) {
    const tabla = JSON.parse(data);
    // console.log(tabla[0].code);
    if (tabla[1].code == "201"){
      $("#rightM").html(tabla[0].HTML);
      // cambiarTablaMes(0);
    }
  }
});
});
function getRecursoContenido(id){
    a = "tituloRecurso"+id.toString();
    b = "textoRecurso"+id.toString();
    var titulo = document.getElementById(a);
    var contenidoTitulo = titulo.innerHTML;
    contenidoTitulo.toString();
    var texto = document.getElementById(b);
    var contenidoTexto = texto.innerHTML;
    contenidoTexto.toString();
    $("input#editIdRecurso").val(id);
    $("input#editTituloRecurso").val(contenidoTitulo);
    $("textarea#EditTextoRecurso").val(contenidoTexto);
    
  }
  function eliminarRecurso(id) {
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content"),
  },
  url:"{{url('/')}}/api/eliminarRecurso/"+id,
  success: function (data) {
    $(document).ready(function () {
      $.ajax({
      type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content")
      },
      url:"{{url('/')}}/api/CRUD_recursos_apoyo",
    success: function (data) {
      const tabla = JSON.parse(data);
      console.log(tabla[0].code);
      if (tabla[1].code == "201"){
        $("#rightM").html(tabla[0].HTML);
        // cambiarTablaMes(0);
      }
      }
      });
      });
    }
  });
  }
</script>
@endif
@if($view == 5)
<script type="text/javascript">
  $(document).ready(function () {
   $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content")
  },
  url:"{{url('/')}}/api/CRUD_servicios",
  success: function (data) {
    const tabla = JSON.parse(data);
    // console.log(tabla[0].code);
    if (tabla[1].code == "201"){
      $("#rightM").html(tabla[0].HTML);
      // cambiarTablaMes(0);
    }
  }
});
});
function getServicioContenido(id){
    a = "tituloServicio"+id.toString();
    b = "textoServicio"+id.toString();
    var titulo = document.getElementById(a);
    var contenidoTitulo = titulo.innerHTML;
    contenidoTitulo.toString();
    var texto = document.getElementById(b);
    var contenidoTexto = texto.innerHTML;
    contenidoTexto.toString();
    $("input#editIdServicio").val(id);
    $("input#editTituloServicio").val(contenidoTitulo);
    $("textarea#EditTextoServicio").val(contenidoTexto);
    
  }
  function eliminarServicio(id) {
  $.ajax({
    type: "POST",
    data: {"_token": $("meta[name='csrf-token']").attr("content"),
  },
  url:"{{url('/')}}/api/eliminarServicio/"+id,
  success: function (data) {
    $(document).ready(function () {
      $.ajax({
      type: "POST",
      data: {"_token": $("meta[name='csrf-token']").attr("content")
      },
      url:"{{url('/')}}/api/CRUD_servicios",
    success: function (data) {
      const tabla = JSON.parse(data);
      console.log(tabla[0].code);
      if (tabla[1].code == "201"){
        $("#rightM").html(tabla[0].HTML);
        // cambiarTablaMes(0);
      }
      }
      });
      });
    }
  });
  }
</script>
@endif
@endsection
