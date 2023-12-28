<?php

include ('parte1.html');

include("conexion.php");
				
?>
<html><head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
 <center>
<h3>Productos en Existencia</h3>

<div class="main-box-inter">
			
				<div class="main-box-body clearfix" style="padding: 20px 20px 0px 20px;">
				
					<div class="row">
						<div class="col-lg-6 col-sm-8 col-xs-8">
							<?php
							/*
							echo '
							<div class="form-group">
								<input id="search" name="busqueda" type="text" class="form-control" style="width:15em;" placeholder="Ingresa Codigo de Producto">
								<button type="submit" class="btn btn-success" name="save">Buscar</button>
							</div>
							';
							*/
							?>
							
<textarea class='form-control' id="CodBar" style='resize: none; height: 35px;' placeholder='Código de barras' autofocus='autofocus'></textarea>
						<button onclick="limpiar()">Limpiar</button></div>

						<div class="col-lg-6 col-sm-4 col-xs-4 text-right">
							<a href="agregar_productos.php" class="btn btn-success"><span class="fa fa-search"></span> Agregar Producto</a>
						</div>
					</div>
					<div>	
						<div class="col-lg-6 col-sm-4 col-xs-4 text-right">
							<a href="agregar_categoria.php" class="btn btn-warning"><span class="fa fa-search"></span> Agregar Categoría</a>
						</div>
					</div>
				
					
				</div>								
			</div>


</center>
<script type="text/javascript">
 function limpiar() {
    document.getElementById("CodBar").value = "";
}
$('#CodBar').keyup(function(e) {
     tecla = e.which;
     cod= $('#CodBar').val();
 
          $.ajax({
        url: 'productos.php', 
		type: 'POST',
		data: 'busqueda=' + cod,
		success:function(data) {
                     $('#res').html(data);
		}//SUCCESS
	  });//AJAX
     
});	
</script>
		 <div class="main-box-inter">
			
				<div class="main-box-body clearfix" style="padding: 0px 0px 0px 0px;">
					
					<?php
						# Muestra listado
						echo "<div id='res'></div>";
					?>
					
					
					
					
				</div>								
			</div>	

</body>
</html>
<?php
include ('parte2.html');

?>
