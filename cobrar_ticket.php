<?php

		


require __DIR__ . '/ticket/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
include("conexion.php");

$id_venta=$_REQUEST['id_venta'];
$total=$_REQUEST['total'];

		
/*
	Este ejemplo imprime un
	ticket de venta desde una impresora térmica
*/


/*
    Aquí, en lugar de "POS" (que es el nombre de mi impresora)
	escribe el nombre de la tuya. Recuerda que debes compartirla
	desde el panel de control
*/

$nombre_impresora = "POS-58"; 


$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);
#Mando un numero de respuesta para saber que se conecto correctamente.
echo 1;
/*
	Vamos a imprimir un logotipo
	opcional. Recuerda que esto
	no funcionará en todas las
	impresoras

	Pequeña nota: Es recomendable que la imagen no sea
	transparente (aunque sea png hay que quitar el canal alfa)
	y que tenga una resolución baja. En mi caso
	la imagen que uso es de 250 x 250
*/

# Vamos a alinear al centro lo próximo que imprimamos
$printer->setJustification(Printer::JUSTIFY_CENTER);

/*
	Intentaremos cargar e imprimir
	el logo
*/
try{
	$logo = EscposImage::load("ticket/geek.png", false);
    //$printer->bitImage($logo);
}catch(Exception $e){/*No hacemos nada si hay error*/}

/*
	Ahora vamos a imprimir un encabezado
*/

$printer->text("\n"."Squash Chito" . "\n");

#La fecha también
date_default_timezone_set("America/Mexico_City");
$printer->text(date("Y-m-d H:i:s") . "\n");
$printer->text("-----------------------------" . "\n");
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer->text("CANT  DESCRIPCION    IMP.\n");
$printer->text("-----------------------------"."\n");
/*
	Ahora vamos a imprimir los
	productos
*/
	/*Alinear a la izquierda para la cantidad y el nombre*/
	$sql_pago= "SELECT * FROM detalle_venta,productos WHERE id_venta='$id_venta' and detalle_venta.id_producto=productos.id_producto";
			   $result_pago = mysqli_query($conn,$sql_pago) or die(mysqli_error());
			   $fila_pro = mysqli_num_rows($result_pago);
			   $total=0;
			   while ($fila_pago =  mysqli_fetch_assoc($result_pago)) {
				
				$nombre_producto=$fila_pago['nombre_producto'];
				$costo=$fila_pago['costo'];
				
					
	$printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text("$nombre_producto\n");
	
    $printer->text( "1    $$costo .00   \n");
				$total=$total+$costo;
						   
				}

$printer->setJustification(Printer::JUSTIFY_RIGHT);				
$printer->text("TOTAL: $$total .00\n");
	/*			
	$printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text("Producto Galletas\n");
    $printer->text( "2  pieza    20.00   \n");
    $printer->text("Sabrtitas \n");
    $printer->text( "3  pieza    30.00   \n");
    $printer->text("Doritos \n");
    $printer->text( "5  pieza    50.00   \n");

	Terminamos de imprimir
	los productos, ahora va el total

$printer->text("-----------------------------"."\n");
$printer->setJustification(Printer::JUSTIFY_RIGHT);
$printer->text("SUBTOTAL: $100.00\n");
$printer->text("IVA: $16.00\n");
$printer->text("TOTAL: $116.00\n");

*/
/*
	Podemos poner también un pie de página
*/
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->text("Muchas gracias por su visita\n");



/*Alimentamos el papel 3 veces*/
$printer->feed(3);

/*
	Cortamos el papel. Si nuestra impresora
	no tiene soporte para ello, no generará
	ningún error
*/
$printer->cut();

/*
	Por medio de la impresora mandamos un pulso.
	Esto es útil cuando la tenemos conectada
	por ejemplo a un cajón
*/
$printer->pulse();

/*
	Para imprimir realmente, tenemos que "cerrar"
	la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
*/
$printer->close();


		include ('conexion.php');
		$sql_upd="UPDATE ventas set status='No', total='$total', activada='No' where id_venta='$id_venta'"; 
		$result_upd = mysqli_query($conn,$sql_upd) or die(mysqli_error());
		echo'<script type="text/javascript">
				alert("Se ha realizado la Venta Correctamente la Cuenta es '.$total.' Pesos MX.");
			window.location.href="carrito_ventas.php";
				</script>';


?>