<?php session_save_path("sesiones");
session_start();
include ("conexion.php");
$sql = "select * from usuarios where delcod = '".$_POST['usuario']."' and claves = '".$_POST['pass']."'";
$result = mysql_query($sql,$db);
$cant = mysql_num_rows($result);
if ($cant > 0) {
	$row = mysql_fetch_assoc($result);
	$_SESSION['delcod'] = $row['delcod'];
	$_SESSION['fecult'] = substr($row['fechaactualizacion'],8,2)."/".substr($row['fechaactualizacion'],5,2)."/".substr($row['fechaactualizacion'],0,4);
	$_SESSION['fecacc'] = substr($row['fecuac'],8,2)."/".substr($row['fecuac'],5,2)."/".substr($row['fecuac'],0,4)." - ".$row['horuac'];
	$_SESSION['nombre'] = $row['nombre'];
	
	$hoy = date("Ymd");
	$hora = date("H:i:s");
	$sql = "UPDATE usuarios SET fecuac= '$hoy', horuac = '$hora' where delcod = $delcod";
	$result = mysql_query($sql,$db);
}
echo $cant;
?>
