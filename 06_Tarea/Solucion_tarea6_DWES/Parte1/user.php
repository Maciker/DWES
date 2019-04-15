<?php

$url = 'http://localhost/dwes6/resource.php';

// Creamos un cliente para llamar al servicio de la URL
$cliente = new SoapClient(
        null,
        array('location' => $url,'uri' => 'http://localhost/dwes6')
        );

// Prueba para obtener la fecha de nacimiento de un empleado
echo "<h1>Test getFechaNacimiento</h1>";
$id_emp = 10016;
$fecha_nac = $cliente->getFechaNacimiento($id_emp);
echo "Fecha nacimiento emp. $id_emp : $fecha_nac<br />";

// Prueba para obtener los departamentos
echo "<h1>Test getDepartamentos</h1>";
$ar_depts = $cliente->getDepartamentos();
echo "Departamentos :";echo "<pre>";print_r($ar_depts);echo "</pre>";

// Prueba para obtener los empleados de un departamento
echo "<h1>Test getEmpleadosDepartamento</h1>";
$dept = 'd003';
$ar_empleados = $cliente->getEmpleadosDepartamento($dept);
echo "Empleados dept $dept : <pre>";print_r($ar_empleados);echo "</pre>";

echo "<h1>Test getFechaDesdeEmpleadoDept</h1>";
$id_emp = 10005;
$dept = 'd003';
$fecha_dept = $cliente->getFechaDesdeEmpleadoDept($id_emp, $dept);
echo "Fecha de emp. $id_emp en dept. $dept : $fecha_dept";
