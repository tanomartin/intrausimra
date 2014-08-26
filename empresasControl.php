<?php include ("verificaSesion.php");

if (isset($_POST['orden'])) {
	$orden = $_POST['orden'];
} else {
	$orden = "empcod";
}

$dele = $_GET['dele'];
$sql = "select * from empresa where delcod = $dele order by $orden";
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
</head>
<script>
function mypopup(dire, empre) {
	titulo = "Info Empresa " + empre;
    mywindow = window.open(dire, titulo, "location=1, width=600, height=350, top=30, left=40, resizable=0");
}
</script>
<body>

<form id="form1" name="form1" method="post" action="empresasControl.php?dele=<?php echo $dele?>">
<table width="1025" border="0">
  <tr>
    <td width="61" scope="row"><div align="center"><span class="Estilo3"><img src="LOGOFINAL.jpg" width="49" height="49" /></span></div></td>
    <td colspan="2"> <div align="left">
      <p class="Estilo3">EMPRESAS</p>
    </div></td>
    <td width="313"></p>
      <div align="right">
      <div align="right" class="Estilo3"><?php print ("Delegación: "."$dele");?></div></td>
  </tr>
  
  <tr>
    <td colspan="2">
	  <div align="left"><b><font face="Verdana" size="2">
	    <input type="button" name="back" value="VOLVER" onclick="location.href='menuControl.php'"/>
      </font></b></div></td>
    <td width="381"><div align="center">Seleccione el orden:
      <select name="orden" id="orden">
        <option value="nombre" >Nombre</option>
        <option value="empcod">C&oacute;digo</option>
        <option value="nrcuit">C.U.I.T.</option>
        </select>
        <b><font face="Verdana" size="2">
          <input name="back2" type="submit" id="back2" value="LISTAR" />
        </font></b></div></td>
    <td>
      <div align="right">
        <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
        </div></td>
  </tr>
</table>
<table border="1" width="1025" bordercolorlight="#D08C35" bordercolordark="#D08C35" bordercolor="#CD8C34" cellpadding="2" cellspacing="0">
  <tr>
    <td width="62"><div align="center"><strong><font size="1" face="Verdana">Delegaci&oacute;n</font></strong></div></td>
    <td width="56"><div align="center"><strong><font size="1" face="Verdana">C&oacute;digo</font></strong></div></td>
    <td width="331"><div align="center"><strong><font size="1" face="Verdana">Raz&oacute;n Social </font></strong></div></td>
    <td width="161"><div align="center"><strong><font size="1" face="Verdana">CUIT</font></strong></div></td>
    <td width="138"><div align="center"><strong><font size="1" face="Verdana">+ Informacion </font></strong></div></td>
	<td width="114"><div align="center"><strong><font size="1" face="Verdana">Nómina de Empleados </font></strong></div></td>
    <td width="119"><div align="center"><strong><font size="1" face="Verdana"><font size="1">Cuentas</font> </font></strong></div></td>
  </tr>
  <p>
<?php
while ($row=mysql_fetch_array($result)) {
	print ("<td width=62><font face=Verdana size=1>".$row['delcod']."</font></td>");
	print ("<td width=56><font face=Verdana size=1>".$row['empcod']."</font></td>");
	print ("<td width=331><font face=Verdana size=1><b>".$row['nombre']."</b></font></div></td>");
	print ("<td width=161><div align=center><font face=Verdana size=1>".$row['nrcuit']."</font></td>");
	print ("<td width=138><div align=center><font face=Verdana size=1><a href=javascript:mypopup('infoTotalControl.php?dele=".$row['delcod']."&empcod=".$row['empcod']."',".$row['empcod'].")>".FICHA."</a></font></div></td>");
	print ("<td width=114><div align=center><font face=Verdana size=1><a href=empleadosControl.php?empcod=".$row['empcod']."&dele=".$row['delcod'].">".NOMINA."</a></font></div></td>");
	print ("<td width=119><div align=center><font face=Verdana size=1><a href=estado_cuentaControl.php?empcod=".$row['empcod']."&dele=".$row['delcod'].">".CUENTA."</a></font></div></td>");
	print ("</tr>");
}
?>
 </table>

</form>

</body>
</html>
