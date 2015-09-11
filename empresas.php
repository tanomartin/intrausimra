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

<script>
function mypopup(dire, empre) {
	titulo = "Info Empresa " + empre;
    mywindow = window.open(dire, titulo, "location=1, width=600, height=350, top=30, left=40, resizable=0");
}
</script>

</head>
<body>
<form id="form1" name="form1" method="post" action="empresas.php">
<div align="center">
	<table width="900" border="0" style="margin-bottom: 10px">
	  <tr>
	    <td height="88" colspan="4" class="Estilo3" valign="middle"><img src="LOGOFINAL.jpg" width="60" height="60" align="middle" />  EMPRESAS</td>
	    <td class="Estilo4"><div align="right">U.S.I.M.R.A. </div></td>
	  </tr>
	  <tr>
	    <td colspan="3"><div align="left"><b><font face="Verdana" size="2">
	      <input type="button" name="back" value="VOLVER" onclick="location.href='menu.php'"/>
	    </font></b></div></td>
	    <td width="405">    
	        <div align="center">Seleccione el orden:
	          <select name="orden" id="orden">
	            <option value="nombre" >Nombre</option>
	            <option value="nrcuit">C.U.I.T.</option>
	          </select>
	          <b><font face="Verdana" size="2">
	          <input name="back2" type="submit" id="back2" value="LISTAR" />
	        </font></b></div>
	      <div align="center"></div></td>
	    <td><div align="right">
	      <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
	    </div></td>
	  </tr>
	</table>
	<table border="1" width="900" style="border-color: #CD8C34; text-align: center; font-family: Verdana, Geneva, sans-serif; font-size: 11px" cellpadding="2" cellspacing="0">
	  <tr>
	  	<th>CUIT</th>
	    <th>Raz&oacute;n Social </th>
	    <th>+ Info</th>
		<th>Nómina de Empleados </th>
	  </tr>
	<?php
	while ($row=mysql_fetch_array($result)) { ?>
		<tr>
			<td><?php echo $row['nrcuit'] ?></td>
			<td><?php echo $row['nombre'] ?></td>
			<td><a href="javascript:mypopup('infoTotal.php?nrcuit=<?php echo $row['nrcuit'] ?>','<?php echo $row['empcod'] ?>')">FICHA</a></td>
			<td><a href="empleados.php?nrcuit=<?php echo $row['nrcuit'] ?>">NOMINA</a></td>
		</tr>
	<?php } ?>
	</table>
</div>
</form>
</body>
</html>
