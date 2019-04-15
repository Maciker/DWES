<?php
require_once('DatosEmpresa.php');

//$server = new SoapServer(null, array('uri'=>"http://localhost/DWES/tarea6"));
$server = new SoapServer(null, array('uri'=>"http://localhost/dwes6"));
$server->setClass('DatosEmpresa');
$server->handle();
