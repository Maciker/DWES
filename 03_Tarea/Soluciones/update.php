<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 3 : Trabajar con bases de datos en PHP -->
<!-- Tarea. Página update.php -->
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Tarea Tema 3. Página update.php</title>
<?php
if ($_POST['accion']=="Cancelar") {
	echo "<meta http-equiv='refresh' content='1; url=query.php?familia=${_POST['familia']}'>";
	$mensaje = 'Cancelando...';
}
?>
</head>
<?php
if ($_POST['accion']=="Actualizar") {
	try {
		$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
		$dwes = new PDO("mysql:host=localhost;port=3316;dbname=dwes", "dwes", "abc123.", $opciones);
		$dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// Preparamos la consulta
		$cod = $_POST['cod'];
		$nombre = $_POST['nombre'];
		$nombre_corto = $_POST['nombre_corto'];
		$descripcion = $_POST['descripcion'];
		$PVP = $_POST['PVP'];
		$sql = "UPDATE producto
		SET nombre=:nombre, nombre_corto=:nombre_corto, descripcion=:descripcion, PVP=:PVP
		WHERE cod=:cod";
		// Preparamos la consulta
		$consulta=$dwes->prepare($sql);
		$consulta->bindParam(":cod", $cod);
		$consulta->bindParam(":nombre", $nombre);
		$consulta->bindParam(":nombre_corto", $nombre_corto);
		$consulta->bindParam(":descripcion", $descripcion);
		$consulta->bindParam(":PVP", $PVP);
		// Y la ejecutamos
		$consulta->execute();
		$mensaje = "Se han actualizado los datos.";
		unset($consulta);
		unset($dwes);
	}
	catch (PDOException $e) {
		$error = $e->getCode();
		$mensaje = $e->getMessage();
	}
}
?>
<body>
<?php
if ($_POST['accion']=="Cancelar")
	echo 'Cancelando...';
else {
	if (isset($error)) echo "Se ha producido un error! ";
	echo $mensaje."<br />";
	// Creamos un formulario para volver al listado
	echo "<form action='update.php' method='post'>";
	// Metemos oculto el código de la familia
	echo "<input type='hidden' name='familia' value='${_POST['familia']}'/>";
	echo "<input type='submit' value='Continuar'/>";
	echo "</form>";
}
?>
</body>
</html>