<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

	<div style="margin:1px; width:700px;">
		<hr>
			<div id="left">
				<img src="img/clientemini.png" class="img-fluid" alt="Responsive image">
			</div>
			<div id="right" >
				<img src="img/logomini.png" class="img-fluid" alt="Responsive image">
			</div>
			<h1 align="center">Reporte de clientes</h1>
			<h5 align="center">Sistemas Administrativo de Control de Eventos</h5>
	</div>
<hr>
	<table class="table table-bordered">
		<thead class="thead-light">
			<tr>
				<th class="col-xs-2">Identidad</th>
				<th class="col-xs-3">Nombre</th>
				<th class="col-xs-3">Dirección</th>
				<th class="col-xs-1">Teléfono</th>
				<th class="col-xs-3">Correo</th>
			</tr>
		</thead>
		<tbody>
			@foreach($clientes as $cliente)
				<tr>
					<td>{{ $cliente->identidad }}</td>
					<td>{{ $cliente->nombre }}</td>
					<td>{{ $cliente->direccion }}</td>
					<td>{{ $cliente->telefono }}</td>
					<td>{{ $cliente->correo }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

