<!DOCTYPE html>
<html lang="es-ES">
<head>
	<meta charset="utf-8">
</head>
<body>
<h1>Hola {{$nombre}}!</h1>
<h2>Para restaurar tu contraseña da click aqui:</h2><br><br>

<div>{{ url('/') }}/resetPasswordView/{{$ID_usuario}}/{{$Hash}}</div>
</body>
</html>