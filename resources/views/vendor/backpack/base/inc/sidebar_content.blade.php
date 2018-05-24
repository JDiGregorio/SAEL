
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>inicio</span></a></li>


<li class="treeview">
              <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <span>Eventos</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li> <a href="{{  backpack_url('salon') }}"><i class="fa fa-university" aria-hidden="true"></i><span>salones</span></a></li>
                <li><a href="{{ backpack_url('icon') }}"><i class="fa fa-font-awesome"></i> <span>Reservación</span></a></li>
                <li><a href="{{ backpack_url('product') }}"><i class="fa fa-shopping-cart"></i> <span>Estados</span></a></li>
              </ul>
          </li>

<!--<li> <a href="{{  backpack_url('example 1') }}"><i class="fa fa-files-o"></i> <span>salones</span></a></li>-->
<!--<li> <a href="{{  backpack_url('example 2') }}"><i class="fa fa-files-o"></i> <span>salones</span></a></li>-->
<!--<li><a href="{{ backpack_url('example 3')."/command" }}"><i class="fa fa-bullhorn"></i> <span>comandos</span></a></li>-->

<li><a href="{{backpack_url('page') }}"><i class="fa fa-file-o"></i> <span>Pages</span></a></li>
<li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/menu-item') }}"><i class="fa fa-list"></i> <span>Menu</span></a></li>

<li class="treeview">
    <a href="#"><i class="fa fa-newspaper-o"></i> <span>Noticias</span> <i class="fa fa-angle-left pull-right"></i></a>
		<ul class="treeview-menu">
            <li><a href="{{ backpack_url('article') }}"><i class="fa fa-newspaper-o"></i> <span>Articulos</span></a></li>
            <li><a href="{{ backpack_url('category') }}"><i class="fa fa-list"></i> <span>Categorias</span></a></li>
            <li><a href="{{ backpack_url('tag') }}"><i class="fa fa-tag"></i> <span>Etiquetas</span></a></li>
        </ul>
</li>

		