@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Calendario <small>de eventos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('cal')
	<!-- Calendario -->
	<div class="estilo" id="calendarview" style="padding-left: 50px; padding-right: 50px; padding-top: 30px; background: white;"></div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function($){
				// "use strict";
				// var evt = [];
				// $.ajax({
						// url:'/reserva/get',
						// type:"GET",
						// dataType:"JSON",
						// async:false,
				// }).done(function(r) {
					// evt = r;
				// });
				
				$('#calendarview').fullCalendar({
					
					// header:{
						// center: 'title',
						// left: 'month,agendaWeek,agendaDay,listDay',
						// right: 'today prev,next',
					// },
					
					// editable: false,
					// minTime: "06:00:00",
					// maxTime: "23:00:00",
					// //hiddenDays: [],
					// monthNames:	['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
								// 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
					// monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
									 // 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
					// dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles',
							  // 'Jueves', 'Viernes', 'Sábado'],
					// dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sab'],
					
					//eventLimit: true,
					// events:evt,
					
					eventSources: [
						{
						  events: [ 
							{
							  title  : 'event1',
							  start  : '2018-07-01'
							},
							{
							  title  : 'event2',
							  start  : '2018-07-05',
							  end    : '2018-07-07'
							},
							{
							  title  : 'event3',
							  start  : '2018-07-09T11:30:00',
							}
						  ],
						  color: 'light-red',     
						  textColor: 'black'
						}
				  ]
			});
		});
	</script>
@endsection

