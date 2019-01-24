<?php
include("conect.php");
$con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");

$valor = mysqli_real_escape_string($con, $_GET['valor']);
$query="INSERT INTO tramas(trama) VALUES('".$valor."')";

mysqli_query($con,$query) or die ("problema conectando a la base de datos");
echo "ok";
mysqli_close($con) or die ("problemas cerrando la base de datos");
?>

/*

$con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");
$regi = mysqli_query($con,"SELECT * FROM tramas") or die ("problemas");

while($reg=mysqli_fetch_array($regi))
{
	$dato = $reg['trama'];
	
  
	$col = explode("/",$dato);

 $user = $col[0];
 //echo $user;
  $num = $col[1];
  $age = $col[2];
  $raza =$col[3];
  $fecha = $col[5];
  $litros = $col[4];
   
 $query="INSERT INTO $user (numero,edad,raza,fecha,litros) VALUES ('$num','$age','$raza','$fecha','$litros')";
mysqli_query($con,$query);
 // echo $query;
}


  mysqli_close($con);
?>


$con = mysqli_connect($host, $user, $pw);
mysqli_select_db($con,$db);
mysqli_query($con, "TRUNCATE TABLE tramas");
mysqli_close($con)

*/