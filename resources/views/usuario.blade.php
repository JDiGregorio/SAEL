<hr>
<div>
<span>Sistemas Administrativo de Control de Eventos</span>
<h1>Reporte de usuarios</h1>
</div>
<hr>
<table id="customers">
	<thead>
	<tr>
		<th>ID</th>
		<th>Nombre</th>
		<th>Correo</th>
	</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

<style>

#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers th {
    border: 1px solid #ddd;
    padding: 8px;
	align: center;
}

#customers td {
    border: 1px solid #ddd;
    padding-left: 20px;
    padding-top: 10px;
    padding-bottom: 10px;
	font-size: 12px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: gray;
    color: white;
}
</style>

