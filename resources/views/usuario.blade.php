<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

	<div style="margin:1px; width:700px;">
		<hr>
			<div id="left">
				<img src="img/usermini.png" class="img-fluid" alt="Responsive image">
			</div>
			<div id="right" >
				<img src="img/logomini.png" class="img-fluid" alt="Responsive image">
			</div>
			<h1 align="center">Reporte de usuarios</h1>
			<h5 align="center">Sistemas Administrativo de Control de Eventos</h5>
	</div>
<hr>
	<table class="table table-bordered">
		<thead class="thead-light">
		<tr>
			<th class="col-xs-1">ID</th>
			<th class="col-xs-3">Nombre</th>
			<th class="col-xs-2">Correo</th>
			<th class="col-xs-2">Fecha creación</th>
		</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->created_at }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>


