<?php

class Ordenador {
    protected $cod;
    protected $disco;
    protected $grafica;
    protected $otros;
    protected $procesador;
    protected $ram;
    protected $so;
    protected $optica;
    
    public function getcod() {return $this->cod; }
    public function getdisco() {return $this->disco; }
    public function getgrafica() {return $this->grafica; }
    public function getotros() {return $this->otros; }
    public function getprocesador() {return $this->procesador; }
    public function getram() {return $this->ram; }
    public function getso() {return $this->so; }
    public function getoptica() {return $this->optica; }
    
    public function __construct($row) {
        $this->cod = $row['cod'];
        $this->disco = $row['disco'];
        $this->grafica = $row['grafica'];
        $this->otros = $row['otros'];
        $this->procesador = $row['procesador'];
        $this->ram = $row['RAM'];
        $this->so = $row['SO'];
        $this->optica = $row['unidadoptica'];
    }
}

?>
