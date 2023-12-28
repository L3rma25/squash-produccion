<?php

include("parte1.html");
include('conexion.php');


?>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
					  
                                </div>
									<center>	<h1>Reporte Canchas</h1>
									<form action="reporte_canchas.php" method='POST' name="frmdo" id="frmdo">
									<table width=""  border="0" cellspacing="0" cellpadding="0">
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
											$('#res').load('reporte_canchas2.php?' + $('#frmdo').serialize())
											})
											})
											</script>
											<br><br><br>
														
											 <div id="res"><b></b></div>
											  
								   </center>
                                 
                                <?php

								include("parte2.html");
								?>