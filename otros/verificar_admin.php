<center>


<body style="background-color:#D6EAF8 ;">
<?php
session_start();

if(isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['pw']) && !empty($_POST['pw']) )

{
	$con=mysqli_connect('localhost', 'root', '') or die ("error1");
mysqli_select_db($con,'ordenapp')or die ("error2");
$us=$_POST['user'];
$query="SELECT * FROM users WHERE usuario='$us'";
//echo $query;
$sel= mysqli_query($con,$query);


$session=mysqli_fetch_array($sel);

if($_POST['pw']== $session['contrasena'])
	{
	$_SESSION['username'] = $_POST['user'];
	$_SESSION['name'] = $session['nombre'];
	$_SESSION['farm'] = $session['finca'];
	echo "Sesion Exitosa";
	//header('Location: consulta.php');
	}
else
	{
	echo "Error al ingresar el usuario y la contraseña";
	echo "<br> <a href=index.php> Reintentar</a>";
	}
}
else
{
	echo "Por favor ingrese la informacion requerida";
	echo "<br> <a href=index.php> Reintentar</a>";
}




?>
</body>
</center>