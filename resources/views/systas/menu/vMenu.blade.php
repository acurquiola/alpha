
	<!-- Menu de Navegacion -->
	<div id="navMenu">
		<ul> 
	  	  <div> Menu de Sistema</div> 

		  <li><a href="#">Configuraciones <strong>&raquo;</strong></a> 
		    <ul> 
		      <li><?php aJax ('Configurar Tipos de Tasa', 'Venta de Tasas', 'Formularios', 'private/conf_tasas/main.php', '', '') ?></li> 
		      <li><?php aJax ('Usuarios del Sistema', '', 'Formularios', 'private/conf_user/main.php', '', '') ?></li>
		    </ul> 
		  </li> 
		  <li><a href="#">Servicios <strong>&raquo;</strong></a> 
		    <ul> 
		      <li><?php aJax ('Imprimir', 'Imprimir Tasas', 'Formularios', 'systas/conf_tasas/main.php', '', '') ?></li>
		      <li><?php aJax ('Verificar', 'Verificaci&oacute;n de Tasas', 'Formularios', 'systas/tasas/main.php', '', '') ?></li>
	        </ul> 
		  </li> 
		   <li><a href="#">Reportes <strong>&raquo;</strong></a> 
		    <ul> 
		      <li><?php aJax ('Tasas Conciliadas', 'Cuadre de Caja', 'Formularios', 'reportes/repccaja.php', '', '') ?></li> 
		      <li><?php aJax ('Tasas Emitidas (Detallado)', 'Emision de Tasas', 'Formularios', 'reportes/repctasa.php', '', '') ?></li> 
		    <li><?php aJax ('Tasas Emitidas (Series)', 'Series Emitidas', 'Formularios', 'reportes/reprseries.php', '', '') ?></li>
			</ul> 
		  </li> 

		</ul> 
	</div>
	
@section('script')
    @parent
    <script src="{{ asset('/js/systas/ajax.js') }}"></script>
@endsection