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

<!DOCTYPE html>
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
	<script type="text/javascript" src="include/js/jquery.tablesorter/addons/pager/jquery.tablesorter.pager.js"></script> 

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
		})
		.tablesorterPager({container: $("#paginador")}); 
	});
	
	</script>

</head>
<body>
	<div class="container">
		<div class="row" align="center" style="background-color: #f5f5f5;">	
			<h2 class="page-header"><i style="font-size: 50px"  class="glyphicon glyphicon-user"></i><br>Empleados</h2>
			<div class="col-md-10 col-md-offset-1">
				<div>
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
				<table style="width: 245; border: 0" class="nover">
			      <tr>
			        <td width="239">
					<div id="paginador" class="pager">
					  <form>
						<p align="center">
						  <span class="glyphicon glyphicon-fast-backward first" aria-hidden="true"></span>
					      <span class="glyphicon glyphicon-backward prev" aria-hidden="true"></span>
						  <input name="text" type="text" class="pagedisplay" style="background:#CCCCCC; text-align:center" size="14" readonly="readonly"/>
					      <span class="glyphicon glyphicon-forward next" aria-hidden="true"></span>
					      <span class="glyphicon glyphicon-fast-forward last" aria-hidden="true"></span>
					      <select name="select" class="pagesize form-control">
					      	<option selected="selected" value="10">10 por pagina</option>
					      	<option value="20">20 por pagina</option>
					      	<option value="30">30 por pagina</option>
					      	<option value="<?php echo $cantEmp;?>">Todos</option>
					      </select>
					    </p>
					 </form>	
					</div>
					</td>
			      </tr>
			  </table>	
			</div>
		</div>
	</div>
</body>
</html>
