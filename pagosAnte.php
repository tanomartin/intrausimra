<?php include ("verificaSesion.php");
$nrcuit = $_GET['nrcuit'];
$ano = $_GET['ano'];
$mes = $_GET['mes'];
$sql = "select * from empresa where delcod = $delcod and nrcuit = $nrcuit";
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

<body>
<table width="800" border="0">
  <tr>
    <td width="57" scope="row"><div align="center"><span class="Estilo3"><img src="LOGOFINALBLANCO.jpg" width="45" height="45" /></span></div></td>
    <td width="436"><div align="left">
      <p class="Estilo3">Detalle de Pago Diferenciado </p>
    </div></td>
    <td width="516"><div align="right" class="Estilo3"><font size="3" face="Papyrus">
      <?php print ($row['nombre']);?>
    </font></div></td>
  </tr>
  <tr>
    <td colspan="3" scope="row"><div align="right" class="Estilo5">U.S.I.M.R.A. </div></td>
  </tr>
</table>
<table width="800" border="0">
  <tr>
    <th scope="row"><div align="center">
      <table border="1" width="365" style="border-color: #CD8C34; text-align: center; font-family: Verdana, Geneva, sans-serif; font-size: 11px" cellpadding="2" cellspacing="0">
        <tr>
          <th>Per&iacute;odo Cancelado </th>
          <th>Per&iacute;odo de Pago </th>
        </tr>
          <?php
			$sql1 = "select * from peranter where nrcuit = $nrcuit and anoant = '$ano' and mesant = '$mes'";;
			$result1 = mysql_query($sql1,$db); 
			while ($row1=mysql_fetch_array($result1)) { ?>
				<tr>
					<td><?php echo $row1['mesant']."/".$row1['anoant'] ?></td>
					<td><?php echo $row1['mestra']."/".$row1['anotra'] ?></td>
				</tr>
	<?php	} ?>
      </table>
    </div>
    </th>
  </tr>
</table>
<table width="800" border="0">
  <tr>
    <th scope="row"><div align="right">
      <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
    </div></th>
  </tr>
</table>
</body>
</html>
