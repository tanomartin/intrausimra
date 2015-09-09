<?php include ("verificaSesion.php");

$delcod = $_GET['dele'];
$empcod = $_GET['empcod'];
$cuit = $_GET['cuit'];
$cuil = $_GET['cuil'];
$sql0 = "select * from empresa e where e.delcod = $delcod and e.empcod = $empcod";
$result0 = mysql_query($sql0,$db); 
$row0 = mysql_fetch_array($result0);

mysql_select_db('ospimrem_newaplicativo');
$sql = "select e.*, c.descri as catego, p.descripcion as provi from empleados e, empresa a, categorias c, provincia p where e.nrcuit = '$cuit' and e.nrcuil = '$cuil' and e.nrcuit = a.nrcuit and a.rramaa = c.codram and e.catego = c.codcat and e.provin = p.id";
$result = mysql_query($sql,$db); 
$row=mysql_fetch_array($result);
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

<body>
<form id="form1" name="form1" method="post" action="empleados.php">
<table width="546" border="0">
  <tr>
    <th width="44" scope="row"><span class="Estilo3"><img src="LOGOFINALBLANCO.jpg" width="44" height="44" /></span></th>
    <th width="218" scope="row"><div align="left"><?php print ($row0['nombre']." - Delegación: ".$delcod);?></div></th>
    <td width="270"><div align="right"><font size="3" face="Papyrus">
      <?php print ($row['nombre']."   ".$row['apelli']);?>
    </font></div></td>
  </tr>
</table>

<table width="548" border="1" style="margin-bottom: 10px">
  <tr>
    <th width="167" scope="row"><div align="left">Documento</div></th>
    <td width="365"><?php print ($row['tipdoc'].": ".$row['nrodoc']);?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Domicilio</div></th>
    <td><?php print ($row['direcc']);?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Localidad</div></th>
    <td><?php print ($row['locale']);?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Provincia</div></th>
    <td><?php print ($row['provi']);?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">C.P.</div></th>
    <td><?php print ($row['copole']);?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Fecha Nacimiento </div></th>
    <td><?php print ($row['fecnac']);?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">CUIL</div></th>
    <td><?php print ($row['nrcuil']);?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Categoria</div></th>
    <td><?php print ($row['catego']);?></td>
  </tr>
  <tr>
    <th height="23" scope="row"><div align="left">Fecha de ingreso </div></th>
    <td><?php print ($row['fecing']);?></td>
  </tr>
  <tr>
    <th height="23" scope="row"><div align="left">En Actividad</div></th>
    <td><?php print ($row['activo']);?></td>
  </tr>
</table>


<p class="Estilo3">Familiares</p>

<table border="1" width="1025" style="border-color: #CD8C34; text-align: center; font-family: Verdana, Geneva, sans-serif; font-size: 11px" cellpadding="2" cellspacing="0">
<tr>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Documento </th>
	<th>Parentesco </th>
	<th>Sexo </th>
	<th>Fecha de Nacimiento </th>
</tr>

<?php 
$sql1 = "select * from familia where nrcuit = '$cuit' and nrcuil = '$cuil'";
$result1 = mysql_query($sql1,$db); 
while ($row1=mysql_fetch_array($result1)) { ?>
	<tr>
		<td><?php echo $row1['nombre'] ?></td>
		<td><?php echo $row1['apelli'] ?></td>
		<td><?php echo $row1['tipdoc'].": ". $row1['nrodoc'] ?></td>
		<td><?php echo $row1['codpar'] ?></td>
		<td><?php echo $row1['ssexxo'] ?></td>
		<td><?php echo $row1['fecnac'] ?></td>
	</tr>
<?php } ?>
</table>
<table width="1024" border="0">
  <tr>
    <th scope="row"><div align="right">
      <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
    </div></th>
    </tr>
</table>
</form>
</body>
</html>
