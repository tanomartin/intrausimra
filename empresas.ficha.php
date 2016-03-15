<?php include ("verificaSesion.php");

$nrcuit = $_GET['nrcuit'];
$sql = "select e.*, p.nombre as provi from empresa e, provin p where e.delcod = $delcod and e.nrcuit = $nrcuit and e.provle = p.codigo";
$result = mysql_query($sql,$db); 
$row=mysql_fetch_array($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Info. Empresa</title>
</head>

<body>
<table width="546" border="0">
   <tr>
     <td width="474"><div align="right"><font size="3" face="Papyrus"><?php print ($row['nombre']); ?></font></div></td>
  </tr>
</table>
<table width="548" border="1">
  <tr>
    <th scope="row"><div align="left">Domicilio</div></th>
    <td><?php print ($row['domile']);?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Localidad</div></th>
    <td><?php print ($row['locale']);?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Provincia</div></th>
    <td><?php print ($row['provi']);?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">C.P.</div></th>
    <td><?php print ($row['copole']);?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Tel&eacute;fono</div></th>
    <td><?php print ($row['telef1']);?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">CUIT</div></th>
    <td><?php print ($row['nrcuit']);?></td>
  </tr>
  <tr>
    <th scope="row"><div align="left">Fecha Inicio </div></th>
    <td><?php print ($row['fecini']);?></td>
  </tr>
  <tr>
    <th colspan="2" scope="row"><div align="right">U.S.I.M.R.A</div></th>
  </tr>
</table>
<input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
</body>
</html>
