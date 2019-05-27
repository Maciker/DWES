<?php
require_once('./include/definicionJaxon.php');

$form_ok = false;
$str_error = '';
$lat = '';
$lon = '';
if (isset($_POST['Consultar'])) {
	$lat = $_POST['latitud'];
	$lon = $_POST['longitud'];

	$pronostico = new PronosticoOWM();
	$obj_check_data = $pronostico->check_data($_POST);
	
	if ($obj_check_data->check) {
		$form_ok = true;
		
		$ar_ubicaciones = [
				[$lat, $lon],
				[$lat+1, $lon],
				[$lat-1, $lon],
				[$lat+1, $lon+1],
				[$lat-1, $lon-1]
		];

		$ar_ciudades = [];
		$ar_lat_lon = [];
		foreach ($ar_ubicaciones as $ar_coord) {
			$data = $pronostico->getDataByLatLon($ar_coord[0], $ar_coord[1]);
			// Contemplamos el caso cuando no hay estacion asignada, o la estacion es la misma que una que ya tenemos
			if(!empty($data->city->id) && !array_key_exists($data->city->id, $ar_ciudades)) {
				$ar_ciudades[$data->city->id] = $data->city->name;
				$ar_lat_lon[$data->city->id] = [$data->city->lat, $data->city->lon];
			}
		}
		$str_resultados = '<ul>';
		foreach ($ar_ciudades as $id => $ciudad) {
			$str_resultados.= "<li><a href='?id_ciudad=$id' onclick='llamadaJaxon(this);return false;'>$ciudad (".$ar_lat_lon[$id][0].", ".$ar_lat_lon[$id][1].")</a><div id='ciudad$id'/></li>\n";
		} 
		$str_resultados.= '</ul>';
	}
	else {
		$str_error = '<div class="error">'.$obj_check_data->msg.'</div>';
	}
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Consulta del tiempo</title>
<link href="tienda.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
	function llamadaJaxon(link) {
        var url = link.getAttribute("href");
        JaxonPronosticoOWM.jaxonGetHtmlByCityUrl(url);
    }
</script>
</head>

<body>
    <div id='login'>
    <form action='busqueda.php' method='post'>
    <fieldset>
        <legend>Consulta del tiempo</legend>        
        <div class='campo'>
            <label for='latitud'>Latitud:</label><br/>
            <input type='text' name='latitud' id='latitud' value="<?php echo $lat;?>"/><br/>
        </div>  
        <div class='campo'>
            <label for='longitud' >Longitud</label><br/>
            <input type='text' name='longitud' id='longitud' value="<?php echo $lon;?>"/><br/>
        </div>
        <div class='campo'>
            <input type='submit' name='Consultar' value='Consultar' />
        </div>        
    </fieldset>
    </form>
    <?php
    
    echo ($form_ok) ? $str_resultados : $str_error;
    
    ?>
    </div>
</body>
<?php
    if ($form_ok) {
		// Insertar la librería Javascript de Jaxon
		echo $jaxon->getJs();
		// Insertar el código Javscript para lanzar la petición de Ajax
		echo $jaxon->getScript();
	}
?>
</html>