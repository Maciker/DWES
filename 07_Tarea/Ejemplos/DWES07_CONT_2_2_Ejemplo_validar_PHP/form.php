﻿<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 7 : Aplicaciones web dinámicas: PHP y Javascript -->
<!-- Ejemplo Validación formulario con PHP: form.php -->
<?php require_once("validar.php"); ?>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Ejemplo Tema 7: Validación formulario</title>
  <link rel="stylesheet" href="estilos.css" type="text/css" />
</head>

<body>
    <div id='form'>
    <form id='datos' action='form.php' method='post'>
    <fieldset >
        <legend>Introducción de datos</legend>
        <div class='campo'>
            <label for='nombre' >Nombre:</label>
            <input type='text' name='nombre' id='nombre' maxlength="50" value="<?php if (isset($_POST['nombre'])) echo $_POST['nombre'] ?>" /><br />
            <span id='errorNombre' for='nombre' class='<?php if(!isset($_POST['enviar']) || validarNombre($_POST['nombre'])) echo "oculto "; ?>error'>Debe tener más de 3 caracteres.</span>
        </div>
        <div class='campo'>
            <label for='password1' >Contraseña:</label>
            <input type='password' name='password1' id='password1' maxlength="50" value="<?php if (isset($_POST['password1'])) echo $_POST['password1'] ?>" /><br />
            <span id='errorPassword' for='password' class='<?php if(!isset($_POST['enviar']) || validarPasswords($_POST['password1'], $_POST['password2'])) echo "oculto "; ?>error'>Debe ser mayor de 5 caracteres o no coinciden.</span>
        </div>
        <div class='campo'>
            <label for='password2' >Repita la contraseña:</label>
            <input type='password' name='password2' id='password2' maxlength="50" value="<?php if (isset($_POST['password2'])) echo $_POST['password1'] ?>" />
        </div>
        <div class='campo'>
            <label for='email' >Email:</label>
            <input type='text' name='email' id='email' maxlength="50" value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>" /><br />
            <span id='errorEmail' for='email' class='<?php if(!isset($_POST['enviar']) || validarEmail($_POST['email'])) echo "oculto "; ?>error'>La dirección de email no es válida.</span>
        </div>

        <div class='campo'>
            <input type='submit' name='enviar' value='Enviar' />
        </div>
    </fieldset>
    </form>
    </div>
</body>
</html>
