<?php include ("verificaSesion.php");
if (isset($_POST['orden'])) {
	$orden = $_POST['orden'];
} else {
	$orden = "nrcuit";
}

$sql = "select * from empresa where delcod = $delcod order by $orden";
$result = mysql_query($sql,$db);
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
-->
</style>
</head>


<body>
<form method="post" action="elige_cuenta.php">
<div align="center">
	<table width="700" border="0" style="margin-bottom: 10px">
	  <tr>
	    <td width="40"><div align="center"><span class="Estilo3"><img src="LOGOFINAL.jpg" width="60" height="60" /></span></div></td>
	    <td><p class="Estilo3" align="left">SELECCI&Oacute;N DE EMPRESA</p></td>
	    <td><div align="right" class="Estilo4">U.S.I.M.R.A. </div></td>
	  </tr>
	</table>
	
	<table width="700" border="0" style="margin-bottom: 10px">
	  <tr>
	    <td width="325"><div align="left">Seleccione el orden: 
	      <select name="orden" id="orden">
	        <option value="nombre" >Nombre</option>
	        <option value="nrcuit">C.U.I.T.</option>
	        </select>
	        <b><font face="Verdana" size="2">
	          <input name="back2" type="submit" id="back" value="LISTAR" />
	        </font></b></div></td>
	    <td width="394"><div align="right">
	      <input type="button" name="back" value="VOLVER" onclick="location.href='menu.php'"/>
	    </div></td>
	    </tr>
	</table>
	<table border="1" width="700" style="border-color: #CD8C34; text-align: center; font-family: Verdana, Geneva, sans-serif; font-size: 11px" cellpadding="2" cellspacing="0">
	  <tr>
	  	<th>CUIT</th>
	    <th>Raz&oacute;n Social </th>
	    <th>+ Info </th>
	  </tr>
	
	<?php
	while ($row=mysql_fetch_array($result)) { ?>
		<tr>
			<td><?php echo $row['nrcuit'] ?></td>
			<td><?php echo $row['nombre'] ?></td>
			<td><a href="estado_cuenta.php?nrcuit=<?php echo $row['nrcuit'] ?>">CUENTA</a></td>
		</tr>
	<?php } ?>
	</table>
</div>
</form>
</body>
</html>
