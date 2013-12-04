<? session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: http://www.usimra.com.ar/intranet/logintranet.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Empleado</title>
<style type="text/css">
<!--
.Estilo3 {font-family: Papyrus;
	font-weight: bold;
	color: #999999;
	font-size: 24px;
}
.Estilo4 {
	font-size: 10px;
	font-weight: bold;
}
-->
</style>
</head>
<?
include ("conexion.php");
$sql0 = "select * from empresa where delcod = '$del' and empcod = '$empcod'";
$result0 = mysql_db_query("ospimrem_intranet",$sql0,$db); 
$row0 = mysql_fetch_array($result0);

$sql = "select * from empleados where nrcuit = '$cuit' and nrcuil = '$cuil'";
$result = mysql_db_query("ospimrem_aplicativo",$sql,$db); 
$row=mysql_fetch_array($result);
$cate = $row['catego'];
$prov = $row['provin'];

$sql2 = "select * from empresa where nrcuit = '$cuit'";
$result2 = mysql_db_query("ospimrem_aplicativo",$sql2,$db); 
$row2=mysql_fetch_array($result2);
$rama = $row2['rramaa'];

$sql3 = "select * from categorias where codram = '$rama' and codcat = '$cate'";
$result3 = mysql_db_query("ospimrem_aplicativo",$sql3,$db); 
$row3=mysql_fetch_array($result3);

$sql4 = "select * from provin where codigo = '$prov'";
$result4 = mysql_db_query("ospimrem_intranet",$sql4,$db); 
$row4=mysql_fetch_array($result4);


?>


<body onUnload="logout.php">
<form id="form1" name="form1" method="post" action="empleados.php">
<table width="546" border="0">
  <tr>
    <th width="44" scope="row"><span class="Estilo3"><img src="LOGOFINALBLANCO.jpg" width="44" height="44" /></span></th>
    <th width="218" scope="row"><div align="left"><? print ($row0['nombre']); print(" - Delegación: "); print($del);?></div></th>
    <td width="270"><div align="right"><font size="3" face="Papyrus">
      <?
 					print ($row['nombre']);
					print ("   ");
					print ($row['apelli']);
					?>
    </font></div></td>
  </tr>
</table>

<table width="548" border="1">
  <tr>
    <th width="167" scope="row"><div align="left">Documento</div></th>
    <td width="365"><?
 						print ($row['tipdoc']);
						print (": ");
						print ($row['nrodoc']);
					?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Domicilio</div></th>
    <td><?
 						print ($row['direcc']);
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
 						print ($row4['nombre']);
					?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">C.P.</div></th>
    <td><?
 						print ($row['copole']);
					?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Fecha Nacimiento </div></th>
    <td><?
 						print ($row['fecnac']);
					?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">CUIL</div></th>
    <td><?
 						print ($row['nrcuil']);
					?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Categoria</div></th>
    <td><?
 						print ($row3['descri']);
					?></td>
  </tr>
  <tr>
    <th height="23" scope="row"><div align="left">Fecha de ingreso </div></th>
    <td><?
 						print ($row['fecing']);
					?></td>
  </tr>
  <tr>
    <th height="23" scope="row"><div align="left">En Actividad</div></th>
    <td><?
 						print ($row['activo']);
					?></td>
  </tr>
</table>


<p class="Estilo3">Familiares</p>

<table border="1" width="1025" bordercolorlight="#D08C35" bordercolordark="#D08C35" bordercolor="#CD8C34" cellpadding="2" cellspacing="0">
<tr>
    <td width="111"><div align="center"><strong><font size="1" face="Verdana">Nombre</font></strong></div></td>
    <td width="111"><div align="center"><strong><font size="1" face="Verdana">Apellido</font></strong></div></td>
    <td width="111"><div align="center"><strong><font size="1" face="Verdana">Documento </font></strong></div></td>
	<td width="111"><div align="center"><strong><font size="1" face="Verdana">Parentesco </font></strong></div></td>
	<td width="111"><div align="center"><strong><font size="1" face="Verdana">Sexo </font></strong></div></td>
	<td width="111"><div align="center"><strong><font size="1" face="Verdana">Fecha de Nacimiento </font></strong></div></td>
</tr>
<p>
<?
$sql1 = "select * from familia where nrcuit = '$cuit' and nrcuil = '$cuil'";
$result1 = mysql_db_query("ospimrem_aplicativo",$sql1,$db); 
while ($row1=mysql_fetch_array($result1)) {
	print ("<td width=111><font face=Verdana size=1>".$row1['nombre']."</font></td>");
	print ("<td width=111><font face=Verdana size=1>".$row1['apelli']."</font></td>");
	print ("<td width=111><font face=Verdana size=1>".$row1['tipdoc'].": ".$row1['nrodoc']."</font></td>");
	print ("<td width=111><font face=Verdana size=1>".$row1['codpar']."</font></td>");
	print ("<td width=111><font face=Verdana size=1>".$row1['ssexxo']."</font></td>");
	print ("<td width=111><font face=Verdana size=1>".$row1['fecnac']."</font></td>");
	print ("</tr>");
}
?>
</p>
</table>


<table width="1024" border="0">
  <tr>
    <th width="304" scope="row"><div align="left" class="Estilo4"><font face="Verdana">Para volver a la nomina Bot&oacute;n atras del explorador </font></div></th>
    <th width="707" scope="row"><div align="right">
      <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
    </div></th>
  </tr>
</table>
</form>
</body>
</html>
