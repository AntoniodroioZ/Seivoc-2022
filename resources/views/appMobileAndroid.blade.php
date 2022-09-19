<!DOCTYPE html>
<html lang="en">
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
      <meta name="generator" content="Hugo 0.80.0">
      <title>SEIVOC New Beginning</title>
      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="{{ asset('/dist/css/bootstrap.min.css') }}" type="text/css">
      <link rel="stylesheet" href="{{ asset('/css/bootstrap-extension.min.css') }}" type="text/css">
      <link rel="stylesheet" href="{{ asset('/css/navar.css') }}" type="text/css">
      {{-- <link rel="stylesheet" href="{{ asset('/js/metainfo.js') }}" > --}}
      {{-- <script src="{{ asset('/js/metainfo.js') }}" type="text/javascript"></script> --}}
    </head>
    <body style="background-image:  url('{{asset('/images/background.png')}}');background-attachment: fixed;background-size: 100%;background-size: 200% 100%;">
    
      <header>
        <div class="pleca-superior-app" style="background-repeat: no-repeat;">
          <img  src="{{ asset('images/Logo.png') }}" width="8%" style="margin-left: 5%;">
            @guest
            <a  width="8%" style="margin-left: 60%;color: white;" class="separacion-logo-registro tam-login-texto" href="{{ url('/registro') }}">Registro</a>
            <a class="tam-login-texto" width="8%" style=" color: white;" >/</a>
            <a class="tam-login-texto" width="8%" style=" color: white;" href="{{ url('/login') }}">Iniciar Sesión</a>
            <p id="mdseivoc" hidden></p>
            
          @else
            <a style="color: white; margin-left: 60%;" width="8%">
            Hola,&nbsp;&nbsp;
            <strong>{{ Auth::user()->alias }}</strong><p id="mdseivoc" hidden>{{ Auth::user()->usuario_id }}</p></a>
            <a  style=" color: white;">
            /</a>
    
            <a  style=" color: white;" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Cerrar Sesión') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>  
          @endguest
        </div>
        
      </header>
      <div class="container">
          <br><br><br><br>
        <a href="#">
            <img class="img-fluid separacion-gif" src="{{ asset('/images/gif-app.gif') }}" alt="">
        </a>
      </div>
    </body>
</html>