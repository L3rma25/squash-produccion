<?php

include ("parte1.html");
		$id_venta=$_REQUEST['id_venta'];
		$total=$_REQUEST['total'];

		include ('conexion.php');
		$sql_upd="UPDATE ventas set status='No', total='$total', activada='No' where id_venta='$id_venta'"; 
		$result_upd = mysqli_query($conn,$sql_upd) or die(mysqli_error());
		echo'<script type="text/javascript">
				alert("Se ha realizado la Venta Correctamente la Cuenta es '.$total.' Pesos MX.");
				window.location.href="carrito_ventas.php";
				</script>';

include ("parte2.html");
?>