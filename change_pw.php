<?php
session_start();
?>
<center><img src="otros/logo-small.png" > </center>
<?php
if(isset($_SESSION['username'])){
	//echo "Access granted";
	echo "<br> <a href=panel_user.php>Volver</a>&ensp;&ensp;";
	echo " <a href=cerrar.php> Cerrar Sesion</a>";
	echo "<br>";
}
else
{
	echo "Access Denied";
	echo"<script>location.href='index.php';</script>";
	//#3f51b5ff
	//BGCOLOR="#3f51b5ff
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cambiar contraseña</title>
</head>

<body style="background-color:#D6EAF8">
<div id= "container2"  >
<div style="background-color:#3f51b5ff ;">
<center>
<form action= "newpw.php" method="post" name="frm">
<style type="text/css">
  .boton{
        font-size:16px;
        font-family:Verdana,Helvetica;
        font-weight:bold;
        color:#3f51b5;
        background:#D6EAF8;
        border-radius: 5px;
        width:100px;
        height:40px;
       }
	.espace{
		        font-size:14px;
        font-family:Verdana,Helvetica;
        font-weight:bold;
        color:#3f51b5;
        background:#ffffff;
        border-radius: 5px;
        width:150px;
        height:30px;
	}
	
</style>
<font color=white><h2><b>CAMBIO DE CONTRASEÑA</b></h2></font>.<br><br><br>
<table class="egt">
<tr>
<td>
<font color=white><h3><b>Contraseña Actual</b></h3></font>
</td>
<td>
<input type="password" name="pw0" class="espace"/>
</td>
</tr>
<tr>
<td>
<font color=white><h3><b>Contraseña nueva</b></h3></font></td><td>
<input type="password" name="pw1" class="espace"/></td></tr>
<tr>
<td>
<font color=white><h3><b>Repetir contraseña nueva&ensp;</b></h3></font></td><td>
<input type="password" name="pw2" class="espace"/></td></tr>
</table><br/><br/>
    <input type="submit" value="Enviar" class="boton" /><br/>
</form>
<br/>
<br/>
</center>
</div>
</div>
</body>
</html>