<?php include ("verificaSesion.php");
$cuit = $_GET['cuit'];
$cuil = $_GET['cuil'];
$sql0 = "select * from empresa e where e.delcod = ".$_SESSION['delcod']." and e.nrcuit = $cuit";
$result0 = mysql_query($sql0,$db); 
$row0 = mysql_fetch_array($result0);

mysql_select_db('ospimrem_newaplicativo');
$sql = "select e.*, c.descri as catego, p.descripcion as provi from empleados e, empresa a, categorias c, provincia p where e.nrcuit = $cuit and e.nrcuil = $cuil and e.nrcuit = a.nrcuit and a.rramaa = c.codram and e.catego = c.codcat and e.provin = p.id";
$result = mysql_query($sql,$db); 
$row=mysql_fetch_array($result);

$sql1 = "select * from familia where nrcuit = '$cuit' and nrcuil = '$cuil'";
$result1 = mysql_query($sql1,$db);
$cantFam = mysql_num_rows($result1);
?>
<head>
	<title>Empleados</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:500,700' type='text/css'/>
	<link rel="stylesheet" href="include/js/jquery.tablesorter/themes/theme.blue.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	
	<script type="text/javascript" src="include/js/jquery-2.2.0.min.js"></script>
	<script type="text/javascript" src="include/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="include/js/jquery.js"></script>
	<script type="text/javascript" src="include/js/jquery.tablesorter/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="include/js/jquery.tablesorter/jquery.tablesorter.widgets.js"></script>
	<script type="text/javascript" src="include/js/jquery.tablesorter/addons/pager/jquery.tablesorter.pager.js"></script> 
	<style type="text/css" media="print">
		.nover {display:none}
	</style>
</head>

<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">		
			<h2 class="page-header"><i style="font-size: 50px"  class="glyphicon glyphicon-user"></i><br>Ficha de Empleado</h2>
			<div class="col-md-8 col-md-offset-2">
				<div>
					<h3 class="page-title"><?php echo ($row['nombre']."   ".$row['apelli']);?></h3>
				</div>
				<table class="table" style="text-align: center">
				  <tr>
				    <th style="text-align: center">Documento</th>
				    <td width="365"><?php print ($row['tipdoc'].": ".$row['nrodoc']);?></td>
				  </tr>
				  <tr>
				    <th style="text-align: center">Domicilio</th>
				    <td><?php echo ($row['direcc']);?></td>
				  </tr>
				  <tr>
				    <th style="text-align: center">Localidad</th>
				    <td><?php echo ($row['locale']);?></td>
				  </tr>
				  <tr>
				    <th style="text-align: center">Provincia</th>
				    <td><?php echo ($row['provi']);?></td>
				  </tr>
				  <tr>
				    <th style="text-align: center">C.P.</th>
				    <td><?php echo ($row['copole']);?></td>
				  </tr>
				  <tr>
				    <th style="text-align: center">Fecha Nacimiento </th>
				    <td><?php echo ($row['fecnac']);?></td>
				  </tr>
				  <tr>
				    <th style="text-align: center">CUIL</th>
				    <td><?php echo ($row['nrcuil']);?></td>
				  </tr>
				  <tr>
				     <th style="text-align: center;">Empresa</th>
				     <td><?php echo ($row0['nombre']); ?></td>
				   </tr>
				   <tr>
				     <th style="text-align: center;">C.U.I.T.</th>
				     <td><?php echo ($row0['nrcuit']); ?></td>
				   </tr>
				  <tr>
				    <th style="text-align: center">Categoria</th>
				    <td><?php echo ($row['catego']);?></td>
				  </tr>
				  <tr>
				    <th style="text-align: center">Feche de ingreso </th>
				    <td><?php echo ($row['fecing']);?></td>
				  </tr>
				  <tr>
				    <th style="text-align: center">En Actividad</th>
				    <td><?php echo ($row['activo']);?></td>
				  </tr>
				</table>
			</div>
			
			<div class="col-md-10 col-md-offset-1">
				<h3>Familiares</h3>
				<table class="table" style="text-align: center">
					<tr>
					    <th style="text-align: center">Nombre</th>
					    <th style="text-align: center">Apellido</th>
					    <th style="text-align: center">Documento </th>
						<th style="text-align: center">Parentesco </th>
						<th style="text-align: center">Sexo </th>
						<th style="text-align: center">Fecha de Nacimiento </th>
					</tr>
					<?php 
						if ($cantFam > 0) {
							while ($row1=mysql_fetch_array($result1)) { ?>
								<tr>
								<td><?php echo $row1['nombre'] ?></td>
								<td><?php echo $row1['apelli'] ?></td>
								<td><?php echo $row1['tipdoc'].": ".$row1['nrodoc'] ?></td>
								<td><?php echo $row1['codpar'] ?></td>
								<td><?php echo $row1['ssexxo'] ?></td>
								<td><?php echo $row1['fecnac'] ?></td>
								</tr>
							<?php } 
						  } else { ?>
							<tr>
								<td colspan="6"><b>No tiene cargado familiares</b></td>
							</tr>
					<?php } ?>
				</table>
				<a class="nover" href="javascript:window.print();"><i title="Imprimir" style="font-size: 40px; margin-bottom: 20px"  class="glyphicon glyphicon-print"></i></a>
			</div>
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 U.S.I.M.R.A.</p>
			</div>
		</div>
	</div>
