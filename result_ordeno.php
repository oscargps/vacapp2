<?php
session_start();
?>
<title>Resultados de la consulta</title>
<center><img src="otros/logoapp1_small.jpg" > </center>
<?php

if(isset($_SESSION['username'])){
	//echo "Access granted";
	
	echo "<br> <a href=consulta_ordeno.php> Realizar nueva consulta</a>&ensp;&ensp;";
	echo "<a href='javascript:window.print(); void 0;'>Imprimir Resultados</a>&ensp;&ensp; ";echo " <a href=cerrar.php> Cerrar Sesion</a>";
}
else
{
	echo "Access Denied";
		die();
	echo"<script>location.href='index.php';</script>";
}


?>
<!DOCTYPE html>

<html lang="es">

   <body style="background-color:#A7C645">
     
   <div class= "rows">
<div class="container-fluid">
<div class="col-lg-12">
   <div class="panel panel-default" style="color: #3f51b5">
      <div class="panel-heading" style="background-color: #F0F0E8">
         <h3 class="panel-title" align="center"><font color=#5E5448><b><i class="fa fa-th-list "></i>TABLA HISTORICA</h3>
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
$jornada=$_POST['gender'];
//echo $jornada;
$datos[0] = array('fecha','litros');
if ($_POST['noanimal']=="")
{
    if ($jornada=="all")
    {
   $query = "SELECT numero,litros,fecha,hora FROM ordeno  WHERE farm_id=$_SESSION[id_farm] AND hora BETWEEN '01:00:00' AND '23:00:00' AND fecha BETWEEN '$_POST[fecha1]' AND '$_POST[fecha2]' order by fecha DESC";
   //echo $query;
    }
        if ($jornada=="am")
    {
   $query = "SELECT numero,litros,fecha,hora FROM ordeno  WHERE farm_id=$_SESSION[id_farm] AND hora BETWEEN '01:00:00' AND '12:00:00' AND fecha BETWEEN '$_POST[fecha1]' AND '$_POST[fecha2]' order by fecha DESC";
   
  // echo $query;
    }
            if ($jornada=="pm")
    {
   $query = "SELECT numero,litros,fecha,hora FROM ordeno  WHERE farm_id=$_SESSION[id_farm] AND hora BETWEEN '12:01:00' AND '23:00:00' AND fecha BETWEEN '$_POST[fecha1]' AND '$_POST[fecha2]' order by fecha DESC";
  //echo $query;
    }
   $result = mysqli_query($con,$query);
   $numero = 0;
}
else
{
	   $query = "SELECT numero,litros,fecha,hora FROM ordeno  WHERE farm_id=$_SESSION[id_farm] AND numero='$_POST[noanimal]' AND fecha BETWEEN '$_POST[fecha1]' AND '$_POST[fecha2]' order by fecha DESC";
   
   $result = mysqli_query($con,$query)or die("fail query 4");

}
   $res = mysqli_query($con,$query)or die("fail query");
  $numero=0;
  $numFilas = mysqli_num_rows($res);
 
$i=1;
while(($row2 = mysqli_fetch_array($res)) && ($i<($numFilas+1)))
{ 

	$pes=intval($row2['litros']);
    $datos[$i] = array($row2['fecha'],$pes);
	$i++;
}
//echo json_encode($datos);
//echo $query;
 //aqui va 
   //inicia tabla
    ?>
 <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo json_encode($datos);?>) ;

        var options = {
          title: 'Progreso de peso en el tiempo',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
 <div id="curve_chart" style="width:"100%"; height: 250px"></div></center> <br>
<tr>  
<th>N° Animal</th>

<th>Leche (Litros)</th> 
<th>Fecha</th> 
<th>Hora</th> 
</tr>
<?php
$total=0;

  while($row = mysqli_fetch_array($result))
   {
   
     echo "<tr><center><td width=\"15%\"><font face=\"verdana\"><center>" ."<a href=ficha.php?valor=$row[numero]>". 
       $row["numero"] . "</a></center></font></center></td>";
     echo "<td width=\"15%\"><font face=\"verdana\"><center>" . 
       $row["litros"]. "</center></font></td>";
           echo "<td width=\"15%\"><font face=\"verdana\"><center>" . 
       $row["fecha"]. "</center></font></td>";
     echo "<td width=\"15%\"><font face=\"verdana\"><center>" . 
       $row["hora"] . "</center></font></td></tr>";
   
    $total=$total+$row["litros"];
     $numero++;

   }
   echo "<tr><td colspan=\"15\"><font face=\"verdana\"><b>Total de datos:  " . $numero . 
       "</b></font></td></tr>";
	      echo "<tr><td colspan=\"15\"><font face=\"verdana\"><b>Se han ordeñado en total:  " . $total ." litros, en el tiempo seleccionado". "</b></font></td></tr>";
	   
      mysqli_free_result($result) or die;
   mysqli_close($con);
   
   ?>
</table>

</body>
</html>
