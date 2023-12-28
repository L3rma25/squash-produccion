<?php

$idPesca=$_REQUEST['my_modal'];
$id_det_venta="null";
include('conexion.php');

						$sql4="SELECT * FROM ventas where id_venta='$idPesca'";
						$res4 = mysqli_query($conn,$sql4) or die(mysqli_error());
						$total=0;
						while ($fila24 =  mysqli_fetch_assoc($res4)) {
										@$cliente=$fila24['cliente'];
						}
?>


                       <form action="" method = "POST" enctype="application/x-www-form-urlencoded" name="frmdo" id="frmdo" target="_self">
                       <div class='modal-text'>No. Venta <?php echo $idPesca?></div>
                       <div class='modal-text'><input type="hidden" name="cliente" id="cliente" value="<?php echo $cliente; ?>"></div>
					   
<textarea class='form-control' id="CodBar" style='resize: none; height: 35px;' placeholder='Código de barras' autofocus='autofocus'></textarea>
                       <!-- <input type="text" id="CodBar" autofocus='autofocus' style='resize: none; height: 35px; placeholder='Código de barras'/>-->
					   <input type="hidden" name="id_venta" value="<?php echo $idPesca; ?>" id="id_venta"></div>
					   
                       </form>
<div name ='ajaxx2' id='ajaxx2'> 
 <script type="text/javascript">

 
$('#CodBar').keyup(function(e) {
     tecla = e.which;

			var id_producto=document.getElementById("CodBar").value;
			var cliente=document.getElementById("cliente").value;
			var id_venta=document.getElementById("id_venta").value;

			$.ajax({
					type: 'POST',
					url: 'venta_listado.php',
					data: 'id_producto=' + id_producto +
						'&cliente=' + cliente +
						'&id_venta=' + id_venta ,
					success: function (data) {
						$('#ajaxx2').html(data);
                        document.getElementById("CodBar").value = "";
					}
				});
}); 
function eliminaProducto(id_det_venta){
			
			var id_venta=document.getElementById("id_venta").value;
		
				$.ajax({
					type: 'POST',
					url: 'venta_listado.php',
					data: 'id_det_venta=' + id_det_venta+
						'&id_venta=' + id_venta +
						'&cliente=' + cliente +
						'&id_producto=' + 0,
					success: function (data) {
						$('#ajaxx2').html(data);
						//alert(id_det_venta);

					}
				});
			//}
		}
		function muestralistado () {
			var id_producto=document.getElementById("CodBar").value;
			var cliente=document.getElementById("cliente").value;
			var id_venta=document.getElementById("id_venta").value;
			$.ajax({
					type: 'POST',
					url: 'venta_listado.php',
					data: 'id_producto=' + id_producto +
						'&cliente=' + cliente +
						'&id_venta=' + id_venta,
					success: function (data) {
						$('#ajaxx2').html(data);

					}
				});
			
		}

muestralistado();
</script>