<?php include ("verificaSesion.php");
$nrcuit = $_GET['nrcuit'];
$ano = $_GET['ano'];
$mes = $_GET['mes'];
$sql = "select * from empresa where nrcuit = '$nrcuit'";
$result = mysql_query($sql,$db); 
$row = mysql_fetch_array($result);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Detalle de Acuerdo</title>
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
			<h2 class="page-header"><i style="font-size: 50px"  class="glyphicon glyphicon-list-alt"></i><br>Detalle de Acuerdo</h2>
			<div class="col-md-8 col-md-offset-2">
				<h3><?php echo ($row['nombre']);?></h3>
				<?php
				$sql2 = "select * from detacuer where nrcuit = $nrcuit and anoacu = '$ano' and mesacu = '$mes'" ;
				$result2 = mysql_query($sql2,$db); 
				$row2 = mysql_fetch_array($result2);
				$nroacu = $row2['nroacu'];
								
				$sql3 = "select * from cabacuer where nrcuit = $nrcuit and nroacu = $nroacu" ;
				$result3 = mysql_query($sql3,$db); 
				$row3 = mysql_fetch_array($result3);
				?>
				
				
				<table class="table" style="text-align: center">
				  <tr>
				    <th style="text-align: center">Per&iacute;odo</th>
				    <td><?php print ($ano."/".$mes);?></td>
				  </tr>
				  <tr>
				    <th style="text-align: center">N&uacute;mero</th>
				    <td><?php print ($row3['nroacu']);?></td>
				  </tr>
				  <tr>
				    <th style="text-align: center">Fecha</th>
				    <td><?php print ($row3['fecacu']);?></td>
				  </tr>
				  <tr>
				    <th style="text-align: center">Monto</th>
				    <td><?php print ($row3['totacu']);?></td>
				  </tr>
				  <tr>
				    <th style="text-align: center">Estado</th>
				    <td><?php if ($row3['estacu'] == 1) { echo "Vigente"; } else { echo "Cancelado"; } ?></td>
				  </tr>
				</table>
			</div>
			<div class="col-md-10 col-md-offset-1">	
				<h3>Detalle de Cuotas</h3>
				<table class="table" style="text-align: center">
				  <tr>
				    <th style="text-align: center">N&uacute;mero</th>
				    <th style="text-align: center">Monto de Cuota</th>
				    <th style="text-align: center">Fecha de Vencimiento</th>
				    <th style="text-align: center">Monto Pagado</th>
				    <th style="text-align: center">Fecha de Pago</th>
				    <th style="text-align: center">Sistema de Pago</th>
					<th style="text-align: center">C&oacute;digo de Barra</th>
				  </tr>
				<?php 
					$sql4 = "select *, date_format(fecvto, '%d/%m/%Y') as fecvto, date_format(fecpag, '%d/%m/%Y') as fecpag from cuoacuer where nrcuit = $nrcuit and nroacu = $nroacu";
					$result4 = mysql_query($sql4,$db); 
					while ($row4=mysql_fetch_array($result4)) {
						if ($row4['sispag'] == 'E') {
							$sispago = "Electrónico";
						} else {
							if ($row4['sispag'] == 'M' || $row3['estacu'] != 1) {
								$sispago = "Manual";
							} else {
								$sispago = "No Pagado";
							}
						} ?>
						<tr>
							<td><?php echo $row4['nrocuo'] ?></td>
							<td><?php echo $row4['moncuo'] ?></td>
							<td><?php echo $row4['fecvto'] ?></td>
							<td><?php echo $row4['monpag'] ?></td>
							<td><?php echo $row4['fecpag'] ?></td>
							<td><?php echo $sispago ?></td>
							<td><?php echo $row4['codbar'] ?></td>
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

<!-- <table width="546" border="0">
  <tr>
    <td width="474"><div align="right"><font size="3" face="Papyrus"><?php print ($row['nombre']);?></font></div></td>
  </tr>
</table>

<?php
$sql2 = "select * from detacuer where nrcuit = $nrcuit and anoacu = '$ano' and mesacu = '$mes'" ;
$result2 = mysql_query($sql2,$db); 
$row2 = mysql_fetch_array($result2);
$nroacu = $row2['nroacu'];
				
$sql3 = "select * from cabacuer where nrcuit = $nrcuit and nroacu = $nroacu" ;
$result3 = mysql_query($sql3,$db); 
$row3 = mysql_fetch_array($result3);
?>


<table width="548" border="1">
  <tr>
    <th><div align="left">Per&iacute;odo</div></th>
    <td><?php print ($ano."/".$mes);?></td>
  </tr>
  <tr>
    <th><div align="left">N&uacute;mero</div></th>
    <td><?php print ($row3['nroacu']);?></td>
  </tr>
  <tr>
    <th><div align="left">Fecha</div></th>
    <td><?php print ($row3['fecacu']);?></td>
  </tr>
  <tr>
    <th><div align="left">Monto</div></th>
    <td><?php print ($row3['totacu']);?></td>
  </tr>
  <tr>
    <th><div align="left">Estado</div></th>
    <td><?php if ($row3['estacu'] == 1) { echo "Vigente"; } else { echo "Cancelado"; } ?></td>
  </tr>
</table>
<p class="Estilo3">Cuotas</p>
<table border="1" width="1025" cellpadding="2" cellspacing="0" style="text-align: center; font-family: Verdana, Geneva, sans-serif; font-size: 11px">
  <tr>
    <th>N&uacute;mero</th>
    <th>Monto de Cuota</th>
    <th><font size="1">Fecha de Vencimiento </font></th>
    <th>Monto Pagado</th>
    <th>Fecha de Pago</th>
    <th>Sistema de Pago</th>
	<th>C&oacute;digo de Barra</th>
  </tr>
<?php 
	$sql4 = "select * from cuoacuer where nrcuit = $nrcuit and nroacu = $nroacu";
	$result4 = mysql_query($sql4,$db); 
	while ($row4=mysql_fetch_array($result4)) {
		if ($row4['sispag'] == 'E') {
			$sispago = "Electrónico";
		} else {
			if ($row4['sispag'] == 'M' || $row3['estacu'] != 1) {
				$sispago = "Manual";
			} else {
				$sispago = "No Pagado";
			}
		} ?>
		<tr>
			<td><?php echo $row4['nrocuo'] ?></td>
			<td><?php echo $row4['moncuo'] ?></td>
			<td><?php echo $row4['fecvto'] ?></td>
			<td><?php echo $row4['monpag'] ?></td>
			<td><?php echo $row4['fecpag'] ?></td>
			<td><?php echo $sispago ?></td>
			<td><?php echo $row4['codbar'] ?></td>
		</tr>
<?php } ?>
</table>
<input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />

</body>
</html> -->
