<?php

include ("parte1.html");

//include ('conexion.php');
//error_reporting(0);

            
?>

<meta charset="utf-8">
<style type="text/css">
  .pagina {
   padding:8px 16px;
   border:1px solid #ccc;
   color:#333;
   font-weight:bold;
  }
</style>
<h1 class="mt-4">Productos</h1>

<div class="container">
 
  <div class="row">
    <div class="col-md-6">
<div class="panel-body">


<?php

include ('conexion.php');
$record_per_page = 3;
$pagina = '';
if(isset($_GET["pagina"]))
{
 $pagina = $_GET["pagina"];
}
else
{
 $pagina = 1;
}

$start_from = ($pagina-1)*$record_per_page;

$query = "SELECT * FROM productos,categorias where productos.id_categoria=categorias.id_categoria order by id_producto DESC LIMIT $start_from, $record_per_page";
$result = mysqli_query($conn, $query);

?>

<div class="table-responsive">
    <table  width="100px" height="100px">
     <tr>
      <th>ID</th>
      <th>Producto</th>
      <th>Categorìa</th>
      <th>Stock</th>
      <th>Costo</th>
      <th>Detalle</th>
     </tr>
     <?php
     $number=0;
       while ($fila5 =  mysqli_fetch_assoc($result)) {
                                                    @$id_producto=$fila5['id_producto'];
                                                    @$nombre_producto=$fila5['nombre_producto'];
                                                    @$nombre_categoria=$fila5['nombre_categoria'];
                                                    @$stock=$fila5['stock'];
                                                    @$costo=$fila5['costo'];

                                                        
                                        echo"<tr>
                                <td align='right'  >$id_producto</td>
                                <td align='right'  >$nombre_producto</td>
                                <td align='right'  >$nombre_categoria</td>
                                <td align='right'  >$stock</td>
                                <td align='right'  >$costo</td><td>";
                                $fila="<div title='click para enviar'";
                                $fila .=" onclick='loadDynamicContentModal($id_producto);' class='btn btn-info'>Modificar Stock";
                                $fila .="</div>";
                                echo $fila;

                           
                           }
         
     ?>
    
    </table>
     <div align="center">
    <br />
    <?php
    $page_query = "SELECT * FROM productos,categorias where productos.id_categoria=categorias.id_categoria order by id_producto DESC";
    $page_result = mysqli_query($conn, $page_query);
    $total_records = mysqli_num_rows($page_result);
    $total_pages = ceil($total_records/$record_per_page);
    $start_loop = $pagina;
    $diferencia = $total_pages - $pagina;
    if($diferencia <= 5)
    {
     $start_loop = $total_pages - 5;
    }
    $end_loop = $start_loop + 4;
    if($pagina > 1)
    {
     echo "<a class='pagina' href='productos_prueba.php?pagina=1'>Primera</a>";
     echo "<a class='pagina' href='productos_prueba.php?pagina=".($pagina - 1)."'><<</a>";
    }
    for($i=$start_loop; $i<=$end_loop; $i++)
    {     
     echo "<a class='pagina' href='productos_prueba.php?pagina=".$i."'>".$i."</a>";
    }
    if($pagina <= $end_loop)
    {
     echo "<a class='pagina' href='productos_prueba.php?pagina=".($pagina + 1)."'>>></a>";
     echo "<a class='pagina' href='productos_prueba.php?pagina=".$total_pages."'>Última</a>";
    }
    
    
    ?>
    </div>
    <br /><br />

 </div>


</div>
</div>
  </div>
</div>  
    <div name ='ajaxx' id='ajaxx'> </div>
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