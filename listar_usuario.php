<?php
session_start();
?>

<center><img src="otros/logo-small.png" > </center>
<?php
if(isset($_SESSION['username'])){
	//echo "Access granted";
	echo "<br> <a href=panel_admin.php> Volver a Panel de Administrador</a>&ensp;&ensp;";
	echo " <a href=actualizar_info.php> Actualizar informacion de Usuarios</a>&ensp;&ensp;";
	echo "<a href='javascript:window.print(); void 0;'>Imprimir Resultados</a> ";
	echo "<br> <a href=cerrar.php> Cerrar Sesion</a>";
	
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
<title>Usuarios del Sistema</title>

</head>
   <body style="background-color:#F0F0E8 ">
     
   <div class= "rows">
<div class="container-fluid">
<div class="col-lg-12">
   <div class="panel panel-default" style="color:#01708B">
      <div class="panel-heading" style="background-color: #01708B">
         <h3 class="panel-title" align="center"><font color="#E0D2B5"e><b><i class="fa fa-th-list "></i>Lista de Usuarios Registrados en el Sistema	</h3>
         </b></font>
      </div>
      <table id="" class="table table-condensed table-bordered" style="background-color:#CEF6F5" cellspacing="0" width="100%">
      <thead>
         <table border="1" cellspacing=1 cellpadding=0 style="font-size: 12pt" width="100%" style="border-collapse: separate" bordercolor="#0000FF"  style="background-color: #0000FF">
            <tr>
   </div>
</div>
</tr>
<?php
include("conect.php");
  $con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");

   $query = "SELECT nombre,usuario,cedula,correo,telefono,estado FROM users order by id_user DESC";
   
   $result = mysqli_query($con,$query);
   $numero = 0;

 //aqui va 
   //inicia tabla
    ?>
<tr>  
<th>Nombre de Usuario</th>
<th>Usuario de Ingreso</th>
<th>Cedula</th> 
<th>Correo Electronico</th>
<th>Telefono</th> 
<th>Estado</th>
</tr>
<?php

   while($row = mysqli_fetch_array($result))
   {
   
     echo "<tr><center><td width=\"15%\"><font face=\"verdana\">" . 
       $row["nombre"] . "</font></center></td>";
     echo "<td width=\"15%\"><font face=\"verdana\">" . 
       $row["usuario"] . "</font></td>";
     echo "<td width=\"15%\"><font face=\"verdana\">" . 
       $row["cedula"] . "</font></td>";
    echo "<td width=\"15%\"><font face=\"verdana\">" .
		$row["correo"]."</font></td>";
	   echo "<td width=\"15%\"><font face=\"verdana\">" . 
       $row["telefono"]. "</font></td>";
     echo "<td width=\"15%\"><font face=\"verdana\">" . 
       $row["estado"] . "</font></td></tr>";
   
   
     $numero++;
   }
   echo "<tr><td colspan=\"15\"><font face=\"verdana\"><b>Total de Usuarios:  " . $numero . 
       "</b></font></td></tr>";
	      
	   
      mysqli_free_result($result) or die;
   mysqli_close($con);
   
   ?>
</table>
</body>
</html>