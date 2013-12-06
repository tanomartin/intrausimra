<?php session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: logintranet.php?err=2");
	
include ("conexion.php");
$empcod = $_GET['emp'];
$control = $_GET['control'];
$sql = "select * from empresa where delcod = $delcod and empcod = '$emp'";
$result = mysql_query($sql,$db); 
$row = mysql_fetch_array($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Detalle de DDJJ</title>
<style type="text/css">
<!--
.Estilo3 {font-family: Papyrus;
	font-weight: bold;
	color: #999999;
	font-size: 24px;
}
.Estilo5 {color: #666666;
	font-weight: bold;
}
.Estilo4 {font-size: 10px;
	font-weight: bold;
}
.Estilo6 {font-size: 14px}
.Estilo7 {font-size: 14px; font-weight: bold; }
-->
</style>
</head>

<body>
<table width="1023" border="0">
  <tr>
    <td width="57" scope="row"><div align="center" class="Estilo3"><img src="LOGOFINALBLANCO.jpg" width="45" height="45" /></div></td>
    <td width="436"><div align="left">
      <p class="Estilo3">Detalle de DDJJ </p>
    </div></td>
    <td width="516"><div align="right" class="Estilo3"><font size="3" face="Papyrus">
      <?php print ($row['nombre']); ?>
    </font></div></td>
  </tr>
  <tr>
    <td colspan="3" scope="row"><div align="right" class="Estilo5">U.S.I.M.R.A. </div></td>
  </tr>
</table>
<table border="1" width="1020" bordercolorlight="#D08C35" bordercolordark="#D08C35" bordercolor="#CD8C34" cellpadding="2" cellspacing="0">
  <tr>
    <td width="187"><div align="center"><strong><font size="1" face="Verdana">CUIL</font></strong></div></td>
    <td width="89"><div align="center"><strong><font size="1" face="Verdana">Mes</font></strong></div></td>
    <td width="80"><div align="center"><strong><font size="1" face="Verdana"><font size="1">A&ntilde;o</font> </font></strong></div></td>
    <td width="157"><div align="center"><strong><font size="1" face="Verdana"><font size="1">Remuneraci&oacute;n</font> </font></strong></div></td>
    <td width="143"><div align="center"><strong><font size="1" face="Verdana"><font size="1">Aporte 0.60 </font></font></strong></div></td>
    <td width="145"><div align="center"><strong><font size="1" face="Verdana"><font size="1">Aporte 1.00 </font> </font></strong></div></td>
    <td width="175"><div align="center"><strong><font size="1" face="Verdana"><font size="1">Aporte 1.50 </font> </font></strong></div></td>
  </tr>
  <p>

<?php
$con = substr($control,15,14);
mysql_select_db('ospimrem_aplicativo');
$sql3 = "select * from ppjj where nrctrl = '$con'";
$result3 = mysql_query($sql3,$db); 
while ($row3 = mysql_fetch_array($result3)) {
	print ("<td width=187><div align=center><font face=Verdana size=1>".$row3['nrcuil']."</font></div></td>");
	print ("<td width=89><div align=center><font face=Verdana size=1>".$row3['permes']."</font></div></td>");
	print ("<td width=80><div align=center><font face=Verdana size=1>".$row3['perano']."</font></div></td>");
	print ("<td width=157><div align=center><font face=Verdana size=1>".$row3['remune']."</font></div></td>");
	print ("<td width=143><div align=center><font face=Verdana size=1>".$row3['apo060']."</font></div></td>");
	print ("<td width=145><div align=center><font face=Verdana size=1>".$row3['apo100']."</font></div></td>");
	print ("<td width=175><div align=center><font face=Verdana size=1>".$row3['apo150']."</font></div></td>");
	print ("</tr>");
}
?>
  </p>
</table>

<?php
$sql4 = "select * from validas where nrctrl = '$con'";
$result4 = mysql_query($sql4,$db); 
$row4 = mysql_fetch_array($result4);
?>

<table width="1019" border="1">
  <tr class="Estilo4">
    <th width="370" scope="row"><div align="right" class="Estilo4 Estilo6">TOTALES </div></th>
    <th width="158" class="Estilo7" scope="row"><?php print($row4['remune']); ?></th>
    <th width="148" class="Estilo7" scope="row"><?php print($row4['apo060']); ?></th>
    <th width="145" class="Estilo7" scope="row"><?php print($row4['apo100']); ?></th>
    <th width="176" class="Estilo7" scope="row"><?php print($row4['apo150']); ?></th>
  </tr>
</table>

<table width="1019" border="1">
  <tr>
    <th height="23" scope="row"><div align="right" class="Estilo7">RECARGO</div></th>
    <th width="175" class="Estilo7" scope="row"><?php print($row4['recarg']); ?></th>
  </tr>
</table>
<table width="1019" border="1">
  <tr>
    <th scope="row"><div align="right" class="Estilo7">TOTAL DEPOSITADO </div></th>
    <th width="175" class="Estilo7" scope="row"><?php print($row4['totapo']); ?></th>
  </tr>
</table>


<table width="1019" border="0">
  <tr>
    <th width="368" scope="row">&nbsp;</th>
    <th width="641" scope="row"><div align="right">
      <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
    </div></th>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
