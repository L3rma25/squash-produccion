<?php

include ("parte1.html");

$reloj=$_REQUEST['reloj'];
$cliente1=$_REQUEST['cliente1'];
$cliente2=$_REQUEST['cliente2'];

include ('conexion.php');

date_default_timezone_set('America/Mexico_City');
     $fecha = date("Y-m-d");

if (isset($_POST['Iniciar'])) {
	
			
$sql_sql2="INSERT into detalle_canchas (id_cancha,hora_inicio,hora_termino,tiempo_transcurrido, costo, activo, fecha, cliente) values ('1','$reloj','','','','Si','$fecha','$cliente1')"; 
//echo $sql_sql2;
			$result_sql2 = mysqli_query($conn,$sql_sql2) or die(mysqli_error());
			echo'<script type="text/javascript">
				alert("Inicio Tiempo Cancha 1");
				window.location.href="reloj.php";
				</script>';
     } if (isset($_POST['Terminar'])) {

       $sql3="SELECT * FROM detalle_canchas where activo='Si' and fecha='$fecha' and id_cancha='1'";
		$res3 = mysqli_query($conn,$sql3) or die(mysqli_error());
		$filas2 = mysqli_num_rows($res3);
		while ($fila3 =  mysqli_fetch_assoc($res3)) {
					@$hora_inicio=$fila3['hora_inicio'];
					@$hora_termino=$fila3['hora_termino'];
					
					$dateTimeObject1 = date_create($hora_inicio); 
					$dateTimeObject2 = date_create($hora_termino);
										$difference = date_diff($dateTimeObject1, $dateTimeObject2); 
					
					$minutes = $difference->days * 24 * 60;
					$minutes += $difference->h * 60;
					$minutes += $difference->i;
					

					$total=($minutes/60)*50;
					$total_redondeato=round($total);
				}




        $sql_upd="UPDATE detalle_canchas set hora_termino='$reloj', activo='No', costo='$total_redondeato', tiempo_transcurrido='$minutes' where id_cancha='1' and activo='Si' and fecha='$fecha'"; 
        $result_upd = mysqli_query($conn,$sql_upd) or die(mysqli_error());
       
        echo'<script type="text/javascript">
				alert("Se termino el tiempo de cancha 1: Total '.$total_redondeato.' Pesos Mx");
				window.location.href="reloj.php";
				</script>';

     }
	 //                                                              cancha 2 -->
	 if (isset($_POST['Iniciar_2'])) {
	
			
$sql_sql2="INSERT into detalle_canchas (id_cancha,hora_inicio,hora_termino,tiempo_transcurrido, costo, activo, fecha, cliente) values ('2','$reloj','','','','Si','$fecha','$cliente2')"; 
//echo $sql_sql2;
			$result_sql2 = mysqli_query($conn,$sql_sql2) or die(mysqli_error());
			echo'<script type="text/javascript">
				alert("Inicio Tiempo Cancha 2");
				window.location.href="reloj.php";
				</script>';
     } if (isset($_POST['Terminar_2'])) {

       $sql3="SELECT * FROM detalle_canchas where activo='Si' and fecha='$fecha' and id_cancha='2'";
		$res3 = mysqli_query($conn,$sql3) or die(mysqli_error());
		$filas2 = mysqli_num_rows($res3);
		while ($fila3 =  mysqli_fetch_assoc($res3)) {
					@$hora_inicio=$fila3['hora_inicio'];
					@$hora_termino=$fila3['hora_termino'];
					
					$dateTimeObject1 = date_create($hora_inicio); 
					$dateTimeObject2 = date_create($hora_termino);
										$difference = date_diff($dateTimeObject1, $dateTimeObject2); 
					
					$minutes = $difference->days * 24 * 60;
					$minutes += $difference->h * 60;
					$minutes += $difference->i;
					

					$total=($minutes/60)*40;
					$total_redondeato=round($total);
				}




        $sql_upd="UPDATE detalle_canchas set hora_termino='$reloj', activo='No', costo='$total_redondeato', tiempo_transcurrido='$minutes' where id_cancha='2' and activo='Si' and fecha='$fecha'"; 
        $result_upd = mysqli_query($conn,$sql_upd) or die(mysqli_error());
       
        echo'<script type="text/javascript">
				alert("Se termino el tiempo de cancha 2: Total '.$total_redondeato.' Pesos Mx");
				window.location.href="reloj.php";
				</script>';

     }
	


include ("parte2.html");	  
	


?>