<?php session_save_path("sesiones");
session_start();
include ("conexion.php");
$sql = "select * from usuarios where delcod = '".$_POST['usuario']."' and claves = '".$_POST['pass']."'";
$result = mysql_query($sql,$db);
$cant = mysql_num_rows($result);
if ($cant > 0) {
	$_SESSION['delcod'] = $_POST['usuario'];
}
echo $cant;
?>
