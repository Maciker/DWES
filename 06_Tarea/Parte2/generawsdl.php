<?php
        require_once 'DatosEmpresa_wsdl.php';
        require_once 'WSDLDocument.php';
        
        $url="http://localhost/DWES/06/Parte2/resource_wsdl.php";
        $uri="http://localhost/DWES/06/Parte2";
        
        $wsdl = new WSDLDocument("DatosEmpresa_wsdl",$url, $uri);
        header('Content-Type: text/xml');
        echo $wsdl->saveXml();
?>