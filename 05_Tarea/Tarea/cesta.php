<?php
require_once('include/CestaCompra.php');
require_once('Smarty.class.php');

// Recuperamos la información de la sesión
session_start();

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");

// Cargamos la librería de Smarty
$smarty = new Smarty;
$smarty->template_dir = '/home/slimbook/Documentos/DAW/DWES/05/smarty/templates/';
$smarty->compile_dir = '/home/slimbook/Documentos/DAW/DWES/05/smarty//templates_c/';
$smarty->config_dir = '/home/slimbook/Documentos/DAW/DWES/05/smarty/configs/';
$smarty->cache_dir = '/home/slimbook/Documentos/DAW/DWES/05/smarty/cache/';

// Recuperamos la cesta de la compra
$cesta = CestaCompra::carga_cesta();

// Ponemos a disposición de la plantilla los datos necesarios
$smarty->assign('usuario', $_SESSION['usuario']);
$smarty->assign('productoscesta', $cesta->get_productos());
$smarty->assign('coste', $cesta->get_coste());

// Mostramos la plantilla
$smarty->display('cesta.tpl'); 
?>
