<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor
Tema 4: Trabajar con BD en PHP
Tarea 4: show.php  
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
    <!-- Mesaje que se muestra si pulsamos el botón: Borrar preferencias-->
    <span class="mensaje" <?php if ($_SESSION["borrar"]==0){ echo "style=\"visibility:hidden\"" ;} else {echo "style=\"visibility:visible\""; $_SESSION["borrar"]=0;}?>>Información de la sesión eliminada</span><br>
    <!--Mostramos la infomacion de los idiomas almacenada en la sesion. Solo se muestra los idiomas seleccionados.-->
    <label class="etiqueta">Idiomas:</label><br>
    <label class="texto"><?php if (!empty($_SESSION["esp"])){ echo $_SESSION["esp"]."<br>" ; }?> </label>
    <label class="texto"><?php if (!empty($_SESSION["ing"])){ echo $_SESSION["ing"]."<br>" ; }?> </label>
    <label class="texto"><?php if (!empty($_SESSION["eus"])){ echo $_SESSION["eus"]."<br>" ; }?> </label>
    <!-- Muestra la informacion del perfil publico. -->
    <label class="etiqueta">Perfil público:</label><br>
    <label class="texto"><?php if (!empty($_SESSION["publico"])){ echo $_SESSION["publico"]."<br>" ; }?> </label>
    <!-- Muestra la informacion de la zona horaria-->
    <label class="etiqueta">Zona Horaria:</label><br>
    <label class="texto"><?php if (!empty($_SESSION["zona"])){ echo $_SESSION["zona"]."<br>" ; }?> </label>
    <!--    Todos los labels que muestra informacion de la sesion, comprueban si dicah variable tiene informacion.
            por un lado los idiomas para mostrar solamente los que están seleccionados, y en todas ellas
            para que cuando borremos las preferencias, estas no se muestren en la pagina.   -->
    <input type="submit" name="submit" value="Borrar preferencias"><br>
    <a href="http://localhost/DWES/04/preferences.php">Establecer preferencias</a>
  </fieldset>
</form>
    <?php
    /*   */
    if (isset($_POST["submit"])){
            // Cuando se pulsa el boton borrar preferencias, borramos las variables almacenadas en la sesion (esta sigue activa) y refrescamos la pagina.
            session_unset();
            // Esta variable la vamos a utilizar para mostrar el mensaje en el encabezado de la pagina.
            $_SESSION["borrar"]=1;
            header("Refresh:0");
    }
    ?>
</body>
</html>