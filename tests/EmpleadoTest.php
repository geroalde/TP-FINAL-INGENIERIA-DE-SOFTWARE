<?php

class EmpleadoTest extends \PHPUnit\Framework\TestCase {

    public function testDevolverNombreyApellido() {

        $t = $this=/*nombre a definir*/('Gerónimo', 'Alderette');
        $this->assertEquals('Gerónimo Alderette', $t->getNombreApellido());
    }
    public function testDevolverDNICorrectamente() {
        $t = $this=/*nombre a definir*/(42767236);
        $this->assertEquals(42767236, $t->getDni());
    }
    public function testconseguirElSalarioDelUsuario() {
        $t = $this=/*nombre a definir*/(2000);
        $this->assertEquals(2000, $t->getSalario());
    }
    public function testSeteaElSectoryDefineSuSituacion() {
    $t = $this=/*nombre a definir*/(/*a definir*/);
    $t->setSector("Eventual");
    $this->assertEquals("Eventual", $t->getSector());    
    }
    public function test__ToString() {
    $t = $this=/*nombre a definir*/(/*a definir*/);
    $this->assertEquals(/*a definir*/, $t->__toString());
    }

    /* Comienzan las excepciones */ 

    public function ()
}