@extends('backpack::layout')

@section('head_estado')
    <section class="content-header">
      <h1>
        Estado <small>de eventos</small>
      </h1>
    </section>
@endsection

@section('tabla_estado')

	<?php
		$events = App\Models\Reservacion::select("id","nombre","cliente_id","fecha_inicio","fecha_final","estado","cantidad_personas","cantidad_mesas","cantidad_sillas","cafe","audiovisual")->where([['estado',"=",0]])->paginate(10);
		$cont = count($events);
		$est = 0;
	?>
	
	<div class="col-md-12" style="padding-top: 30px; padding-bottom: 10px;background: white;">		
		<div class="box table-responsive">
			<div class="form-group" style="padding-right:10px;padding-top:10px;padding-bottom: 30px;">
				<input type="text" class="form-control pull-right" style="width:15%;" id="search" placeholder="Buscar...">
			</div>
			<table class="table table-striped table-bordered table-hover" id="mytable">
				<thead>
					<tr>
					  <th class="col-xs-0">Imprimir</th>
					  <th class="col-xs-1">Registro de reservación</th>
					  <th class="col-xs-2">Cliente</th>
					  <th class="col-xs-1">Salones</th>
					  <th class="col-xs-2">Fechas</th>
					  <th class="col-xs-1">Estado de evento</th>
					  <th class="col-xs-1">Cantidad de personas</th>
					  <th class="col-xs-1">Servicio de M y S.</th>
					  <th class="col-xs-2">N°. Mesas</th>
					  <th class="col-xs-1">N°. Sillas</th>
					  <th class="col-xs-2">Audiovisual</th>
					  <th class="col-xs-2">Servicio de café</th>
					</tr>
				</thead>
				<tbody id="myTable">
					@if ($cont > 0)
						@foreach( $events as $evt)
									<tr>
										<td><a href="/admin/logistica-pdf/{{$evt->id}}" target="_blank" class="fa fa-file-pdf-o" style="color:red"></td>
											
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
										
										<td>
											@if($evt['estado']===0)
												Pendiente
											@else
												Realizado
											@endif
										</td>
										
										<td>
											@if(isset($evt->cantidad_personas))
												{{$evt['cantidad_personas']}}
											@endif
										</td>
											
										<td>
											@if($evt['decision']===0)
												Si
											@else
												No
											@endif
										</td>
										
										<td>
											@if($evt['cantidad_mesas']===0)
												-
											@else
												{{$evt['cantidad_mesas']}}
											@endif
										</td>
										
										<td>
											@if($evt['cantidad_sillas']===0)
												-
											@else
												{{$evt['cantidad_sillas']}}
											@endif
										</td>
										
										<td>
											@if($evt['audiovisual']===0)
												No
											@else
												Si
											@endif
										</td>
										
										<td>
											@if($evt['cafe']===0)
												No
											@else
												Si
											@endif
										</td>
									</tr>
						@endforeach
					@else
						@for ($i = 0; $i < 4; $i++)
							<tr>	
								@if($i === 0)
										<td colspan="12">
											<span>No hay eventos actualmente</span>
										</td>
								@else
										<td colspan="12">&nbsp;</td>
								@endif
							</tr>
						@endfor
					@endif
				</tbody>
			</table>
			<div class="pull-right" style="padding-right:10px;">
				{{$events->links()}}
			</div>
		</div>
	</div>
@endsection

@section('scripts_estado')
	<script type="text/javascript">
		$(document).ready(function(){
			
			$('#escalation').dataTable();
			
			$("#search").keyup(function(){
				_this = this;
				$.each($("#mytable tbody tr"), function() {
					if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
						$(this).hide();
					else
						$(this).show();
				});
			});
		});
	</script>
	<style>
		th{
			text-align: -webkit-center;
		}
		
		.table-bordered>thead>tr>th, 
		.table-bordered>tbody>tr>th, 
		.table-bordered>tfoot>tr>th, 
		.table-bordered>thead>tr>td, 
		.table-bordered>tbody>tr>td, 
		.table-bordered>tfoot>tr>td{
			vertical-align: inherit;
		}
	</style>
@endsection
