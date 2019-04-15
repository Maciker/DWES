<?php
require_once 'DatosEmpresa_wsdl.php';
require_once './WSDLDocument-0.6/src/WSDLDocument.php';


$wsdl = new WSDLDocument(
    "DatosEmpresa_wsdl",
    "http://localhost/dwes6/resource_wsdl.php",
    "http://localhost/dwes6");

// Mostrar el XML con la cabecera adecuada
header('Content-Type: text/xml'); 
echo $wsdl->saveXml();

?>
