<? session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: http://www.usimra.com.ar/intranet/logintranet.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Empresas</title>
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
-->
</style>
</head>

<?

$delegaciones = array(1002, 1101, 1102 ,1103, 1106, 1107, 1108, 1109, 
					  1110, 1201, 1202, 1203, 1301, 1302, 1401, 1402,
					  1501, 1601, 1701, 1702, 1703, 1802, 1901, 2001,
					  2101, 2102, 2103, 2201, 2301, 2401, 2402, 2403,
					  2501, 2602, 2603, 2604, 2701, 2801);

include ("conexion.php");

?>


<body onUnload="logout.php">
<table width="1142" border="0">
  <tr>
    <td width="566" height="28" scope="row"><div align="left"><span class="Estilo3">Control Actualizaci&oacute;n </span></div></td>
    <td width="566" scope="row"><div align="right"><span class="Estilo4">
    U.S.I.M.R.A</span></div></td>
  </tr>
</table>

<table border="1" width="1145" bordercolorlight="#D08C35" bordercolordark="#D08C35" bordercolor="#CD8C34" cellpadding="2" cellspacing="0">
  <tr>
    <td width="143"><div align="center"><strong><font size="1" face="Verdana">C&oacute;digo</font></strong></div></td>
    <td width="143"><div align="center"><strong><font size="1" face="Verdana">Empresa</font></strong></div></td>
	<td width="143"><div align="center"><strong><font size="1" face="Verdana">Cabacuer</font></strong></div></td>
	<td width="143"><div align="center"><strong><font size="1" face="Verdana">Detacuer</font></strong></div></td>
    <td width="143"><div align="center"><strong><font size="1" face="Verdana">Cuoacuer</font></strong></div></td>
    <td width="143"><div align="center"><strong><font size="1" face="Verdana">Ddjjnopa</font></strong></div></td>
    <td width="143"><div align="center"><strong><font size="1" face="Verdana">Pagos</font></strong></div></td>
	<td width="143"><div align="center"><strong><font size="1" face="Verdana">Juicios</font></strong></div></td>
  </tr>
  <p>
<?
for($i=0; $i<sizeof($delegaciones); $i++) {
	$sql = "select count(*) from empresa where delcod = $delegaciones[$i]";
	$result = mysql_db_query("ospimrem_intranet",$sql,$db); 
	$count = mysql_fetch_array($result); 
	print ("<td width=143 align='center'><font face=Verdana size=1><b>".$delegaciones[$i]."</b></font></td>");
	print ("<td width=143><font face=Verdana size=1>".$count['0']."</font></td>");
	$totEmp = $totEmp + $count['0'];
	
	$sql = "select count(*) from cabacuer where delcod = $delegaciones[$i]";
	$result = mysql_db_query("ospimrem_intranet",$sql,$db); 
	$count = mysql_fetch_array($result); 
	print ("<td width=143><font face=Verdana size=1>".$count['0']."</font></td>");
	$totCab = $totCab + $count['0'];
	
	$sql = "select count(*) from detacuer where delcod = $delegaciones[$i]";
	$result = mysql_db_query("ospimrem_intranet",$sql,$db); 
	$count = mysql_fetch_array($result); 
	print ("<td width=143><font face=Verdana size=1>".$count['0']."</font></td>");
	$totDet = $totDet + $count['0'];
	
	$sql = "select count(*) from cuoacuer where delcod = $delegaciones[$i]";
	$result = mysql_db_query("ospimrem_intranet",$sql,$db); 
	$count = mysql_fetch_array($result); 
	print ("<td width=143><font face=Verdana size=1>".$count['0']."</font></td>");
	$totCuo = $totCuo + $count['0'];
	
	$sql = "select count(*) from ddjjnopa where delcod = $delegaciones[$i]";
	$result = mysql_db_query("ospimrem_intranet",$sql,$db); 
	$count = mysql_fetch_array($result); 
	print ("<td width=143><font face=Verdana size=1>".$count['0']."</font></td>");
	$totDdj = $totDdj + $count['0'];
	
	$sql = "select count(*) from pagos where delcod = $delegaciones[$i]";
	$result = mysql_db_query("ospimrem_intranet",$sql,$db); 
	$count = mysql_fetch_array($result); 
	print ("<td width=143><font face=Verdana size=1>".$count['0']."</font></td>");
	$totPag = $totPag + $count['0'];

	$sql = "select count(*) from juicios where delcod = $delegaciones[$i]";
	$result = mysql_db_query("ospimrem_intranet",$sql,$db); 
	$count = mysql_fetch_array($result); 
	print ("<td width=143><font face=Verdana size=1>".$count['0']."</font></td>");
	$totJui = $totJui + $count['0'];
	
	print ("</tr>");
}
print ("<td width=143 align='center'><font face=Verdana size=1><b>".TOTALES."</b></font></td>");
print ("<td width=143 align='center'><font face=Verdana size=1><b>".$totEmp."</b></font></td>");
print ("<td width=143 align='center'><font face=Verdana size=1><b>".$totCab."</b></font></td>");
print ("<td width=143 align='center'><font face=Verdana size=1><b>".$totDet."</b></font></td>");
print ("<td width=143 align='center'><font face=Verdana size=1><b>".$totCuo."</b></font></td>");
print ("<td width=143 align='center'><font face=Verdana size=1><b>".$totDdj."</b></font></td>");
print ("<td width=143 align='center'><font face=Verdana size=1><b>".$totPag."</b></font></td>");
print ("<td width=143 align='center'><font face=Verdana size=1><b>".$totJui."</b></font></td>");
print ("</tr>");

?>
</p>
</table>
<form id="form2" name="form2" method="post" action="menuControl.php">
  <table width="1142" border="0">
     <tr>
       <td width="567" height="28" scope="row"><div align="left">
         <input name="back" type="submit" id="back" value="VOLVER" />
       </div></td>
       <td width="565" scope="row"><div align="right"><span class="Estilo4">
         <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
       </span></div></td>
    </tr>
   </table>
</form>
</body>
</html>
