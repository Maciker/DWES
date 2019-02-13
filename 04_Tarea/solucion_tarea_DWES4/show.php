 
<?php
session_start();
$mensaje = '';
// Comprobamos si ya se ha enviado el formulario
if (isset($_POST['borrar'])) {
	// Eliminamos la información en la sesión
	session_unset();
	$mensaje = "Información de la sesión eliminada.";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Tarea: show.php -->
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
	<div><span class='mensaje'><?php echo $mensaje; ?></span></div>
	<!-- Recuperamos la información de la sesión -->
	<div class='campo'>
		<label class='etiqueta'>Idioma:</label><br/>
		<label class='texto'>
		<?php 
		if (isset($_SESSION['idioma'])) {
			foreach ($_SESSION['idioma'] as $idioma) 
				echo $idioma."<br />"; 	
		}?></label>
	</div>
	<div class='campo'>
		<label class='etiqueta'>Perfil público:</label><br/>
		<label class='texto'><?php 
		if (isset($_SESSION['perfpublico'])) {
			echo $_SESSION['perfpublico']; 
		}?></label>
	</div>
	<div class='campo'>
		<label class='etiqueta'>Zona horaria:</label><br/>
		<label class='texto'><?php 
		if (isset($_SESSION['zonahoraria'])) {
			echo $_SESSION['zonahoraria']; 
		}?></label>
	</div>
	<div>
		<br />
	</div>
	<div class='campo'>
		<input type='submit' name='borrar' value='Borrar preferencias' />
	</div>
	<div class='campo'>
		<a href="preferences.php">Establecer preferencias</a>
	</div>
	</fieldset>
	</form>
</div>
</body>
</html>