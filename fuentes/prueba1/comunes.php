<?php

date_default_timezone_set('America/Buenos_Aires');

function seguro($algo, $uso='codigo'){
    $conjuntos_seguros=array(
        'codigo'=>'^[A-Za-z0-9_]*$',
        'html'=>'^[^<>&]*$',
        'attr_html'=>'^[^<>&"\']*$',
        'mail'=>'^[A-Za-z0-9_@.]*$',
        'dato_sql'=>"^[^']*$",
    );
    if(!isset($conjuntos_seguros[$uso])){
        throw new Exception('no existe el uso para seguro');
    }
    $str_regexp=$conjuntos_seguros[$uso];
    if(!preg_match('/'.$str_regexp.'/',$algo)){
        throw new Exception("caracteres invalidos");
    }
    return $algo;
}

function interpolador($string_con_metavariables, $datos){
    return preg_replace_callback('/#([A-Za-z]\w*)/',function($coincidencias) use ($datos){
        $campo=$coincidencias[1];
        if(!isset($datos[$campo])){
            throw new Exception("ArmadorHtml complejo: No esta la metavariable '$campo'");
        }
        return htmlentities($datos[$campo], ENT_COMPAT, "UTF-8");
    },$string_con_metavariables);
}

?>