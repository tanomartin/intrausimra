<?php include ("verificaSesion.php"); 

$del = $_GET['del'];
$nrcuit = $_GET['nrcuit'];
$ano = $_GET['ano'];
$mes = $_GET['mes'];
$sql = "select * from empresa where nrcuit = '$nrcuit'";
$result = mysql_query($sql,$db); 
$row = mysql_fetch_array($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Detalle de Acuerdo</title>
<style type="text/css">
<!--
.Estilo3 {font-family: Papyrus;
	font-weight: bold;
	color: #999999;
	font-size: 24px;
}
.Estilo4 {font-size: 10px;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<table width="546" border="0">
  <tr>
    <th width="56" scope="row"><span class="Estilo3"><img src="LOGOFINALBLANCO.jpg" width="44" height="44" /></span></th>
    <td><div align="right"><font size="3" face="Papyrus"><?php print ($row['nombre']);?></font></div></td>
  </tr>
</table>

<?php
$sql2 = "select * from detacuer where nrcuit = '$nrcuit' and anoacu = '$ano' and mesacu = '$mes'" ;
$result2 = mysql_query($sql2,$db); 
$row2 = mysql_fetch_array($result2);
$nroacu = $row2['nroacu'];
				
$sql3 = "select * from cabacuer where nrcuit = '$nrcuit' and nroacu = $nroacu" ;
$result3 = mysql_query($sql3,$db); 
$row3 = mysql_fetch_array($result3);
?>


<table width="548" border="1">
  <tr>
    <th><div align="left">Per&iacute;odo</div></th>
    <td><?php print ($ano."/".$mes);?></td>
  </tr>
  <tr>
    <th><div align="left">N&uacute;mero</div></th>
    <td><?php print ($row3['nroacu']);?></td>
  </tr>
  <tr>
    <th><div align="left">Fecha</div></th>
    <td><?php print ($row3['fecacu']);?></td>
  </tr>
  <tr>
    <th><div align="left">Monto</div></th>
    <td><?php print ($row3['totacu']);?></td>
  </tr>
  <tr>
    <th><div align="left">Estado</div></th>
    <td><?php if ($row3['estacu'] == 1) { echo "Vigente"; } else { echo "Cancelado"; }?></td>
  </tr>
</table>
<p class="Estilo3">Cuotas</p>
<table border="1" width="1025" cellpadding="2" cellspacing="0" style="text-align: center; font-family: Verdana, Geneva, sans-serif; font-size: 11px">
  <tr>
    <th>N&uacute;mero </th>
    <th>Monto de Cuota </th>
    <th><font size="1">Fecha de Vencimiento </font> </th>
    <th>Monto Pagado </th>
    <th>Fecha de Pago </th>
    <th>Sistema de Pago </th>
	<th>C&oacute;digo de Barra </th>
  </tr>
<?php $sql4 = "select * from cuoacuer where  nrcuit = '$nrcuit' and nroacu = $nroacu";
	$result4 = mysql_query($sql4,$db); 
	while ($row4=mysql_fetch_array($result4)) {
		if ($row4['sispag'] == 'E') {
			$sispago = "Electrónico";
		} else {
			if ($row4['sispag'] == 'M' || $row3['estacu'] != 1 ) {
				$sispago = "Manual";
			} else {
				$sispago = "No Pagado";
			}
		} ?>
		<tr>
		<td><?php echo $row4['nrocuo'] ?></td>
		<td><?php echo $row4['moncuo'] ?></td>
		<td><?php echo $row4['fecvto'] ?></td>
		<td><?php echo $row4['monpag'] ?></td>
		<td><?php echo $row4['fecpag'] ?></td>
		<td><?php echo $sispago ?></td>
		<td><?php echo $row4['codbar'] ?></td>
		</tr>
<?php  } ?>
</table>
<table width="1024" border="0">
  <tr>
    <th scope="row"><div align="right">
      <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
    </div></th>
  </tr>
</table>
</body>
</html>