</body>

<!-- <body>
	<table width="546" border="0" style="margin-bottom: 10px">
	  <tr>
	    <th width="218" scope="row"><div align="left"><?php print ($row0['nombre']);?></div></th>
	    <td width="270"><div align="right"><font size="3" face="Papyrus"><?php print ($row['nombre']."   ".$row['apelli']);?> </font></div></td>
	  </tr>
	</table>
	
	<table width="548" border="1">
	  <tr>
	    <th style="text-align: center">Documento</div></th>
	    <td width="365"><?php print ($row['tipdoc'].": ".$row['nrodoc']);?></td>
	  </tr>
	  <tr>
	    <th scope="row"><div align="left">Domicilio</div></th>
	    <td><?php print ($row['direcc']);?></td>
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
	    <th scope="row"><div align="left">Fecha Nacimiento </div></th>
	    <td><?php print ($row['fecnac']);?></td>
	  </tr>
	  <tr>
	    <th scope="row"><div align="left">CUIL</div></th>
	    <td><?php print ($row['nrcuil']);?></td>
	  </tr>
	  <tr>
	    <th scope="row"><div align="left">Categoria</div></th>
	    <td><?php print ($row['catego']);?></td>
	  </tr>
	  <tr>
	    <th scope="row"><div align="left">Feche de ingreso </div></th>
	    <td><?php print ($row['fecing']);?></td>
	  </tr>
	  <tr>
	    <th scope="row"><div align="left">En Actividad</div></th>
	    <td><?php print ($row['activo']);?></td>
	  </tr>
	</table>
	
	<p class="Estilo3">Familiares</p>
	
	<table border="1" width="1025" style="border-color: #CD8C34; text-align: center; font-family: Verdana, Geneva, sans-serif; font-size: 11px" cellpadding="2" cellspacing="0">
		<tr>
		    <th>Nombre</th>
		    <th>Apellido</th>
		    <th>Documento </th>
			<th>Parentesco </th>
			<th>Sexo </th>
			<th>Fecha de Nacimiento </th>
		</tr>
		<?php 
			if ($cantFam > 0) {
				while ($row1=mysql_fetch_array($result1)) { ?>
					<tr>
					<td><?php echo $row1['nombre'] ?></td>
					<td><?php echo $row1['apelli'] ?></td>
					<td><?php echo $row1['tipdoc'].": ".$row1['nrodoc'] ?></td>
					<td><?php echo $row1['codpar'] ?></td>
					<td><?php echo $row1['ssexxo'] ?></td>
					<td><?php echo $row1['fecnac'] ?></td>
					</tr>
				<?php } 
			  } else { ?>
				<tr>
					<td colspan="6"><b>No tiene cargado familiares</b></td>
				</tr>
		<?php } ?>
	</table>
	<input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
</body>
</html> -->