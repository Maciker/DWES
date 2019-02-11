<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor
Tema 3: Trabajar con BD en PHP
Tarea 3: update.php  
Autor: Iker Macaya Faber -->
<html>
<head>
  <meta http-equiv='refresh' content="0;url=query.php">
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
	<h1>Tarea: Actualizacion </h1>
	<form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	</form>
</div>
<!-- Pagina nos redirige automaticamente a la pagina query.php
     Si el usuario ha pulsado el boton actualizar, lanza consulta de actualizcion
     Cogiendo los campos pasados por le formulario y actualizando el contenido de los mismos en la BD-->    
<div id="contenido">
	<h2>Actualizacion</h2>
        <?php
            if (isset($_POST["actualizar"])){
                echo "Estoy actualizando";
                // Añadimos excepcion para que muestre mensaje en caso de que la consulta no se realice correctamente.
                try {
                    $sql_update="UPDATE producto SET nombre_corto='$_POST[nombre_corto]', nombre='$_POST[nombre]', descripcion='$_POST[descripcion]', PVP=$_POST[PVP] WHERE cod = '$_POST[cod]'";
                    $result=$conn->exec($sql_update);
                } catch (PDOException $ex) {
                    echo "Error: ".$ex->getMessage();
                }
            }
        ?>
</div>
    
<?php   //Cerramos conexion conla BD
        $conn=null;?>  
<div id="pie">
</div>
</body> 
</html>
