<?php session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: logintranet.php?err=2");
include ("conexion.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>U.S.I.M.R.A. Men&uacute; de control</title>
<style type="text/css">
<!--
.Estilo3 {
	font-family: Papyrus;
	font-weight: bold;
	color: #999999;
}
body {
	background-color: #E2DDB8;
}
.Estilo10 {
	font-size: 18px;
	color: #333333;
}
.Estilo11 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 14px; color: #666666; }
.Estilo13 {font-family: Papyrus}
.Estilo17 {font-size: 10}
.Estilo18 {font-family: Papyrus; color: #333333; }
.Estilo19 {color: #333333}
.Estilo20 {font-size: 12px}
-->
</style>
</head>

<body>
<?php
$sql = "select * from usuarios where delcod = $delcod";
$result = mysql_query($sql,$db); 
$row=mysql_fetch_array($result); 
?>


<p align="center" class="Estilo3">SISTEMA DE CONTROL</p>
<p align="center"><img src="LOGOFINAL.jpg" width="304" height="304" /></p>



<table width="100%" border="0" align="center">
  <tr>
    <td height="33">&nbsp;</td>
    <td colspan="3" align="right" class="Estilo3"><div align="center" class="Estilo18">ULTIMA ACTUALIZACI&Oacute;N - 22/08/2013 <a href="controlActua.php">(Control Actualizaci&oacute;n) </a></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td colspan="3" align="right" class="Estilo3"><div align="center"><strong><span class="Estilo19">Instructivo de uso - </span><a href=javascript:void(window.open("http://www.usimra.com.ar/intranet/tutorialIntra.pdf")) target="_top">Descargar Instructivo </a></strong> </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td colspan="3" align="right" class="Estilo3"><div align="center"><span class="Estilo20"><span class="Estilo19">El instructivo esta en extencion pdf.necesitara el Adobe Reader para poder abrirlo</span> <a href=javascript:void(window.open("http://www.adobe.com/es/products/acrobat/readstep2.html")) target="_top">Descargar aqui Adobe Reader</a></span> </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="19%" height="33"><p style="word-spacing: 0; margin-top: 0; margin-bottom: 0">&nbsp;</p></td>
    <td colspan="3" align="right" class="Estilo3"><p align="center" class="Estilo19">Bienvenido <b><?php echo $row['nombre'] ?></b></p></td>
    <td width="21%">&nbsp;</td>
  </tr>
  <tr>
    <td width="19%">&nbsp;</td>
    <td colspan="3" align="right"><p align="center" class="Estilo3 Estilo10">Su &uacute;ltima sesi&oacute;n fue el <?php echo $row['fecuac'] ?> a las <?php echo $row['horuac'] ?> </p></td>
    <td width="21%">&nbsp;</td>
  </tr>
  <tr>
    <td><span class="Estilo17"></span></td>
    <td width="19%" align="center"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=1701" class="Estilo13">Concordia </a></div></td>
    <td width="23%" align="right"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=1002" class="Estilo13">Capital </a></div></td>
    <td width="18%" align="right"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=1102" class="Estilo13">La Matanza </a></div></td>
    <td><span class="Estilo17"></span></td>
  </tr>
  <tr>
    <td><span class="Estilo17"></span></td>
    <td align="center"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=1107" class="Estilo13">San Fernando </a></div></td>
    <td align="right"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=1108" class="Estilo13">San Mart&iacute;n </a></div></td>
    <td align="right"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=2101" class="Estilo13">Posadas</a></div></td>
    <td><span class="Estilo17"></span></td>
  </tr>
  <tr>
    <td><span class="Estilo17"></span></td>
    <td align="center"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=2102" class="Estilo13">El Dorado </a></div></td>
    <td align="right"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=2103" class="Estilo13">Gral. Belgrano  </a></div></td>
    <td align="right"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=1401" class="Estilo13">Corrientes</a></div></td>
    <td><span class="Estilo17"></span></td>
  </tr>
  <tr>
    <td><span class="Estilo17"></span></td>
    <td align="center"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=1301" class="Estilo13">Cordoba</a></div></td>
    <td align="right"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=2001" class="Estilo13">Mendoza</a></div></td>
    <td align="right"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=2402" class="Estilo13">Oran</a></div></td>
    <td><span class="Estilo17"></span></td>
  </tr>
  <tr>
    <td><span class="Estilo17"></span></td>
    <td align="center"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=1402" class="Estilo13">Virasoro</a></div></td>
    <td align="right"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=2603" class="Estilo13">Rosario</a></div></td>
    <td align="right"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=2604" class="Estilo13">Rosario Adyacente </a></div></td>
    <td><span class="Estilo17"></span></td>
  </tr>
  <tr>
    <td><span class="Estilo17"></span></td>
    <td align="center"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=2602" class="Estilo13">Santa Fe </a></div></td>
    <td align="right"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=1106" class="Estilo13">La Plata </a></div></td>
    <td align="right"><div align="center" class="Estilo17">
      <div align="center"><a href="empresasControl.php?dele=1101" class="Estilo13">Bahia Blanca </a></div>
    </div></td>
    <td><span class="Estilo17"></span></td>
  </tr>
  <tr>
    <td><span class="Estilo17"></span></td>
    <td align="center"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=1103" class="Estilo13">Mar del Plata </a></div></td>
    <td align="right"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=1109" class="Estilo13">San Nicol&aacute;s </a></div></td>
    <td align="right"><div align="center" class="Estilo17">
            <div align="center"><a href="empresasControl.php?dele=1110" class="Estilo13">Tandil </a></div>
    </div></td>
    <td><span class="Estilo17"></span></td>
  </tr>
  <tr>
    <td><span class="Estilo17"></span></td>
    <td align="center"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=1302" class="Estilo13">San Francisco </a></div></td>
    <td align="right"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=1501" class="Estilo13">Chaco </a></div></td>
    <td align="right"><div align="center" class="Estilo17">
            <div align="center"><a href="empresasControl.php?dele=1601" class="Estilo13">Formosa </a></div>
    </div></td>
    <td><span class="Estilo17"></span></td>
  </tr>
  <tr>
    <td><span class="Estilo17"></span></td>
    <td align="center"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=1702" class="Estilo13">Gualeguychu </a></div></td>
    <td align="right"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=1703" class="Estilo13">Paran&aacute;</a></div></td>
    <td align="right"><div align="center" class="Estilo17">
            <div align="center"><a href="empresasControl.php?dele=1802" class="Estilo13">Jujuy </a></div>
    </div></td>
    <td><span class="Estilo17"></span></td>
  </tr>
  <tr>
    <td><span class="Estilo17"></span></td>
    <td align="center"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=1901" class="Estilo13">La Pampa</a></div></td>
    <td align="right"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=2201" class="Estilo13">Neuqu&eacute;n </a></div></td>
    <td align="right"><div align="center" class="Estilo17">
            <div align="center"><a href="empresasControl.php?dele=2401" class="Estilo13">Salta </a></div>
    </div></td>
    <td><span class="Estilo17"></span></td>
  </tr>
  <tr>
    <td><span class="Estilo17"></span></td>
    <td align="center"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=2403" class="Estilo13">Tartagal </a></div></td>
    <td align="right"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=2301" class="Estilo13">Cipolletti</a></div></td>
    <td align="right"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=2501" class="Estilo13">San Juan </a></div></td>
    <td><span class="Estilo17"></span></td>
  </tr>
  <tr>
    <td><span class="Estilo17"></span></td>
    <td align="center"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=1202" class="Estilo13">Chubut </a></div></td>
    <td align="right"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=1203" class="Estilo13">Tierra del Fuego </a></div></td>
    <td align="right"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=2701" class="Estilo13">Santiago del Estero</a></div></td>
    <td><span class="Estilo17"></span></td>
  </tr>
  <tr>
    <td><span class="Estilo17"></span></td>
    <td align="center"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=2801" class="Estilo13">Tucum&aacute;n </a></div></td>
    <td align="right"><span class="Estilo17"></span></td>
    <td align="right"><div align="center" class="Estilo17"><a href="empresasControl.php?dele=2902" class="Estilo13">San Luis </a></div></td>
    <td><span class="Estilo17"></span></td>
  </tr>
</table>
<p align="center" class="Estilo11"><a href="consultaControl.php">Envianos tu consulta</a> </p>
  <label>
  <div align="center">
    <input type="button" name="salir" value="Salir" onclick="location.href='logout.php'"/>
  </div>
  </label>
</body>
</html>

<p>
<?php //update de la fecha y la hora
$hoy = date("Ymd"); 
$hora = date("H:i:s"); 
$sql = "UPDATE usuarios SET fecuac= '$hoy', horuac = '$hora' where delcod = $delcod"; 
$result = mysql_query($sql,$db);
?>
</p>

