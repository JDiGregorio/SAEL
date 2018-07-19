@if(Auth::check())
		<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> <span>inicio</span></a></li>
		
	@role('Administrador')
		<li class="treeview">
			<a href="#"><i class="fa fa-group"></i> <span>Gestión usuarios</span> <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
			  <li><a href="{{ backpack_url('user') }}"><i class="fa fa-user"></i> <span>Usuarios</span></a></li>
			  <li><a href="{{ backpack_url('role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
			  <li><a href="{{ backpack_url('permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
			</ul>
		  </li>
	@endrole
	
	@hasAnyRole(Role::all())
		<li><a href="{{ backpack_url('cliente') }}"><i class="fa fa-male" aria-hidden="true"></i> <span>Clientes</span></a></li>

		<li class="treeview">
			<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <span>Eventos</span> <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="{{ backpack_url('reservacion') }}"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <span>Alquiler y Reservación</span></a></li>
				<li><a href="{{ backpack_url('') }}"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> <span>Estados</span></a></li>
			</ul>
		</li>
	
	
		<li class="treeview">
			<a href="#"><i class="fa fa-cogs" aria-hidden="true"></i> <span>Logística</span> <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
				@role('Administrador')
					<li> <a href="{{  backpack_url('salon') }}"><i class="fa fa-university" aria-hidden="true"></i><span>Salones</span></a></li>
				@endrole
					<li><a href="{{ backpack_url('equipo-de-salon') }}"><i class="fa fa-plus-square" aria-hidden="true"></i> <span>Equipo de Salón</span></a></li>
				@role('Administrador')
					<li><a href="{{ backpack_url('evento') }}"><i class="fa fa-list"></i> <span>Categorías de eventos</span></a></li>
				@endrole
				</ul>
		</li>
	
		<li class="treeview">
			<a href="#"><i class="fa fa-list-alt" aria-hidden="true"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="{{backpack_url('pdf_usuario') }}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <span>Reporte de usuarios</span></a></li>
					<li><a href="{{backpack_url('pdf_cliente') }}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <span>Reporte de clientes</span></a></li>
					<li><a href="{{backpack_url('pdf_AR') }}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <span>Reporte Alquiler y/o Reservación</span></a></li>
					<li><a href="{{backpack_url('pdf_estado') }}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <span>Reporte estado de salones</span></a></li>
				</ul>
		</li>
	
		@role('Administrador')
			<li class="header">CONFIGURACIÓN</li>
			<li class="treeview">
				<a href="#"><i class="fa fa-cog" aria-hidden="true"></i> <span>Configuración</span> <i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="{{ backpack_url('departamento') }}"><i class="fa fa-globe" aria-hidden="true"></i> <span>Departamentos</span></a></li>
						<li><a href="{{ backpack_url('ciudad') }}"><i class="fa fa-globe" aria-hidden="true"></i> <span>Ciudades</span></a></li>
						<li><a href="{{backpack_url('page') }}"><i class="fa fa-file-o"></i> <span>Páginas</span></a></li>
						<li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/menu-item') }}"><i class="fa fa-list"></i> <span>Menú</span></a></li>
					</ul>
			</li>
		
			<li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/backup') }}"><i class="fa fa-hdd-o"></i> <span>Backups</span></a></li>
		@endrole
	@endhasAnyRole	

		<li class="header">{{ trans('backpack::base.user') }}</li>
		<li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>
@endif
