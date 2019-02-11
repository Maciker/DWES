<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor
Tema 4: Trabajar con BD en PHP
Tarea 4: preferences.php  
Autor: Iker Macaya Faber -->
<html>
    <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>DWES: Tarea 04</title>
    <link href="DWES04_TAR_R05_tarea.css" rel="stylesheet" type="text/css">
</head>
<body>
<form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <fieldset>
    <legend>Preferencias:</legend>
    <!-- Mensaje que se mostrara cuando pulsemos el botón Establecer preferencias-->
    <span class="mensaje" <?php if ($_SESSION["msg"]==0){ echo "style=\"visibility:hidden\"" ;} else {echo "style=\"visibility:visible\""; $_SESSION["msg"]=0;}  ?>>Información guardada en la sesión</span><br>
    <!-- Idiomas a elegir. Mostraremos por defecto los valores almacenados en la sesion.-->
    <label class="etiqueta">Idiomas:</label><br>
    <input type="checkbox" <?php if (!empty($_SESSION["esp"])){ echo 'checked' ; }?> name="esp" value="español">español<br>
    <input type="checkbox" <?php if (!empty($_SESSION["ing"])){ echo 'checked' ; }?> name="ing" value="inglés">inglés<br>
    <input type="checkbox" <?php if (!empty($_SESSION["eus"])){ echo 'checked' ; }?> name="eus" value="euskara">euskara<br><br>
    <!-- Opciones de Perfil. Al igual que con los idiomas, mostraremos seleccionado el valor que tengamos almacenado en la sesion.-->
    <label class="etiqueta">Perfil publico:</label><br>
    <select name="publico">
        <option <?php if ($_SESSION["publico"] == "Si"){ echo 'selected' ;} ?> value="Si">Si</option>
        <option <?php if ($_SESSION["publico"] == "No"){ echo 'selected' ;} ?> value="No">No</option>
    </select><br>
    <!-- Opciones de Zona Horaria. Mostraremos seleccionado el valor almacenado en la sesion.-->
    <label class="etiqueta">Zona Horaria:</label><br>
    <select name="zona">
        <option <?php if ($_SESSION["zona"] == "GMT-2"){ echo 'selected' ;} ?> value="GMT-2">GMT-2</option>
        <option <?php if ($_SESSION["zona"] == "GMT-1"){ echo 'selected' ;} ?> value="GMT-1">GMT-1</option>
        <option <?php if ($_SESSION["zona"] == "GMT")  { echo 'selected' ;} ?> value="GMT">GMT</option>
        <option <?php if ($_SESSION["zona"] == "GMT+1"){ echo 'selected' ;} ?> value="GMT+1">GMT+1</option>
        <option <?php if ($_SESSION["zona"] == "GMT+2"){ echo 'selected' ;} ?> value="GMT+2">GMT+2</option>
    </select><br><br><br>
    <input type="submit" name="submit" value="Establecer preferencias"><br>
    <a href="http://localhost/DWES/04/show.php">Mostrar preferencias</a>
  </fieldset>
</form>
    <?php
    /*  Cuando el usuario publse el boton de Establecer preferencias almacenaremos los valores del formulario en la sesion.
        Estos valores los vamos a utilizar para mostrarlos por defecto en la pagina.
        Y para mostrarlos en la pagina show.php */
    if (isset($_POST["submit"])){
            // Cuando pulse el boton borraremos el contenido de la sesion ya que va a volver a establecerse.
            session_unset();
            // Variable que vamos a utilizar para mostrar el mensaje en el encabezado de la pagina.
            $_SESSION["msg"]=1;
            // Si el usuario selecciona alguno de los idiomas, lo almacenamos en la sesion.
            if (!empty($_POST["esp"])){
            $_SESSION["esp"] = $_POST["esp"];
            }
            if (!empty($_POST["ing"])){
            $_SESSION["ing"] = $_POST["ing"];
            }
            if (!empty($_POST["eus"])){
            $_SESSION["eus"] = $_POST["eus"];
            }
            // Almacenamos los valores seleccionados en los select de zona horaria y perfil publico.
            $_SESSION["publico"] = $_POST["publico"];
            $_SESSION["zona"] = $_POST["zona"];
            // Refrescamos la pagina para mostrar los valores seleccionados por el usuario.
            header("Refresh:0");
    }
?>
</body>
</html>