<? session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: http://www.usimra.com.ar/intranet/logintranet.php");
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
.Estilo4 {
	color: #666666;
	font-weight: bold;
}
.Estilo5 {font-size: 12px}
-->
</style>
</head>

<?
include ("conexion.php");
$sql = "select * from empresa where delcod = '$del' and empcod = '$empcod'";
$result = mysql_db_query("ospimrem_intranet",$sql,$db); 
$row = mysql_fetch_array($result);
?>
<?
function estado($del,$emp,$ano, $me) {	
	include ("conexion.php");
	$sql1 = "select * from pagos where delcod = $del and empcod = $emp and anotra = $ano and mestra = $me";
	$result1 = mysql_db_query("ospimrem_intranet",$sql1,$db); 
	$row1 = mysql_fetch_array($result1);
	if($row1!=null) {
		$des = "PAGO";
		} else { $sql6 = "select * from juicios where delcod = $del and empcod = $emp and anojui = $ano and mesjui = $me" ;
				 $result6 = mysql_db_query("ospimrem_intranet",$sql6,$db); 
				 $row6 = mysql_fetch_array($result6);
				 if ($row6 != null) {
				 	$des = "JUICI.";
				 } else {
							$sql2 = "select * from detacuer where delcod = $del and empcod = $emp and anoacu = $ano and mesacu = $me" ;
							$result2 = mysql_db_query("ospimrem_intranet",$sql2,$db); 
							$row2 = mysql_fetch_array($result2);
							if($row2!=null) {
								$des = "ACUER.";
							} else {
										$sql3 = "select * from peranter where delcod = $del and empcod = $emp and anoant = $ano and mesant = $me" ;
										$result3 = mysql_db_query("ospimrem_intranet",$sql3,$db); 
										$row3 = mysql_fetch_array($result3);
										if($row3!=null) {
											$des = "P.DIF.";
										} else {
												$sql9 = "select * from ddjjnopa where delcod = $del and empcod = $emp and perano = $ano and permes = $me" ;
												$result9 = mysql_db_query("ospimrem_intranet",$sql9,$db); 
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

<body onUnload="logout.php">

<table width="1023" border="0">
  <tr>
    <td width="57" scope="row"><div align="center"><span class="Estilo3"><img src="LOGOFINAL.jpg" width="45" height="45" /></span></div></td>
    <td width="436"> <div align="left">
      <p class="Estilo3">ESTADO DE CUENTA</p>
    </div></td>
    <td width="516"><div align="right" class="Estilo3"><font size="3" face="Papyrus">
      <?
 					print ($row['nombre']);
					?>
    </font></div></td>
  </tr>
  <tr>
    <td colspan="3" scope="row"><div align="right" class="Estilo4">U.S.I.M.R.A. </div></td>
  </tr>
</table>

<table width="1024" border="1" bordercolor="#000000">
  <tr>
    <td width="52" rowspan="2"><div align="center"><strong>A&Ntilde;OS</strong></div></td>
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

<p>
</p>

</table>

<?
$año = date("Y")-5;
$añofin = date("Y");
while($año<=$añofin) {
?>

<table width="1024" border="1">
  <tr>
    <td width="52"> <div align="left"><strong><? echo $año; ?></strong></div></td>
    
<?
	//ENERO
	$mes = 1;
	$descri = estado($del,$empcod,$año,$mes);
	if ($descri == "PAGO") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "ACUER.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=acuerdosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "P.DIF.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosAnteControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if (($descri == "NO PAGO") || ($descri == "JUICI.") || ($descri == "S.DJ.")) {
	print ("<td width=81><div align=center><font face=Verdana size=1>$descri</font></div></td>");
	}
	
	//FEBRERO
	$mes = 2;
	$descri = estado($del,$empcod,$año,$mes);
	if ($descri == "PAGO") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "ACUER.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=acuerdosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "P.DIF.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosAnteControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if (($descri == "NO PAGO") || ($descri == "JUICI.")|| ($descri == "S.DJ.")) {
	print ("<td width=81><div align=center><font face=Verdana size=1>$descri</font></div></td>");
	}
	
	//MARZO
	$mes = 3;
	$descri = estado($del,$empcod,$año,$mes);
	if ($descri == "PAGO") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "ACUER.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=acuerdosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "P.DIF.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosAnteControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if (($descri == "NO PAGO") || ($descri == "JUICI.")|| ($descri == "S.DJ.")) {
	print ("<td width=81><div align=center><font face=Verdana size=1>$descri</font></div></td>");
	}
	
	//ABRIL
	$mes = 4;
	$descri = estado($del,$empcod,$año,$mes);
	if ($descri == "PAGO") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "ACUER.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=acuerdosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "P.DIF.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosAnteControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if (($descri == "NO PAGO") || ($descri == "JUICI.")|| ($descri == "S.DJ.")) {
	print ("<td width=81><div align=center><font face=Verdana size=1>$descri</font></div></td>");
	}
	
	//MAYO
	$mes = 5;
	$descri = estado($del,$empcod,$año,$mes);
	if ($descri == "PAGO") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "P.DIF.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosAnteControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "ACUER.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=acuerdosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if (($descri == "NO PAGO") || ($descri == "JUICI.")|| ($descri == "S.DJ.")) {
	print ("<td width=81><div align=center><font face=Verdana size=1>$descri</font></div></td>");
	}
	
	//JUNIO
	$mes = 6;
	$descri = estado($del,$empcod,$año,$mes);
	if ($descri == "PAGO") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "ACUER.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=acuerdosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "P.DIF.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosAnteControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if (($descri == "NO PAGO") || ($descri == "JUICI.")|| ($descri == "S.DJ.")) {
	print ("<td width=81><div align=center><font face=Verdana size=1>$descri</font></div></td>");
	}
	
	//JULIO
	$mes = 7;
	$descri = estado($del,$empcod,$año,$mes);
	if ($descri == "PAGO") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "ACUER.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=acuerdosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "P.DIF.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosAnteControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if (($descri == "NO PAGO") || ($descri == "JUICI.")|| ($descri == "S.DJ.")) {
	print ("<td width=81><div align=center><font face=Verdana size=1>$descri</font></div></td>");
	}
	
	//AGOSTO
	$mes = 8;
	$descri = estado($del,$empcod,$año,$mes);
	if ($descri == "PAGO") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "ACUER.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=acuerdosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "P.DIF.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosAnteControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if (($descri == "NO PAGO") || ($descri == "JUICI.")|| ($descri == "S.DJ.")) {
	print ("<td width=81><div align=center><font face=Verdana size=1>$descri</font></div></td>");
	}

	//SEPTIEMBRE
	$mes = 9;
	$descri = estado($del,$empcod,$año,$mes);
	if ($descri == "PAGO") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "ACUER.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=acuerdosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "P.DIF.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosAnteControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if (($descri == "NO PAGO") || ($descri == "JUICI.")|| ($descri == "S.DJ.")) {
	print ("<td width=81><div align=center><font face=Verdana size=1>$descri</font></div></td>");
	}
	
	//OCTUBRE
	$mes = 10;
	$descri = estado($del,$empcod,$año,$mes);
	if ($descri == "PAGO") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "ACUER.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=acuerdosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "P.DIF.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosAnteControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if (($descri == "NO PAGO") || ($descri == "JUICI.")|| ($descri == "S.DJ.")) {
	print ("<td width=81><div align=center><font face=Verdana size=1>$descri</font></div></td>");
	}

	//NOVIEMBRE
	$mes = 11;
	$descri = estado($del,$empcod,$año,$mes);
	if ($descri == "PAGO") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "ACUER.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=acuerdosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "P.DIF.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosAnteControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if (($descri == "NO PAGO") || ($descri == "JUICI.")|| ($descri == "S.DJ.")) {
	print ("<td width=81><div align=center><font face=Verdana size=1>$descri</font></div></td>");
	}
	
	//DICIEMBRE
	$mes = 12;
	$descri = estado($del,$empcod,$año,$mes);
	if ($descri == "PAGO") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "ACUER.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=acuerdosControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if ($descri == "P.DIF.") {
	print ("<td width=81><div align=center><font face=Verdana size=1><a href=pagosAnteControl.php?empcod=".$empcod."&ano=".$año."&mes=".$mes."&del=".$del.">".$descri."</font></div></td>");
	}
	if (($descri == "NO PAGO") || ($descri == "JUICI.")|| ($descri == "S.DJ.")) {
	print ("<td width=81><div align=center><font face=Verdana size=1>$descri</font></div></td>");
	}
?>
  </tr>
</table>

<?
$año++;
}
?>
<form id="form1" name="form1" method="post" action="empresasControl.php?dele=<?=$del?>">
  <table width="1024" border="0">
    
    <tr>
      <th width="502" scope="row"> <table width="1026" border="0">
        <tr>
          <th width="536" scope="row"><div align="left"><b><font face="Verdana" size="2">
              <input name="back" type="submit" id="back" value="VOLVER" />
          </font></b></div></th>
          <th width="480" scope="row"><div align="right">
              <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
          </div></th>
        </tr>
      </table></th>
      <td width="512">&nbsp;</td>
    </tr>
    <tr>
      <th scope="row"><div align="left"><span class="Estilo5">*ACUER. = PERIODO EN ACUERDO </span></div></th>
      <td rowspan="6">&nbsp;</td>
    </tr>
    <tr>
      <th scope="row"><div align="left"><span class="Estilo5">*P.DIF. = PAGO DIFERENCIADO</span></div></th>
    </tr>
    <tr>
      <th scope="row"><div align="left"><span class="Estilo5">*JUICI. = PERIODO EN JUICIO </span></div></th>
    </tr>
    <tr>
      <th scope="row"><div align="left">
        <div align="left"><span class="Estilo5">*S. DJ.= PERIODO SIN DDJJ </span></div>
      </div></th>
    </tr>
    <tr>
      <th scope="row"><div align="left"><span class="Estilo5">*NO PAGO = PERIODO NO PAGO CON DDJJ </span></div></th>
    </tr>
    <tr>
      <th scope="row"><div align="left"><span class="Estilo5">*PAGO = PERIODO PAGO CON DDJJ </span></div></th>
    </tr>
  </table>
</form>
</body>
</html>
