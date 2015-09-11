<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Intranet - Login</title>
<style type="text/css">
<!--
.Estilo2 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 12px;
	color: #666666;
}
.Estilo3 {
	font-family: Papyrus;
	font-weight: bold;
	color: #000000;
	font-size:20px;
}
body {
	background-color: #E2DDB8;
}
-->
</style>
</head>

<body>
<form method="post" action="verificaID.php">
<p align="center" class="Estilo3">SISTEMA DE CONSULTA PARA DELEGACIONES</p>
<p align="center"><img src="LOGOFINAL.jpg" width="342" height="342" /></p>
<div align="center">
<table width="500" border="0" style="text-align:center">
  <tr>
  	<td style="color:#FF0000" colspan="2">
	<?php if (isset($_GET['err'])) {
	  				$err = $_GET['err'];
					if ($err == 1) {
	  		  			print("<p><b> USUARIO Y/O CONTRASEÑA INCORRECTOS </b></p>");
					}
					if ($err == 2) {
	  		  			print("<p><b> SU SESIÓN HA CADUCADO VUELVA A INGRESAR </b></p>");
					}
	  			} ?>
	</td>
  </tr>
  <tr>
    <td width="50%" align="right"><font face="Verdana" size="2"><b>Usuario: </b></font></td>
	<td align="left"><input name="user" type="text" id="user" style="background-color: #ffffff" size="20" /></td>
  </tr>
  <tr>
    <td align="right"><font face="Verdana" size="2"><b>Contrase&ntilde;a:</b></font></td>
	<td align="left"> <input name="pass" type="password" id="pass" style="background-color: #FFFFFF" size="20" /></td>
  </tr>
  <tr>
    <td height="40" colspan="2"><input name="ingresar" type="submit" id="ingresar"  value="Ingresar" /></td>
  </tr>
  <tr>
    <td height="40" colspan="2"><p align="center"><a href="olvido.php" class="Estilo2">&iquest;OLVIDO SU CONTRASE&Ntilde;A?</a></p></td>
  </tr>
</table>
</div>
</form>

</body>
</html>
