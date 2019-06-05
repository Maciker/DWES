<?php

class Empleado {
    protected $emp_no;
    protected $fecha_nac;
    protected $nombre;
    protected $apellido;
    protected $genero;
    protected $fecha_contrato;
    
    public function __construct($row) {
        $this->emp_no = $row['emp_no'];
        $this->fecha_nac = $row['fecha_nac'];
        $this->nombre = $row['nombre'];
        $this->apellido = $row['apellido'];
        $this->genero = $row['genero'];
        $this->fecha_contrato = $row['fecha_contrato'];
    }

    public function getcodigo() {
        return $this->emp_no; 
    }
    public function getfecha_nac() {
        return $this->fecha_nac; 
    }
    public function getnombre() {
        return $this->nombre; 
    }
    public function getapellido() {
        return $this->apellido; 
    }
    public function getgenero() {
        return $this->genero; 
    }
    public function getfecha_contrato() {
        return $this->fecha_contrato; 
    }

	public static function prepareToSave($nombre, $apellido, $fecha_nac){
		$data = array();
		$data['nombre'] = $nombre;
		$data['apellido'] = $apellido;
		$data['fecha_nac'] = $fecha_nac;
		
		return $data;
	}
}
