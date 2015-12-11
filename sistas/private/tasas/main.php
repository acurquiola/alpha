  <?php 
	include_once('index.php'); 
?>


<html>

   <head>
 <script>
window.onload=function(){
setInterval('h()',10);
document.getElementById('codigo').focus();
}
</script>

   </head>
<body>

	<!-- Colocar aqui el mensaje de login error -->
	<div id="MensajeLog"></div>
	
	<!-- Formulario -->
	<div id="Form">
	
		<!-- lOGIN -->
		<form action="private/tasas/post.php" method="post" name="form" >
		
			<!-- Fecha -->
		  <div>
				<label></label>
		  </div>
			
				<!-- Tipo Tasa -->
		  <div>
				<label>Codigo: </label>
							  	
				<input id="codigo" name="c" type="text" size="24" maxlength="23" />

	  	  </div>
		   <div>
				<label> </label>			  	
				
				<input type="hidden" name="f" value="<?= date ("d/m/Y")?>" style="width:80px" />

	  	  </div>	
		  
			<!-- Nombre Tasa --><!-- Monto -->
            <!-- Cancelado -->
<label></label>
	  	  <!-- Botones de Accion -->			
			<div class="inputBtn">
				<input type="submit" name="bConsulta" value="Enviar" class="pointer"/>
	
				<input type="button" name="bCancelar" value="Cancelar" class="pointer"/>
			</div>
		
		</form>
		
	</div>

</body>
</html>
	