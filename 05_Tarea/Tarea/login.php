<?php
//require_once ('DB.php');
//require_o__ROOT__nce $_SERVER['DOCUMENT_ROOT'].'/common/configs/config_templates.inc.php';
define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__.'/include/DB.php'); 

// Cargamos la librería de Smarty
require_once('Smarty.class.php');
$smarty = new Smarty;
$smarty->template_dir = '/home/slimbook/Documentos/DAW/DWES/05/smarty/templates/';
$smarty->compile_dir = '/home/slimbook/Documentos/DAW/DWES/05/smarty//templates_c/';
$smarty->config_dir = '/home/slimbook/Documentos/DAW/DWES/05/smarty/configs/';
$smarty->cache_dir = '/home/slimbook/Documentos/DAW/DWES/05/smarty/cache/';

// Comprobamos si ya se ha enviado el formulario
if (isset($_POST['enviar'])) {

    if (empty($_POST['usuario']) || empty($_POST['password'])) 
        $smarty->assign('error','Debes introducir un nombre de usuario y una contraseña');
    else {
        // Comprobamos las credenciales con la base de datos
        if (DB::verificaCliente($_POST['usuario'], $_POST['password'])) {
            session_start();
            $_SESSION['usuario']=$_POST['usuario'];
            header("Location: productos.php");                    
        }
        else {
            // Si las credenciales no son válidas, se vuelven a pedir
            $smarty->assign('error','Usuario o contraseña no válidos!');
        }
    }
}
//echo "Estoy aqui";
// Mostramos la plantilla
$smarty->display('login.tpl');
?>

