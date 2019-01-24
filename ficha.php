<?php
session_start();
?>
<head>
<title>Ficha de Res</title>
</head>
<center><img src="otros/logoapp1_small.jpg" > </center>

<?php
if(isset($_SESSION['username'])){

	 echo "<br> <a href=panel_user.php> Volver a Panel de Usuario</a>&ensp;&ensp;";echo "<a href='javascript:window.print(); void 0;'>Imprimir Resultados</a> &ensp;&ensp;"; 
	echo " <a href=cerrar.php> Cerrar Sesion</a>";
	echo "<br>";
}
else
{
	echo "Access Denied";
	echo"<script>location.href='index.php';</script>";
}
?>
<?php
include("conect.php");
$con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");
if(isset($_POST['SubmitButton'])){ //check if form was submitted
 $query="SELECT numero, sexo,fecha_nto,raza,num_padre,num_madre,peso_nto FROM reses WHERE numero='$_POST[noanimal]' and farm_id=$_SESSION[id_farm]";
 $_FICHA=$_POST['noanimal'];
}
else
{
	$_FICHA = mysqli_real_escape_string($con, $_GET['valor']);
$query="SELECT numero, sexo,fecha_nto,raza,num_padre,num_madre,peso_nto FROM reses WHERE numero='$_FICHA' and farm_id=$_SESSION[id_farm]";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
 <body style="background-color:#A7C645 ">
 
      <div id= "container2"  >
      <div style="background-color:#F0F0E8;">
     
    
      <form action= "" method="post" name="frm" >
<style type="text/css">
  .boton{
        font-size:16px;
        font-family:Verdana,Helvetica;
        font-weight:bold;
        color:white;
        background:#804000;
       border-radius: 5px;
        width:100px;
        height:40px;
       }
	.espace{
		        font-size:14px;
        font-family:Verdana,Helvetica;
        font-weight:bold;
        color:#804000;
        background:#ffffff;
        border-radius: 5px;
        width:150px;
        height:30px;
	}
	
</style>

            
         <font color=#804000><b><h3>N° Animal</h3></b></font> <input type="text" name="noanimal" class="espace" />
          &ensp;&ensp;
      <input type="submit" name="SubmitButton" value="Consultar" class="boton"/><br>
         </form>

    
      </div>
        </div>
   <div class= "rows">
<div class="container-fluid">
<div class="col-lg-12">
   <div class="panel panel-default" style="color: #E0D2B5">
      <div class="panel-heading" style="background-color: #F0F0E8">
         <h3 class="panel-title" align="center"><font color=#804000><b><i class="fa fa-th-list "></i>Ficha de Res	</h3>
         </b></font>
      </div>
      <table id="" class="table table-condensed table-bordered" style="background-color:#CEF6F5" cellspacing="0" width="100%">
      <thead>
         <table border="1" cellspacing=1 cellpadding=0 style="font-size: 12pt" width="100%" style="border-collapse: separate" bordercolor="#E0D2B5"  style="background-color: #3f51b5">
            <tr>
   </div>
</div>
</tr>
<?php




//echo $valor;

   $result = mysqli_query($con,$query) or die ("problema conectando a la base de datos");
   $numero=0;
?>
<tr>  
<th>Numero de Animal</th>
<th>Sexo</th>
<th>Fecha de Nto</th>
<th>Raza</th> 
<th>Padre</th>
<th>Madre</th>
<th>Peso de Nto</th>  
</tr>
<?php
while($row = mysqli_fetch_array($result))
   {
   
     echo "<tr><td width=\"15%\"><font face=\"verdana\"><center>" . 
       $row["numero"] . "</center></font></td>";
     echo "<td width=\"15%\"><font face=\"verdana\"><center>" . 
       $row["sexo"] . "</center></font></td>";
     echo "<td width=\"15%\"><font face=\"verdana\"><center>" . 
       $row["fecha_nto"] . "</center></font></td>";
    echo "<td width=\"15%\"><font face=\"verdana\"><center>" . 
       $row["raza"]. "</center></font></td>";
	   echo "<td width=\"15%\"><font face=\"verdana\"><center>" . 
       $row["num_padre"]. "</center></font></td>";
	   echo "<td width=\"15%\"><font face=\"verdana\"><center>" . 
       $row["num_madre"]. "</center></font></td>";
     echo "<td width=\"15%\"><font face=\"verdana\"><center>" . 
       $row["peso_nto"] . "</center></font></td></tr>";
   
  
   }
//mysqli_free_result($result) or die("fail free result");

?>

</table>
<br />
<br />
   <div class= "rows">
<div class="container-fluid">
<div class="col-lg-12">
   <div class="panel panel-default" style="color: #F0F0E8">
      <div class="panel-heading" style="background-color: #F0F0E8">
         <h3 class="panel-title" align="center"><font color=#804000><b><i class="fa fa-th-list "></i>ULTIMOS ORDEÑOS</h3>
         </b></font>
      </div>
      <table id="" class="table table-condensed table-bordered" style="background-color:#CEF6F5" cellspacing="0" width="100%">
      <thead>
         <table border="1" cellspacing=1 cellpadding=0 style="font-size: 12pt" width="100%" style="border-collapse: separate" bordercolor="#E0D2B5"  style="background-color: #3f51b5">
            <tr>
   </div>
</div>
</tr>
<?php

$query2="SELECT numero,litros,fecha,hora FROM ordeno  WHERE farm_id=$_SESSION[id_farm] AND numero='$_FICHA' LIMIT 10";

//echo $query2;

$res = mysqli_query($con,$query2) or die ("problema conectando a la base de datos 2");
$num=0;
 ?>
<tr>  
<th>N° Animal</th>

<th>Leche (Litros)</th> 
<th>Fecha</th> 
<th>Hora</th> 
</tr>
<?php
$total=0;
   while($row2 = mysqli_fetch_array($res))
   {
   
     echo "<tr><td width=\"15%\"><font face=\"verdana\"><center>". 
       $row2["numero"] . "</center></font></td>";
     echo "<td width=\"15%\"><font face=\"verdana\"><center>" . 
       $row2["litros"]. "</center></font></td>";
           echo "<td width=\"15%\"><font face=\"verdana\"><center>" . 
       $row2["fecha"]. "</center></font></td>";
     echo "<td width=\"15%\"><font face=\"verdana\"><center>" . 
       $row2["hora"] . "</center></font></td></tr>";
   
    $total=$total+$row2["litros"];
     $num++;
   }

	      echo "<tr><td colspan=\"15\"><font face=\"verdana\"><b>Se han ordeñado en total:  " . $total ." litros, en el tiempo seleccionado". "</b></font></td></tr>";
//mysqli_free_result($res) or die ("fail free result1");


?>
</table>
<br />
<br />
   <div class= "rows">
<div class="container-fluid">
<div class="col-lg-12">
   <div class="panel panel-default" style="color: #3f51b5">
      <div class="panel-heading" style="background-color: #F0F0E8">
         <h3 class="panel-title" align="center"><font color=#804000><b><i class="fa fa-th-list "></i>ULTIMOS PESAJES</h3>
         </b></font>
      </div>
      <table id="" class="table table-condensed table-bordered" style="background-color:#CEF6F5" cellspacing="0" width="100%">
      <thead>
         <table border="1" cellspacing=1 cellpadding=0 style="font-size: 12pt" width="100%" style="border-collapse: separate" bordercolor="#E0D2B5"  style="background-color: #3f51b5">
            <tr>
   </div>
</div>
</tr>
<?php
$query = "SELECT numero,peso,fecha FROM pesaje  WHERE farm_id=$_SESSION[id_farm] AND numero='$_FICHA' order by id DESC LIMIT 10 ";
 //echo $query;
  $result = mysqli_query($con,$query)or die("fail query");
  $nume=0;
  $total2=0;
?>
 <tr>  
<th>N° Animal</th>

<th>Peso</th> 
<th>Fecha</th> 
 
</tr>
<?php

   while($row = mysqli_fetch_array($result))
   {
   
     echo "<tr><center><td width=\"15%\"><font face=\"verdana\"><center>" . 
       $row["numero"] . "</center></font></center></td>";
     echo "<td width=\"15%\"><font face=\"verdana\"><center>" . 
       $row["peso"]. "</center></font></td>";
           echo "<td width=\"15%\"><font face=\"verdana\"><center>" . 
       $row["fecha"]. "</center></font></td>";
     
       
   $total2=$total2+$row["peso"];
     $nume++;

   }
   if ($nume !=0)
   {
   $promedio=$total2/$nume;
   }else
   {
	   $promedio=0;
   }
   echo "<tr><td colspan=\"15\"><font face=\"verdana\"><b>Total de datos:  " . $nume . 
       "</b></font></td></tr>";
	      echo "<tr><td colspan=\"15\"><font face=\"verdana\"><b>El animal ha ganado en promedio:  " . $promedio ." kilos entre cada pesaje". "</b></font></td></tr>";
	   
     // mysqli_free_result($result) or die;
mysqli_close($con) or die ("problemas cerrando la base de datos");
   
   ?>
</table>
</body>
</html>