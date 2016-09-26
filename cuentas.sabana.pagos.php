<?php include ("verificaSesion.php");
$nrcuit = $_GET['nrcuit'];
$ano = $_GET['ano'];
$mes = $_GET['mes'];
$sql = "select * from empresa where delcod = $delcod and nrcuit = $nrcuit";
$result = mysql_query($sql,$db); 
$row = mysql_fetch_array($result);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Detalle de Pago</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
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
	function mypopup(dire) {
		var a = document.createElement("a");
		a.target = "_blank";
		a.href = dire;
		a.click();
	}
	</script>
	
	<style type="text/css" media="print">
		.nover {display:none}
	</style>
</head>

<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">		
			<h2 class="page-header"><i style="font-size: 50px"  class="glyphicon glyphicon-list-alt"></i><br>Detalle de Pago</h2>
			<div class="col-md-10 col-md-offset-1">
				<h3><?php echo ($row['nombre']);?></h3>
				<table class="table" style="text-align: center">
				  <tr>
				    <th style="text-align: center">Per&iacute;odo</th>
				    <th style="text-align: center">Fecha de Deposito </th>
				    <th style="text-align: center">Total Depositado</th>
				    <th style="text-align: center">Sistema de Pago</th>
				    <th style="text-align: center">C&oacute;digo de Barra</th>
				  </tr>
				  
				<?php
				$sql1 = "select *, date_format(fecdep, '%d/%m/%Y') as fecdep from pagos where nrcuit = $nrcuit and anotra = '$ano' and mestra = '$mes'";;
				$result1 = mysql_query($sql1,$db); 
				while ($row1=mysql_fetch_array($result1)) {
					if ($row1['sispag'] == 'E') {
						$sispago = "Electrónico";
					}
					else {
						$sispago = "Manual";
					} ?>
					<tr>
						<td><?php echo $row1['mestra']."/".$row1['anotra'] ?></td>
						<td><?php echo $row1['fecdep'] ?></td>
						<td><?php echo $row1['totdep'] ?></td>
						<td><?php echo $sispago ?></td>
				<?php	if ($row1['codbar'] != null) { ?>
							<td><a href="javascript:mypopup('cuentas.sabana.pagos.ddjj.php?nrcuit=<?php echo $nrcuit ?>&control=<?php echo $row1['codbar'] ?>')"><?php echo $row1['codbar'] ?></a></td>
				<?php	} 
						else { ?>
							<td>-</td>
				<?php	} ?>
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
