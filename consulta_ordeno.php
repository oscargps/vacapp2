<?php
session_start();
?>
<title>Consulta de ordeño</title>
<center><img src="otros/logoapp1_small.jpg" > </center>
<br>
<?php
include("conect.php");
$con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");



if(isset($_SESSION['username'])){
	//echo "Access granted";
	echo "<td width=\"25%\"><font face=\"Rockwell\"> Bienvenido Sr: " . 
      $_SESSION['name']. "</font></td>";
	echo "<br>";
		echo "<td width=\"25%\"><font face=\"Rockwell\"> ID de Usuario: " . 
      $_SESSION['id_usuario']. "</font></td>";
	echo "<br>";
	echo"<td width=\"15%\"><font face=\"Rockwell\"> Propietario de: " . 
      $_SESSION['farm']. "</font></td>";
	  echo "<br>";
		  
	
	 echo "<br> <a href=panel_user.php> Volver a Panel de Usuario</a>&ensp;"; 
	echo " <a href=cerrar.php> Cerrar Sesion</a>";
	echo "<br><br>";
}
else
{
	echo "Access Denied";
	echo"<script>location.href='index.php';</script>";
}


?>


   <body style="background-color:#A7C645 ;">

   



      <div id= "container2"  >
      <div style="background-color:#F0F0E8;">
      <center>
      <br>
            <form action= "result_ordeno.php" method="post" name="frm" >
<style type="text/css">
  .boton{
        font-size:16px;
        font-family:Verdana,Helvetica;
        font-weight:bold;
        color:white;
        background:#5E5448;
        border-radius: 5px;
        width:100px;
        height:40px;
       }
	.espace{
		        font-size:14px;
        font-family:Verdana,Helvetica;
        font-weight:bold;
        color:#5E5448;
        background:#ffffff;
        border-radius: 5px;
        width:150px;
        height:30px;
	}
	
</style>
         <font color=#5E5448><h2><b> Ingrese el rango de fechas en el que desea ver los datos</b></h2></font>
         <table><tr><td>
             <font color=#5E5448><b><h3>Fecha inicial</h3></b></font>
        
         <input type="date" name="fecha1" class="espace"/>
         
 </td><td>        <font color=#5E5448><b><h3>Fecha final</h3></b></font>
         <input type="date" name="fecha2" class="espace"/>
      </td><td> <table><tr><td>  <input type="radio" name="gender" value="all" checked> <font color=#5E5448><b>Dia Completo</b></font><br></td></tr>
        <tr><td> <input type="radio" name="gender" value="am"> <font color=#5E5448><b>Solo en la Mañana</b></font><br></td></tr>
 <tr><td> <input type="radio" name="gender" value="pm"><font color=#5E5448<b>Solo en la Tarde</b></font><br><br></td></tr></table></td></tr></table> <font color=#5E5448><h3><b> Si desea, ingrese el numero del animal</b></h3></font>
         <font color=#5E5448><b><h3>N° Animal</h3></b></font>
         <input type="text" name="noanimal" class="espace"/><br><br>

       <br>  <br><input type="submit" value="Consultar" class="boton" ><br>
         </form>

      <br>
      <br>
      </center>
      </div>
        </div>
        <br>
   </body>
</html>