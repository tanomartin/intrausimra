<? session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: http://www.usimra.com.ar/intranet/logintranet.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Confimaci&oacute;n de envio</title>

<style type="text/css">
<!--
.Estilo3 {	font-family: Papyrus;
	font-weight: bold;
	color: #999999;
}
body {
	background-color: #E2DDB8;
}
-->
</style>
</head>

<body onUnload="logout.php">
<form id="form1" name="form1" method="post" action="menu.php">
<p align="center" class="Estilo3">SISTEMA DE CONSULTA PARA DELEGACIONES</p>
<p align="center"><img src="LOGOFINAL.jpg" width="342" height="342" /></p>
<div align="center">
  <p><span class="Estilo3">Su consulta ha sido enviada con exito.  </span></p>
</div>
<p align="center"><b><font face="Verdana" size="2">
  <input name="back" type="submit" id="back" value="VOLVER" />
</font></b></p>
</form>
</body>
</html>
