@extends('welcome')
@section('contenido')
<br><br><br>
<img src="{{ asset('images/info-4.png') }}" width="110%"  >
<a href="{{ route('FlujoPrincipal') }}">
<button type="button" class="btn btn-warning  btn-lg btn-block MetaDataJCSeivoc" ReferenciaMetaSEIVOC="3001">&nbsp;&nbsp;&nbsp;&nbsp;Explorar&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
@endsection