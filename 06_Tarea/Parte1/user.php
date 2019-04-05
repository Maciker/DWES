<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor
Tema 6: Servicios SOAP
Tarea 6: user.php  
@author: Iker Macaya Faber -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>DWES: Tarea 06</title>
</head>
    <body>
        <h2>Servicios Web SOAP sin WSDL</h2>
        <h3>Autor: Iker Macaya Faber</h3>
        <?php
            $url='http://localhost/DWES/06/Parte1/resource.php';
            $uri='http://localhost/DWES/06/Parte1';
            $cliente = new SoapClient(null,array('location'=>$url,'uri'=>$uri));
            // Ejemplo de getFechaNacimiento del empleado 10002
            $fecha_nac=$cliente->getFechaNacimiento(10002);
            print_r("Fecha de nacimiento del empleado seleccionado ".$fecha_nac."<br>");
            print_r("<br>");
            // Guardamos en $dptos el array con todos los departamentos;
            $dptos=$cliente->getDepartamentos();
            print_r("Array de codigos de departamentos: ");
            print_r("<br>");
            print_r($dptos);
            print_r("<br>");
            print_r("<br>");
            // Ejemplo de consulta, para almacenar en empleados los del departamento d005
            $empleados=$cliente->getEmpleadosDepartamento("'d005'");
            print_r("Aray de codigos de empleados del dpto. seleccionado: ");
            print_r("<br>");
            print_r($empleados);
            print_r("<br>");
            print_r("<br>");
            // Fecha de inicio de contrato del empleado 10007 en el departamento d008
            $fechacontrato=$cliente->getFechaDesdeEmpleadoDept("'d008'", 10007);
            print_r("La fecha de inicio de trabajo en el departamento es: ".$fechacontrato);
        ?>
    </body>
</html>