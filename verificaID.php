<?php session_save_path("sesiones");
session_start();
include ("conexion.php");
$datos = array_values($_POST);
$delcod = $datos[0];
$clave = $datos[1];

$sql = "select * from usuarios where delcod = '$delcod' and claves = '$clave'";
$result = mysql_query($sql,$db);
$cant = mysql_num_rows($result);
if ($cant > 0) {
	$rowUsuario = mysql_fetch_assoc($result); 
	if ($rowUsuario['acceso'] == 0) {
		$redire = 'location:actualizando.php';
	} else {
		$_SESSION['delcod'] = $delcod;
		$_SESSION['aut'] = 'pepepascual';
		$redire = 'location:menu.php';
	}
} else {
	$redire = 'location:logintranet.php?err=1';
}

header($redire);
?>
