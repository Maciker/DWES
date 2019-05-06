<?php
// Archivo pagina.php
require (__DIR__ . '/definicion.php');
?>
<!doctype html>
<html>
<head>
    <title>Jaxon Simple Test</title>
</head>
<body>
    <input type="button" value="Enviar" onclick="JaxonHolaMundo.diHola(1);return false;" />
</body>
<?php
// Insertar la librería Javascript de Jaxon
echo $jaxon->getJs();
// Insertar el código Javscript para lanzar la petición de Ajax
echo $jaxon->getScript();
?>    
</html>