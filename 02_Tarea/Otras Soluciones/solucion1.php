<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 2 : Características del Lenguaje PHP -->
<!-- Solución a la tarea -->
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Agenda de contactos</title>
</head>
<body>
<?php
    if (isset($_POST['agenda'])) 
        $agenda = $_POST['agenda'];
    else
        $agenda = array();  // Creamos $agenda como un array vacío
    if (isset($_POST['action']) && $_POST['action'] == "nuevo") {
        $nuevo_nombre = $_POST['nombre'];
        $nuevo_email = $_POST['email'];
        if (empty($nuevo_nombre))
            echo "<p style='color:red'>Debe introducir un nombre!!</p><br />";
        elseif (empty($nuevo_email))
            unset($agenda[$nuevo_nombre]);
        else
            $agenda[$nuevo_nombre] = $nuevo_email;
    }
?>
    
    <!-- Mostramos los contactos de la agenda -->
    <h2>Agenda</h2>
<?php
    if (count($agenda) == 0)
        echo "<p>No hay contactos en la agenda.</p>";
    else {
        echo "<ul>";
        foreach( $agenda as $nombre => $email )
            echo "<li>".$nombre.': '.$email."</li>";
        echo "</ul>";
    }
?>
    <br />
    
    <!-- Creamos el formulario de introducción de un nuevo contacto -->
    <h2>Nuevo contacto</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
        
    <!-- Metemos los contactos ya existentes ocultos en el formulario -->
<?php
    foreach( $agenda as $id => $task ) {
          echo '<input type="hidden" name="agenda['.$id.']" ';
          echo 'value="'.$task.'"/>';
    }
?>
        <input type="hidden" name="action" value="nuevo"/>
        <label>Nombre:</label><input type="text" name="nombre"/><br />
        <label>E-mail:</label><input type="text" name="email"/><br />
        <input type="submit" value="Añadir Contacto"/><br />
    </form>
    <br />
    
</body>
</html>