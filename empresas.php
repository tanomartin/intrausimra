<?php session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: logintranet.php?err=2");

include ("conexion.php");
if (isset($_POST['orden'])) {
	$orden = $_POST['orden'];
} else {
	$orden = "empcod";
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
</head>
<script>

function mypopup(dire, empre) {
	titulo = "Info Empresa " + empre;
    mywindow = window.open(dire, titulo, "location=1, width=600, height=350, top=30, left=40, resizable=0");
}

</script>

<body>
<form id="form1" name="form1" method="post" action="empresas.php">
<table width="1025" border="0">
  <tr>
    <td width="75" scope="row"><div align="center"><span class="Estilo3"><img src="LOGOFINAL.jpg" width="47" height="49" /></span></div></td>
    <td colspan="3" scope="row"><div align="left">
      <p class="Estilo3">EMPRESAS</p>
    </div></td>
    <td width="298"><div align="right" class="Estilo4">U.S.I.M.R.A. </div></td>
  </tr>
  
  <tr>
    <td colspan="3"><div align="left"><b><font face="Verdana" size="2">
      <input type="button" name="back" value="VOLVER" onclick="location.href='menu.php'"/>
    </font></b></div></td>
    <td width="405">
      
        <div align="center">Seleccione el orden:

          <select name="orden" id="orden">
            <option value="nombre" >Nombre</option>
            <option value="empcod">C&oacute;digo</option>
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
<table border="1" width="1025" bordercolorlight="#D08C35" bordercolordark="#D08C35" bordercolor="#CD8C34" cellpadding="2" cellspacing="0">
  <tr>
    <td width="111"><div align="center"><strong><font size="1" face="Verdana">C&oacute;digo</font></strong></div></td>
    <td width="363"><div align="center"><strong><font size="1" face="Verdana">Raz&oacute;n Social </font></strong></div></td>
    <td width="250"><div align="center"><strong><font size="1" face="Verdana">CUIT</font></strong></div></td>
    <td width="150"><div align="center"><strong><font size="1" face="Verdana">+ Informacion </font></strong></div></td>
	<td width="150"><div align="center"><strong><font size="1" face="Verdana">Nómina de Empleados </font></strong></div></td>
  </tr>
  <p>
<?php
while ($row=mysql_fetch_array($result)) {
	print ("<td width=111><font face=Verdana size=1>".$row['empcod']."</font></td>");
	print ("<td width=363><font face=Verdana size=1><b>".$row['nombre']."</b></font></div></td>");
	print ("<td width=250><div align=center><font face=Verdana size=1>".$row['nrcuit']."</font></td>");
	print ("<td width=150><div align=center><font face=Verdana size=1><a href=javascript:mypopup('infoTotal.php?empcod=".$row['empcod']."',".$row['empcod'].")>".FICHA."</a></font></div></td>");
	print ("<td width=150><div align=center><font face=Verdana size=1><a href=empleados.php?empcod=".$row['empcod'].">".NOMINA."</a></font></div></td>");
	print ("</tr>");
}
?>
</p>
</table>
</form>
</body>
</html>
