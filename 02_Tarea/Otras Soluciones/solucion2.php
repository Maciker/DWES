<?php
    require_once("solucion2_Funciones.php");
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Agenda</title>
    </head>
    <body>
        <h1>Agenda</h1>

        <?php
            $agenda = GetArray();
            
            ListarResultados($agenda);
        ?>

        <h2>Nuevo contacto</h2>
        <form name="input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            Nombre: <input type="text" name="nombre" /><br />
            Correo: <input type="text" name="correo" /><br />

            <!-- Serializo el array para poder enviarlo mediante POST-->
            <input type="hidden" value="<?php print base64_encode(serialize($agenda)) ?>" name="arrayAgenda" />
            <input type="submit" value="Enviar" name="enviar" />
        </form> 
    </body>
</html>