<?php session_start();
	include_once('index.php'); 
	include_once ('consult.php');
?>

	<!-- Colocar aqui el mensaje de login error -->
	<div id="MensajeLog"></div>
	
	<!-- Formulario -->
	<div id="Form">
	
		<!-- lOGIN -->
		<form action="private/printTasa/rpt01.php" method="post" name="form" target="_blank" >
		
			<!-- Fecha -->
		  <div>
				<label>Fecha: </label>			  	
				<input type="text" name="f" value="<?= date ("d/m/Y")?>" style="width:80px" />
	  	  </div>
			
			<!-- Serie -->
		  	<div>
				<label>Serie: </label>	
		  		<select name="s" style="width:200px; ">
					<option value="">Seleccione la Serie</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="T">Tercera Edad</option>
					<option value="I">Infante</option>
                    <option value="D">Discapacitado</option>
				</select>
		  	</div>
			
			<!-- Tipo de Tasa -->
		  <div>
				<label>Tipo de Tasa: </label>			  	
				
				
      <select name="tTasa" style="width:200px; " onchange="document.form.m.value=this.value">
        <option value="">Seleccion tipo de Tasa</option>
					<?php for ($i=0;$i<$row_tk;$i++){
					echo '<option value="'.$cmbT[$i].'">'.$cmbDesT[$i].'</option>';
						}
					?>
			</select>

	  	  </div>
		  	<!-- Monto -->
		  	<div>
				<label>Monto </label>	
		  		<input type="text" name="m" value="" size="15" maxlength="40"/> 
		  		Bs.
		  	</div>
			
			<!-- Cancelado -->
	  	  <label>Cantidad: </label>			  	
				
				<input type="text" name="cTasa" value="" size="6" maxlength="30"/> 
				
		  	<!-- Botones de Accion -->			
			<div class="inputBtn">
				<input type="submit" name="bConsulta" value="Enviar" class="pointer"/>
	
				<input type="button" name="bCancelar" value="Cancelar" class="pointer"
						onclick="aJax('Formularios','private/conf_tasas/main.php','')" />
			</div>
		
	  </form>
	</div>
 