

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "

http://www.w3.org/TR/html4/loose.dtd">

<!-- Desarrollo Web en Entorno Servidor -->

<!-- Autor: Iker Macaya Faber -->

<!-- Tema 2 : Características del Lenguaje PHP -->

<!-- Ejemplo: Mostrar fecha en castellano -->

<html>

<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<title>Fecha en castellano</title>

</head>

<body>

<?php

date_default_timezone_set('Europe/Madrid');
/*
$numero_mes = date("m");

$numero_dia_semana = date("N");

switch($numero_mes)

{

case 1: $mes = "Enero";

break;

case 2: $mes = "Febrero";

break;

case 3: $mes = "Marzo";

break;

case 4: $mes = "Abril";

break;

case 5: $mes = "Mayo";

break;

case 6: $mes = "Junio";

break;

case 7: $mes = "Julio";

break;

case 8: $mes = "Agosto";

break;

case 9: $mes = "Septiembre";

break;

case 10: $mes = "Octubre";

break;

case 11: $mes = "Noviembre";

break;

case 12: $mes = "Diciembre";

break;

}

switch($numero_dia_semana)

{

case 1: $dia_semana = "Lunes";

break;

case 2: $dia_semana = "Martes";

break;

case 3: $dia_semana = "Miércoles";

break;

case 4: $dia_semana = "Jueves";

break;

case 5: $dia_semana = "Viernes";

break;

case 6: $dia_semana = "Sábado";

break;

case 7: $dia_semana = "Domingo";

break;

}

print $dia_semana.", ".date("j")." de ".$mes." de ".date("Y");*/

$diasemana = array(1=>"Lunes",2=>"Martes",3=>"Miercoles",4=>"Jueves",5=>"Viernes",6=>"Sábado",7=>"Domingo");
$mes = array(1=>"Enero",2=>"Febrero",3=>"Marzo",4=>"Abril",5=>"Mayo",6=>"Junio",7=>"Julio",8=>"Agosto",9=>"Septiembre",10=>"Octubre",11=>"Noviembre",12=>"Diciembre");
print $diasemana[date(N)].", ".date("j")." de ".$mes[date(m)]." de ".date("Y");
?>

</body>

</html>

