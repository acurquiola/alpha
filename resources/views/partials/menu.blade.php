
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="{{asset('imgs/user-icon.png')}}" class="img-circle" alt="" />
			</div>
			<div class="pull-left info">
				<p>{{$userName}}</p>
				{{session('aeropuerto')->siglas}}
			</div>
		</div>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
<li class="header">MENÚ</li>		
<!--	<li class="header">ADMINISTRADOR</li>
			<li>
				<a href="">
					<i class="ion-settings"></i>
					<span> Configuración del Sistema</span>
				</a>
			</li>
			<li >
				<a href="">
					<i class="ion ion-compass"></i>
					<span> Historial</span>
				</a>
			</li>
		-->




         <li class="treeview {{ (\Request::is('systas/*'))?"active":"" }}">
            <a href="{{ URL::to('systas/inicio') }}"><i class="fa  fa-plane"></i> Systas</a>
            <ul class="treeview-menu">
                <li class="header">Configuraciones</li>

                <li {{ (\Request::is('systas/configurar*'))?"class=active":"" }}><a href="{{ URL::to('systas/configurar') }}"><i class="fa fa-paper-plane"></i> Configurar Tipos de Tasa</a></li>

                <li class="header">Servicios</li>

                <li {{ (\Request::is('systas/imprimir*'))?"class=active":"" }}><a href="{{ URL::to('systas/imprimir') }}"><i class="fa fa-road"></i> Imprimir</a></li>

                <li {{ (\Request::is('systas/verificar*'))?"class=active":"" }}><a href="{{ URL::to('systas/verificar') }}"><i class="glyphicon glyphicon-user"></i> Verificar</a></li>

                <li class="header">Reportes</li>

                <li {{ (\Request::is('systas/reportes/repccaja*'))?"class=active":"" }}><a href="{{ URL::to('systas/reporte/repccaja') }}"><i class="glyphicon glyphicon-home"></i> Tasas Conciliadas</a></li>

                <li {{ (\Request::is('systas/reportes/repctasa*'))?"class=active":"" }}><a href="{{ URL::to('systas/reporte/repctasa') }}"><i class="fa fa-plane"></i> Tasas Emitidas (Detallado)</a></li>

                <li {{ (\Request::is('systas/reportes/reprseries*'))?"class=active":"" }}><a href="{{ URL::to('systas/reporte/reprseries') }}"><i class="fa fa-plane"></i> Tasas Emitidas (Series)</a></li>

            </ul>
         </li>



		@permission('menu.modeloaeronave|menu.puerto|menu.piloto|menu.hangar|menu.aeronave')
		<li class="treeview {{ (\Request::is('maestros*'))?"active":""}}">
			<a href="#">
				<i class="fa fa-cube"></i> <span>Gestor de Maestros</span> <i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				@permission('menu.modeloaeronave|menu.puerto|menu.piloto|menu.piloto|menu.aeronave')
				<li class="header">GENERAL</li>
				@endpermission
				@permission('menu.modeloaeronave')
				<li {{ (\Request::is('maestros/modelosAeronaves*'))?"class=active":"" }}><a href="{{ URL::to('maestros/modelosAeronaves') }}"><i class="fa fa-paper-plane"></i> Modelos de Aeronaves</a></li>
				@endpermission
				@permission('menu.puerto')
				<li {{ (\Request::is('maestros/puertos*'))?"class=active":"" }}><a href="{{ URL::to('maestros/puertos') }}"><i class="fa fa-road"></i> Puertos</a></li>
				@endpermission
				@permission('menu.piloto')
				<li {{ (\Request::is('maestros/pilotos*'))?"class=active":"" }}><a href="{{ URL::to('maestros/pilotos') }}"><i class="glyphicon glyphicon-user"></i> Pilotos</a></li>
				@endpermission
				@permission('menu.hangar')
				<li {{ (\Request::is('maestros/hangares*'))?"class=active":"" }}><a href="{{ URL::to('maestros/hangares') }}"><i class="glyphicon glyphicon-home"></i> Hangares</a></li>
				@endpermission
				@permission('menu.aeronave')
				<li {{ (\Request::is('maestros/aeronaves*'))?"class=active":"" }}><a href="{{ URL::to('maestros/aeronaves') }}"><i class="fa fa-plane"></i> Aeronaves</a></li>
				@endpermission
			</ul>
		</li>
		@endpermission

		@permission('menu.aterrizaje|menu.despegue|menu.carga')
		<li class="treeview {{ (\Request::is('operaciones*'))?"active":""}}">
			<a href="#">
				<i class="fa fa-cubes"></i> <span>Gestor de Operaciones</span> <i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				@permission('menu.aterrizaje|menu.despegue|menu.carga')
				@endpermission
				@permission('menu.aterrizaje')
				<li {{ (\Request::is('operaciones/Aterrizajes*'))?"class=active":"" }}><a href="{{ URL::to('operaciones/Aterrizajes') }}"><i class="fa fa-fighter-jet"></i> Aterrizajes</a></li>
				@endpermission
				@permission('menu.despegue')
				<li {{ (\Request::is('operaciones/*/Despegues*'))?"class=active":"" }}><a href="{{action('DespegueController@index')}}"><i class="fa fa-plane"></i> Despegues</a></li>
				@endpermission
				@permission('menu.carga')
				<li {{ (\Request::is('operaciones/Cargas*'))?"class=active":"" }}><a href="{{ URL::to('operaciones/Cargas') }}"><i class="fa fa-truck"></i> Cargas</a></li>
				@endpermission
			</ul>
		</li>
		@endpermission
	<!--		<li class="treeview">
				<a href="#">
					<i class="fa fa-road"></i>
					<span>Gestor de Operaciones</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li class="header">ATERRIZAJES</li>
					<li>
						<a href="" ><i class="fa fa-circle-o"></i> Registrar</a>
					</li>
					<li>
						<a href="" ><i class="fa fa-circle-o"></i> Consultar pendientes</a>
					</li>
					<li class="header">DESPEGUES</li>
					<li>
						<a href=""><i class="fa fa-circle-o"></i> Consultar</a>
					</li>
					<li class="header">CARGA</li>
					<li>
						<a href=""><i class="fa fa-circle-o"></i> Registrar</a>
					</li>
					<li>
						<a href=""><i class="fa fa-circle-o"></i> Consultar</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="">
					<i class="ion ion-clipboard"> </i>
					<span>  Proyecciones</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-file-text-o"></i>
					<span> Dosas</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-pie-chart"></i> <span>Reportes</span>
				</a>
			</li> -->

			           <li class="treeview {{ (\Request::is('estacionamiento*'))?"active":""}}">
                <a href="#">
                  <i class="fa fa-share"></i> <span>Taquillas</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-plane"></i><span> Tasas</span><i class="fa fa-angle-left pull-right"></i>
                  </a>

                    <ul class="treeview-menu">
                  <li><a href="{{ URL::to('tasas/taquilla') }}"><i class="fa fa-users"></i> Operador</a></li>
                  <li><a href="{{ URL::to('tasas/supervisor') }}"><i class="fa fa-user"></i> Supervisor</a></li>
                    </ul>


                  </li>
                  <li class="{{ (\Request::is('estacionamiento*'))?"active":""}}"><a href="{{ URL::to('estacionamiento') }}"><i class="fa  fa-tachometer"></i> Estacionamiento</a></li>

                </ul>
            </li>
			@permission('menu.contrato|menu.factura|menu.cobranza|menu.cliente|menu.role|menu.usuario|menu.modulo|menu.concepto')
			

            @permission('menu.contrato|menu.factura|menu.cobranza')
            <li class="treeview {{ (\Request::is('contrato*') or \Request::is('factura*') or \Request::is('cobro*'))?"active":""}}">
            	<a href="#">
            		<i class="fa fa-money"></i> <span>Recaudación</span> <i class="fa fa-angle-left pull-right"></i>
            	</a>
            	<ul class="treeview-menu">
            		@permission('menu.contrato')
            		<li {{ (\Request::is('contrato*'))?"class=active":"" }}><a href="{{ URL::to('contrato') }}"><i class="fa fa-files-o"></i> Contratos</a></li>
            		@endpermission
            		@permission('menu.factura')
            		<li {{ (\Request::is('factura*'))?"class=active":"" }}><a href="{{ URL::to('facturacion/Todos/main') }}"><i class="fa fa-folder"></i> Facturación</a></li>
            		@endpermission
            		@permission('menu.cobranza')
            		<li {{ (\Request::is('cobranza*'))?"class=active":"" }}><a href="{{ URL::to('cobranza/Todos/main') }}"><i class="fa fa-folder-o"></i> Cobranza</a></li>
            		@endpermission
            	</ul>
            </li>
            @endpermission
 <!--            <li class="treeview">
                <a href="#">
                  <i class="fa fa-circle-o"></i> <span>Simulación</span>  <i class="fa fa-angle-left pull-right"></i>
                </a>
               <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-folder-o"></i> Proyección de cobranza</a></li>
                  <li><a href="#"><i class="fa fa-folder-o"></i> Estimación de metas</a></li>
                    </ul>
              </li>-->
            <li class="treeview">
                <a href="#">
                  <i class="fa fa-signal"></i> <span>Reportes</span>  <i class="fa fa-angle-left pull-right"></i>
                </a>
                                                    <ul class="treeview-menu">
                  <li><a href="{{action('ReporteController@getReporteMensual')}}"><i class="fa fa-folder-o"></i> Recaudación consolidada</a></li>
                  <li><a href="{{action('ReporteController@getReporteModuloMetaMensual')}}"><i class="fa fa-folder-o"></i> Libro de ventas</a></li>
                  <li><a href="{{action('ReporteController@getReporterFacturadoCobradoMensual')}}"><i class="fa fa-folder-o"></i> Relación cuentas por cobrar</a></li>
                  <li><a href="{{action('ReporteController@getReporteDES900')}}"><i class="fa fa-folder-o"></i> DES 900</a></li>
                  <li><a href="#"><i class="fa fa-folder-o"></i> Relación facturado/cobrado</a></li>
                  <li><a href="#"><i class="fa fa-folder-o"></i> Relación de contratos</a></li>
                                    <li><a href="#"><i class="fa fa-folder-o"></i> Listado facturas emitidas</a></li>
                    </ul>
              </li>


          @permission('menu.cliente|menu.role|menu.usuario|menu.modulo|menu.concepto'|'menu.preciosSCV')
          <li class="treeview {{ (\Request::is('administracion*'))?"active":""}}">
          	<a href="#">
          		<i class="fa fa-cogs"></i> <span>Administración</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
          	<ul class="treeview-menu">
          		<li {{ (\Request::is('administracion/informacion*'))?"class=active":"" }}><a href="{{ URL::to('administracion/informacion') }}"><i class="fa fa-info-circle"></i> Información</a></li>

          		@permission('menu.cliente')
          		<li {{ (\Request::is('administracion/cliente*'))?"class=active":"" }}><a href="{{ URL::to('administracion/cliente') }}"><i class="fa  fa-smile-o"></i> Cliente</a></li>
          		@endpermission
          		@permission('menu.role')
          		<li {{ (\Request::is('administracion/roles*'))?"class=active":"" }}><a href="{{ URL::to('administracion/roles') }}"><i class="fa fa-users"></i> Grupos de usuarios</a></li>
          		@endpermission
          		@permission('menu.usuario')
          		<li><a href="{{ URL::to('administracion/usuario') }}"><i class="fa fa-user"></i> Usuario</a></li>
          		@endpermission
                 <!-- <li><a href="{{ URL::to('tasas/impresion') }}"><i class="fa fa-print"></i> Impresión tasas</a></li>
                 <li><a href="{{ URL::to('administracion/sincronizacion') }}"><i class="fa fa-refresh"></i> Sincronización</a></li>-->
                 @permission('menu.modulo')
                 <li {{ (\Request::is('administracion/modulo*'))?"class=active":"" }}><a href="{{ URL::to('administracion/modulo') }}"><i class="fa  fa-archive"></i> Módulos</a></li>
                 @endpermission
                 @permission('menu.concepto')
                 <li {{ (\Request::is('administracion/concepto*'))?"class=active":"" }}><a href="{{ URL::to('administracion/concepto') }}"><i class="fa  fa-archive"></i> Conceptos</a></li>
                 @endpermission
                 @permission('menu.preciosSCV')
                 <li {{ (\Request::is('administracion/configuracionSCV*'))?"class=active":"" }}><a href="{{ URL::to('administracion/configuracionSCV') }}"><i class="fa  fa-plane"></i> Configuración de Cargos</a></li>
                 @endpermission
             </ul>
         </li>
         @endpermission
         @endpermission
     </ul>
 </section>
 <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
<!--           <section class="content-header">
            <h1>
              Dashboard
              <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol>
        </section> -->



        <!-- Main content -->
        <section class="content">
