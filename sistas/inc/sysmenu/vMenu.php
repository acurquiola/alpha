<?php session_start(); ?>
<!-- MENU VERTICAL CON DESPLAZAMIENTO DE NIVELES -->

	<!-- Caja que identifica al usuario-->
	<div id="UsuarioID">
		<h3 class="header">Usuario</h3>
		
		<label>Usuario:</label><span class="rojo"><?php print $_SESSION["auth_nom"] ?></span>
		<br/>
		<label>Nivel:</label><span class="rojo"><?php print $_SESSION["auth_tipo"] ?></span>
		<br/>
		<a href="private/login/out.php"> Cerrar Sesi&oacute;n</a>	</div>
	
	<!-- Menu de Navegacion -->
	<div id="navMenu">
		<ul> 
	  	  <div> Menu de Sistema</div> 
		  <?php if ($_SESSION["auth_tipo"]<>'venta'){ ?>
		  <li><a href="#">Configuraciones <strong>&raquo;</strong></a> 
		    <ul> 
		      <li><?php aJax ('Configurar Tipos de Tasa', 'Venta de Tasas', 'Formularios', 'private/conf_tasas/main.php', '', '') ?></li> 
		      <li><?php aJax ('Usuarios del Sistema', '', 'Formularios', 'private/conf_user/main.php', '', '') ?></a></li> 
		    </ul> 
		  </li> 
		  <li><a href="#">Servicios <strong>&raquo;</strong></a> 
		    <ul> 
		      <li><?php aJax ('Imprimir', 'Imprimir Tasas', 'Formularios', 'private/conf_tasas/main.php', '', '') ?></li> 
		      <li><?php aJax ('Verificar', 'Verificaci&oacute;n de Tasas', 'Formularios', 'private/tasas/main.php', '', '') ?></li> 
	        </ul> 
		  </li> 
		   <li><a href="#">Reportes <strong>&raquo;</strong></a> 
		    <ul> 
		      <li><?php aJax ('Tasas Conciliadas', 'Cuadre de Caja', 'Formularios', 'reportes/repccaja.php', '', '') ?></li> 
		      <li><?php aJax ('Tasas Emitidas (Detallado)', 'Emision de Tasas', 'Formularios', 'reportes/repctasa.php', '', '') ?></li> 
		    <li><?php aJax ('Tasas Emitidas (Series)', 'Series Emitidas', 'Formularios', 'reportes/reprseries.php', '', '') ?></li>
			</ul> 
		  </li> 
		  	  <?php }?>
		</ul> 
	</div>
	
