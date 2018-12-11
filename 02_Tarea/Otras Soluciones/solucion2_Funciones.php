<?php

    define("Nuevo", 0);
    define("Eliminar", 1);
    define("Actualizar", 2);

    /*
    *   Función que comprueba que proceso debe realizar 
    *   en función de los parámetros que recibe y los requisitos dados
    *   RETURN
    *       - Constante que contiene el proceso a realizar
    *       - NULL: Si el proceso a ejecutar no está definido o no debe realizar ninguna acción
    */    
    function CheckProceso($array, $nombre, $correo){
        // CASO 1: Se comprueba que el nombre no esté vacío
        if(empty($nombre)){
            CrearAlerta("El nombre no puede estar vacío");
            return NULL;
        }

        $existeNombre = ExisteNombre($array,$nombre);

        // CASO 2: No existe nombre y correo informado
        if(!$existeNombre && !empty($correo))
            return Nuevo;

        if($existeNombre)
            if(empty($correo)) // CASO 4: Existe el nombre y no se ha informado el correo
                return Eliminar;
            else 
                return Actualizar; // CASO 3: Existe el nombre y se ha informado el correo

        // No cumple los requisitos para los casos definidos
        return NULL;
    }

    /*
    *   Función que comprueba si el nombre 
    *   pasado como parámetro existe dentro del array
    *   RETURN: 
    *       - True: Si el nombre existe
    *       - False: Si el nombre no existe
    */
    function ExisteNombre($array, $nombre){
        // Se comprueba que el array disponga de al menos un item
        if(!isset($array) || count($array) == 0)
            return false;
        
        // Mediante la función isset se comprueba que el nombre existe dentro del array
        return isset($array[$nombre]);
    }
    
    /*
    *   Función que muestra una ventana de alerta con Javascript
    *   a partir de un mensaje pasado como parámetro
    */
    function CrearAlerta($mensaje){
        echo "<script type='text/javascript'>alert('$mensaje');</script>";
    }

    /*
    *   Función que lista el contenido del array 
    *   dentro de una lista en html
    */
    function ListarResultados($array){
        if (is_array($array)) {
            echo "<ul>";
            // Se recorre el array. En este caso nombre es el código y correo es el contenido del array
            
            foreach ($array as $nombre => $correo) {
                echo "<li>";
                echo "Nombre: $nombre   Correo: $correo";
                echo "</li>";
            }
            echo "</ul>";
        }
    }

    /*
    *   Función principal: Realiza las operaciones necesarias
    *   y manipula el array
    */
    function GetArray(){
        // Se comprueba que se haya pulsado en enviar
        if (isset($_POST['enviar'])) {
            // Se recogen los items enviados en el POST
            $myArray    = unserialize(base64_decode($_POST['arrayAgenda'])); // Desserializo el array enviado por el post
            $nombre     = $_POST['nombre'];
            $correo     = $_POST['correo'];

            $proceso = CheckProceso($myArray, $nombre, $correo);

            // Compruebo que el proceso esté definido
            if(!is_null($proceso)){
                // En función del proceso se realizan las diferentes operaciones
                switch ($proceso) {
                    case Nuevo:
                        // Si el array no esta definido, lo creo mediante la función array, en caso contrario se van añadiendo
                        !isset($myArray) ? $myArray = array($nombre => $correo) : $myArray[$nombre] = $correo;
                        break;
                    case Actualizar:
                        // Se actualiza el correo para el nombre dado
                        $myArray[$nombre] = $correo;
                        break;
                    case Eliminar:
                        // Se destruye el registro para el nombre dado mediante la función unset 
                        unset($myArray[$nombre]);
                        break;
                    default:
                        // Se muestra una alerta ya que el proceso a realizar no está definido
                        CrearAlerta("ERROR: Proceso no definido");
                        break;
                }
            }
        }

        // Se comprueba que el array esta instanciado
        return isset($myArray) ? $myArray : NULL;
    }
?>