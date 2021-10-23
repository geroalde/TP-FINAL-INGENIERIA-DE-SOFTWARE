<?php

require_once 'EmpleadoTest.php';

class EmpleadoEventualTest extends EmpleadoTest {

 public function create($nombre = "Geronimo", $apellido = "Alderette", $dni = 42767236, $salario = 1000, $fecha = null, Array $monto = [100, 200, 300, 400])

    {
        $t = new \App\EmpleadoEventual($nombre, $apellido, $dni, $salario, $monto);
        return $t;
    }
    
}