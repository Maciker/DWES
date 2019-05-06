<?php
// Archivo definicion.php
require __DIR__ . '/vendor/autoload.php';
use Jaxon\Jaxon;
use Jaxon\Response\Response;

// Definición de la clase HolaMundo
class HolaMundo
{
    public function diHola($boolMayusculas)
    {
        $text = ($boolMayusculas) ? 'HOLA MUNDO!' : 'Hola Mundo!';
        $response = new Response();
        $response->alert($text);
        return $response;
    }
}

// Recuperar el objeto singleton Jaxon
$jaxon = jaxon();

// Establecer la URI de procesamiento de peticiones Jaxon
$jaxon->setOption('core.request.uri', 'ajax.php');

// Registrar una instancia de la clase HolaMundo
$jaxon->register(Jaxon::CALLABLE_OBJECT, new HolaMundo());