<?php include ("verificaSesion.php"); ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Empresas</title>
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
	<script type="text/javascript" src="include/js/jquery.blockUI.js" ></script>
	<script>

	$(function() {
		$("#empresas")
		.tablesorter({
			theme: 'blue', 
			widthFixed: true, 
			widgets: ["zebra", "filter"], 
			headers:{2:{sorter:false, filter:false},3:{sorter:false, filter:false},4:{sorter:false, filter:false}},
			widgetOptions : { 
				filter_cssFilter   : '',
				filter_childRows   : false,
				filter_hideFilters : false,
				filter_ignoreCase  : true,
				filter_searchDelay : 300,
				filter_startsWith  : false,
				filter_hideFilters : false,
			}
		});
	});

	function rediSabanaCtaCte(cuit) {
		$.blockUI({ message: "<h3>Generando Estado de Cuenta<br>Esto puede tardar unos Segundos<br> Aguarde por favor</h3>" });
		var dire = 'cuentas.sabana.php?nrcuit='+cuit;
		location.href = dire;
	}

	</script>

</head>
<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			<nav class="navbar navbar-default navbar-static-top">
				<div class="navbar-header" style="margin-left: 10px">
					<a class="navbar-brand" href="menu.php"> <img style="max-width:38px; margin-top: -9px;" src="images/logo.png" /></a>
				</div>
				<div class="nav navbar-top-links navbar-right" style="margin-right: 3px">
					<a class="navbar-brand"><?php echo $_SESSION['nombre'] ?> <font size="2px" >(U.A.: <?php echo $_SESSION['fecacc'] ?>)</font> </a>
					<a style="margin: 11px 10px 0 0"  href="logout.php" class="btn btn-info"><span title="Salir" class="glyphicon glyphicon-log-out"></span></a>
				</div>
				<ul class="nav navbar-nav navbar-left">
				<!--<li><a href="cuentas.php">Cuentas</a></li> -->
					<li><a href="empresas.php">Empresas</a></li>
					<li><a href="files/tutorialIntra.pdf" target="_blank">Instructivo</a></li>
					<li><a href="consultas.php">Consultas</a></li>
				</ul>
			</nav>
			
			<h2><i style="font-size: 50px" class="glyphicon glyphicon-home"></i><br>Empresas</h2>
			<div class="col-md-10 col-md-offset-1">
				<table class="tablesorter" id="empresas">
				  	<thead>
					  <tr>
					  	<th>CUIT</th>
					    <th>Raz&oacute;n Social </th>
					    <th>Ficha</th>
						<th>Nomina</th>
						<th>Cuenta</th>
					  </tr>
				  	</thead>
				  	<tbody>
					<?php
					$sql = "select * from empresa where delcod = $delcod order by nrcuit";
					$result = mysql_query($sql,$db);
					while ($row=mysql_fetch_array($result)) { ?>
						<tr>
							<td><?php echo $row['nrcuit'] ?></td>
							<td><?php echo $row['nombre'] ?></td>
							<td align="center"><a target="_blank" href="empresas.ficha.php?nrcuit=<?php echo $row['nrcuit'] ?>"><i style="font-size: 25px"  class="glyphicon glyphicon-info-sign"></i></a></td>
							<td align="center"><a href="empresas.nomina.php?nrcuit=<?php echo $row['nrcuit'] ?>"><i style="font-size: 25px"  class="glyphicon glyphicon-user"></i></a></td>
							<td align="center"><a href="javascript:rediSabanaCtaCte('<?php echo $row['nrcuit'] ?>')"><i style="font-size: 20px"  class="glyphicon glyphicon-list-alt"></i></a></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 U.S.I.M.R.A.</p>
			</div>
		</div>
	</div>
</body>
</html>
