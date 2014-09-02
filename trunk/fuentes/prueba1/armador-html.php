<?php

class ArmadorHtml{
    private $attr_globales=array(
        'id'=>array(),
        'class'=>array()
    );
    private $tags=array(
        'input'=>array('attr'=>array('name'=>array(), 'type'=>array()), 'solo_se_abre'=>true),
        'label'=>array('attr'=>array('for'=>array())),
        'table'=>array('attr'=>array()),
        'td'   =>array('attr'=>array('title'=>array())),
        'tr'   =>array('attr'=>array()),
    );
    private function controlar_tag($tag,$solo_se_abre){
        if(!isset($this->tags[$tag])){
            throw new Exception("ArmadorHtml no existe el tag '$tag'");
        }
        if(!isset($this->tags[$tag]['solo_se_abre']) && $solo_se_abre){
            throw new Exception("ArmadorHtml el tag '$tag' debe cerrarse y abrirse");
        }
        if(isset($this->tags[$tag]['solo_se_abre']) && !$solo_se_abre){
            throw new Exception("ArmadorHtml el tag '$tag' es de solo abrir");
        }
        return array_merge($this->attr_globales, $this->tags[$tag]['attr']);
    }
    private function tag_con_atributos($tag, $atributos, $solo_se_abre){
        $definicion_tag=$this->controlar_tag($tag, $solo_se_abre);
        echo "<$tag";
        foreach($atributos as $nombre_atributo=>$contenido){
            if(!isset($definicion_tag[$nombre_atributo])){
                echo ">"; // para cerrar el tag y que se vea la excepcion
                throw new Exception("ArmadorHtml no existe el atributo '$nombre_atributo' en '$tag'");
            }
            echo " $nombre_atributo=".'"'.str_replace(array('"','<', '>', '&'), array('\\"', '&lt;', '&gt;', '&amp;'), $contenido).'"';
        }
        echo ">";
    }
    function abrir($tag, $atributos=array()){
        return $this->tag_con_atributos($tag, $atributos, false);
    }
    function texto($texto){
        echo str_replace(array('<', '>', '&'), array('&lt;', '&gt;', '&amp;'), $texto);
    }
    function cerrar($tag){
        $this->controlar_tag($tag, false);
        echo "</$tag>";
    }
    function elemento($tag, $atributos=array()){
        return $this->tag_con_atributos($tag, $atributos, true);
    }
    function complejo($complejo, $datos1=array(), $datos2=array(), $datos3=array()){
    }
}

?>