<?php
$id_det_venta=$_REQUEST['id_det_venta'];
$id_venta=$_REQUEST['id_venta'];

include ('conexion.php');
error_reporting(0);
date_default_timezone_set('America/Mexico_City');
 $fecha = date("Y-m-d");
  
	
						 
						 $sql_upd="DELETE from detalle_venta where id_det_venta='$id_det_venta'"; 
						 $result_upd = mysqli_query($conn,$sql_upd) or die(mysqli_error());
						echo'<script type="text/javascript">
						alert("Ya no hay stock de este producto");
						window.location.href="venta_listado.php?id_venta='.$id_venta.'&cliente='.$cliente.'";
						</script>';
 
?>