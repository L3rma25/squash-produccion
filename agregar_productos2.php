<?php
$nombre= $_REQUEST['nombre'];
$codigo= $_REQUEST['codigo'];
$stock= $_REQUEST['stock'];
$costo= $_REQUEST['costo'];
$categoria= $_REQUEST['categoria'];
@$costo_adq= $_REQUEST['costo_adq'];

		include("conexion.php");
		
	$sqlemp="SELECT * FROM productos where nombre_producto='$nombre'";
	$resemp = mysqli_query($conn,$sqlemp) or die(mysqli_error());
	$filasemp = mysqli_num_rows($resemp);
	if($filasemp==1){
				
			echo"<div class='alert alert-warning'>Este Producto Ya esta registrado</div>";
				
	}else{
		
			$query9 = "INSERT into productos (id_producto,nombre_producto,stock,id_categoria,costo,codigo_barras) values 
			('$codigo','$nombre','$stock','$categoria','$costo','$codigo')";
			echo $query9;
			$result = mysqli_query($conn,$query9) or die(mysqli_error());
			echo'<script type="text/javascript">
						alert("Se ha agregado correctamente el producto '.$nombre.'");
						</script>';
			
			echo"<script language='Javascript'> location.href='busqueda_producto.php'; </script>";
	}		
 ?>
 
 