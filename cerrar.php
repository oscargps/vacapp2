<title>Sesión Cerrada</title>
<center><img src="otros/logoapp1_med.jpg" > </center>
<center>


<body style="background-color:#A7C645 ;">
<?php
session_start();

session_destroy();
echo "<h2><b>Sesion cerrada</b></h2>";
echo "<br> <a href=index.php> Volver a Inicio</a>";

?>
</body>
</center>