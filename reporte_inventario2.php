<?php
$fecha_inicial= $_REQUEST['fecha_inicial'];
include("conexion.php");


		$sql= "SELECT * FROM ventas WHERE fecha='$fecha_inicial' ";
		$result = mysqli_query($conn,$sql) or die(mysqli_error());
		$fila_121 = mysqli_num_rows($result);
		//echo $sql;
		//$total_gen=0;
		
		echo'<table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No. Producto</th>
                                            <th>Producto</th>
                                            <th>Categoria</th>
                                            <th>Productos Vendidos</th>
                                            <th>En Existencia</th>
                                            <th>Costo Venta</th>
                                            <th>Costo Adquisiciòn</th>
                                        </tr>
                                    </thead>';
		
			if($fila_121==0){
				
				ECHO'<div class="alert alert-warning">No se encuentran ventas en esta fecha</div>';
			}
			else
			{
					
				echo"<h2>Se encontraron Registros</h2>";			
				$sql_consulta= "SELECT detalle_venta.id_producto, productos.nombre_producto, categorias.nombre_categoria ,
 COUNT(detalle_venta.id_producto) AS TotalVentas FROM detalle_venta, productos, categorias, 
 ventas WHERE productos.id_categoria=categorias.id_categoria AND ventas.id_venta=detalle_venta.id_venta
 AND productos.id_producto=detalle_venta.id_producto AND ventas.fecha='$fecha_inicial' GROUP BY detalle_venta.id_producto";
			   //echo $sql_consulta;
			   $result_consulta = mysqli_query($conn,$sql_consulta) or die(mysqli_error());
			   $total_costo_ve=0;
			   $total_costo_adq=0;
			   while ($fila_consulta =  mysqli_fetch_assoc($result_consulta)) {
				
				$id_producto_vendido=$fila_consulta['id_producto'];
				$nombre_producto=$fila_consulta['nombre_producto'];
				$nombre_categoria=$fila_consulta['nombre_categoria'];
				$TotalVentas=$fila_consulta['TotalVentas'];
				
				 $sql_producto= "SELECT * FROM productos WHERE id_producto='$id_producto_vendido'";
			   $result_producto = mysqli_query($conn,$sql_producto) or die(mysqli_error());
			   while ($fila_pro =  mysqli_fetch_assoc($result_producto)) {
				
				$stock=$fila_pro['stock'];
				$costo=$fila_pro['costo'];
				$costo_adq=$fila_pro['costo_adq'];
			   }
				$total_costo_ve=$total_costo_ve+$costo;
				$total_costo_adq=$total_costo_adq+$costo_adq;
				echo"<tbody><tr>
                                <td align='right'  width='80'>$id_producto_vendido</td>
                                <td align='right'  width='80'>$nombre_producto</td>
                                <td align='right'  width='80'>$nombre_categoria</td>
                                <td align='right'  width='80'>$TotalVentas</td>
								<td align='right'  width='80'>$stock</td>
								<td align='right'  width='80'>$$costo</td>
								<td align='right'  width='80'>$$costo_adq</td>";
			  }
			  echo"</tr>";
			  echo"<tr><td colspan='6' align='right'>$$total_costo_ve</td><td align='right'>$$total_costo_adq</td>";
			}
		
			
			 echo"</tr></tbody></table>";
?>
				
