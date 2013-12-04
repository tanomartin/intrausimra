<? session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: http://www.usimra.com.ar/intranet/logintranet.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Info. Empresa</title>
<style type="text/css">
<!--
.Estilo3 {	font-family: Papyrus;
	font-weight: bold;
	color: #999999;
	font-size: 24px;
}
-->
</style>
</head>

<?
include ("conexion.php");
$sql = "select * from empresa where delcod = $delcod and empcod = '$empcod'";
$result = mysql_db_query("ospimrem_intranet",$sql,$db); 
$row=mysql_fetch_array($result);
$prov = $row['provle'];

$sql1 = "select * from provin where codigo = '$prov'";
$result1 = mysql_db_query("ospimrem_intranet",$sql1,$db); 
$row1=mysql_fetch_array($result1);

?>


<body onUnload="logout.php">
<form id="form1" name="form1" method="post" action="empresas.php">
<table width="546" border="0">
   <tr>
     <th width="56" scope="row"><span class="Estilo3"><img src="LOGOFINALBLANCO.jpg" width="44" height="44" /></span></th>
     <td width="474"><div align="right"><font size="3" face="Papyrus">
       <?
 					print ($row['nombre']);
					?>
     </font></div></td>
  </tr>
 </table>
<table width="548" border="1">
  <tr>
    <th width="167" scope="row"><div align="left">C&oacute;digo Empresa </div></th>
    <td width="365"><?
 						print ($row['empcod']);
					?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Domicilio</div></th>
    <td><?
 						print ($row['domile']);
					?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Localidad</div></th>
    <td><?
 						print ($row['locale']);
					?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Provincia</div></th>
    <td><?
 						print ($row1['nombre']);
					?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">C.P.</div></th>
    <td><?
 						print ($row['copole']);
					?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Tel&eacute;fono</div></th>
    <td><?
 						print ($row['telef1']);
					?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">CUIT</div></th>
    <td><?
 						print ($row['nrcuit']);
					?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Fecha Inicio </div></th>
    <td><?
 						print ($row['fecini']);
					?></td>
  </tr>
  <tr>
    <th colspan="2" scope="row"><div align="right">U.S.I.M.R.A</div></th>
  </tr>
</table>
<table width="549" border="0">
  <tr>
    <th width="270" scope="row">
      <div align="left"><b><font face="Verdana" size="2">
        <input name="back" type="submit" id="back" value="VOLVER" />
      </font></b></div></th>
    <th width="271" scope="row"><div align="right">
      <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
    </div></th>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp; </p>
</form>
</body>
</html>
