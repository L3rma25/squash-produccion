<?php
include("conexion.php");	

@$id_producto=$_REQUEST['id_producto'];
@$stock=$_REQUEST['stock'];

        $sql_upd_producto="UPDATE productos set stock='$stock' where id_producto='$id_producto'";
        $result_upd_producto = mysqli_query($conn,$sql_upd_producto) or die(mysqli_error()); 


    echo"<br><div class='alert alert-success'>Se ha actualizado correctamente</div>";

			
	
	
?>
