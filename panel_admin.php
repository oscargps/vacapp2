<?php
session_start();
?>
<center><img src="otros/logo-small.png" > </center>
<?php
if(isset($_SESSION['username'])){
	//echo "Access granted";
	echo "<br> <a href=cerrar.php> Cerrar Sesion</a>&ensp;";
	//echo "<br> <a href=consulta.php> Volver a consultas</a>";
			   echo " <a href=listar_usuario.php> Listar Usuarios</a>";

}
else
{
	echo "Access Denied";
	echo"<script>location.href='index.php';</script>";
	//#3f51b5ff
	//BGCOLOR="#3f51b5ff
}
?>
<!DOCTYPE>
<html lang="es">
<head>
	
<title>Panel de Administrador</title>
</head>
<body style="background-color:#F0F0E8">
<font color="#5E5448">
<div id= "container2"  >
      <!--<div style="background-color:#3f51b5ff ;">-->
<center>
<form action= "admin_ejecutar.php" method="post" name="frm">

<font ><h2><b>¿Qué acción desea realizar?</b></h2></font>
<input type="radio" name="gender" value="adduser" checked> Agregar Usuario&ensp;&ensp;
  <input type="radio" name="gender" value="erase_user">Desactivar Usuario&ensp;&ensp;
    <input type="radio" name="gender" value="active_user">Reactivar Usuario&ensp;&ensp;
  <input type="radio" name="gender" value="restart_pw"> Reiniciar Contraseña&ensp;&ensp;
  <input type="radio" name="gender" value="newres">Nueva res<br> 
 <br/> <br/>
 <table border="2" class="egt">
  <tr>
<td><center><font><h2><b><strong>Agregar Usuario</strong></b></h2></font>
</center>
<table   class="egt">
  <tr>
    <td><center>Nombre<br/>
<input type="text" name="newname"/></center></td>
    <td><center>Documento de identificación<br/>
<input type="text" name="newcc"/></center></td>
    <td><center>Correo Electrónico<br/>
<input type="text" name="newmail"/></center></td>
  </tr>
  <tr>
    <td><center>Número de Telefono<br/>
<input type="text" name="newtel"/></center></td>
    <td><center>Finca<br/>
<input type="text" name="newfarm"/></center></td>
    <td><center>Usuario<br/>
<input type="text" name="newuser"/></center></td>
  </tr>
  <tr><center><td></td><td>
  Informacion de la finca<br/>
  <textarea name="info_farm"></textarea>
  </td></center> </tr>
</table>
</td>
<td>
<center>
<font ><h2><b><strong>Desactivar Usuario del Sistema</strong></b></h2></font><br>
Nombre del usuario a eliminar<br>
<input type="text" name="nouser"/>
</center>
</td>
<td>
<center>
<font ><h2><b><strong>Reactivar Usuario del Sistema</strong></b></h2></font><br>
Nombre del usuario a Reactivar<br>
<input type="text" name="actuser"/>
</center>
</td>
</tr>
<tr>
<td>
<center>
<font><h2><b><strong>Reiniciar Contraseña</strong></b></h2></font><br>
Nombre del usuario en cuestión<br>
<input type="text" name="reuser"/>
</center></td>
<td><center><h2><b><strong>Agregar Res</strong></b></h2>
</center>
<table   class="egt">
  <tr>
    <td><center>Numero de Animal<br/>
<input type="text" name="newnum"/></center></td>
    <td><center>Sexo<br/>
<input type="text" name="newsex"/></center></td>
    <td><center>Raza<br/>
<input type="text" name="newraza"/></center></td>
  </tr>
  <tr>
    <td><center>Fecha de Nto<br/>
<input type="date" name="newnto"/></center></td>
    <td><center>Info. Padre<br/>
<input type="text" name="newpadre"/></center></td>
    <td><center>N° Madre<br/>
<input type="text" name="newmadre"/></center></td>
  </tr>
  <tr><center><td> Ubicación<br/>
  <input type="text" name="farm_ref"/></td><td>
 Peso de Nto (Kilos)<br/>
  <input type="text" name="newpeso"/>
  </td></center> </tr>
</table>

</td>
<td></td></tr>
</table>
    <br><br><br><input type="submit" value="Enviar" /><br/>
</form>
<br/>
<br/>
</center>

		


	</div>
        </div>
      </font>  
</body>
</html>