<?php
$usuariologin = $_COOKIE['usuariologin'];
$acceso = $_COOKIE['acceso'];
$usuariotipo = $_COOKIE['usuariotipo'];

if($acceso !=1)
{
header ("Location:index.html");
exit; 
}

include("parte1.html");
if($usuariotipo==1){
	include('conexion.php');


		?>
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
							  
                                </div>
									<center>	<h1>Reporte Inventario</h1>
									<form action="reporte_inventario.php" method='POST' name="frmdo" id="frmdo">
									<table width=""  border="0" cellspacing="0" >
									<tr>
									<td align='left'>FECHA INICIAL:</td><td><input type='date' name='fecha_inicial' class='form-control'></td>
									</tr>
									<tr>
									<td colspan='4' align='center'><input type="submit" value="Buscar" class="btn btn-dark mb-2">
									</td>
									</tr>
									
									</table>
									</form>
									<script type="text/javascript">
											$(function (e) {
											$('#frmdo').submit(function (e) {
											e.preventDefault()
											$('#res').load('reporte_inventario2.php?' + $('#frmdo').serialize())
											})
											})
											</script>
											<br><br><br>
														
											 <div id="res"></div>
											  
								   </center>
                                 
		<?php
	}else{
	
	}
			include("parte2.html");
?>