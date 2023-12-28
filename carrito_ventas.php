<?php
$usuariologin = $_COOKIE['usuariologin'];
$acceso = $_COOKIE['acceso'];
$usuariotipo = $_COOKIE['usuariotipo'];

if($acceso !=1)
{
header ("Location:index.html");
exit; 
}

include ("parte1.html");

?>
<script type='text/javascript' src='js/jquery-3.1.1.min.js'></script><!--linea para ajax-->


<h1 class="mt-4">VENTAS</h1>
<form  action='nueva_venta.php' method='POST' id='frmdo' enctype='multipart/form-data'>
<input type="submit" class="btn btn-primary" name="Registrar" value="Nueva Venta">

</form>
<?php
					echo'  <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Ventas Activas
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No. VENTA</th>
                                            <th>Fecha</th>
                                            <th>Nombre Cliente</th>
                                            <th>Detalle</th>
                                        </tr>
                                    </thead>';
					include ('conexion.php');
						   
					$sql3="SELECT * FROM ventas where status='Si'";
					$res3 = mysqli_query($conn,$sql3) or die(mysqli_error());
					while ($fila2 =  mysqli_fetch_assoc($res3)) {
									@$id_venta=$fila2['id_venta'];
									@$fecha=$fila2['fecha'];
									@$cliente=$fila2['cliente'];
						 											
										
										echo"<tbody><tr>
								<td align='right'  width='80'>$id_venta</td>
								<td align='right'  width='80'>$fecha</td>
								<td align='right'  width='80'>$cliente</td><td>";
									$fila="<div title='click para enviar' ";
									$fila .=" onclick='loadDynamicContentModal($id_venta);' class='btn btn-info'>Ver Detalle";
									$fila .="</div>";
									echo $fila;
						   echo"</td></tr>";
						   
												   
						
					
				}			
					echo"</tbody></table></div></div></form></center>";


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
	$('#conte-modal').load('ObtenerDatosVenta.php?my_modal='+modal, function() {
		$('#bootstrap-modal').modal({show:true});
    });    
}
</script> 
    
    <!-- Fin Contenido --> 
  </div>
</div>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script src="assets/jquery-1.12.4-jquery.min.js"></script> 

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script> 
<script src="assets/js/vendor/popper.min.js"></script> 
<script src="dist/js/bootstrap.min.js"></script>		
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</div>
</main>
<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Ing. Emmanuel Lerma 2022</div>
                           
                        </div>
                    </div>
                </footer>