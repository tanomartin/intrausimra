<?php session_save_path("sesiones");
session_start();
if($_SESSION['delcod'] == null)
	header ("Location: logintranet.php?err=2");

include ("conexion.php");

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
</head>
<script>
function mypopup(dire, emple) {
	titulo = "Info Empresa " + emple;
    mywindow = window.open(dire, titulo, "location=1, width=1080, height=600, top=30, left=40, resizable=0");
}
</script>
<body>
<form id="form1" name="form1" method="post" action="empleadosControl.php?dele=<?php echo $dele?>&empcod=<?php echo $empcod?>">
<table width="935" border="0">
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
      <div align="center"></div>
      </font></b></td>
    <td><div align="right">
      <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
    </div></td>
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
<?php

while ($row=mysql_fetch_array($result)) {
	print ("<td width=99><div align=center><font face=Verdana size=1>".$row['nrcuil']."</font></div></td>");
	print ("<td width=338><font face=Verdana size=1>".$row['nombre']."</font></td>");
	print ("<td width=338><font face=Verdana size=1>".$row['apelli']."</font></td>");
	print ("<td width=168><div align=center><font face=Verdana size=1><a href=javascript:mypopup('infoTotalEmpleadoControl.php?cuil=".$row['nrcuil']."&cuit=".$nrocuit."&empcod=".$empcod."&dele=".$dele."',".$row['nrcuil'].")>".FICHA."</a></font></div></td>");
	print ("</tr>");
}
?>
</p>
 </table>
</form>
</body>
</html>
