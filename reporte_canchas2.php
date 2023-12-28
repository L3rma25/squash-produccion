<?php
error_reporting(0);
$fecha_inicial= $_REQUEST['fecha_inicial'];
include("conexion.php");


		$sql= "SELECT * FROM detalle_canchas WHERE fecha='$fecha_inicial' ";
		$result = mysqli_query($conn,$sql) or die(mysqli_error());
		$fila_121 = mysqli_num_rows($result);
		//echo $sql;
		//$total_gen=0;
		
		echo'<table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No. Cancha</th>
											<th>Nombre del Cliente</th>
                                            <th>Hora Inicio</th>
                                            <th>Hora Termino</th>
                                            <th>Tiempo Transcurrido</th>
                                            <th>Costo</th>
                                        </tr>
                                    </thead>';
		
			if($fila_121==0){
				
				ECHO'<div class="alert alert-warning">No se encuentran registros en esta fecha</div>';
			}
			else
			{
					
				echo"<h2>Se encontraron Registros</h2>";			
				$sql_consulta= "SELECT * FROM detalle_canchas,canchas WHERE fecha='$fecha_inicial' AND detalle_canchas.id_cancha=canchas.id_cancha";
			   //echo $sql_consulta;
			   $result_consulta = mysqli_query($conn,$sql_consulta) or die(mysqli_error());
			   $total=0;
			   while ($fila_consulta =  mysqli_fetch_assoc($result_consulta)) {
				
				$hora_inicio=$fila_consulta['hora_inicio'];
				$hora_termino=$fila_consulta['hora_termino'];
				$tiempo_transcurrido=$fila_consulta['tiempo_transcurrido'];
				$costo=$fila_consulta['costo'];
				$nombre_cancha=$fila_consulta['nombre_cancha'];
				$cliente=$fila_consulta['cliente'];
				
				$total=$total+$costo;	
				
				
				echo"<tbody><tr>
                                <td align='right'  width='80'>$nombre_cancha</td>
								<td align='right'  width='80'>$cliente</td>
                                <td align='right'  width='80'>$hora_inicio</td>
                                <td align='right'  width='80'>$hora_termino</td>
                                <td align='right'  width='80'>$tiempo_transcurrido min</td>
								<td align='right'  width='80'>$$costo</td></tr>";
						
			  }
			}
		
			
			 echo"<tr><td colspan='4' align='right'>Total</td><td colspan='' align='center'>$$total</td></tr></tr></tbody></table>";
?>
				
