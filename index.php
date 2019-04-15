
<!DOCTYPE>
<html lang="es">
<head>
	<title>Sistema de Ordeño</title>
  
</head>
<body style="background-color:#A7C645">
 <?php
 include("conect.php");
session_start();

session_destroy();

?>
 


<center>
    <img src="otros/logoapp1_med.jpg" > 
    <div id= "container2"  >
      <div style="background-color:#F0F0E8;">
      <center>
<form action= "verificar.php" method="post" name="frm">
<style type="text/css">
  .boton{
        font-size:16px;
        font-family:Verdana,Helvetica;
        font-weight:bold;
        color:White;
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
<div align="center">
<strong><h1><font color="#5E5448"> POR FAVOR INGRESE SU USUARIO Y CONTRASEÑA</font></h1></strong>.<br><br><br>
<table>
<tr>
<td>
<h2><font color="#5E5448">Usuario</font></h2>
</td><td>
<input type="text" name="user" class="espace"/></td></tr>
<tr><td><h2><font color="#5E5448">Contraseña&ensp;</font></h2></td><td>
<input type="password" name="pw" class="espace"/></td></tr></table><br><br><br>
    <input type="submit" value="Ingresar" class="boton"/><br/>
    </div>
</form>
</div>

<br/>
<br/>
</center>

		


	
        
</body>
</html>