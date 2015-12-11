<?php session_start();
	include_once('index.php'); 
	include_once('auth.php');
?>

	<!-- Colocar aqui el mensaje de login error -->
	<div id="MensajeLog"></div>
	
	<!-- Formulario -->
	<div id="Form">
	
		<!-- lOGIN -->
		<form action="private/conf_user/post.php" method="post" name="form" >
		
			<!-- Fecha -->
		  <div>
				<label></label>
		  </div>
			
				<!-- Tipo Tasa -->
		  <div>
				<label>Usuario: </label>			  	
				
				<input name="u" type="text" size="24" maxlength="23" />

	  	  </div>	
		    <div>
				<label>Contrase&ntilde;a: </label>			  	
				
				<input name="p" type="password" size="9" maxlength="8" />

	  	  </div>	
		    <div>
				<label>Nivel: </label>			  	
				
				<select name="n" style="width:170px">
					<option value="" >Tipo de Usuario</option>
					<option value="admin" >Supervisor</option>
					<option value="venta" >Ventas</option>
					<option value="rpt" >Reportes</option>
				</select>

	  	  </div>	
		  
			<!-- Nombre Tasa --><!-- Monto -->
            <!-- Cancelado -->
<label></label>
	  	  <!-- Botones de Accion -->			
			<div class="inputBtn">
				<input type="submit" name="bEnviar" value="Enviar" class="pointer"/>
	
				<input type="button" name="bCancelar" value="Cancelar" class="pointer"
						onclick="aJax('Formularios','private/conf_tasas/main.php','')" />
			</div>
		
		</form>
	</div>
