<?php
$nombre= $_REQUEST['nombre'];

		include("conexion.php");
		
	$sqlemp="SELECT * FROM categorias where nombre_categoria='$nombre'";
	$resemp = mysqli_query($conn,$sqlemp) or die(mysqli_error());
	$filasemp = mysqli_num_rows($resemp);
	if($filasemp==1){
				
			echo"<div class='alert alert-warning'>Esta categoria Ya esta registrada</div>";
				
	}else{
		
			$query9 = "INSERT into categorias (nombre_categoria) values 
			('$nombre')";
			//echo $query9;
			$result = mysqli_query($conn,$query9) or die(mysqli_error());
			echo'<script type="text/javascript">
						alert("Se ha agregado correctamente la categoria '.$nombre.'");
						</script>';
			
			echo"<script language='Javascript'> location.href='busqueda_producto.php'; </script>";
	}		
 ?>
 
 