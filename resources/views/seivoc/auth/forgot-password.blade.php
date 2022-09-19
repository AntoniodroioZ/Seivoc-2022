@extends('seivoc.nav')

@section('content')

<br><br><br><br><br><br><br>

<div class="container " >
      <div class="row" >
        <div class="col-md-6 offset-md-3" >
          <div class="card shadow-sm " style=" border-radius:  25px; ">
            <div class="card-body">
                <p>¿Has olvidado tu contraseña? Ingresa tu correo electronico:</p>
                @if (isset($Error))
                    <div class="alert alert-danger" role="alert">
                        {{ $Error }}
                    </div>
                @endif
                @if (isset($Exito))
                    <div class="alert alert-success" role="alert">
                        {{ $Exito }}
                    </div>
                @endif
                <form action="{{ route('sendResetEmail') }}" method="post">
                @csrf
                    <div class="row">
                        <input class="col" style="max-width:30rem;" type="email" name="emailResetPass" id="">
                    </div>
                    <br>
                    <div class="row">
                        <button class="col btn btn-primary" style="max-width:10rem;">Enviar correo</button>
                    </div>
                </form>
              
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    {{-- <img style="position: relative; top: -560px; left: 780px;" src="images\login\grafico_1.png"/> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection