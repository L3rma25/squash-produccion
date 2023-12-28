<?php
include("parte1.html");
?>
<!DOCTYPE html>
<html>
<head>
<title>Paginación usando PHP MySqli</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<style type="text/css">
  .pagina {
   padding:8px 16px;
   border:1px solid #ccc;
   color:#333;
   font-weight:bold;
  }
</style>
</head>
<body>

<div class="container">
 
  <div class="row">
    <div class="col-md-6">
<div class="panel-body">


<?php
$conexion = mysqli_connect("localhost", "root", "", "squash");
$record_per_page = 7;
$pagina = '';
if(isset($_GET["pagina"]))
{
 $pagina = $_GET["pagina"];
}
else
{
 $pagina = 1;
}

$start_from = ($pagina-1)*$record_per_page;

$query = "SELECT * FROM alumnos order by alumno_id DESC LIMIT $start_from, $record_per_page";
$result = mysqli_query($conexion, $query);

?>

<div class="table-responsive">
    <table class="table table-bordered">
     <tr>
      <th>ID</th>
      <th>Nombres</th>
      <th>Teléfonos</th>
     </tr>
     <?php
	 $number=0;
     while($row = mysqli_fetch_array($result))
     {
		 $number++;
     ?>
     <tr>
      <td><?php echo $number; ?></td>
      <td><?php echo $row["nombres"]; ?></td>
      <td><?php echo $row["telefonos"]; ?></td>
     </tr>
     <?php
     }
     ?>
    </table>
     <div align="center">
    <br />
    <?php
    $page_query = "SELECT * FROM alumnos ORDER BY alumno_id DESC";
    $page_result = mysqli_query($conexion, $page_query);
    $total_records = mysqli_num_rows($page_result);
    $total_pages = ceil($total_records/$record_per_page);
    $start_loop = $pagina;
    $diferencia = $total_pages - $pagina;
    if($diferencia <= 5)
    {
     $start_loop = $total_pages - 5;
    }
    $end_loop = $start_loop + 4;
    if($pagina > 1)
    {
     echo "<a class='pagina' href='pagina.php?pagina=1'>Primera</a>";
     echo "<a class='pagina' href='pagina.php?pagina=".($pagina - 1)."'><<</a>";
    }
    for($i=$start_loop; $i<=$end_loop; $i++)
    {     
     echo "<a class='pagina' href='pagina.php?pagina=".$i."'>".$i."</a>";
    }
    if($pagina <= $end_loop)
    {
     echo "<a class='pagina' href='pagina.php?pagina=".($pagina + 1)."'>>></a>";
     echo "<a class='pagina' href='pagina.php?pagina=".$total_pages."'>Última</a>";
    }
    
    
    ?>
    </div>
    <br /><br />

 </div>


</div>
</div>
  </div>
</div>

</body>
</html>
<?php
include("parte2.html");
?>