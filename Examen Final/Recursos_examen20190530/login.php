<?php
require_once('include/DB.php');


// Comprobamos si ya se ha enviado el formulario
if (isset($_POST['enviar'])) {

    if (empty($_POST['usuario']) || empty($_POST['password'])) 
        $error = 'Debes introducir un nombre de usuario y una contraseña';
    else {
        // Comprobamos las credenciales con la base de datos
        $verificacion = DB::verificaCliente($_POST['usuario'], $_POST['password']);
        if (is_bool($verificacion) && ($verificacion == true)) {
            session_start();
            if (isset($_POST['check'])) {
                DB::registraLog($_POST['usuario'], date('Y-m-d H:i:s'));
            }
            $_SESSION['usuario']=$_POST['usuario'];
            header("Location: empleados.php");                    
        }
        else {
            // Si las credenciales no son válidas, se vuelven a pedir
            $error = $verificacion;
        }
    }
}
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
    <form action='login.php' method='post'>
    <fieldset >
        <legend>Login</legend>
        <div><span class='error'><?php
        if (isset($error)){
            echo $error;
        }
        ?></span></div>
        <div class='campo'>
            <label for='usuario' >Usuario:</label><br/>
            <input type='text' name='usuario' id='usuario' maxlength="50" /><br/>
        </div>
        <div class='campo'>
            <label for='password' >Contraseña:</label><br/>
            <input type='password' name='password' id='password' maxlength="50" /><br/>
        </div>
        <div class='campo'>
            <label for='check' >Registrar login:</label>    
            <input type='checkbox' name='check' id='check' value="1" /><br/>
        </div>

        <div class='campo'>
            <input type='submit' name='enviar' value='Enviar' />
        </div>
    </fieldset>
    </form>
    </div>
</body>
</html>