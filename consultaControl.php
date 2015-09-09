<?php include ("verificaSesion.php"); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Mándanos tus comentarios</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #E2DDB8;
}
.Estilo3 {	font-family: Papyrus;
	font-weight: bold;
	color: #999999;
}
-->
</style></head>
<body onUnload="logout.php" text="#003300" link="#006060" vlink="#006060">

<form action="enviarControl.php" method="post"> 

  <p align="center" class="Estilo3">FORMULARIO DE CONSULTA </p>
  <p align="center"><img src="LOGOFINAL.jpg" width="129" height="129"></p>
  <p align="center"><?php 
  				if (isset($_GET['err'])) {
	  				$err = $_GET['err'];
					if ($err == 1) {
	  		  			print("<div align='center' style='color:#FF0000'><b> ERROR AL ENVIAR EL MENSAJE INTENTELO NUEVAMENTE </b></div>");
					}
	  			} ?></p>
  <div align="center">
    <table width="1024" border="1">
      <tr>
        <th width="414" scope="row"><div align="right">Nombre y Apellido: </div></th>
        <td width="594"><input type="text" name="nombre" id="nombre" size=70></td>
      </tr>
      <tr>
        <th scope="row"><div align="right">Email:</div></th>
        <td><input type="text" name="email" id="email" size=70></td>
      </tr>
      <tr>
        <th scope="row"><div align="right">Telefono:</div></th>
        <td><input type="text" name="telefono" id="telefono" size=70></td>
      </tr>
      <tr>
        <th scope="row"><div align="right">Consulta:</div></th>
        <td rowspan="2"><textarea name="coment" id="coment" cols=67 rows=10></textarea></td>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th>
      </tr>
    </table>
    <table width="1025" border="1">
      <tr>
        <th scope="row">
          <div align="center">
            <input name="submit2" type="submit" value="Enviar">
          </div></th>
      </tr>
    </table>
    <br>
  </div>
  <div align="center">
    <input type="button" name="back" value="VOLVER" onClick="location.href='menuControl.php'"/>
  </div>
</form>
</body>
</html> 