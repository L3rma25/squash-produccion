<?php
include("parte1.html");


include("conexion.php");

?>

<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
 <center><h3>Agregar Categoría</h3>
<table border=0>
 
<form action="agregar_categoria.php" method="POST" enctype="application/x-www-form-urlencoded" name="frmdo" id="frmdo" target="_self">
 <tr><td><span style='color:red;'>*</span>Nombre Categoría: </td><td><input id="search" name="nombre" type="text" class='form-control' placeholder="Ingresa nombre" required></td></tr>

	  <tr><td align="center" colspan="8"><input type="submit" value="Guardar" class="btn btn-success"></td></tr>
</form></table>
<div id="res"><b></b></div>

</center>
<script type="text/javascript">
											$(function (e) {
											$('#frmdo').submit(function (e) {
											e.preventDefault()
											$('#res').load('agregar_categoria2.php?' + $('#frmdo').serialize())
											})
											})
											</script>
														
											 		
<?php
include("parte2.html");
?>