<?php include ("verificaSesion.php");
$nrcuit = $_GET['nrcuit'];
$control = $_GET['control'];
$sispago = $_GET['sispago'];
$ano = $_GET['ano'];
$mes = $_GET['mes'];
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
				    <th style="text-align: center">Año</th>
				    <th style="text-align: center">Remuneración</th>
				    <th style="text-align: center">Aporte 0.60 </th>
				    <th style="text-align: center">Aporte 1.00 </th>
				    <th style="text-align: center">Aporte 1.50 </th>
				    <th style="text-align: center">Total </th>
				  </tr>
				  
			<?php	mysql_select_db('ospimrem_newaplicativo');				  
					if ($sispago != "L") {
						$con = substr($control,15,14);				
						
						$sqlDet = "select * from ppjj where nrctrl = '$con' and nrcuit = $nrcuit";
						$resDet = mysql_query($sqlDet,$db); 
						
						$sqlCab = "select * from validas where nrctrl = '$con' and nrcuit = $nrcuit";
						$resCab = mysql_query($sqlCab,$db);
						$rowCab = mysql_fetch_assoc($resCab);
				 	} else {
				 		$sqlDet = "select * 
				 					FROM vinculadocu v, ppjj p 
				 					WHERE v.referencia = '$control' and v.nrcuit = $nrcuit and v.nrctrl = p.nrctrl and v.nrcuit = p.nrcuit and p.perano = $ano and p.permes = $mes";
				 		$resDet = mysql_query($sqlDet,$db);
				 		
				 		$sqlCab = "select *
				 					FROM vinculadocu v, validas c
				 					WHERE v.referencia = '$control' and v.nrcuit = $nrcuit and v.nrctrl = c.nrctrl and v.nrcuit = c.nrcuit and c.perano = $ano and c.permes = $mes";
				 		$resCab = mysql_query($sqlCab,$db);
				 		$rowCab = mysql_fetch_assoc($resCab);
				 	}
					while ($rowDet = mysql_fetch_assoc($resDet)) { ?>
							<tr>
								<td><?php echo $rowDet['nrcuil'] ?></td>
								<td><?php echo $rowDet['permes'] ?></td>
								<td><?php echo $rowDet['perano'] ?></td>
								<td><?php echo $rowDet['remune'] ?></td>
								<td><?php echo $rowDet['apo060'] ?></td>
								<td><?php echo $rowDet['apo100'] ?></td>
								<td><?php echo $rowDet['apo150'] ?></td>
								<td><?php echo $rowDet['apo060'] +  $rowDet['apo100'] + $rowDet['apo150'] ?></td>
							</tr>
					<?php } ?>
					   <tr class="Estilo4">
						    <th colspan="3" style="text-align: center">TOTALES </th>
						    <th style="text-align: center"><?php echo $rowCab['remune'] ?></th>
						    <th style="text-align: center"><?php echo $rowCab['apo060'] ?></th>
						    <th style="text-align: center"><?php echo $rowCab['apo100'] ?></th>
						    <th style="text-align: center"><?php echo $rowCab['apo150'] ?></th>
						    <th style="text-align: center"><?php echo $rowCab['apo060'] + $rowCab['apo100'] + $rowCab['apo150']   ?></th>
					   </tr>
					   
					   <tr>
					    <th colspan="7" style="text-align: right;">RECARGO</th>
					    <th style="text-align: center"><?php echo ($rowCab['recarg']); ?></th>
					  </tr>
					   
					   <tr>
					    <th colspan="7" style="text-align: right">TOTAL DEPOSITADO</th>
					    <th style="text-align: center"><?php echo ($rowCab['totapo']); ?></th>
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
