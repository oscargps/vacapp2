<?php
session_start();
?>
<center><img src="otros/logoapp1_small.jpg" > </center>
<?php
if(isset($_SESSION['username'])){

	 echo "<br> <a href=panel_user.php> Volver a Panel de Usuario</a>&ensp;&ensp;";  
	echo " <a href=cerrar.php> Cerrar Sesion</a>";
	echo "<br>";
}
else
{
	echo "Access Denied";
	echo"<script>location.href='index.php';</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reses</title>
</head>
  <body style="background-color:#A7C645 ">
     
   <div class= "rows">
<div class="container-fluid">
<div class="col-lg-12">
   <div class="panel panel-default" style="color: #3f51b5">
      <div class="panel-heading" style="background-color: #F0F0E8">
         <h3 class="panel-title" align="center"><font color=#5E5448><b><i class="fa fa-th-list "></i>Lista de Reses	</h3>
         </b></font>
      </div>
      <table id="" class="table table-condensed table-bordered" style="background-color:#CEF6F5" cellspacing="0" width="100%">
      <thead>
         <table border="1" cellspacing=1 cellpadding=0 style="font-size: 12pt" width="100%" style="border-collapse: separate" bordercolor="#5E5448"  style="background-color: #5E5448">
            <tr>
   </div>
</div>
</tr>
<?php
include("conect.php");
  $con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");

   $query = "SELECT numero,sexo,fecha_nto,raza,num_padre,num_madre,peso_nto FROM reses WHERE farm_id='$_SESSION[id_farm]'order by id_res DESC";
   //echo $query;
   $result = mysqli_query($con,$query);
   $numero = 0;

 //aqui va 
   //inicia tabla
    ?>
<tr>  
<th>Numero</th>
<th>Sexo</th>
<th>Fecha de Nto</th>
<th>Raza</th> 
<th>Padre</th>
<th>Madre</th>
<th>Peso Nto</th> 
</tr>
<?php

   while($row = mysqli_fetch_array($result))
   {
   
     echo "<tr><td width=\"15%\"><font face=\"verdana\"><center>" ."<a href=ficha.php?valor=$row[numero]>". 
       $row["numero"] . "</a></center></font></td>";
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
   
   
     $numero++;
   }
   echo "<tr><td colspan=\"15\"><font face=\"verdana\"><b>Total de Reses:  " . $numero . 
       "</b></font></td></tr>";
	      
	   
      mysqli_free_result($result) or die;
   mysqli_close($con);
   
   ?>
</table>
</body>
</html>