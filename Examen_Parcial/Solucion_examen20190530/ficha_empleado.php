<?php
require_once('include/DB.php');

session_start();
if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");

$cod_empleado = $_GET['cod_empleado'];

$empleado = DB::obtieneEmpleado($cod_empleado);

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
    <h1>Ficha de empleado</h1>
    
    <?php
    if (isset($empleado)) {
        echo "<h2>Datos del ".get_class($empleado)." ".$empleado->getnombre(). " ".$empleado->getapellido()."</h2><ul>";
        echo "<li><strong>Fecha nacimiento:</strong> ".$empleado->getFecha_nac()."</li>";
        echo "<li><strong>Genero:</strong> ".$empleado->getGenero()."</li>";
        echo "<li><strong>Fecha contrato:</strong> ".$empleado->getFecha_contrato()."</li>";
        echo "<li><strong>Sueldo:</strong> ".$empleado->getSalario()."</li></ul>";
    }?>
    </div>
</body>
</html>