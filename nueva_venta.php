<?php

include ("parte1.html");

include ('conexion.php');
error_reporting(0);


	$sqlv="SELECT * FROM ventas ORDER by id_venta DESC limit 1";
		$resv = mysqli_query($conn,$sqlv) or die(mysqli_error());
		$filasv_v = mysqli_num_rows($resv);
		if($filasv_v==0){
			$id_venta=1;
		}else{
			while ($filav =  mysqli_fetch_assoc($resv)) {
						@$id_venta=$filav['id_venta'];
						$id_venta=$id_venta+1;
							
			}
		}

			
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<h1 class="mt-4">Generar Nueva Venta</h1>

 No.de Venta<input type="text" name="id_venta"  value='<?php echo $id_venta;?>' id="id_venta" class="form-control" readonly=readonly style='resize: none; height: 35px; width: 160px;'>
	Nombre Cliente:<input type="text" name="cliente" id="cliente" class="form-control" placeholder="Ingresa Nombre" style='resize: none; height: 35px; width: 160px;' requiredS>
Ingresa Código de Barras<!-- <input type="text" id="CodBar" autofocus='autofocus' class='form-control' style='resize: none; height: 35px; width: 160px;' />-->

<textarea class='form-control' id="CodBar" style='resize: none; height: 15px;' placeholder='Código de barras' autofocus='autofocus'></textarea>

		<div name ='ajaxx' id='ajaxx'> 
 <script type="text/javascript">

///funcion para cargar productos cuando se agregan al carrito de ventas
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
						'&id_venta=' + id_venta,
					success: function (data) {
						$('#ajaxx').html(data);
						document.getElementById("CodBar").value = "";
					}
				});
			
}); 
//funcion que elimina productos y actualiza table
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
						$('#ajaxx').html(data);
						//alert(id_det_venta);

					}
				});
			//}
		}
///funcion que muestra la tabla en cero
		function muestralistado () {
			$.ajax({
					type: 'POST',
					url: 'venta_listado.php',
					data: 'id_producto=' + 0 +
						'&cliente=' + 0 +
						'&id_venta=' + 0 ,
					success: function (data) {
						$('#ajaxx').html(data);

					}
				});
			
		}

muestralistado();

</script>
<br>
<?php

include ("parte2.html");
?>