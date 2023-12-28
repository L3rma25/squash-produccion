<?php
$id_producto=$_REQUEST['id_producto'];
$cliente=$_REQUEST['cliente'];
$id_venta=$_REQUEST['id_venta'];
@$id_det_venta=$_REQUEST['id_det_venta'];

include ('conexion.php');
error_reporting(0);
date_default_timezone_set('America/Mexico_City');
 $fecha = date("Y-m-d");

/////verifica que el producto exista en detalle_venta

   if($id_det_venta!=0){
 
 						$sql_con_sto="SELECT * FROM detalle_venta where id_det_venta='$id_det_venta'";
						$res_con_sto = mysqli_query($conn,$sql_con_sto) or die(mysqli_error());
						while ($fila_sto =  mysqli_fetch_assoc($res_con_sto)) {
										$id_producto=$fila_sto['id_producto'];
										
										$sql_con_sto2="SELECT * FROM productos where id_producto='$id_producto'";
										$res_con_sto2 = mysqli_query($conn,$sql_con_sto2) or die(mysqli_error());
									while ($fila_sto2 =  mysqli_fetch_assoc($res_con_sto2)) {
										$stock=$fila_sto2['stock'];

										$stock=$stock+1;

										$sql_upd_producto="UPDATE productos set stock='$stock' where id_producto='$id_producto'";
										$result_upd_producto = mysqli_query($conn,$sql_upd_producto) or die(mysqli_error()); 

									}


						}

					
								   		
										
										    /////////////////borra el producto de la venta////
								 		$sql_del="DELETE from detalle_venta where id_det_venta='$id_det_venta'"; 
										$result_del = mysqli_query($conn,$sql_del) or die(mysqli_error());
										echo'<script type="text/javascript">
										alert(" producto eliminado");
										</script>';


   }else{
	    $sqlpro="SELECT * FROM productos where id_producto='$id_producto'";
		$respro = mysqli_query($conn,$sqlpro) or die(mysqli_error());
		$filas_pro = mysqli_num_rows($respro);
		if($filas_pro!=0){
			while ($fila_pro =  mysqli_fetch_assoc($respro)) {
							@$id_categoria=$fila_pro['id_categoria'];
							@$id_producto=$fila_pro['id_producto'];
							@$costo=$fila_pro['costo'];
							@$stock=$fila_pro['stock'];
			}
   ///////////valida que haya stock del producto///////////////////////////////////
			$sqlpro_stock="SELECT * FROM productos where id_producto='$id_producto' and stock=0";
			$respro_stock = mysqli_query($conn,$sqlpro_stock) or die(mysqli_error());
			$filaspro_stock = mysqli_num_rows($respro_stock);
			if($filaspro_stock>0){
					echo'<script type="text/javascript">
						alert("Ya no hay stock de este producto");
						</script>';
			}else{
///////////valida que exita el producto///////////////////////////////////
			if($id_producto!=0){
			 
				$sqlv1="SELECT * FROM ventas where activada='Si' and id_venta='$id_venta'";
				$resv1 = mysqli_query($conn,$sqlv1) or die(mysqli_error());
				$filasv_a = mysqli_num_rows($resv1);
			    if($filasv_a==0){

					$sql_sql="INSERT into ventas (id_venta,status, fecha, total, cliente, activada) values ('$id_venta','Si','$fecha','0','$cliente','Si')"; 
					$result_sql = mysqli_query($conn,$sql_sql) or die(mysqli_error());
					
				}
			  
				  $sql_sql2="INSERT into detalle_venta (id_venta,id_producto,id_categoria, costo) values ('$id_venta','$id_producto','$id_categoria','$costo')"; 
				  $result_sql2 = mysqli_query($conn,$sql_sql2) or die(mysqli_error());

				  $stock=$stock-1;
						 
						 $sql_upd="UPDATE productos set stock='$stock' where id_producto='$id_producto'"; 
						 $result_upd = mysqli_query($conn,$sql_upd) or die(mysqli_error());

				}

			}	
		}
	}	
 ///////////////////////////////dibuja la tabla de productos agregados////////////
		echo"<form action='ventas3.php' method='POST' name='frmdo' id='frmdo' enctype='multipart/form-data' >";
					echo'  <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Productos Agregados
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Categoria</th>
                                            <th>Cantidad</th>
                                            <th>Costo</th>
                                            <th>Borrar</th>
                                        </tr>
                                    </thead>';

		$sql4="SELECT * FROM detalle_venta where id_venta='$id_venta'";
						$res4 = mysqli_query($conn,$sql4) or die(mysqli_error());
						$total=0;
						while ($fila24 =  mysqli_fetch_assoc($res4)) {
										@$id_venta=$fila24['id_venta'];
										@$id_producto=$fila24['id_producto'];
										@$id_categoria=$fila24['id_categoria'];
										@$id_det_venta=$fila24['id_det_venta'];
										
									
									$sql5="SELECT * FROM productos,categorias where id_producto='$id_producto' and productos.id_categoria=categorias.id_categoria";
									$res5 = mysqli_query($conn,$sql5) or die(mysqli_error());
									while ($fila5 =  mysqli_fetch_assoc($res5)) {
													@$nombre_producto=$fila5['nombre_producto'];
													@$nombre_categoria=$fila5['nombre_categoria'];
													@$stock=$fila5['stock'];
													@$costo=$fila5['costo'];

									
									}
											
										
										echo"<tbody><tr>
								<td align='right'  width='80'>$nombre_producto</td>
								<td align='right'  width='80'>$nombre_categoria</td>
								<td align='right'  width='80'>1</td>
								<td align='right'  width='80'>$$costo</td>
								<td align='right'  width='80'><a class='btn btn-danger' onclick='eliminaProducto($id_det_venta);''>Eliminar</a></td>
						   </tr>";
						   
						$total=$total+$costo;
						   
						}
						
						
						
						 echo"<tr>
								<td align='right' colspan='3' width='80'>Total:</td>
								<td align='left'>$$total</td>
						   </tr>";
						echo"<tr>
								<td align='center' colspan='4' width='80'><a href='cobrar_ticket.php?id_venta=$id_venta&total=$total' class='btn btn-primary'>Cobrar</a></td>
								
						   </tr>";
				echo"</tbody></table></div></div></form>";

	
 
?> 