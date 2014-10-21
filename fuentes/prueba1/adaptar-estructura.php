<?php

function adaptar_estructura(&$datos, $estructura){
    foreach($datos as $id=>&$elemento){
        foreach($estructura['atributos'] as $nombre_campo=>$valor_campo){
            if(!isset($elemento[$nombre_campo])){
                $elemento[$nombre_campo]=$valor_campo;        
            }
        }
    }
}
?>