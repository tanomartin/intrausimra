<?php session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: logintranet.php?err=2");

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$atelefono = $_POST["telefono"];
$coment = $_POST["coment"];

$cuerpo = "Formulario enviado por delegación nro: ".$_SESSION['delcod']."\n";
$cuerpo .= "Nombre: ".$nombre."\n";
$cuerpo .= "Email: ".$email."\n";
$cuerpo .= "Telefono: ".$atelefono."\n";
$cuerpo .= "Comentarios: ".$coment."\n";
	
$header ='From: '.$email."\r\n".'Reply-To:'.$email."\r\n".'X-Mailer: PHP/'.phpversion();
//mando el correo...
$mymail='intranet@usimra.com.ar';
$subject="Formulario recibido";
mail($mymail, $subject, utf8_decode($cuerpo), $header);
header ("Location: envio_consulta.php");
?>