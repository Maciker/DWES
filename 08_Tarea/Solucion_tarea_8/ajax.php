<?php
// Archivo ajax.php
require_once('./include/definicionJaxon.php');

// Llamada para procesar peticiones Jaxon
if($jaxon->canProcessRequest()) {
    $jaxon->processRequest();
}