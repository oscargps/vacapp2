
<?php
include("conect.php");

$con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");; //conexxion
 
//preparamos la consulta
$consulta = "SELECT * FROM pesaje";
 
//ejecutamos la consulta
$result = mysqli_query($con,$consulta)or die("fail query");

$numFilas = mysqli_num_rows($result);
 
$datos[0] = array('fecha','peso');

$i=1;
 
	while(($row = mysqli_fetch_array($result)) && ($i<($numFilas+1))){ 

	$peso=intval($row['peso']);
    $datos[$i] = array($row['fecha'],$peso);
	$i++;
	
}

echo json_encode($datos);
mysqli_close($con);
?>
 <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo json_encode($datos);?>) ;

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>
