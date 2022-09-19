<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;	
use App\Http\Requests\ValidarUserRequest;
use Illuminate\Support\Facades\Mail;

class RegistroController extends Controller
{
	// else{echo('bien');}
	public function testPass(){
		$pass = 'Contraseña1';
		$caracteres = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
		// $pass = input('password');
		if(strlen($pass) < 6){
			$Error='La contraseña debe de tener al menos 6 caracteres.';
			return view('seivoc.auth.register', compact('Error'));
		}
		if(strlen($pass) > 36){
			$Error='La contraseña no puede tener mas de 36 caracteres.';
			return view('seivoc.auth.register', compact('Error'));
		}
		if(!preg_match('`[a-z]`',$pass)){
			$Error='La contraseña debe tener al menos una letra minúscula.';
			return view('seivoc.auth.register', compact('Error'));
		}
		if(!preg_match('`[A-Z]`',$pass)){
			$Error='La contraseña debe tener al menos una letra mayúscula.';
			return view('seivoc.auth.register', compact('Error'));
		}
		if(!preg_match('`[0-9]`',$pass)){
			$Error='La contraseña debe tener al menos un numero.';
			return view('seivoc.auth.register', compact('Error'));
		}
		if(!preg_match($caracteres,$pass)){
			$Error='La contraseña debe tener al menos un caracter especial: '.$caracteres;
			return view('seivoc.auth.register', compact('Error'));
		}

		
	}
	
    function VerifyAlumno($ID_usuario,$Hash)
    {
      if (User::where('usuario_id',$ID_usuario)
             ->where('hash',$Hash)
             ->exists()) {
        $ActivacionUser=User::where('usuario_id',$ID_usuario)->update(['email_verified_at'=>date('Y-m-d H:i:s')]);
        $text= "Éxito de activación, ahora puedes iniciar sesión.";
      }else{
        $text= "¡Parámetros inválidos para la verificación de la cuenta!.";
      }
    return view('seivoc.auth.login', compact('text'));
    }
    
    public function RegistroUsuario(ValidarUserRequest $request)
    {
      /*Hacer una funcion que valide la contraseña*/
	  $caracteres = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
	  $pass = $request->input('password');
    	if ($request->input('password')!=$request->input('password_confirmation')) {
    		$Error='La confirmacion de contraseña no es igual que la contraseña';
    		return view('seivoc.auth.register', compact('Error'));
    	}
    	if (User::Where("email",$request->input('email'))->exists()) {
    		//$errors={""}
        	$Error='Verifica tu email, ya que ya esta registrados';
    		return view('seivoc.auth.register', compact('Error'));
    	}
		if(strlen($pass) < 6){
			$Error='La contraseña debe de tener al menos 6 caracteres.';
			return view('seivoc.auth.register', compact('Error'));
		}
		if(strlen($pass) > 36){
			$Error='La contraseña no puede tener mas de 36 caracteres.';
			return view('seivoc.auth.register', compact('Error'));
		}
		if(!preg_match('`[a-z]`',$pass)){
			$Error='La contraseña debe tener al menos una letra minúscula.';
			return view('seivoc.auth.register', compact('Error'));
		}
		if(!preg_match('`[A-Z]`',$pass)){
			$Error='La contraseña debe tener al menos una letra mayúscula.';
			return view('seivoc.auth.register', compact('Error'));
		}
		if(!preg_match('`[0-9]`',$pass)){
			$Error='La contraseña debe tener al menos un numero.';
			return view('seivoc.auth.register', compact('Error'));
		}
		if(!preg_match($caracteres,$pass)){
			$Error='La contraseña debe tener al menos un caracter especial: '.$caracteres;
			return view('seivoc.auth.register', compact('Error'));
		}
		

    	if ($request->input('orientador')) {
    		$usuario = User::create( [				
			  	'alias' => $request->input('alias'), 
			  	'email'=> $request->input('email'),  
			  	'password'=> password_hash($request->input('password'), PASSWORD_BCRYPT),
			  	'hash'=> md5(rand(0,1000).'NolascoOnda'),
			  	'status_id'=> 0,
			  	'orientador'=> true,
			  	'sexo'=> $request->input('sexo'),
			  	'edad'=> $request->input('edad'),
			  	'profile_photo_url'=> $request->input('profile_photo_url')
			  ]);
    	}else{
    		$usuario = User::create([ 
			  	'alias' => $request->input('alias'), 
			  	'email'=> $request->input('email'),  
			  	'password'=> password_hash($request->input('password'), PASSWORD_BCRYPT),
			  	'hash'=> md5(rand(0,1000).'NolascoOnda'),
			  	'status_id'=> 0,
			  	'orientador'=> false,
			  	'sexo'=> $request->input('sexo'),
			  	'edad'=> $request->input('edad'),
			  	'profile_photo_url'=> $request->input('profile_photo_url')
			  ]);
    	}
        $email=$request->input('email');
        
        $data = array(
            'ID_usuario' => $usuario->usuario_id,
            'Hash'       => $usuario->hash,
            'nombre'     => $usuario->alias
        );
        Mail::send('email.loginenv',$data, function ($messaje) use ($email)
        {
            $messaje->from("vocacionenlinea@unam.mx","Seivoc");
            $messaje->subject('Bienvenido SEIVOC Registro');
            $messaje->to($email);
            
        });
        
        $Exito="Usuario registrado correctamente.¡Confirma tu registro dando clic al link que se envió a tu email!.Si no esta el link en la bandeja principal te sugerimos revisar 'correo no deseado o spam'.
                        Si el link no esta activo, copia y pega la liga directamente en el buscador para habilitar tu registro";
    		return view('seivoc.auth.register', compact('Exito'));
    	// dd($usuario);
    }
	public function forgotPassword(){
		return view('seivoc.auth.forgot-password');
	}

