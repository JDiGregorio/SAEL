<!-- tabla -->

 <div @include('crud::inc.field_wrapper_attributes')>
	<label>{!! $field['label'] !!}</label>
	<?php
		
		$avaluos = App\Models\Equipo::where([['salon_id',"=",$id]])->get(); 
		$cont = count($avaluos);
		$l = 0;
	?>
	
	<div class="div1 col-md-12">
		<table id="{{ $field['name'] }}-table" class="table table-striped">
			<thead> 
				<tr>
					<th class="col-xs-2">Salones</th>
					
				</tr>
			</thead>
			<tbody>
			@if ($cont > 0)
				@foreach( $avaluos as $ava)
							<tr>
								<td><a href="/admin/equipo/{{ $ava->id }}/edit">{{$ava->salon()->get()->nombre}}</a></td>
									
								
							</tr>
				@endforeach
			@else
				@for ($i = 0; $i < 4; $i++)
					<tr>	
						@if($i === 0)
								<td colspan="4">
									<span>No hay Avaluos para este inmueble</span> 
								</td>
						@else
								<td colspan="4">&nbsp;</td>
						@endif
					</tr>
				@endfor
			@endif
    
			</tbody>
		</table>
	</div>


     {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
</div>

{{-- ########################################## --}}
{{-- Extra CSS and JS for this particular field --}}
{{-- If a field type is shown multiple times on a form, the CSS and JS will only be loaded once --}}
@if ($crud->checkIfFieldIsFirstOfItsType($field, $fields))

	{{-- FIELD CSS - will be loaded in the after_styles section --}}
	@push('crud_fields_styles')
	<!-- include table css-->	
		
		<style>	
		
			.div1 {
				padding-top: 0px;
				padding-right: 0px;
				padding-bottom: 0px;
				padding-left: 0px;
			
				border-bottom: 1px solid #ddd;
				border-left: 1px solid #ddd;
				border-right: 1px solid #ddd;
			}
			
			.table {
				width: 100%;
				max-width: 100%;
				margin-bottom: 5px;
			}
			
			.table>tbody>tr>th,
			.table>tfoot>tr>th,
			.table>tbody>tr>td,
			.table>tfoot>tr>td {
				padding-top: 2px;
				padding-bottom: 2px;
				padding-left: 8px;
				padding-right 0px;
			}
			
		</style>
	@endpush
@endif