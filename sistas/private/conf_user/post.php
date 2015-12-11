<?php

	/*
	 * NOTAS PENDIENTES:
	 * 					1. Hay que agregar la funcion para generar el codigo de barras y meter el arreglo dentro 
	 * 						de la variable asignada $BC.
	 * 					2. Generar el Usuario segun la sesion, revisar sesion de usuario , se necesita formulario para 
	 * 						dich accion.
	 */

	include_once ("index.php");	
		
	//	Campos
	$u		= $_REQUEST ['u'];
	$p		= $_REQUEST ['p'];
	$n		= $_REQUEST ['n'];
	
	$p 		= md5($p);
	
	/*
	 * Verificar si el usuario esta activo  
	 */
	 
	 $sqlVer=mysql_query("Select idUsuario from  tasauth where idUsuario='$u'",$conn) or die (mysql_errno());
	 
	 $s=mysql_num_rows($sqlVer);
	 
	 if ($s>0){
		//Actualizar
		mysql_query("UPDATE tasauth set idPass='$p',idTipo='$n' where idUsuario='$u'",$conn) or die (mysql_errno());
	} else {
		
		mysql_query("INSERT INTO tasauth (idUsuario,idPass,idTipo,Activo )VALUE('$u','$p', '$n', '1')",$conn) or die (mysql_errno());
	}

		header('location: ../../index.php');
?> 