<?php

require_once 'EmpleadoTest.php';

class EmpleadoPermanenteTest extends EmpleadoTest {

 public function create($nombre = "Geronimo", $apellido = "Alderette", $dni = 42767236, $salario = 1000, $fecha = null)

     {
        $t = new \App\EmpleadoPermanente($nombre, $apellido, $dni, $salario, $fecha);
        return $t;
     }
     
}