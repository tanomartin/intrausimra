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
	<title>Detalle de Pago Difenciado</title>
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
			<h2 class="page-header"><i style="font-size: 50px"  class="glyphicon glyphicon-list-alt"></i><br>Detalle de Pago Diferenciado</h2>
			<div class="col-md-6 col-md-offset-3">
				<h3><?php echo ($row['nombre']);?></h3>
				<table class="table" style="text-align: center">
				   <tr>
				       <th style="text-align: center">Per&iacute;odo Cancelado </th>
				       <th style="text-align: center">Per&iacute;odo de Pago </th>
				    </tr>
				          <?php
							$sql1 = "select * from peranter where nrcuit = $nrcuit and anoant = '$ano' and mesant = '$mes'";;
							$result1 = mysql_query($sql1,$db); 
							while ($row1=mysql_fetch_array($result1)) { ?>
								<tr>
									<td><?php echo $row1['mesant']."/".$row1['anoant'] ?></td>
									<td><?php echo $row1['mestra']."/".$row1['anotra'] ?></td>
								</tr>
					<?php	} ?>
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
<table width="800" border="0">
  <tr>
    <td width="436"><div align="left">
      <p class="Estilo3">Detalle de Pago Diferenciado </p>
    </div></td>
    <td width="516"><div align="right" class="Estilo3"><font size="3" face="Papyrus">
      <?php print ($row['nombre']);?>
    </font></div></td>
  </tr>
  <tr>
    <td colspan="3" scope="row"><div align="right" class="Estilo5">U.S.I.M.R.A. </div></td>
  </tr>
</table>
<table width="800" border="0">
  <tr>
    <th scope="row"><div align="center">
      <table border="1" width="365" style="border-color: #CD8C34; text-align: center; font-family: Verdana, Geneva, sans-serif; font-size: 11px" cellpadding="2" cellspacing="0">
        <tr>
          <th>Per&iacute;odo Cancelado </th>
          <th>Per&iacute;odo de Pago </th>
        </tr>
          <?php
			$sql1 = "select * from peranter where nrcuit = $nrcuit and anoant = '$ano' and mesant = '$mes'";;
			$result1 = mysql_query($sql1,$db); 
			while ($row1=mysql_fetch_array($result1)) { ?>
				<tr>
					<td><?php echo $row1['mesant']."/".$row1['anoant'] ?></td>
					<td><?php echo $row1['mestra']."/".$row1['anotra'] ?></td>
				</tr>
	<?php	} ?>
      </table>
    </div>
    </th>
  </tr>
</table>
<table width="800" border="0">
  <tr>
    <th scope="row"><div align="right">
      <input type="button" name="imprimir" value="Imprimir" onclick="window.print();" />
    </div></th>
  </tr>
</table>
</body>
</html> -->
