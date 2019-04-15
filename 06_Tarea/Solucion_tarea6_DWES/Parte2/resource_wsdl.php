<?php
require_once('DatosEmpresa_wsdl.php');

$server = new SoapServer('http://localhost/dwes6/serviciowsdl.wsdl.xml');
$server->setClass('DatosEmpresa_wsdl');
$server->handle();
