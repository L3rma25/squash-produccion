<?php
?>

<?php
$busqueda=$_REQUEST['busqueda'];
include ('conexion.php');

$sql9= "SELECT * FROM productos WHERE nombre_producto LIKE '%$busqueda%'";
$result9 = mysqli_query($conn,$sql9) or die(mysqli_error());
$filas2 = mysqli_num_rows($result9);
if($filas2>=1){

	echo"<h3>Productos que se encontraron en la base de datos con busqueda de <font color='red'>$busqueda</font></h3>";
	echo"<center><table border='1' width='70%'>
				<tr class='tab'><td class='tab2' align='center'>Nombre del Producto</td>
								<td align='center'>Stock</td>
								<td align='center'>Modificar</td></tr>";
	while ($filav =  mysqli_fetch_assoc($result9)) {
						@$id_producto=$filav['id_producto'];
						@$nombre_producto=$filav['nombre_producto'];
						@$stock=$filav['stock'];
				
				echo"<td align='center'>$nombre_producto</td>";
				echo"<td align='center'>$stock</td>";
				echo"<td align='center'><a href='modificar_stock.php?id_producto=$id_producto' class='btn btn-info'>Modificar Stock</a></td></tr>";
	}

	echo"</table>";
}else{
	echo"<center><font color='red'>No se encontraron registros</font></center>";
}
echo"</center>";
?>