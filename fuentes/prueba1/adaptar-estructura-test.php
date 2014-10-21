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
                'pan'=>'frances', // dos maneras de escribir valores predeterminados
                'contenido'=>array('valor_predeterminado'=>'queso')
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
    /**
     * @expectedException Exception
     * @expectedExceptionMessage Falta definir atributos
    */
    function testControlarQueEsteDefinidoAtributos(){
        $dummy=array();
        adaptar_estructura($dummy,array());
    }
    function testPredeterminadoEspecialId(){
        $datos=array(
            'uno'=>array('valor'=>1),
            'dos'=>array('valor'=>2,'nombre'=>'due'),
        );
        adaptar_estructura($datos,
            array(
                'atributos'=>array(
                    'nombre'=>array('predeterminado_especial'=>'id')
                )
            )
        );
        $this->assertEquals(
            array(
                'uno'=>array('valor'=>1,'nombre'=>'uno'),
                'dos'=>array('valor'=>2,'nombre'=>'due'),
            ),
            $datos
        );
    }
}
?>