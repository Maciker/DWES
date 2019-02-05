<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 3 : Trabajar con bases de datos en PHP -->
<!-- Tarea. Página query.php -->
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Tarea Tema 3. Página query.php</title>
<link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
$familia = "";
$mensaje = "";
if (isset($_REQUEST['familia'])) 
	$familia = $_REQUEST['familia'];
try {
	$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
	$dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "abc123.", 	$opciones);
	$dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
	$error = $e->getCode();
	$mensaje = $e->getMessage();
}
?>
<div id="encabezado">
<h1>Tarea: Listado de productos de una familia</h1>
<form id="form_seleccion" action="query.php" method="post">
<span>Familia: </span>
<select name="familia">
<?php
if (!isset($error)) {
	// Rellenamos el desplegable con los datos de todas las familias
	$resultado = false;
	try{
		$sql = "SELECT cod, nombre FROM familia";
		$resultado = $dwes->query($sql);
	}catch (PDOException $e) { //Captura la excepción si se produce un error. Se mostrará en el pie de paǵina
    	$error = $e->getCode(); // Guarda el código de error en la variable $error
        $mensaje = $e->getMessage(); //Guarda el mensaje de error en la variable $mensaje
	}
	if($resultado) {
		$row = $resultado->fetch();
		while ($row != null) {
			echo "<option value='${row['cod']}'";
			// Si se recibió un código de familia lo seleccionamos
			// en el desplegable usando selected='true'
			if ($familia == $row['cod'])
			echo " selected='true'";
			echo ">${row['nombre']}</option>";
			$row = $resultado->fetch();
		}
	}
}
?>
</select>
<input type="submit" value="Mostrar productos" name="enviar"/>
</form>
</div><div id="contenido">
<h2>Productos de la familia:</h2>
<?php
// Si se recibió un código de familia y no se produjo ningún error
// mostramos los productos de esa familia
if (!isset($error)) {
	$sql = "SELECT cod, nombre_corto, PVP
	FROM producto
	WHERE familia='$familia'";;
	$resultado = $dwes->query($sql);
	if($resultado) {
		// Creamos un formulario por cada producto obtenido
		$row = $resultado->fetch();
		while ($row != null) {
			/*
			echo "<p><form id='${row['cod']}' action='edit.php' method='post'>";
			// Metemos oculto el código de producto
			echo "<input type='hidden' name='producto' value='".$row['cod']."'/>";
			// Y el código de la familia
			echo "<input type='hidden' name='familia' value='".$familia."'/>";
			echo "Producto ${row['nombre_corto']}: ";
			echo $row['PVP']." euros.";
			echo "<input type='submit' value='Editar'/>";
			echo "</form>";
			echo "</p>";
			*/
			echo "<p>Producto ${row['nombre_corto']}: ${row['PVP']} <a href='edit.php?producto=${row['cod']}'> Editar </a></p>";
			$row = $resultado->fetch();
		}
	}
}
?>
</div>
<div id="pie">
<?php
if (isset($error)) 
	echo "<p>Se ha producido un error! $mensaje</p>";
else {
	echo $mensaje;
	unset($dwes);
}
?>
</div>
</body>