<?php include ("verificaSesion.php");
$nrcuit = $_GET['nrcuit'];
$sql = "select * from empresa where delcod = $delcod and nrcuit = $nrcuit";
$result = mysql_query($sql,$db); 
$row = mysql_fetch_assoc($result);
$delcod = $row['delcod'];

function estado($ano, $me, $db) {	
	global $empcod, $delcod, $nrcuit;
	$sql1 = "select * from pagos where nrcuit = $nrcuit and anotra = $ano and mestra = $me";
	$result1 = mysql_query($sql1,$db); 
	$row1 = mysql_fetch_array($result1);
	if($row1!=null) {
		$des = "PAGO";
	} else { 
		$sql6 = "select * from juicios where nrcuit = $nrcuit and anojui = $ano and mesjui = $me" ;
		 $result6 = mysql_query($sql6,$db); 
		 $row6 = mysql_fetch_array($result6);
		 if ($row6 != null) {
		 	$des = "JUICI.";
		 } else {
			$sql2 = "select * from detacuer where nrcuit = $nrcuit and anoacu = $ano and mesacu = $me" ;
			$result2 = mysql_query($sql2,$db); 
			$row2 = mysql_fetch_array($result2);
			if($row2!=null) {
				$des = "ACUER.";
			} else {
				$sql3 = "select * from peranter where nrcuit = $nrcuit and anoant = $ano and mesant = $me" ;
				$result3 = mysql_query($sql3,$db); 
				$row3 = mysql_fetch_array($result3);
				if($row3!=null) {
					$des = "P.DIF.";
				} else {
					$sql9 = "select * from ddjjnopa where nrcuit = $nrcuit and perano = $ano and permes = $me" ;
					$result9 = mysql_query($sql9,$db); 
					$row9 = mysql_fetch_array($result9);
					if($row9!=null) {
						$des = "NO PAGO";
					} else {
						$des = "S.DJ.";
					}
				}					
			}	
		}
	}
	return $des;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cuenta</title>
<style type="text/css">
<!--
.Estilo3 {
	font-family: Papyrus;
	font-weight: bold;
	color: #999999;
	font-size: 24px;
}
body {
	background-color: #E2DDB8;
}
.Estilo5 {font-size: 12px}
.Estilo6 {font-weight: bold}
.Estilo8 {font-size: 12px; font-weight: bold; }
-->
</style>
<script>

function mypopup(dire) {
    mywindow = window.open(dire, 'InfoCuenta', 'location=1, width=1080, height=600, top=30, left=40, resizable=1, scrollbars=1');
}

</script>
</head>

<body>
<div align="center">
<table width="1023" border="0">
  <tr>
    <td width="57" scope="row"><div align="center"><span class="Estilo3"><img src="LOGOFINAL.jpg" width="45" height="45" /></span></div></td>
    <td width="436"> <div align="left">
      <p class="Estilo3">ESTADO DE CUENTA</p>
    </div></td>
    <td width="516"><div align="right" class="Estilo3"><font size="3" face="Papyrus"><?php print ($row['nombre']);?> </font></div></td>
  </tr>
</table>

<table width="1024" border="1" style="text-align: center; font-family: Verdana, Geneva, sans-serif; font-size: 10px">
  <tr>
    <td rowspan="2"><strong>A&Ntilde;OS</strong></td>
    <td colspan="12"><strong>MESES</strong></td>
  </tr>
  <tr>
    <td width="81"><strong>Enero</strong></td>
    <td width="81"><strong>Febrero</strong></td>
    <td width="81"><strong>Marzo</strong></td>
    <td width="81"><strong>Abril</strong></td>
    <td width="81"><strong>Mayo</strong></td>
    <td width="81"><strong>Junio</strong></td>
    <td width="81"><strong>Julio</strong></td>
    <td width="81"><strong>Agosto</strong></td>
    <td width="81"><strong>Setiembre</strong></td>
    <td width="81"><strong>Octubre</strong></td>
    <td width="81"><strong>Noviembre</strong></td>
    <td width="81"><strong>Diciembre</strong></td>
  </tr>
<?php
$anoactual =  date("Y");
$mesacutal = date("m");

$anoinicio = $anoactual-5;
$mesinicio = $mesacutal+1;
if($mesinicio == 13) { 
	$mesinicio = 1; 
	$anoinicio++; 
}
$mesfin = $mesacutal;
$ano = $anoinicio;
$anofin = $anoactual;

	while($ano<=$anofin) { ?>
	  <tr>
	    <td> <div align="left"><strong><?php echo $ano; ?></strong></div></td>
	<?php
		for($mes = 1; $mes < 13; $mes++) { 
			if ($ano == $anoinicio && $mes < $mesinicio) { ?>
				<td>-</td>
	<?php	} else {
				if ($ano == $anofin && $mes > $mesfin) { ?>
					<td>-</td>
	<?php		} else {
					$descri = estado($ano,$mes,$db);
					if ($descri == "PAGO") { ?>
						<td><a href="javascript:mypopup('pagos.php?nrcuit=<?php echo $nrcuit ?>&ano=<?php echo $ano ?>&mes=<?php echo $mes ?>')"><?php echo $descri ?></a></td>
	<?php			}
					if ($descri == "ACUER.") { ?>
						<td><a href="javascript:mypopup('acuerdos.php?nrcuit=<?php echo $nrcuit ?>&ano=<?php echo $ano ?>&mes=<?php echo $mes ?>')"><?php echo $descri ?></a></td>
	<?php			}
					if ($descri == "P.DIF.") { ?>
						<td><a href="javascript:mypopup('pagosAnte.php?nrcuit=<?php echo $nrcuit ?>&ano=<?php echo $ano ?>&mes=<?php echo $mes ?>')"><?php echo $descri ?></a></td>
	<?php			}
					if (($descri == "NO PAGO") || ($descri == "JUICI.")|| ($descri == "S.DJ.")) { ?>
						<td><?php echo $descri ?></td>
	<?php			}
				}
			}
		}
		$ano++; ?>
		 </tr>
<?php } ?>
</table>

<table width="1027" style="margin-top: 10px">
  <tr>
    <td align="left">
		<input type="button" name="back" value="VOLVER" onclick="location.href='elige_cuenta.php'"/>
    </td>
    <td></td>
    <td align="right">
    	<input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
    </td>
  </tr>
</table>
<table width="1027" style="margin-top: 10px">
  <tr>
    <td><div align="left"><span class="Estilo5"><b>*ACUER.</b> = PERIODO EN ACUERDO </span></div></td>
    <td><div align="center"><span class="Estilo5"><b>*S. DJ.</b>= PERIODO SIN DDJJ </span></div></td>
    <td><div align="right"><span class="Estilo5"><b>*P.DIF.</b> = PAGO DIFERENCIADO</span></div></td>
  </tr>
  <tr>
    <td><div align="left"><span class="Estilo5"><b>*NO PAGO</b> = PERIODO NO PAGO CON DDJJ </span></div></td>
    <td><div align="center"><span class="Estilo5"><b>*JUICI.</b> = PERIODO EN JUICIO </span></div></td>
    <td><div align="right"><span class="Estilo5"><b>*PAGO</b> = PERIODO PAGO CON DDJJ </span></div></td>
  </tr>
</table>
</div>
</body>
</html>
