<?php

function adaptar_estructura(&$datos, $estructura){
    if(!isset($estructura['atributos'])){
        throw new Exception('Falta definir atributos');
    }
    foreach($datos as $id=>&$elemento){
        foreach($estructura['atributos'] as $nombre_campo=>$valor_campo){
            if(!isset($elemento[$nombre_campo])){
                if(is_array($valor_campo)){
                    if(isset($valor_campo['predeterminado_especial']) &&
                       $valor_campo['predeterminado_especial']=='id'
                    ){
                        $valor_predeterminado=$id;
                    } else {
                        $valor_predeterminado=$valor_campo['valor_predeterminado'];
                    }                    
                } else {
                    $valor_predeterminado=$valor_campo;        
                }
                $elemento[$nombre_campo]=$valor_predeterminado;
            }
        }
    }
}
?>