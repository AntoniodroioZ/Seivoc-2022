@extends('welcome')
@section('contenido')

<br><br><br>
<img src="{{ asset('images/maquetacion-acerca2.png') }}" width="110%"  >
{{-- <img src="{{ asset('images/img-general.svg') }}" width="110%"  > --}}
<img style="padding:0rem 8rem;" src="{{ asset('images/ilustracion-inicial-v1.png') }}" width="110%"  >
<img style="padding:0rem 2rem;" src="{{ asset('images/organigrama-actualizado02.png') }}" width="110%"  >
<img src="{{ asset('images/creditos-2022.svg') }}" width="110%"  >

<a href="{{-- route('about') --}}">

{{-- <button type="button" class="btn btn-warning  btn-lg btn-block">&nbsp;&nbsp;&nbsp;&nbsp;Explorar&nbsp;&nbsp;&nbsp;&nbsp;</button> --}}</a>
@endsection