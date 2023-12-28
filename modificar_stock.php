<?php

include("conexion.php");


include("parte1.html");


	$id_producto=$_REQUEST["id_producto"];
	
	
	$hoy=date("yy-m-d");
	
	$sql9= "SELECT * FROM productos WHERE id_producto='$id_producto'";
	$result9 = mysqli_query($conn,$sql9) or die(mysqli_error());
	while ($filav =  mysqli_fetch_assoc($result9)) {
						@$id_producto=$filav['id_producto'];
						@$nombre_producto=$filav['nombre_producto'];
						@$stock=$filav['stock'];
				
				}
		
echo'<br><form action="modificar_stock.php" method="POST" name="frmdo" id="frmdo">';
		echo"<table border='0' WIDTH='60%'>";
			
						echo"<tr><td align='right'>Nombre Producto:</td><td align='center'>$nombre_producto</td></tr>";
						
						echo"<tr><td align='center'><input type='hidden' name='id_producto' value='$id_producto'></td></tr>";
						echo"<tr><td align='right'>Stock:</td><td align='center'><input type='text' name='stock' value='$stock' class='form-control'></td></tr>";
							echo'<tr><td colspan="4" align="center" colspan="2"><input type="submit" value="Modificar" class="btn btn-dark mb-2"></td></tr>';
	
					
					
	
		echo"</table></center>";
		
		
	
?>
</form>


<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

</center>
<script type="text/javascript">
		$(function (e) {
		$('#frmdo').submit(function (e) {
		e.preventDefault()
		$('#res').load('modificar_stock2.php?' + $('#frmdo').serialize())
		})
		})
		</script>
		<br>
					
		  <center><div id="res"><b></b></div></center>	
		  
		  	<br>
<?php


	include("parte2.html");	
	?>