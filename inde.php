<?php
include('conexion.php');
$usuario=$_REQUEST['usuario'];
$contrasena=$_REQUEST['psw'];
    $sql="SELECT * FROM usuarios WHERE usuario='$usuario'";
	$result = mysqli_query($conn,$sql) or die(mysqli_error());
	$filas111 = mysqli_num_rows($result);
	if ($filas111!=0){

			$sql2="SELECT * FROM usuarios WHERE usuario='$usuario' and contrasena='$contrasena'";
			$result2 = mysqli_query($conn,$sql2) or die(mysqli_error());
			$filas1112 = mysqli_num_rows($result2);
			//echo $sql2;
				if ($filas1112!=0){
					
				while ($filas1112 =  mysqli_fetch_assoc($result2)) {
				
					$id_tipo_usuario=$filas1112['id_tipo_usuario'];	
					$intentos=$filas1112['intentos'];	
				//if($intentos!=0){
					
					echo"<script language='Javascript'> location.href='reloj.php'; </script>";
					setcookie('usuariologin',$usuario);
					setcookie('usuariotipo',$id_tipo_usuario);
					setcookie('acceso','1');	
				  }
				}else{
				 //echo"contraseña incorrecta";
					echo"<script language='javascript'> alert('CONTRASEÑA INCORRECTA'); </script>";
					echo"<script language='Javascript'> location.href='index.html'; </script>";
				}
			
	}else{
		echo"<script language='javascript'> alert('El USUARIO NO EXISTE'); </script>";
		echo"<script language='Javascript'> location.href='index.html'; </script>";
//echo"uisuario incorrecta";

	}
   

