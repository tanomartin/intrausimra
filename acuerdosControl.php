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
    <td><div align="right"><font size="3" face="Papyrus">
      <?php print ($row['nombre']);?>
    </font></div></td>
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
    <th width="167" scope="row"><div align="left">Per&iacute;odo</div></th>
    <td width="365"><?php print ($ano."/".$mes);?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">N&uacute;mero</div></th>
    <td><?php print ($row3['nroacu']);?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Fecha</div></th>
    <td><?php print ($row3['fecacu']);?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Monto</div></th>
    <td><?php print ($row3['totacu']);?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Estado</div></th>
    <td><?php if ($row3['estacu'] == 1) {
 			print ("Vigente");
		} else {
			print ("Cancelado");
		}
		?></td>
  </tr>
</table>
<p class="Estilo3">Cuotas</p>
<table border="1" width="1025" bordercolorlight="#D08C35" bordercolordark="#D08C35" bordercolor="#CD8C34" cellpadding="2" cellspacing="0">
  <tr>
    <td width="80"><div align="center"><strong><font size="1" face="Verdana">N&uacute;mero </font></strong></div></td>
    <td width="136"><div align="center"><strong><font size="1" face="Verdana">Monto de Cuota </font></strong></div></td>
    <td width="136"><div align="center"><strong><font size="1" face="Verdana"><font size="1">Fecha de Vencimiento </font> </font></strong></div></td>
    <td width="121"><div align="center"><strong><font size="1" face="Verdana">Monto Pagado </font></strong></div></td>
    <td width="124"><div align="center"><strong><font size="1" face="Verdana">Fecha de Pago </font></strong></div></td>
    <td width="124"><div align="center"><strong><font size="1" face="Verdana">Sistema de Pago </font></strong></div></td>
	<td width="260"><div align="center"><strong><font size="1" face="Verdana">C&oacute;digo de Barra </font></strong></div></td>
  </tr>
  <p>
<?php $sql4 = "select * from cuoacuer where  nrcuit = '$nrcuit' and nroacu = $nroacu";
	$result4 = mysql_query($sql4,$db); 
	while ($row4=mysql_fetch_array($result4)) {
		if ($row4['sispag'] == 'E') {
			$sispago = "Electr�nico";
		} else {
			if ($row4['sispag'] == 'M' || $row3['estacu'] != 1 ) {
				$sispago = "Manual";
			} else {
				$sispago = "No Pagado";
			}
		}
		
		print ("<td width=80><div align=center><font face=Verdana size=1>".$row4['nrocuo']."</font></div></td>");
		print ("<td width=136><div align=center><font face=Verdana size=1>".$row4['moncuo']."</font></div></td>");
		print ("<td width=136><div align=center><font face=Verdana size=1>".$row4['fecvto']."</font></div></td>");
		print ("<td width=121><div align=center><font face=Verdana size=1>".$row4['monpag']."</font></div></td>");
		print ("<td width=124><div align=center><font face=Verdana size=1>".$row4['fecpag']."</font></div></td>");
		print ("<td width=124><div align=center><font face=Verdana size=1>".$sispago."</font></div></td>");
		print ("<td width=260><div align=center><font face=Verdana size=1>".$row4['codbar']."</font></div></td>");
		print ("</tr>");
	}
?>
  </p>
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
