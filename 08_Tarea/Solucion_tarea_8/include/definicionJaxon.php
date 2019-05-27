<?php
use Jaxon\Jaxon;

require_once('./vendor/autoload.php');
require_once('./include/PronosticoOWM.php');

// Recuperar el objeto singleton Jaxon
$jaxon = jaxon();

// Establecer la URI de procesamiento de peticiones Jaxon
$jaxon->setOption('core.request.uri', 'ajax.php');

// Registrar una instancia de la clase HolaMundo
$jaxon->register(Jaxon::CALLABLE_OBJECT, new PronosticoOWM());