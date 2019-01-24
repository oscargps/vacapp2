<?php
session_start();
if(isset($_SESSION['username'])){
	echo "Access granted";
	echo "<br> <a href=cerrar.php> Cerrar Sesion</a>";
}
else
{
	echo "Access Denied";
}


?>