<?php
include("conect.php");
$con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");

$valor = mysqli_real_escape_string($con, $_GET['valor']);
$col = explode("/",$valor);

 $num = $col[0];
 //echo $user;
  $fecha = $col[1];
  $hora = $col[2];
  $litros =$col[3];
  $id_res = $col[4];
  $id_farm = $col[5];
   
 $query="INSERT INTO ordeno (numero,fecha,hora,litros,res_id,farm_id) VALUES ('$num','$fecha','$hora','$litros','$id_res','$id_farm')";
mysqli_query($con,$query);

//
echo "ok";
mysqli_close($con) or die ("problemas cerrando la base de datos");
?>