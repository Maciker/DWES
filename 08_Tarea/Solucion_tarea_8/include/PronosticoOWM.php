<?php
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;
use Jaxon\Response\Response;

class PronosticoOWM {
    private $owm = null;

    public function __construct() {
    	$ar_ini = parse_ini_file('./config/tarea8.ini');
        $this->owm = new OpenWeatherMap($ar_ini['keyOWM']);
    }


    public function check_data($ar_data) {
    	$ar_result = ['check' => true, 'msg' => ''];
    	if (empty($ar_data['latitud']) || empty($ar_data['longitud'])) {
    		$ar_result = ['check' => false, 'msg' => 'Debe especificar latitud y longitud'];
    	}
    	elseif (!$this->checkLatLon($ar_data['latitud']) || !$this->checkLatLon($ar_data['longitud'])) {
    		$ar_result = ['check' => false, 'msg' => 'La latitud y longitud deben ser enteros o reales con dos decimales'];
    	}

    	return (object) $ar_result;
    }

	
	private function checkLatLon($float) {
		return (preg_match("/^[-]?[0-9]+([.][0-9]{1,2})?$/", $float));
	}

    // Extraer datos de OWM a partir de un id de ciudad
    private function getDataByCityId($id_ciudad){
		try {
		    $tiempo = $this->owm->getWeather($id_ciudad, 'metric', 'es');
		    
		} catch(OWMException $e) {
		    echo 'OpenWeatherMap exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
		} catch(\Exception $e) {
		    echo 'General exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
		}
		return $tiempo;
    }

    // Extraer datos de OWM a partir de latitud y longitud
    public function getDataByLatLon($lat, $lon) {

		try {
		    $tiempo = $this->owm->getWeather(['lon'=> $lon, 'lat'=> $lat], 'metric', 'es');
		    
		} catch(OWMException $e) {
		    echo 'OpenWeatherMap exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
		} catch(\Exception $e) {
		    echo 'General exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
		}
		return $tiempo;
    }

	// Extraer datos fornateados de OWM a partir de una URL que incluye el parámetro id_ciudad
    public function jaxonGetHtmlByCityUrl($url) {
    	$ar_partes_url = parse_url($url);
		// Extraer al array $ar_params todos los parametros de la parte query
		parse_str($ar_partes_url['query'], $ar_params);

		$tiempo = $this->getDataByCityId($ar_params['id_ciudad']);
		$str_img = "http://openweathermap.org/img/w/" . $tiempo->weather->icon . ".png";
			
		$resultado = "<img src='$str_img' alt='" . $tiempo->weather->description . "' /> / " . $tiempo->temperature . " / " . $tiempo->humidity . " / " . $tiempo->weather->description ;
		
		$response = new Response();
        $response->assign('ciudad'.$ar_params['id_ciudad'], 'innerHTML', $resultado);
        return $response;
    }
}