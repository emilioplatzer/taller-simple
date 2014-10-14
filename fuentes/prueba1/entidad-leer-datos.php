<?php

require_once "comunes.php";
require_once "db.class.php";

function leer_datos_entidad($entidad_def,$pk){
    $nombre_tabla=$entidad_def['nombre_tabla'];
    $arreglo_campos_select=array();
    $arreglo_where_sql=array();
    $arreglo_where_parametros=array();
    foreach($entidad_def['campos'] as $campo_id=>$campo_def){
        if($campo_def['es_pk']){
            $arreglo_where_sql[]="$campo_id = :$campo_id";
            if(!isset($pk[$campo_id])){
                throw new Exception("Pk incompleta, falta '$campo_id' en '{$nombre_tabla}'");
            }
            $arreglo_where_parametros[":$campo_id"]=$pk; // [$campo_id];
        }
        if($campo_def['puede_leer_de_db']){
            $arreglo_campos_select[]=$campo_id;
        }
    }
    $sql='SELECT '.implode(', ',$arreglo_campos_select).
         "\n FROM prin.".$nombre_tabla.
         "\n WHERE ".implode(' and ',$arreglo_where_sql);
    $db=abrir_conexion();
    $sentencia=$db->prepare($sql);
    $sentencia->execute($arreglo_where_parametros);
    $datos=$sentencia->fetch(PDO::FETCH_ASSOC);
    if(!$datos){
        throw new Exception("No hay datos para la pk en '$nombre_tabla'");
    }
    $datos_segundo_renglon_no_deberia_haber=$sentencia->fetch(PDO::FETCH_ASSOC);
    if($datos_segundo_renglon_no_deberia_haber){
        throw new Exception("Hay datos duplicados para lo que deberia ser pk en '$nombre_tabla'");
    }
    return $datos;
}


?>