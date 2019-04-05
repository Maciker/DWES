<?php
    require_once('DatosEmpresa.php');
    $uri='http://localhost/DWES/06/Parte1';
    $server = new SoapServer(null,array('uri' => $uri));
    $server->setClass('DatosEmpresa');
    $server->handle();
?>