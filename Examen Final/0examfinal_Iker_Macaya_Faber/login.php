<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Acceso a datos de empleados</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
<?php
require_once('include/DB.php');

// Comprobamos si ya se ha enviado el formulario
if (isset($_POST['enviar'])) {

   if (empty($_POST['id']) || empty($_POST['nombre']) || empty($_POST['apellido'])) 
        $error = 'Debes introducir un id, nombre de empelado y su apellido';
    else {
        // Comprobamos las credenciales con la base de datos
        $verificacion = DB::verificaEmpleado($_POST['id'], $_POST['nombre'], $_POST['apellido']);
        if (is_bool($verificacion) && ($verificacion == true)) {
            session_start();
            DB::registraLog($_POST['nombre'], date('Y-m-d H:i:s'));
            $_SESSION['nombre']=$_POST['nombre'];
			$_SESSION['id']=$_POST['id'];
            header("Location: form.php");                    
        }
        else {
            // Si las credenciales no son válidas, se vuelven a pedir
            $error = $verificacion;
        }
    }
}
?>
</head>

<body>
    <div id='login'>
    <form id ="formdatos" action='login.php' method='post'>
    <fieldset >
        <legend>Acceso de empleados</legend>
         <div class='campo'>
            <label for='id' >Id de empleado:</label><br/>
            <input type='text' name='id' id='id' maxlength="50" /><br/>
        </div>
        <div class='campo'>
            <label for='nombre' >Nombre:</label><br/>
            <input type='text' name='nombre' id='nombre' maxlength="50" /><br/>
        </div>
        <div class='campo'>
            <label for='apellido' >Apellido:</label><br/>
            <input type='text' name='apellido' id='apellido' maxlength="50" /><br/>
        </div>
        <div class='campo'>
            <input type='submit' name='enviar' value='Enviar' />
        </div>
        <div><span class='error'><?php
        if (isset($error)){
            echo $error;
        }
        ?></span></div>
    </fieldset>
    </form>
    </div>
</body>
</html>