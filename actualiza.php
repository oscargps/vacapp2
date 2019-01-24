<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
include("conect.php");
session_start();
if(isset($_SESSION['username']))
{
	//echo "Access granted";
	//echo "<br> <a href=cerrar.php> Cerrar Sesion</a><br>";
	
}
else
{
	echo "Access Denied";
	echo"<script>location.href='index.php';</script>";
	//#3f51b5ff
	//BGCOLOR="#3f51b5ff
}
if(isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['newdate']) && !empty($_POST['newdate']) )
{
	$con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");
$nuevo=$_POST['dato'];

		 $query = "UPDATE `users` SET $nuevo = '$_POST[newdate]' WHERE `users`.`usuario` ='$_POST[user]' ";
		 //echo $query;
		   mysqli_query($con, $query)  or die ("Query Fail Updating Info");
		   //echo "<h2><b>Información Actualizada Exitosamente</h2></b>";
		   echo"<script>alert('Información Actualizada Exitosamente');</script>";
		   echo"<script>location.href='listar_usuario.php';</script>";
}
else
{
	//echo "<h2><b>Por favor ingrese la informacion requerida</h2></b>";
	echo"<script>alert('Por favor ingrese la informacion requerida');</script>";
	echo"<script>location.href='actualizar_info.php';</script>";
}

   
	?>
</body>
</html>