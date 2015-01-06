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
                'tipo'=>'array',
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
    function testControlaElementosQueNoSonArray(){
        $datos=array(
            'alfa'=>'a',
            'beta'=>'b'
        );
        adaptar_estructura($datos,
            array(
                'atributos'=>array(
                    'alfa'=>array('valor_predeterminado'=>'1'),
                    'beta'=>array('valor_predeterminado'=>'2'),
                    'gama'=>array('valor_predeterminado'=>'3')
                )
            )
        );
        $this->assertEquals(
            array(
                'alfa'=>'a',
                'beta'=>'b',
                'gama'=>'3'
            ),
            $datos
        );
    }
    /**
     * @expectedException Exception
     * @expectedExceptionMessage Falta parametro obligatorio ('gama' no tiene valor por defecto)
    */
    function testControlarAtributoObligatorio(){
        $datos=array(
            'alfa'=>'a',
        );
        adaptar_estructura($datos,
            array(
                'atributos'=>array(
                    'alfa'=>array('valor_predeterminado'=>'1'),
                    'gama'=>array() // al no tener valor por defecto es obligatorio
                )
            )
        );
    }
    function testPredeterminadoOtro(){
        /*
        $this->markTestSkipped(
            'Elba va a resolver este'
        );
        */
        $datos=array(
            'alfa'=>'este'
        );
        adaptar_estructura($datos,
            array(
                'atributos'=>array(
                    'alfa'=>array(),
                    'beta'=>array('predeterminado_otro'=>'alfa'),
                )
            )
        );
        $this->assertEquals(
            array(
                'alfa'=>'este',
                'beta'=>'este'
            ),
            $datos
        );
    }
    function testRecursivo(){
        $datos=array(
            'nombre_db'=>'la_db',
            'usuarios'=>array(
                array('id'=>'pepe', 'activo'=>true),
                array('id'=>'jose'),
            )
        );
        adaptar_estructura($datos,
            array(
                'atributos'=>array(
                    'nombre_db'=>array(),
                    'opciones_db'=>array('valor_predeterminado'=>'normal'),
                    'usuarios'=>array(
                        'tipo'=>'array',
                        'atributos'=>array(
                            'id'=>array(),
                            'activo'=>array('valor_predeterminado'=>false)
                        )
                    )
                )
            )
        );
        $this->assertEquals(
            array(
                'nombre_db'=>'la_db',
                'opciones_db'=>'normal',
                'usuarios'=>array(
                    array('id'=>'pepe', 'activo'=>true),
                    array('id'=>'jose', 'activo'=>false),
                )
            ),
            $datos
        );
    }
}
?>