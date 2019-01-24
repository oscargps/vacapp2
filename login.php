<?php
include("conect.php");
$con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");
$user = mysqli_real_escape_string($con, $_GET['user']);
$pw = mysqli_real_escape_string($con, $_GET['pw']);


if(isset($user) && !empty($user) && isset($pw) && !empty($pw) )

{
$query="SELECT * FROM users WHERE usuario='$user'";
$sel= mysqli_query($con,$query);
$session=mysqli_fetch_array($sel);
if($pw== $session['contrasena'] && $session['estado'] == 1)
	{
		$query2="SELECT nombre FROM farm
	}
	else
	{
	
	echo"Error al ingresar el usuario y la contraseña";

	}
}
else
{
	
	echo"Por favor ingrese la información requerida";
	
}
?>