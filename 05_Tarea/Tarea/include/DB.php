<?php 
require_once('Producto.php');
require_once('Ordenador.php');

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
        $sql = "SELECT cod, nombre_corto, nombre, PVP, descripcion FROM producto;";
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
        $sql = "SELECT cod, nombre_corto, nombre, PVP, descripcion FROM producto";
        $sql .= " WHERE cod='" . $codigo . "'";
        $resultado = self::ejecutaConsulta ($sql);
        $producto = null;

	if(isset($resultado)) {
            $row = $resultado->fetch();
            $producto = new Producto($row);
	}
        
        return $producto;    
    }
    
    public static function obtieneOrdenadores() {
        $sql = "SELECT cod, disco, grafica, otros, procesador, RAM, SO, unidadoptica FROM ordenador";
        $resultado = self::ejecutaConsulta ($sql);
        $ordenadores = array();

	if($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $ordenadores[] = new Ordenador($row);
                $row = $resultado->fetch();
            }
	}
            return $ordenadores;    
    }
    
        public static function codigopcs() {
        $sql = "SELECT cod FROM ordenador";
        $resultado = self::ejecutaConsulta ($sql);
        $codigos = array();

	if($resultado) {
            // Añadimos un elemento por cada codigo obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $codigos[] = $row;
                $row = $resultado->fetch();
            }
	}
            return $codigos;    
    }
        
       
        public static function infoordenador($codigo) {
        $sql = "SELECT cod, disco, grafica, otros, procesador, RAM, SO, unidadoptica FROM ordenador";
        $sql .= " WHERE cod='" . $codigo . "'";
        $resultado = self::ejecutaConsulta ($sql);
        $ordenadores = null;
        
	if(isset($resultado)) {
            $row = $resultado->fetch();
            $ordenador = new Ordenador($row);
	}
        
        return $ordenador;    
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
    
}

?>
