<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Recordatorio Contrase&ntilde;a</title>
<style type="text/css">
<!--
.Estilo3 {font-family: Papyrus;
	font-weight: bold;
	color: #999999;
}
body {
	background-color: #E2DDB8;
}
.Estilo4 {font-size: 12px}
-->
</style>
</head>

<body>
<p align="center" class="Estilo3">SISTEMA DE CONSULTA PARA DELEGACIONES</p>
<p align="center" class="Estilo3"><img src="LOGOFINAL.jpg" width="342" height="342" /></p>
<p align="center" class="Estilo3"><b><font face="Verdana" size="2">
  <input name="back" type="submit" id="back" value="VOLVER" onclick= "location.href='logintranet.php'"/>
</font></b></p>
<form method="post" action="verificadorMail.php">

<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="right"><div align="center" class="Estilo3">
      <p class="Estilo4">RECORDATORIO DE CONTRASE&Ntilde;A</p>
      <p><?php if (isset($_GET['err'])) {
	  				$err = $_GET['err'];
					if ($err == 1) {
	  		  			print("<div align='center' style='color:#FF0000'><b> USUARIO Y/O EMAIL INCORRECTOS </b></div>");
					}
	  			} ?>
	  </p>
    </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="20%"><p style="word-spacing: 0; margin-top: 0; margin-bottom: 0">&nbsp;</p></td>
    <td width="30%" align="right"><p align="right"><font face="Verdana" size="2"><b>E-mail Registrado:&nbsp;</b></font></p></td>
    <td width="30%"><p align="left">
      <input name="mail" type="text" id="mail" style="background-color: #FFFFFF" size="20" />
    </p></td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr>
    <td width="20%" height="30">&nbsp;</td>
    <td width="30%" align="right"><p style="word-spacing: 0; margin-top: 0; margin-bottom: 0" align="right"><b><font face="Verdana" size="2">Usuario</font><font face="Verdana" size="2">:&nbsp;</font></b></p>        </td>
    <td width="30%"><p align="left">
      <input type="text" name="delcod" id="delcod" style="background-color: #FFFFFF" size="20" />
    </p></td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr>
    <td width="20%"></td>
    <td colspan="2" align="right"></td>
    <td width="20%"></td>
  </tr>
  <tr>
    <td height="51"></td>
    <td colspan="2" align="right"><div align="center"><b><font face="Verdana" size="2">
      <input name="back2" type="submit" id="back2" value="ENVIAR" />
    </font></b></div>      <div align="center"></div></td>
    <td></td>
  </tr>
</table>

</form>

</body>
</html>
