<?php
include ("conexion.php");
$datos = array_values($_POST);
$mail = $datos[0];
$delcod = $datos[1];

$sql = "select * from usuarios where delcod = '$delcod' and emails = '$mail'";
print($sql);
$result = mysql_query($sql,$db);
$cant = mysql_num_rows($result);

if ($cant > 0) {
	$row=mysql_fetch_array($result);
	$asunto = "Recordatorio de Contrase�a del sitio www.usimra.com.ar";
	
	// mensaje
	$mensaje = $row['nombre'].": " . "\r\n";
	$mensaje .= "La contrase�a requerida del usuario ".$delcod." es ".$row['claves']." .";
	
	// Para enviar correo HTML, la cabecera Content-type debe definirse
	$cabeceras = "MIME-Version: 1.0" . "\r\n";
	$cabeceras .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
	
	// Cabeceras adicionales
	//$cabeceras .= $mail. "\r\n";
	$cabeceras .= "From: U.S.I.M.R.A. <no-replay@usimra.com.ar>" . "\r\n";
	$cabeceras .= 'Bcc: intranet@usimra.com.ar' . "\r\n";
	//$cabeceras .= 'Bcc: chequeo@example.com' . "\r\n";
	
	// Enviarlo
	mail($mail, $asunto, $mensaje, $cabeceras);
	header ('location:claveEnviada.php');
} else {
	header ('location:olvido.php?err=1');
}
?>

