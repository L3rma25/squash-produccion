<?php
$usuariologin = $_COOKIE['usuariologin'];
$acceso = $_COOKIE['acceso'];
$usuariotipo = $_COOKIE['usuariotipo'];

if($acceso !=1)
{
header ("Location:index.html");
exit; 
}
include ("parte1.html");
?>
<html>
<head>
<title>Reloj con Javascript</title>
<script type='text/javascript' src='js/jquery-3.1.1.min.js'></script><!--linea para ajax-->
<script language="JavaScript">
function mueveReloj(){
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()

    str_segundo = new String (segundo)
    if (str_segundo.length == 1)
       segundo = "0" + segundo

    str_minuto = new String (minuto)
    if (str_minuto.length == 1)
       minuto = "0" + minuto

    str_hora = new String (hora)
    if (str_hora.length == 1)
       hora = "0" + hora

    horaImprimible = hora + ":" + minuto + ":" + segundo

    document.form_reloj.reloj.value = horaImprimible

    setTimeout("mueveReloj()",1000)
}
</script>
</head>

<body onload="mueveReloj()">
<h1 class="mt-4">Mesa 1</h1>
<form name="form_reloj" action='mesas_billar2.php' method='POST' id='frmdo' enctype='multipart/form-data'>
 <input type="text" name="reloj" size="10" value='reloj' style="background-color : Black; color : White; font-family : Verdana, Arial, Helvetica; font-size : 8pt; text-align : center;" onfocus="window.document.form_reloj.reloj.blur()">
		
<?php
   
include ('conexion.php');

   $sqlemp="SELECT * FROM detalle_mesas where activo='Si' and hora_inicio!='' and id_mesa='1'";
   $resemp = mysqli_query($conn,$sqlemp) or die(mysqli_error());
   $filasemp = mysqli_num_rows($resemp);
   if($filasemp==1){
	   
          echo"<div class='card-body'><div class='card bg-danger text-white mb-4'>MESA OCUPADA</div></div>";
          echo'<input type="submit" class="btn btn-primary" name="Terminar" value="Terminar">';
            
   }else{

         echo"<div class='card-body'><div class='card bg-success text-white mb-4'>MESA DESOCUPADA</div></div>";
		 
		 echo'<input type="submit" class="btn btn-primary" name="Iniciar" value="Iniciar">';
   }
?>

<h1 class="mt-4">Mesa 2</h1>
	<?php
   
include ('conexion.php');

   $sqlemp="SELECT * FROM detalle_mesas where activo='Si' and hora_inicio!='' and id_mesa='2'";
   $resemp = mysqli_query($conn,$sqlemp) or die(mysqli_error());
   $filasemp = mysqli_num_rows($resemp);
   if($filasemp==1){
            
         echo"<div class='card-body'><div class='card bg-danger text-white mb-4'>MESA OCUPADA</div></div>";
		 echo'<input type="submit" class="btn btn-primary" name="Terminar_2" value="Terminar">';
            
   }else{

         echo"<div class='card-body'><div class='card bg-success text-white mb-4'>MESA DESOCUPADA</div></div>";
		 
		 echo'<input type="submit" class="btn btn-primary" name="Iniciar_2" value="Iniciar">';
   }
?>	

<h1 class="mt-4">Mesa 3</h1>
   <?php
   
include ('conexion.php');

   $sqlemp="SELECT * FROM detalle_mesas where activo='Si' and hora_inicio!='' and id_mesa='3'";
   $resemp = mysqli_query($conn,$sqlemp) or die(mysqli_error());
   $filasemp = mysqli_num_rows($resemp);
   if($filasemp==1){
            
         echo"<div class='card-body'><div class='card bg-danger text-white mb-4'>MESA OCUPADA</div></div>";
       echo'<input type="submit" class="btn btn-primary" name="Terminar_3" value="Terminar">';
            
   }else{

         echo"<div class='card-body'><div class='card bg-success text-white mb-4'>MESA DESOCUPADA</div></div>";
       
       echo'<input type="submit" class="btn btn-primary" name="Iniciar_3" value="Iniciar">';
   }
?> 

</form>
</body>
</html>
<?php

include ("parte2.html");
?>