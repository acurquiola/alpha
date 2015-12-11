<?php session_start();

	//variables
	$num = 0;
	
	if ($_SESSION["auth"]=="SI"){
		//	Redireccionamos al punto de acceso al recargar la pagina
		echo '<script> aJax(\'Content\', \'private/inicio/form.php\', \'\', \'\')</script>'; 
		//echo '<script>parent.location.href = \'index.php\'<\/script>';
	}

	
	if (isset($_REQUEST['u'])) {
		
		$_SESSION['auth'] == 'NO';	
		
		$u = $_REQUEST['u'];
		$p = $_REQUEST['p'];
		$p = md5($p);
		// print $p;
		
		if ($p != ''){
			/**
			 * Consultar el usuario 
			 */

			$auth = ("SELECT * FROM tasauth WHERE idUsuario ='$u' and idPass ='$p'");
			$r_auth = @mysql_query($auth, $conn) ;
			$total = mysql_num_rows ($r_auth);
			
			if ($total <= 0){	
			 	$error = "<div id=\"FormError\"><p>No Se encontraron resultados. Porfavor Intente nuevamente.<p></div>";
			 	print $error;
			} else {
				$_SESSION["auth"]= "SI";
				$_SESSION["auth_nom"]= @mysql_result($r_auth, 0, 'idUsuario');
				$_SESSION["auth_tipo"]= @mysql_result($r_auth, 0, 'idTipo');
				header ('location: ../inicio/form.php ');
			}
				
		}
	}	
?>
