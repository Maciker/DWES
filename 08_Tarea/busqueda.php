<?php
    session_start();
    if(!isset($_SESSION['latitud']) || !isset($_SESSION['longitud'])){
        // Eliminar sesión y redireccionar
        session_unset();
        session_destroy();
        header("Location: login.html");
    }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor. 
-->
<html>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(e) {
    $("a").click(function(e) {
        event.preventDefault();
        var link = $(this).attr("href");
        $(link).toggle();

    });
});
    </script>
    <head>
        <meta charset="UTF-8">
        <title>Wheather</title>
    </head>
    <body>
        <?php
            use Cmfcmf\OpenWeatherMap;
            use Cmfcmf\OpenWeatherMap\Exception as OWMException;

            // Incluimos el archivo autoload 
            require 'vendor/autoload.php';

            // Idioma de los datos
            $lang = 'es';

            // Unidades (puede ser 'metric' o 'imperial' [por defecto]):
            $units = 'metric';

            // Crear objeto OpenWeatherMap
            $owm = new OpenWeatherMap('fbc7dde4a59f72e51e4f52c41511cf16');
        // Consulta con la latitud y longitud proporcionadas por el usuario
        try {
            // Llamada para obtener datos atmosféricos 
            $weather1 = $owm->getWeather(['lon'=>$_SESSION['longitud'], 'lat'=>$_SESSION['latitud']], $units, $lang);
        } catch(OWMException $e) {
            echo 'OpenWeatherMap exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
        } catch(\Exception $e) {
            echo 'General exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
        }

        // Consulta con la latitud + 1 y longitud proporcionadas por el usuario
        try {
            // Llamada para obtener datos atmosféricos 
            $weather2 = $owm->getWeather(['lon'=>$_SESSION['longitud'], 'lat'=>$_SESSION['latitud']+1], $units, $lang);
        } catch(OWMException $e) {
            echo 'OpenWeatherMap exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
        } catch(\Exception $e) {
            echo 'General exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
        }
        
        // Consulta con la latitud - 1 y longitud proporcionadas por el usuario 
        try {
            // Llamada para obtener datos atmosféricos 
            $weather3 = $owm->getWeather(['lon'=>$_SESSION['longitud'], 'lat'=>$_SESSION['latitud']-1], $units, $lang);
        } catch(OWMException $e) {
            echo 'OpenWeatherMap exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
        } catch(\Exception $e) {
            echo 'General exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
        }
        
        // Consulta con la latitud y longitud + 1 proporcionadas por el usuario
        try {
            // Llamada para obtener datos atmosféricos 
            $weather4 = $owm->getWeather(['lon'=>$_SESSION['longitud']+1, 'lat'=>$_SESSION['latitud']], $units, $lang);
        } catch(OWMException $e) {
            echo 'OpenWeatherMap exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
        } catch(\Exception $e) {
            echo 'General exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
        }
        
        // Consulta con la latitud y longitud - 1 proporcionadas por el usuario
        try {
            // Llamada para obtener datos atmosféricos 
            $weather5 = $owm->getWeather(['lon'=>$_SESSION['longitud']-1, 'lat'=>$_SESSION['latitud']], $units, $lang);
        } catch(OWMException $e) {
            echo 'OpenWeatherMap exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
        } catch(\Exception $e) {
            echo 'General exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
        }
?>
        <h3>Lista de ciudades:</h3></br>
        <ul>
            <?php
            $lat1=$_SESSION['latitud'] + 1;
            $lat2=$_SESSION['latitud'] - 1;
            $lon1=$_SESSION['longitud'] + 1;
            $lon2=$_SESSION['longitud'] - 1;
            echo "<li><a id=link1 href=\"#w1\">".$weather1->city->name."(".$_SESSION['latitud'].", ".$_SESSION['longitud'].") </a></li>"
            ."<div id=w1 style=\"display: none\">".$weather1->weather->icon." / ".$weather1->temperature." / ".$weather1->humidity." / ".$weather1->weather->description."</div>"
            ."<li><a id=link2 href=\"#w2\">".$weather2->city->name."(".$lat1.", ".$_SESSION['longitud'].") </a></li>"
            ."<div id=w2 style=\"display: none\">".$weather2->weather->icon." / ".$weather2->temperature." / ".$weather2->humidity." / ".$weather2->weather->description."</div>"
            ."<li><a id=link3 href=\"#w3\">".$weather3->city->name."(".$lat2.", ".$_SESSION['longitud'].") </a></li>"
            ."<div id=w3 style=\"display: none\">".$weather3->weather->icon." / ".$weather3->temperature." / ".$weather3->humidity." / ".$weather3->weather->description."</div>"
            ."<li><a id=link4 href=\"#w4\">".$weather4->city->name."(".$_SESSION['latitud'].", ".$lon1.") </a></li>"
            ."<div id=w4 style=\"display: none\">".$weather4->weather->icon." / ".$weather4->temperature." / ".$weather4->humidity." / ".$weather4->weather->description."</div>"
            ."<li><a id=link5 href=\"#w5\">".$weather5->city->name."(".$_SESSION['latitud'].", ".$lon2.") </a></li>"
            ."<div id=w5 style=\"display: none\">".$weather5->weather->icon." / ".$weather5->temperature." / ".$weather5->humidity." / ".$weather5->weather->description."</div>"
            ?>
        </ul>
    </body>
</html>