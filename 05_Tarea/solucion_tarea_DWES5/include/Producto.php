<?php
/*
* Definición de la clase Producto
*/ 
class Producto {
    // Declaración de los atributos de la clase, sustituyo nombre por descripcion ya que nombre no se utiliza
    protected $codigo;
    protected $nombre_corto;
    protected $descripcion;
    protected $PVP;
    protected $familia;
    
     
    public function __construct($row) {
        $this->codigo = $row['cod'];
        $this->nombre_corto = $row['nombre_corto'];
        $this->descripcion = $row['descripcion'];
        $this->PVP = $row['PVP'];
        $this->familia = $row['familia'];
    }

    // Métodos getter de clase
    public function getcodigo() {
        return $this->codigo; 
    }
    public function getnombrecorto() {
        return $this->nombre_corto; 
    }
    public function getPVP() {
        return $this->PVP; 
    }
    public function getdescripcion() {
        return $this->descripcion; 
    }
    public function getfamilia() {
        return $this->familia;
    }

   
}

