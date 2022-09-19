<!DOCTYPE html>
<html lang="es-ES">
<head>
	<meta charset="utf-8">
</head>
<body>
<h1>Hola {{$nombre}}!</h1>
<h2>Para completar su registro acceda a la siguiente URL</h2><br><br>

<div>{{ url('/') }}/verificacion/{{$ID_usuario}}/{{$Hash}}</div>
</body>
</html>