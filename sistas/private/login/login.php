<?php session_start();
	include_once('index.php'); 
	include_once('auth.php');
?>

	<!-- Colocar aqui el mensaje de login error -->
	<div id="MensajeLog"></div>
	
	<!-- Formulario -->
	<div id="Form">
	
		<!-- lOGIN -->
		<form action="private/login/auth.php" method="post" name="form" >
			
			<!-- USUARIO -->
			<div>
				<label>Usuario: </label>	
		  		<input type="text" name="u" value="" size="25" maxlength="40"/>
		  	</div>
		  	
		  	<!-- CLAVE -->
		  	<div>
				<label>Contrase&ntilde;a: </label>	
		  		<input type="password" name="p" value="" size="25" maxlength="40"/>
		  	</div>
			
		  	<!-- Botones de Accion -->			
			<div class="inputBtn">
				<input type="button" name="bConsulta" value="Consultar" class="pointer"
						onclick="aJax ('Content','private/login/login.php','u='+document.form.u.value+'&p='+document.form.p.value)" />
	
				<input type="button" name="bCancelar" value="Cancelar" class="pointer"
						onclick="aJax('Content','private/login/login.php','')" />
			</div>
		
		</form>
	</div>
