<?php
$fecha_inicial= $_REQUEST['fecha_inicial'];
include("conexion.php");
		$sql= "SELECT * FROM ventas WHERE fecha = '$fecha_inicial' ";
		$result = mysqli_query($conn,$sql) or die(mysqli_error());
		$fila_12 = mysqli_num_rows($result);
		
		
		$total_gen=0;
		
			if($fila_12==0){
				
				ECHO'<div class="alert alert-warning">No se encuentran registros en esta fecha</div>';
			}
			else
			{
				
		echo"<h2>Se encontraron $fila_12 Registros</h2>";
				echo'<table  border="5" class="table" width="100%">
                                    <thead>
                                        <tr>
                                            <th align="center" width="10%">Fecha<th>
                                            <th align="center" width="10%">No.Venta<th>
                                            <th align="center" width="10%">Cantidad Productos<th>
                                            <th align="center" width="10%">Total de Venta<th>
                                            <th align="center" width="10%">Detalle<th>
                                        </tr></thead>';
				while ($fila_12 =  mysqli_fetch_assoc($result)) {			
					$id_venta=$fila_12['id_venta'];
					$fecha=$fila_12['fecha'];
					$total=$fila_12['total'];
				
			   $sql_pago= "SELECT * FROM detalle_venta,productos WHERE id_venta='$id_venta' and detalle_venta.id_producto=productos.id_producto";
			   $result_pago = mysqli_query($conn,$sql_pago) or die(mysqli_error());
			   $fila_pro = mysqli_num_rows($result_pago);
			   while ($fila_pago =  mysqli_fetch_assoc($result_pago)) {
				
				$nombre_producto=$fila_pago['nombre_producto'];
				$costo=$fila_pago['costo'];
				
					
				
				}
				echo"<tbody><tr>";
					echo"<td aling=right width=10%>$fecha</td>";
					echo"<td aling='center' colspan=2 width='10%'>$id_venta</td>";
					echo"<td aling='center' colspan=2  width='10%'>$fila_pro</td>";
					echo"<td aling='center' width='10%'>$$total.MX</td>";
					$total_gen=$total_gen+$total;

						$fila="<td><div title='click para enviar' ";
						$fila .=" onclick='loadDynamicContentModal($id_venta);' class='btn btn-info'>Ver Detalle";
						//$fila .="class='btn btn-success'>Oracle";

						$fila .="</div></td>";
						echo $fila;
						
					echo"";


				}
				
			 echo"</tr>
			 <tr><td colspan=3>Total por día:</td><td colspan='4'>$$total_gen.MX<td></tr></tbody></table>";
			   }
		
?>
				
<div class="container">
  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
      
           
    
      <div class="modal fade" id="bootstrap-modal" role="dialog">
        <div class="modal-dialog" role="document"> 
          <!-- Modal contenido-->
          <div class="modal-content">
            <div class="modal-header">
            	 <h5 class="modal-title">Detalle Venta</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
              <div id="conte-modal"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
function loadDynamicContentModal(modal){
	var options = {
			modal: true,
			height:300,
			width:600
		};
	$('#conte-modal').load('ObtenerDatos.php?my_modal='+modal, function() {
		$('#bootstrap-modal').modal({show:true});
    });    
}
</script> 
    
    <!-- Fin Contenido --> 
  </div>
</div>
<!-- Fin row -->

</div>
<!-- Fin container -->
<footer class="footer">
  <div class="container"> <span class="text-muted">
    </span> </div>
</footer>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script src="assets/jquery-1.12.4-jquery.min.js"></script> 
<script src="assets/jquery.validate.min.js"></script> 
<script src="assets/ValidarRegistro.js"></script> 
<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script> 
<script src="assets/js/vendor/popper.min.js"></script> 
<script src="dist/js/bootstrap.min.js"></script>		
