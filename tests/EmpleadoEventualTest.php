<?php

require_once 'EmpleadoTest.php';

class EmpleadoEventualTest extends EmpleadoTest {

 public function create($nombre = "Geronimo", $apellido = "Alderette", $dni = 42767236, $salario = 1000, $fecha = null, Array $monto = [100, 200, 300, 400])

    {
        $t = new \App\EmpleadoEventual($nombre, $apellido, $dni, $salario, $monto);
        return $t;
    }
 public function testSeCalculaLaComision() {
    $t= $this->create("Geronimo", "Alderette", 42767236, 2000);
    $this->assertEquals(12.5, $t->calcularComision());
 }
 public function testSeCalculaElIngresoTotal() {
    $this->expectException(\Exception::class);
    $t= $this->create("Geronimo", "Alderette", 42767236, 2000, null, [0,-100, 200, 300]);
 }
 public function testSeIngresoUnMontoDeVentaNegativoOCero() {
    $t= $this->create("Geronimo" , "Alderette", 42767236, 2000);
    $this->assertEquals(2012.5, $t->calcularIngresoTotal());
 }
}