<?php
    require_once('DatosEmpresa_wsdl.php');
    $server = new SoapServer(null,array('uri' => ''));
    $server->setClass('DatosEmpresa_wsdl');
    $server->handle();
?>