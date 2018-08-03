<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

	<div style="margin:1px; width:700px;">
		<hr>
			<div id="left">
				<img src="img/reservamini.png" class="img-fluid" alt="Responsive image">
			</div>
			<div id="right" >
				<img src="img/logomini.png" class="img-fluid" alt="Responsive image">
			</div>
			<h1 align="center">Reporte de reservación</h1>
			<h5 align="center">Sistemas Administrativo de Control de Eventos</h5>
	</div>
<hr>
	<table class="table table-bordered">
		<thead class="thead-light">
			<tr>
				<th>Registro reservación</th>
				<th>Cliente</th>
				<th>Salones</th>
				<th>Fecha de evento</th>
				<th>Título de evento</th>
				<th>Estado de evento</th>
			</tr>
		</thead>
		<tbody>
			@foreach($reservaciones as $evt)
				<tr>
					<td>{{$evt['nombre']}}</td>
					
					<td>
						@if(isset($evt->cliente_id))
							{{$evt->cliente()->get()->first()->nombre}}
						@endif
					</td>
					
					<td>
						@foreach($evt->salones()->get() as $sl)
								{{$sl->nombre}}
						@endforeach
					</td>
					
					<td>
						@if(isset($evt['fecha_inicio']) && isset($evt['fecha_final']))
							{{$evt['fecha_inicio']}}  a  {{$evt['fecha_final']}}
						@elseif(isset($evt['fecha_inicio']) && isset($evt['fecha_final'])==null)
							{{$evt['fecha_inicio']}}
						@endif	
					</td>
					
					<td>{{$evt['titulo']}}</td>
					
					<td>
						@if($evt['estado']===0)
							Pendiente
						@else
							Realizado
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>