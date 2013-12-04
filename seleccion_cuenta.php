<? session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: http://www.usimra.com.ar/intranet/logintranet.html");
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

<table width="1012" border="0">
  <tr>
    <td width="58" scope="row"><div align="center"><span class="Estilo3"><img src="../../../public_html/intranet/LOGOFINAL.jpg" width="34" height="38" /></span></div></td>
    <td width="447"> <div align="left">
      <p class="Estilo3">SELECCI&Oacute;N DE EMPRESA</p>
    </div></td>
    <td width="447"><div align="right" class="Estilo3"></div></td>
  </tr>
  <tr>
    <td colspan="3" scope="row"><div align="right" class="Estilo4">U.S.I.M.R.A. </div></td>
  </tr>
</table>

<table width="291" border="0">
  <tr>
    <td width="99">Ordenado por </td>
    <td width="85"><select name="select">
        <option value="1" selected="selected">Nombre</option>
        <option value="2">C&oacute;digo</option>
        <option value="3">C.U.I.T.</option>
                                                      </select></td>
    <td width="85"><label>
<?
include ("conexion.php");
$sql = "select * from empresa where delcod = $delcod";
$result = mysql_db_query("ospimrem_intranet",$sql,$db);
?>
</label></td>
  </tr>
</table>
<table width="940" border="0">
  <tr>
    <td width="100">Empresa</td>
    <td width="824"><label>
      <select name="select2">
<?
while ($row=mysql_fetch_array($result)) {
?>
<option value="<? echo $row['empcod'];?>"><? echo $row['nombre'];?><? echo $row['nrcuit'];?></option>
<?
}
?>
      </select>
    </label></td>
  </tr>
</table>
<p>
  <label></label>
</p>
<table width="1007" border="0">
  <tr>
   <th width="467" scope="row"><div align="left"><b><font face="Verdana" size="2"><a href="../../../public_html/intranet/menu.php">
      <input name="back" type="submit" id="back" value="VOLVER" />
    </a></font></b></div></th>
    <th width="530" scope="row"><div align="right"><b><font face="Verdana" size="2"><a href="../../../public_html/intranet/estado_cuenta.php">
      <input name="back2" type="submit" id="back2" value="CUENTA" />
    </a></font></b></div></th>
  </tr>
</table>
</body>
</html>
