<?php

include ("parte1.html");

include ('conexion.php');
//error_reporting(0);

            
?>
 <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

<?php



                                                    //////RECIBE PARAMETROS PARA ACTUALIZAR PRODUCTO

@$id_producto=$_REQUEST['id_producto'];
@$busqueda=$_REQUEST['busqueda'];
@$stock=$_REQUEST['stock'];
@$costo=$_REQUEST['costo'];
@$nombre_producto=$_REQUEST['nombre_producto'];
if($id_producto!=0){
        $sql_upd_producto="UPDATE productos set stock='$stock', costo='$costo', nombre_producto='$nombre_producto' where id_producto='$id_producto'";
        $result_upd_producto = mysqli_query($conn,$sql_upd_producto) or die(mysqli_error()); 
}

                                ///////////////////////////////dibuja la tabla de productos agregados////////////

        echo"<form action='' >";
                    echo'  <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Producto Encontrado
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No. Producto</th>
                                            <th>Producto</th>
                                            <th>Categoria</th>
                                            <th>Stock</th>
                                            <th>Costo</th>
                                            <th>Modificar</th>
                                        </tr>
                                    </thead>';

                                    
                                    $sql5="SELECT * FROM productos,categorias where productos.id_categoria=categorias.id_categoria and productos.codigo_barras='$busqueda'";
                                    $res5 = mysqli_query($conn,$sql5) or die(mysqli_error());
                                    while ($fila5 =  mysqli_fetch_assoc($res5)) {
                                                    @$id_producto=$fila5['id_producto'];
                                                    @$nombre_producto=$fila5['nombre_producto'];
                                                    @$nombre_categoria=$fila5['nombre_categoria'];
                                                    @$stock=$fila5['stock'];
                                                    @$costo=$fila5['costo'];

                                                        
                                        echo"<tbody><tr>
                                <td align='right'  width='80'>$id_producto</td>
                                <td align='right'  width='80'>$nombre_producto</td>
                                <td align='right'  width='80'>$nombre_categoria</td>
                                <td align='right'  width='80'>$stock</td>
                                <td align='right'  width='80'>$$costo</td><td>";
                                $fila="<div title='click para enviar'";
                                $fila .=" onclick='loadDynamicContentModal($id_producto);' class='btn btn-info'>Modificar Stock";
                                $fila .="</div>";
                                echo $fila;

                           
                           }
                    
                echo"</tbody></table></form>";

    


 ?>    
 
    <div name ='ajaxx' id='ajaxx'> 
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
                 <h5 class="modal-title">Modificar Producto</h5>
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
     <script type="text/javascript">
          
function loadDynamicContentModal(modal){

	 	 
    var options = {
            modal: true,
            height:300,
            width:600
        };
    $('#conte-modal').load('ObtenerDatosProductos.php?my_modal='+modal, function() {
        $('#bootstrap-modal').modal({show:true});
    });    
}

</script> 
    
    <!-- Fin Contenido --> 
  </div>
</div>
<script src="assets/jquery-1.12.4-jquery.min.js"></script> 

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<!-- <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script> 
<script src="assets/js/vendor/popper.min.js"></script> -->
<script src="dist/js/bootstrap.min.js"></script>        
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</div>
</main>
