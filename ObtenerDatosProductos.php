<?php

$idPesca=$_REQUEST["my_modal"];
include('conexion.php');


	$sqlv="SELECT * FROM productos where id_producto='$idPesca'";
		$resv = mysqli_query($conn,$sqlv) or die(mysqli_error());
		while ($filav =  mysqli_fetch_assoc($resv)) {
				@$costo=$filav['costo'];
				@$nombre_producto=$filav['nombre_producto'];
				@$stock=$filav['stock'];
							
		}
		
?>


                       <form action="" method = "POST" enctype="application/x-www-form-urlencoded" name="frmdo" id="frmdo" target="_self">
                       <div class='modal-text'>Producto <font size="4"><?php echo $nombre_producto;?></font></div>
						<div class='modal-text'>No. Producto </div>
						<div class='modal-text'><input type="text" name="nombre_producto" value='<?php echo $nombre_producto;?>' id="nombre_producto" class="form-control" placeholder="Ingresa Codigo Producto" >

						
                       <div class='modal-text'><input type="text" name="id_producto" value='<?php echo $idPesca;?>' id="id_producto" class="form-control" placeholder="Ingresa Codigo Producto" readonly=readonly>

                       <div class='modal-text'>Existencia<input type="text" name="stock" id="stock" value='<?php echo $stock;?>' class="form-control" placeholder="Ingresa Cantidad en Existencia" ></div>

                       <div class='modal-text'>Costo<input type="text" name="costo" id="costo" value='<?php echo $costo;?>' class="form-control" placeholder="Ingresa Costo del Producto" ></div>


					   <div class='modal-text'><input type='button' name='agregar' id='agregar' class="agregar" value='Modificar' /></div>
                       </form>
 <script type="text/javascript">
//<![CDATA[
$(function () {
	$('.agregar').click( 
		function () {
			var id_producto=document.getElementById("id_producto").value;
			var stock=document.getElementById("stock").value;
			var costo=document.getElementById("costo").value;
			var nombre_producto=document.getElementById("nombre_producto").value;
			$.ajax({
					type: 'POST',
					url: 'productos.php',
					data: 'id_producto=' + id_producto +
						'&stock=' + stock +
						'&nombre_producto=' + nombre_producto +
						'&costo=' + costo ,
					success: function (data) {
						alert("Producto Modificado");
						window.location.assign("busqueda_producto.php")
					}
				});
			
		}
	);
}); 

		
</script>