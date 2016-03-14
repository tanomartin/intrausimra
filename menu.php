<?php
include ("verificaSesion.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:500,700' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="include/js/jquery-2.2.0.min.js"></script>
	<script type="text/javascript" src="include/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			<nav class="navbar navbar-default navbar-static-top" role="navigation">
				<div class="navbar-header" style="margin-left: 10px">
					<a class="navbar-brand" href="menu.php">U.S.I.M.R.A.</a>
				</div>
				<div class="nav navbar-top-links navbar-right" style="margin-right: 3px">
					<a class="navbar-brand"><?php echo $row['nombre'] ?> <font size="2px" >(U.A.: <?php echo substr($row['fecuac'],8,2)."/".substr($row['fecuac'],5,2)."/".substr($row['fecuac'],0,4)." - ".$row['horuac'] ?>)</font> </a>
					<a style="margin: 11px 10px 0 0"  href="logout.php" class="btn btn-info"><span title="Salir" class="glyphicon glyphicon-log-out"></span></a>
				</div>
				<ul class="nav navbar-nav navbar-left">
					<li><a href="elige_cuenta.php">Cuentas</a></li>
					<li><a href="empresas.php">Empresas y Empleados</a></li>
					<li><a href="files/tutorialIntra.pdf" target="_blanck">Instructivo</a></li>
					<li><a href="consulta.php">Consultas</a></li>
				</ul>
			</nav>
			
			<div class="row">
				<div class="col-md-4 col-md-offset-1">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Estados de Cuenta</h3>
						</div>
						<div class="panel-body">
							<i style="font-size: 100px"  class="glyphicon glyphicon-list-alt"></i>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="elige_cuenta.php" class="btn btn-primary">Ingresar</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-md-offset-2">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Empresas y Empleados</h3>
						</div>
						<div class="panel-body">
							<i style="font-size: 100px"  class="glyphicon glyphicon-user"></i>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="formularios/ordinter.pdf" class="btn btn-primary">Ingresar</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-md-offset-1">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Instructivo</h3>
						</div>
						<div class="panel-body">
							<i style="font-size: 100px"  class="glyphicon glyphicon-book"></i>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/tutorialIntra.pdf" class="btn btn-primary" target="_blanck">Descargar</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-md-offset-2">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Consultas</h3>				
						</div>
						<div class="panel-body">
							<i style="font-size: 100px"  class="glyphicon glyphicon-envelope"></i>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="formularios/reccron.pdf" class="btn btn-primary">Ingresar</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . substr($row['fechaactualizacion'],8,2)."/".substr($row['fechaactualizacion'],5,2)."/".substr($row['fechaactualizacion'],0,4)) ; ?>
				<p>&copy; 2016 U.S.I.M.R.A.<p>
			</div>
		</div>
	</div>
</body>
</html>
