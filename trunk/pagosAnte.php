<? session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: http://www.usimra.com.ar/intranet/logintranet.php");
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
<?
include ("conexion.php");
$sql = "select * from empresa where delcod = $delcod and empcod = '$empcod'";
$result = mysql_db_query("ospimrem_intranet",$sql,$db); 
$row = mysql_fetch_array($result);
?>

<table width="1023" border="0">
  <tr>
    <td width="57" scope="row"><div align="center"><span class="Estilo3"><img src="LOGOFINALBLANCO.jpg" width="45" height="45" /></span></div></td>
    <td width="436"><div align="left">
      <p class="Estilo3">Detalle de Pago </p>
    </div></td>
    <td width="516"><div align="right" class="Estilo3"><font size="3" face="Papyrus">
      <?
 					print ($row['nombre']);
	?>
    </font></div></td>
  </tr>
  <tr>
    <td colspan="3" scope="row"><div align="right" class="Estilo5">U.S.I.M.R.A. </div></td>
  </tr>
</table>
<table width="1019" border="0">
  <tr>
    <th scope="row">&nbsp;</th>
    <th width="393" scope="row"><table border="1" width="365" bordercolorlight="#D08C35" bordercolordark="#D08C35" bordercolor="#CD8C34" cellpadding="2" cellspacing="0">
      <tr>
        <td width="177"><div align="center"><strong><font size="1" face="Verdana">Per&iacute;odo Cancelado </font></strong></div></td>
        <td width="164"><div align="center"><strong><font size="1" face="Verdana"><font size="1">Per&iacute;odo de Pago </font></font></strong></div></td>
      </tr>
      <p>
        <?
$sql1 = "select * from peranter where delcod = $delcod and empcod = '$empcod' and anoant = '$ano' and mesant = '$mes'";;
$result1 = mysql_db_query("ospimrem_intranet",$sql1,$db); 
while ($row1=mysql_fetch_array($result1)) {
	print ("<td width=177><div align=center><font face=Verdana size=1>".$row1['mesant']."/".$row1['anoant']."</font></div></td>");
	print ("<td width=164><div align=center><font face=Verdana size=1>".$row1['mestra']."/".$row1['anotra']."</font></div></td>");
	print ("</tr>");
}
?>
      </p>
    </table></th>
    <th width="306" scope="row">&nbsp;</th>
  </tr>
</table>
<table width="1019" border="0">
  <tr>
    <th width="304" scope="row"><div align="left" class="Estilo4"><font face="Verdana">Para volver a la cuenta Bot&oacute;n atras del explorador </font></div></th>
    <th width="705" scope="row"><div align="right">
      <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
    </div></th>
  </tr>
</table>
</body>
</html>
