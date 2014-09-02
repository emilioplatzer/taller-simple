<?php

function enviar_abrir($tag, $atributos=array()){
    echo "<$tag";
    foreach($atributos as $nombre_atributo=>$contenido){
        echo " $nombre_atributo=".'"'.str_replace(array('"','<', '>', '&'), array('\\"', '&lt;', '&gt;', '&amp;'), $contenido).'"';
    }
    echo ">";
}

function enviar_texto($texto){
    echo str_replace(array('<', '>', '&'), array('&lt;', '&gt;', '&amp;'), $texto);
}

function enviar_cerrar($tag){
    echo "</$tag>";
}

function enviar_elemento($tag, $atributos=array()){
    enviar_abrir($tag, $atributos);
}

?>