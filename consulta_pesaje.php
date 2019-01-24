<?php
session_start();
?>
<title>Consulta de pesaje</title>
<center><img src="otros/logoapp1_small.jpg" > </center>
<br>
<?php
include("conect.php");
$con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");



if(isset($_SESSION['username'])){
	//echo "Access granted";
/*	echo "<td width=\"25%\"><font face=\"Rockwell\"> Bienvenido Sr: " . 
      $_SESSION['name']. "</font></td>";
	echo "<br>";
		echo "<td width=\"25%\"><font face=\"Rockwell\"> ID de Usuario: " . 
      $_SESSION['id_usuario']. "</font></td>";
	echo "<br>";
	echo"<td width=\"15%\"><font face=\"Rockwell\"> Propietario de: " . 
      $_SESSION['farm']. "</font></td>";
	  echo "<br>";*/
		  
	echo "<br> <a href=panel_user.php> Volver a Panel de Usuario</a>&ensp;";
	 	echo "<a href='javascript:window.print(); void 0;'>Imprimir Resultados</a>&ensp;&ensp; ";
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
$datos[0] = array('fecha','peso');
if(isset($_POST['SubmitButton'])){ //check if form was submitted
 $query = "SELECT numero,peso,fecha FROM pesaje  WHERE farm_id=$_SESSION[id_farm] AND numero='$_POST[noanimal]' order by id";
 //echo $query;
  $result = mysqli_query($con,$query)or die("fail query");
  $res = mysqli_query($con,$query)or die("fail query");
  $numero=0;
  $numFilas = mysqli_num_rows($res);
 
$i=1;

while(($row2 = mysqli_fetch_array($res)) && ($i<($numFilas+1)))
{ 

	$pes=intval($row2['peso']);
    $datos[$i] = array($row2['fecha'],$pes);
	$i++;
}

}
else
{
	$_POST['noanimal']="20";
	$query = "SELECT numero,peso,fecha FROM pesaje  WHERE farm_id=$_SESSION[id_farm] AND numero='$_POST[noanimal]' order by id DESC";
	$numero=1;
// echo $query;
  $result = mysqli_query($con,$query)or die("fail query");
  for($i=1;$i<10;$i++)
  {
	  $datos[$i] = array(0,0);
  }
}
$total=0;
//echo json_encode($datos);
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
   <body style="background-color:#A7C645 ;">

   


      <div id= "container2"  >
      <div style="background-color:#F0F0E8;">
      <center>
      
            <form action= "" method="post" name="frm" >
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
         <font color=#5E5448><h2><b> INGRESE EL NUMERO DEL ANIMAL DEL CUAL DESEA CONOCER LOS DATOS</b></h2></font>
            
         <font color=#5E5448><b><h3>N° Animal</h3></b></font>
         <input type="text" name="noanimal" class="espace" />
          
      <input type="submit" name="SubmitButton" value="Consultar" class="boton"/>
         </form>

      <br>
      
      </center>
      </div>
        </div>
        <br>
        <div class="panel-heading" style="background-color:#F0F0E8">
         <h3 class="panel-title" align="center"><font color=#5E5448><b><i class="fa fa-th-list "></i>TABLA HISTORICA</h3>
         </b></font>
      </div>
      <center> 
      <div id="curve_chart" style="width:"100%"; height: 250px"></div></center> <br>
         <table id="" class="table table-condensed table-bordered" style="background-color:#5E5448" cellspacing="0" width="100%">
      <thead>
         <table border="1" cellspacing=1 cellpadding=0 style="font-size: 12pt" width="100%" style="border-collapse: separate" bordercolor="#5E5448"  style="background-color: #5E5448">           <tr>
   </div>
</div>
</tr>
          <tr>  
<th>N° Animal</th>

<th>Peso (kg)</th> 
<th>Fecha</th> 
 
</tr>
<?php

   while($row = mysqli_fetch_array($result))
   {
   
     echo "<tr><center><td width=\"15%\"><font face=\"verdana\"><center>" ."<a href=ficha.php?valor=$row[numero]>". 
       $row["numero"] . "</a></center></font></center></td>";
     echo "<td width=\"15%\"><font face=\"verdana\"><center>" . 
       $row["peso"]. "</center></font></td>";
           echo "<td width=\"15%\"><font face=\"verdana\"><center>" . 
       $row["fecha"]. "</center></font></td>";
     
       
   $total=$total+$row["peso"];
     $numero++;

   }
   $promedio=$total/$numero;
   echo "<tr><td colspan=\"15\"><font face=\"verdana\"><b>Total de datos:  " . $numero . 
       "</b></font></td></tr>";
	      echo "<tr><td colspan=\"15\"><font face=\"verdana\"><b>El animal ha ganado en promedio:  " . $promedio ." kilos entre cada pesaje". "</b></font></td></tr>";
	   
      mysqli_free_result($result) or die;
   mysqli_close($con);
   
   ?>
</table>

    

   </body>
</html>