<?php

require_once "comunes.php";
require_once "db.class.php";
require_once "estructura.php";

function despachable_agregar_entidad($parametros){
    global $modelo;
    $entidad=$modelo['entidades'][$parametros['entidad']];
    armaFormulario($entidad);
}

function despachable_grabar_entidad($parametros){
    global $modelo;
    $id_entidad=$parametros['entidad'];
    $estructura=$modelo['entidades'][$id_entidad];
    $db = abrir_conexion();
    foreach ($estructura['campos'] as $campo=>$dummy){
        $datos_a_insertar[$campo]=$_POST[$campo];            
    }        
    $sql_datos=array();
    $sql_columnas=array(); // lado izquierdo del insert
    $sql_placeholder=array(); // lado derecho del insert
    foreach ($datos_a_insertar as $columna=>$valor) {
        $placeholder=":$columna";
        $sql_columnas[]=$columna;
        $sql_placeholder[]=$placeholder;
        $sql_datos[$placeholder]=$valor;
    }
    $sql_insertar='insert into prin.'.$estructura['nombre_tabla'].
        ' ('.implode(',',$sql_columnas).') '.
        'values ('.implode(',',$sql_placeholder).');';
    echo "por ejecutar \n".$sql_insertar;
    $sentencia=$db->prepare($sql_insertar);
    $sentencia->execute($sql_datos);
    echo "\n<B>Listo";
}

?>