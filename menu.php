<?php
include ("verificaSesion.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
	<link href='https://fonts.googleapis.com/css?family=Roboto:500,700' rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="include/js/jquery-2.2.0.min.js"></script>
	<script type="text/javascript" src="include/js/bootstrap.min.js"></script>
	
</head>

<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">
			<nav class="navbar navbar-default navbar-static-top">
				<div class="navbar-header" style="margin-left: 10px">
					<a class="navbar-brand" href="menu.php"> 
						<img style="max-width:38px; margin-top: -9px;" src="images/logo.png" />
					</a>
				</div>
				<div class="nav navbar-top-links navbar-right" style="margin-right: 3px">
					<a class="navbar-brand"><?php echo $_SESSION['nombre'] ?> <font size="2px" >(U.A.: <?php echo $_SESSION['fecacc'] ?>)</font> </a>
					<a style="margin: 11px 10px 0 0"  href="logout.php" class="btn btn-info"><span title="Salir" class="glyphicon glyphicon-log-out"></span></a>
				</div>
				<ul class="nav navbar-nav navbar-left">
			<!--	<li><a href="cuentas.php">Cuentas</a></li> -->
					<li><a href="empresas.php">Empresas</a></li>
					<li><a href="files/tutorialIntra.pdf" target="_blank">Instructivo</a></li>
					<li><a href="consultas.php">Consultas</a></li>
				</ul>
			</nav>
			
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Empresas</h3>
						</div>
						<div class="panel-body">
							<i style="font-size: 100px"  class="glyphicon glyphicon-home"></i>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="empresas.php" class="btn btn-primary">Ingresar</a></li>
						</ul>
					</div>
				</div>
			<!-- 	<div class="col-md-4 col-md-offset-2">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Empresas y Empleados</h3>
						</div>
						<div class="panel-body">
							<i style="font-size: 100px"  class="glyphicon glyphicon-user"></i>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="empresas.php" class="btn btn-primary">Ingresar</a></li>
						</ul>
					</div>
				</div> -->
				<div class="col-md-4 col-md-offset-1">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<h3 class="panel-title">Instructivo</h3>
						</div>
						<div class="panel-body">
							<i style="font-size: 100px"  class="glyphicon glyphicon-book"></i>
						</div>
						<ul class="list-group">
							<li class="list-group-item"><a href="files/tutorialIntra.pdf" class="btn btn-primary" target="_blank">Descargar</a></li>
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
							<li class="list-group-item"><a href="consultas.php" class="btn btn-primary">Ingresar</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-12 panel-footer">
				<?php  print ("&Uacute;LTIMA ACTUALIZACI&Oacute;N - " . $_SESSION['fecult']); ?>
				<p>&copy; 2016 U.S.I.M.R.A.</p>
			</div>
		</div>
	</div>
</body>
</html>
