

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "

http://www.w3.org/TR/html4/loose.dtd">

<!-- Desarrollo Web en Entorno Servidor -->

<!-- Tema 2 : Características del Lenguaje PHP -->

<!-- Ejemplo: Validar datos en la misma página que el formulario -->

<html>

     <head>

          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

          <title>Desarrollo Web</title>

     </head>

     <body>

<?php

     if (!empty($_POST['modulos']) && !empty($_POST['nombre'])) {

          $nombre = $_POST['nombre'];

          $modulos = $_POST['modulos'];

          print "Nombre: ".$nombre."<br />";

          foreach ($modulos as $modulo) {

               print "Modulo: ".$modulo."<br />";

          }

     }

     else {

?>

     <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

          Nombre del alumno:

          <input type="text" name="nombre" value="<?php echo $_POST['nombre'];?>" />

          <?php

               if (isset($_POST['enviar']) && empty($_POST['nombre']))

                    echo "<span style='color:red'> &lt;-- Debe introducir un nombre!!</span>"

          ?><br />

          <p>Módulos que cursa:

          <?php

               if (isset($_POST['enviar']) && empty($_POST['modulos']))

                    echo "<span style='color:red'> &lt;-- Debe escoger al menos uno!!</span>"

          ?>

          </p>

          <input type="checkbox" name="modulos[]" value="DWES"

               <?php

                    if(isset($_POST['modulos']) && in_array("DWES",$_POST['modulos']))

                         echo 'checked="checked"';

               ?>

          />

               Desarrollo web en entorno servidor

               <br />

          <input type="checkbox" name="modulos[]" value="DWEC"

               <?php

                    if(isset($_POST['modulos']) && in_array("DWEC",$_POST['modulos']))

                         echo 'checked="checked"';

               ?>

          />

               Desarrollo web en entorno cliente<br />

          <br />

          <input type="submit" value="Enviar" name="enviar"/>

     </form>

<?php

     }

?>

     </body>

</html>

