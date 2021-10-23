<?php

abstract class EmpleadoTest extends \PHPUnit\Framework\TestCase {

    /*Si todo funciona bien*/

    public function testDevolverNombreyApellido() {

        $t = $this->create('Gerónimo', 'Alderette');
        $this->assertEquals('Gerónimo Alderette', $t->getNombreApellido());
    }
    public function testDevolverDNICorrectamente() {
        $t = $this->create(42767236);
        $this->assertEquals(42767236, $t->getDni());
    }
    public function testconseguirElSalarioDelUsuario() {
        $t = $this->create(1000);
        $this->assertEquals(1000, $t->getSalario());
    }
    public function testSeteaElSectoryDefineSuSituacion() {
    $t = $this->create("Geronimo", "Alderette", 5000, 2000, null);
    $t->setSector("Permanente");
    $this->assertEquals("Permanente", $t->getSector());    
    }
    public function test__ToString() {
    $t = $this->create("Geronimo", "Alderette", 5000, 2000, null);
    $this->assertEquals("Geronimo Alderette 5000 2000", $t->__toString());
    }
    
    /*Ahora las excepciones*/
    
    public function testNombreNoIngresadoPorElUsuario() {
        $this->expectException(\Exception::class);
        $t = $this->create("" , "Alderette");
    }
    public function testApellidoNoIngresadoPorElUsuario() {
        $this->expectException(\Exception::class);
        $t = $this->create("Geronimo" , "");
    }
    public function testDNINoIngresadoPorElUsuario() {
        $this->expectException(\Exception::class);
        $t = $this->create("Geronimo", "Alderette", null, 5000);
    }
    public function testSalarioNoIngresadoPorElUsuario() {
        $this->expectException(\Exception::class);
        $t = $this->create("Geronimo", "Alderette", 5000, null);
    }
    public function testElDNIContieneLetrasOCaracteresNoNumericos() {
        $this->expectException(\Exception::class);
        $t = $this->create("Geronimo", "Alderette", "Caracter no numerico", 5000);
    }
    public function testElSectorNoFueEspecificadoPorElUsuario() {
        $t = $this->create("Geronimo", "Alderette", 5000, 1000, null);
        $this->assertEquals("No especificado", $t->getSector()); 
    }
}