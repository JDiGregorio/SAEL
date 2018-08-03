<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

	<div style="margin:1px; width:700px;">
		<hr>
			<div id="left">
				<img src="img/logismini.png" class="img-fluid" alt="Responsive image">
			</div>
			<div id="right" >
				<img src="img/logomini.png" class="img-fluid" alt="Responsive image">
			</div>
			<h1 align="center">Logística de salón</h1>
			<h5 align="center">Sistemas Administrativo de Control de Eventos</h5>
	</div>
<hr>
<br>
<br>
@foreach($reservaciones as $reservacion)
	<ul style="list-style-type:none">
		<li class="list-group-item">Registro reservación: {{$reservacion['nombre']}}</li>
		
		<li class="list-group-item">
			Cliente: @if(isset($reservacion->cliente_id))
				{{$reservacion->cliente()->get()->first()->nombre}}
			@endif
		</li>
		
		<li class="list-group-item">
			Salones: @foreach($reservacion->salones()->get() as $sl)
								{{$sl->nombre}}
						@endforeach
		</li>
		
		<li class="list-group-item">
			Fechas: @if(isset($reservacion['fecha_inicio']) && isset($reservacion['fecha_final']))
						{{$reservacion['fecha_inicio']}}  a  {{$reservacion['fecha_final']}}
					@elseif(isset($reservacion['fecha_inicio']) && isset($reservacion['fecha_final'])==null)
						{{$reservacion['fecha_inicio']}}
					@endif
		</li>
		
		<li class="list-group-item">
			Cantidad de personas que asistiran: @if(isset($reservacion->cantidad_personas))
												{{$reservacion['cantidad_personas']}}
											@endif
		</li>
		
		<li class="list-group-item">
			Servicio de Mesas y Sillas: @if($reservacion['decision']===0)
											Si
										@else
											No
										@endif
		</li>
		
		<li class="list-group-item">
			Cantidad de mesas: @if($reservacion['cantidad_mesas']===0)
									-
								@else
									{{$reservacion['cantidad_mesas']}}
								@endif
		</li>
		
		<li class="list-group-item">
			Cantidad de sillas: @if($reservacion['cantidad_sillas']===0)
									-
								@else
									{{$reservacion['cantidad_sillas']}}
								@endif
		</li>
		
		<li class="list-group-item">
			Audiovisual: @if($reservacion['audiovisual']===0)
							No
						@else
							Si
						@endif
		</li>
		
		<li class="list-group-item">
			Servicio de café: @if($reservacion['cafe']===0)
								No
							@else
								Si
							@endif
		</li>
	</ul>
@endforeach
<br>
<br>
<hr>
<br>
@foreach($reservaciones as $reserva)
	<h4>Detalle de logística:</h4>
	<p>{{$reserva['observacion_2']}}</p>
@endforeach