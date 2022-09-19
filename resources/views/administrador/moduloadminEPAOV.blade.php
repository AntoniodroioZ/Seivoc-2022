{{-- NavBar --}}
@extends('administrador.navEPAOV')

@section('content')
<div class="container">
    <div class="centrar">
        <h1 class="text-dark">Secciones Información a la mano</h1>
    </div>
    <div>
        <table class="table table-primary table-striped">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Sección</th>
                <th scope="col">Acción</th>
              </tr>
            </thead>
            <tbody>
              @for ($i = 0; $i < sizeof($rol); $i++)
                @if ($rol[$i]==5)
                  <tr>
                    <th scope="row"></th>
                    <td class="color-texto-tablas">Infografías</td>
                    <td><a href="{{url('/moduloadminEPAOV/infografias') }}"><button type="button" class="btn btn-success" >Editar</button></a></td>
                  </tr>           
                @endif
                @if ($rol[$i]==6)
                  <tr>
                    <th scope="row"></th>
                    <td class="color-texto-tablas">Convocatorias</td>
                    <td><a href="{{url('/moduloadminEPAOV/convocatorias') }}"><button type="button" class="btn btn-success">Editar</button></a></td>
                  </tr>
                @endif
                @if ($rol[$i]==7)
                  <tr>
                    <th scope="row"></th>
                    <td class="color-texto-tablas">Conferencias</td>
                    <td><a href="{{url('/moduloadminEPAOV/conferencias') }}"><button type="button" class="btn btn-success">Editar</button></a></td>                
                  </tr>
                @endif
                @if ($rol[$i]==8)
                  <tr>
                    <th scope="row"></th>
                    <td class="color-texto-tablas">Recursos de Apoyo para la Trayectoria Escolar</td>
                    <td><a href="{{url('/moduloadminEPAOV/recursosapoyo') }}"><button type="button" class="btn btn-success">Editar</button></a></td>
                  </tr>
                @endif
                @if ($rol[$i]==9)
                  <tr>
                    <th scope="row"></th>
                    <td class="color-texto-tablas">Servicios de Orientación Educativa</td>
                    <td><a href="{{url('/moduloadminEPAOV/servicios') }}"><button type="button" class="btn btn-success">Editar</button></a></td>
                  </tr>
                @endif
              @endfor
            </tbody>
          </table>   
    </div>
</div>
@endsection
