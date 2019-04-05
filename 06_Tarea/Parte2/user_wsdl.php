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
        <h2>Servicios Web SOAP con WSDL</h2>
        <h3>Autor: Iker Macaya Faber</h3>
        <?php
            $cliente = new SoapClient("servicios.wsdl.xml");
            // Ejemplo de getFechaNacimiento del empleado 10024
            $fecha_nac=$cliente->getFechaNacimiento(10024);
            print_r("Fecha de nacimiento del empleado seleccionado ".$fecha_nac."<br>");
            print_r("<br>");
            // Guardamos en $dptos el array con todos los departamentos;
            $dptos=$cliente->getDepartamentos();
            print_r("Array de codigos de departamentos: ");
            print_r("<br>");
            print_r($dptos);
            print_r("<br>");
            print_r("<br>");
            // Ejemplo de consulta, para almacenar en empleados los del departamento d008
            $empleados=$cliente->getEmpleadosDepartamento("'d008'");
            print_r("Aray de codigos de empleados del dpto. seleccionado: ");
            print_r("<br>");
            print_r($empleados);
            print_r("<br>");
            print_r("<br>");
            // Fecha de inicio de contrato del empleado 10005 en el departamento d003
            $fechacontrato=$cliente->getFechaDesdeEmpleadoDept("'d003'", 10005);
            print_r("La fecha de inicio de trabajo en el departamento es: ".$fechacontrato);
        ?>
    </body>
</html>