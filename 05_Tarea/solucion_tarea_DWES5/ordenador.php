<?php
/* 
* Fichero para llamar a la plantilla que mostrará los datos del ordenador
*/
require_once('include/DB.php');
require_once('include/Ordenador.php');
require_once('Smarty.class.php');

// Recuperamos la información de la sesión
session_start();

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");

$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';

// Comprobamos si se ha enviado el formulario de vaciar la cesta

if (isset($_GET['codigo'])) {
	$smarty->assign('correcto',true);
	$ordenador = DB::obtieneOrdenador($_GET['codigo']);

	$smarty->assign('nombre_alumn','Nombre Alumn@');
	$smarty->assign('usuario', $_SESSION['usuario']);
	$smarty->assign('ordenador',$ordenador);

}else{
	$smarty->assign('correcto',false);
}

// Mostrar plantilla
$smarty->display('ordenador.tpl');     
?>