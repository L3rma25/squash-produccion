<?php
include("parte1.html");


include("conexion.php");

?>

<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
 <center><h3>Agregar Productos</h3>
<table border=0>
 
<form action="agregar_productos.php" method="POST" enctype="application/x-www-form-urlencoded" name="frmdo" id="frmdo" target="_self">
	 <tr><td><span style='color:red;'>*</span>Nombre Producto: </td><td><input id="search" name="nombre" type="text" class='form-control' placeholder="Ingresa nombre" required></td></tr><tr>
<td><span style='color:red;'>*</span>Stock: </td><td><input id="search" name="stock" type="text" class='form-control' placeholder="Ingresa Stock" required></td></tr><tr>
<td><span style='color:red;'>*</span>Costo Venta: </td><td><input id="search" name="costo" type="text" class='form-control' placeholder="Ingresa Costo" required></td></tr>
<td><span style='color:red;'>*</span>Costo Adquisiciòn: </td><td><input id="search" name="costo_adq" type="text" class='form-control' placeholder="Ingresa Costo" required></td></tr>
<tr><td><span style='color:red;'>*</span> Categoria:</td><td> <select name = 'categoria' class='form-control' style='width:15em;' required>
				<?php
					include("conexion.php");
					$sql= "select * from categorias";
					$valor2 = mysqli_query($conn,$sql) or die(mysqli_error());
					echo"<option value=''>Selecciona Categoria</option>";
					while ($fila2 =  mysqli_fetch_assoc($valor2)) {
						
						$id_categoria=$fila2['id_categoria'];
						$nombre_categoria=$fila2['nombre_categoria'];
						
						echo "<option value='$id_categoria'>$nombre_categoria</option>";
					}
				?>
			</select></td></tr>
<tr><td><span style='color:red;'>*</span>Código del Producto: </td><td><input id="search" name="codigo" type="text" class='form-control' placeholder="Ingresa nombre" required></td></tr>

	  <tr><td align="center" colspan="8"><input type="submit" value="Guardar" class="btn btn-success"></td></tr>
</form></table>
<div id="res"><b></b></div>

</center>
<script type="text/javascript">
											$(function (e) {
											$('#frmdo').submit(function (e) {
											e.preventDefault()
											$('#res').load('agregar_productos2.php?' + $('#frmdo').serialize())
											})
											})
											</script>
														
											 		
<?php
include("parte2.html");
?>