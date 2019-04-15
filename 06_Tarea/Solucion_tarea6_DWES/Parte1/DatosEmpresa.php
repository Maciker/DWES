<?php
require_once('DB.php');
require_once('Empleado.php');

class DatosEmpresa {
    private $db = null;
    
    public function __construct() {
        $this->db = new DB();
    }
    /**
     * Recibe el número de un empleado como parámetro y devuelve su fecha de nacimiento
     * @param  integer
     * @return string
     */
    public function getFechaNacimiento($emp_no){        
        $empleado = $this->db->sacaEmpleado($emp_no);
        print_r($empleado);
        return $empleado->getfecha_nac();
    }
    
    /**
     * Devuelve un array con los códigos de todas los departamentos
     * @return string[]
     */
    public function getDepartamentos() {
        $familias = $this->db->sacaDepartamentos();
        return $familias;
    }

    /**
     * Devuelve un array con los números de los empleados de un departamento
     * @param  string
     * @return integer[]
     */
    public function getEmpleadosDepartamento($dept_no){
        $empleados = $this->db->sacaEmpleadoDept($dept_no);
        $ar_emp_no = [];
        foreach ($empleados as $empleado) {
            $ar_emp_no[] = $empleado->emp_no;
        }
        return $ar_emp_no;
    }

    /**
     * Devuelve la fecha desde la cual el empleado está en ese departamento
     * @param  integer
     * @param  string
     * @return string
     */
    public function getFechaDesdeEmpleadoDept($emp_no, $dept_no){
        $empleados = $this->db->sacaEmpleadoDept($dept_no);        
        //print_r($empleados);exit;
        $fecha_return = null;
        foreach ($empleados as $empleado) {
            if ($emp_no == $empleado->emp_no) {
                $fecha_return = $empleado->fecha_contrato;
            }
        }

        return $fecha_return;
    }
}

?>
