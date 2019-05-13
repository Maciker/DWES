<?php

class Administrativo extends Empleado implements Remuneracion {
	public function getSalario() {
        return $this->salario_base*1.3; 
    }
}