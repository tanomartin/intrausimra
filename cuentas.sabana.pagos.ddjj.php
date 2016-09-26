<?php include ("verificaSesion.php");
$nrcuit = $_GET['nrcuit'];
$control = $_GET['control'];
$sql = "select * from empresa where delcod = $delcod and nrcuit = $nrcuit";
$result = mysql_query($sql,$db); 
$row = mysql_fetch_array($result);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Detalle de DDJJ</title>
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
	<style type="text/css" media="print">
		.nover {display:none}
	</style>
</head>


<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">		
			<h2 class="page-header"><i style="font-size: 50px"  class="glyphicon glyphicon-list-alt"></i><br>Detalle de DDJJ</h2>
			<div class="col-md-10 col-md-offset-1">
				<h3><?php echo ($row['nombre']);?></h3>
				<table class="table" style="text-align: center">
				  <tr>
				    <th style="text-align: center">CUIL</th>
				    <th style="text-align: center">Mes</th>
				    <th style="text-align: center">A&ntilde;o</th>
				    <th style="text-align: center">Remuneraci&oacute;n</th>
				    <th style="text-align: center">Aporte 0.60 </th>
				    <th style="text-align: center">Aporte 1.00 </th>
				    <th style="text-align: center">Aporte 1.50 </th>
				    <th style="text-align: center">Total </th>
				  </tr>
				  <?php
					$con = substr($control,15,14);
					mysql_select_db('ospimrem_newaplicativo');
					$sql3 = "select * from ppjj where nrctrl = '$con'";
					$result3 = mysql_query($sql3,$db); 
					
					$sql4 = "select * from validas where nrctrl = '$con'";
					$result4 = mysql_query($sql4,$db);
					$row4 = mysql_fetch_array($result4);
					
					while ($row3 = mysql_fetch_array($result3)) { ?>
							<tr>
								<td><?php echo $row3['nrcuil'] ?></td>
								<td><?php echo $row3['permes'] ?></td>
								<td><?php echo $row3['perano'] ?></td>
								<td><?php echo $row3['remune'] ?></td>
								<td><?php echo $row3['apo060'] ?></td>
								<td><?php echo $row3['apo100'] ?></td>
								<td><?php echo $row3['apo150'] ?></td>
								<td><?php echo $row3['apo060'] +  $row3['apo100'] + $row3['apo150'] ?></td>
							</tr>
					<?php } ?>
					   <tr class="Estilo4">
						    <th colspan="3" style="text-align: center">TOTALES </th>
						    <th style="text-align: center"><?php echo $row4['remune'] ?></th>
						    <th style="text-align: center"><?php echo $row4['apo060'] ?></th>
						    <th style="text-align: center"><?php echo $row4['apo100'] ?></th>
						    <th style="text-align: center"><?php echo $row4['apo150'] ?></th>
						    <th style="text-align: center"><?php echo $row4['apo060'] + $row4['apo100'] + $row4['apo150']   ?></th>
					   </tr>
					   
					   <tr>
					    <th colspan="7" style="text-align: right;">RECARGO</th>
					    <th style="text-align: center"><?php echo ($row4['recarg']); ?></th>
					  </tr>
					   
					   <tr>
					    <th colspan="7" style="text-align: right">TOTAL DEPOSITADO</th>
					    <th style="text-align: center"><?php echo ($row4['totapo']); ?></th>
					  </tr>
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
