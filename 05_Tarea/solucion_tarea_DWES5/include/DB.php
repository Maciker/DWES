<?php
require_once('Producto.php');

class DB {
    protected static function ejecutaConsulta($sql) {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=tarea5";
        $usuario = 'dwes';
        $contrasena = 'abc123.';
        
        $dwes = new PDO($dsn, $usuario, $contrasena, $opc);
        $resultado = null;
        if (isset($dwes)) $resultado = $dwes->query($sql);
        return $resultado;
    }

    public static function obtieneProductos() {
        $sql = "SELECT cod, nombre_corto, descripcion, PVP, familia FROM producto;";
        $resultado = self::ejecutaConsulta ($sql);
        $productos = array();

	if($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $productos[] = new Producto($row);
                $row = $resultado->fetch();
            }
	}
        
        return $productos;
    }

    
    public static function obtieneProducto($codigo) {
        $sql = "SELECT cod, nombre_corto, descripcion, PVP, familia FROM producto";
        $sql .= " WHERE cod='" . $codigo . "'";
        $resultado = self::ejecutaConsulta ($sql);
        $producto = null;

        if(isset($resultado)) {
            $row = $resultado->fetch();
            $producto = new Producto($row);
    	}
        
        return $producto;    
    }
    
    public static function verificaCliente($nombre, $contrasena) {
        $sql = "SELECT usuario FROM usuarios ";
        $sql .= "WHERE usuario='$nombre' ";
        $sql .= "AND contrasena='" . md5($contrasena) . "';";
        $resultado = self::ejecutaConsulta ($sql);
        $verificado = false;

        if(isset($resultado)) {
            $fila = $resultado->fetch();
            if($fila !== false) $verificado=true;
        }
        return $verificado;
    }

    // Devuelve un objecto ordenador a partir de su código
    public static function obtieneOrdenador($codigo) {
        // Consulta conformada por union entre las dos tablas de las cuales se necesitan datos
        $sql = "SELECT o.*, p.nombre_corto, p.PVP, p.descripcion,p.familia  FROM ordenador o
                INNER JOIN producto p ON p.cod=o.cod
                WHERE o.cod='$codigo';";
        $resultado = self::ejecutaConsulta ($sql);
        $ordenador = null;

        if(isset($resultado)) {
            $row = $resultado->fetch();
            $ordenador = new Ordenador($row);
        }
        
        return $ordenador;    
    }
    
}

?>
