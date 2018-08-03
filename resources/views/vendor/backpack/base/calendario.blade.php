@extends('backpack::layout')

@section('head')
    <section class="content-header">
      <h1>
        Calendario <small>de eventos</small>
      </h1>
    </section>
@endsection

@section('calendario')
	<!-- Calendario -->
	<div id="calendarview" style="padding-left: 50px; padding-right: 50px; padding-top: 30px; padding-bottom: 50px; background: white;"></div>
@endsection

@section('scripts')

	<?php
		$events = App\Models\Reservacion::select("id","titulo","fecha_inicio","fecha_final","color")->get();
	?>

	<script type="text/javascript">
		$(document).ready(function($){	
		
			$('#calendarview').fullCalendar({
				
				header:{
					center: 'title',
					left: 'month,agendaWeek,agendaDay,listDay',
					right: 'today prev,next',
				},
				
				height: 750,				
				editable: false,
				eventTextColor: '#000000',
				minTime: "06:00:00",
				maxTime: "23:00:00",
				
				monthNames:	['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
							'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
								 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
				dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles',
						   'Jueves', 'Viernes', 'Sábado'],
				dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sab'],
				
				eventLimit: true,
				
				events: [
					<?php
						foreach($events as $evt){
					?>		{
								id:"<?php echo $evt["id"];?>",
								title:"<?php echo $evt["titulo"];?>",
								start:"<?php echo $evt["fecha_inicio"];?>",
								end:"<?php echo $evt["fecha_final"];?>",
								color:"<?php echo $evt["color"];?>",
							},
					<?php
						}
					?>
				],
				
				eventRender: function (event, element, view) {
                    $(element).css("font-weight", "bold");
				},
			});
		});
	</script>
@endsection