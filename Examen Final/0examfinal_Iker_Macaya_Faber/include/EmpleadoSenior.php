<?php

class EmpleadoSenior extends Empleado {
	private $tipo;
	
	public function getTipo($fecha) {
        if ($fecha < '1990-01-01'){
			return 'Super';
		} else {
			return 'Normal';
		}
    }
}

