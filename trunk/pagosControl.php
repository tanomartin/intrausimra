<?php session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: logintranet.php?err=2");
	
include ("conexion.php");
$del = $_GET['del'];
$empcod = $_GET['empcod'];
$ano = $_GET['ano'];
$mes = $_GET['mes'];

$sql = "select * from empresa where delcod = '$del' and empcod = '$empcod'";
$result = mysql_query($sql,$db); 
$row = mysql_fetch_array($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Detalle de pago</title>
<style type="text/css">
<!--
.Estilo3 {font-family: Papyrus;
	font-weight: bold;
	color: #999999;
	font-size: 24px;
}
.Estilo4 {	font-size: 10px;
	font-weight: bold;
}
.Estilo5 {	color: #666666;
	font-weight: bold;
}
-->
</style>
</head>
<script>
function mypopup(dire) {
    mywindow = window.open(dire, 'InfoPago', 'location=1, width=1080, height=600, top=30, left=40, resizable=1, scrollbars=1');
}
</script>
<body>
<table width="1023" border="0">
  <tr>
    <td width="57" scope="row"><div align="center"><span class="Estilo3"><img src="LOGOFINALBLANCO.jpg" width="45" height="45" /></span></div></td>
    <td width="436"><div align="left">
      <p class="Estilo3">Detalle de Pago </p>
    </div></td>
    <td width="516"><div align="right" class="Estilo3"><font size="3" face="Papyrus">
      <?php print ($row['nombre']);?>
    </font></div></td>
  </tr>
  <tr>
    <td colspan="3" scope="row"><div align="right" class="Estilo5">U.S.I.M.R.A. </div></td>
  </tr>
</table>
<table border="1" width="1025" bordercolorlight="#D08C35" bordercolordark="#D08C35" bordercolor="#CD8C34" cellpadding="2" cellspacing="0">
  <tr>
    <td width="140"><div align="center"><strong><font size="1" face="Verdana">Per&iacute;odo</font></strong></div></td>
    <td width="192"><div align="center"><strong><font size="1" face="Verdana">Fecha de Deposito </font></strong></div></td>
    <td width="182"><div align="center"><strong><font size="1" face="Verdana"><font size="1">Total Depositado </font> </font></strong></div></td>
    <td width="154"><div align="center"><strong><font size="1" face="Verdana"><font size="1">Sistema de Pago </font> </font></strong></div></td>
    <td width="325"><div align="center"><strong><font size="1" face="Verdana"><font size="1">C&oacute;digo de Barra </font> </font></strong></div></td>
  </tr>
  <p>
  
<?php
$sql1 = "select * from pagos where delcod = '$del' and empcod = '$empcod' and anotra = '$ano' and mestra = '$mes'";;
$result1 = mysql_query($sql1,$db); 
while ($row1=mysql_fetch_array($result1)) {
	if ($row1['sispag'] == 'E') {
		$sispago = "Electrónico";
	}
	else {
		$sispago = "Manual";
	}
	print ("<td width=140><div align=center><font face=Verdana size=1>".$row1['mestra']."/".$row1['anotra']."</font></div></td>");
	print ("<td width=192><div align=center><font face=Verdana size=1>".$row1['fecdep']."</font></div></td>");
	print ("<td width=182><div align=center><font face=Verdana size=1>".$row1['totdep']."</font></div></td>");
	print ("<td width=154><div align=center><font face=Verdana size=1>".$sispago."</font></div></td>");
	if ($row1['codbar'] != null) {
		print ("<td width=325><div align=center><font face=Verdana size=1><a href=javascript:mypopup('ddjjcontrol.php?del=$del&empcod=$empcod&control=".$row1['codbar']."')>".$row1['codbar']."</a></font></div></td>");
	}
	else {
		print ("<td width=182><div align=center><font face=Verdana size=1>-</font></div></td>");
	}
	print ("</tr>");
}

$control = substr($row1['codbar'],-1);

?>
  </p>
</table>


<table width="1019" border="0">
  <tr>
    <th scope="row"><div align="right">
      <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
    </div></th>
  </tr>
</table>
</body>
</html>
