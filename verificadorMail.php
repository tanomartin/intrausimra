<?php
$mail = $_POST ['email'];
$nrpresta = $_POST ['usuario'];

include ("conexion.php");
$sql = "select * from usuarios where delcod = '$delcod' and emails = '$mail'";
$result = mysql_query($sql,$db);
$cant = mysql_num_rows($result);
if ($cant > 0) {
	$row=mysql_fetch_array($result);
	$asunto = "Recordatorio de Contraseña del sitio www.usimra.com.ar";
	$mensaje = $row['nombre'].": " . "\r\n";
	$mensaje .= "La contraseña requerida del usuario ".$delcod." es ".$row['claves']." .";
	$cabeceras = "MIME-Version: 1.0" . "\r\n";
	$cabeceras .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
	$cabeceras .= "From: U.S.I.M.R.A. <no-replay@usimra.com.ar>" . "\r\n";
	$cabeceras .= 'Bcc: intranet@usimra.com.ar' . "\r\n";
	mail($mail, $asunto, $mensaje, $cabeceras);
} 
echo $cant;
?>


