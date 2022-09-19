@extends('seivoc.nav')

@section('content')
<br><br><br><br><br><br>


<div class="container " >
	<div class="row" >
		<div class="col-md-8 offset-md-2" >
			<div class="card shadow-sm " style=" border-radius:  50px; ">

				<div class="card-body">

					<div class="container">
						<form method="POST" action="{{ route('SavUsuaio') }}" name="formulario1">
						@csrf
						<div class="row" >
							<div class="col-md-12 ">
								<h2 style="text-align: center;color:#2f2e65";>Reg&#237;strate con tu direcci&#243;n de correo </h2>                 
							</div>
						</div>
						<div class="row" >
							<div class="col-md-12">
								<br>
								<div class="row row-conteent justify-content-md-center ">
									<a   onclick = "CambiarImagen('images\registro\perfil1.png')" style="width: 13%" >
										<img  style=" width: 100%" src="images\registro\perfil1.png">
									</a> 
									<a   onclick = "CambiarImagen('images\registro\perfil2.png')" style="width: 13%" >
										<img  style=" width: 100%"  src="images\registro\perfil2.png">
									</a> 
									<a   onclick = "CambiarImagen('images\registro\perfil3.png')" style="width: 13%" >
										<img  style=" width: 100%"  src="images\registro\perfil3.png">
									</a>  
									<a   onclick = "CambiarImagen('images\registro\perfil4.png')"  style="width: 13%" >
										<img  style=" width: 100%" src="images\registro\perfil4.png">
									</a>  
									<a   onclick = "CambiarImagen('images\registro\perfil5.png')" style="width: 13%" >
										<img  style=" width: 100%" src="images\registro\perfil5.png">
									</a> 
									<a  onclick = "CambiarImagen('images\registro\perfil16.png')" style="width: 13%" >
										<img  style=" width: 100%" src="images\registro\perfil6.png">
									</a>    
									<a  onclick = "CambiarImagen('images\registro\perfil7.png')" style="width: 13%" >
										<img  style=" width: 100%" src="images\registro\perfil7a.png">
									</a> 
									<p class="col-md-6 offset-md-3">Selecciona una imagen de perfil</p> 
								</div>
							</div> 
						</div>
						<br>
						<input id="profile_photo_path" name="profile_photo_path" type="hidden" value="images\registro\perfil7a.png">
						
						@if ($errors->any())
						    <div class="col-md-12">
						        <div class="alert alert-danger">
						            <ul>
						                @foreach ($errors->all() as $error)
						                    <li>{{ $error }}</li>
						                @endforeach
						            </ul>
						        </div>
						    </div>
						@endif
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
						<div class="col-md-8 offset-md-2">
							<div class="form-group row">
								<div class="col-md-12">
									<input style="border-radius: 10px;" type="text" class="form-control" id="alias" name="alias" placeholder="Alias" required>
								</div>
							</div>
							<br>
							<div class="form-group row">
								<div class="col-md-12">
									<input style="border-radius: 10px;" type="email" class="form-control" id="email" name="email" :value="old('email')" required  placeholder="Correo Electr&oacute;nico">
								</div>
							</div>
							<br>
							<div class="form-group row">
								<div class="col-md-12">
									<input  style="border-radius: 10px;"  class="form-control" id="password" name="password"  type="password"placeholder="Contrase&ntilde;a" required autocomplete="new-password" >
								</div>
							</div>
							<br>
							<div class="form-group row">
								<div class="col-md-12">
									<input  style="border-radius: 10px;"  class="form-control" id="password_confirmation" name="password_confirmation"  type="password" placeholder="Confirmar Contrase&ntilde;a" required autocomplete="new-password" >
								</div>
							</div>
							<br>
							<div class="form-group row">
								<div class="col-md-12">
									<input  style="border-radius: 10px;" type="number" min="10" step="1"  class="form-control" id="edad" name="edad"   placeholder="Edad" required  >
								</div>
							</div>
							<br>
							<div class="form-group row">
								<label  for="sexo" class="col-12 col-md-12 offset-md-5 col-form-label">Sexo</label>
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<select  style="border-radius: 10px;" class="col-md-12" name="sexo"  id="sexo" required="">
										<option style="text-align-last: : center;" value="1" >M</option>
										<option style="text-align-last: : center;" value="2">H</option>
									</select>  
								</div>
							</div>
							
							<div class="form-group row">
								<br>
								<div class="col-md-6 offset-md-3 ">
									<input type="checkbox" id="orientador" name="orientador" >
									<label for="orientador"> ¿Eres orientador &#63;</label><br>
								</div>
								<br>
								<div class="col-md-12 ">
									<input type="checkbox" id="aviso" name="aviso" value="aviso" >
									<label for="aviso"> He le&#237;do y acepto el <a style="text-decoration: none;" href="">aviso de privacidad</a> </label><br>
								</div>
							</div>
							<div class="form-group row">
							<div class="col-md-6 offset-md-3">
								<a    class="act"  href="javascript:document.formulario1.submit()" >
									<img   src="images\registro\registro.png">
								</a>
							</div>  
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<img style="position: relative; top: -780px; left: 730px;" src="images\registro\grafico.png"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function () {

   });
   function CambiarImagen(URL) {
   	$("#profile_photo_path").val(URL);
   	console.log($("#profile_photo_path").val());
   }
</script>
@endsection