	public function sendEmailResetPassword(request $request){
		$email=$request->input('emailResetPass');
		// $email = 'antonybey13@gmail.com';



		$dataUser = user::where('email',$email)->first();
		// dd($dataUser);
		if($dataUser==null){
			$Error = 'El correo no se encuentra registrado, asegurate de escribirlo correctamente o que te registraste con este correo.';
			return view('seivoc.auth.forgot-password', compact('Error'));
		}
		$data = array(
            'ID_usuario' => $dataUser->usuario_id,
            'Hash'       => $dataUser->hash,
            'nombre'     => $dataUser->alias
        );

		Mail::send('email.resetPassword',$data, function ($messaje) use ($email)
        {
            $messaje->from("vocacionenlinea@unam.mx","Seivoc");
            $messaje->subject('Restaurar contraseña SEIVOC.');
            $messaje->to($email);
        });
		$Exito = 'Podras restablecer tu contraseña con el link que ha sido enviado a tu email, por favor, verifica en la bandeja de entrada principal, tambien te sugerimos revisar correo no deseado o spam.';
		return view('seivoc.auth.forgot-password', compact('Exito'));
		// return "qweqw";
	}
	public function resetPasswordView($ID_usuario,$Hash){
		$dataUser = $dataUser = user::where('hash',$Hash)->first();
		if($dataUser->usuario_id == $ID_usuario){
			return view('seivoc.auth.resetPassword', compact('ID_usuario','Hash'));
		}else{
			return false;
		}
	}
	public function resetPassword(request $request){
		$caracteres = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
	  	$pass = $request->input('resetPassword');
		$ID_usuario = $request->input('usuario_id');
		$Hash = $request->input('hash');
    	if ($request->input('resetPassword')!=$request->input('resetPasswordConfirm')) {
    		$Error='La confirmacion de contraseña no es igual que la contraseña';
    		return view('seivoc.auth.resetPassword', compact('Error','ID_usuario','Hash'));
    	}
		if(strlen($pass) < 6){
			$Error='La contraseña debe de tener al menos 6 caracteres.';
			return view('seivoc.auth.resetPassword', compact('Error','ID_usuario','Hash'));
		}
		if(strlen($pass) > 36){
			$Error='La contraseña no puede tener mas de 36 caracteres.';
			return view('seivoc.auth.resetPassword', compact('Error','ID_usuario','Hash'));
		}
		if(!preg_match('`[a-z]`',$pass)){
			$Error='La contraseña debe tener al menos una letra minúscula.';
			return view('seivoc.auth.resetPassword', compact('Error','ID_usuario','Hash'));
		}
		if(!preg_match('`[A-Z]`',$pass)){
			$Error='La contraseña debe tener al menos una letra mayúscula.';
			return view('seivoc.auth.resetPassword', compact('Error','ID_usuario','Hash'));
		}
		if(!preg_match('`[0-9]`',$pass)){
			$Error='La contraseña debe tener al menos un numero.';
			return view('seivoc.auth.resetPassword', compact('Error','ID_usuario','Hash'));
		}
		if(!preg_match($caracteres,$pass)){
			$Error='La contraseña debe tener al menos un caracter especial: '.$caracteres;
			return view('seivoc.auth.resetPassword', compact('Error','ID_usuario','Hash'));
		}
		
		$changePassword = user::where('hash',$Hash)->update(['password'=>password_hash($pass, PASSWORD_BCRYPT)]);
		// $changePassword->save();
		$Exito = 'Contraseña restaurada, vuelve al inicio de sesión.';
		return view('seivoc.auth.resetPassword', compact('Exito','ID_usuario','Hash'));
	}
}
// Contraseña1!
// SELECT * FROM `users` WHERE `email` LIKE 'antonybey13@gmail.com'
