<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edición de datos la empresa</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
<?php
require_once('include/DB.php');
require_once('include/Empleado.php');
require_once('include/EmpleadoSenior.php');
session_start();
if (!isset($_SESSION['nombre'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");

$empleado = DB::obtieneEmpleado($_SESSION['id']);

if (isset($_POST['enviar'])) {
	$data = Empleado::prepareToSave($_POST['nombre'],$_POST['apellido'],$_POST['fecha_nac']);
	$nombre = $data['nombre'];
	$apellido = $data['apellido'];
	$fecha_nac = $data['fecha_nac'];
	$verificaion = false;
	$verificaion = DB::save($nombre, $apellido, $fecha_nac, $_SESSION['id']);
	if ($verificaion == false){
		$_SESSION['msg'] = "Se ha producido un error";
	} else {
		$_SESSION['msg'] = "Datos guardados correctamente";
	}
	header("Location: form.php"); 
}
?>
</head>

<body>
    <div id='login'>
    <form id ="formdatos" action='' method='post'>
    <fieldset >
        <legend>Edición de datos</legend>
		<div><span class='clase'><?php
            echo get_class($empleado);
			echo "<br/>";
			if (get_class($empleado)=='EmpleadoSenior'){
				echo $empleado->getTipo($empleado->getfecha_contrato());
				}
        ?></span></div>	
        <div class='campo'>
            <label for='nombre'>Nombre:</label><br/>
            <input type='text' name='nombre' id='nombre' maxlength="50" value=<?php echo $empleado->getnombre() ?>><br/>
        </div>
        <div class='campo'>
            <label for='apellido'>Apellido:</label><br/>
            <input type='text' name='apellido' id='apellido' maxlength="50" value=<?php echo $empleado->getapellido() ?>><br/>
        </div>
        <div class='campo'>
            <label for="masc">Masculino</label>
            <input type="radio" name="gender" id="masc" value="M" <?php if ($empleado->getgenero() == 'M') echo "checked='checked'"?>>
            <label for="fem">Femenino</label>
            <input type="radio" name="fem" id="fem" value="F" <?php if ($empleado->getgenero() == 'F') echo "checked='checked'"?>>
        </div>
        <div class='campo'>
            <label for='fecha_nac'>Fecha nacimiento:</label><br/>
            <input type='text' name='fecha_nac' id='fecha_nac' maxlength="50" value=<?php echo $empleado->getfecha_nac() ?>><br/>
        </div>
        <div class='campo'>            
            <input type='submit' name='enviar' value='Enviar' />
        </div>
        <div><span class='error'><?php
        if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
        }
        ?></span></div>
    </fieldset>
    </form>
    </div>
    <div id="pie">
    	<form action='logoff.php' method='post'>
        	<input type='submit' name='desconectar' value='Salir de la sesion'/>
    	</form>        
  	</div>
</body>
</html>