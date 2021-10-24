<?php

require_once 'EmpleadoTest.php';

class EmpleadoPermanenteTest extends EmpleadoTest {

 public function create($nombre = "Geronimo", $apellido = "Alderette", $dni = 42767236, $salario = 1000, $fecha = null)

     {
        $t = new \App\EmpleadoPermanente($nombre, $apellido, $dni, $salario, $fecha);
        return $t;
     }
     public function testIngresarFechaIngreso() {
        $f = new DateTime('2000-07-06');
        $t = $this->create("Geronimo", "Alderette", 42767236, 2000, $f);
        $this->assertEquals('2000-07-06', $t->getfechaIngreso()->format("Y-m-d"));
      }
      public function testCalcularLaComisionDeterminada() {
        $fecha = new DateTime('2000-07-06');
        $t = $this->create("Geronimo", "Alderette", 42767236, 1000, $fecha);
        $fecha2 = new DateTime();
        $antiguedad = $fecha2->diff($fecha);
        $this->assertEquals($antiguedad->y, $t->calcularAntiguedad());
        $this->assertEquals("{$antiguedad->y}%", $t->calcularComision());
      }
      public function testCalcularElIngresoTotalCorrectamente() {
        $fecha = new DateTime('2000-07-06');
        $antiguedad = 5;
        $t = $this->create("Geronimo", "Alderette", 42767236, 1000, $fecha, $antiguedad);
        $this->assertEquals(1210, $t->calcularIngresoTotal());
      }
      public function testComprobarElFuncionamientoBasadoEnLaAntiguedad() {
        $fecha = new DateTime('2000-07-06');
        $t = $this->create("Geronimo", "Alderette", 42767236, 1000, $fecha);
        $fecha2 = new DateTime();
        $antiguedad = $fecha2->diff($fecha);
        $this->assertEquals($antiguedad->y, $t->calcularAntiguedad());
      }
      public function testComprobarSituacionAlNoProporcionarFechaDeIngreso() {
        $fecha = new DateTime();
        $t = $this->create("Geronimo", "Alderette", 42767236, 1000, $fecha);
        $fecha2 = new DateTime();
        $antiguedad = $fecha->diff($fecha2);
        $this->assertEquals($antiguedad->y, $t->calcularAntiguedad());
        $this->assertEquals("0%", $t->calcularComision());
      }
      public function testComprobarFechaDeIngresoPosteriorALaActual() {
        $this->expectException(\Exception::class);
        $fecha = new DateTime('2022-12-12');
        $t = $this->create("Geronimo", "Alderette", 42767236, 1000, $fecha);
        $fecha2 = new DateTime();
        $antiguedad = $fecha2->diff($fecha);
      }
}