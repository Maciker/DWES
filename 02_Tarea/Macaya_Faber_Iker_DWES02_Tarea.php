<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor
Tema 2: Características del Lenguaje PHP
Tarea 2: Agenda  
Autor: Iker Macaya Faber -->

<html>
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <title>DWES: Tarea 2</title>
     </head>
     <h2>Agenda</h2>
     <?php
        $agenda = array();
        // Comprobamos si se ha recibido por post la variable array, y si tiene
        // algun valor
        if (isset($_POST["agenda"]) && $_POST["agenda"]) {
            // Obtenemos el array pasado por post
            $agenda = unserialize(stripslashes($_POST["agenda"]));
        }
        
        /* Cuando nos mandan info desde el formulario comprobamo si han escrito algo en la variable nombre
            si no es así, mostramos un aviso por pantalla al usuario. */
        
        if (isset($_POST["enviar"]) && empty($_POST["nombre"])){
            print "<h3>Debe introducir un nombre</h3><br>";
        }
        
        /* Si nos mandan información desde el formulario y ambos campos tienen inforamción
           añadimos elnombre del usuario como clave en el arrray asociativo
           y como valor el email tecleado por el usuario.
           De esta manera si el usuario teclea un nombre ya existente en el array
           actualizaremos su email, como indicaba en las especificaciones. */
        
        if (isset($_POST["enviar"]) && !empty($_POST["nombre"]) && !empty($_POST["correo"])){
            $agenda[$_POST["nombre"]] =  $_POST["correo"];
        }

        /* Si nos mandan información desde el formulario y solamente tiene información el campo nombre
           comprobamos si esa clave existe en el formulario (estamos guardando los campos como claves)
           si la clave existe, la borramos del array. */
        
        if (isset($_POST["enviar"]) && !empty($_POST["nombre"]) && empty($_POST["correo"])){
            if (array_key_exists($_POST["nombre"], $agenda)){
                unset($agenda[$_POST["nombre"]]);
            }
        }
        
        //Por último recorremos el array y mostramos en pantalla la clave = nombre y su valor = email.
        foreach ($agenda as $a => $b) {
            print "<ul><li>".$a.": ".$b ."</li></ul>";
        }        
     ?>
    <h2>Nuevo Contacto</h2><br>
          <!--  Aquí tenemos el formulario donde el usuario va a teclear la información
                usamos el metodo post para enviar la información.
                Pasamos el array oculto y mostramos los campos los campos nombre e email
                este último de tipo email, para comprobar que el usuario mete un email correcto.
                con el botón enviar pasamos la información para que sea analizada, monstrada en pantalla, etc -->
          
          <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
               <input type="hidden" name="agenda" value='<?php echo serialize($agenda);?>'>
               Nombre:<br> <input type="text" name="nombre"/><br><br>
               Correo:<br> <input type="email" name="correo"/><br><br>
               <input type="submit" value="Enviar" name="enviar"/>
          </form>
     </body>
</html>