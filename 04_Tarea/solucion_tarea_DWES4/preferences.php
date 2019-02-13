<?php
 session_start();
// Comprobamos si ya se ha enviado el formulario
if (isset($_POST['enviar'])) {
	// Guardamos la información en la sesión
	$_SESSION['idioma'] = $_POST['idioma'];
	$_SESSION['perfpublico'] = $_POST['perfpublico'];
	$_SESSION['zonahoraria'] = $_POST['zonahoraria'];
	$mensaje = "Información guardada en la sesión.";
}

function crea_options($valores, $seleccionado) {
	foreach($valores as $valor) {
		if($valor == $seleccionado)
			echo "<option selected='selected'>" . $valor . "</option>";
			else
	echo "<option>" . $valor . "</option>";
	}
}

$idiomas = array('español', 'inglés', 'euskara');
$sino = array('sí', 'no');
$zonas_horarias = array('GMT-2', 'GMT-1', 'GMT', 'GMT+1', 'GMT+2');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Tarea: preferences.php -->
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Tarea Tema 4: Preferencias por usuario</title>
	<link href="tarea.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id='login'>
	<form action='<?php echo $_SERVER['PHP_SELF'] ?>' method='post'>
	<fieldset >
	<legend>Preferencias</legend>
	<div><span class='mensaje'>
	<?php 
	if (isset($mensaje)) 
		echo $mensaje; 
	?>
	</span></div>
	<!-- Recuperamos la información de la sesión -->
	<div class='campo'>
	<label class='etiqueta' for='idioma'>Idiomas:</label><br/>
		<?php
		foreach($idiomas as $idioma) {
			echo "<input type='checkbox' name='idioma[]' value='".$idioma."'";
			if (isset($_SESSION['idioma']) && in_array($idioma, $_SESSION['idioma'])) 
				echo " checked='checked'";
			echo ">".$idioma."</input><br>";
		}
		?>
		</div>
	<div class='campo'>
		<label class='etiqueta' for='perfpublico'>Perfil público:</label><br/>
		<select name='perfpublico' id='perfpublico'>
		<?php
		crea_options($sino, $_SESSION['perfpublico']); 
		?>
		</select>
	</div>
	<div class='campo'>
		<label class='etiqueta' for='zonahoraria'>Zona horaria:</label><br/>
		<select name='zonahoraria' id='zonahoraria'>
		<?php crea_options($zonas_horarias, $_SESSION['zonahoraria']); ?>
		</select>
	</div>
	<div>
		<br />
	</div>
	<div class='campo'>
		<input type='submit' name='enviar' value='Establecer preferencias' />
	</div>
	<div class='campo'>
		<a href="show.php">Mostrar preferencias</a>
	</div>
	</fieldset>
	</form>
</div>
</body>
</html>