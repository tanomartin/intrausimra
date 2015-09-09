<?php include ("verificaSesion.php");

if (isset($_POST['orden'])) {
	$orden = $_POST['orden'];
} else {
	$orden = "apelli";
}

$dele = $_GET['dele'];
$empcod = $_GET['empcod'];
$sql = "select * from empresa where delcod = $dele and empcod = '$empcod'";
$result = mysql_query($sql,$db); 
$rowEmpre = mysql_fetch_array($result);

mysql_select_db('ospimrem_newaplicativo');
$nrocuit = $rowEmpre['nrcuit'];
$sql = "select * from empleados where nrcuit = '$nrocuit' order by $orden";
$result = mysql_query($sql,$db); 

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
-->
</style>

<script>
function mypopup(dire, emple) {
	titulo = "Info Empresa " + emple;
    mywindow = window.open(dire, titulo, "location=1, width=1080, height=600, top=30, left=40, resizable=0");
}
</script>

</head>

<body>
<form id="form1" name="form1" method="post" action="empleadosControl.php?dele=<?php echo $dele?>&empcod=<?php echo $empcod?>">
<table width="935" border="0" style="margin-bottom: 10px">
  <tr>
    <td width="49" scope="row"><div align="center"><span class="Estilo3"><img src="LOGOFINAL.jpg" width="49" height="49" /></span></div></td>
    <td colspan="2" scope="row"> <div align="left">
      <p class="Estilo3">NOMINA DE EMPLEADOS</p>
    </div></td>
    <td width="245"><div align="right" class="Estilo3"><font size="2" face="Papyrus">
      <?php print ($rowEmpre['nombre']); ?>
    </font></div></td>
  </tr>
  
  <tr>
    <td colspan="2"><label></label>
      <div align="left"><b><font face="Verdana" size="2">
        <input type="button" name="back" value="VOLVER" onclick="location.href='empresasControl.php?dele=<?php echo $dele?>'"/>
      </font></b></div></td>
    <td width="401"><div align="center">
      <font face="Verdana" size="2">Seleccione el orden:<b>
      <select name="orden" id="orden">
        <option value="apelli">Apellido</option>
        <option value="nrcuil">C.U.I.L.</option>
        </select>
      </b></font><b><font face="Verdana" size="2">
      <input name="back2" type="submit" id="back2" value="LISTAR" />
      </font></b></div>      
      <b><font face="Verdana" size="2"><label></label>
      </font></b></td>
    <td><div align="right">
      <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
    </div></td>
  </tr>
</table>
  <table border="1" width="935" cellpadding="2" cellspacing="0" style="border-color: #CD8C34; text-align: center; font-family: Verdana, Geneva, sans-serif; font-size: 11px">
	<tr>
	    <th>CUIL</th>
	    <th>Nombre</th>
	    <th>Apellido</th>
	    <th>+ Info</th>
	</tr>
<?php

while ($row=mysql_fetch_array($result)) { ?>
	<tr>
		<td><b><?php echo $row['nrcuil'] ?></b></td>
		<td><?php echo $row['nombre'] ?></td>
		<td><?php echo $row['apelli'] ?></td>
		<td><a href="javascript:mypopup('infoTotalEmpleadoControl.php?cuil=<?php echo $row['nrcuil'] ?>&cuit=<?php echo $nrocuit ?>&empcod=<?php echo $empcod ?>&dele=<?php echo $dele ?>','<?php echo $row['nrcuil'] ?>')">FICHA</a></td>
	</tr>
<?php } ?>
 </table>
</form>
</body>
</html>
