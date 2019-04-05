<?php
//Incluimos las clases necesarias
require_once('include/Ordenador.php');
require_once('include/DB.php');
require_once('include/Producto.php');
require_once('Smarty.class.php');

// Recuperamos la información de la sesión
session_start();

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");

// Cargamos la librería de Smarty
$smarty = new Smarty;
$smarty->template_dir = '/home/slimbook/Documentos/DAW/DWES/05/smarty/templates/';
$smarty->compile_dir = '/home/slimbook/Documentos/DAW/DWES/05/smarty/templates_c/';
$smarty->config_dir = '/home/slimbook/Documentos/DAW/DWES/05/smarty/configs/';
$smarty->cache_dir = '/home/slimbook/Documentos/DAW/DWES/05/smarty/cache/';

// Ponemos a disposición de la plantilla los datos necesarios
$smarty->assign('usuario', $_SESSION['usuario']);
// Lo pongo de manera manual, le deberia llegar la info de listaproductos.tpl, pero no lo he conseguido.
// Lo dejo asi para generar un ejemplo al menos.
// me ocurre lo mismo en listaproductos.tpl, he dejado de forma manual los hiperlinks, porqu eno he conseguido buscar el codigo en el array de ordenadores.
$smarty->assign('infopc', DB::infoordenador("ACERAX3950"));
$smarty->assign('infopro', DB::obtieneProducto("ACERAX3950"));


// Mostramos la plantilla
$smarty->display('ordenador.tpl');     
?>