<?php

$idPesca=$_REQUEST['my_modal'];

include('conexion.php');
// Controlar las tildes y ñ en los resultados desde MySQL
?>

<?php
      
    ?>

                      
                       <div class='modal-text'>No. Venta <?php echo $idPesca?></div>
                       <div class='modal-text'>
                        

<?php
echo'  <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Productos Agregados
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Categoria</th>
                                            <th>Cantidad</th>
                                            <th>Costo</th>
                                        </tr>
                                    </thead>';

        $sql4="SELECT * FROM detalle_venta where id_venta='$idPesca'";
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
                           </tr>";
                           
                        $total=$total+$costo;
                           
                        }
                        
                                             
                echo"</tbody></table></div></div></form>";

     
?>
</div>

<?php 
    
?>