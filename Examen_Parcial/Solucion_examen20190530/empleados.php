<?php
require_once('include/DB.php');
require_once('include/Empleado.php');
session_start();
if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");

$ar_empleados = Db::obtieneEmpleados();


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <title>Examen</title>
  <link href="estilo.css" rel="stylesheet" type="text/css">
</head>


<body>
    <div id='login'>
    <h1>Lista de empleados</h1>
    <ul>
    <?php
    foreach ($ar_empleados as $empleado) {
    	echo "<li><a href='ficha_empleado.php?cod_empleado=".$empleado->getcodigo()."'>".$empleado->getcodigo()."</a> - ".$empleado->getnombre(). " ".$empleado->getapellido()."</li>";
    }
    ?>
	</ul>
    </div>
    <div id="pie">
    	<form action='logoff.php' method='post'>
        	<input type='submit' name='desconectar' value='Desconectar usuario {$usuario}'/>
    	</form>        
  	</div>
</body>
</html>