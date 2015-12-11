<?PHP
//******************************************************************
// Para utilizar la cadena de coneccion correcta quitar 
// el simbnolo de comentario.
//*******************************************************************
//
//servidor de prueba
	$servidor = "localhost";
	$usuario = "root";
	//$clave = "bdmrgncs";
	$clave = "root";
	$bd = "systas";
	
$conn = mysql_connect("localhost", "root") or $conn = mysql_connect("localhost", "root", "root");
			mysql_select_db($bd, $conn); //seleccionar la base de datos

?>
