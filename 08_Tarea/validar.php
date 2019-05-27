<?php
    // Validamos los datos, si están bien devuelve true, si no, false.
    $retorno_datos = array('estado' => true, 'error' => []); 
    // Comprobamos los datos introducidos con una expresion regular.
    if ((preg_match("/^([-+]{0,1}[0-9]{1,3})(\.[0-9]{1,2})?$/",$_POST['latitud'])) && (preg_match("/^([-+]{0,1}[0-9]{1,3})(\.[0-9]{1,2})?$/", $_POST['longitud']))) {
        session_start();
        $_SESSION['latitud']=$_POST['latitud'];
        $_SESSION['longitud']=$_POST['longitud'];
    }
    else {
        $retorno_datos['estado'] = false;
        if (empty($_POST['latitud'])) { 
            $retorno_datos['error'][] = 'El campo latitud está vacío';
        } else {
            if (!preg_match("/^([-+]{0,1}[0-9]{1,3})(\.[0-9]{1,2})?$/",$_POST['latitud'])) {
                $retorno_datos['error'][] = 'La latitud no es correcta';
            }
        }
        if (empty($_POST['longitud'])) { 
            $retorno_datos['error'][] = 'El campo longitud está vacío';
        } else {
            if (!preg_match("/^([-+]{0,1}[0-9]{1,3})(\.[0-9]{1,2})?$/",$_POST['longitud'])) {
                $retorno_datos['error'][] = 'La longitud no es correcta';
            }
        }
    }
$datos = [
	'latitud' => $_POST['latitud'],
	'longitud'=> $_POST['longitud']
];
$retorno_datos['data'] = $datos;
// Especificamos la cabecera 'content-type' como JSON para que jQuery lo reconozca
header('Content-Type: application/json');
// Mostramos el array en JSON 
echo json_encode($retorno_datos);
?>