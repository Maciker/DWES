<?php
// Archivo ajax.php
require __DIR__ . '/definicion.php';

// Llamada para procesar peticiones Jaxon
if($jaxon->canProcessRequest()) {
    $jaxon->processRequest();
}