<?php
/*
* Definición de la clase Ordenador, hija de Producto
*/
class Ordenador extends Producto { 
	
    // Declaración de los atributos de la clase
    protected $procesador;
    protected $ram;
    protected $disco;
    protected $grafica;
    protected $unidadOptica;
    protected $so;
    protected $otros;

    // Constructor de la clase
    public function __construct($row) {
    	// Llamada a constructor de la clase padre (inicialización de atributos codigo, nombre, nombre_corto y PVP)
        parent::__construct($row); 	
        $this->procesador = $row['procesador'];
        $this->ram = $row['RAM'];
        $this->disco = $row['disco'];
        $this->grafica = $row['grafica'];
        $this->unidadOptica = $row['unidadoptica'];
        $this->so = $row['SO'];
        $this->otros = $row['otros'];
    }	

    // Métodos getter de clase
    public function getProcesador() {
    	return $this->procesador;
    }
    public function getRam() {
    	return $this->ram;
    }
    public function getDisco() {
    	return $this->disco;
    }
    public function getGrafica() {
    	return $this->grafica;
    }
    public function getUnidadOptica() {
    	return $this->unidadOptica;
    }
    public function getSo() {
    	return $this->so;
    }
    public function getOtros() {
    	return $this->otros;
    }
}