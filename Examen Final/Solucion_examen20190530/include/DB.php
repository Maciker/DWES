<?php
require_once('include/Empleado.php');
require_once('include/Administrativo.php');
require_once('include/Operativo.php');

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

    
    public static function verificaCliente($nombre, $contrasena) {
        $sql = "SELECT usuario FROM usuarios ";
        $sql .= "WHERE usuario='$nombre' ";
        $sql .= "AND contrasena='" . sha1($contrasena) . "';";
        $resultado = self::ejecutaConsulta ($sql);
        $return = false;

        if(is_object($resultado)) {
            $fila = $resultado->fetch();
            if($fila !== false) {
                $return = true;
            } else {
                $return = 'Usuario o contraseña no válidos!';
            }
        }
        else {
            $return = $resultado;
        }
        return $return;
    }

    // Inserta en la tabla log un registro con el usuario de login y la fechahora del login
    public static function registraLog($usuario, $fechahora) {
        $sql = "INSERT INTO log (usuario, login) VALUES ('$usuario', '$fechahora');";
        $resultado = self::ejecutaConsulta ($sql);
        $return = false;

        if(is_object($resultado)) {
            $return = true;
        }
        return $return;        

    }
    // Devuelve un array de Empleados
    public static function obtieneEmpleados() {
        $sql = "SELECT * FROM empleados";
        $resultado = self::ejecutaConsulta ($sql);
        $ar_empleados = [];

        if(isset($resultado)) {            
            while ( $row = $resultado->fetch()) {                           
                $ar_empleados[] = new Empleado($row);
            }
        }
        
        return $ar_empleados;    
    }

    // Devuelve un objeto Administrativo u Operativo a partir del código de empleado
    public static function obtieneEmpleado($cod_empleado) {
        $sql = "SELECT * FROM empleados WHERE emp_no=".$cod_empleado;
        $resultado = self::ejecutaConsulta ($sql);
        $empleado = null;

        if(isset($resultado)) {            
            $row = $resultado->fetch();
            // Comprobar que de los departamentos a los que pertenece el empleado, haya alguno de Admin
            $ar_depts = self::getDepartamentos($cod_empleado);
            $is_admin = false;
            $ar_dept_admin = ['d001', 'd002', 'd003','d004'];
            foreach ($ar_depts as $dept) {
                // Con el primer departamento de admin al que pertenece salgo del bucle
                if (in_array($dept, $ar_dept_admin)) {   
                    $is_admin = true;
                    break;
                } 
            }
            $empleado = ($is_admin) ? new Administrativo($row) : new Operativo($row);

        }        
        return $empleado;    
    }

    // Devuelve un array de códigos de departamento a los que pertenece el empleado
    public static function getDepartamentos($cod_empleado) {
        $sql = "SELECT dept_no FROM dept_emp WHERE emp_no = '$cod_empleado';";
        $resultado = self::ejecutaConsulta($sql);
        $ar_dept = [];

        if(isset($resultado)) {            
            while ( $row = $resultado->fetch()) {                           
                $ar_dept[] = $row['dept_no'];
            }
        }

        return $ar_dept;
    }
}

?>