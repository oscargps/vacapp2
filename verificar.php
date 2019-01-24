<center>


<body style="background-color:#D6EAF8 ;">
<?php
include("conect.php");
session_start();

if(isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['pw']) && !empty($_POST['pw']) )

{
	$con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");
$us=$_POST['user'];
$query="SELECT * FROM users WHERE usuario='$us'";
//echo $query;
$sel= mysqli_query($con,$query);


$session=mysqli_fetch_array($sel);

if($_POST['pw']== $session['contrasena'] && $session['estado'] == 1)
	{
	$_SESSION['username'] = $_POST['user'];
	$_SESSION['name'] = $session['nombre'];
	$_SESSION['id_usuario'] = $session['id_user'];
	$query2="SELECT * FROM farms WHERE user_id='$_SESSION[id_usuario]'";
//echo $query;
$res= mysqli_query($con,$query2);


$result=mysqli_fetch_array($res);
$_SESSION['farm'] = $result['nombre'];
	$_SESSION['id_farm'] =$result['id_farm'];
	//echo "Sesion Exitosa";
	if($_SESSION['username']=="admin")
	  {
		 	echo"<script>location.href='panel_admin.php';</script>";
	  }else
	  {
		  	echo"<script>location.href='panel_user.php';</script>";
	  }
	
	}
else
	{
	//echo "<h2><b>Error al ingresar el usuario y la contraseña</h2></b>";
	echo"<script>alert('Error al ingresar el usuario y la contraseña');</script>";
	echo"<script>location.href='index.php';</script>";
	}
}
else
{
	//echo "<h2><b>Por favor ingrese la información requerida</h2></b>";
	echo"<script>alert('Por favor ingrese la información requerida');</script>";
	echo"<script>location.href='index.php';</script>";
}




?>
</body>
</center>