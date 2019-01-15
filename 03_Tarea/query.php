<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor
Tema 3: Trabajar con BD en PHP
Tarea 3: query.php  
Autor: Iker Macaya Faber -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>DWES: Tarea 03</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<!-- Creamos la conexion a la base de datos:
     generamos las variables que le vamos a pasar como parametros
     para crear la conexion -->
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
    
<!-- En el encabezado tenemos el combo con las familias de productos de la BD
     Ejecutamos la consulta sobre la BD y se muestran los resultados en el combo.
     El botón mostrar nos permite ver los productos, si los hay, de la familia seleccionada -->

<div id="encabezado">
	<h1>Tarea: Listado de productos de una familia </h1>
	<form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <select id="cmbSelect" name="cmbSelect" >
            <option value="">Selecciona una familia</option>
            <?php
            // Consulta nombres de familias que vamos a mostrar en el combo
            $sql_familia="SELECT nombre FROM familia";
            $result = $conn->query($sql_familia);
            while ($reg = $result->fetch()){
            ?>
            <option value=<?php echo $reg['nombre']; ?>><?php echo $reg['nombre']; ?></option><?php } ?>
            </select>
            <input type="submit" value="Mostrar" name="mostrar"/>
	</form>
</div>

<!-- En el contenido vamos a mostrar el nombre corto, el PVP y un boton de editar de la familia seleecionada
     Para ello le pasaremos el codigo de la familia seleccionada en el combo una vez se pulse el boton mostrar
     Y ejecutaremos una consulta para sacar los datos de dicha familia y mostrarlos en pantalla.   -->

<div id="contenido">
	<h2>Productos de la familia:</h2>   
                <?php
                if (isset($_POST["mostrar"])){
                    // Cogemos la info del combo para crear la consulta en la BD
                    $selectOption = $_POST["cmbSelect"];
                    // Añadimos excepcion para que muestre mensaje en caso de que la consulta no se realice correctamente.
                try {
                    $sql_cod="SELECT cod FROM familia WHERE nombre = '$selectOption'"; 
                    $cod = $conn->query($sql_cod);
                    $cod_familia = $cod->fetch();
                    $codigo = $cod_familia['cod'];    
                } catch (PDOException $ex) {
                    echo "Error: ".$ex->getMessage();
                }   
                    // Si la consulta no nos devuelve nada, indicaremos que dicha familia no tiene productos
                    if ($codigo == ''){
                        print "La familia selecionada no tiene productos";
                    // cuando si tenga productos, haremos una consulta por el codigo de familia y mostraremos todos los productos de dicha familia.
                    } else {
                    // Añadimos excepcion para que muestre mensaje en caso de que la consulta no se realice correctamente.
                        try {    
                        $sql_mostrar="SELECT nombre_corto, PVP FROM producto WHERE familia = '$codigo'";
                        $products=$conn->query($sql_mostrar);
                    } catch (PDOException $ex) {
                    echo "Error: ".$ex->getMessage();
                    } 
                        while ($pro = $products->fetch()){?>
                        <form id="form_edit" action="edit.php" method="post">
                        <?php    
                        print "Producto: ".$pro['nombre_corto'].": ".$pro['PVP']." euros ";?>
                        <input type="hidden" name="nombre_corto" value='<?php echo $pro['nombre_corto'];?>'/>
                        <input type="submit" value="Editar" name="editar"/>
                        </form> 
                        <?php print "<br />\n";
                        } 
                    }    
                }
                ?>               
</div>
<?php   //Cerramos conexion conla BD
        $conn->close();?>  
<div id="pie">
</div>
</body>
</html>