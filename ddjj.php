<?php include ("verificaSesion.php");
$nrcuit = $_GET['nrcuit'];
$control = $_GET['control'];
$sql = "select * from empresa where delcod = $delcod and nrcuit = $nrcuit";
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
<table border="1" width="1020" cellpadding="2" cellspacing="0" style="border-color: #CD8C34; text-align: center; font-family: Verdana, Geneva, sans-serif; font-size: 11px">
  <tr>
    <th>CUIL</th>
    <th>Mes</th>
    <th>A&ntilde;o</th>
    <th>Remuneraci&oacute;n</th>
    <th>Aporte 0.60 </th>
    <th>Aporte 1.00 </th>
    <th>Aporte 1.50 </th>
    <th>Total </th>
  </tr>

<?php
$con = substr($control,15,14);
mysql_select_db('ospimrem_newaplicativo');
$sql3 = "select * from ppjj where nrctrl = '$con'";
$result3 = mysql_query($sql3,$db); 

$sql4 = "select * from validas where nrctrl = '$con'";
$result4 = mysql_query($sql4,$db);
$row4 = mysql_fetch_array($result4);

while ($row3 = mysql_fetch_array($result3)) { ?>
		<tr>
			<td><?php echo $row3['nrcuil'] ?></td>
			<td><?php echo $row3['permes'] ?></td>
			<td><?php echo $row3['perano'] ?></td>
			<td><?php echo $row3['remune'] ?></td>
			<td><?php echo $row3['apo060'] ?></td>
			<td><?php echo $row3['apo100'] ?></td>
			<td><?php echo $row3['apo150'] ?></td>
			<td><?php echo $row3['apo060'] +  $row3['apo100'] + $row3['apo150'] ?></td>
		</tr>
<?php } ?>
   <tr class="Estilo4">
	    <th colspan="3"><div align="right" class="Estilo4 Estilo6">TOTALES </div></th>
	    <th><?php echo $row4['remune'] ?></th>
	    <th><?php echo $row4['apo060'] ?></th>
	    <th><?php echo $row4['apo100'] ?></th>
	    <th><?php echo $row4['apo150'] ?></th>
	    <th><?php echo $row4['apo060'] + $row4['apo100'] + $row4['apo150']   ?></th>
   </tr>
   
   <tr>
    <th colspan="7"><div align="right" class="Estilo7">RECARGO</div></th>
    <th><?php print($row4['recarg']); ?></th>
  </tr>
   
   <tr>
    <th colspan="7"><div align="right" class="Estilo7">TOTAL DEPOSITADO </div></th>
    <th ><?php print($row4['totapo']); ?></th>
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
</body>
</html>
