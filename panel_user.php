<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Panel de Usuario</title>
</head>
<center><img src="otros/logoapp1_small.jpg" > 
 <body style="background-color:#A7C645 ;">
<br>
<?php
session_start();
?>
<?php
include("conect.php");
$con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");



if(isset($_SESSION['username']))
{
	//echo "Access granted";
	echo "<font color='#804000'></center><td width=\"25%\"><font face=\"Rockwell\"> Bienvenido Sr: " . 
      $_SESSION['name']. "</font></td>";
	echo "<br>";
		echo "<td width=\"25%\"><font face=\"Rockwell\"> ID de Usuario: " . 
      $_SESSION['id_usuario']. "</font></td>";
	echo "<br>";
	echo"<td width=\"15%\"><font face=\"Rockwell\"> Propietario de: " . 
      $_SESSION['farm']. "</font></td>";
	  echo "<br>";
	  //	echo"<td width=\"15%\"><font face=\"Rockwell\"> id finca: " . 
     // $_SESSION['id_farm']. "</font></td></font>";
	echo "  <center>";
	  
		  echo "<h3><br> <a href=change_pw.php> Cambiar contraseña</a>&ensp;&ensp;";
	echo " <a href=ficha.php?valor='1'> Ficha de Res</a>&ensp;&ensp;";
	  echo "<a href=consulta_ordeno.php> Consulta Ordeño</a>&ensp;&ensp;";
	  echo "<a href=consulta_pesaje.php> Consulta Peso</a>&ensp;&ensp;";
	  echo "<a href=reses.php> Lista Ganado</a>&ensp;&ensp;";
	  //echo "<br>";
	echo " <a href=cerrar.php> Cerrar Sesion</a></h3>";
	echo "<br>";
}
else
{
	echo "Access Denied";
	echo"<script>location.href='index.php';</script>";
}


?> 


   



      <div id= "container2"  >
      <div style="background-color:#3f51b5ff;">
      </div>
      </div>
      <style>
	  .slider {
	width: 95%;
	margin: auto;
	overflow: hidden;
}

.slider ul {
	display: flex;
	padding: 0;
	width: 400%;
	
	animation: cambio 20s infinite alternate linear;
}

.slider li {
	width: 100%;
	list-style: none;
}

.slider img {
	width: 50%;
}

@keyframes cambio {
	0% {margin-left: 0;}
	20% {margin-left: 0;}
	
	25% {margin-left: -100%;}
	45% {margin-left: -100%;}
	
	50% {margin-left: -200%;}
	70% {margin-left: -200%;}
	
	75% {margin-left: -300%;}
	100% {margin-left: -300%;}
}
	  </style>
     
      <div class="slider">
			<ul>
				<li>
  <img src="otros/slider/Cordoba-Colombia.jpg" alt="">
 </li>
				<li>
  <img src="otros/slider/ganaderia-minagro.jpg" alt="">
</li>
				<li>
  <img src="otros/slider/maxresdefault.jpg" alt="">
</li>
				<li>
  <img src="otros/slider/vacas1.jpg" alt="">
</li>
			</ul>
		</div>
 <!--<iframe width="1120" height="630" src="https://www.youtube.com/embed/bcYrTVjWi2k" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>-->

</body> </center>
</html>