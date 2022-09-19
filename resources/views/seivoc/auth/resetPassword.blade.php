@extends('seivoc.nav')

@section('content')

<br><br><br><br><br><br><br>

<div class="container " >
      <div class="row" >
        <div class="col-md-6 offset-md-3" >
          <div class="card shadow-sm " style=" border-radius:  25px; ">
            <div class="card-body">
                <h3>Ahora podras restaurar tu contraseña.</h3>
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
                <form action="{{ route('resetPass') }}" method="post" @if(isset($Exito))style="display:none" @endif>
                @csrf
                    <p>Ingresa una nueva contraseña:</p>
                    <div class="row">
                        <input class="col" style="max-width:30rem;" type="password" name="resetPassword" id="">
                    </div>
                    <br>
                    <p>Confirma tu contraseña:</p>
                    <div class="row">
                        <input class="col" style="max-width:30rem;" type="password" name="resetPasswordConfirm" id="">
                    </div>
                    <div class="row" style="display:none">
                        <input class="col" style="max-width:30rem;" type="text" name="usuario_id" id="" value={{$ID_usuario}}>
                    </div>
                    <div class="row" style="display:none">
                        <input class="col" style="max-width:30rem;" type="text" name="hash" id="" value={{$Hash}}>
                    </div>
                    <br>
                    <div class="row">
                        <button class="col btn btn-primary" style="max-width:12rem;">Cambiar contraseña</button>
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