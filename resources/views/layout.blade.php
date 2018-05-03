<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}"> 
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/app.css') }}">
		
    <title>
      Inicio
    </title>
	
	
</head>
<body>
	<header>
		<nav>
		<ul>
			<li><a href="#">Inicio</a></li>
			<li><a>Fundación</a>
				<ul>
					<li><a href="#">Sobre Nosotros</a></li>
					<li><a href="#">Logros</a></li>
					<li><a href="#">Vinculos</a></li>
					<li><a href="#">Junta Directiva</a></li>
					</li>
				</ul>
			</li>
			<li><a>Componentes</a>
				<ul>
					<li><a href="#">Observatorio</a></li>
					<li><a href="#">ONCCDS</a></li>
					<li><a href="#">Centro de Documentación</a></li>
					<li><a href="#">Educación Ambiental</a></li>
					<li><a href="#">Innovación</a></li>
				</ul>
			</li>
			<li><a href="#">Proyectos</a></li>
			<li><a href="#">Eventos</a></li>
			<li><a href="#">Voluntariado</a></li>
		</ul>
		</nav>
	</header>
	
	@yield('boton')
	
	<div class="section">
		@yield('prueba')
	</div>
</body>
</html>