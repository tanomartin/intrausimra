<?php include ("verificaSesion.php");
if (isset($_POST['orden'])) {
	$orden = $_POST['orden'];
} else {
	$orden = "apelli";
}
$nrcuit = $_GET['nrcuit'];
$sql = "select * from empresa where delcod = $delcod and nrcuit = $nrcuit";
$result = mysql_query($sql,$db); 
$row = mysql_fetch_array($result);

$nrcuit = $row['nrcuit'];
mysql_select_db('ospimrem_newaplicativo');
$sql = "select * from empleados where nrcuit = $nrcuit order by $orden";
$result = mysql_query($sql,$db); 
$cantEmp = mysql_num_rows($result);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Empleados</title>
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
<script>

function mypopup(dire, emple) {
	titulo = "Info Empleado " + emple;
    mywindow = window.open(dire, titulo, "location=1, width=1080, height=600, top=30, left=40, resizable=1");
}

</script>

</head>
<body>
<form id="form1" name="form1" method="post" action="empleados.php?nrcuit=<?php echo $nrcuit?>">
<table width="900" border="0" style="margin-bottom: 10px">
  <tr>
    <td width="65" scope="row"><div align="left"><span class="Estilo3"><img src="LOGOFINAL.jpg" width="47" height="49" /></span></div></td>
    <td width="621"> <div align="left">
      <p class="Estilo3">NOMINA DE EMPLEADOS</p>
    </div></td>
    <td width="235"><div align="right" class="Estilo3"><font size="2" face="Papyrus">
      <?php print ($row['nombre']); ?>
    </font></div></td>
  </tr>
  <tr>
    <td scope="row"><div align="left"><b><font face="Verdana" size="2">
      <input type="button" name="back" value="VOLVER" onclick="location.href='empresas.php'"/>
    </font></b></div></td>
    <td scope="row"><div align="center"><font face="Verdana" size="2">Seleccione el orden:<b>
      <select name="orden" id="orden">
        <option value="apelli">Apellido</option>
        <option value="nrcuil">C.U.I.L.</option>
      </select>
      </b></font><b><font face="Verdana" size="2">
        <input name="back2" type="submit" id="back2" value="LISTAR" />
      </font></b></div></td>
    <td scope="row"><div align="right">
      <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
    </div></td>
  </tr>
</table>
<table border="1" width="900" style="border-color: #CD8C34; text-align: center; font-family: Verdana, Geneva, sans-serif; font-size: 11px" cellpadding="2" cellspacing="0">
<tr>
    <th>CUIL</th>
    <th>Apellido, Nombre</th>
    <th>+ Info </th>
</tr>

<?php 
	if ($cantEmp > 0) {
		while ($row=mysql_fetch_array($result)) { ?>
			<tr>
			<td><b><?php echo $row['nrcuil'] ?></b></td>
			<td><?php echo $row['apelli'].", ".$row['nombre']  ?></td>
			<td><a href="javascript:mypopup('infoTotalEmpleado.php?cuil=<?php echo $row['nrcuil'] ?>&cuit=<?php echo $nrcuit ?>','<?php echo $row['nrcuil'] ?>')">FICHA</a></td>
			</tr>
	<?php }
 	} else { ?>
	<tr>
		<td colspan="4"><b>No tiene cargada nomina de empleados</b></td>
	</tr>
<?php } ?>

 </table>
</form>

</body>
</html>
