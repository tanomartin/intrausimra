<?php session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: logintranet.php?err=2");

include ("conexion.php");
$empcod = $_GET['empcod'];
$sql = "select * from empresa where delcod = $delcod and empcod = $empcod";
$result = mysql_query($sql,$db); 
$row = mysql_fetch_assoc($result);

$nrcuit = $row['nrcuit'];
$delcod = $row['delcod'];

function estado($ano, $me, $db) {	
	global $empcod, $delcod, $nrcuit;
	$sql1 = "select * from pagos where delcod = $delcod and empcod = $empcod and anotra = $ano and mestra = $me";
	$result1 = mysql_query($sql1,$db); 
	$row1 = mysql_fetch_array($result1);
	if($row1!=null) {
		$des = "PAGO";
	} else { 
		$sql6 = "select * from juicios where delcod = $delcod and empcod = $empcod and anojui = $ano and mesjui = $me" ;
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
				$sql3 = "select * from peranter where delcod = $delcod and empcod = $empcod and anoant = $ano and mesant = $me" ;
				$result3 = mysql_query($sql3,$db); 
				$row3 = mysql_fetch_array($result3);
				if($row3!=null) {
					$des = "P.DIF.";
				} else {
					$sql9 = "select * from ddjjnopa where delcod = $delcod and empcod = $empcod and perano = $ano and permes = $me" ;
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
</head>
<script>

function mypopup(dire) {
    mywindow = window.open(dire, "Info Cuenta", "location=1, width=1080, height=600, top=30, left=40, resizable=1, scrollbars=1");
}

</script>
<body>

<table width="1023" border="0">
  <tr>
    <td width="57" scope="row"><div align="center"><span class="Estilo3"><img src="LOGOFINAL.jpg" width="45" height="45" /></span></div></td>
    <td width="436"> <div align="left">
      <p class="Estilo3">ESTADO DE CUENTA</p>
    </div></td>
    <td width="516"><div align="right" class="Estilo3"><font size="3" face="Papyrus"><?php print ($row['nombre']);?> </font></div></td>
  </tr>
</table>

<table width="1024" border="1" bordercolor="#000000">
  <tr>
    <td rowspan="2"><div align="center"><strong>A&Ntilde;OS</strong></div></td>
    <td colspan="12"><div align="center"><strong>MESES</strong></div></td>
  </tr>
  <tr>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Enero</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Febrero</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Marzo</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Abril</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Mayo</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Junio</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Julio</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Agosto</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Setiembre</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Octubre</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Noviembre</font></strong></div></td>
    <td width="81"><div align="center"><strong><font size="1" face="Verdana">Diciembre</font></strong></div></td>
  </tr>
<?php
$año = date("Y")-5;
$añofin = date("Y");
while($año<=$añofin) {
?>
  <tr>
    <td> <div align="left"><strong><?php echo $año; ?></strong></div></td>
<?php
	for($mes = 1; $mes < 13; $mes++) { 
		$descri = estado($año,$mes,$db);
		if ($descri == "PAGO") {
			print ("<td width=81><div align=center><font face=Verdana size=1><a href=javascript:mypopup('pagos.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."')>".$descri."</a></font></div></td>");
		}
		if ($descri == "ACUER.") {
			print ("<td width=81><div align=center><font face=Verdana size=1><a href=javascript:mypopup('acuerdos.php?nrcuit=".$nrcuit."&ano=".$año."&mes=".$mes."')>".$descri."</a></font></div></td>");
		}
		if ($descri == "P.DIF.") {
			print ("<td width=81><div align=center><font face=Verdana size=1><a href=javascript:mypopup('pagosAnte.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."')>".$descri."</a></font></div></td>");
		}
		if (($descri == "NO PAGO") || ($descri == "JUICI.")|| ($descri == "S.DJ.")) {
			print ("<td width=81><div align=center><font face=Verdana size=1>$descri</font></div></td>");
		}
	}
	print("</tr>");
	$año++;
}
?>
</table>

<table width="1027" border="0">
  <tr>
    <th width="502" scope="row"><div align="left"><b><font face="Verdana" size="2">
		<input type="button" name="back" value="VOLVER" onclick="location.href='elige_cuenta.php'"/>
    </font></b></div></th>
    <td width="515"><div align="right">
      <p>
        <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
        </p>
      </div></td>
  </tr>
  <tr>
    <th scope="row"><div align="left"><span class="Estilo5">*ACUER. = PERIODO EN ACUERDO </span></div></th>
    <td><div align="left" class="Estilo6">
      <div align="left"><span class="Estilo5">*S. DJ.= PERIODO SIN DDJJ </span></div>
    </div></td>
  </tr>
  <tr>
    <th scope="row"><div align="left"><span class="Estilo5">*P.DIF. = PAGO DIFERENCIADO</span></div></th>
    <td><div align="left"><span class="Estilo8">*NO PAGO = PERIODO NO PAGO CON DDJJ </span></div></td>
  </tr>
  <tr>
    <th scope="row"><div align="left"><span class="Estilo5">*JUICI. = PERIODO EN JUICIO </span></div></th>
    <td><div align="left"><span class="Estilo8">*PAGO = PERIODO PAGO CON DDJJ </span></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p><b><font face="Verdana" size="2">  </font></b></p>
</body>
</html>
