<? session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: http://www.usimra.com.ar/intranet/logintranet.php");
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
</head>
<body onUnload="logout.php">
<?
include ("conexion.php");
$sql = "select * from empresa where delcod = '$del' and empcod = '$empcod'";
$result = mysql_db_query("ospimrem_intranet",$sql,$db); 
$row = mysql_fetch_array($result);
$nrocuit = $row['nrcuit'];
$dele = "$del";
?>
<form id="form1" name="form1" method="post" action="empleadosControl.php?del=<?=$dele?>&empcod=<?=$empcod?>">
<table width="935" border="0">
  <tr>
    <td scope="row"><div align="center"><span class="Estilo3"><img src="LOGOFINAL.jpg" width="49" height="49" /></span></div></td>
    <td colspan="2" scope="row"> <div align="left">
      <p class="Estilo3">NOMINA DE EMPLEADOS</p>
    </div></td>
    <td width="313"><div align="right" class="Estilo3"><font size="2" face="Papyrus">
      <?
 					print ($row['nombre']);
					?>
    </font></div></td>
  </tr>
  <tr>
    <td colspan="4" scope="row"><div align="right"><span class="Estilo4">U.S.I.M.R.A. </span></div></td>
  </tr>
  <tr>
    <td width="81">Seleccione el orden: </td>
    <td width="85"><select name="orden" id="orden">
      <option value="apelli">Apellido</option>
      <option value="nrcuil">C.U.I.L.</option>
                    </select></td>
    <td width="438"><label><b><font face="Verdana" size="2">
      <input name="back2" type="submit" id="back2" value="LISTAR" />
    </font></b> </label></td>
    <td>&nbsp;</td>
  </tr>
</table>

<table border="1" width="935" bordercolorlight="#D08C35" bordercolordark="#D08C35" bordercolor="#CD8C34" cellpadding="2" cellspacing="0">
<tr>
    <td width="99"><div align="center"><strong><font size="1" face="Verdana">CUIL</font></strong></div></td>
    <td width="338"><div align="center"><strong><font size="1" face="Verdana">Nombre</font></strong></div></td>
    <td width="338"><div align="center"><strong><font size="1" face="Verdana">Apellido</font></strong></div></td>
    <td width="168"><div align="center"><strong><font size="1" face="Verdana">+ Informacion </font></strong></div></td>
</tr>
<p>
<?
$sql = "select * from empleados where nrcuit = '$nrocuit' order by '$orden'";
$result = mysql_db_query("ospimrem_aplicativo",$sql,$db); 
while ($row=mysql_fetch_array($result)) {
	print ("<td width=99><div align=center><font face=Verdana size=1>".$row['nrcuil']."</font></div></td>");
	print ("<td width=338><font face=Verdana size=1>".$row['nombre']."</font></td>");
	print ("<td width=338><font face=Verdana size=1>".$row['apelli']."</font></td>");
	print ("<td width=168><div align=center><font face=Verdana size=1><a href=infoTotalEmpleadoControl.php?cuil=".$row['nrcuil']."&cuit=".$nrocuit."&empcod=".$empcod."&del=".$dele.">".FICHA."	</font></div></td>");
	print ("</tr>");
}
?>
</p>
 </table>

</form>
<form id="form2" name="form2" method="post" action="empresasControl.php?dele=<?=$dele?>">
  <table width="934" border="0">
    <tr>
      <th width="424" scope="row"><div align="left"><b><font face="Verdana" size="2">
          <input name="back" type="submit" id="back" value="VOLVER" />
      </font></b></div></th>
      <th width="500" scope="row"><div align="right">
          <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
      </div></th>
    </tr>
  </table>
</form>
</body>
</html>
