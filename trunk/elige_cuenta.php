<? session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: http://www.usimra.com.ar/intranet/logintranet.php");
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


<body onUnload="logout.php">
<form method="POST" action="elige_cuenta.php">
<table width="730" border="0">
  <tr>
    <td width="60" scope="row"><div align="center"><span class="Estilo3"><img src="LOGOFINAL.jpg" width="45" height="45" /></span></div></td>
    <td width="468"> <div align="left">
      <p class="Estilo3">SELECCI&Oacute;N DE EMPRESA</p>
    </div></td>
    <td width="188">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" scope="row"><div align="right" class="Estilo4">U.S.I.M.R.A. </div></td>
  </tr>
</table>

<table width="324" border="0">
  <tr>
    <td width="126">Seleccione el orden: </td>
    <td width="90"><select name="orden" id="orden">
        <option value="nombre" >Nombre</option>
        <option value="empcod" selected="selected">C&oacute;digo</option>
        <option value="nrcuit">C.U.I.T.</option>
      </select></td>
    <td width="26"><label>
<?
	include ("conexion.php");
	$orden= $_POST['orden'];
	$sql = "select * from empresa where delcod = $delcod order by '$orden'";
	$result = mysql_db_query("ospimrem_intranet",$sql,$db);
?>

</label></td>
    <td width="64"><b><font face="Verdana" size="2">
      <input name="back" type="submit" id="back" value="LISTAR" />
    </font></b></td>
  </tr>
</table>
<table border="1" width="729" bordercolorlight="#D08C35" bordercolordark="#D08C35" bordercolor="#CD8C34" cellpadding="2" cellspacing="0">
  <tr>
    <td width="55"><div align="center"><strong><font size="1" face="Verdana">C&oacute;digo</font></strong></div></td>
    <td width="322"><div align="center"><strong><font size="1" face="Verdana">Raz&oacute;n Social </font></strong></div></td>
    <td width="137"><div align="center"><strong><font size="1" face="Verdana">CUIT</font></strong></div></td>
    <td width="215"><div align="center"><strong><font size="1" face="Verdana">+ Informacion </font></strong></div></td>
  </tr>
  <p>
    <? 
while ($row=mysql_fetch_array($result)) {
print ("<td width=55><font face=Verdana size=1>".$row['empcod']."</font></td>");
print ("<td width=322><font face=Verdana size=1><b>".$row['nombre']."</b></font></div></td>");
print ("<td width=137><div align=center><font face=Verdana size=1>".$row['nrcuit']."</font></td>");
print ("<td width=215><div align=center><font face=Verdana size=1><a href=estado_cuenta.php?empcod=".$row['empcod'].">".CUENTA."</font></div></td>");
print ("</tr>");
}
?>
  </p>
</table>
</form>
<p><b><font face="Verdana" size="2">
  <input name="back3" type="submit" id="back3" value="VOLVER" onclick= "location.href='menu.php'"/>
</font></b></p>
</body>
</html>
