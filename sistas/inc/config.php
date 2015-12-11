<?php
	/**
	 * Archivo de configuracion del panel s1
	 */
//	Directorio Base y Otros
	define ('DIR_BASE', $_SERVER['DOCUMENT_ROOT'].'/');
	
	
//	Indicar las rutas de los Directorios a Usar
	set_include_path( DIR_BASE . PATH_SEPARATOR . DIR_BASE . "class"
					. PATH_SEPARATOR . DIR_BASE . "public"
					. PATH_SEPARATOR . get_include_path());
					
//	Incluir Librerias Prototype

	
	
	/**
	 * Este archivo puede ser cambiado posteriormente por el manejador
	 * de rutas de preferencia
	 */	

//	LLamar a las clases
	require_once ("/func.php");	
	
?>