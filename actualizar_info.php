<?php
session_start();
?>
<center><img src="otros/logo-small.png" > </center>
<?php
if(isset($_SESSION['username'])){
	//echo "Access granted";

	echo "<br> <a href=listar_usuario.php> Volver</a>";
	echo "<br> <a href=cerrar.php> Cerrar Sesion</a>";
	
}
else
{
	echo "Access Denied";
	echo"<script>location.href='index.php';</script>";
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Actualizar Información de Usuarios</title>
</head>

<body style="background-color:#D6EAF8">
<div id= "container2"  >
     <div style="background-color:#3f51b5ff ;">
<center>
<form action= "actualiza.php" method="post" name="frm" >
<font color=white><h3><b> Módulo de actualizacion de datos de usuarios del sistema</b></h2></font>
 <font color=white><h><b> Seleccion la informacion que desea actualizar</b></h3></font><br />
 <select name="dato">
         <option value="0">Seleccione.....</option> 
   <option value="nombre">Nombre</option> 
   <option value="cedula">Doc de Identidad</option> 
      <option value="correo">Correo Electrónico</option> 
   <option value="telefono">Teléfono</option> 
   </select>
  <br /><br /><font color=white> Usuario de Ingreso<br></font>
<input type="text" name="user"/>
  <br /><br /><font color=white> Nuevo dato<br></font>
<input type="text" name="newdate"/>

<br /><br /><input type="submit" name="enviar" />
</form>
         
</center></div></div>
</body>
</html>