<hr>
<div>
<span>Sistemas Administrativo de Control de Eventos</span>
<h1>Reporte de Alquiler y/o reservación</h1>
</div>
<hr>
<table id="customers">
	<thead>
	<tr>
		<th>Tipo</th>
		<th>Salón/Salones</th>
		<th>Fecha de evento</th>
		<th>Horario</th>
		<th>Cliente</th>
		<th>Tipo de evento</th>
	</tr>
	</thead>
	<tbody>
		@foreach($reservaciones as $reservacion)
			<tr>
				<td>{{ $reservacion->tipo }}</td>
				<td>{{ $reservacion->salones()->get()->first()->nombre }}</td>
				<td>{{ $reservacion->fecha }}</td>
				<td>{{ $reservacion->hora_inicio }} a {{ $reservacion->hola_final }}</td>
				<td>{{ $reservacion->cliente()->get()->first()->nombre }}</td>
				<td>{{ $reservacion->evento()->get()->first()->name }}</td>
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

