<?php
require_once "adaptar-estructura.php";

class AdaptarEstructuraTest extends PHPUnit_Framework_TestCase{
    public function testSimpleDeQuesoSolo(){
        $datos=array(
            array('pan'=>'miga'),
            array('contenido'=>'jamon'),
            array(),
            array('pan'=>'miga','contenido'=>'atun'),
        );
        $estructura=array(
            'tipo'=>'array',
            'atributos'=>array(
                'pan'=>'frances',
                'contenido'=>'queso'
            )
        );
        adaptar_estructura($datos,$estructura);
        $this->assertEquals(
            array(
                array('pan'=>'miga'   ,'contenido'=>'queso'),
                array('pan'=>'frances','contenido'=>'jamon'),
                array('pan'=>'frances','contenido'=>'queso'),
                array('pan'=>'miga'   ,'contenido'=>'atun'),
            ),
            $datos
        );
    }
}
?>