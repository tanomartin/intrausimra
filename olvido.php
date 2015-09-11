<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Recordatorio Contrase&ntilde;a</title>
<style type="text/css">
<!--
.Estilo3 {
	font-family: Papyrus;
	font-weight: bold;
	color: #000000;
	font-size:20px;
}
body {
	background-color: #E2DDB8;
}
.Estilo4 {font-size: 16px}
-->
</style>
</head>

<body>
<p align="center" class="Estilo3">SISTEMA DE CONSULTA PARA DELEGACIONES</p>
<p align="center" class="Estilo3"><img src="LOGOFINAL.jpg" width="342" height="342" /></p>
<div align="center" style="margin:10px"><input name="back" type="submit" id="back" value="VOLVER" onclick= "location.href='logintranet.php'"/></div>
<form method="post" action="verificadorMail.php">
<table width="100%" border="0" style="text-align:center">
    <tr>
  	<td colspan="2" style="color:#FF0000">
<?php if (isset($_GET['err'])) {
	  	$err = $_GET['err'];
		if ($err == 1) {
	  		print("<p><b> USUARIO Y/O EMAIL INCORRECTOS </b></p>");
		}
	   } ?>
	</td>
  </tr>
  <tr>
    <td align="right" width="50%"><font face="Verdana" size="2"><b>E-mail Registrado: </b></font></td>
    <td align="left"><input name="mail" type="text" id="mail" style="background-color: #FFFFFF" size="20" /></td>
    </tr>
  <tr>
    <td align="right"><b><font face="Verdana" size="2">Usuario: </font></b></td>
    <td align="left"><input type="text" name="delcod" id="delcod" style="background-color: #FFFFFF" size="20" /></td>
    </tr>
  <tr>
    <td colspan="2" align="right"></td>
    </tr>
  <tr>
    <td height="51" colspan="2"><input name="back2" type="submit" id="back2" value="ENVIAR" /></td>
    </tr>
</table>

</form>

</body>
</html>
