<?php include ("verificaSesion.php");

$nrcuit = $_GET['nrcuit'];
$sql = "select * from empresa where delcod = ".$_SESSION['delcod']." and nrcuit = $nrcuit";
$result = mysql_query($sql,$db); 
$rowEmpre = mysql_fetch_array($result);

mysql_select_db('ospimrem_newaplicativo');
$sql = "select * from empleados where nrcuit = $nrcuit order by apelli";
$result = mysql_query($sql,$db); 
$cantEmp = mysql_num_rows($result);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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

	<script>

	$(function() {
		$("#empleados")
		.tablesorter({
			theme: 'blue', 
			widthFixed: true, 
			widgets: ["zebra", "filter"], 
			headers:{2:{sorter:false, filter:false}},
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
	
	</script>

</head>
<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			<nav class="navbar navbar-default navbar-static-top" role="navigation">
				<div class="navbar-header" style="margin-left: 10px">
					<a class="navbar-brand" href="menu.php"> <img style="max-width:38px; margin-top: -9px;" src="images/logo.png"/></a>
				</div>
				<div class="nav navbar-top-links navbar-right" style="margin-right: 3px">
					<a class="navbar-brand"><?php echo $_SESSION['nombre'] ?> <font size="2px" >(U.A.: <?php echo $_SESSION['fecacc'] ?>)</font> </a>
					<a style="margin: 11px 10px 0 0"  href="logout.php" class="btn btn-info"><span title="Salir" class="glyphicon glyphicon-log-out"></span></a>
				</div>
				<ul class="nav navbar-nav navbar-left">
				<!--<li><a href="cuentas.php">Cuentas</a></li> -->
					<li><a href="empresas.php">Empresas</a></li>
					<li><a href="files/tutorialIntra.pdf" target="_blanck">Instructivo</a></li>
					<li><a href="consultas.php">Consultas</a></li>
				</ul>
			</nav>
			
			<h2 class="page-header">Empleados</h2>
			<div class="col-md-10 col-md-offset-1">
				<div>
					<a href="empresas.php"><i title="Imprimir" style="font-size: 40px; float: left;"  class="glyphicon glyphicon-arrow-left"></i></a>
					<h3 class="page-title" style="float: right;"><?php print ($rowEmpre['nombre']);?></h3>
				</div>
				<table class="tablesorter" id="empleados">
					<thead>
						<tr>
						    <th>CUIL</th>
						    <th>Apellido, Nombre</th>
						    <th>FICHA </th>
						</tr>
					</thead>
					<tbody>
					<?php if ($cantEmp > 0) {
						  	while ($row=mysql_fetch_array($result)) { ?>
								<tr>
								<td><b><?php echo $row['nrcuil'] ?></b></td>
								<td><?php echo $row['apelli'].", ".$row['nombre']  ?></td>
								<td align="center"><a target="_blank" href="empresas.nomina.ficha.php?cuil=<?php echo $row['nrcuil'] ?>&cuit=<?php echo $nrcuit ?>"><i style="font-size: 25px"  class="glyphicon glyphicon-info-sign"></i></a></td>
								</tr>
					  <?php }
					 	  } else { ?>
							<tr><td colspan="3"><b>No tiene cargada nomina de empleados</b></td></tr>
				  	<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
