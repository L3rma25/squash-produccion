<?php

include ('parte1.html');

include("conexion.php");

?>
<html>

<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

<body>
 <center>
<h3>Busqueda Producto</h3>
<table><form action="busqueda_producto_nombre.php" method="POST" name="frmdo" id="frmdo" class="bg-light p-5 contact-form">
 <tr><td><span style='color:red;'>*</span>Ingresa Nombre del Producto: </td><td><input id="search" name="busqueda" type="text" class='form-control' style="width:10em;" placeholder="Ingresa Producto"></td></tr>

	  <tr><td></td><td align="center"><button type="submit" class="btn btn-primary py-3 px-5" name="save"><img src="images/apply2.png" alt=""/>Buscar</button></td></tr>
</form></table></center>
<script type="text/javascript">
$(function (e) {
	$('#frmdo').submit(function (e) {
		e.preventDefault()
		$('#res').load('busqueda_producto_nombre2.php?' + $('#frmdo').serialize())
	})
})
</script>
		  <center><div id="res"><b></b></div></center>		

</body>
</html>
<?php
include ('parte2.html');

?>

