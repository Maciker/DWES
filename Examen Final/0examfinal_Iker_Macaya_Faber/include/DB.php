<?php
require_once('include/Empleado.php');
require_once('include/EmpleadoSenior.php');

class DB {

    protected static function ejecutaConsulta($sql) {
        
        $dsn = "mysql:host=localhost;dbname=examen";
        $usuario = 'dwes';
        $contrasena = 'abc123.';
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");            
        
        try {
            $dwes = new PDO($dsn, $usuario, $contrasena, $opciones);
            $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }

        $resultado = null;
        if (isset($dwes)) {
            $resultado = $dwes->query($sql);
        }
        else {
            $resultado =  "Error $error: $mensaje";
        }
        return $resultado;
    }

    
    public static function verificaEmpleado($id, $nombre, $apellido) {
        $sql = "SELECT nombre FROM empleados ";
        $sql .= "WHERE emp_no='$id' ";
        $sql .= "AND nombre ='$nombre' ";
		$sql .= "AND apellido ='$apellido'";
        $resultado = self::ejecutaConsulta ($sql);
        $return = false;

        if(is_object($resultado)) {
            $fila = $resultado->fetch();
            if($fila !== false) {
                $return = true;
            } else {
                $return = 'No se ha encontrado al empleado!';
            }
        }
        else {
            $return = $resultado;
        }
        return $return;
    }

    // Inserta en la tabla log un registro con el empleado de login y la fechahora del login
    public static function registraLog($nombre, $fechahora) {
        $sql = "INSERT INTO log (usuario, login) VALUES ('$nombre', '$fechahora');";
        $resultado = self::ejecutaConsulta ($sql);
        $return = false;

        if(is_object($resultado)) {
            $return = true;
        }
        return $return;        
    }
	
	// Devuelve un objeto Empleado o EmpleadoSenior a partir del código de empleado
    public static function obtieneEmpleado($id) {
        $sql = "SELECT * FROM empleados WHERE emp_no='$id'";
        $resultado = self::ejecutaConsulta ($sql);
        $empleado = null;

        if(isset($resultado)) {            
            $row = $resultado->fetch();
            // Comprobar la fecha de contrato para saber si es empleado Super o normal
            $is_super = false;
            if ($row['fecha_contrato']<'1990-01-01'){
				$is_super = true;
			}
			$empleado = ($is_super) ? new EmpleadoSenior($row) : new Empleado($row);

        }        
        return $empleado;    
    }
	
	public static function save($nombre, $apellido, $fecha_nac, $id){
		$sql = "UPDATE empleados SET nombre='$nombre', apellido='$apellido', fecha_nac='$fecha_nac' WHERE emp_no = $id";
        $resultado = self::ejecutaConsulta ($sql);
        $return = false;

        if(is_object($resultado)) {
            $return = true;
        }
        return $return;        
    }
}
?>