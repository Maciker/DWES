<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 3 : Trabajar con bases de datos en PHP -->
<!-- Tarea. Página edit.php -->
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Tarea Tema 3. Página edit.php</title>
	<link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
$mensaje = "";
// Se debe recibir el código del producto a editar
$cod = $_GET['producto'];
try {
	$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
	$dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "abc123.", $opciones);
	$dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
	$error = $e->getCode();
	$mensaje = $e->getMessage();
}
?>
<div id="encabezado">
	<h1>Tarea: Edición de un producto</h1>
</div>
<div id="contenido">
<h2>Producto:</h2>
<?php
// Se obtienen todos los datos de ese producto
if (!isset($error)) {
	$resultado = false;
	$error = false;
	try {
		$sql = "SELECT nombre, nombre_corto, descripcion, PVP, familia FROM producto WHERE cod='$cod'";
		$resultado = $dwes->query($sql);
	}catch (PDOException $e) { 
		$error = $e->getCode();
		$mensaje = $e->getMessage();
	}
	if($resultado) {
		// Creamos un formulario con los datos del producto
		$row = $resultado->fetch();
		echo "<form id='editar' action='update.php' method='post'>";
		// Metemos oculto el código de producto
		echo "<input type='hidden' name='cod' value='$cod'/>";
		// Y el código de la familia
		echo "<input type='hidden' name='familia' value='${row['familia']}'/>";
		echo "<p>Nombre corto: ";
		echo "<input type='text' name='nombre_corto' size='60' maxlength='50' value='${row['nombre_corto']}' /></p>";
		echo "<p>Nombre: </p>";
		echo "<textarea name='nombre' cols='60' rows='3'>";
		echo $row['nombre']."</textarea>";
		echo "<p>Descripción: </p>";
		echo "<textarea name='descripcion' cols='60' rows='8'>";
		echo $row['descripcion']."</textarea>";
		echo "<p>PVP: ";
		echo "<input type='text' size='10' name='PVP' value='${row['PVP']}' /></p>";
		echo "<p><input type='submit' name='accion' value='Actualizar'/>";
		echo "<input type='submit' name='accion' value='Cancelar'/></p>";
		echo "</form>";
	}
	
}
?>
</div>
<div id="pie">
<?php
if ($mensaje != '') 
	echo "<p>Se ha producido un error! $mensaje</p>";
else {
	unset($dwes);
}
?>
</div>
</body>
</html>