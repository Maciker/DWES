<?php

$retorno_datos = array('estado' => true, 'error' => []);

// Filtramos los datos del formulario para evitar XSS e inyecciones de código, comprobar que no hay caracteres extraños, etc.
if (empty($_POST['nombre']) || !preg_match('/^[a-zá-ú]*$/i', $_POST['nombre'])) {
	$retorno_datos['estado'] = false;
	$retorno_datos['error'][] = 'El nombre no es válido';
}

if (empty($_POST['apellido']) || !preg_match('/^[a-zá-ú]*$/i', $_POST['apellido'])) {
	$retorno_datos['estado'] = false;
	$retorno_datos['error'][] = 'El apellido no es válido';
}

if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	$retorno_datos['estado'] = false;
	$retorno_datos['error'][] = 'El email no es correcto';
}

if (empty($_POST['anio_nac']) ||  !filter_var($_POST['anio_nac'], FILTER_VALIDATE_INT)) {
	$retorno_datos['estado'] = false;
	$retorno_datos['error'][] = 'El año de nacimiento no es válido';
}

$datos = [
	'nombre' => $_POST['nombre'],
	'apellido'=> $_POST['apellido'],
	'email'=> $_POST['email'],
	'anio_nac'=> $_POST['anio_nac']
];


$retorno_datos['data'] = $datos;

// Especificamos la cabecera 'content-type' como JSON para que jQuery lo reconozca
header('Content-Type: application/json');

// Mostramos el array en JSON 
echo json_encode($retorno_datos);
?>