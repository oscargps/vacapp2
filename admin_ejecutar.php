<title>Acción Realizada</title>
<?php
include("conect.php");
session_start();
if(isset($_SESSION['username'])){
	//echo "Access granted";
	//echo "<br> <a href=cerrar.php> Cerrar Sesion</a>";
	//echo "<br> <a href=panel_admin.php> Realizar nueva acción</a>";
}
else
{
	echo "Access Denied";
	echo"<script>location.href='index.php';</script>";
}

$con=mysqli_connect($host, $user, $pw) or die ("error1");
mysqli_select_db($con,$db)or die ("error2");
 $estado="$_POST[gender]";
//echo $estado;
 if ($estado=="adduser")
   {
     $query1 = "INSERT INTO users(nombre,usuario,contrasena,cedula,correo,telefono) VALUES ('$_POST[newname]','$_POST[newuser]','$_POST[newcc]','$_POST[newcc]','$_POST[newmail]','$_POST[newtel]')";
  //echo $query1;
   mysqli_query($con, $query1)  or die ("Query Fail New User1");
   $query2= "SELECT id_user FROM users WHERE usuario = '$_POST[newuser]'";
   $sel= mysqli_query($con, $query2)  or die ("Query Fail New User2");
  $temp=mysqli_fetch_array($sel);
 $query3 = "INSERT INTO farms(nombre,info,user_id) VALUES ('$_POST[newfarm]','$_POST[info_farm]','$temp[id_user]')";
//echo $temp['id_user'];
 mysqli_query($con, $query3)  or die ("Query Fail New User3");
 
 echo"<script>alert('Usuario añadido con exito al Sistema');</script>";
		   echo"<script>location.href='panel_admin.php';</script>";
   }
   if ($estado=="erase_user")
   {
	   $change="UPDATE `users` SET `estado` = false WHERE `users`.`usuario` ='$_POST[nouser]'";
	   //echo $change;
	   mysqli_query($con, $change) or die ("Query Fail Desactivate User");
		
		echo"<script>alert('Usuario desactivado del Sistema');</script>";
		   echo"<script>location.href='panel_admin.php';</script>";
   }
   if ($estado=="active_user")
   {
	   $change="UPDATE `users` SET `estado` = true WHERE `users`.`usuario` ='$_POST[actuser]'";
	   //echo $change;
	   mysqli_query($con, $change) or die ("Query Fail Desactivate User");
		
		echo"<script>alert('Usuario Activado nuevamente en el Sistema');</script>";
		   echo"<script>location.href='panel_admin.php';</script>";
   }
    if ($estado=="restart_pw")
	{
		$us=$_POST['reuser'];
		$search="SELECT * FROM users WHERE usuario='$us'";
		$sel= mysqli_query($con,$search) or die ("Query Fail Search User");
		$res=mysqli_fetch_array($sel);
//echo $res['cedula'];
		 $query = "UPDATE `users` SET `contrasena` = '$res[cedula]' WHERE `users`.`usuario` ='$_POST[reuser]' ";
		   mysqli_query($con, $query)  or die ("Query Fail Updating Info");
		    echo"<script>alert('Información Actualizada Exitosamente');</script>";
		   echo"<script>location.href='panel_admin.php';</script>";
	}if ($estado=="newres")
   {
     $query1 = "INSERT INTO reses(numero,sexo,fecha_nto,raza,num_padre,num_madre,peso_nto,farm_id) VALUES ('$_POST[newnum]','$_POST[newsex]','$_POST[newnto]','$_POST[newraza]','$_POST[newpadre]','$_POST[newmadre]','$_POST[newpeso]','$_POST[farm_ref]')";
  //echo $query1;
   mysqli_query($con, $query1)  or die ("Query Fail New User1");
   //$query2= "SELECT id_user FROM users WHERE usuario = '$_POST[newuser]'";
//   $sel= mysqli_query($con, $query2)  or die ("Query Fail New User2");
//  $temp=mysqli_fetch_array($sel);
// $query3 = "INSERT INTO farms(nombre,info,user_id) VALUES ('$_POST[newfarm]','$_POST[info_farm]','$temp[id_user]')";
////echo $temp['id_user'];
// mysqli_query($con, $query3)  or die ("Query Fail New User3");
 echo"<script>alert('Información Actualizada Exitosamente');</script>";
		   echo"<script>location.href='panel_admin.php';</script>";
   }
	mysqli_close($con);
?>