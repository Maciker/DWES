<?php
/**
 * Funciones para el servicio web
 *
 * @author Iker Macaya Faber
 */
class DatosEmpresa {
    // Metodo para hacer la conexion a la BD y ejecutar las consultas
    public function ejecutaConsulta($sql) {
        $servername = "localhost";
        $dbname="tarea6";
        $username = "dwes";
        $password = "abc123.";
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, $options);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }    
        $result = $conn->query($sql);
        return $result;
    }
    // Metodo para obtener la fecha de nacimientos de un empleado
    public function getFechaNacimiento($cod) {
        $sql = "SELECT fecha_nac FROM empleados WHERE emp_no =".$cod." ;";
        $result = self::ejecutaConsulta($sql);
        $fecha_nac=$result->fetch();
        $fecha = $fecha_nac[0]; 
        return $fecha; 
    }
    // Metodo para obtener la lista de departamentos
    public function getDepartamentos() {
        $sql = "SELECT dept_no FROM departamentos;";
        $result = self::ejecutaConsulta($sql);
        $dptos = array();
        while ($f = $result->fetch())
            array_push ( $dptos , $f[0]);
        return $dptos; 
    }
    // Metodo que recibe un codido de dpto. y muestra los empleados del mismo
    public function getEmpleadosDepartamento($cod) {
        $sql = "SELECT emp_no FROM dept_emp WHERE dept_no =".$cod." ;";
        $result = self::ejecutaConsulta($sql);
        $empleados = array();
        while ($f = $result->fetch())
            array_push ( $empleados , $f[0]);
        return $empleados; 
    }
    // Metodo que a partir de un codigo de empleado y departamento devuelve la fecha de entrada del mismo.
    public function getFechaDesdeEmpleadoDept($dpto, $emp) {
        $sql = "SELECT fecha_desde FROM dept_emp WHERE dept_no =".$dpto." AND emp_no=".$emp." ;";
        $result = self::ejecutaConsulta($sql);
        $f = $result->fetch();
        $fecha = $f[0];
        return $fecha; 
    }
}