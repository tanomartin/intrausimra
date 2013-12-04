<? session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: http://www.usimra.com.ar/intranet/logintranet.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>U.S.I.M.R.A. Men&uacute; principal de consulta para delegaciones</title>
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
	color: #999999;
}
body {
	background-color: #E2DDB8;
}
.Estilo9 {font-family: Papyrus; font-size: 24px; }
.Estilo10 {
	font-size: 18px;
	color: #666666;
}
.Estilo11 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 14px; color: #666666; }
.Estilo12 {font-size: 9px}
.Estilo13 {color: #333333}
.Estilo14 {color: #666666}
-->
</style>
</head>

<body onUnload="logout.php">

<form id="form1" name="form1" method="post" action="logout.php">

<?

include ("conexion.php");
$sql = "select * from usuarios where delcod = $delcod";
$result = mysql_db_query("ospimrem_intranet",$sql,$db); 
$row=mysql_fetch_array($result); 
?>


<p align="center" class="Estilo3">SISTEMA DE CONSULTA PARA DELEGACIONES</p>
<p align="center"><img src="LOGOFINAL.jpg" width="342" height="342" /></p>
<table width="100%" border="0" align="center">
  <tr>
    <td height="33">&nbsp;</td>
    <td colspan="2" align="right" class="Estilo3"><div align="center" class="Estilo13">ULTIMA ACTUALIZACI&Oacute;N - 22/08/2013 </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td align="right" class="Estilo3"><strong><span class="Estilo14">Instructivo de uso</span> - </strong></td>
    <td><a href=javascript:void(window.open("http://www.usimra.com.ar/intranet/tutorialIntra.pdf")) target="_top">Descargar Instructivo </a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td align="right"><span class="Estilo12">El instructivo esta en extencion pdf.necesitara el Adobe Reader para poder abrirlo</span> </td>
    <td><span class="Estilo12"><a href=javascript:void(window.open("http://www.adobe.com/es/products/acrobat/readstep2.html")) target="_top">Descargar aqui Adobe Reader</a> </span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="30%" height="33"><p style="word-spacing: 0; margin-top: 0; margin-bottom: 0">&nbsp;</p></td>
    <td width="20%" align="right" class="Estilo3"><p class="Estilo14">Bienvenido </p>    </td>
    <td width="23%"><p align="left"><b><? echo $row['nombre'] ?></b></p></td>
    <td width="27%">&nbsp;</td>
  </tr>
  <tr>
    <td width="30%">&nbsp;</td>
    <td colspan="2" align="right"><p align="center" class="Estilo3 Estilo10">Su &uacute;ltima sesi&oacute;n fue el <? echo $row['fecuac'] ?> a las <? echo $row['horuac'] ?> </p></td>
    <td width="27%">&nbsp;</td>
  </tr>
  
  
  <tr>
    <td width="30%"></td>
    <td align="right" colspan="2"><p align="center"><a href="clave.htm" class="Estilo2"></a></p></td>
    <td width="27%"></td>
  </tr>
</table>
<table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="360"><div align="center" class="Estilo9"><a href="elige_cuenta.php">Estado de cuenta</a> </div></td>
    <td width="365"><div align="center" class="Estilo9"><a href="empresas.php">Empresas y Empleados</a></div></td>
  </tr>
</table>

<p align="center" class="Estilo11"><a href="consulta.php">Envianos tu consulta</a> </p>
  <label>
  <div align="center">
    <input type="submit" name="Submit" value="Salir" />
  </div>
  </label>

</form>

</body>
</html>

<p>
  <?
//update de la fecha y la hora
$hoy = date("Ymd"); 
$hora = date("H:i:s"); 
$sql = "UPDATE usuarios SET fecuac= '$hoy', horuac = '$hora' where delcod = $delcod"; 
$result = mysql_db_query("ospimrem_intranet",$sql,$db);
?>
</p>

