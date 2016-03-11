<?php include ("verificaSesion.php"); ?>

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
	color: #000000;
	font-size:20px;
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
.Estilo13 {color: #333333}
.Estilo14 {color: #666666}
.Estilo16 {font-size: 12px}
-->
</style>
</head>

<body>
<?php
$sql = "select * from usuarios where delcod = $delcod";
$result = mysql_query($sql,$db); 
$row=mysql_fetch_array($result); 
?>


<p align="center" class="Estilo3">SISTEMA DE CONSULTA PARA DELEGACIONES</p>
<p align="center"><img src="images/LOGOFINAL.jpg" width="342" height="342" /></p>
<table width="600" border="0" align="center" style="text-align:center">  
   <tr>
    <td colspan="2" class="Estilo3">Bienvenido <b><?php echo $row['nombre'] ?></b></td>
  </tr>
  <tr>
	<td colspan="2" class="Estilo13">
      <?php 
			$fechaActua = substr($row['fechaactualizacion'], 8, 2)."-".substr($row['fechaactualizacion'], 5, 2)."-".substr($row['fechaactualizacion'], 0, 4);
			print("ÚLTIMA ACTUALIZACIÓN ".$fechaActua);   
		?>
	  - <a href="javascript:void(window.open('http://www.usimra.com.ar/intranet/tutorialIntra.pdf'))" target="_top">Descargar Instructivo </a>
    </td>
  </tr>
  <tr>
    <td colspan="2"><p align="center" class="Estilo3 Estilo10">Su &uacute;ltima sesi&oacute;n fue el <?php echo $row['fecuac'] ?> a las <?php echo $row['horuac'] ?> </p></td>
  </tr>
  <tr>
    <td width="50%"><div align="center" class="Estilo9"><a href="elige_cuenta.php">Estado de cuenta</a> </div></td>
    <td width="50%"><div align="center" class="Estilo9"><a href="empresas.php">Empresas y Empleados</a></div></td>
  </tr>
  <tr>
  	<td colspan="2"><p align="center" class="Estilo11"><a href="consulta.php">Envianos tu consulta</a></p></td>
  </tr>
  
</table>
  <div align="center">
    <input type="button" name="salir" value="Salir" onclick="location.href='logout.php'"/>
  </div>

</body>
</html>
<?php //update de la fecha y la hora
	$hoy = date("Ymd"); 
	$hora = date("H:i:s"); 
	$sql = "UPDATE usuarios SET fecuac= '$hoy', horuac = '$hora' where delcod = $delcod"; 
	$result = mysql_query($sql,$db);
?>

