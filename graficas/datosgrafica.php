<?php
	
	include("conect.php");
$con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");; //conexxion
	$noanimal ='n19-95'; //mysqli_real_escape_string($con, $_GET['valor']);
	$litros = array('litros'); //definicion de vectores
	//mis vestores serian litros y fecha
	$fecha = array('fecha');
	//$febrero = array('FEBRERO');
	
	$consulta = "SELECT litros FROM ordeno WHERE numero='$noanimal' ORDER BY id"; //query
	  $result = mysqli_query($con,$consulta)or die("fail query"); //result
	
	 while($row = mysqli_fetch_array($result)){ //while del fetch array
		$litros[] = (double)$row['litros'];//llenar array 
	}
	
	$query = "SELECT id FROM ordeno WHERE numero='$noanimal' ORDER BY id;";
	 $result = mysqli_query($con,$query)or die("fail query");
	while($fila = mysqli_fetch_array($result)){
		
			$fecha[] =(double) $fila['id'];
		
			
		
	}

	echo json_encode( array($litros,$fecha) );
	
?>
