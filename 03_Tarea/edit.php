<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor
Tema 3: Trabajar con BD en PHP
Tarea 3: edit.php  
Autor: Iker Macaya Faber -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Plantilla para Ejercicios Tema 3</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<?php
    // Varibles para establecer la conexion
    $servername = "localhost";
    $dbname="dwes";
    $username = "dwes";
    $password = "abc123.";
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");   
    // Conexion a la base de datos, controlando que se haga correctamente
    // si no la realiza mostrara un mensaje de error.
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, $options);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>
<body>

<div id="encabezado">
	<h1>Tarea: Edición de un producto </h1>
	<form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	</form>
</div>

<!-- Cuando el usuario pulse editar, mostraremos los campos del producto elegido
     para ello pasaremos el nombre_corto del producto para hacer la consulta sql deseada
     y posteriormente mostrar los campos en un formulario, a partir de los datos de la consulta-->

<div id="contenido">
	<h2>Producto</h2>
            <?php
            $producto = $_POST["nombre_corto"];
            // Añadimos excepcion para que muestre mensaje en caso de que la consulta no se realice correctamente.
            try {
                /*consulta sql para sacar la info del producto marcado por el usuario
                  El campo cod no lo vamos a mostrar, pero tambien lo vamos a coger en la consuta,
                  lo usaremos despues en la consulta de actualizacio (Cuando usuario pulse actualizar) */
                $sql_pro = "SELECT cod,nombre_corto, nombre, descripcion, PVP FROM producto WHERE nombre_corto = '$producto'";
                $result = $conn->query($sql_pro);
            } catch (PDOException $ex) {
                    echo "Error: ".$ex->getMessage();
            } 
            $pro = $result->fetch();      
            ?>
        <!-- Formulario en el cual mostramos los datos del producto.
             Le pasamos los datos del mismo delde el resultado de la consulta sql.-->
        <form id="form_edit" action="update.php" method="post">
            <input type="hidden" name="cod" value='<?php echo $pro['cod'];?>'/>
            Nombre corto: <input type="text" name="nombre_corto" maxlength="50" style="width:450px" value="<?php echo $pro['nombre_corto'];?>"/><br><br>
            Nombre:<br><input type="text" name="nombre" style="width:450px;height:80px"  maxlength="200" value="<?php echo $pro['nombre'];?>"/><br><br>
            Descripción:<br><textarea type="text" name="descripcion" style="width:450px;height:210px"><?php echo $pro['descripcion'];?></textarea><br><br>
            PVP: <input type="number" name="PVP" value="<?php echo $pro['PVP'];?>"/><br><br>
            <input type="submit" value="Actualizar" name="actualizar">
            <input type="submit" value="Cancelar" >
        </form> 
</div>
<?php   //Cerramos conexion conla BD
        $conn=null;?>   
<div id="pie">
</div>
</body>
</html>
